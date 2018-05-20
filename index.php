<?php include 'templates/header.php'; ?>
<?php 

    include 'classes/Classes.php';

    if(isset($_POST['submit'])){
    
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        
        $Login = new Login();
        $Login->index($Username, $Password);
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="Welkommessage"> Welkom bij AutomBeheer </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-offset-4 login-page">
            <div class="form">
                <form class="login-form" method="post">
                    <input type="text" name="username" placeholder="Gebruikersnaam"/>
                    <span class="text-danger"></span>
                    <input type="password" name="password" placeholder="Wachtwoord"/>
                    <span class="text-danger"></span>
                    <input class="button-login" type="submit" name="submit" value="Login" /> 
                    <label style="color: red;"><?php
                    if(isset($_SESSION['error_message']))
                    {
                        echo $_SESSION['error_message'];
                        unset($_SESSION['error_message']);
                    }
                    ?></label>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'templates/footer.php'; ?>