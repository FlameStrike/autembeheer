<?php include 'templates/header.php'; ?>
<?php include 'classes/Classes.php'; ?>
<div class="container">
    <div id="dash_header" class="row">
        <div class="col-md-12">
            <h2 class="dash_head"> Welkom <?php echo $_SESSION['username'];?>, Je bent ingelogd. <a href="classes/Logout.php">Uitloggen?</a> </h2>
        </div>
    </div>
    <div id="dash_content" class="row">
        <div id="accounts">
            <div class="header-accountmanagement">
                <i class="far fa-user user_icon"></i>
                <h3> Account management </h3>
            </div>
            <div class="account-menu">
                <ul>
                    <li><a href="mijnacount.php"> Mijn gebruiker </a></li>
                    <li><a href="acountlist.php"> Lijst met gebruikers </a></li>
                    <li><a href="acountaanmaken.php"> gebruiker aanmaken</a></li>
                    <li><a href="addproject.php"> project toewijzen aan gebruiker</a></li>
                </ul>
            </div>
        </div>
        <div id="projects">
            <div class="header-projects">
                <i class="fas fa-wrench project_icon"></i>
                <h3> Projects </h3>
            </div>
            <div class="project-menu">
                <ul>
                    <li><a href="projectlist.php"> Lijst met projecten </a></li>
                    <li><a href="projectaanmaken.php"> Project aanmaken</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include 'templates/footer.php'; ?>