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
   $uniqe = $_SESSION['myuniqe'];
   $myuniqe = $_SESSION['myuniqe'];
   $section = $_SESSION['section'];

   if(isset($_POST['logout'])){
      header("location:login.php");
      session_destroy();
     }
     
     if($_SESSION['section'] == 'student'){
      $attendancee ='d-none';
     $resultts ='d-none';
      $classt='d-none';
      $lbook='d-none';
      $rbook='d-none';
      $h ='0cm';
      $registration = 'd-none';
      $information = 'd-none';
      $fee = 'd-none';
      $addnewbook = 'd-none';
      $modifybook = 'd-none';
      $addnewclass ='d-none';
      $teachersd ='d-none';
      $studentd ='d-none';
      $dometryd ='d-none';
      $adddclass ='d-none';
      $adddfees ='d-none';
      $updatepricee ='d-none';
      $studentnotpermit='d-none';
      $ccselect='d-none';
      $lib ='';
  
  
     }
    else if($_SESSION['section'] == 'staff'){
      $attstu ='d-none';
     $resultts ='d-none';
      $classt='d-none';
      $h ='0cm';
  
      $lib ='d-none';
      $registration = 'd-none';
      $information = 'd-none';
      $fee = 'd-none';
      $addnewbook = 'd-none';
      $modifybook = 'd-none';
      $addnewclass ='d-none';
      $teachersd ='d-none';
      $studentd ='d-none';
      $dometryd ='d-none';
      $adddclass ='d-none';
      $adddfees ='d-none';
      $updatepricee ='d-none';
      $ccselect='d-none';
     
     }
    else if($_SESSION['section'] == 'teacher'){
     
      $h ='3cm';
      $registration = 'd-none';
      $information = 'd-none';
      $addnewbook = 'd-none';
      $modifybook = 'd-none';
      $addnewclass ='d-none';
      $teachersd ='d-none';
      $studentd ='d-none';
      $dometryd ='d-none';
      $adddclass ='d-none';
      $adddfees ='d-none';
      $updatepricee ='d-none';
      $ccselect='d-none';
      $lib ='';
  
     }
    
     else{
      $registration = '';
      $information = '';
      $fee = '';
      $addnewbook = '';
      $modifybook = '';
      $addnewclass ='';
      $teachersd ='';
      $studentd ='';
      $dometryd ='';
      $h ='10cm';
      $adddclass='';
      $adddfees ='';
      $updatepricee ='';
      $attendancee ='';
      $resultts ='';
       $classt='';
       $lbook='';
       $rbook='';
       $attstu='';
       $lib='';
       $studentnotpermit='';
       $ccselect='';
     }
  
   if($section == 'admin'){
     $admin = '';
     $teacher = 'd-none';
     $student = 'd-none';
     $uniqe = $_SESSION['myuniqe'];
    $query = "SELECT * FROM `admin` WHERE email = '$uniqe'";
    $send = $conn->query($query);
    $result = mysqli_fetch_assoc($send);
    $resultnum = mysqli_num_rows($send);
    if($resultnum>0){
    $mfirstname = $result['firstname'];
    $mlastname = $result['lastname'];
    $email = $result['email'];
    $uniqe = $result['uniqe'];
    $regdate = $result['regdate'];
    $profileimg = $result['profileimg'];
    $section = $result['section'];
    $school = $result['school'];
    $schoolimg = $result['schoolimg'];
  
    
    }
  
    
  }
  if($_SESSION['section'] == 'teacher'){
  
    $admin = 'd-none';
    $teacher = '';
    $student = 'd-none';
  
    $query = "SELECT * FROM `teachers` WHERE uniqe = '$uniqe'";
    $send = $conn->query($query);
    $result = mysqli_fetch_assoc($send);
    $resultnum = mysqli_num_rows($send);
    if($resultnum>0){
      $mfirstname = $result['firstname'];
      $mlastname = $result['lastname'];
      $school = $result['school'];
      $uniqe= $result['uniqe'];
      $class= $result['class'];
      $section= $result['section'];
      $homeaddr= $result['homeaddr'];
      $gender= $result['gender'];
      $regdate= $result['regdate'];
      $qualification= $result['qualification'];
      $familymember= $result['fmember'];
      $familyfirstname= $result['fmemberfirstname'];
      $familylastname= $result['fmemberlastname'];
      $familynumber= $result['fnumber'];
      $email= $result['email'];
      $profileimg = $result['profileimg'];
      $campus = $result['campus'];
      $campusselect = $campus;
  
    }
  
  }
  if($_SESSION['section'] == 'student'){
  
    $admin = 'd-none';
    $teacher = 'd-none';
    $student = '';
  
    $query = "SELECT * FROM `students` WHERE uniqe = '$uniqe'";
    $send = $conn->query($query);
    $result = mysqli_fetch_assoc($send);
    $resultnum = mysqli_num_rows($send);
    if($resultnum>0){
      $mfirstname = $result['firstname'];
      $mlastname = $result['lastname'];
      $uniqe= $result['uniqe'];
      $school= $result['school'];
      $class= $result['class'];
      $section= $result['section'];
      $homeaddr= $result['homeaddr'];
      $gender= $result['gender'];
      $regdate= $result['regdate'];
    $familymember= $result['fmember'];
    $familyfirstname= $result['fmemberfirstname'];
    $familylastname= $result['fmemberlastname'];
    $familynumber= $result['fnumber'];
    $email= $result['email'];
    $dob= $result['dbirth'];
    $position= $result['position'];
    $profileimg = $result['profileimg'];
    $campus = $result['campus'];
      $campusselect = $campus;
  
    }
  
  }
  if($_SESSION['section'] == 'staff'){
  
    $admin = 'd-none';
    $teacher = 'd-none';
    $student = '';
  
    $query = "SELECT * FROM `officestaf` WHERE uniqe = '$uniqe'";
    $send = $conn->query($query);
    $result = mysqli_fetch_assoc($send);
    $resultnum = mysqli_num_rows($send);
    if($resultnum>0){
      $mfirstname = $result['firstname'];
      $mlastname = $result['lastname'];
      $uniqe= $result['uniqe'];
      $school= $result['school'];
      $class= $result['class'];
      $section= $result['section'];
      $homeaddr= $result['homeaddr'];
      $gender= $result['gender'];
      $regdate= $result['regdate'];
    $familymember= $result['fmember'];
    $familyfirstname= $result['fmemberfirstname'];
    $familylastname= $result['fmemberlastname'];
    $familynumber= $result['fnumber'];
    $email= $result['email'];
    
    $profileimg = $result['profileimg'];
    $campus = $result['campus'];
      $campusselect = $campus;
  
    }
  
  }



}



if($_SERVER['REQUEST_METHOD'] == 'POST'){

   if(isset($_POST['firstname']) AND($_POST['firstname']) AND  isset($_POST['gender']) AND isset($_POST['lastname']) AND isset($_POST['class']) AND isset($_POST['homeaddr'])  AND isset($_POST['domitory'])  AND isset($_POST['fmember'])  AND isset($_POST['ffirstname'])  AND isset($_POST['flastname'])  AND isset($_POST['email'])  AND isset($_POST['campus']) AND isset($_POST['phonenumber']) AND isset($_POST['fnumber'])  AND isset($_POST['dbirth']) ){
   
   
      if($_POST['firstname'] !="" AND $_POST['firstname'] !="" AND  $_POST['gender'] !="" AND $_POST['lastname']!="" AND $_POST['class'] !="" AND $_POST['homeaddr'] !="" AND $_POST['domitory'] !="" AND $_POST['fmember'] !="" AND $_POST['ffirstname'] !="" AND $_POST['flastname'] !="" AND $_POST['email'] !="" AND $_POST['phonenumber'] !="" AND $_POST['campus'] !="" AND $_POST['fnumber'] !="" AND $_POST['dbirth'] !=""){


      $school = $school;
      $firstname = trim( htmlspecialchars(filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_SPECIAL_CHARS)));
      $campus = trim( htmlspecialchars(filter_input(INPUT_POST,'campus',FILTER_SANITIZE_SPECIAL_CHARS)));
      $lastname = trim( htmlspecialchars(filter_input(INPUT_POST,'lastname',FILTER_SANITIZE_SPECIAL_CHARS)));
      $class = trim( htmlspecialchars(filter_input(INPUT_POST,'class',FILTER_SANITIZE_SPECIAL_CHARS)));
      $sec = trim( htmlspecialchars(filter_input(INPUT_POST,'sec',FILTER_SANITIZE_SPECIAL_CHARS)));
      $section = 'student';
      $homeaddr = trim( htmlspecialchars(filter_input(INPUT_POST,'homeaddr',FILTER_SANITIZE_SPECIAL_CHARS)));
      $gender = trim( htmlspecialchars(filter_input(INPUT_POST,'gender',FILTER_SANITIZE_SPECIAL_CHARS)));
      $domitory = trim( htmlspecialchars(filter_input(INPUT_POST,'domitory',FILTER_SANITIZE_SPECIAL_CHARS)));
      $fmember = trim( htmlspecialchars(filter_input(INPUT_POST,'fmember',FILTER_SANITIZE_SPECIAL_CHARS)));
      $ffirstname = trim( htmlspecialchars(filter_input(INPUT_POST,'ffirstname',FILTER_SANITIZE_SPECIAL_CHARS)));
      $flastname = trim(filter_input(INPUT_POST,'flastname',FILTER_SANITIZE_SPECIAL_CHARS));
      $position = trim(filter_input(INPUT_POST,'position',FILTER_SANITIZE_SPECIAL_CHARS));
      $email = trim(htmlspecialchars(filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS)));
      $phonenumber = trim(htmlspecialchars(filter_input(INPUT_POST,'phonenumber',FILTER_SANITIZE_SPECIAL_CHARS)));
      $fnumber = trim(filter_input(INPUT_POST,'fnumber',FILTER_SANITIZE_NUMBER_INT));
      $dbirth = trim(filter_input(INPUT_POST,'dbirth',FILTER_SANITIZE_SPECIAL_CHARS));
      $name = $firstname.' '.$lastname;

      $uniq =  strtoupper('T_'.bin2hex(random_bytes(5)));

      $password = $uniq;
      $password = password_hash($password,PASSWORD_DEFAULT);

    
      
      $query ="INSERT INTO `students`(`sec`, `firstname`, `lastname`, `uniqe`, `class`, `section`, `homeaddr`, `domitory`, `fmember`, `fmemberfirstname`, `fmemberlastname`, `email`, `phonenumber`,fnumber,`password`,`campus`,school,dbirth,gender,position,lastattendance) VALUES ('$sec','$firstname','$lastname','$uniq','$class','$section','$homeaddr','$domitory','$fmember','$ffirstname','$flastname','$email','$phonenumber','$fnumber','$password','$campus','$school','$dbirth','$gender','$position','$name',CURRENT_TIMESTAMP())";

      $send = $conn->query($query);

      echo"<script>alert('registration succesfull')</script>";


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
        <link rel="stylesheet" href="../../library/calendar library/calendar.css">
        <link rel="stylesheet" href="../../library/fontawesome/css/font-awesome.min.css">

        <script defer src="../../library/js/jquery.js"></script>
        <script defer src="../../library/js/bootstrap.min.js"></script>

        <script defer src="../../library/js/main.js"></script>
        <script defer src="../../library/calendar library/calendar.js"></script>


        <title>Dashboard</title>
    </head>
<body>
    <div class="container-fluid full-vh  d-flex p-0" style="background-color: rgb(11, 11, 97);">

    <nav class="navigate" style="min-height: 100%;">
        <div class=" ann animate__animated  mt-3 d-flex justify-content-center align-items-center text-light position-fixed  " style="width: 2cm; height: 2cm; top: -20px;right: 0px;z-index:10;">
            <i class="fa fa-times toggle2 " style="font-size: .8cm; border:2px solid white" id="toggle2"></i>
        </div>
            <!-- logo -->
    <div class="label d-flex align-items-center  gap-3 p-3" style="height: 200px; background-color: rgb(2, 2, 68);">

<div class="profilepic " style="box-shadow: 0px 0px 10px 5px black;"> <img src="../upload/<?=$profileimg?>" alt=""> </div>
<small class="text-light"><?=$mfirstname?> &nbsp; <?=$mlastname?></small>

</div>
<!-- logo end -->
<!-- link -->
<ul class="links h-100 d-flex  list-unstyled gap-2 flex-column" style="overflow-y: scroll;overflow-x:hide;">


<!--  -->
<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="">
    <div class="formbox input-group <?=$ccselect?>">
    <select name="campusselect" id="" class="form-control" style="">

    <?php
    
    $query = "SELECT * FROM campus WHERE school = '$school'";
    $send = $conn->query($query);
    $resultnum = mysqli_num_rows($send);

    for($i=0;$i<$resultnum ;$i++){
    $result = mysqli_fetch_assoc($send);
    $campus = $result['campus'];
    ?>
    <option value=""><?=$campusselect?></option>
    <option value="<?=$campus?>"><?=$campus?></option>
   <?php
    }


    
    ?>

    </select>
    <button class="btn btn-primary">select</button>
 </div>
 </form>
<!--  -->


<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="dashboard.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-dashboard"></i> &nbsp;Dashboard</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="profile.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-user-circle"></i> &nbsp;profile</a></li>
<li class="text-light   d-flex linksa <?=$registration?>" style="min-height: 1cm; width: 100%;"><a href="registrer.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-pencil-square"></i> &nbsp;Registration</a></li>
<li class="text-light   d-flex linksa <?=$information?>" style="min-height: 1cm; width: 100%;"><a href="news.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-microphone"></i> &nbsp;information</a></li>
<li class="text-light   d-flex linksa <?=$attendancee?>" style="min-height: 1cm; width: 100%;"><a href="attendance-teacher.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-id-badge"></i> &nbsp;Attendance</a></li>
<li class="text-light   d-flex linksa <?=$movement?>" style="min-height: 1cm; width: 100%;"><a href="movement.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-street-view"></i> &nbsp;movement</a></li>

<li class="text-light   d-flex linksa <?=$fee?> " style="min-height: 1cm; width: 100%;"><a href="acountant.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-briefcase"></i> &nbsp;fee</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="payment.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-bank"></i> &nbsp;payment</a></li>
<li class="text-light   d-flex linksa  <?=$resultts?>" style="min-height: 1cm; width: 100%;"><a href="result.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-edit"></i> &nbsp;Result</a></li>
<li class="text-light   d-flex linksa <?=$classt?>" style="min-height: 1cm; width: 100%;"><a href="class.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-list-alt"></i> &nbsp;class</a></li>
<li class="text-light   d-flex linksa <?=$teachersd?>" style="min-height: 1cm; width: 100%;"><a href="teachers.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-user-secret"></i> &nbsp; Teachers</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="prefects.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-user-plus"></i> &nbsp;prefects</a></li>
<li class="text-light   d-flex linksa <?=$lib?>" style="min-height: 1cm; width: 100%;"><a href="library.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-book"></i> &nbsp;library</a></li>

<li class="text-light   d-flex linksa <?=$studentd?>" style="min-height: 1cm; width: 100%;"><a href="student.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-group"></i> &nbsp;students</a></li>
<li class="text-light   d-flex linksa <?=$dometryd?>" style="min-height: 1cm; width: 100%;"><a href="domitory.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-building"></i> &nbsp;dometory</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="noticeboard.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-bookmark"></i> &nbsp;noticeboard</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="../messenger/chat.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-comments"></i> &nbsp;message</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;padding-top:7px;"><form action="<?=$_SERVER['PHP_SELF']?>" method="POST"><button name="logout"  class="text-light text-capitalize" style="border: none; width:100%;display:flex;justify-content:flex-start;padding-left:15px;align-items:center;background-color:transparent"> <i class="fa fa-arrow-circle-left"></i> &nbsp;logout</button></form></li>

</ul>
<!-- link -->

        
        </nav>

        <div class=" ann animate__animated  d-flex justify-content-center align-items-center text-dark position-fixed  " style="width: 2cm; height: 2cm; top: -20px;left: 0px;z-index:10;">
            <i class="fa fa-bars toggle " style="font-size: .8cm;" id="toggle"></i>
        </div>
        <!-- body -->


<!-- popperEditclasslist -->
<div class="d-none poppereditcampus popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-4 bg-light position-relative" style="border-radius: 10px;height: 70%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center " style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
               <div class=" w-100">
                
               <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="formd" class="w-100" >

                <div class="input-group w-100 ">
                <input type="text" class="form-control" name="campus" id="addcampus">
                <button class="btn btn-dark addcampusbuth">Add</button>
                </div>
               </form>
               
             
              
                  <div class="d-flex flex-column gap-3 tablecamp ">
                     <?php
                  $query = "SELECT * FROM campus WHERE school = '$school'";
$send = $conn->query($query);
$resultnum = mysqli_num_rows($send);

for($i=0;$i<$resultnum ;$i++){
$result = mysqli_fetch_assoc($send);
$campus = $result['campus'];
?>

<div class="d-flex justify-content-between align-items-center mt-3 ps-3"style="border-top:1px solid gray;"> <span><?=$campus?></span> <form method="POST" id="campdel" action="<?=$_SERVER['PHP_SELF']?>"> <input type="hidden" name="campdel" value="<?=$campus?>">
<button class="btn btn-dark canselcamp">X</button> </form></div>
<?php



}
?>

                   
                  </div>
                  

                </div>
               
             

        
    </div>
    </div>
    </div>
     <!-- popperEditclassliste -->

        <!-- body -->
        <div class="body flex-grow-1 bg-light  align-items-center d-flex " style="height: 100%;"> 
        <div class="h" style=" "> <button class="btn btn-dark addcampus" >Add campus</button> <a href="registrer.php" class="btn btn-dark" style="text-align: center;">teacher</a>    <a href="registrer-student.php" class="btn btn-primary" >student</a>   <a href="officestaffreg.php" class="btn btn-dark">office staff</a></div>
        <div class="row m-0  justify-content-center w-100 sh gap-2  " style="overflow-y: scroll; height: 75%;padding: 1cm; background-color: rgba(128, 128, 128, 0.39);">
        <form action="<?=$_SERVER['PHP_SELF']?>" class="col-12 col-md-8 d-flex flex-column gap-2" method="POST">
                 <!--  -->
                 <div class="formbox">
                <label for="">Campus</label>
                <select name="campus" id="" class="form-control">

                <?php

                 $query = "SELECT * FROM campus WHERE school = '$school'";
                 $send = $conn->query($query);
                 $resultnum = mysqli_num_rows($send);

                 for($i=0;$i<$resultnum ;$i++){
                 $result = mysqli_fetch_assoc($send);
                 $campus = $result['campus'];
                 ?>
                 <option value=""></option>
                 <option value="<?=$campus?>"><?=$campus?></option>
                 <?php
               }



               ?>

               </select>             
               </div>
                <!--  -->
                <!--  -->
             <div class="formbox">
                <label for="">Firstname</label>
                <input type="text" class="form-control" name="firstname">
             </div>
                <!--  -->
                <!--  -->
             <div class="formbox">
                <label for="">Lastname</label>
                <input type="text" class="form-control" name="lastname">
             </div>
                <!--  -->
                <!--  -->
             <div class="formbox">
                <label for="">Address</label>
                <input type="text" class="form-control" name="homeaddr">
             </div>
                <!--  -->
             

              



                <!--  -->
             <div class="formbox">
                <label for="">phone no</label>
                <input type="text" class="form-control" name="phonenumber">
             </div>
                <!--  -->
                <!--  -->
             <div class="formbox">
                <label for="">Guardian Email</label>
                <input type="text" class="form-control" name="email">
             </div>
                <!--  -->
                <!--  -->
             <div class="formbox">
                <label for="">Date of Birth</label>
                <input type="date" class="form-control" name="dbirth">
             </div>
                <!--  -->
            
                <!--  -->
             
              
                <!--  -->
                <div class="formbox">
                <label for="">Class</label>
                <select name="class" id="" class="form-control">

                <?php

                 $query = "SELECT mclass FROM class WHERE school = '$school'";
                 $send = $conn->query($query);
                 $resultnum = mysqli_num_rows($send);

                 for($i=0;$i<$resultnum ;$i++){
                 $result = mysqli_fetch_assoc($send);
                 $class = $result['mclass'];
                 ?>
                 <option value=""></option>
                 <option value="<?=$class?>"><?=$class?></option>
                 <?php
               }



               ?>

               </select>             
               </div>
                <!--  -->
              
             
             <div class="formbox">
                <label for="">Family</label>
                <input type="text" class="form-control" name="fmember">
             </div>
                <!--  -->
            <!--  -->
             <div class="formbox">
                <label for="">Family Firstname</label>
                <input type="text" class="form-control" name="ffirstname">
             </div>
                <!--  -->
            <!--  -->
             <div class="formbox">
                <label for="">Family Lastname</label>
                <input type="text" class="form-control" name="flastname">
             </div>
                <!--  -->
            <!--  -->
             <div class="formbox">
                <label for="">Family Number</label>
                <input type="text" class="form-control" name="fnumber">
             </div>
                <!--  -->
            <!--  -->
             <div class="formbox">
                <label for="">Position</label>
                <input type="text" class="form-control" name="position">
             </div>
                <!--  -->
                <!--  -->
             <div class="formbox">
                <label for="" class="col-12">Gender</label>
                <label for="" class="">Male</label>
                <input type="radio" class="form-check-input" id="gender" name="gender" value="male">
                <label for="" class="">Female</label>

                <input type="radio" class="form-check-input" id="gender" name="gender" value="female">
             </div>
                <!--  -->
                <!--  -->
             <div class="formbox">
                <label for="" class="col-12">Domitory</label>
                <label for="" class="">YES</label>
                <input type="radio" class="form-check-input" id="domitory" name="domitory" value="yes">
                <label for="" class="">NO</label>

                <input type="radio" class="form-check-input" id="domitory" name="domitory" value="no">
             </div>
                <!--  -->
                <!--  -->
             <div class="formbox">
               <button class="btn btn-primary">submit</button>
             </div>
                <!--  -->

            </form>
        </div>

        </div>
        <!-- body -->
    </div>
    
</body>
</html>