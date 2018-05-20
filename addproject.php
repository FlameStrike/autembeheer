<?php include 'templates/header.php'; ?>
<?php

    include 'classes/Classes.php';

    $addprojectgetdata = new addprojectgetdata();
    $addprojectgetdata->index();

    $ResultUsernames = $_SESSION['result_usernames'];
    $ResultProjects = $_SESSION['result_projects'];

    if(isset($_POST['add_project'])){
        $AddProjectData = $_POST;
        
        $AddProjectToUser = new AddProjectToUser();
        $AddProjectToUser->index($AddProjectData);
    }



?>
<div class="container">
    <div id="dash_header" class="row">
        <div class="col-md-12">
            <h2 class="dash_head"> Welkom <?php echo $_SESSION['username'];?>, Je bent ingelogd. <a href="index.php">Uitloggen?</a> </h2>
        </div>
    </div>
    <div id="dash_content" class="row">
        <div id="addprojecttouser">
            <h3> add user to project? </h3>
            <p> Hier kan je een user toeweizen tot een project zodat deze klant of werknemer inzicht heeft op het project  </p>
            <form class="addproject" method="post">
                <div class="column-left">
                <label> Selecteer gebruiker </label><br>
                <select name="username">
                <?php
                    while($data = mysqli_fetch_array($ResultUsernames)){
                        echo '<option value='. $data['ID'] .'>'. $data['username'] .' </option>';   
                    }
                ?>
                </select>
                </div>
                <div class="column-left">
                <label> Selecteer project </label><br>
                <select name="project">
                <?php
                    while($data = mysqli_fetch_array($ResultProjects)){
                        echo '<option value='. $data['id'] .'>'. $data['Name'] .' </option>';
                    }    
                ?>
                </select>
                </div>
                <div class="verzenden">
                    <input class="button-addproject" type="submit" name="add_project" value="voegproject toe" /> 
                </div>
                <label style="color: green;"><?php
                    if(isset($_SESSION['succesfull_added_project']))
                    {
                        echo $_SESSION['succesfull_added_project'];
                        unset($_SESSION['succesfull_added_project']);
                    }
                    ?>
                </label>
            </form>
        </div>
        <span><a href="dashboardadmin.php">Terug </a></span>
    </div>
</div>
<?php include 'templates/footer.php'; ?>