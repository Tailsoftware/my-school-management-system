<?php
include('../session.php');
include('../config.php');
if(empty($_SESSION['section'])){
    header("location:login.php");
}
else{
    if(isset($_POST['campusselect'])){
        if($_POST['campusselect'] !=''){
            $_SESSION['campusselect']  = htmlspecialchars($_POST['campusselect']);
        }
    } 
   
   $campusselect = $_SESSION['campusselect'];
 
$message = null;
$uniqe = $_SESSION['myuniqe'];
$section = $_SESSION['section'];





if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['school']) AND  isset($_POST['firstname']) AND isset($_POST['lastname']) AND isset($_POST['email'])  AND isset($_POST['password']) AND $_FILES['profileimg']['size'] > 0 AND $_FILES['schoolimg']['size'] > 0){
    if($_POST['school'] !="" AND  $_POST['firstname']!="" AND $_POST['lastname'] !="" AND $_POST['email'] !=""  AND $_POST['password'] !="" AND $_FILES['profileimg']['size'] > 0){

        $school = htmlspecialchars(filter_input(INPUT_POST,'school',FILTER_SANITIZE_SPECIAL_CHARS));
        $firstname = trim( htmlspecialchars(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_SPECIAL_CHARS)));
        $lastname = trim( htmlspecialchars(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_SPECIAL_CHARS)));
        $email = trim(htmlspecialchars(filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS)));
        $password = trim(htmlspecialchars(filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS)));
        $password = password_hash($password,PASSWORD_DEFAULT);
        $uniq = 'A_'.bin2hex(random_bytes(5));
        $profileimg = htmlspecialchars($_FILES['profileimg']['name']);
        $schoolimg = htmlspecialchars($_FILES['schoolimg']['name']);
        print_r($schoolimg);
        $extarray = array('png','jpg');
        $ext = pathinfo($profileimg,PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        $ext2 = pathinfo($schoolimg,PATHINFO_EXTENSION);
        $ext2 = strtolower($ext2);
        $section = 'admin';
        $destination = '../upload/'.$profileimg;
        $destination2 = '../upload/'.$profileimg;
        $tmpfolder = $_FILES['profileimg']['tmp_name'];
        $tmpfolder2 = $_FILES['schoolimg']['tmp_name'];
        $query = "SELECT * FROM `admin` WHERE email = '$email'";
        $send = $conn->query($query);
        $resultnum = mysqli_num_rows($send);
        if($resultnum > 0){
            $message='email already registered';

        }
        else{
            if(in_array($ext,$extarray) AND in_array($ext2,$extarray)){

                if(file_exists($destination)){
                    $profileimg = time().$profileimg;
                    $schoolimg = time().$schoolimg;
                    $destination = '../upload/'.$profileimg;
                    $destination2 = '../upload/'.$schoolimg;

                 
              
                    move_uploaded_file($tmpfolder,$destination);
                    move_uploaded_file($tmpfolder2,$destination2);

                


                    $query = "INSERT INTO `admin`(school,firstname,lastname,email,uniqe,profileimg,`password`,section,schoolimg) VALUES ('$school','$firstname','$lastname','$email','$uniq','$profileimg','$password','$section','$schoolimg')";
                    $send = $conn->query($query);
                    header('Location:login.php');
            
                }
                else{

                 
                    $destination = '../upload/'.$profileimg;
                    $destination2 = '../upload/'.$schoolimg;

                 
              
                    move_uploaded_file($tmpfolder,$destination);
                    move_uploaded_file($tmpfolder2,$destination2);

                

                $query = "INSERT INTO `admin`(school,firstname,lastname,email,uniqe,profileimg,`password`,section,schoolimg) VALUES ('$school','$firstname','$lastname','$email','$uniq','$profileimg','$password','$section','$schoolimg')";
                $send = $conn->query($query);
                header('Location:login.php');
            
                }
            }
              
        

        }
      


    }
    else{
        $message='invalid inputs';

      
    }
}
}
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../library/css/animate.css">
    <link rel="stylesheet" href="../../library/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../library/css/flexslider.css">
    <link rel="stylesheet" href="../../library/css/style.css">
    <script defer src="../../library/js/main.js"></script>
    <title>Register</title>
</head>
<body>
    <div class="container-fluid bg-secondary full-vh d-flex flex-column p-0">
 
        <div class="twobox" style="flex-grow: 1;">
        </div>
        <div class="twobox" style="height: 40vh; background-color: rgb(44, 43, 43);"></div>
        <div class="fixed position-fixed w-100  top-0 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="form bg-light col-12 col-md-6 mt-3 " style="box-shadow: 0px 0px 10px 5px black; border-radius: 10px; padding: 10px;height: ;">
            
                   <form action="<?=$_SERVER['PHP_SELF']?>" class="col-12" method="POST" enctype="multipart/form-data">

                    <div class="col-12 mt-3 d-block">
                        <label for="Email">School</label>
                        <input type="text" class="form-control" name="school">
                    </div>
                    <div class="col-12 mt-3 d-block">
                        <label for="Email">Firstname</label>
                        <input type="text" class="form-control" name="firstname">
                    </div>
                    <div class="col-12 mt-3 d-block">
                        <label for="Email">Lastname</label>
                        <input type="text" class="form-control" name="lastname">
                    </div>
                    <div class="col-12 mt-3 d-block">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    
                  
                    <div class="col-12 mt-3  d-block">
                        <label for="Email">Profile pictire</label>
                        <input type="file" class="form-control" name="profileimg">
                    </div>
                    <div class="col-12 mt-3  d-block">
                        <label for="Email">School picture</label>
                        <input type="file" class="form-control" name="schoolimg">
                    </div>
                    <!-- <div class="col-12 mt-3  d-block">
                        <label for="Email">Multiple picture</label>
                        <input type="file" class="form-control" name="schoolimg[]" multiple>
                    </div> -->
                    <div class="col-12 mt-3  d-block">
                        <label for="Email">Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                   
                    <div class="col-12 mt-3  d-block ">
                      <button class="btn btn-primary">Register</button>
                    </div>
                    <small class="text-danger mb-2"><?= $message?></small>
                  
                   </form>
            </div>
        </div>

    </div>
    
</body>
</html>