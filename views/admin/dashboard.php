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
    $movement='d-none';

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
    $officestaffnotpermit='d-none';
    $movement='';

   
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
    $teas = 'd-none';
    $lib ='';
    $movement='d-none';

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
    $h ='';
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
     $officestaffnotpermit='';
     $teas ='';
     $movement='';

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
  $campusselect = $_SESSION['campusselect'];

  $query = "SELECT * FROM plan WHERE school ='$school' AND admin ='$email'";
  $send = $conn->query($query);
  $resultnum = mysqli_num_rows($send);
  if($resultnum<1){
    $query = "INSERT INTO plan (school,admin,plan) VALUES ('$school','$email','active')";
    $send = $conn->query($query);
  }
  
  }

  $query = "SELECT * FROM smscount WHERE school ='$school' AND email ='$email'";
  $send = $conn->query($query);
  $resultnum = mysqli_num_rows($send);
  if($resultnum<1){
    $query = "INSERT INTO smscount (school,email,count) VALUES ('$school','$email','0')";
    $send = $conn->query($query);
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


    $query ="SELECT schoolimg FROM admin WHERE school ='$school'";
$send = $conn->query($query);
$result = mysqli_fetch_assoc($send);
$schoolimg = $result['schoolimg'];


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


    $query ="SELECT schoolimg FROM admin WHERE school ='$school'";
$send = $conn->query($query);
$result = mysqli_fetch_assoc($send);
$schoolimg = $result['schoolimg'];


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


    $query ="SELECT schoolimg FROM admin WHERE school ='$school'";
$send = $conn->query($query);
$result = mysqli_fetch_assoc($send);
$schoolimg = $result['schoolimg'];


  }

}



}
$sessionstart ='';
$sessionend ='';

$query = "SELECT * FROM session WHERE school ='$school' ORDER BY id DESC LIMIT 1";
$send = $conn->query($query);
$result = mysqli_fetch_assoc($send);
 $_SESSION['sessionstart'] = $result['sessionstart'];
$_SESSION['sessionend'] = $result['sessionend'];


if(isset($_SESSION['sessionstart'])){
 $sessionstart = $_SESSION['sessionstart'];
}
if(isset($_SESSION['sessionend'])){
 $sessionend = $_SESSION['sessionend'];
}



               $query = "SELECT * FROM newsandevent WHERE school = '$school' AND campus = '$campusselect' AND `type` = 'noticeboard'";
/*             $query = "SELECT * FROM newsandevent WHERE school = '$school' AND campus = '$campus' OR school = '$school' AND campus = 'all'";
 */            $send = $conn->query($query);
              $noticeboard = mysqli_num_rows($send);


                if($section =='student'){
                    $query = "SELECT * FROM loanedbook WHERE loanto ='$myuniqe'";
                    $send = $conn->query($query);
                   $resultnum = mysqli_num_rows($send);
                   $loanedbook = 0;
                  while($result = mysqli_fetch_assoc($send)){
                   $number = $result['number'];
                   $loanedbook+=$number;
                  }
                   
                }
                elseif($section =='admin'){
                    $query = "SELECT * FROM loanedbook WHERE school ='$school' AND campus = '$campusselect'";
                    $send = $conn->query($query);
                    $resultnum = mysqli_num_rows($send);
                    $loanedbook = 0;
                   while($result = mysqli_fetch_assoc($send)){
                    $number = $result['number'];
                    $loanedbook+=$number;
                   }
                }
                elseif($section =='staff'){
                    $query = "SELECT * FROM loanedbook WHERE school ='$school' AND campus = '$campusselect'";
                    $send = $conn->query($query);
                    $resultnum = mysqli_num_rows($send);
                    $loanedbook = 0;
                   while($result = mysqli_fetch_assoc($send)){
                    $number = $result['number'];
                    $loanedbook+=$number;
                }
                }
                elseif($section =='teacher'){
                    $query = "SELECT * FROM loanedbook  WHERE loanby ='$myuniqe'";
                    $send = $conn->query($query);
                   $resultnum = mysqli_num_rows($send);
                   $loanedbook = 0;
                  while($result = mysqli_fetch_assoc($send)){
                   $number = $result['number'];
                   $loanedbook+=$number;
                  }
                   
                }


                 $d = date('Y-m');
                $query = "SELECT * FROM teachers WHERE school ='$school' AND campus = '$campusselect' AND lastattendance LIKE '$d%'";
                $send = $conn->query($query);
               $teachersnum = mysqli_num_rows($send);


                 $d = date('Y-m-d');
                $query = "SELECT * FROM attendance WHERE school ='$school' AND campus = '$campusselect' AND section='teachers' AND datetime LIKE '$d%'";
                $send = $conn->query($query);
               $teachersatt = mysqli_num_rows($send);



               $d = date('Y-m');
                $query = "SELECT * FROM teachers WHERE school ='$school' AND campus = '$campusselect' AND lastattendance LIKE '$d%'";              
                 $send = $conn->query($query);
              $teacersabsent = 0;
              $d = date('Y-m-d');

              while($result = mysqli_fetch_assoc($send)){
                $uniqet = $result['uniqe'];
                $query2 = "SELECT * FROM attendance WHERE school ='$school' AND campus = '$campusselect' AND section='teachers' AND uniqe = '$uniqet' AND datetime LIKE '$d%'";
                $send2 = $conn->query($query2);
               $resultnum2 = mysqli_num_rows($send2);
               if($resultnum2 <= 0){
                $teacersabsent++;
               }

              }

              if($section =='teacher'){
                $query = "SELECT * FROM students WHERE school ='$school' AND campus = '$campusselect' AND class = '$class'";
              $send = $conn->query($query);
             $studentnumber = mysqli_num_rows($send);

             $d = date('Y-m-d');

             $query = "SELECT * FROM students WHERE school ='$school' AND campus = '$campusselect' AND lastattendance LIKE '$d%' AND class = '$class' ";
              $send = $conn->query($query);
             $studentatt = mysqli_num_rows($send);



             $query = "SELECT * FROM students WHERE school ='$school' AND campus = '$campusselect' AND lastattendance NOT LIKE '$d%' AND class = '$class'";
              $send = $conn->query($query);
             $studentabsent = mysqli_num_rows($send);


             

              }
              elseif($section =='admin'){
                $query = "SELECT * FROM students WHERE school ='$school' AND campus = '$campusselect'";
                $send = $conn->query($query);
               $studentnumber = mysqli_num_rows($send);

               $d = date('Y-m-d');

             $query = "SELECT * FROM students WHERE school ='$school' AND campus = '$campusselect' AND lastattendance LIKE '$d%'";
              $send = $conn->query($query);
             $studentatt = mysqli_num_rows($send);

             $query = "SELECT * FROM students WHERE school ='$school' AND campus = '$campusselect' AND lastattendance NOT LIKE '$d%'";
             $send = $conn->query($query);
            $studentabsent = mysqli_num_rows($send);

              }

              $query = "SELECT * FROM payedfees WHERE payedto ='$myuniqe' AND time > '$sessionstart' AND time < '$sessionend'";
              $send = $conn->query($query);
             $resultnum = mysqli_num_rows($send);
             $totalincome = 0;
             while($result=mysqli_fetch_assoc($send)){
                $payed = $result['payed'];
                $totalincome += $payed;
             }


             if($section =='admin'){
                $query = "SELECT * FROM payedfees WHERE school ='$school' AND campus = '$campusselect' AND time > '$sessionstart' AND time < '$sessionend'";
                $send = $conn->query($query);
               $resultnum = mysqli_num_rows($send);
               $totalincome = 0;
               while($result=mysqli_fetch_assoc($send)){
                  $payed = $result['payed'];
                  $totalincome += $payed;
               }

                
               $d = date('Y-m');
               $query = "SELECT * FROM teachers WHERE school ='$school' AND campus = '$campusselect' AND lastattendance LIKE '$d%'";
               $send = $conn->query($query);
               $resultnum = mysqli_num_rows($send);
              $totalsalary = 0;
if($resultnum>0){
    $result = mysqli_fetch_assoc($send);
    for($i=0;$i<$resultnum;$i++){
        $uniqet = $result['uniqe'];

        $salary = $result['salary'];
        $salary = $salary/28;

        $query2 = "SELECT * FROM attendance WHERE school ='$school' AND campus = '$campusselect' AND section='teachers' AND uniqe = '$uniqet' AND datetime LIKE '$d%'";
        $send2 = $conn->query($query2);
       $resultnum2 = mysqli_num_rows($send2);
       $salary = $salary*$resultnum2;
        $totalsalary = round($totalsalary+=$salary);
        $_SESSION['tsalary'] = $totalsalary;
    }
    
     
               
              
}
$query = "SELECT * FROM officestaf WHERE school ='$school' AND campus = '$campusselect' AND lastattendance LIKE '$d%'";
$send = $conn->query($query);
               $resultnum = mysqli_num_rows($send);
              $totalsalary = 0;
if($resultnum>0){
    $result = mysqli_fetch_assoc($send);
    for($i=0;$i<$resultnum;$i++){
        $uniqet = $result['uniqe'];

        $salary = $result['salary'];
        $salary = $salary/28;

       $query2 = "SELECT * FROM attendance WHERE school ='$school' AND campus = '$campusselect' AND section='staff' AND uniqe = '$uniqet' AND datetime LIKE '$d%'";
        $send2 = $conn->query($query2);
       $resultnum2 = mysqli_num_rows($send2);
       $salary = $salary*$resultnum2;
        $totalsalary = round($_SESSION['tsalary']+=$salary);
    }
    
     
               
              
}
     $teas = '';
             

}

$_post = file_get_contents('php://input');
if($_post != null){
    $_post = json_decode($_post,true);
    if(isset($_post['date']) AND isset($_post['content'])){

        $date = htmlspecialchars($_post['date']);
        $content = htmlspecialchars($_post['content']);

        $query = "INSERT INTO cal (school,date,content) VALUES('$school','$date','$content')";
        $conn->query($query);

    }
    if(isset($_post['ddate']) AND isset($_post['dcontent'])){

        $date = htmlspecialchars($_post['ddate']);
        $content = htmlspecialchars($_post['dcontent']);

        $query = "DELETE FROM cal WHERE school='$school' AND date='$date' AND content ='$content'";
        $conn->query($query);

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
    <div class="container-fluid full-vh  d-flex p-0 " style="background-color: rgb(11, 11, 97); ">


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
            <div class="notify   position-absolute top-0" style="height: 6%;width: 100%;">
                <div class="notiicon col-10 col-md-6  h-75 float-end d-flex justify-content-around align-items-center pt-2 pe-2">
                    <h6 style="width: 4cm;"><span><?= date('Y-m-d H:i:')?></span><span class="seconds" style="">33</span></h6>
                    <a href="profile.php"> <i class="fa fa-user text-primary"></i></a>
                    <a href="../messenger/chat.php"> <i class="fa fa-comment text-primary ">
                    <?php
                        $aftern = '';

                     $chatnotifynum='0';
                         $querym = "SELECT notify FROM message WHERE  receaver ='$myuniqe'";
                         $sendm = $conn->query($querym);
                         while($resultm = mysqli_fetch_assoc($sendm)){
                          $notify = $resultm['notify'];
                        $chatnotifynum += $notify;
                        }
                        if($chatnotifynum > 0){
                            $aftern = 'red';

                        }
                        
                     ?>

                    <small class="afternoti" style="background-color:<?=$aftern?>;
">
                    <?=$chatnotifynum?>
                    </small></i></a>
                    <a href="noticeboard.php"> <i class="fa fa-bell text-primary "> 

                    <?php
                     $afternn = '';

                     $query = "SELECT * FROM newsandevent WHERE school = '$school' AND campus='$campusselect'";
                     $send = $conn->query($query);
                     $resultnum = mysqli_num_rows($send);

                     if($resultnum > 0){
                        $afternn = 'red';

                    }
                    
                 ?>

                <small class="afternoti" style="background-color:<?=$afternn?>">
                <?=$resultnum?>
                </small>
                </i></a>
                     
                </div>
            </div>
                
        <div class="row m-0  justify-content-center w-100 sh gap-2  " style="overflow-y: scroll; height: 90%;padding: 1cm; background-color: rgba(128, 128, 128, 0.39); background-image:url(../upload/<?=$schoolimg?>);">


             
            
            <div class="col-5 col-md-3 card <?=$studentnotpermit?>" style="min-height: 100px;">
                <a href="teachers2.php">
                    <h3 class="f">teachers</h3>
                    <span class="y"><?=$teachersnum?></span>

                </a>
            
            </div>
            <div class="col-5 col-md-3 card <?=$studentnotpermit?> " style="min-height: 100px;">
                <a href="teachers3.php">
                    <h3 class="f">teachers attendance </h3>
                    <span class="y"><?=$teachersatt?></span>

                </a>

           
            </div>
            <div class="col-5 col-md-3 card <?=$studentnotpermit?>" style="min-height: 100px;">
                <a href="teachers4.php">
                    <h3 class="f">teachers absent</h3>
                    <span class="y"><?=$teacersabsent?></span>


                </a>
           
            </div>
            <div class="col-5 col-md-3 card <?=$officestaffnotpermit?> <?=$studentnotpermit?>" style="min-height: 100px;">
                <a href="students2.php">
                    <h3 class="f">students</h3>
                    <span class="y"><?=$studentnumber?></span>
                </a>
              
            </div>
            <div class="col-5 col-md-3 card <?=$officestaffnotpermit?> <?=$studentnotpermit?>" style="min-height: 100px;">
                <a href="students3.php">
                    <h3 class="f">students attendance</h3>
                    <span class="y"><?=$studentatt?></span>

                </a>
             
            
            </div>
            <div class="col-5 col-md-3 card <?=$officestaffnotpermit?> <?=$studentnotpermit?>" style="min-height: 100px;">
                <a href="students4.php">
                    <h3 class="f">students absent</h3>
                    <span class="y"><?=$studentabsent?></span>
                </a>
             
            </div>
            <div class="col-5 col-md-3 card" style="min-height: 100px;">
                <a href="">
                    <h3 class="f">noticeboard</h3>
                    <span class="y"><?=$noticeboard?></span>
                </a>
              
            </div>
            <div class="col-5 col-md-3 card <?=$officestaffnotpermit?>" style="min-height: 100px;">
                <a href="lbook.php">
                    <h3 class="f">loaned books</h3>
                    <span class="y"><?=$loanedbook?> </span>
                </a>
            
            </div>
            <div class="col-5 col-md-3 card <?=$studentnotpermit?> <?=$officestaffnotpermit?>" style="min-height: 100px;">
                <a href="">
                    <h3 class="f">Total income</h3>
                    <span class="y"><?=$totalincome?> </span>
                </a>
            
            </div>
           
            <div class="col-5 col-md-3 card <?=$teas?> <?=$studentnotpermit?> <?=$officestaffnotpermit?>" style="min-height: 100px;">
                <a href="sallary.php">
                    <h3 class="f">staff and teachers salary</h3>
                    <span class="y"><?=$totalsalary?></span>
                </a>
               
            
            </div>
         
           
            <div class="col-5 col-md-3 card <?=$teas?> <?=$studentnotpermit?> <?=$officestaffnotpermit?>" style="min-height: 100px;">
                <a href="movement2.php">
                    <h3 class="f">movement book</h3>
                </a>
               
            
            </div>
         
           
           
           <!--  -->
             
            
           
             
           <div class="calender bg-secondary mt-5 " style="">
            <div id ="calender">

                  <!-- (A) PERIOD SELECTOR -->
    <div id="calPeriod">
        <input id="calBack" type="button" value="&lt;">
        <select id="calMonth"></select>
        <input type="number" id="calYear">
        <input id="calNext" type="button" value="&gt;">
      </div>
  
      <!-- (B) CALENDAR -->
      <div id="calWrap"></div>
  
      <!-- (C) EVENT FORM -->
      <dialog id="calForm">
        <form method="dialog">
            
        <div id="evtClose">X</div>
        <h2>CALENDAR EVENT</h2>
        <label>Date</label>
        <input type="text" id="evtDate" readonly>
        <label>Details</label>
        <textarea id="evtTxt" required></textarea>
  
        <input id="evtDel" type="button" value="Delete" class="d-none">
        <input id="evtSave" type="submit" value="Save"  onclick="saveevent()" >
        <input id="" type="button" value="Delete" onclick="delevent()">

      </form></dialog>
            </div>
           </div>
             <!--  -->
        </div>

        </div>
        <!-- body -->
    </div>

    <script>
        <?php
        if($section == 'admin'){


            ?>
 function saveevent(){
 let datee = document.querySelector('#evtDate').value;
 let texte = document.querySelector('#evtTxt').value;
 let data = {
    date:datee,
    content:texte
 }
 data = JSON.stringify(data);
 console.log(data);
 let xml = new XMLHttpRequest;
 xml.open('POST','<?=$_SERVER['PHP_SELF']?>');
 xml.setRequestHeader('content-type','application/json');
 xml.send(data);

 }


 function delevent(){
    let datee = document.querySelector('#evtDate').value;
 let texte = document.querySelector('#evtTxt').value;
 let data = {
    ddate:datee,
    dcontent:texte
 }
 data = JSON.stringify(data);
 console.log(data);

 let xml = new XMLHttpRequest;
 xml.open('POST','<?=$_SERVER['PHP_SELF']?>');
 xml.onreadystatechange = ()=>{
    if(xml.readyState == '4' && xml.status =='200'){
        console.log(xml.responseText);
        $('#evtDel').trigger('click');
    }
 }
 xml.setRequestHeader('content-type','application/json');
 xml.send(data);
}

            <?php

        }
        else{

            ?>
            function saveevent(){
               
               
                }

                function delevent(){
   
                }
                <?php

        }
        
        
        ?>


 
 

    </script>
    
</body>
</html>