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


if(isset($_POST['payment'])){
    $payment = $_POST['payment'];
    header('location:'.$payment.'');
}
if(isset($_POST['invoice'])){
    $invoice = $_POST['invoice'];
    header('location:'.$invoice.'');
}


$_post = file_get_contents('php://input');
$_post = json_decode($_post,true);

if($_post != null){
    if(isset($_post['number']) AND isset($_post['feename'])AND isset($_post['amount']) AND isset($_post['uniqe']) AND isset($_post['firstname']) AND isset($_post['lastname']) AND isset($_post['phonenumber']) AND isset($_post['email'])){
        $_SESSION['pnumber'] = $_post['number'];
        $_SESSION['pfeename'] = $_post['feename'];
        $_SESSION['pamount'] = $_post['amount'];
        $_SESSION['puniqe'] = $_post['uniqe'];
        $_SESSION['pfirstname'] = $_post['firstname'];
        $_SESSION['plastname'] = $_post['lastname'];
        $_SESSION['pphonenumber'] = $_post['phonenumber'];
        $_SESSION['pemail'] = $_post['email'];

    }
}


if(isset($_GET['success'])){
    $_SESSION['pstatus'] = 'success';

    echo'<script>alert("payment was made succesfully")</script>';
}
    

if(isset( $_SESSION['pstatus']) AND isset( $_SESSION['pnumber']) AND isset( $_SESSION['pfeename']) AND isset( $_SESSION['pamount']) AND isset( $_SESSION['puniqe']) AND isset( $_SESSION['pfirstname']) AND isset( $_SESSION['plastname']) AND isset( $_SESSION['pphonenumber']) AND isset( $_SESSION['pemail'])){

  $reff =  $_SESSION['pnumber'];
 $feename =   $_SESSION['pfeename'];
 $amount =   $_SESSION['pamount'];
  $stuniqe =  $_SESSION['puniqe'];
  $sfirstname=  $_SESSION['pfirstname'];
  $slastname=  $_SESSION['plastname'];
  $sphonenumber=  $_SESSION['pphonenumber'];
  $semail =  $_SESSION['pemail'];


    $query ="INSERT INTO invoice (number,feename,amount,uniqe,firstname,lastname,phonenumber,email) VALUES('$reff','$feename','$amount','$stuniqe','$sfirstname','$slastname','$sphonenumber','$semail')";
    $send = $conn->query($query);
    
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
        <div class="body flex-grow-1 bg-light  align-items-center d-flex position-relative" style="height: 100%;">
           

        <div class="row m-0  justify-content-center w-100 sh gap-2 " style="overflow-y: scroll; height: 90%;padding: 1cm; background-color: rgba(128, 128, 128, 0.39);">
           
        <div class="d-flex gap-3">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                <button class="btn btn-dark" value="payment.php" name="payment">Payment</button>
                </form>
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">

                <button class="btn btn-primary" value="invoice.php" name="invoice">Invoice</button>

                </form>

                
    
            </div>
         <!--  -->
                   <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-12 col-md-6 h-50 gap-3 d-flex flex-column bg-white justify-content-center">
                   <div class="formbox">
                    <input type="text" class="form-control" placeholder="TReference Or students ID Number" name="invoicenumber">
                   </div>
                  
                    <div class="formbox">
                        <button class="btn btn-primary text-light form-control">Search..</button>
                    </div>
                   </form>


  <center> <div class="table-responsive col-12 col-md-6 d-flex flex-column  align-items-center" >


<?php
if(isset($_POST['invoicenumber'])){
    if($_POST['invoicenumber'] !=''){
    $number = htmlspecialchars($_POST['invoicenumber']);
    $query ="SELECT * FROM invoice WHERE number ='$number'";
    $send = $conn->query($query);
    $resultnum = mysqli_num_rows($send);

    if($resultnum > 0){
        $result = mysqli_fetch_assoc($send);
        $feename = $result['feename'];
        $amount = $result['amount'];
        $reff = $result['number'];
        $id = $result['uniqe'];
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
        $phonenumber = $result['phonenumber'];
        $email = $result['email'];
        $date = $result['datetime'];

        ?>

 <table class="table table-striped mt-4">
    <tr>
      <th>Fee type</th>
      <td><?=$feename?></td>
    </tr>
    <tr>
      <th>Amount</th>
      <td><?=$amount?></td>
    </tr>
    <tr>
      <th>Transaction Refference</th>
      <td><?=$reff?></td>
    </tr>
    <tr>
      <th>Student ID Number</th>
      <td><?=$id?></td>
    </tr>
    <tr>
      <th>Student firstname</th>
      <td><?=$firstname?></td>
    </tr>
    <tr>
      <th>Student lastname</th>
      <td><?=$lastname?></td>
    </tr>
    <tr>
      <th>Student Phonenumber</th>
      <td><?=$phonenumber?></td>
    </tr>
    <tr>
      <th>Student Email</th>
      <td><?=$email?></td>
    </tr>
    <tr>
      <th>Date</th>
      <td><?=$date?></td>
    </tr>

 </table>

       <?php


    }
    else if($resultnum == 0){



        $query ="SELECT * FROM invoice WHERE uniqe ='$number' ORDER BY id DESC";
        $send = $conn->query($query);
        $resultnum = mysqli_num_rows($send);
    
        if($resultnum > 0){
           
            while( $result = mysqli_fetch_assoc($send)){

            
            $feename = $result['feename'];
            $amount = $result['amount'];
            $reff = $result['number'];
            $id = $result['uniqe'];
            $firstname = $result['firstname'];
            $lastname = $result['lastname'];
            $phonenumber = $result['phonenumber'];
            $email = $result['email'];
            $date = $result['datetime'];
    
            ?>
    
     <table class="table table-striped mt-4" style="border-top: 3px solid gray;">
        <tr>
          <th>Fee type</th>
          <td><?=$feename?></td>
        </tr>
        <tr>
          <th>Amount</th>
          <td><?=$amount?></td>
        </tr>
        <tr>
          <th>Transaction Refference</th>
          <td><?=$reff?></td>
        </tr>
        <tr>
          <th>Student ID Number</th>
          <td><?=$id?></td>
        </tr>
        <tr>
          <th>Student firstname</th>
          <td><?=$firstname?></td>
        </tr>
        <tr>
          <th>Student lastname</th>
          <td><?=$lastname?></td>
        </tr>
        <tr>
          <th>Student Phonenumber</th>
          <td><?=$phonenumber?></td>
        </tr>
        <tr>
          <th>Student Email</th>
          <td><?=$email?></td>
        </tr>
        <tr>
          <th>Date</th>
          <td><?=$date?></td>
        </tr>
    
     </table>
    
           <?php
    
            }
        }
    }
   

  

}
}



?>

 


  </div>
  </center>
 




                   

         <!--  -->
           
          
        </div>

        </div>
        <!-- body -->
    </div>
    
</body>
</html>