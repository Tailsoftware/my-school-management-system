<?php
include('../session.php');
include('../config.php');
if(empty($_SESSION['section'])){
    header("location:../admin/login.php");
}
else{
    if(isset($_POST['campusselect'])){
        if($_POST['campusselect'] !=''){
            $_SESSION['campusselect']  = htmlspecialchars($_POST['campusselect']);
        }
    } 
   
   $uniqe = $_SESSION['myuniqe'];
   $myuniqe = $_SESSION['myuniqe'];
   $section = $_SESSION['section'];
   if(isset($_POST['logout'])){
    header("location:../admin/login.php");
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
  $campusselect = $_SESSION['campusselect'];

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
  $query = "SELECT `online` FROM `admin` WHERE uniqe = '$uniqe'";
      $send = $conn->query($query);
      $result = mysqli_fetch_assoc($send);
    $online = $result['online'];
      $currenttime = time();
      $online =$online+180;
      if($currenttime > $online){
       $stat ='offline';
       $color ='red';
      }
      else{
         $stat ='online';
       $color='rgb(9, 253, 9)';
      }


  $_post = file_get_contents('php://input');
  $_post = json_decode($_post,true);
  if($_post != null){
    if(isset($_post['online'])){
      $query = "UPDATE `admin` SET `online` ='".time()."' WHERE uniqe ='$uniqe'";
      $send = $conn->query($query);
      $query = "SELECT `online` FROM `admin` WHERE uniqe = '$uniqe'";
      $send = $conn->query($query);
      $result = mysqli_fetch_assoc($send);
      $online = $result['online'];
      $currenttime = time();
      $online =$online+180;

      if($online > $currenttime){
        $stat ='online';
     $color ='rgb(9, 253, 9)';
      }
      else if($currenttime > $online+180){
        $stat ='offline';
       $color ='red';
       }
      exit();
    }
    
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
  $query = "SELECT `online` FROM `teachers` WHERE uniqe = '$uniqe'";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
$online = $result['online'];
  $currenttime = time();
  $online =$online+180;
  if($currenttime > $online){
   $stat ='offline';
   $color ='red';
  }
  else{
     $stat ='online';
   $color='rgb(9, 253, 9)';
  }



  $_post = file_get_contents('php://input');
  $_post = json_decode($_post,true);
  if($_post != null){
    if(isset($_post['online'])){
      $query = "UPDATE `teachers` SET `online` ='".time()."' WHERE uniqe ='$uniqe'";
      $send = $conn->query($query);
      $query = "SELECT `online` FROM `teachers` WHERE uniqe = '$uniqe'";
      $send = $conn->query($query);
      $result = mysqli_fetch_assoc($send);
      $online = $result['online'];
      $currenttime = time();
      $online =$online+180;

      if($online > $currenttime){
       $stat ='online';
     $color ='rgb(9, 253, 9)';
      }
      else if($currenttime > $online+180){
        $stat ='offline';
      $color ='red';
       }
      exit();
    }
    
  }

}







if($_SESSION['section'] == 'staff'){

  
    $admin = 'd-none';
    $teacher = '';
    $student = 'd-none';
  
    $query = "SELECT * FROM `officestaf` WHERE uniqe = '$uniqe'";
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
  $query = "SELECT `online` FROM `officestaf` WHERE uniqe = '$uniqe'";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
$online = $result['online'];
  $currenttime = time();
  $online =$online+180;
  if($currenttime > $online){
   $stat ='offline';
   $color ='red';
  }
  else{
     $stat ='online';
   $color='rgb(9, 253, 9)';
  }



  $_post = file_get_contents('php://input');
  $_post = json_decode($_post,true);
  if($_post != null){
    if(isset($_post['online'])){
      $query = "UPDATE `officestaf` SET `online` ='".time()."' WHERE uniqe ='$uniqe'";
      $send = $conn->query($query);
      $query = "SELECT `online` FROM `officestaf` WHERE uniqe = '$uniqe'";
      $send = $conn->query($query);
      $result = mysqli_fetch_assoc($send);
      $online = $result['online'];
      $currenttime = time();
      $online =$online+180;

      if($online > $currenttime){
       $stat ='online';
     $color ='rgb(9, 253, 9)';
      }
      else if($currenttime > $online+180){
        $stat ='offline';
      $color ='red';
       }
      exit();
    }
    
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
  $query = "SELECT `online` FROM `students` WHERE uniqe = '$uniqe'";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
$online = $result['online'];
  $currenttime = time();
  $online =$online+180;
  if($currenttime > $online){
   $stat ='offline';
   $color ='red';
  }
  else{
     $stat ='online';
   $color='rgb(9, 253, 9)';
  }



  $_post = file_get_contents('php://input');
  $_post = json_decode($_post,true);
  if($_post != null){
    if(isset($_post['online'])){
      $query = "UPDATE `students` SET `online` ='".time()."' WHERE uniqe ='$uniqe'";
      $send = $conn->query($query);
      $query = "SELECT `online` FROM `students` WHERE uniqe = '$uniqe'";
      $send = $conn->query($query);
      $result = mysqli_fetch_assoc($send);
      $online = $result['online'];
      $currenttime = time();
      $online =$online+180;

      if($online > $currenttime){
        $stat ='online';
     $color ='rgb(9, 253, 9)';
      }
      else if($currenttime > $online+180){
        $stat ='offline';
      $color ='red';
       }
      exit();
    }
    
  }

}



}


if(isset($_POST['chatid'])){
    $chatid = $_POST['chatid'];
    $query = "UPDATE message SET notify = '0' WHERE sender = '$chatid' AND receaver ='$myuniqe'";
    $send = $conn->query($query);
    $chatid = strrev($chatid);

  header("location:chatmessage.php?uniqe=$chatid");

}
 $search = 'd-none';
if(isset($_POST['searchonline'])){
    if($_POST['searchonline'] !=''){

      $search='';
      $name = htmlspecialchars($_POST['searchonline']);


      $query = "SELECT * FROM admin WHERE name LIKE '$name%' OR name LIKE '%$name' OR name ='$name'";
      $send = $conn->query($query);
    $resultnum = mysqli_num_rows($send);
      if($resultnum > 0){

        while( $result = mysqli_fetch_assoc($send)){
            $firstnamec = $result['firstname'];
            $lastnamec = $result['lastname'];
             $online = $result['online'];
             $_SESSION['online'] = $online;
             $chatid = $result['uniqe'];
    
     
           $profileimg2 = $result['profileimg'];
    
    
            echo("
            <!-- s -->
    <form action='chat.php' method='POST' style:width:100%;>
    <button style='border:none ;display:block;width:100%' name='chatid' value='$chatid'>
    <div class=' ch mt-3'>
    <div class='col-12 d-flex  align-items-center gap-3 o'>
        <figure class='logo2'>
        <img src='../upload/<?=$profileimg2?>' alt=''>
    
        </figure>
        <div class='d-flex flex-column  justify-content-center m  mb-3'>
            <span class=''> $firstnamec  $lastnamec</span>
        </div>
    </div>
    </button>
    
    </form>
    <!-- e -->
    
            
            ");
        }
                
       
      }



                    $query = "SELECT * FROM teachers  WHERE name LIKE '$name%' OR name LIKE '%$name' OR name ='$name'";
                    $send = $conn->query($query);
                  $resultnum = mysqli_num_rows($send);
                    if($resultnum > 0){

                        while( $result = mysqli_fetch_assoc($send)){
                            $firstnamec = $result['firstname'];
                            $lastnamec = $result['lastname'];
                             $online = $result['online'];
                             $_SESSION['online'] = $online;
                             $chatid = $result['uniqe'];
                    
                     
                           $profileimg2 = $result['profileimg'];
                    
                    
                            echo("
                            <!-- s -->
                    <form action='chat.php' method='POST' style:width:100%;>
                    <button style='border:none ;display:block;width:100%' name='chatid' value='$chatid'>
                    <div class=' ch mt-3'>
                    <div class='col-12 d-flex  align-items-center gap-3 o'>
                        <figure class='logo2'>
                        <img src='../upload/<?=$profileimg2?>' alt=''>
                    
                        </figure>
                        <div class='d-flex flex-column  justify-content-center m  mb-3'>
                            <span class=''> $firstnamec  $lastnamec</span>
                        </div>
                    </div>
                    </button>
                    
                    </form>
                    <!-- e -->
                    
                            
                            ");
                        }
                    }
                      


                    $query = "SELECT * FROM students WHERE name LIKE '$name%' OR name LIKE '%$name' OR name ='$name'";
                    $send = $conn->query($query);
                    $resultnum = mysqli_num_rows($send);
                    if($resultnum > 0){

                        while( $result = mysqli_fetch_assoc($send)){
                            $firstnamec = $result['firstname'];
                            $lastnamec = $result['lastname'];
                             $online = $result['online'];
                             $_SESSION['online'] = $online;
                             $chatid = $result['uniqe'];
                    
                     
                           $profileimg2 = $result['profileimg'];
                    
                    
                            echo("
                            <!-- s -->
                    <form action='chat.php' method='POST' style:width:100%;>
                    <button style='border:none ;display:block;width:100%' name='chatid' value='$chatid'>
                    <div class=' ch mt-3'>
                    <div class='col-12 d-flex  align-items-center gap-3 o'>
                        <figure class='logo2'>
                        <img src='../upload/<?=$profileimg2?>' alt=''>
                    
                        </figure>
                        <div class='d-flex flex-column  justify-content-center m  mb-3'>
                            <span class=''> $firstnamec  $lastnamec</span>
                        </div>
                    </div>
                    </button>
                    
                    </form>
                    <!-- e -->
                    
                            
                            ");
                        }
                    }
           
 }
 exit('');

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
        <link rel="stylesheet" href="css/signin.css">

        <script defer src="../../library/js/jquery.js"></script>
        <script defer src="../../library/js/bootstrap.min.js"></script>

        <script defer src="../../library/js/main.js"></script>
        <script defer src="../../library/calendar library/calendar.js"></script>



        <title>Dashboard</title>
    </head>
<body>
    <div class="container-fluid full-vh  d-flex p-0" style="background-color: rgb(11, 11, 97);background-image: url(.././res/images/paxlogo.jpg); ">


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


<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="../admin/dashboard.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-dashboard"></i> &nbsp;Dashboard</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="../admin/profile.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-user-circle"></i> &nbsp;profile</a></li>
<li class="text-light   d-flex linksa <?=$registration?>" style="min-height: 1cm; width: 100%;"><a href="../admin/registrer.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-pencil-square"></i> &nbsp;Registration</a></li>
<li class="text-light   d-flex linksa <?=$information?>" style="min-height: 1cm; width: 100%;"><a href="../admin/news.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-microphone"></i> &nbsp;information</a></li>
<li class="text-light   d-flex linksa <?=$attendancee?>" style="min-height: 1cm; width: 100%;"><a href="../admin/attendance-teacher.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-id-badge"></i> &nbsp;Attendance</a></li>
<li class="text-light   d-flex linksa <?=$movement?>" style="min-height: 1cm; width: 100%;"><a href="../admin/movement.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-street-view"></i> &nbsp;movement</a></li>

<li class="text-light   d-flex linksa <?=$fee?> " style="min-height: 1cm; width: 100%;"><a href="../admin/acountant.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-briefcase"></i> &nbsp;fee</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="../admin/payment.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-bank"></i> &nbsp;payment</a></li>
<li class="text-light   d-flex linksa  <?=$resultts?>" style="min-height: 1cm; width: 100%;"><a href="../admin/result.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-edit"></i> &nbsp;Result</a></li>
<li class="text-light   d-flex linksa <?=$classt?>" style="min-height: 1cm; width: 100%;"><a href="../admin/class.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-list-alt"></i> &nbsp;class</a></li>
<li class="text-light   d-flex linksa <?=$teachersd?>" style="min-height: 1cm; width: 100%;"><a href="../admin/teachers.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-user-secret"></i> &nbsp; Teachers</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="../admin/prefects.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-user-plus"></i> &nbsp;prefects</a></li>
<li class="text-light   d-flex linksa <?=$lib?>" style="min-height: 1cm; width: 100%;"><a href="../admin/library.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-book"></i> &nbsp;library</a></li>

<li class="text-light   d-flex linksa <?=$studentd?>" style="min-height: 1cm; width: 100%;"><a href="../admin/student.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-group"></i> &nbsp;students</a></li>
<li class="text-light   d-flex linksa <?=$dometryd?>" style="min-height: 1cm; width: 100%;"><a href="../admin/domitory.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-building"></i> &nbsp;dometory</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="../admin/noticeboard.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-bookmark"></i> &nbsp;noticeboard</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;"><a href="chat.php" class="text-decoration-none text-light w-100 d-flex justify-content-start ms-3 align-items-center"> <i class="fa fa-comments"></i> &nbsp;message</a></li>
<li class="text-light   d-flex linksa" style="min-height: 1cm; width: 100%;margin-bottom:;"><form action="<?=$_SERVER['PHP_SELF']?>" method="POST"><button name="logout"  class="text-light text-capitalize" style="border: none; width:100%;display:flex;justify-content:flex-start;padding-left:15px;align-items:center;background-color:transparent"> <i class="fa fa-arrow-circle-left"></i> &nbsp;logout</button></form></li>

</ul>
<!-- link -->

        
</nav>

<div class=" ann animate__animated  d-flex justify-content-center align-items-center text-dark position-fixed  " style="width: 2cm; height: 2cm; top: -20px;left: 0px;z-index:10;">
    <i class="fa fa-bars toggle " style="font-size: .8cm;" id="toggle"></i>
</div>
<!-- body -->


<!-- popperclasslist -->
<div class=" d-none popperon position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
<div class="col-12 col-md-8 h-75  m-auto position-relative bg-light">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5 pon  d-flex flex-column gap-2" style="height: 90%; padding-bottom: 1cm ;">
   
 
   
   
    </div>
    </div>
    </div>
     <!-- popperclassliste -->






        <div class="body flex-grow-1 bg-light  align-items-start d-flex position-relative" style="height: 100%;width: 70%;">
           
                


         <!--  -->

            <div class="card-body col-11" style="margin-top: 5vh;">
    
             
    
    
    
           
    
             <div class=" d-flex align-items-center justify-content-center mt-3 mb-3 gap-4  p-3 os"  >

             <?php
             $t = time();
             $ct = time()+180;
             $query = "SELECT * FROM `admin` WHERE online + 180 > '$t' AND school ='$school' AND email != '$myuniqe'";
             $send= $conn->query($query);
             $resultnum = mysqli_num_rows($send);
             $conline1 =$resultnum;
             
             if($resultnum >0){
                while($result = mysqli_fetch_assoc($send)){
                     $profileimg2 = $result['profileimg'];
                     $firstname2 =  $result['firstname'];
                     $id2 =  $result['email'];
                     $firstname2 = substr($firstname2,0,4).'..';
                     ?>
                  <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                        <span class=" on ">
                            <button name="chatid" value="<?=$id2?>" class="bv">

                            <div class="logo" style=" background-color:<?=$color?>;">
                                 <img src="../upload/<?=$profileimg2?>" alt="" class="" style="border-radius: 50%;">
                             </div>
                             <span><?=$firstname2?></span>
                            </button>
                             
                         </span>
                  </form>

                      <?php
                     
                  }
                  
             }
            
             
             ?>
                 
             <?php
             $t = time();
             $ct = time()+180;
             $query = "SELECT * FROM `teachers` WHERE online + 180 > '$t' AND school ='$school' AND uniqe != '$myuniqe'";
             $send= $conn->query($query);
             $resultnum = mysqli_num_rows($send);
             $conline2 =$resultnum;
             
             
             if($resultnum >0){
                while($result = mysqli_fetch_assoc($send)){
                     $profileimg2 = $result['profileimg'];
                     $firstname2 =  $result['firstname'];
                     $id2 =  $result['uniqe'];

                     $firstname2 = substr($firstname2,0,4).'..';
                     ?>
     
                   <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                        <span class=" on ">
                        <button name="chatid" value="<?=$id2?>" class="bv">

                            <div class="logo" style=" background-color:<?=$color?>;">
                                 <img src="../upload/<?=$profileimg2?>" alt="" class="" style="border-radius: 50%;">
                             </div>
                             <span><?=$firstname2?></span>
                            </button>
                             
                         </span>
                  </form>
                      <?php
                     
                  }
                  
             }
            
             
             ?>
                 
             <?php
             $t = time();
             $ct = time()+180;
             $query = "SELECT * FROM `students` WHERE online + 180 > '$t' AND school ='$school' AND uniqe != '$myuniqe'";
             $send= $conn->query($query);
             $resultnum = mysqli_num_rows($send);
             $conline3 =$resultnum;
             
             
             if($resultnum >0){
                while($result = mysqli_fetch_assoc($send)){
                     $profileimg2 = $result['profileimg'];
                     $firstname2 =  $result['firstname'];
                     $id2 =  $result['uniqe'];

                     $firstname2 = substr($firstname2,0,4).'..';
                     ?>
     
                  <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                        <span class=" on ">
                        <button name="chatid" value="<?=$id2?>" class="bv">

                            <div class="logo" style=" background-color:<?=$color?>;">
                                 <img src="../upload/<?=$profileimg2?>" alt="" class="" style="border-radius: 50%;">
                             </div>
                             <span><?=$firstname2?></span>
                            </button>
                             
                         </span>
                  </form>
                      <?php
                     
                  }
                  
             }
            $conline = $conline1+$conline2+$conline3;
            if($conline > 25){
                $conline = '25+';
             }
             
             ?>
                 
    
              </div>
    
    
              <div class="col-12 " >
              
              <h5 class="followme cap"><span>contacts</span>  <small class="onlinecount text-secondary">online <?=$conline?></small></h5>
             
             <form action="" method="" id="sonline">
              <div class="input-group">
                  <input type="search" class=" form-control" name="searchonline">
                  <button class="btn btn-dark searchcontact"> <i class="fa fa-search"></i></button>
                 
              </div>
              </form>
           </div>
    
             <div class="col-12 chatinnerbox ">

             <?php
                $query = "SELECT * FROM `message` WHERE sender ='$myuniqe' OR receaver ='$myuniqe'";

                 $send = $conn->query($query);
                 while($result = mysqli_fetch_assoc($send)){

                   $query2="SELECT chat FROM message WHERE sender ='$myuniqe' OR receaver ='$myuniqe' ORDER BY id DESC LIMIT 1";
                   $send2 = $conn->query($query);
                   
                   while($result2 = mysqli_fetch_assoc($send2)){
                    $lastm = $result2['chat'];

                   }



                    $receaver = $result['receaver'];
                    $lastm = substr($lastm,0,15).'...';
                    if($receaver == $myuniqe){
                       $chatid = $result['sender'];

                    }
                    else{
                      $chatid = $result['receaver'];

                    }


                    $query = "SELECT * FROM admin WHERE email ='$chatid'";
                    $send = $conn->query($query);
                 $resultnum = mysqli_num_rows($send);
                    if($resultnum == 0){
                      $query = "SELECT * FROM teachers WHERE uniqe ='$chatid'";
                      $send = $conn->query($query);
                    $resultnum = mysqli_num_rows($send);
                      if($resultnum == 0){
                          $query = "SELECT * FROM students WHERE uniqe ='$chatid'";
                          $send = $conn->query($query);
                        $resultnum = mysqli_num_rows($send);
                          if($resultnum == 0){
                             
                            }
                            else{
                              $result = mysqli_fetch_assoc($send);
                  
                              $firstnamec = $result['firstname'];
                              $lastnamec = $result['lastname'];
                              $online = $result['online'];
                              $_SESSION['online'] = $online;
                  
                              $profileimg2 = $result['profileimg'];
                  
                            }
                  
                        }
                        else{
                          $result = mysqli_fetch_assoc($send);
                  
                         $firstnamec = $result['firstname'];
                         $lastnamec = $result['lastname'];
                          $online = $result['online'];
                          $_SESSION['online'] = $online;
                  
                          $profileimg2 = $result['profileimg'];
                  
                        }
                    }
                    else{
                      $result = mysqli_fetch_assoc($send);
                      $firstnamec = $result['firstname'];
                      $lastnamec = $result['lastname'];
                      $profileimg2 = $result['profileimg'];
                      $online = $result['online'];
                      $_SESSION['online'] = $online;
                  
                    }
                    $online = $_SESSION['online'] = $online;
                  
                    $currenttime = time();
                    $online =$online+180;
                    if($currenttime > $online){
                     $stat ='offline';
                     $color ='red';
                    }
                    else{
                       $stat ='online';
                     $color='rgb(9, 253, 9)';
                    }
                      

                 ?>
              <!-- s -->
             <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" >
                <button style="border:none ;display:block;width:100%" name="chatid" value="<?=$chatid?>">
                <div class=" ch mt-3 ">
                <div class="col-12 d-flex  align-items-center gap-3 o">
                    <figure class="logo2" style="position:relative;">
                    <img src="../upload/<?=$profileimg2?>" alt="">
                   <?php
                   $chatnotifynum = 0;
                   $querym = "SELECT notify FROM message WHERE sender ='$chatid' AND receaver ='$myuniqe'";
                   $sendm = $conn->query($querym);
                   while($resultm = mysqli_fetch_assoc($sendm)){
                    $notify = $resultm['notify'];
                    $chatnotifynum += $notify;
                    if($chatnotifynum > 0){
                      $chatnotify = 'bg-danger';
                    }
                    else{
                      $chatnotify = '';

                    }
                   }
                   ?>
                    <div class="chatnot d-flex justify-content-center align-items-center <?=$chatnotify?> text-light" style="border-radius:50%;width:.5cm;height:.5cm;position:absolute;bottom:-.3cm;"><?=$chatnotifynum?></div>

                    </figure >

                    <div class="d-flex flex-column  justify-content-center m  mb-3">
                        <span class=""> <?=$firstnamec?> <?=$lastnamec?></span>
                        <small class="gray"><?=$lastm?></small>
                    </div>
                </div>
                </button>
            
                </form>
                <!-- e -->
               
                 <?php

                 }


               
              ?> 
               
               
               
               
               
               

            
           
           
               
            
               
           
               
           
           </div>
        </div>
    
         <!--  -->
           
          
        </div>

        </div>
        <!-- body -->
    </div>
    
</body>
</html>

