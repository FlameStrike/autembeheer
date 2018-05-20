<?php include 'templates/header.php'; ?>
<div class="container">
    <div id="dash_header" class="row">
        <div class="col-md-12">
            <h2 class="dash_head"> Welkom <?php echo $_SESSION['username'];?>, Je bent ingelogd. <a href="classes/Logout.php">Uitloggen?</a> </h2>
        </div>
    </div>
    <nav id="dashboard_nav">
        <ul style="overflow: auto;">
            <li class="parent-item">
                <a href="#"> Accounts </a>
                <ul class="sub-menu">
                    <li><a href="#">Mijn account</a></li>
                    <li><a href="#">Accounts</a></li>
                </ul>
            </li>
            <li class="parent-item">
                <a href="#"> Projects </a>
            </li>
        </ul>
    </nav>
</div>
<?php include 'templates/footer.php'; ?>