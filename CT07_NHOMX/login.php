<? require "INC/init.php"; 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $conn = require "INC/db.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(User::authenticate($conn, $username, $password)){
            Auth::login();
            header("Location: index.php");
        }else{
            Dialog::show('Invalid username or password');
        }
    }
?>
<? require "INC/header.php"; ?>
<!-- Tao form dang nhap -->
<div class="content">
    <form method="post" action="" name="" id="frmLOGIN">
        <fieldset>
            <legend>Login System</legend>
            <div class="row">
                <label for="username">User name:</label>
                <span class="error">*</span>
                <input name="username" 
                id="username"
                type="text"
                placeholder="User name">
            </div>

            <div class="row">
                <label for="password">Password:</label>
                <span class="error">*</span>
                <input name="password" 
                id="password"
                type="password"
                placeholder="Password">
            </div>

            <div class="row">
                <input class="btn" type="submit" value="Login">
                <input class="btn" type="reset" value="Cancel">
            </div>
        </fieldset>
    </form>
</div>

<? require"INC/footer.php" ?>