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
   if($section == 'teacher'){
    header("location:attendance-students.php");
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
if(isset($_POST['attuniqe']) AND isset($_POST['message'])){
    $time = time();
   $uniq = htmlspecialchars($_POST['attuniqe']);
   $message = htmlspecialchars($_POST['message']);
    $query ="SELECT * FROM teachers WHERE uniqe ='$uniq'";
    $send = $conn->query($query);
   $resultnum = mysqli_num_rows($send);
    if($resultnum>0){
        $date = date('Y-m-d');
        $query ="SELECT * FROM attendance WHERE uniqe ='$uniq' AND `datetime` LIKE '$date%'";
        $send = $conn->query($query);
        $resultnum = mysqli_num_rows($send);
        if($resultnum>0){

            $query ="SELECT * FROM movement WHERE uniqe ='$uniq' ORDER BY id DESC LIMIT 1";
            $send = $conn->query($query);
            $resultnum = mysqli_num_rows($send);
            if($resultnum>0){
                $result = mysqli_fetch_assoc($send);
                $status = $result['status'];
                $date = $result['date'];
                $id = $result['id'];
                if($status=='out'){
                    $query ="UPDATE  movement SET status ='in' WHERE id ='$id'";
                    $send = $conn->query($query);
                   
                    echo'<script>alert("signed in")</script>';
                }
                else{
                    $query ="INSERT INTO movement (school,campus,uniqe,message,status) VALUES ('$school','$campusselect','$uniq','$message','out')";
                    $send = $conn->query($query);
                   
                    echo'<script>alert("signed out")</script>';
                }
            }
            else{
                $query ="INSERT INTO movement (school,campus,uniqe,message,status) VALUES ('$school','$campusselect','$uniq','$message','out')";
                $send = $conn->query($query);
               
                echo'<script>alert("signed out")</script>';
            }

          

        }
        else{
            echo'<script>alert("has not signed today")</script>';

           
        }


       
    }
    else{
        echo'<script>alert("invalid uniqe number")</script>';
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

    </div>

    <!-- teachers details -->

   ');
    }
        if(isset($teachername['campusselect3']) AND isset($teachername['classteachrsname3'])){

     $campusselect = $teachername['campusselect3']; 
     $teacherid = $teachername['classteachrsname3'];
     $date = date('Y-m');

     $query1 = "SELECT * FROM attendance WHERE school = '$school' AND campus ='$campusselect' AND  uniqe ='$teacherid' AND datetime LIKE '$date%' ORDER BY `datetime` DESC";
    $send1 = $conn->query($query1);
   $j=0;
    while($result1 = mysqli_fetch_assoc($send1)){
        $j++;
        $time = $result1['datetime'];
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
        echo('  
        
        <!-- s -->
                 <tr class="table-active" style="font-weight: 600;">
                         <td>'.$j.'</td>
                         <td>'.$gender.'</td>
                         <td>'.$firstname.'</td>
                         <td>'.$lastname.'</td>
                         <td>'.$class.'</td>
                         <td>'.$time.'</td>
                         <td><button class="btn btn-danger">Delete</button></td>
    
                     </tr>
                     <!-- e -->
       ');


    };

   exit();
    }
}
}

?>



<!DOCTYPE html>
<html lang="en" class="bg-success" style="max-height:100vh;">
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
<div class="container-fluid full-vh  d-flex p-0 " style="">

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
        <div class="" style="height: 100%;">

<!-- popper2 -->
<div class=" d-none  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808); ">
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
  </div>
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
        <span style="font-weight: 600;">qualification</span> &nbsp; <span>bsc</span>
        </div>
        <!--  -->
       
      
        
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">family :</span> &nbsp; <span>husband</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">family firstname :</span> &nbsp; <span>promise</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">family lastname :</span> &nbsp; <span>grace</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">family number :</span> &nbsp; <span>09163502564</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;"> email :</span> &nbsp; <span style="text-transform: none;">mother@gmail.com</span>
        </div>
        <!--  -->
       
      </div>

                <!-- teachers details -->


    </div>
    </div>
    </div>
     <!-- popper2e -->





<!-- popperregularity list -->
<div class="d-none  popperregular popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 90%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
  
        <div class="table-responsive h-75 overflow-scroll mt-5 " >

        <table class="table table-striped table-bordered appentteachersresponser" style="text-transform: capitalize;">
                 <!-- s -->
                 <tr class="table-active" style="font-weight: 600;">
                         <td>#</td>
                         <td>gender</td>
                         <td>firstname</td>
                         <td>lastname</td>
                         <td>class</td>
                         <td>date and time</td>
                         <td>action</td>
    
                     </tr>
                     <!-- e -->
                 
                 </table>
         </div>

    </div>
    </div>
    </div>
    <!-- popperregularity list -->


     <!-- popperteacher -->
  <div class=" d-none popperteachersdetails popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 90%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center  appentteachersresponse" style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
   
    

    </div>
    </div>
    </div>
     <!-- popperteachere -->


     <div class="col-11 col-md-8 m-auto box2  position-relative" style="padding: 10px; height:65%">
         
             <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="">
             


               <div class="table-responsive h-75 overflow-scroll mt-5" >

              <textarea name="message" id="" cols="30" rows="10" class="col-12 p-3 " style="resize: none;"></textarea>
            
               </div>

               <div class="input-group mt-3" style="width: cm;">
                <input type="text" class="form-control" placeholder="ID number.." name="attuniqe">
                 <button class="btn btn-primary text-light">Sign</button>
              </div>
               </form>

            </div>
            
        </div>
        <!-- body -->
    </div>
    
</body>
</html>