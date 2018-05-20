<?php

    include 'classes/Classes.php';

    if(isset($_POST['insert_acount'])){
        
        $NewAcount = $_POST;
        
        $CreateAcount = new CreateAcount();
        $CreateAcount->index($NewAcount);
    }

?>
<?php include 'templates/header.php'; ?>
<div class="container">
    <div id="dash_header" class="row">
        <div class="col-md-12">
            <h2 class="dash_head"> Welkom <?php echo $_SESSION['username'];?>, Je bent ingelogd. <a href="index.php">Uitloggen?</a> </h2>
        </div>
    </div>
    <div id="dash_content" class="row">
        <div id="acountaanmaken">
            <h3> acount aanmaken? </h3>
            <p> Hier kunt u een account aanmaken voor de klant, een van je medewerkers of zelfs voor een productieleider. Dit account zou de juiste aanpassingen en functies kunnen uitvoeren </p>
            <form method="post" class="form-acountaanmaken">
                <div class="username column-left">
                    <label> Username </label>
                    <input type="text" placeholder="Gebruikersnaam" name="usernameData">
                </div>
                <div class="password column-left">
                    <label> password </label>
                    <input type="password" placeholder="Wachtwoord" name="passwordData">
                </div>
                <div class="email column-left">
                    <label> Email </label>
                    <input type="email" placeholder="Email" name="emailData">
                </div>
                <div class="telephone column-left">
                    <label> Telefoon </label>
                    <input type="number" placeholder="telefoon" name="telephoneData"> 
                </div>
                <div class="security column-left">
                    <label> Beveileging </label>
                    <select name="securityData">
                        <option value="admin">Admin</option>
                        <option value="werknemer">Werknemer</option>
                        <option value="klant">Klant</option>
                    </select>
                </div>
                <div class="verzenden">
                    <input class="button-acountaanmaken" type="submit" name="insert_acount" value="Aanmaken" /> 
                </div>
                <label style="color: green;"><?php
                    if(isset($_SESSION['succesfull_created_user']))
                    {
                        echo $_SESSION['succesfull_created_user'];
                        unset($_SESSION['succesfull_created_user']);
                    }
                    ?></label>
            </form>
        </div>
        <span><a href="dashboardadmin.php">Terug </a></span>
    </div>
</div>
<?php include 'templates/footer.php'; ?>



