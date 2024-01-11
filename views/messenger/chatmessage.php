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








if(isset($_GET['uniqe'])){
   $chatid = $_GET['uniqe'];
  $chatid = strrev($chatid);
  $_SESSION['chatid'] = $chatid;

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
  if(isset( $_SESSION['online'] )){
    $online = $_SESSION['online'] = $online;

  }
  else{
    $online = 0;
  }

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


}
else{
    if(isset($_SESSION['chatid'])){

        $chatid = $_SESSION['chatid'];

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
    }
}






$chatid = $_SESSION['chatid'];













if(isset($_POST['messag'])){
    if($_POST['messag'] != ''){
        $mess = htmlspecialchars($_POST['messag']);
        $sender = $myuniqe;
        $receaver = $_SESSION['chatid'];
        $query = "INSERT INTO message (sender,receaver,chat,notify) VALUES ('$sender','$receaver','$mess','1')";
        $send = $conn->query($query);
       

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
            <link rel="stylesheet" href="css/signin.css">
    
            <script defer src="../../library/js/jquery.js"></script>
            <script defer src="../../library/js/bootstrap.min.js"></script>
    
            <script defer src="../../library/js/main.js"></script>
            <script defer src="../../library/calendar library/calendar.js"></script>
    
    
    
            <title>Messages</title>
        </head>
<body>
    <div class="container-fluid full-vh  d-flex p-0" style="background-color: rgb(11, 11, 97);background-image: url(.././res/images/paxlogo.jpg); ">


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

        <div class=" ann animate__animated  d-flex justify-content-center align-items-center text-dark position-fixed d-md-none " style="width: 2cm; height: 2cm; top: 10px;left: 10px;">
          <i class="fa fa-bars" style="font-size: 1cm;"></i>
        </div>
        <!-- body -->
        <div class="body flex-grow-1 bg-light  align-items-center d-flex position-relative" style="height: 100%;width: 70%;">
           
                


         <!--  -->
         <div class="card col-12  m-auto cd d-flex flex-column ">
            <div class="head d-flex align-items-center ps-3  lg">
                <div class="ic">
                <a href="chat.php"> <i class="fa fa-arrow-left"></i> </a>
               </div>
                <!-- s -->
             <div class=" ch  pt-4" >
                <div class="col-12 d-flex  align-items-center gap-3 ">
                    <figure class="logo2" style="border: 3px solid <?=$color?>;">
                        <img src="../upload/<?=$profileimg2?>" alt="">
        
                    </figure>
                    <div class="d-flex flex-column  justify-content-center m  mb-3">
                       <h5 class=""> kingsley samuel</h5>
                        <small class="gray"><?=$stat?></small>
                    </div>
                </div>
                <!-- e -->
               
            </div>
           
           
         </div>
         <div class="scree  screen">
                <?php
                $query ="SELECT * FROM message WHERE sender ='$myuniqe' AND receaver ='$chatid' OR sender ='$chatid' AND receaver='$myuniqe'";
                $send = $conn->query($query);
                $resultnum = mysqli_num_rows($send);

                while($result = mysqli_fetch_assoc($send)){
                  $sender = $result['sender'];
                  $receaver = $result['receaver'];

                 
                  if($sender == $myuniqe){
                    $ten ='10px';
                    $smessage = $result['chat'];

                    ?>
          <div class="sentdiv">
               
               <div class="sent" style="padding:<?=$ten?>;">
                   <?=$smessage?>
               </div>
           </div>

                    <?php
                  }
                 
                 
                  if($receaver == $myuniqe){
                    $ten ='10px';
                    $smessage = $result['chat'];
                  ?>
            <div class="resdiv align-items-end gap-3 ">
               <figure class="logo2 logo3">
               <img src="../upload/<?=$profileimg2?>" alt="">
   
               </figure>
               <div class="res" style="padding:<?=$ten?>;">
                   <?=$smessage?>
               </div>
           </div>
                  <?php

                  }
                }
               
                ?>

        



         
        </div>





        <div class="send d-flex align-items-center">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="w-100">
            <div class="input-group">
              
                    <input type="text" class="form-control" name="messag">
                    <button class="btn btn-dark"><i class="fa  fa-send"></i></button>
    
               
               
            </div>
        </form>
        </div>



    </div>
    <!--  -->
          
        </div>

        </div>
        <!-- body -->
    </div>
    
</body>
</html>

