<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>K.A.I - Offline AI at Your Fingertips</title>
  <meta name="description" content="K.A.I is an offline AI desktop suite focused on privacy and speed. No cloud required.">
  <meta name="keywords" content="offline AI, K.A.I, privacy-first AI, local machine learning, desktop AI tools">
  <link rel="canonical" href="https://kai.great-site.net">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <style>
    body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
  background: #050505;
  color: #e0faff;
  text-shadow: 0 0 2px rgba(0, 255, 255, 0.05);
}

section[id] {
  scroll-margin-top: 80px;
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 2rem;
  background-color: #0a0a0a;
  border-bottom: 1px solid #1f1f1f;
  box-shadow: 0 0 15px rgba(0, 255, 255, 0.05);
}

.logo {
  font-size: 1.75rem;
  color: #00ffff;
  font-weight: bold;
  text-shadow: 0 0 8px #0ff;
}

nav ul {
  list-style: none;
  display: flex;
  gap: 1.5rem;
  margin: 0;
  padding: 0;
}

nav a {
  color: #b8f6ff;
  text-decoration: none;
  transition: color 0.3s;
}

nav a:hover,
nav a:focus {
  color: #0ff;
  text-shadow: 0 0 4px #0ff;
}

.hero {
  padding: 5rem 2rem;
  text-align: center;
  background: radial-gradient(circle at top, #0c0c0c 0%, #090f12 50%, #061014 100%);
  animation: gradientShift 40s ease infinite;
  position: relative;
  z-index: 0;
}

.hero h1 {
  color: #00ffff;
  font-size: 2.5rem;
  text-shadow: 0 0 8px #00ffff, 0 0 16px rgba(0, 255, 255, 0.4);
  animation: glow 2.5s ease-in-out infinite alternate;
}

@keyframes glow {
  from {
    text-shadow: 0 0 6px #0ff, 0 0 12px #0ff66;
  }
  to {
    text-shadow: 0 0 10px #0ff, 0 0 20px #0ff88;
  }
}

.hero p {
  font-size: 1.3rem;
  max-width: 650px;
  margin: 1rem auto;
  color: #b2dfe6;
  text-shadow: 0 0 2px rgba(0, 255, 255, 0.1);
}

.cta-button {
  display: inline-block;
  margin-top: 1.5rem;
  padding: 0.85rem 2.2rem;
  background: #00ffff;
  color: #000;
  text-decoration: none;
  border-radius: 0.6rem;
  font-weight: bold;
  cursor: pointer;
  box-shadow: 0 0 10px #0ff99;
  transition: all 0.3s ease;
}

.cta-button:hover,
.cta-button:focus {
  background: #0cc;
  box-shadow: 0 0 15px #0ff;
  outline: 2px solid #0ff;
  outline-offset: 2px;
}

.features {
  padding: 3rem 2rem;
  background: #101010;
  box-shadow: inset 0 0 15px rgba(0, 255, 255, 0.04);
}

.features h2 {
  text-align: center;
  margin-bottom: 2rem;
  color: #0ff;
  text-shadow: 0 0 5px #0ff77;
}

.feature-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
}

.feature {
  background: #0c0c0c;
  padding: 1.5rem;
  border-radius: 0.75rem;
  border-left: 4px solid #00ffff;
  box-shadow: 0 0 20px rgba(0, 255, 255, 0.1);
  transition: all 0.3s ease;
}

.feature:hover,
.feature:focus-within {
  transform: translateY(-5px);
  box-shadow: 0 0 25px rgba(0, 255, 255, 0.25);
}

.feature h3 {
  color: #0ff;
  margin-top: 0;
}

.download {
  padding: 3rem 2rem;
  text-align: center;
  background: #0a0a0a;
}

.download h2 {
  color: #0ff;
  margin-bottom: 1rem;
  text-shadow: 0 0 4px #0ff88;
}

.download-buttons .btn {
  margin: 0.5rem;
  padding: 0.75rem 2rem;
  background: #00ffff;
  color: #000;
  border-radius: 0.5rem;
  font-weight: bold;
  cursor: pointer;
  text-decoration: none;
  box-shadow: 0 0 12px #0ff99;
  transition: all 0.3s ease;
}

.download-buttons .btn:hover,
.download-buttons .btn:focus {
  background: #0cc;
  box-shadow: 0 0 18px #0ffcc;
  outline: 2px solid #0ff;
  outline-offset: 2px;
}

.updates {
  padding: 3rem 2rem;
  background: #111;
  box-shadow: inset 0 0 15px rgba(0, 255, 255, 0.03);
}

.updates h2 {
  color: #0ff;
  text-align: center;
  margin-bottom: 2rem;
  text-shadow: 0 0 4px #0ff77;
}

.changelog .update {
  margin-bottom: 1rem;
  border-bottom: 1px solid #222;
  padding-bottom: 0.5rem;
  color: #cceeff;
  transition: transform 0.3s ease, background 0.3s;
}

.changelog .update:hover,
.changelog .update:focus {
  transform: scale(1.02);
  background: rgba(0, 255, 255, 0.05);
}

.footer {
  background: #0a0a0a;
  text-align: center;
  padding: 2rem;
  border-top: 1px solid #1f1f1f;
  color: #ccc;
}

.newsletter {
  margin-top: 1rem;
}

.newsletter input[type=email] {
  padding: 0.5rem;
  width: 250px;
  margin-right: 0.5rem;
  border-radius: 4px;
  border: 1px solid #333;
  background: #151515;
  color: #e0faff;
  transition: border-color 0.3s, box-shadow 0.3s;
  font-size: 1rem;
}

.newsletter input[type=email]:focus {
  border-color: #0ff;
  box-shadow: 0 0 10px #0ff55;
  outline: none;
}

.newsletter button {
  padding: 0.5rem 1rem;
  border: none;
  background: #0ff;
  color: #000;
  font-weight: bold;
  border-radius: 4px;
  cursor: pointer;
  transition: background 0.3s;
  font-size: 1rem;
  box-shadow: 0 0 10px #0ff88;
}

.newsletter button:hover,
.newsletter button:focus {
  background: #0cc;
  box-shadow: 0 0 15px #0ff;
  outline: 2px solid #0ff;
  outline-offset: 2px;
}

.menu-toggle {
  display: none;
  background: none;
  border: none;
  color: #0ff;
  font-size: 2rem;
  cursor: pointer;
}

.btn.coming-soon {
  background-color: #444;
  color: #ccc;
  cursor: default;
  box-shadow: none;
  pointer-events: none;
  display: inline-block;
  opacity: 0.6;
}

@media (max-width: 600px) {
  nav ul {
    display: none;
    flex-direction: column;
    gap: 0;
    background: #121212;
    position: absolute;
    top: 60px;
    right: 2rem;
    width: 150px;
    border-radius: 0.5rem;
    box-shadow: 0 0 15px #0ff66;
  }

  nav ul.show {
    display: flex;
  }

  nav ul li {
    margin: 0;
    padding: 1rem;
    border-bottom: 1px solid #333;
  }

  nav ul li:last-child {
    border-bottom: none;
  }

  .download-buttons .btn {
    display: block;
    width: 100%;
    margin: 0.5rem auto;
  }

  .menu-toggle {
    display: block;
  }
}
  </style>
</head>
<body>
  <header class="header">
    <div class="logo">K.A.I</div>
    <nav>
      <ul>
        <li><a href="#features">Features</a></li>
        <li><a href="#download">Download</a></li>
        <li><a href="#updates">Updates</a></li>
      </ul>
    </nav>
    <button class="menu-toggle" aria-label="Toggle menu">&#9776;</button>
  </header>

  <section class="hero">
    <h1>Offline AI. Ultimate Privacy.</h1>
    <p>K.A.I is a powerful offline AI application that respects your privacy and performs locally.</p>
    <a href="#download" class="cta-button">Download Now</a>
  </section>

  <section id="features" class="features">
    <h2>Why Choose K.A.I?</h2>
    <div class="feature-grid">
      <div class="feature" tabindex="0">
        <h3>Offline Intelligence</h3>
        <p>No cloud, no compromise. K.A.I works entirely without internet access.</p>
      </div>
      <div class="feature" tabindex="0">
        <h3>Secure by Design</h3>
        <p>Data stays on your device. Always.</p>
      </div>
      <div class="feature" tabindex="0">
        <h3>Performance Optimized</h3>
        <p>Designed to run fast and lean on modern systems.</p>
      </div>
    </div>
  </section>

  <section id="download" class="download">
    <h2>Download K.A.I</h2>
    <p>Choose your platform and get started instantly.</p>
    <div class="download-buttons">
      <a href="downloads/K.A.I-win.zip" class="btn">Windows</a>
      <span class="btn coming-soon" title="Coming soon">macOS (Coming Soon)</span>
      <span class="btn coming-soon" title="Coming soon">Linux (Coming Soon)</span>
    </div>
  </section>

  <section id="updates" class="updates">
    <h2>Update History</h2>
    <div class="changelog">
      <div class="update"><strong>2025-06-09</strong>: Version 1.0 - K.A.I is released</div>
    </div>
  </section>

  <footer class="footer">
    <p>&copy; 2025 K.A.I. All rights reserved.</p>
    <form action="https://formspree.io/f/your-form-id" method="POST" class="newsletter">
      <input type="email" name="email" placeholder="Join our newsletter" required />
      <button type="submit">Subscribe</button>
    </form>
  </footer>

  <script>
  // Toggle mobile menu
  const menuToggle = document.querySelector('.menu-toggle');
  const navUl = document.querySelector('nav ul');

  menuToggle.addEventListener('click', () => {
    navUl.classList.toggle('show');
  });

  // Smooth Scroll for all anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth' });

        // Hide mobile menu after click (optional UX improvement)
        navUl.classList.remove('show');
      }
    });
  });
</script>
</body>
</html>