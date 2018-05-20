<?php include 'templates/header.php'; ?>
<?php

    include 'classes/Classes.php';
    $MyAccount = new MyAccount();
    $MyAccount->index();

    $myaccount = $_SESSION['MyAccount'];
?>
<div class="container">
    <div id="dash_header" class="row">
        <div class="col-md-12">
            <h2 class="dash_head"> Welkom <?php echo $_SESSION['username'];?>, Je bent ingelogd. <a href="index.php">Uitloggen?</a> </h2>
        </div>
    </div>
    <div id="dash_content" class="row">
        <div id="myaccount">
            <h3> Mijn account </h3>
            <p> Hier staan allen gegevens van jouw account en kan je ze ook aanpassen  </p>
            <div class="container">
                <table class="myaccount_table" style="width: 80%;">
                    <tr>
                        <td> Username </td>
                        <td> <?php echo $myaccount['username'] ?> </td>
                    </tr>
                    <tr>
                        <td> Email </td>
                        <td> <?php echo $myaccount['email'] ?> </td>
                    </tr>
                    <tr>
                        <td> Telefoon </td>
                        <td> <?php echo $myaccount['telphone'] ?> </td>
                    </tr>
                    <tr>
                        <td> Rechten </td>
                        <td> <?php echo $myaccount['securitylevel'] ?> </td>
                    </tr>
                </table>
            </div>
        </div>
        <span><a href="dashboardadmin.php"> Terug </a></span>
    </div>
    
</div>
<?php include 'templates/footer.php'; ?>