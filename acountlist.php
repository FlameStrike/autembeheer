<?php

    include 'classes/Classes.php';

    $AcountList = new AcountList();
    $AcountList->index();

    $Count = $_SESSION['Count'];
    $Result = $_SESSION['Result'];

    
?>
<?php include 'templates/header.php'; ?>
<div class="container">
    <div id="dash_header" class="row">
        <div class="col-md-12">
            <h2 class="dash_head"> Welkom <?php echo $_SESSION['username'];?>, Je bent ingelogd. <a href="index.php">Uitloggen?</a> </h2>
        </div>
    </div>
    <div id="dash_content" class="row">
        <h3> acounts </h3>
        <p> Hier staan allen gegevens van de klant ter beschikking. Aanpassingen kunnen ook worden door gevoerd maar alleen door de mesen met admin rechten </p>
        <table style="width: 90%; margin: 0 5%;">
            <tr>
                <th> Naam </th>
                <th> Email </th>
                <th> Telefoonnummer </th>
                <th> Rechten </th>
            </tr>
            <?php
            if (isset($Result)){
                while($row = mysqli_fetch_array($Result)){
                    echo "<tr>"; 
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>0" . $row['telphone'] . "</td>";
                    echo "<td>" . $row['securitylevel'] . "</td>";
                    echo "</tr>";
                }
            };
            ?>  
        </table>
        <span><a href="dashboardadmin.php">Terug </a></span>
    </div>
</div>
<?php include 'templates/footer.php'; ?>