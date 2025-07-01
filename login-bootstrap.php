<!DOCTYPE html>
<html lang="id" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Uas pemrograman Web</title>
  <meta name="color-scheme" content="light dark">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      opacity: 0;
      transition: opacity 0.6s ease-in-out;
    }

    body.loaded {
      opacity: 1;
    }

    .form-login {
      max-width: 360px;
      width: 100%;
      padding: 2rem;
      border-radius: 15px;
      background-color: var(--bs-body-bg);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .form-title {
      font-size: 1.3rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
      color: var(--bs-primary);
    }

    .logo {
      height: 70px;
      margin-bottom: 1rem;
    }

    .alert-box {
      display: none;
    }

    .theme-toggle {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 1000;
    }

    body.theme-transition {
      opacity: 0.5;
    }

    body.theme-final {
      opacity: 1;
      transition: all 0.5s ease-in-out;
    }

    .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }

    /* ===== Fix Dark Theme ===== */
    [data-bs-theme="dark"] body {
      background-color: #121212;
      color: #f8f9fa;
    }

    [data-bs-theme="dark"] .form-login {
      background-color: #1e1e1e;
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.05);
    }

    [data-bs-theme="dark"] .form-title {
      color: #0dcaf0;
    }

    [data-bs-theme="dark"] .btn-primary {
      background-color: #0dcaf0;
      border-color: #0dcaf0;
      color: #000;
    }

    [data-bs-theme="dark"] .btn-primary:hover {
      background-color: #31d2f2;
      border-color: #31d2f2;
    }

    [data-bs-theme="dark"] .form-control {
      background-color: #2b2b2b;
      color: #f8f9fa;
      border-color: #444;
    }

    [data-bs-theme="dark"] .form-control::placeholder {
      color: #ccc;
    }

    [data-bs-theme="dark"] .form-check-label {
      color: #ccc;
    }
  </style>
</head>

<body>
  <main class="form-login text-center">
    <img src="logo.png" alt="Logo Free Fire" class="logo" loading="lazy">
    <div class="form-title">Sign In</div>

    <div id="loginAlert" class="alert alert-danger alert-box py-2">
      Incorrect password or username
    </div>

    <form id="loginForm">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="username" placeholder="Username" required>
        <label for="username">Username</label>
      </div>
      <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>
      <div class="form-check text-start mb-3">
        <input class="form-check-input" type="checkbox" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember me</label>
      </div>
      <button class="btn btn-primary w-100" type="submit">Sign In</button>
      <p class="mt-4 mb-0 text-muted small">&copy; 2024–2025 vallz-vsc </p>
    </form>
  </main>

  <div class="theme-toggle">
    <select id="themeSelect" class="form-select form-select-sm" onchange="changeTheme(this.value)">
      <option value="auto" selected>🌗 Auto</option>
      <option value="light">☀️ Light</option>
      <option value="dark">🌙 Dark</option>
    </select>
  </div>

  <script>
    window.addEventListener("DOMContentLoaded", () => {
      document.body.classList.add("loaded");
    });

    function changeTheme(value) {
      const html = document.documentElement;
      const body = document.body;

      body.classList.add("theme-transition");

      setTimeout(() => {
        html.setAttribute('data-bs-theme', value);
        localStorage.setItem('theme-mode', value);
      }, 100);

      setTimeout(() => {
        body.classList.remove("theme-transition");
        body.classList.add("theme-final");
        setTimeout(() => {
          body.classList.remove("theme-final");
        }, 600);
      }, 400);
    }

    window.addEventListener("load", () => {
      const saved = localStorage.getItem('theme-mode');
      if (saved) {
        document.documentElement.setAttribute('data-bs-theme', saved);
        document.getElementById('themeSelect').value = saved;
      }
    });

    document.getElementById("loginForm").addEventListener("submit", function (e) {
      e.preventDefault();
      const username = document.getElementById("username").value.trim();
      const password = document.getElementById("password").value.trim();
      const alertBox = document.getElementById("loginAlert");

      const savedUser = JSON.parse(localStorage.getItem("userData")) || {
        username: "usm",
        password: "123"
      };

      if (username === savedUser.username && password === savedUser.password) {
        sessionStorage.setItem("loggedIn", "true");
        window.location.href = "dashboard-bootstrap.php";
      } else {
        alertBox.style.display = "block";
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
