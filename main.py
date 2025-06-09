import customtkinter as ctk
import os
import threading
import sys
from gpt4all import GPT4All

# Disable telemetry for full offline mode
os.environ["GPT4ALL_TELEMETRY"] = "FALSE"

def resource_path(relative_path):
    """ Get absolute path to resource, works for dev and for cx_Freeze executable """
    if getattr(sys, 'frozen', False):  # If running in a bundle (frozen)
        base_path = os.path.dirname(sys.executable)
    else:
        base_path = os.path.dirname(os.path.abspath(__file__))
    return os.path.join(base_path, relative_path)

# Load model using resource_path helper
model_path = resource_path(os.path.join("models", "Nous-Hermes-2-Mistral-7B-DPO.Q2_K.gguf"))
model = GPT4All(model_path, allow_download=False)

# System preamble (rules for AI)
system_preamble = (
    "You are a K.A.I., a helpful assistant. Always reply in clear and fluent English. "
    "Do not make things up, do not speak other languages unless asked, and do not hallucinate any extra conversation or context."
)

# Chat memory (limited)
history = [{"role": "system", "content": system_preamble}]
MAX_HISTORY = 10  # Keep last 10 interactions max

def count_tokens(text):
    return len(text.split())

def build_prompt():
    prompt = ""
    for msg in history:
        if msg["role"] == "system":
            prompt += f"{msg['content']}\n"
        elif msg["role"] == "user":
            prompt += f"User: {msg['content']}\n"
        elif msg["role"] == "assistant":
            prompt += f"Assistant: {msg['content']}\n"
    prompt += "Assistant: "
    return prompt

class ChatApp:
    def __init__(self, root):
        self.root = root
        root.title("K.A.I")
        root.geometry("600x600")
        ctk.set_appearance_mode("System")
        ctk.set_default_color_theme(resource_path("kai_theme.json"))
        root.iconbitmap(resource_path("icon.ico"))

        root.grid_rowconfigure(0, weight=1)
        root.grid_columnconfigure(0, weight=1)

        self.main_frame = ctk.CTkFrame(root)
        self.main_frame.grid(row=0, column=0, sticky="nsew")
        self.main_frame.grid_rowconfigure(0, weight=1)
        self.main_frame.grid_columnconfigure(0, weight=1)

        self.chat_display = ctk.CTkTextbox(self.main_frame, wrap="word")
        self.chat_display.grid(row=0, column=0, columnspan=2, sticky="nsew", padx=10, pady=10)
        self.chat_display.configure(state='disabled')

        self.entry = ctk.CTkEntry(self.main_frame)
        self.entry.grid(row=1, column=0, sticky="ew", padx=(10, 5), pady=10)
        self.entry.bind("<Return>", lambda e: self.send_message())

        self.send_button = ctk.CTkButton(self.main_frame, text="Send", command=self.send_message)
        self.send_button.grid(row=1, column=1, sticky="e", padx=(5, 10), pady=10)

        self.main_frame.grid_columnconfigure(0, weight=1)
        self.main_frame.grid_columnconfigure(1, weight=0)

    def send_message(self):
        user_text = self.entry.get().strip()
        if not user_text:
            return

        self.chat_display.configure(state='normal')
        self.chat_display.insert('end', f"\nYou: {user_text}\n")
        self.chat_display.configure(state='disabled')
        self.chat_display.see('end')

        self.entry.delete(0, 'end')
        self.entry.configure(state='disabled')

        self.chat_display.configure(state='normal')
        self.chat_display.insert('end', "Bot: ")
        self.chat_display.configure(state='disabled')
        self.chat_display.see('end')

        threading.Thread(target=self.process_message_streaming, args=(user_text,), daemon=True).start()

    def process_message_streaming(self, user_input):
        global history
        history.append({"role": "user", "content": user_input})

        if len(history) > MAX_HISTORY:
            history = [history[0]] + history[-MAX_HISTORY:]

        prompt = build_prompt()

        prompt_tokens = count_tokens(prompt)
        max_context = 2048
        max_response_tokens = max_context - prompt_tokens
        if max_response_tokens < 50:
            max_response_tokens = 50

        response_accum = ""

        try:
            for token in model.generate(prompt, max_tokens=max_response_tokens, streaming=True, temp=0.3):
                response_accum += token
                self.root.after(0, lambda t=token: self.append_token(t))
            response_clean = response_accum.split("User:")[0].strip()
            history.append({"role": "assistant", "content": response_clean})
        except Exception as e:
            self.root.after(0, lambda: self.append_token(f"[Error during generation]: {e}"))

        self.root.after(0, self.finish_response)

    def append_token(self, token):
        self.chat_display.configure(state='normal')
        self.chat_display.insert('end-1c', token)
        self.chat_display.configure(state='disabled')
        self.chat_display.see('end')

    def append_message(self, message):
        self.chat_display.configure(state='normal')
        self.chat_display.insert('end', message + '\n')
        self.chat_display.configure(state='disabled')
        self.chat_display.see('end')

    def finish_response(self):
        self.entry.configure(state='normal')
        self.entry.focus_set()

if __name__ == "__main__":
    root = ctk.CTk()
    app = ChatApp(root)
    root.mainloop()
