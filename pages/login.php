<div class="container">
    <h1 class="mb-4 pb-2">Login or register</h1>
    <script>
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <?php
        $User = new User($Conn);
        if($_POST['reg']) {
            if (!$_POST['email']) {
                $error = "Email not set";
            } else if (!$_POST['password']) {
                $error = "Password not set";
            } else if (!$_POST['password_confirm']) {
                $error = "Password not set";
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error = "Email address is not valid";
            } else if ($_POST['password'] !== $_POST['password_confirm']) {
                $error = "Password and confirm password do not match";
            } else if (strlen($_POST['password']) < 8) {
                $error = "Password must be at least 8 characters in length";
            }
            if($error) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php
            } else {
                //create and login user
                $attempt = $User->createUser($_POST);
                echo $attempt;
                if ($attempt) {
                    $user_data = $User->loginUser($_POST);
                    if ($user_data) {
                        $_SESSION['is_loggedin'] = true;
                        $_SESSION['user_data'] = $user_data;
                        header('Location: index.php');
                    }
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        An error occurred, please try again later
                    </div>
                <?php
                }
            }
        } else if($_POST['login']) {
            if (!$_POST['email']) {
                $error = "Email not provided";
            } else if (!$_POST['password']) {
                $error = "Password not provided";
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error = "Email address is not valid";
            } else if (strlen($_POST['password']) < 8) {
                $error = "Password must be at least 8 characters in length";
            }
            if($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php
                } else {
                //login
                $user_data = $User->loginUser($_POST);
                if ($user_data) {
                    if ($user_data['password_attempts'] > 5) { ?>
                        <div class="alert alert-danger" role="alert">
                        Login credentials are incorrect
                        </div>
                    <?php
                    } else {
                        $_SESSION['is_loggedin'] = true;
                        $_SESSION['user_data'] = $user_data;
                        header('Location: index.php');
                    }
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Login credentials are incorrect
                    </div>
                <?php
                }
            }
        }
    ?>
    <div class="row">
    <div class="col-lg-6">
        <form id="registration-form" method=post action="">
        <div class="form-group">
            <label for="reg_first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name">
        </div>
        <div class="form-group">
            <label for="reg_surname">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname">
        </div>
        <div class="form-group">
            <label for="reg_email">Email address</label>
            <input type="email" class="form-control" id="reg_email" name="email">
        </div>
        <div class="form-group">
            <label for="reg_password">Password</label>
            <input type="password" class="form-control" id="reg_password" name="password">
            <input type="checkbox" onclick="myFunction('reg_password')">Show Password
        </div>
        <div class="form-group">
            <label for="reg_password_confirm">Confirm Password</label>
            <input type="password" class="form-control" id="reg_password_confirm" name="password_confirm">
            <input type="checkbox" onclick="myFunction('reg_password_confirm')">Show Confirm Password
        </div>
        <div class="form-group">
            <label for="reg_phone">Phone number</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="reg_address_line_1">Address Line 1</label>
            <input type="text" class="form-control" id="address_line_1" name="address_line_1">
        </div>
        <div class="form-group">
            <label for="reg_address_line_2">Address Line 2</label>
            <input type="text" class="form-control" id="address2" name="address_line_2">
        </div>
        <div class="form-group">
            <label for="reg_address_line_3">Address Line 3</label>
            <input type="text" class="form-control" id="address3" name="address_line_3">
        </div>
        <div class="form-group">
            <label for="reg_postcode">Postcode</label>
            <input type="text" class="form-control" id="postcode" name="postcode">
        </div>
        <button type="submit" name="reg" value="1" class="btn btn-ybac">Register and login</button>
        </form>
    </div>
    <div class="col-lg-6">
        <form id="login-form" method=post action="">
        <div class="form-group">
            <label for="login_email">Email address</label>
            <input type="email" class="form-control" id="login_email" name="email">
        </div>
        <div class="form-group">
            <label for="login_password">Password</label>
            <input type="password" class="form-control" id="login_password" name="password">
            <input type="checkbox" onclick="myFunction('login_password')">Show Password
        </div>
        <button type="submit" name="login" value="1" class="btn btn-ybac">Login</button>
        </form>
    </div>
    </div>
</div>