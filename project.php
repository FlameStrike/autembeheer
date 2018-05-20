<?php include 'templates/header.php'; ?>
<?php include 'classes/Classes.php'; ?>
<?php 

    if(isset($_GET['id'])){
        $ProjectID = $_GET['id'];
        
        $GetProject = new GetProject();
        $GetProject->index($ProjectID);
    }

$Project = $_SESSION['ThisProject'];

    if(isset($_POST['submit'])){
        $Notitie = $_POST['note'];
        
        $AddNote = new AddNote();
        $AddNote->index($Notitie, $ProjectID);
    }

$GetNotes = new GetNotes();
$GetNotes->index($ProjectID);
?>
<div class="container">
    <div id="dash_header" class="row">
        <div class="col-md-12">
            <h2 class="dash_head"> U bevind zich op de project pagina van <?php echo $Project['Name'];?>,<a href="projectlist.php"> terug? </a></h2>
        </div>
    </div>
    <div id="dash_content" class="row">
        <div class="project_content">
            <div class="notities">
                <h4>Notities</h4>
                <div class="column-notes">
                    <form method="POST" class="addNote">
                        <label> Type hier uw notitie </label><br>
                        <textarea name="note"></textarea><br>
                        <button type="submit" name="submit"> Noteer </button>
                        <?php
                        if(isset($_SESSION['Note_succesfulladded'])){
                            echo $_SESSION['Note_succesfulladded'];
                            unset($_SESSION['Note_succesfulladded']);
                        }
                        ?>
                    </form>
                </div>
                <div class="column-notes">
                    <div class="notes_list">
                    <?php
                    if (isset($_SESSION['ThisNotes'])){
                        while($row = mysqli_fetch_array($_SESSION['ThisNotes'])){
                            echo '<p>' . $row['note'] . '</p>';
                        }
                    };
                    ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'templates/footer.php'; ?>