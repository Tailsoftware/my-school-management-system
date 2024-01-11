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
    $teachername = file_get_contents('php://input');
   
    $teachername = json_decode($teachername,true);
    if($teachername != null){
        if(isset($teachername['campusselect']) AND isset($teachername['classteachrsname'])){

     $campusselect = $teachername['campusselect']; 
     $teacherid = $teachername['classteachrsname'];
    $query = "SELECT * FROM teachers WHERE school = '$school' AND campus ='$campusselect' AND uniqe ='$teacherid'";
    $send = $conn->query($query);
    $result = mysqli_fetch_assoc($send);
    $resultnum = mysqli_num_rows($send);
    $firstname = $result['firstname'];
    $lastname = $result['lastname'];
    $uniqe = $result['uniqe'];
    $class = $result['class'];
    $homeaddr = $result['homeaddr'];
    $regdate = $result['regdate'];
    $gender = $result['gender'];
    $qualification = $result['qualification'];
    $fmember = $result['fmember'];
    $fmemberfirstname = $result['fmemberfirstname'];
    $fmemberlastname = $result['fmemberlastname'];
    $fnumber = $result['fnumber'];
    $email = $result['email'];
    $profileimg = $result['profileimg'];
    exit('  
    
    <!-- profilepic -->
    <div class="profilebox" style="height: 230px;">
    <div class="profilepic bg-primary" style="width: 200px; height: 200px; border-radius: 50%;">
         <img src="../upload/'.$profileimg.'" alt="img">

    </div>
    </div>
      <!-- profilepic e -->



    
      <!-- teachers details -->
      <div class="mt-3 col-12">
    
    
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">Firstname :</span> &nbsp; <span>'.$firstname.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">Lastname :</span> &nbsp; <span>'.$lastname.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">reg no :</span> &nbsp; <span>'.$uniqe.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">class :</span> &nbsp; <span>'.$class.'</span>
    </div>
    <!--  -->
   
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">address :</span> &nbsp; <span>'.$homeaddr.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;"> Registration Date : <span style="font-weight: 300;">'.$regdate.'</span>  </span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">gender :</span> &nbsp; <span>'.$gender.'</span>
    </div>
    <!--  -->
   
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">qualification</span> &nbsp; <span>'.$qualification.'</span>
    </div>
    <!--  -->
   
  
    
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">family :</span> &nbsp; <span>'.$fmember.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">family firstname :</span> &nbsp; <span>'.$fmemberfirstname.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">family lastname :</span> &nbsp; <span>'.$fmemberlastname.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">family number :</span> &nbsp; <span>'.$fnumber.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;"> email :</span> &nbsp; <span style="text-transform: none;">'.$email.'</span>
    </div>
    <!--  -->
    <!--  -->
    <form action="" method=""  id="smsform">
        <div class="infor mt-5 col-12 d-flex   align-items-center ps-2 text-capitalize" style="height: 1cm;">
            <input type="hidden" name="api_token" value="E4XP9PtIZMYC0iLcFlnFcGANyys06DDYjS73QXxP6HCPI5ItEZpLfuWxyN5g">
            <input type="hidden" name="from" value="director">
            <input type="hidden" name="to" value="07026425679">
            <input type="hidden" name="dnd" value="2">
        <textarea name="body" id="" cols="30" rows="10" style="height: 50px;resize:none;padding:10px" >hello '.$firstname.' we did not see you in school today hope all is well @'.$school.'</textarea>
        <button class="btn btn-primary ms-4" onclick="sendsms(smsform)">send sms</button>    
        </div>
        </form>

    <!--  -->

    </div>

    <!-- teachers details -->

   ');
    }
}
}
  
$apilocation = '';

$_post = file_get_contents('php://input');
if($_post != null){
$_post = json_decode($_post,true);

if(isset($_post['smscount'])){
  $query = "SELECT * FROM smscount WHERE school ='$school'";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
 $count = $result['count'];

  $query = "SELECT * FROM plan WHERE school ='$school' AND admin ='$email'";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
  $plan = $result['plan'];
  if($plan == 'customize'){
    if($count < 50){
      $apilocation = 'https://www.bulksmsnigeria.com/api/v1/sms/create';
     $count = $count+1;
      $query = "UPDATE smscount SET count = '$count' WHERE school ='$school'";
      $send = $conn->query($query);
    }
    elseif($count == 50){
     
     echo '<script>alert("maximum limit reached")</script>';
    }
  }
  elseif($plan == 'active'){
    if($count < 20){

    $apilocation = 'https://www.bulksmsnigeria.com/api/v1/sms/create';
    $count = $count+1;
    $query = "UPDATE smscount SET count = '$count' WHERE school ='$school'";
    $send = $conn->query($query);
  }
  elseif($count == 20){
    $apilocation = '';
   echo '<script>alert("maximum limit reached")</script>';
  }
  }

}

exit();
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


        <title>teachers</title>
        <style>
.tablem{
}
.tablem tr{
    width: 100%;
}
.tablem td{
    border: 2px solid gray;
   min-width: 3cm;
   max-width: 3cm;
}
        </style>
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
        <div class="body flex-grow-1 bg-light  align-items-center d-flex " style="height: 100%;">


  <!-- popperteacher -->
  <div class=" d-none popperteachersdetails popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 90%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center  appentteachersresponsett" style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
   
    

    </div>
    </div>
    </div>
     <!-- popperteachere -->


     <div class="col-12 col-md-8 h-75  m-auto position-relative " style="padding: 10px;max-width: 100vw;">
               <a href="registrer.html" class="btn btn-dark text-capitalize d-none"> Add new teacher</a>

               <div class="input-group mt-3 d-none" style="width: cm;">
                <input type="text" class="form-control search" placeholder="search">
                 <button class="btn btn-dark text-light"><i class="fa fa-search"></i></button>
              </div>





               <div class="table-responsive  overflow-scroll mt-4">

<table class=" table table-striped d-flex flex-column" style="text-transform: capitalize;" id="classtable" >
<!-- s -->
<tr>
                        <td>#</td>
                        <td style="min-width: 3cm;">id</td>
                        <td>gender</td>
                        <td>firstname</td>
                        <td>lastname</td>
                        <td>class</td>
                        <td>last Attendance</td>


</tr>
<!-- e -->
</div>



 

   



 

   <!-- s -->

   <?php
                    $d = date('Y-m-d');

                $query2 = "SELECT * FROM teachers WHERE school ='$school' AND campus = '$campusselect' AND lastattendance NOT LIKE '$d%'";
                $send2 = $conn->query($query2);
   $resultnum2 = mysqli_num_rows($send2);
     $j = 0;
     if($resultnum2>0){
     while( $result2 = mysqli_fetch_assoc($send2)){

      $j++;
        
         $id = $result2['uniqe'];
         $gender = $result2['gender'];
         $last = $result2['lastattendance'];
         $firstname = $result2['firstname'];
         $lastname = $result2['lastname'];
         $class = $result2['class'];
        
       
    ?>




<!-- s -->
<tr class="d">
                        <td class="dc"><?=$j?></td>
                        <td class="dc" style=" line-break: break-all;"> <a href="" class="teachersdetails"><?=$id?> <input type="hidden" name="teacherid" value="<?=$id?>" class="teacherid"> <input type="hidden" class="campusselect" value="<?=$campusselect?>"></a></td>
                        <td class="dc"><?=$gender?></td>
                        <td class="dc"><?=$firstname?></td>
                        <td class="dc"><?=$lastname?></td>
                        <td class="dc"><?=$class?></td>
                        <td class="dc"><?=$last?></td>


</tr>
<!-- e -->







     


 <?php
     }
    }

 
   
 ?>
   

 </table>
</div>


              
               </div>

            </div>
            
        </div>
        <!-- body -->
    </div>
    

    <script>

function sendsms(a){
  alert();
  $(a).on('submit',(e)=>{
  e.preventDefault()
  $.ajax({
    url:'<?=$apilocation?>',
    type:'POST',
    data:new FormData(a),
    processData:false,
    catch:false,
    contentType:false,
    beforeSend(e){
  
    },
    success(e){

      let data ={
    smscount:'yes'
  }

  data = JSON.stringify(data);

  $.ajax({
    url:'<?=$_SERVER['PHP_SELF']?>',
    type:'POST',
    data:data,
    processData:false,
    catch:false,
    contentType:'application/json',
    beforeSend(e){
  
    },
    success(e){
      console.log(e)
    }
  
  })

    }
  
  })
  })
  
  
  
}


    </script>
</body>
</html>