<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="icon" type="image/png" href="img/icon/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/edit.css" />
    <title>Dataviewer</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form id="login-form" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
            <i class="symbol-input100 fas fa-envelope"></i>
              <input class="input100" id="email" type="text" placeholder="email" required>
              <span class="focus-input100"></span>
            </div>
            <div class="input-field">
              <i class="symbol-input100 fas fa-lock"></i>
              <input class="input100" id="pass" type="password" placeholder="Password" required>
              <span class="focus-input100"></span>
            </div>
            <input type="submit" value="Sign in" class="btn solid" />
            
          </form>
          
          <form id="reg" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="symbol-input100 fas fa-user"></i>
              <input class="input100" name="name" type="text" placeholder="Name" required>
              <span class="focus-input100"></span>
            </div>
            <div class="input-field">
              <i class="symbol-input100 fas fa-envelope"></i>
              <input class="input100" name="email" type="email" placeholder="Email" required>
              <span class="focus-input100"></span>
            </div>
            <div class="input-field">
              <i class="symbol-input100 fa-solid fa-cake-candles"></i>
              <input class="input100" name="dob" type="text" onfocus="this.type='date'" onblur="this.type='text'" placeholder="Date Of Birth" required>
              <span class="focus-input100"></span>
            </div>
          <div class="input-field">
              <i class="symbol-input100 fa-solid fa-phone"></i>
              <input class="input100" name="phone" pattern="[0-9]{10}" maxlength="10"  title="Please enter a valid 10-digit phone number" type="tel" placeholder="Phone no" required>
              <span class="focus-input100"></span>
            </div>
            
            <div class="input-field">
              <i class="symbol-input100 fas fa-lock"></i>
              <input class="input100" name="pass" pattern=".{8,}" title="Password must be at least 8 characters long" type="password" placeholder="Password" required>
              <span class="focus-input100"></span>
            </div>
            
            <input type="submit" class="btn" value="Sign up"/>
            
          </form>
          <div id="message"></div>

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
            Join the Community: Sign Up for Free and Dive into a World of Possibilities!
            
            </p>
            <button class="btn transparent bouncy" id="sign-up-btn">
              Sign up
            </button>
    
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>Unlock Your World: Sign in to Access Exclusive Content, Personalized Experiences, and More.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/login.js"></script>
    <script src="js/register.js"></script>
   
  </body>
</html>
