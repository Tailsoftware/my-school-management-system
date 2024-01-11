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


$check = 'd-none';
$proceed = '';

if(isset($_POST['code'])){
    if($_POST['code'] !=''){
        $code = htmlspecialchars($_POST['code']);
       $query ="SELECT * FROM subject WHERE subject ='$code'"; 
       $send = $conn->query($query);
     $resultnum =mysqli_num_rows($send);
       if($resultnum>0){
        $check = '';
        $proceed = 'd-none';
        $result = mysqli_fetch_assoc($send);
        $subject = $result['subject'];
        $_SESSION['subject'] = $subject;
       }
     
    }
}

if(isset($_POST['payment'])){
    $payment = $_POST['payment'];
    header('location:'.$payment.'');
}
if(isset($_POST['invoice'])){
    $invoice = $_POST['invoice'];
    header('location:'.$invoice.'');
}
if(isset($_GET['faild'])){
    echo'<script>alert("payment faild please try agail")</script>';
}

$_post = file_get_contents('php://input');
$_post = json_decode($_post,true);
if($_post !=''){

if(isset($_post['campusselect']) AND isset($_post['classs'])){

    $campusselect = $_post['campusselect']; 
    $class = $_post['classs'];
    $date = date('Y-m-d');
    $query = "SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect' AND class ='$class'";
    $send = $conn->query($query);
     $resultnum = mysqli_num_rows($send);
    $i = 0;
    while($result = mysqli_fetch_assoc($send)){
        $i++;
        $campusselect = $_post['campusselect']; 

        $firstname = $result['firstname'];
    $lastname = $result['lastname'];
    $uniqe = $result['uniqe'];
    $class = $result['class'];
  
    echo('

    <!-- s -->
    <tr class="stt d " style="">
    <input type="hidden" id="'.$uniqe.'" value="'.$campusselect.'" class="'.$class.'" >

     <td >'.$i.'</td>
     <td><span class="student text-primary text-decoration-underline" onclick="a('.$uniqe.')" style="cursor: pointer;">'.$uniqe.'</span></td>
     <td class="dc">'.$firstname.'</td>
     <td class="dc" >'.$lastname.'</td>
    
     <td>
     <input type="number" class="form-control" id="va" placeholder="Exam">
     <input type="number" class="form-control" id="vb"  placeholder="Test1">
     <input type="number" class="form-control" id="vc"  placeholder="Test2">

      <button class="btn btn-dark text-light" onclick="update('.$uniqe.',va,vb,vc)">Update</button>

     </td>
    

 </tr>
    
    ');
        

    }

    exit();
    }
}



if(isset($_post['studentcampus4']) AND isset($_post['uniqe4']) AND isset($_post['class']) AND isset($_post['score']) AND isset($_post['test1']) AND isset($_post['test2']) ){

    $campusselect = $_post['studentcampus4']; 
    $studentid = $_post['uniqe4'];
   $score = $_post['score'];
   $test1 = $_post['test1'];
   $test2 = $_post['test2'];
   $class = $_post['class'];

   $subject = $_SESSION['subject'];
  $query = "SELECT * FROM examp WHERE school ='$school' AND campus ='$campusselect' AND uniqe='$studentid' AND subject ='$subject'";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
  $resultnum = mysqli_num_rows($send);
  if($resultnum <= 0){
  
  $total = $score + $test1 +$test2;
   $time = time();
  $query = "INSERT INTO examp (school,campus,code,uniqe,totalscore,subject,test1,test2,total,date) VALUES('$school','$campusselect','$subject','$studentid','$score','$subject','$test1','$test2','$total','$time')";
  $send = $conn->query($query);
  echo'Done';

}
else{
    echo'students score based on subject code '.$subject.' has already been updated please proceed with another student';
  }
  exit();
}


if(isset($_post['studentcampus']) AND isset($_post['uniqe'])){

    $campusselect = $_post['studentcampus']; 
    $teacherid = $_post['uniqe'];
   $query = "SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect' AND uniqe ='$teacherid'";
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
   $domitory = $result['domitory'];
   $fmember = $result['fmember'];
   $fmemberfirstname = $result['fmemberfirstname'];
   $fmemberlastname = $result['fmemberlastname'];
   $fnumber = $result['fnumber'];
   $email = $result['email'];
   $profileimg = $result['profileimg'];
   $schoolfees = $result['schoolfees'];
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
   <span style="font-weight: 600;">schoolfees paid :</span> &nbsp; <span>'.$schoolfees.'</span>
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
   <span style="font-weight: 600;">domitory</span> &nbsp; <span>'.$domitory.'</span>
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

   </div>

   <!-- teachers details -->

  ');
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


        <title>payment</title>
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
     <!-- popperclasslist -->
<div class="  d-none popperclasslist  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
  <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 80%; padding: 10px;">
  <button class="btn btn-danger float-end close">X</button>
  <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
 
  <form action="" class="col-12 d-none " >
              <div class="input-group mt-2 form-control w-100">
                 <input type="text" class="form-control search" placeholder="search name">
                  <button class="btn btn-dark"><i class="fa fa-search"></i></button>
              </div>
             </form>
      <div class="table-responsive h-100 overflow-scroll  col-12 d-flex justify-content-center " >

        
      <table class="tablem d-flex flex-column  thestudentlist4 " style="text-transform: capitalize;"  >

           <!-- s -->
           <tr class="table-active" style="font-weight: 600;">
                   <td>#</td>
                   <td>ID no</td>
                   <td>Firstname</td>
                   <td>Lastname</td>
                   <td>score</td>
                   <td>trait</td>

               </tr>
               <!-- e -->
      
        
        
             
           </table>
          </div>


 
  </div>
  </div>
  </div>
   <!-- popperclassliste -->



        <div class="body flex-grow-1 bg-light  align-items-center d-flex position-relative" style="height: 100%;">
           
                
        <div class="row m-0 box1  col-10 m-auto sh gap-2  align-items-start justify-content-center" style="overflow-y: scroll; height: 80%;padding: 1cm; background-color: rgba(128, 128, 128, 0.39);">
       <div class=" d-flex gap-3">
       <a href="exampro.php" class="btn btn-primary text-capitalize text-light" style="width: 1.5cm;">Fill</a>

       <a href="result.php" class="btn btn-dark text-capitalize text-light" style="width: 1.5cm;">View</a>

       <a href="check.php" class="btn btn-dark text-capitalize text-light" style="width: 1.5cm;">check</a>
       </div>
        
         <!--  -->
                   <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="proceed <?=$proceed?> col-12 col-md-6 h-50 gap-3 d-flex flex-column bg-white justify-content-center">
                   <div class="formbox">
                    <select name="code" id="" class="form-control">
                        <option value="">select subject</option>
                        <?php
                        if($section == 'admin'){
                        $query ="SELECT * FROM subject WHERE school ='$school' AND campus='$campusselect'";
                        $send = $conn->query($query);
                        while($result=mysqli_fetch_assoc($send)){
                           $subject = $result['subject'];
                           ?>
                            <option value="<?=$subject?>"><?=$subject?></option>

                           <?php
                        }
                    }
                        
                       else if($section != 'admin'){
                        $query ="SELECT * FROM subject WHERE class = '$class' AND school ='$school' AND campus='$campusselect'";
                        $send = $conn->query($query);
                        while($result=mysqli_fetch_assoc($send)){
                           $subject = $result['subject'];
                           ?>
                            <option value="<?=$subject?>"><?=$subject?></option>

                           <?php
                        }
                    }
                        ?>
                    </select>
                   </div>
                  
                    <div class="formbox">
                        <button class="btn btn-dark text-light form-control probuth">Proceed</button>
                    </div>
                   </form>

         <!--  -->
         <!--  -->
         <div class="table-responsive <?=$check?>">

               <table class=" table table-striped " style="text-transform: capitalize;" id="classtable" >
<!-- s -->
<tr class=" " style="font-weight: 600;min-width:100%">
       <td style="">#</td>
       <td style="">Class</td>
       <td style=""> No</td>
    

   </tr>
<!-- e -->
    </div>
  


                
            
                  

  

                
         
                  <!-- s -->

                  <?php
                  if($section =='admin'){
                    $query2 = "SELECT * FROM class WHERE school = '$school' AND campus = '$campusselect'";
                    $send2 = $conn->query($query2);
                  $resultnum2 = mysqli_num_rows($send2);
                    $j = 0;
                    for($i=0;$i<$resultnum2;$i++){

                     $j;
                        $result2 = mysqli_fetch_assoc($send2);
                        $class = $result2['mclass'];
                        $timetable = $result2['timetable'];
                        $scheme = $result2['scheme'];
                        $assignment = $result2['assignment'];
                        $teacher = $result2['teacher'];
                        if($teacher =='not assigned'){
                            $teachername = $teacher;
                        }
                        else{
                            $query = "SELECT * FROM teachers WHERE school = '$school' AND campus ='$campusselect' AND uniqe ='$teacher'";
                            $send = $conn->query($query);
                            $teacherresult = mysqli_fetch_assoc($send);
                            $tfirstname = $teacherresult['firstname'];
                            $tlastname = $teacherresult['lastname'];
                            $teachername = $tfirstname.' '.$tlastname;
                        }
                        
                     
                        $j++;
                        $querystudent = "SELECT * FROM students WHERE school = '$school' AND campus = '$campusselect' AND class ='$class'";
                        $sendstudent = $conn->query($querystudent);
                        $studentnum = mysqli_num_rows($sendstudent);


                 
                      
                   ?>












                      <!-- s -->
                      <tr class="d "       style="">
                     <td class="" style=""><?=$j?></td>
                     <td class="mclass dc" style=""><?=$class?></td>
                    
                     <td class="" style=""><a href="" class="studentclasslist"><?=$studentnum?><input type="hidden" class="class" value="<?=$class?>"> <input type="hidden" class="campusselect" value="<?=$campusselect?>"></a></td>
                    
                    

                       
                         
                     </tr>




                    

     
                <?php
                    }

                }
                else{
                  $query2 = "SELECT * FROM class WHERE school = '$school' AND campus = '$campusselect' AND mclass='$class' ";
                    $send2 = $conn->query($query2);
                $resultnum2 = mysqli_num_rows($send2);
                    if($resultnum2>0){
                        $j =1;
                    $result2 = mysqli_fetch_assoc($send2);
                    $class = $result2['mclass'];
                    $teacher = $result2['teacher'];
                    if($teacher =='not assigned'){
                        $teachername = $teacher;
                    }
                    else{
                        $query = "SELECT * FROM teachers WHERE school = '$school' AND campus ='$campusselect' AND uniqe ='$teacher'";
                        $send = $conn->query($query);
                        $teacherresult = mysqli_fetch_assoc($send);
                        $tfirstname = $teacherresult['firstname'];
                        $tlastname = $teacherresult['lastname'];
                        $teachername = $tfirstname.' '.$tlastname;
                    }
                    
                 
                    $querystudent = "SELECT * FROM students WHERE school = '$school' AND campus = '$campusselect' AND class ='$class'";
                    $sendstudent = $conn->query($querystudent);
                    $studentnum = mysqli_num_rows($sendstudent);


             
                  
               ?>
            











                  <!-- s -->
                  <tr class="d "       style="">
                 <td class="" style=""><?=$j?></td>
                 <td class="mclass dc" style=""><?=$class?></td>
                
                 <td class="" style=""><a href="" class="studentclasslist"><?=$studentnum?><input type="hidden" class="class" value="<?=$class?>"> <input type="hidden" class="campusselect" value="<?=$campusselect?>"></a></td>
                
                

                   
                     
                 </tr>




                
                <?php
                    }
                }
            
                  
                ?>
                  


                </table>
               </div>
         <!--  -->
           
          
        </div>

        </div>
        <!-- body -->
 <!-- popperstudent -->
 <div class="  d-none popperstudent popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 90%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center appendstudentdetails" style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
    


    </div>
    </div>
    </div>
     <!-- popperstudente -->

    </div>
    <script>

function update(a,b,c,d){
            let stuniqe = a.getAttribute('id');

            let classk = a.getAttribute('class');
            let data = {
                score:b.value,
                test1:c.value,
                test2:d.value,
                studentcampus4:a.value,
                uniqe4:stuniqe,
                class:classk
            }
            data = JSON.stringify(data);
            let xml = new XMLHttpRequest;
        xml.open('POST','exampro.php');

        xml.onreadystatechange =()=>{
            if(xml.readyState == 4 && xml.status == 200){
              alert(xml.responseText)
            }
        }
        xml.setRequestHeader('content-type','application/json')
        xml.send(data);

              a.parentElement.style.display='none';
        }


        function a(a){
            let stuniqe = a.getAttribute('id');
            console.log(stuniqe)

            let uniqe = document.getElementsByClassName(a)[0];
            let data = {
                studentcampus : a.value,
                uniqe:stuniqe
            }
            data = JSON.stringify(data);
            let xml = new XMLHttpRequest;
        xml.open('POST','exampro.php');
        xml.onreadystatechange =()=>{
            if(xml.readyState == 4 && xml.status == 200){
                let response = xml.responseText;
                let studentdetails = document.querySelector('.appendstudentdetails');
                studentdetails.innerHTML = response;
            }
        }
        xml.setRequestHeader('content-type','application/json')
        xml.send(data);

            $('.popperstudent').removeClass('d-none');

        }



    </script>



</body>
</html>