<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>መጠይቅ Survey</title>
    <link rel="shortcut icon" href="../Resources/logo.png">
    <link rel="shortcut icon" href="../Resources/logo.png">
    <!-- <link rel="stylesheet" href="login.css"> -->
</head>

<body>
    <div id="container">
        <div id="left-card" class="card">
            <img src="../Resources/signupcard.jpg" alt="Left card" width="550px">
        </div>
        <div id="right-card" class="card">
            <div>
                <img src="../Resources/logo.png" alt="logo" width="50px">
            </div>
            <div>
                <h1>Sign Up</h1>
                <p>Welcome to our community fellow surveyee! </p>
            </div>
            <div>
                <form method="POST" action="../Resources/php/auth.php">
                    <label for="firstname">First Name</label> <br>
                    <input type="textarea" name="firstname" id="firstname" class="textbox" placeholder="First Name" required> <br>
                    <label for="lastname">Last Name</label> <br>
                    <input type="textarea" name="lastname" id="lastname" class="textbox" placeholder="Last Name" required> <br>
                    <label for="password">Password</label>
                    <div class="btn">
                        <input type="password" name="password" id="password" class="textbox" placeholder="Password" required> <br>
                        <a href="">
                            <img src="../Resources/hidden.png" alt="Hidden Password" width="30px">
                        </a>
                        <a href="">
                            <img src="../Resources/show.png" alt="Shown Password" width="30px">
                        </a>
                    </div>
                    <label for="Confirm">Confirm Password</label>
                    <div class="btn">
                        <input type="password" name="password" id="Confirm" class="textbox" placeholder="Confirm Password" required> <br>
                        <a href="">
                            <img src="../Resources/hidden.png" alt="Hidden Password" width="30px">
                        </a>
                        <a href="">
                            <img src="../Resources/show.png" alt="Shown Password" width="30px">
                        </a>
                    </div>
                    <input type="submit" name="login" value="Login" class="btn">
                </form>
                <p>
                    Don't have an account?
                    <a href="">
                        Sign Up
                    </a>
                </p>
            </div>
            <p>
                &copy; መጠይቅ Survey 2022
            </p>
        </div>
</body>

</html>