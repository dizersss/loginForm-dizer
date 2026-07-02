<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <main>
     <!-- form  -- "login"-h1 -- "username"-label  --   "password"-label --  checkbox REmember me , forgot password -- login btn and reg -->
     <div class="container justify-center d-flex flex-column align-center">
        <form class="login-card d-flex flex-column" method="POST" action="register_handler.php">
            <h2 class="title">Register</h2>

            <div class="input-box">
        <input type="text" placeholder="Username" autocomplete="off" required>
        <i class='bx bxs-user'></i>
    </div>
    
    <div class="input-box">
        <input type="password" placeholder="Password" autocomplete="new-password" required>
        <i class='bx bxs-lock-alt'></i>
    </div>

    <div class="input-box">
        <input type="password" placeholder="Confirm Password" autocomplete="new-password" required>
        <i class='bx bxs-lock-alt'></i>
    </div>
    
    <button class="btn-login" type="submit" style="margin-top: 2.5rem;">Sign Up</button>
    
    <div class="register-block flex-row d-flex justify-center align-center">
        <p>Already have an account?</p>
        <a href="index.php" class="link-register">Login</a> 
    </div>  
        </form>
     </div>
    </main>
</body>
</html>