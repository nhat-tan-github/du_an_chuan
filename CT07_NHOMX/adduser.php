<?require "INC/init.php";
    //Auth::requireLogin(); //Bat buoc phai dang nhap

    // validation
    $usernameError = "";
    $passwordError = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Validate username
        $username = $_POST['username'];
        $user_pattern = "/^[A-Za-z]*$/";
        if(!preg_match($user_pattern, $username)){
            $usernameError = "Only characters are validate";
        }

        // Validate password
        $password = $_POST['password'];
        $pass_pattern = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
        if(!preg_match($pass_pattern, $password)){
            $passwordError = "Has minimum 8 characters in length, At least 1 lowercare letter ";
        }

        if($usernameError == "" && $passwordError == ""){
            $conn = require "INC/db.php";
            // tao moi user
            $user = new User($username, $password);
            try{
                if($user->addUser($conn)){
                    Dialog::show("Added user successfully!");
                }else{
                    Dialog::show("Cannot Add User");
                }
            }
            catch(PDOException $e){
                Dialog::show($e->getMessage());
                // co the xu ly trang 404 o day . . . . 
            }
        }else{
            Dialog::show("Error !!!");
            // co the xu y trang 404 o day . . . . 
        }
    }
    

?>
<?require "INC/header.php"?>
<!-- Tao from nhap user -->

<div class="content">
    <form name="frmADDUSER" method="POST" id="frmADDUSER" action="">
        <fieldset>
            <legend>User Information</legend>
            <div class="row">
                <label for="username">User Name:</label>
                <input name="username" id="usernanme" type="text" placeholder="User name">
                <?echo "<span class ='error'> $usernameError </span>"?>
            </div>

            <div class="row">
                <label for="password">Password:</label>
                <input name="password" id="password" type="password" placeholder="Password">
                <?echo "<span class ='error'> $passwordError </span>"?>
            </div>

            <div class="row">
                <input class="btn" type="submit" value="Login">
                <input class="btn" type="reset" value="Cancel">
            </div>
        </fieldset>
    </form>
</div>

<?require "INC/footer.php"?>