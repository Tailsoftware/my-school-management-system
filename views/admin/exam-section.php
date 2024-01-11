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
$_SESSION['qnum'] = 0;

$_SESSION['qnum2'] = 1;

$_SESSION['code'] ='';
$_SESSION['starttime'] ='';
$_SESSION['endtime'] ='';
$_SESSION['subject'] ='';

if(isset($_POST['subject']) AND isset($_POST['code']) AND isset($_POST['starttime']) AND isset($_POST['endtime'])  AND isset($_POST['question'])  AND isset($_POST['opta'])  AND isset($_POST['optb'])  AND isset($_POST['optc'])  AND isset($_POST['optd']) AND isset($_POST['answer']) AND isset($_POST['mark'])){
  if($_POST['subject'] !='' AND $_POST['code'] !=''  AND $_POST['starttime'] !='' AND $_POST['endtime'] !='' AND $_POST['question'] !='' AND $_POST['opta'] !='' AND $_POST['optb'] !='' AND $_POST['optc'] !='' AND $_POST['optd'] !=''AND $_POST['answer'] !='' AND $_POST['mark'] !='' ){
    $subject =htmlspecialchars($_POST['subject']);
    $code =htmlspecialchars($_POST['code']);
    $mark =htmlspecialchars($_POST['mark']);
    $starttime =htmlspecialchars($_POST['starttime']);
    $endtime =htmlspecialchars($_POST['endtime']);

    $_SESSION['code'] = $code;
    $_SESSION['starttime'] = $starttime;
    $_SESSION['endtime'] = $endtime;
    $scode =  $_SESSION['code'];
    $school = $_SESSION['session'];
    $_SESSION['subject'] = $subject;
    $question =htmlspecialchars($_POST['question']);
    $opta =htmlspecialchars($_POST['opta']);
    $optb =htmlspecialchars($_POST['optb']);
    $optc =htmlspecialchars($_POST['optc']);
    $optd =htmlspecialchars($_POST['optd']);
    $answer =htmlspecialchars($_POST['answer']);
    $query = "INSERT INTO exam (school,campus,`subject`,code,question,opta,optb,optc,optd,answer,`starttime`,endtime,mark) VALUES ('$school','$campusselect','$subject','$code','$question','$opta','$optb','$optc','$optd','$answer','$starttime','$endtime','$mark')";
    $send = $conn->query($query);
    $query = "SELECT * FROM exam WHERE code = '$scode'";
    $send = $conn->query($query);
    $_SESSION['qnum'] = mysqli_num_rows($send);
    $_SESSION['qnum2'] =$_SESSION['qnum']+1;

  }
  else{
    echo'<script>alert("fill all necssary field")</script>';
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

      <nav class="col-3  d-flex flex-column d-none d-md-flex" style="min-height: 100%;">
        <!-- logo -->
    <div class="label d-flex align-items-center  gap-3 p-3" style="height: 200px; background-color: rgb(2, 2, 68);">

<div class="profilepic " style="box-shadow: 0px 0px 10px 5px black;"> <img src="../upload/<?=$profileimg?>" alt=""> </div>
<small class="text-light"><?=$mfirstname?> &nbsp; <?=$mlastname?></small>

</div>
<!-- logo end -->
<!-- link -->
<ul class="links h-75 d-flex justify-content-around list-unstyled gap-2 flex-column  " style="overflow-y: scroll;overflow-x:hide; padding-top:<?=$h?>;">


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
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;margin-bottom:;"><form action="<?=$_SERVER['PHP_SELF']?>" method="POST"><button name="logout"  class="text-light text-capitalize" style="border: none; width:100%;display:flex;justify-content:flex-start;padding-left:15px;align-items:center;background-color:transparent"> <i class="fa fa-arrow-circle-left"></i> &nbsp;logout</button></form></li>

</ul>
<!-- link -->

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
        <div class="body flex-grow-1 bg-light  align-items-center d-flex " style="height: 100%;">

<!-- popperstudent -->
<div class=" d-none popperstudenrdetails popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 90%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
    <!-- profilepic -->
    <div class="profilebox" style="height: 230px;">
    <div class="profilepic bg-primary" style="width: 200px; height: 200px; border-radius: 50%;">
         <img src="../res/images/paxlogo.jpg" alt="img">

    </div>
    </div>
      <!-- profilepic e -->
      <!-- teachers details -->
      <div class="mt-3 col-12">
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">Firstname :</span> &nbsp; <span>Kingsley</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">Lastname :</span> &nbsp; <span>samuel</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">reg no :</span> &nbsp; <span>234weft64777</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">class :</span> &nbsp; <span>ss1</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">section :</span> &nbsp; <span>A</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">address :</span> &nbsp; <span> no 17 ugo street</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">date of birth :</span> &nbsp; <span> 2003-12-4</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">gender :</span> &nbsp; <span> mas</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">date joined :</span> &nbsp; <span>2020-12-3 12:20:04</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">position :</span> &nbsp; <span>none</span>
        </div>
        <!--  -->
       
      
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">school fees :</span> &nbsp; <span class="text-success">paid</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">guardian :</span> &nbsp; <span>mother</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">guardian firstname :</span> &nbsp; <span>promise</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">guardian lastname :</span> &nbsp; <span>grace</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">guardian number :</span> &nbsp; <span>09163502564</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">guardian email :</span> &nbsp; <span style="text-transform: none;">mother@gmail.com</span>
        </div>
        <!--  -->
       
      </div>

                <!-- teachers details -->


    </div>
    </div>
    </div>
     <!-- popperstudente -->



     

     <!-- popperbookloan-->
<div class=" d-none  popperbookloanto  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 80%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="" class="col-12">
          <div class="input-group mt-2 form-control">
           
            <input type="text" class="form-control" placeholder="Search Book Name..">
          
            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
          </div>
         </form>



        

        <div class="table-responsive h-75 overflow-scroll mt-5 col-12" >

          
               <form action="">

                <table class="table table-striped table-bordered" style="text-transform: capitalize;">
                 <!-- s -->
                 <tr class="table-active" style="font-weight: 600;">
                         <td>#</td>
                         <td>id</td>
                         <td>gender</td>
                         <td>firstname</td>
                         <td>lastname</td>
                         <td>class</td>
                         <td>Teacher</td>
                         <td>Book name</td>
                         <td>collected</td>
                         <td>action</td>
 
                     </tr>
                     <!-- e -->
                     <!-- s -->
                     <tr class="" style="">
                         <td>1</td>
                         <td> <a href="" class="studentdetails">4543errd5</a></td>
                         <td>mrs</td>
                         <td>kingsley</td>
                         <td>samuel</td>
                         <td>jss3A</td>
                         <td>mr eze</td>
                         <td style="min-width: 3cm;">Essential English</td>
                         <td>5</td>
                         <td>
                                
                              <button class="btn btn-danger">Delete</button>

                         </td>
 
                     </tr>
                     <!-- e -->
                  

                 </table>
                </form>
 
            </div>
          

   
    </div>
    </div>
    </div>
     <!-- popper book loan e-->



     <!-- popperbookadd-->
<div class=" d-none popperbookadd  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 60%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="" class="col-12">
          <div class="formbox">
            <label for="" class="col-12">Book Name</label>
            <input type="text" class="form-control">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Price For Each</label>
            <input type="number" class="form-control img-">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Total Number of Books</label>
            <input type="number" class="form-control">

          </div>
          <div class="formbox mt-3">
            <input type="submit" class="form-control bg-primary text-light" value="Update">

          </div>
        </form>
 
        
          

   
    </div>
    </div>
    </div>
     <!-- popper book add e-->




     <!-- popperloanbook-->
<div class=" d-none popperbookloan  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 60%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="" class="col-12">
          
          
          <div class="formbox">
            <label for="" class="col-12">ID number</label>
            <input type="text" class="form-control">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Book Name</label>
            <input type="text" class="form-control">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Book Number</label>
            <input type="number" class="form-control">

          </div>
          <div class="formbox mt-3">
            <input type="submit" class="form-control bg-primary text-light" value="Update">

          </div>
        </form>
 
        
          

   
    </div>
    </div>
    </div>
     <!-- popper loanbook e-->
     <!-- popperExamquestion-->
<div class=" d-none examq popperexamq  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 100%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
      <div class="col-12 col-md-8 h-75  m-auto position-relative">
      




        <div class="table-responsive h-100 overflow-scroll mt-5" >

        <table class="table table-striped table-bordered" style="text-transform: capitalize;">
        
          
           
           
         </table>
        </div>
        </div>
        
          

   
    </div>
    </div>
    </div>
     <!-- popper examquestion-->

    

            <div class="col-12 col-md-8 h-75  m-auto position-relative">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-12">

              <button class="btn btn-dark ">Add question&nbsp;(<small class="text-danger"><?= $_SESSION['qnum2']?></small>)</button>
              <a class="btn btn-dark " href="">Download <?=$_SESSION['code']?> Exam questions</a>

              <div class="input-group mt-2">
                <button class="btn  " style="font-weight: 600;background-color: white;">Subject</button>
                <input type="text" class="form-control" placeholder="Subject name.." name="subject" value="<?=$_SESSION['subject']?>">
              </div>
              <div class="input-group">
                <button class="btn  " style="font-weight: 600;background-color: white;">Code</button>
                <input type="text" class="form-control" placeholder="exam uniqe password" name="code" value="<?=$_SESSION['code']?>">
              </div>
              <div class="input-group">
                <button class="btn  " style="font-weight: 600;background-color: white;">Start Time</button>
                <input type="time" class="form-control" placeholder="exam uniqe password" name="starttime" value="<?=$_SESSION['starttime']?>">
              </div>
              <div class="input-group">
                <button class="btn  " style="font-weight: 600;background-color: white;">End Time</button>
                <input type="time" class="form-control" placeholder="exam uniqe password" name="endtime" value="<?=$_SESSION['endtime']?>">
              </div>
              <div class="" style="width: cm;">
              <h5 class="mt-2">Question</h5>
                <textarea name="question" id="" cols="30" rows="10" class="form-control" style="height: 100px; resize: none;"></textarea>           
             </div>
              <div class="input-group">
                <button class="btn btn-light">A</button>
                <input type="text" class="form-control" placeholder="write option" name="opta">
              </div>
              <div class="input-group">
                <button class="btn btn-light">B</button>
                <input type="text" class="form-control" placeholder="write option" name="optb">
              </div>
              <div class="input-group">
                <button class="btn btn-light">c</button>
                <input type="text" class="form-control" placeholder="write option" name="optc">
              </div>
              <div class="input-group">
                <button class="btn btn-light">D</button>
                <input type="text" class="form-control" placeholder="write option" name="optd">
              </div>

              <div class="input-group">
                <button class="btn btn-light">Mark</button>
                <input type="number" class="form-control" placeholder="write option" name="mark" min="0">
              </div>
             
           
               <select name="answer" id="" class="form-control">
                <option value="">Answer</option>
                <option value="opta">A</option>
                <option value="optb">B</option>
                <option value="optc">C</option>
                <option value="optd">D</option>
               </select>
             
             

               </form>

            </div>
            
        </div>
        <!-- body -->
    </div>
    
</body>
</html>