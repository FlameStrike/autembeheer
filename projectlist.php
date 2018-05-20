<?php

    include 'classes/Classes.php';

    $ProjectList = new ProjectList();
    $ProjectList->index();

    $Count = $_SESSION['ProjectCount'];
    $Result = $_SESSION['ProjectResult'];
    
?>
<?php include 'templates/header.php'; ?>
<div class="container">
    <div id="dash_header" class="row">
        <div class="col-md-12">
            <h2 class="dash_head"> Welkom <?php echo $_SESSION['username'];?>, Je bent ingelogd. <a href="index.php">Uitloggen?</a> </h2>
        </div>
    </div>
    <div id="dash_content" class="row">
        <h3> Projects </h3>
        <p> Hier staan allen projects gegeven waar je aan werkt </p>
        <table style="width: 90%; margin: 0 5%;">
            <tr>
                <th> Naam </th>
                <th> Bedrijf </th>
                <th> Type </th>
            </tr>
            <?php
            if (isset($Result)){
                while($row = mysqli_fetch_array($Result)){
                    echo "<tr>"; 
                    echo '<td><a href="project.php?id='.$row['id'].'">' . $row['Name'] . '</a></td>';
                    echo "<td>" . $row['company'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "</tr>";
                }
            };
            ?>  
        </table>
        <span><a href="dashboardadmin.php">Terug </a></span>
    </div>
</div>
<?php include 'templates/footer.php'; ?>