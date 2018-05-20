<?php include 'templates/header.php'; ?>
<?php

    include 'classes/Classes.php';

    if(isset($_POST['insert_project'])){
        $NewProject = $_POST;
        
        $CreateProject = new CreateProject();
        $CreateProject->index($NewProject);
    }

?>
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
            <form method="post" class="form-projectaanmaken">
                <div class="projectname column-left">
                    <label> Project Naam </label>
                    <input type="text" placeholder="Project Naam" name="ProjectNameData">
                </div>
                <div class="company column-left">
                    <label> Bedrijf </label>
                    <input type="text" placeholder="Bedrijf" name="companyData">
                </div>
                <div class="project-type column-left">
                    <label> Project type </label>
                    <input type="text" placeholder="projecttype" name="projecttypeData">
                </div>
                <div class="verzenden">
                    <input class="button-acountaanmaken" type="submit" name="insert_project" value="Aanmaken" /> 
                </div>
                <label style="color: green;"><?php
                    if(isset($_SESSION['succesfull_created_project']))
                    {
                        echo $_SESSION['succesfull_created_project'];
                        unset($_SESSION['succesfull_created_project']);
                    }
                    ?></label>
            </form>
        </div>
        <span><a href="dashboardadmin.php">Terug </a></span>
    </div>
</div>
<?php include 'templates/footer.php'; ?>
