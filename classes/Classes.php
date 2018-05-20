<?php 
    class Login {
        
        function index($Username, $Password){
            $Username = $Username;
            $Password = $Password;
            $this->ConnectDatabase($Username, $Password);
        }
        
        function ConnectDatabase($Username, $Password){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "SELECT * FROM users WHERE username = '$Username' AND password = '$Password'";
            $Result = $dbhandle->query($sql);
            
            
            $Results = array();
            
            $Results=mysqli_fetch_array($Result);
            
            $this->CheckVariable($Results, $Username, $Password);

        }
        
        function CheckVariable($Results, $Username, $Password){   
            $CheckUsername = $Results[1];
            $CheckPassword = $Results[2];
            $CheckSecurity = $Results[5];
  
            if($CheckUsername == $Username){
                $_SESSION['username'] = $CheckUsername;
                $this->Enter($CheckSecurity);
            }
            else {
                $this->Denied();
            }
        }
        
        function Enter($CheckSecurity){
            if($CheckSecurity == 'admin'){
                echo "<script type='text/javascript'> document.location = 'dashboardadmin.php'; </script>";
                exit();
            } else if($CheckSecurity == 'werknemer'){
                echo "<script type='text/javascript'> document.location = 'dashboardwerknemer.php'; </script>";
                exit();
            } else if($CheckSecurity == 'klant'){
                echo "<script type='text/javascript'> document.location = 'dashboardklant.php'; </script>";
                exit();
            }
        }
        
        function Denied(){
            $_SESSION['error_message'] = 'Wrong username and password!';
        }
        
    }

    class CreateAcount {
        function index($NewAcount){
            $this->SplitAcount($NewAcount);
        }
        
        function SplitAcount($NewAcount){
            $UsernameNew = $NewAcount['usernameData'];
            $PasswordNew = $NewAcount['passwordData'];
            $EmailNew = $NewAcount['emailData'];
            $TelephoneNew = $NewAcount['telephoneData'];
            $SecurityNew = $NewAcount['securityData'];
            
            $this->InsertIntoDatabase($UsernameNew,$PasswordNew,$EmailNew,$TelephoneNew,$SecurityNew);
        }
        
        function InsertIntoDatabase($UsernameNew,$PasswordNew,$EmailNew,$TelephoneNew,$SecurityNew){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "
            INSERT INTO users (username,password,email,telphone,securitylevel)
            VALUES ('$UsernameNew','$PasswordNew','$EmailNew','$TelephoneNew','$SecurityNew')
            ";
            $Result = $dbhandle->query($sql);
            
            $this->Created();
        }
        
        function Created(){
            $_SESSION['succesfull_created_user'] = 'Acount was created succesfuly and is now in the system';
        }
    }

    class AcountList {

        function index(){
            $this->GetAcounts();
        }
        
        function GetAcounts(){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "SELECT * FROM users";
            $Result = $dbhandle->query($sql);
            
            $Count = mysqli_num_rows($Result);
            
            $this->Senddata($Count, $Result);
        }
        
        public function Senddata($Count, $Result){
            $_SESSION['Count'] = $Count;
            $_SESSION['Result'] = $Result;
        }
    }

    class MyAccount {
        
        function index(){
            $this->GetAccount(); 
        }
        
        function GetAccount(){
            $username = $_SESSION['username'];
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $Result = $dbhandle->query($sql);
            
            $Results = mysqli_fetch_array($Result);
            
            $this->ReturnData($Results);
        }
        
        function ReturnData($Results){
            $_SESSION['MyAccount'] = $Results;
        }
        
    }

    class CreateProject {
        function index($NewProject){
            $this->SplitAcount($NewProject);
        }
        
        function SplitAcount($NewProject){
            $ProjectNameNew = $NewProject['ProjectNameData'];
            $CompanyNew = $NewProject['companyData'];
            $ProjectTypeNew = $NewProject['projecttypeData'];
            
            $this->InsertIntoDatabase($ProjectNameNew, $CompanyNew, $ProjectTypeNew);
        }
        
        function InsertIntoDatabase($ProjectNameNew, $CompanyNew, $ProjectTypeNew){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "INSERT INTO projects (Name,company,type,images,files,content) VALUES ('$ProjectNameNew','$CompanyNew','$ProjectTypeNew','','','')";
            $Result = $dbhandle->query($sql);
            
            $this->Created();
        }
        
        function Created(){
            $_SESSION['succesfull_created_project'] = 'Project was created succesfuly and is now in the system';
        }
    }

    class addprojectgetdata {
        function index(){
            $this->ConnectDatabase1();
            $this->ConnectDatabase2();
        }
        
        function ConnectDatabase1(){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "SELECT * FROM users";
            $Result = $dbhandle->query($sql);
            
            $_SESSION['result_usernames'] = $Result;
            $_SESSION['count_usernames'] = mysqli_num_rows($Result);
        }
        
        function ConnectDatabase2(){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "SELECT * FROM projects";
            $Result = $dbhandle->query($sql);
            
            $_SESSION['result_projects'] = $Result;
            $_SESSION['count_projects'] = mysqli_num_rows($Result);
        }
    }

    class AddProjectToUser {
        function index($AddProjectData){
            $this->SplitArray($AddProjectData);
        }
        
        function SplitArray($AddProjectData){
            $gebruiker = $AddProjectData['username'];
            $project = $AddProjectData['project'];
            
            $this->ConnectDatabase($gebruiker,$project);
        }
        
        function ConnectDatabase($gebruiker,$project){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "
            INSERT INTO user2project (id_project, id_client)
            VALUES ($project ,$gebruiker)
            ";
            $Result = $dbhandle->query($sql);
            
            $this->Updated();
        }
        
        function Updated(){
            $_SESSION['succesfull_added_project'] = 'Succesfuly asigned project to user';
        }
    }

    class ProjectList {

        function index(){
            $this->GetProjects();
        }
        
        function GetProjects(){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "SELECT * FROM projects";
            $Result = $dbhandle->query($sql);
            
            $Count = mysqli_num_rows($Result);
            
            $this->Senddata($Count, $Result);
        }
        
        public function Senddata($Count, $Result){
            $_SESSION['ProjectCount'] = $Count;
            $_SESSION['ProjectResult'] = $Result;
        }
    }

    class GetProject {

        function index($ProjectID){
            $this->GetProjectDB($ProjectID);
        }
        
        function GetProjectDB($ProjectID){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "SELECT * FROM projects WHERE id = $ProjectID";
            $Result = $dbhandle->query($sql);
            
            $Results = mysqli_fetch_array($Result);
            
            $this->SendDataBack($Results);
        }
        
        function SendDataBack($Results){
            $_SESSION['ThisProject'] = $Results;
        }
    }

    class AddNote {
        
        function index($Notitie, $ProjectID){
            $this->AddNoteDB($Notitie, $ProjectID);
        }
        
        function AddNoteDB($Notitie, $ProjectID){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "
                INSERT INTO notes (project_id, note)
                VALUES ('$ProjectID' ,'$Notitie')
            ";
            $Result = $dbhandle->query($sql);
            
            if(isset($Result)){
                $this->NoteSuccesfull();
            } else {
                $_SESSION['Note_succesfulladded'] = 'Er is iets fout gegaan';
            }
        }
        
        function NoteSuccesfull(){
            $_SESSION['Note_succesfulladded'] = 'De note is toegevoegd aan het project';
        }
    }

    class GetNotes {
        
        function index($ProjectID){
            $this->GetNotesDB($ProjectID);
        }
        
        function GetNotesDB($ProjectID){
            //include database
            include('MySQL/ConnectDB.php');
            
            //MySQL query
            $sql = "SELECT * FROM notes WHERE project_id = $ProjectID";
            $Result = $dbhandle->query($sql);
            
            $this->SendDataBack($Result);
        }
        
        function SendDataBack($Result){
            $_SESSION['ThisNotes'] = $Result;
        }
    }

?>