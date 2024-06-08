<!DOCTYPE html>
<html lang="en">
<?php include 'view/head.php'; ?>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0  "style="background-color: transparent;">
          <div class="card-body p-4 p-sm-5">
            <img class="" src="assets/img/logo.png" alt="..." style="width: 350px"/>
            <p class=" text-center mb-3 fw-light fs-5">Sign up</p>
            <form class="login-form" action="registerC.php" method="post">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama" name="nama" required>
                <label for="nama" class="text-black">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" required>
                <label for="email" class="text-black">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" required>
                <label for="password" class="text-black">Password</label>
                <i class="fas fa-eye toggle-password" id="togglePasswordIcon"></i>
              </div>
              <div class="d-grid mb-3">
                <input class="btn btn-info btn-login text-uppercase text-white fw-bold" type="submit" style="background-color:#295bac;" name="submit" value="Log in">
              </div>
              <div class="d-grid mb-3">
                <button class="btn btn-secondary text-black text-uppercase fw-bold" type="submit" style="background-color:white;">
                  <i class="fab fa-google me-2"></i> Sign Up with Google
                </button>
              </div>
            </form>
            <p class="auth-link text-center text-black"><a>Already have an account?</a> <a href="login" style="color: blue;">Log in</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
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
  </script>
</body>
</html>
