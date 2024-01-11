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


  if(isset($_FILES['profile3'])){

    if($_FILES['profile3']['size']>0){
      $imgname = $_FILES['profile3']['name'];
      $tmpfolder = $_FILES['profile3']['tmp_name'];
      $extarray = array('png','jpg');
      $ext = strtolower( pathinfo($imgname,PATHINFO_EXTENSION));
      $destination = '../upload/'.$imgname;
      if(in_array($ext,$extarray)){

        if(file_exists($destination)){
          $imgname = time().$imgname;
          $destination = '../upload/'.$imgname;
         $query = "UPDATE `admin` SET profileimg = '$imgname' WHERE email = '$uniqe'";
          $send = $conn->query($query);
          move_uploaded_file($tmpfolder,$destination);
         
    
        }
        else{
          $destination = '../upload/'.$imgname;
          $query = "UPDATE `admin` SET profileimg = '$imgname' WHERE email = '$uniqe'";
          $send = $conn->query($query);
          move_uploaded_file($tmpfolder,$destination);
         
        }
      }
      
    }
    }
  

  $admin = '';
  $teacher = 'd-none';
  $student = 'd-none';
  $uniqe = $_SESSION['myuniqe'];
  
  $query = "SELECT * FROM `admin` WHERE email = '$uniqe' ";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
  $resultnum = mysqli_num_rows($send);
  if($resultnum>0){
  $mfirstname = $result['firstname'];
  $mlastname = $result['lastname'];
  $firstname = $result['firstname'];
  $lastname = $result['lastname'];
  $email = $result['email'];
  $uniqe = $result['uniqe'];
  $regdate = $result['regdate'];
  $profileimg = $result['profileimg'];
  $section = $result['section'];
  $school = $result['school'];
  $query2 = "SELECT * FROM session WHERE school ='$school' ORDER BY id DESC LIMIT 1";
  $send2 = $conn->query($query2);
  $resultnum2 = mysqli_num_rows($send2);
  if($resultnum2>0){
    $result2 = mysqli_fetch_assoc($send2);
    $sessions = $result2['sessionstart'];
    $sessione = $result2['sessionend'];

  }



  $schoolimg = $result['schoolimg'];
  }

 



}
if($_SESSION['section'] == 'teacher'){



  if(isset($_FILES['profile1'])){

    if($_FILES['profile1']['size']>0){
      $imgname = $_FILES['profile1']['name'];
      $tmpfolder = $_FILES['profile1']['tmp_name'];
      $extarray = array('png','jpg');
      $ext = strtolower( pathinfo($imgname,PATHINFO_EXTENSION));
      $destination = '../upload/'.$imgname;
      if(in_array($ext,$extarray)){
        if(file_exists($destination)){
          $imgname = time().$imgname;
          $destination = '../upload/'.$imgname;
          move_uploaded_file($tmpfolder,$destination);
          $query = "UPDATE teachers SET profileimg = '$imgname' WHERE uniqe = '$uniqe'";
          $send = $conn->query($query);
    
        }
        else{
          $destination = '../upload/'.$imgname;
          move_uploaded_file($tmpfolder,$destination);
          $query = "UPDATE teachers SET profileimg = '$imgname' WHERE uniqe = '$uniqe'";
          $send = $conn->query($query);
        }
      }
      
    }
    }

 
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



if($_SESSION['section'] == 'staff'){


  if(isset($_FILES['profile1'])){

    if($_FILES['profile1']['size']>0){
      $imgname = $_FILES['profile1']['name'];
      $tmpfolder = $_FILES['profile1']['tmp_name'];
      $extarray = array('png','jpg');
      $ext = strtolower( pathinfo($imgname,PATHINFO_EXTENSION));
      $destination = '../upload/'.$imgname;
      if(in_array($ext,$extarray)){
        if(file_exists($destination)){
          $imgname = time().$imgname;
          $destination = '../upload/'.$imgname;
          move_uploaded_file($tmpfolder,$destination);
          $query = "UPDATE officestaf SET profileimg = '$imgname' WHERE uniqe = '$uniqe'";
          $send = $conn->query($query);
    
        }
        else{
          $destination = '../upload/'.$imgname;
          move_uploaded_file($tmpfolder,$destination);
          $query = "UPDATE officestaf SET profileimg = '$imgname' WHERE uniqe = '$uniqe'";
          $send = $conn->query($query);
        }
      }
      
    }
    }

 
  $admin = 'd-none';
  $teacher = '';
  $student = 'd-none';
  $stdis='d-none';
  $query = "SELECT * FROM `officestaf` WHERE uniqe = '$uniqe'";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
  $resultnum = mysqli_num_rows($send);
  if($resultnum>0){
    $firstname = $result['firstname'];
    $lastname = $result['lastname'];
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


  if(isset($_FILES['profile2'])){

    if($_FILES['profile2']['size']>0){
      $imgname = $_FILES['profile2']['name'];
      $tmpfolder = $_FILES['profile2']['tmp_name'];
      $extarray = array('png','jpg');
      $ext = strtolower( pathinfo($imgname,PATHINFO_EXTENSION));
      $destination = '../upload/'.$imgname;
      if(in_array($ext,$extarray)){
        if(file_exists($destination)){
          $imgname = time().$imgname;
          $destination = '../upload/'.$imgname;
          move_uploaded_file($tmpfolder,$destination);
          $query = "UPDATE student SET profileimg = '$imgname' WHERE uniqe = '$uniqe'";
          $send = $conn->query($query);
    
        }
        else{
          $destination = '../upload/'.$imgname;
          move_uploaded_file($tmpfolder,$destination);
          $query = "UPDATE students SET profileimg = '$imgname' WHERE uniqe = '$uniqe'";
          $send = $conn->query($query);
        }
      }
      
    }
    }
  

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




}

if(isset($_POST['sstart']) AND isset($_POST['send']) AND isset($_POST['term'])){
  if($_POST['sstart'] !='' AND $_POST['send'] !='' AND $_POST['term'] !=''){
   echo $sessionstart = htmlspecialchars(strtotime($_POST['sstart']));
   echo $sessionend = htmlspecialchars(strtotime($_POST['send']));
    $term = htmlspecialchars($_POST['term']);
    $query ="INSERT INTO session (school,sessionstart,sessionend,term) VALUES ('$school','$sessionstart','$sessionend','$term')";
    $send = $conn->query($query);
    $dis ='d-none';
    
  }
}


$query ="SELECT * FROM session WHERE school = '$school' ORDER BY id DESC LIMIT 1";
$send = $conn->query($query);
$result = mysqli_fetch_assoc($send);
$sessionstart = $result['sessionstart'];
$_SESSION['sessionstart'] = $sessionstart;
$sessionend = $result['sessionend'];
$_SESSION['sessionend'] = $sessionend;
$term = $result['term'];
$_SESSION['term'] = $term;
if(time()>=$sessionend){
  $dis ='d-none';

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
        <div class="body flex-grow-1 bg-light  align-items-center d-flex position-relative" style="height: 100%;">
          
        <div class="row m-0  justify-content-center w-100 sh gap-2  " style="overflow-y: scroll; height: 90%;padding: 1cm; background-color: rgba(128, 128, 128, 0.39);">

            
            <!--  -->
                <div class="bg-light  <?=$teacher?>" style="">
            <div class="" style="">
            <!-- profilepic -->
            <div class="profilebox p-2" style="height: 230px;">
            <div class="profilepic bg-primary position-relative" style="width: 200px; height: 200px; border-radius: 50%;">
                 <img src="../upload/<?=$profileimg?>" alt="img">
                  <div class=" " style="position: absolute; bottom:0cm;">
                  <form action="<?=$_SERVER['PHP_SELF']?>" class="input-group " method="POST" enctype="multipart/form-data">
                  <label for="profile1"><i class="fa fa-file" style="font-size: 1cm;color:teal;"></i></label>
                  <input type="file" id="profile1" class="d-none" name="profile1">

                  <button class="btn btn-dark">upload</button>
                  </form>

                  </div>
            </div>
            </div>
              <!-- profilepic e -->
              <!-- teachers details -->
              <div class="mt-3 col-12">
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">Firstname :</span> &nbsp; <span><?=$mfirstname?></span>
                </div>
                <!--  -->
               
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">Lastname :</span> &nbsp; <span><?=$mlastname?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">reg no :</span> &nbsp; <span><?=$uniqe?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalizen <?=$stdis?>" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">class :</span> &nbsp; <span><?=$class?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">section :</span> &nbsp; <span><?=$section?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">address :</span> &nbsp; <span><?=$homeaddr?></span>
                </div>
                <!--  -->
               
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">gender :</span> &nbsp; <span><?=$gender?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">date joined :</span> &nbsp; <span><?=$regdate?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">qualification</span> &nbsp; <span><?=$qualification?></span>
                </div>
                <!--  -->
                
              
                
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">family :</span> &nbsp; <span><?=$familymember?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">family firstname :</span> &nbsp; <span><?=$familyfirstname?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">family lastname :</span> &nbsp; <span><?=$familylastname?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">family number :</span> &nbsp; <span><?=$familynumber?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 " style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;"> email :</span> &nbsp; <span style="text-transform: none;"><?=$email?></span>
                </div>
                <!--  -->
               
              </div>
        
                        <!-- teachers details -->
        
        
            </div>
            </div>

         <!--  -->



            <!--  -->
            <div class="bg-light <?=$student?>" style="">
            <div class="" style="">
            <!-- profilepic -->
            <div class="profilebox p-2" style="height: 230px;">
            <div class="profilepic bg-primary position-relative" style="width: 200px; height: 200px; border-radius: 50%;">
                 <img src="../upload/<?=$profileimg?>" alt="img">
                  <div class=" " style="position: absolute; bottom:0cm;">
                  <form action="<?=$_SERVER['PHP_SELF']?>" class="input-group " method="POST" enctype="multipart/form-data">
                  <input type="file" id="profile2" class="d-none" name="profile2">

                  <label for="profile2"><i class="fa fa-file" style="font-size: 1cm;color:teal;"></i></label>
                  <button class="btn btn-dark">upload</button>
                  </form>

                  </div>
        
            </div>
            </div>
              <!-- profilepic e -->
              <!-- teachers details -->
              <div class="mt-3 col-12">
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">Firstname :</span> &nbsp; <span><?=$mfirstname?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">Lastname :</span> &nbsp; <span><?=$mlastname?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">reg no :</span> &nbsp; <span><?=$uniqe?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">class :</span> &nbsp; <span><?=$class?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">section :</span> &nbsp; <span><?=$section?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">address :</span> &nbsp; <span><?=$homeaddr?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">date of birth :</span> &nbsp; <span><?=$dob?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">gender :</span> &nbsp; <span><?=$gender?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">date joined :</span> &nbsp; <span><?=$regdate?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">position</span> &nbsp; <span><?=$position?></span>
                </div>
                <!--  -->
               
              
                
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">family :</span> &nbsp; <span><?=$familymember?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">family firstname :</span> &nbsp; <span><?=$familyfirstname?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">family lastname :</span> &nbsp; <span><?=$familylastname?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">family number :</span> &nbsp; <span><?=$familynumber?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 " style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;"> family email :</span> &nbsp; <span style="text-transform: none;"><?=$email?></span>
                </div>
                <!--  -->
               
              </div>
        
                        <!-- teachers details -->
        
        
            </div>
            </div>

         <!--  -->
           <!--  -->
           <div class="bg-light   <?=$admin?>" style="">
            <div class="" style="">
             <!-- profilepic -->
             <div class="profilebox p-2" style="height: 230px;">
            <div class="profilepic bg-primary position-relative" style="width: 200px; height: 200px; border-radius: 50%;">
                 <img src="../upload/<?=$profileimg?>" alt="img">
                  <div class=" " style="position: absolute; bottom:0cm;">
                  <form action="<?=$_SERVER['PHP_SELF']?>" class="input-group " method="POST" enctype="multipart/form-data">
                  <label for="profile3"><i class="fa fa-file" style="font-size: 1cm;color:teal;"></i></label>
                  <input type="file" id="profile3" class="d-none" name="profile3">

                  <button class="btn btn-dark">upload</button>
                  </form>

                  </div>
            </div>
            </div>
              <!-- profilepic e -->
              <!-- teachers details -->
              <div class="mt-3 col-12 ">
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">Firstname :</span> &nbsp; <span><?=$firstname?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">Lastname :</span> &nbsp; <span><?=$lastname?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">school :</span> &nbsp; <span><?=$school?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">reg no :</span> &nbsp; <span><?=$uniqe?></span>
                </div>
                <!--  -->
             
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">section :</span> &nbsp; <span><?=$section?></span>
                </div>
                <!--  -->
               
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">Regdate :</span> &nbsp; <span><?=$regdate?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 " style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">Email :</span> &nbsp; <span><?=$email?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 " style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">Session Start :</span> &nbsp; <span><?=$sessions?></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="infor  col-12 d-flex align-items-center ps-2 " style="height: 1cm; border-top: 1px solid gray;">
                <span style="font-weight: 600;">Session End :</span> &nbsp; <span><?=$sessione?></span>
                </div>
                <!--  -->
             <div class="ab <?=$dis?>" style="position:absolute;top:0vh;right:.2cm">
             <!--  -->
             <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
              <div class="" style="">
                <span style="font-weight: 600;">Session Start</span> &nbsp; <span><input type="date" class="form-control" name="sstart"></span>
                </div>
                <!--  -->
             
                <!--  -->
                <div class="" style="">
                <span style="font-weight: 600;">Session End</span> &nbsp; <span><input type="date" class="form-control" name="send"></span>
                </div>
                <!--  -->
                <!--  -->
                <div class="" style="">
                <select name="term" id="" class="form-control">
                  <option value="">choose term</option>
                  <option value="1">1st term</option>
                  <option value="2">2nd term</option>
                  <option value="3">3rd term</option>
                </select>
                </div>
                <!--  -->
                <button class="btn btn-dark">Update</button>
                </form>
             </div>
               
             
               
              </div>
        
                        <!-- teachers details -->
        
        
            </div>
            </div>

         <!--  admin profile e-->
           
          
        </div>

        </div>
        <!-- body -->
    </div>
    
</body>
</html>