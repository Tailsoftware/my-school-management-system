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


if(isset($_POST['feetype']) AND isset($_POST['feeamount']) AND isset($_POST['class']) ){
    $fee = htmlspecialchars($_POST['feetype']);
    $amount = htmlspecialchars($_POST['feeamount']);
    $class = htmlspecialchars($_POST['class']);
    $query ="INSERT INTO fees (feename,amount,`class`,school,campus) VALUES ('$fee','$amount','$class','$school','$campusselect')";
    $send = $conn->query($query);
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
     if(isset($teachername['studentcampus']) AND isset($teachername['uniqe'])){
     $campusselect = $teachername['studentcampus']; 
     $teacherid = $teachername['uniqe'];
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
    else if(isset($teachername['campusselect']) AND isset($teachername['classs'])  AND isset($teachername['feename'])){

    $campusselect = $teachername['campusselect']; 
    $feename = $teachername['feename']; 
    $class = $teachername['classs'];
    $query1 = "SELECT * FROM fees WHERE school = '$school' AND campus ='$campusselect' AND class ='$class' OR school = '$school' AND campus ='$campusselect' AND class ='all'";
    $send1 = $conn->query($query1);
    $result1 = mysqli_fetch_assoc($send1);
    $feeamount = $result1['amount'];
    $query = "SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect' AND class ='$class'";
    $send = $conn->query($query);
    $resultnum = mysqli_num_rows($send);
    $i = 0;
    while($result = mysqli_fetch_assoc($send)){
        $i++;
        $campusselect = $teachername['campusselect']; 

        $firstname = $result['firstname'];
    $lastname = $result['lastname'];
    $uniqe = $result['uniqe'];
    $class = $result['class'];
    $query2 = "SELECT * FROM payedfees WHERE uniqe ='$uniqe' AND feename ='$feename'";
    $send2 = $conn->query($query2);
    $resultnum2 = mysqli_num_rows($send2);
    if($resultnum2>0){
    $result2 = mysqli_fetch_assoc($send2);
    $payed = $result2['payed'];
    $remaining = $result2['remaining'];

    echo('
    <!-- s -->
    <tr class="stt d" style="">
    <input type="hidden" id="'.$uniqe.'" value="'.$campusselect.'">

     <td>1</td>
     <td><span class="student text-primary text-decoration-underline" onclick="a('.$uniqe.')" style="cursor: pointer;">'.$uniqe.'</span></td>
     <td class="dc">'.$firstname.'</td>
     <td class="dc" >'.$lastname.'</td>
    
     <td>'.$payed.'</td>
     <td>'.$remaining.'</td>

 </tr>
    
    ');
    }
    else{
    
    echo('
    <!-- s -->
    <tr class="stt d" style="">
    <input type="hidden" id="'.$uniqe.'" value="'.$campusselect.'">

     <td>1</td>
     <td><span class="student text-primary text-decoration-underline" onclick="a('.$uniqe.')" style="cursor: pointer;">'.$uniqe.'</span></td>
     <td class="dc">'.$firstname.'</td>
     <td class="dc" >'.$lastname.'</td>
    
     <td>0</td>
     <td>'.$feeamount.'</td>

 </tr>
    
    ');

    }
   
    }

    exit();
    }
    if(isset($teachername['studentcampus2']) AND isset($teachername['uniqe2'])){

        $campusselect = $teachername['studentcampus2']; 
        $teacherid = $teachername['uniqe2'];
       $query = "DELETE  FROM students WHERE school = '$school' AND campus ='$campusselect' AND uniqe ='$teacherid'";
       $send = $conn->query($query);
    } 
}
    }

if(isset($_POST['makefeepayment'])){
    if(isset($_POST['payedto']) AND isset($_POST['studentid']) AND isset($_POST['feename']) AND isset($_POST['amountpayed'])){
        $payedto = htmlspecialchars($_POST['payedto']);
        $studentid = htmlspecialchars($_POST['studentid']);
        $feename = htmlspecialchars($_POST['feename']);
        $amountpayed = htmlspecialchars($_POST['amountpayed']);

        $querya = "SELECT *  FROM fees WHERE school ='$school' AND campus='$campusselect' AND feename ='$feename'";
        $senda = $conn->query($querya);
        $resultnuma = mysqli_num_rows($senda);
        $resulta = mysqli_fetch_assoc($senda);
        $feeamount = $resulta['amount'];
        $tcollected = $resulta['collected'];
        $newcollected = $tcollected+$amountpayed;
        $queryb ="UPDATE fees SET collected ='$newcollected' WHERE feename ='$feename' AND school ='$school' AND campus ='$campusselect'";
        $sendb = $conn->query($queryb);



        $query = "SELECT *  FROM students WHERE  uniqe ='$studentid'";
        $send = $conn->query($query);
        $resultnum = mysqli_num_rows($send);
        if($resultnum>0){
        $result = mysqli_fetch_assoc($send);
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
        $class = $result['class'];
        }
        $remaining = $feeamount - $amountpayed;
        if($feeamount === $amountpayed){
            $completed ='completed';

        }
        else{
            $completed ='not completed';
        }
        if($resultnum>0){
            $time = time();

            $query2 ="INSERT INTO payedfees (uniqe,class,payed,remaining,completed,feename,firstname,lastname,school,campus,payedto,time) VALUES('$studentid','$class','$amountpayed','$remaining','$completed','$feename','$firstname','$lastname','$school','$campusselect','$payedto','$time')";
            $send2 = $conn->query($query2);
            echo '<script>alert("payment made succesfull")</script>';
        }
        else{
            echo '<script>alert("incorect student ID")</script>';
        }


    }
    else{
        echo '<script>alert("please fill all field")</script>';

    }
}
   

    if(isset($teachername["updateamount"]) AND isset($teachername['feename'])){
        $time = time();

       echo  $amount=htmlspecialchars($teachername["updateamount"]);
       echo $name=htmlspecialchars($teachername["feename"]);
         $query="UPDATE fees SET amount ='$amount',time='$time' WHERE feename ='$name' AND school='$school' AND campus='$campusselect'";
         $send=$conn->query($query);
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
    <div class="container-fluid full-vh  d-flex p-0" style="">

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
    <div class="col-12 col-md-8 h-75 m-auto box2  position-relative" style="padding: 10px;">
  
<!-- popperclasslist -->
<div class=" d-none  popperclasslistpayment  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 80%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
        <input type="text" class="form-control" value="Students in Jss3A">
              
        <form action="" class="col-12 ">
        <div class="input-group mt-2 form-control w-100 ">
                   <input type="text" class="form-control search" placeholder="search name">
                    <button class="btn btn-dark"><i class="fa fa-search"></i></button>
                </div>
         </form>
         </form>

        <div class="table-responsive h-75 overflow-scroll mt-5 col-12" >

          

            <table class="table table-striped table-bordered" style="text-transform: capitalize;">
             <!-- s -->
             <tr class="table-active" style="font-weight: 600;">
                     <td>#</td>
                     <td>Reg no</td>
                     <td>Firstname</td>
                     <td>Lastname</td>
                     <td>Paid</td>
                     <td>Ballance</td>
                     <td>action</td>

                 </tr>
                 <!-- e -->
        
          
          
                 <!-- s -->
                 <tr class="" style="">
                     <td>1</td>
                     <td><a href="">hgytf5456</a></td>
                     <td>Firstname</td>
                     <td>Lastname</td>
                     <td>0</td>
                     <td>3000</td>
                    
                     <td>
                       <input type="radio" style="accent-color: red;" class="" checked>
                     </td>

                 </tr>
                 <!-- e -->
                 <!-- s -->
                 <tr class="" style="">
                     <td>1</td>
                     <td><a href="">hgytf5456</a></td>
                     <td>Firstname</td>
                     <td>Lastname</td>
                     <td>300</td>
                     <td>3000</td>
                    
                     <td>
                        <input type="radio" style="accent-color: yellow;" class="" checked>
                      </td>
 

                 </tr>
                 <!-- e -->
                 <!-- s -->
                 <tr class="" style="">
                     <td>1</td>
                     <td><a href="">hgytf5456</a></td>
                     <td>Firstname</td>
                     <td>Lastname</td>
                     <td>3000</td>
                     <td>0</td>
                    
                     <td>
                        <input type="radio" style="accent-color: green;" class="" checked>
                      </td>

                 </tr>
                 <!-- e -->
                
                
             </table>
            </div>


   
    </div>
    </div>
    </div>
     <!-- popperclassliste -->
  

  <!-- popperteacher -->
  <div class=" d-none popperteachersdetails popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 1000; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 90%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center  appentteachersresponse" style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
   
    

    </div>
    </div>
    </div>
     <!-- popperteachere -->




<!-- popperclasslisteditfees -->
<div class=" d-none popperclasslistpaymentedit   popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 80%; padding: 10px;">
    <button class="btn btn-primary"> Update</button>
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
        <input type="text" class="form-control" value="Students in Jss3A">
              
        <form action="" class="col-12">
          <div class="input-group mt-2 form-control">
            <input type="text" class="form-control" placeholder="reg no here...">
            <input type="text" class="form-control" placeholder="Firstname">
            <input type="text" class="form-control" placeholder="Lastname">
           
             
              <button class="btn btn-primary"><i class="fa fa-search"></i></button>
              <button class="btn btn-danger"><i class="fa fa-close"></i></button>
          </div>
         </form>

        <div class="table-responsive h-75 overflow-scroll mt-5 col-12" >

          

        <table class=" tablem d-flex flex-column" style="text-transform: capitalize;" id="classtable" >
             <!-- s -->
             <tr class="table-active" style="font-weight: 600;">
                     <td>#</td>
                     <td>Reg no</td>
                     <td>Firstname</td>
                     <td>Lastname</td>
                     <td>Paid</td>
                     <td>Ballance</td>
                     <td>completed</td>

                 </tr>
                 <!-- e -->
        
          
          
                 <!-- s -->
                 <tr class="" style="">
                     <td>1</td>
                     <td><a href="">hgytf5456</a></td>
                     <td>Firstname</td>
                     <td>Lastname</td>
                     <td><input type="text" class="form-control"></td>
                     <td><input type="text" class="form-control"></td>
                    
                     <td>
                       <input type="checkbox"  class="form-check-input" >
                     </td>

                 </tr>
                 <!-- e -->
                 <!-- s -->
                 <tr class="" style="">
                     <td>1</td>
                     <td><a href="">hgytf5456</a></td>
                     <td>Firstname</td>
                     <td>Lastname</td>
                     <td><input type="text" class="form-control"></td>
                     <td><input type="text" class="form-control"></td>
                    
                     <td>
                       <input type="checkbox"  class="form-check-input" >
                     </td>

                 </tr>
                 <!-- e -->
                 <!-- s -->
                 <tr class="" style="">
                     <td>1</td>
                     <td><a href="">hgytf5456</a></td>
                     <td>Firstname</td>
                     <td>Lastname</td>
                     <td><input type="text" class="form-control"></td>
                     <td><input type="text" class="form-control"></td>
                    
                     <td>
                       <input type="checkbox"  class="form-check-input" >
                     </td>

                 </tr>
                 <!-- e -->
                 <!-- s -->
                 <tr class="" style="">
                     <td>1</td>
                     <td><a href="">hgytf5456</a></td>
                     <td>Firstname</td>
                     <td>Lastname</td>
                     <td><input type="text" class="form-control"></td>
                     <td><input type="text" class="form-control"></td>
                    
                     <td>
                       <input type="checkbox"  class="form-check-input" >
                     </td>

                 </tr>
                 <!-- e -->
               
                
             </table>
            </div>


   
    </div>
    </div>
    </div>
     <!-- popperclasslisteeditfees -->
<!-- popperfeelist -->
<div class=" d-none popperfeelist   popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 80%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="" class="col-12 d-none">
        <div class="input-group mt-2 form-control w-100">
                   <input type="text" class="form-control search" placeholder="search fee" id="search">
                    <button class="btn btn-dark"><i class="fa fa-search"></i></button>
                </div>
         </form>
         </form>

        <div class="table-responsive h-75 overflow-scroll mt-5 col-12 d-flex justify-content-center" >

          
       

        <table class=" tablem d-flex flex-column" style="text-transform: capitalize;" id="classtable" >
             <!-- s -->
             <tr class="table-active" style="font-weight: 600;">
                     <td>#</td>
                     <td>Fee Type</td>
                     <td>Total Paid</td>
                     <td>Amount</td>
                    
                     <td>Action</td>

                   

                 </tr>
                 <!-- e -->
        
                <?php
                if(isset($campusselect)){
                    $query = "SELECT * FROM fees WHERE school = '$school' AND campus = '$campusselect'";
                    $send = $conn->query($query);
                    $resultnum = mysqli_num_rows($send);
                   $j=0;
                    for($i=0;$i<$resultnum ;$i++){
                       $j++;
                    $result = mysqli_fetch_assoc($send);
                    $feename = $result['feename'];
                    $amount = $result['amount'];
                    $collected = $result['collected'];
                    ?>
                     <!-- s -->
                     <tr class="d" style="">
                        <td><?=$j?></td>
                        <td class="dc" ><?=$feename?></td>
                        <td><?=$collected?></td>
                        <td class="td"><input type="text" class="form-control tdc" value="<?=$amount?>" name="updateamount"></td>
                      
                        <td class=""> <button class="btn btn-success mt-2 feeupdate text-dark"><input type="hidden" name="feename" value="<?=$feename?>" class="feename"> <input type="hidden" name="feeamount" value="" class="feeamount "> update</button></td>
                      
                        
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
     <!-- popperfeeliste -->
<!-- popperEditclasslist -->
<div class=" d-none poppermakepayment popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-4 bg-light position-relative" style="border-radius: 10px;height: 60%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center " style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
   
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-12 d-flex justify-content-center flex-column a">
            <div class="formbox mt-3">
                    <label for="" class="col-12 text-capitalize">payed to</label>
                    <input type="text" class="form-control" style="" value="<?=$myuniqe?>" name="payedto">

                </div>
            <div class="formbox mt-3">
                    <label for="" class="col-12 text-capitalize">students ID</label>
                    <input type="text" class="form-control" style="" name="studentid">

                </div>
                <div class="formbox">
                    <label for="selectteacher " class="col-12 text-capitalize">Fee name</label>
                    <select name="feename" id="" class="form-control" style="" >
                        <option value=""></option>

                        <?php
                        $query = "SELECT * FROM fees WHERE school = '$school' AND campus ='$campusselect'";
                        $send = $conn->query($query);
                        while($result=mysqli_fetch_assoc($send)){
                            $feename = $result['feename'];
                            $amount = $result['amount'];
                           
                            ?>
                          
                               <option value="<?=$feename?>"><?=$feename?> &nbsp;:<?=$amount?></option>
                            <?php
                        }
                        
                        ?>
                      
                       
                    </select>
                </div>
             
              
                <div class="formbox mt-3">
                    <label for="" class="col-12 text-capitalize">Amount payed</label>
                    <input type="text" class="form-control" style="" name="amountpayed">

                </div>
               
                <div class="formbox mt-3">
                    <input type="submit" class="form-control bg-dark text-light" style="" value="Make payment" name="makefeepayment">

                </div>
             
        
            
        
            </form>

        
    </div>
    </div>
    </div>
     <!-- popperEditclassliste -->
<!-- poppercreatefees -->
<div class=" d-none   poppercreatefees popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-4 bg-light position-relative" style="border-radius: 10px;height: 50%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12   d-flex flex-column g-2 align-items-center  " style="height: 100%;padding-bottom: 1cm ;">
               
              
                
                
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-12 d-flex justify-content-center flex-column a mt-4">
              
            <select name="class" id="" class="form-control" style="">
                <option value="">select class</option>
                <option value="all">All</option>

                <?php
                
                $query = "SELECT * FROM class WHERE school = '$school' AND campus = '$campusselect'";
                $send = $conn->query($query);
               echo $resultnum = mysqli_num_rows($send);

                for($i=0;$i<$resultnum ;$i++){
                $result = mysqli_fetch_assoc($send);
                $class = $result['mclass'];
                ?>
                <option value="<?=$class?>"><?=$class?></option>
               <?php
                }


                
                ?>

                </select>
                    <input type="text" class="form-control" style="" placeholder="Fee Type" name="feetype">
                    <input type="number" class="form-control " style="" placeholder="Amount" name="feeamount">

               
                <div class="formbox mt-3">
                    <input type="submit" class="form-control bg-dark text-light mt-3" style="" value="Add fee">

                </div>
             

            </form>

        
    </div>
    </div>
    </div>
     <!-- poppercreatefees e -->



     <!-- popperteacher -->
<div class=" d-none popperteachersdetails popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
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
     <!-- popperteachere -->
 <!-- popperstudent -->
 <div class="  d-none popperstudent popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 101; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 90%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center appendstudentdetails" style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
    


    </div>
    </div>
    </div>
     <!-- popperstudente -->
     <!-- popperstudent -->
    <div class="  d-none popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 90%; padding: 10px;">
    <button class="btn btn-danger float-end">X</button>
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



<!-- popperclasslist -->
<div class="  d-none popperclasslist  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);" id="c">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 80%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="" class="col-12 d-none">
        <div class="input-group mt-2 form-control w-100">
                   <input type="text" class="form-control search" placeholder="search name" id="sea">
                    <button class="btn btn-dark"><i class="fa fa-search"></i></button>
                </div>
         </form>

         <div class="table-responsive col-11 " >

          
<table class="tablem d-flex flex-column  thestudentlist3 " style="text-transform: capitalize; width:80%;"  >

     <!-- s -->
     <tr class="table-active" style="font-weight: 600;">
             <td>#</td>
             <td>Reg no</td>
             <td>Firstname</td>
             <td>Lastname</td>
             <td>payed</td>
             <td>remaining</td>

         </tr>
         <!-- e -->

  
  
       
     </table>
    </div>

   
    </div>
    </div>
    </div>
     <!-- popperclassliste -->



         <!-- popperclasslistcheck -->
<div class="d-none 2  popperclasslistcheck  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 80%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
        <input type="text" class="form-control" value="school fees for students in Jss3A">
              
        <form action="" class="col-12">
        <div class="input-group mt-2 form-control w-100">
                   <input type="text" class="form-control search" placeholder="search name">
                    <button class="btn btn-dark"><i class="fa fa-search"></i></button>
                </div>
         </form>
         </form>



        

        <div class="table-responsive h-75 overflow-scroll mt-5 col-12" >

          
               <form action="">
                <input type="submit" class=" position-absolute top-0 bg-primary text-capitalize text-light " value="update" style="width: 3cm;height: 1.2cm;border: none; border-radius: 5px;">


                <table class="table table-striped table-bordered" style="text-transform: capitalize;">
                 <!-- s -->
                 <tr class="table-active" style="font-weight: 600;">
                         <td>#</td>
                         <td>id</td>
                         <td style="min-width: 3cm;">Fee Type</td>
                         <td>gender</td>
                         <td>firstname</td>
                         <td>lastname</td>
                         <td>Paid</td>
                         <td>Ballance</td>
                         <td>completed</td>
 
                     </tr>
                     <!-- e -->
                     <!-- s -->
                     <tr class="" style="">
                         <td>1</td>
                         <td> <a href="" class="teachersdetails">4543errd5</a></td>
                         <td>mrs</td>
                         <td>kingsley</td>
                         <td>samuel</td>
                         <td>jss3A</td>
                         <td>2023-12-24 12:34:6</td>
                         <td>
                                <input type="checkbox" class="form-check-input">
    

                        </td>
 
                     </tr>
                     <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->
                    <!-- s -->
                    <tr class="" style="">
                     <td>1</td>
                     <td> <a href="" class="teachersdetails">4543errd5</a></td>
                     <td>mrs</td>
                     <td>kingsley</td>
                     <td>samuel</td>
                     <td>jss3A</td>
                     <td>2023-12-24 12:34:6</td>
 
                     <td>

                            <input type="checkbox" class="form-check-input">


                     </td>
 
                 </tr>
                 <!-- e -->

                 </table>
                </form>
 
            </div>
          

   
    </div>
    </div>
    </div>
     <!-- popperclasslistecheck e-->


     <!-- popperpicture -->
    <div class=" d-none  popperpicture d-flex align-items-center justify-content-center " style="position: fixed; top: 0; height: 100%; width: 100%; z-index: 10;right: 0;background-color: rgba(0, 0, 0, 0.808);" ">
       <button class="btn btn-danger position-absolute close2" style="top: 10px; right: 10px; ">X</button>
      <img src="../../res/images/paxlogo.jpg" alt="">
    </div>


     <!-- popperpicture -->



                  
                    <a href="" class="btn btn-dark text-capitalize createfees <?=$adddfees?>"> Add Fees</a>
                    <a href="" class="btn btn-dark text-capitalize feelist <?=$updatepriceee?> " > update price</a>
                    <a href="" class="btn btn-dark text-capitalize makepayment">make payment</a>

                    

            

               <form action="" class="col-12 d-none">
               <div class="input-group mt-2 form-control w-100">
                   <input type="text" class="form-control search" placeholder="search fee" id="search">
                    <button class="btn btn-dark"><i class="fa fa-search"></i></button>
                </div>
               </form>




               <div class="mt-4 " style="overflow:scroll;">

               <table class=" table table-striped " style="text-transform: capitalize;" id="classtable" >
                <!-- s -->
                <tr class="table-active" style="font-weight: 600;">
                        <td>#</td>
                        <td>Class</td>
                       
                        <td>students</td>
                        <td>Paid</td>
                        <td>Unpaid</td>
                       
                        <td>Fee Name</td>
                        <td>Amount</td>
                        <td>Total paid</td>
                       

                    </tr>
                    <!-- e -->

                         <?php
                         if($_SESSION['section'] == 'admin'){
                         if(isset($campusselect)){
                         $query ="SELECT * FROM fees WHERE school = '$school' AND campus ='$campusselect'";
                         $send = $conn->query($query);
                         $resultnum = mysqli_num_rows($send);
                         $j=0;
                         while($result = mysqli_fetch_assoc($send)){
                            $j++;
                            $mclass = $result['class'];
                            $feename = $result['feename'];
                            $amount = $result['amount'];
                            $collected = $result['collected'];
                            if($mclass != 'all'){
                                $query2 ="SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect' AND class ='$mclass'";
                                $send2 = $conn->query($query2);
                                $resultnum2 = mysqli_num_rows($send2);
                                $studentnumber = $resultnum2;
                            }
                            else{
                                $query2 ="SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect'";
                                $send2 = $conn->query($query2);
                                $resultnum2 = mysqli_num_rows($send2);
                                $studentnumber = $resultnum2;
                            }
                            $query3 ="SELECT * FROM payedfees WHERE feename ='$feename' AND school = '$school' AND campus ='$campusselect' AND class ='$mclass' AND payed != ''";
                                $send3 = $conn->query($query3);
                                $payedstudentnumber = mysqli_num_rows($send3);

                            $query4 ="SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect' AND class ='$mclass'";
                                $send4 = $conn->query($query4);
                                $studentnumber2 = mysqli_num_rows($send4);
                                $unpaidstudentnumber = $studentnumber2 - $payedstudentnumber;
                          ?>


                       <!-- s -->
                        <tr class="d" style="">
                        <td><?=$j?></td>
                        <td><?=$mclass?></td>
                        <td class="" style=""><a href="" class="studentclasslist2"><?=$studentnumber?><input type="hidden" class="class" value="<?=$mclass?>"> <input type="hidden" class="campusselect" value="<?=$campusselect?>"> <input type="hidden" class="fee" value="<?=$feename?>"> </a></td>

                        <td><?=$payedstudentnumber?></td>
                        <td><?=$unpaidstudentnumber?></td>
                        <td style="min-width: 3cm;" class="dc"><?=$feename?></td>
                        <td><?=$amount?></td>
                        <td><?=$collected?></td>
                       
                    
                     

                    </tr>
                    <!-- e -->


                        <?php


                         }
                        }
                    }
                    else{

                   if(isset($campusselect)){
                         $query ="SELECT * FROM fees WHERE school = '$school' AND campus ='$campusselect' AND class ='$myclass'";
                         $send = $conn->query($query);
                         $resultnum = mysqli_num_rows($send);
                         $j=0;
                         while($result = mysqli_fetch_assoc($send)){
                            $j++;
                            $mclass = $result['class'];
                            $feename = $result['feename'];
                            $amount = $result['amount'];
                            $collected = $result['collected'];
                            if($mclass != 'all'){
                                $query2 ="SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect' AND class ='$mclass'";
                                $send2 = $conn->query($query2);
                                $resultnum2 = mysqli_num_rows($send2);
                                $studentnumber = $resultnum2;
                            }
                            else{
                                $query2 ="SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect'";
                                $send2 = $conn->query($query2);
                                $resultnum2 = mysqli_num_rows($send2);
                                $studentnumber = $resultnum2;
                            }
                            $query3 ="SELECT * FROM payedfees WHERE feename ='$feename' AND school = '$school' AND campus ='$campusselect' AND class ='$mclass' AND payed != ''";
                                $send3 = $conn->query($query3);
                                $payedstudentnumber = mysqli_num_rows($send3);

                            $query4 ="SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect' AND class ='$mclass'";
                                $send4 = $conn->query($query4);
                                $studentnumber2 = mysqli_num_rows($send4);
                                $unpaidstudentnumber = $studentnumber2 - $payedstudentnumber;
                          ?>


                       <!-- s -->
                        <tr class="d" style="">
                        <td><?=$j?></td>
                        <td><?=$mclass?></td>
                        <td class="" style=""><a href="" class="studentclasslist2"><?=$studentnumber?><input type="hidden" class="class" value="<?=$mclass?>"> <input type="hidden" class="campusselect" value="<?=$campusselect?>"> <input type="hidden" class="fee" value="<?=$feename?>"> </a></td>

                        <td><?=$payedstudentnumber?></td>
                        <td><?=$unpaidstudentnumber?></td>
                        <td style="min-width: 3cm;" class="dc"><?=$feename?></td>
                        <td><?=$amount?></td>
                        <td><?=$collected?></td>
                       
                    
                     

                    </tr>
                    <!-- e -->
                         <?php
                        }
                     }
                    }
                  
                      ?>;
                </table>
               </div>

            </div>
            
        </div>
        <!-- body -->
    </div>
    <script>
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
        xml.open('POST','acountant.php');
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