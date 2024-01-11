
<?php
include('../session.php');
include('../config.php');


$message = null;


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if( isset($_POST['uniqe']) AND isset($_POST['section']) AND isset($_POST['password']) ){
        if( $_POST['uniqe'] != '' AND $_POST['section'] != '' AND $_POST['password'] != '' ) {


      $uniqe = trim( htmlspecialchars(filter_input(INPUT_POST,'uniqe',FILTER_SANITIZE_SPECIAL_CHARS)));
       $section = trim( htmlspecialchars(filter_input(INPUT_POST,'section',FILTER_SANITIZE_SPECIAL_CHARS)));
       $password = trim(htmlspecialchars(filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS)));
      ///////////////////////////
        if($_POST['section'] == 'admin'){
            $query = "SELECT * FROM `admin` WHERE email = '$uniqe'";
            $send = $conn->query($query);
            $resultnum = mysqli_num_rows($send);
            if($resultnum > 0){
                $result = mysqli_fetch_assoc($send);
                $password2 = $result['password'];
                if(password_verify($password,$password2)){
                    header('Location:dashboard.php');
                    $_SESSION['myuniqe'] = $uniqe;
                    $_SESSION['section'] = $section;
    
                }
    
            }
            else{
                $message = 'admin user does not exist';
            }
        }
      ////////////////////////////
      ///////////////////////////
        if($_POST['section'] == 'teacher'){
            $query = "SELECT * FROM `teachers` WHERE uniqe = '$uniqe'";
            $send = $conn->query($query);
            $resultnum = mysqli_num_rows($send);
            if($resultnum > 0){
                $result = mysqli_fetch_assoc($send);
                $password2 = $result['password'];
                if(password_verify($password,$password2)){
                    header('Location:dashboard.php');
                    $_SESSION['myuniqe'] = $uniqe;
                    $_SESSION['section'] = $section;
    
                }
    
            }
            else{
                $message = 'user does not exist';
            }
        }
      ////////////////////////////
      ///////////////////////////
        if($_POST['section'] == 'student'){

            $query = "SELECT * FROM `students` WHERE uniqe = '$uniqe'";
            $send = $conn->query($query);
            $resultnum = mysqli_num_rows($send);
            if($resultnum > 0){
                $result = mysqli_fetch_assoc($send);
                $password2 = $result['password'];
                if(password_verify($password,$password2)){
                    header('Location:dashboard.php');
                    $_SESSION['myuniqe'] = $uniqe;
                    $_SESSION['section'] = $section;
    
                }
    
            }
            else{
                $message = 'user does not exist';
            }
        }
      ////////////////////////////
      ///////////////////////////
        if($_POST['section'] == 'staff'){

            $query = "SELECT * FROM `officestaf` WHERE uniqe = '$uniqe'";
            $send = $conn->query($query);
            $resultnum = mysqli_num_rows($send);
            if($resultnum > 0){
                $result = mysqli_fetch_assoc($send);
                $password2 = $result['password'];
                if(password_verify($password,$password2)){
                    header('Location:dashboard.php');
                    $_SESSION['myuniqe'] = $uniqe;
                    $_SESSION['section'] = htmlspecialchars($_POST['section']);
    
                }
    
            }
            else{
                $message = 'user does not exist';
            }
        }
      ////////////////////////////
      
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
    <title>Log in</title>
</head>
<body>
    <div class="container-fluid bg-secondary full-vh d-flex flex-column p-0">
 
        <div class="twobox" style="flex-grow: 1;">
        <h4 class="text-center mt-3 text-capitalize text-light " style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">my school management system</h4>
        </div>
        <div class="twobox" style="height: 40vh; background-color: rgb(44, 43, 43);"></div>
        <div class="fixed position-fixed w-100 h-100 top-0 d-flex justify-content-center align-items-center">
            <div class="form bg-light col-12 col-md-6  " style="box-shadow: 0px 0px 10px 5px black; border-radius: 10px; padding: 10px;height: 50%;">
                   <form action="<?=$_SERVER['PHP_SELF']?>" class="col-12  " method="POST">

                    
                    <fbox class="col-12 mt-3 d-block">
                        <label for="Email">ID number</label>
                        <input type="text" class="form-control" name="uniqe">
                    </fbox>
                    <fbox class="col-12 mt-3  d-block">
                        <label for="Email">Password</label>
                        <input type="text" class="form-control" name="password">
                    </fbox>
                    <fbox class="col-12 mt-3  d-block">
                        <label for="Email">Section</label>
                        <select name="section" id="section" class="form-control w-25">
                            <option value=""></option>
                            <option value="admin">Admin</option>
                            <option value="staff">office staff</option>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                    </fbox>
                    <fbox class="col-12 mt-3  d-block ">
                      <button class="btn btn-primary">Login</button>
                    </fbox>
                    <small class="text-danger mb-2"><?=$message?></small>
                  
                   </form>
            </div>
        </div>

    </div>
    


    
</body>
</html>