<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" href="assets/mini logo.png" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    /* General Styles */
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      position: relative;
      background-image : url("../assets/img/bg.jpg")
    }

    header {
      padding: 20px;
    }

    .header-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .logo {
      width: 150px;
      height: auto;
    }

    .site-heading {
      text-align: center;
    }

    .site-heading-upper {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    .site-heading-lower {
      font-size: 16px;
      color: #666;
    }

    /* Forms and Authentication Styles */
    .login-container {
      display: flex;
      justify-content: center;
      align-items: start;
      max-width: 500px;
      margin: 0 auto;
      padding: 40px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    .login-form {
      width: 400px;
    }

    .login-form h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-form label {
      display: block;
      margin-bottom: 5px;
    }

    .login-form input,
    .login-form textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }

    .login-form input:focus,
    .login-form textarea:focus {
      outline: none;
      border-color: #999;
    }

    .login-form button {
      background-color: #076ce9;
      color: #fff;
      padding: 10px 184px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .login-form button:hover {
      background-color: #;
    }
    .login-button{
        
    }

    .auth-link {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #666;
    }

    /* Error Messages */
    .error {
      color: red;
      margin-bottom: 10px;
    }

    /* Success Messages */
    .success {
      color: green;
      margin-bottom: 10px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .login-container {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="header-container">
      <img src="assets/mini logo.png" class="logo">
      <h1 class="site-heading">Balance</h1>
    </div>
  </header>

  <main>
    <div class="login-container">
      <div class="login-form">
        <h2>Login</h2>
        <form action="login.php" method="post">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
          <button class = "login-button" type="submit">Login</button>
        </form>
        <p class="auth-link"><a>Don't have an account?</a> <a href="register.php">Sign Up</a></p>
        <p class="auth-link"><a href="forgot_password.php">Forgot your Password?</a></p>
      </div>
    </div>
  </main>

  <script>
    // JavaScript code for form validation and responsiveness

    // Form Validation
    const loginForm = document.querySelector('.login-form form');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    loginForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent default form submission

    // Validate email input
    if (!validateEmail(emailInput.value)) {
        alert('Invalid email format. Please enter a valid email address.');
        emailInput.focus();
        return;
    }

    // Validate password input
    if (passwordInput.value.length < 6) {
        alert('Password must be at least 6 characters long.');
        passwordInput.focus();
        return;
    }

    // Submit the form if both email and password are valid
    loginForm.submit();
    });

    function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+)(\.[^<>()\[\]\\.,;:\s@"]+)*)@(([^<>()\[\]\\.,;:\s@"]+)(\.[^<>()\[\]\\.,;:\s@"]+)*)$/;
    return re.test(email);
    }

    // Responsiveness: Adjust login form and image based on screen size
    window.addEventListener('resize', () => {
    const loginContainer = document.querySelector('.login-container');
    const loginImage = document.querySelector('.login-image');

    if (window.innerWidth < 768) {
        // For smaller screens, stack login form and image vertically
        loginContainer.style.flexDirection = 'column';
        loginImage.style.width = '100%';
    } else {
        // For larger screens, place login form and image side-by-side
        loginContainer.style.flexDirection = 'row';
        loginImage.style.width = '400px';
    }
    });

  </script>
</body>
</html>
