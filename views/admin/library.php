<?php

use PhpParser\Node\Name;

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




//popper add book//

if(isset($_POST['bookname']) AND isset($_POST['price']) AND isset($_POST['number'])){
  if($_POST['bookname'] !='' AND $_POST['price'] !='' AND $_POST['number'] !=''){
  $name = htmlspecialchars($_POST['bookname']);
  $price = htmlspecialchars($_POST['price']);
  $number = htmlspecialchars($_POST['number']);
  $query = "INSERT INTO library (school,campus,`name`,total,available,price) VALUES ('$school','$campusselect','$name','$number','$number','$price')";
  $send = $conn->query($query);
  }
}
//popper loan book//
if(isset($_POST['idnumber']) AND isset($_POST['name']) AND isset($_POST['number'])){
  if($_POST['idnumber'] !='' AND $_POST['name'] !='' AND $_POST['number'] !=''){
  $id = htmlspecialchars($_POST['idnumber']);
  $query = "SELECT * FROM students WHERE `uniqe` = '$id'";
  $send = $conn->query($query);
  $resultnum = mysqli_num_rows($send);
  if($resultnum>0){
    $name = htmlspecialchars($_POST['name']);
    $number = htmlspecialchars($_POST['number']);

    


    $query = "SELECT * FROM loanedbook WHERE `loanto`='$id' AND book='$name' AND number>0 ORDER BY id DESC LIMIT 1";
    $send = $conn->query($query);
    $resultnum = mysqli_num_rows($send);
    if($resultnum>0){
      $query = "SELECT * FROM loanedbook WHERE school='$school' AND campus ='$campusselect' AND `loanto`='$id' AND book='$name' AND number>0 ORDER BY id DESC LIMIT 1";
      $send = $conn->query($query);
      $result = mysqli_fetch_assoc($send);
      $number = $result['number'];
      echo'<script>alert("has not returned '.$number.'  '.$name.' book collected")</script>';
 
  
    }
    else{
      $query = "INSERT INTO loanedbook (school,campus,`loanto`,loanby,book,`number`) VALUES ('$school','$campusselect','$id','$myuniqe','$name','$number')";
      $send = $conn->query($query);
      $query = "SELECT * FROM library WHERE `name` = '$name' AND school='$school' AND campus ='$campusselect';";
      $send = $conn->query($query);
      $result = mysqli_fetch_assoc($send);
      $total = $result['total'];
      $available = $result['available'];
      $loaned = $result['loaned'];
      $newloaned = $loaned+$number;
      $newavai = $available-$number;
      $query = "UPDATE library SET available ='$newavai',loaned ='$newloaned' WHERE `name` ='$name'";
      $send = $conn->query($query);
    }
  }
  else{
    echo'<script>alert("invalid student ID")</script>';
  }
  }
}


if(isset($_POST['name']) AND isset($_POST['total'])AND isset($_POST['price']) ){

  if($_POST['name'] !='' AND $_POST['total'] !='' AND $_POST['price'] !=''){
    $name = htmlspecialchars($_POST['name']);
    $total1 = htmlspecialchars($_POST['total']);
    $price = htmlspecialchars($_POST['price']);
    $query1 = "SELECT * FROM library WHERE `name` = '$name' AND school='$school' AND campus ='$campusselect';";
    $send1 = $conn->query($query1);
    $result1 = mysqli_fetch_assoc($send1);
    $total = $result1['total'];
    $loaned = $result1['loaned'];
    $available =$total1-$loaned;


    $query2 = "UPDATE library SET total ='$total1',available='$available',price='$price' WHERE `name` ='$name'";
    $send2 = $conn->query($query2);
    $query3 = "SELECT * FROM library WHERE `name` = '$name' AND school='$school' AND campus ='$campusselect';";
    $send3 = $conn->query($query3);
    $result3 = mysqli_fetch_assoc($send3);
    $total = $result3['total'];

    if($total <= 0){
      $query = "DELETE FROM library WHERE `name` ='$name'";
      $send = $conn->query($query);
    }
  }

  else if($_POST['name'] !='' AND $_POST['total'] !='' AND $_POST['price'] ==''){
    $name = htmlspecialchars($_POST['name']);
    $total1 = htmlspecialchars($_POST['total']);
    $query1 = "SELECT * FROM library WHERE `name` = '$name' AND school='$school' AND campus ='$campusselect';";
    $send1 = $conn->query($query1);
    $result1 = mysqli_fetch_assoc($send1);
    $total = $result1['total'];
    $loaned = $result1['loaned'];
    $available =$total1-$loaned;
    $query2 = "UPDATE library SET total ='$total1',available='$available' WHERE `name` ='$name'";
    $send2 = $conn->query($query2);
    $query3 = "SELECT * FROM library WHERE `name` = '$name' AND school='$school' AND campus ='$campusselect';";
    $send3 = $conn->query($query3);
    $result3 = mysqli_fetch_assoc($send3);
    $total = $result3['total'];

    if($total <= 0){
      $query = "DELETE FROM library WHERE `name` ='$name'";
      $send = $conn->query($query);
    }

    }
    
    else if($_POST['name'] !='' AND $_POST['total'] =='' AND $_POST['price'] !=''){

       $name = htmlspecialchars($_POST['name']);
       $price = htmlspecialchars($_POST['price']);
       $query1 = "SELECT * FROM library WHERE `name` = '$name' AND school='$school' AND campus ='$campusselect';";
       $send1 = $conn->query($query1);
       $result1 = mysqli_fetch_assoc($send1);
       $total = $result1['total'];
       $loaned = $result1['loaned'];
       $query2 = "UPDATE library SET price ='$price' WHERE `name` ='$name'";
       $send2 = $conn->query($query2);
       
   
       }
  }



if(isset($_POST['ridnumber']) AND isset($_POST['rname']) AND isset($_POST['rnumber'])){
  if($_POST['ridnumber'] !='' AND $_POST['rname'] !='' AND $_POST['rnumber'] !=''){

  $id = htmlspecialchars($_POST['ridnumber']);
  $query = "SELECT * FROM students WHERE `uniqe` = '$id'";
  $send = $conn->query($query);
  $resultnum = mysqli_num_rows($send);
  if($resultnum>0){


  $name = htmlspecialchars($_POST['rname']);
  $number = htmlspecialchars($_POST['rnumber']);

  $query = "SELECT * FROM loanedbook WHERE `loanto` = '$id' AND book ='$name'";
  $send = $conn->query($query);
  $resultnum = mysqli_num_rows($send);
  if($resultnum>0){
  $result = mysqli_fetch_assoc($send);
  $number2 = $result['number'];
  $rnumber = $number2-$number;
  if($rnumber<0){
    echo'<script>alert("returned more number of books")</script>';

  }
  if($rnumber<$number2 AND $rnumber>0){
    $query = "UPDATE loanedbook SET `number` ='$rnumber',returnto ='$myuniqe'  WHERE `loanto` = '$id' AND book ='$name'";
  $send = $conn->query($query);


  $query = "SELECT * FROM library WHERE `name` = '$name' AND school='$school' AND campus ='$campusselect';";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
  $total = $result['total'];
  $available = $result['available'];
  $loaned = $result['loaned'];
  $newloaned = $loaned-$number;
  $newavai = $available+$number;
  $query = "UPDATE library SET available ='$newavai',loaned ='$newloaned' WHERE `name` ='$name'";
  $send = $conn->query($query);
  }


if($rnumber == 0){

  $query = "DELETE FROM loanedbook WHERE `loanto` = '$id' AND book ='$name'";
  $send = $conn->query($query);


  $query = "SELECT * FROM library WHERE `name` = '$name' AND school='$school' AND campus ='$campusselect';";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
  $total = $result['total'];
  $available = $result['available'];
  $loaned = $result['loaned'];
  $newloaned = $loaned-$number;
  $newavai = $available+$number;
  $query = "UPDATE library SET available ='$newavai',loaned ='$newloaned' WHERE `name` ='$name'";
  $send = $conn->query($query);


}
  }
  else{
    echo'<script>alert("student did not borrow book")</script>';

  }
  }
  else{
    echo'<script>alert("invalid student ID")</script>';
  }
  }
}












}


$_post = file_get_contents('php://input');
if($_post != null){
  $_post = json_decode($_post,true);
  if(isset($_post['book']) AND isset($_post['campusselect']) AND isset($_post['school'])){
    $campusselect = $_post['campusselect']; 
    $school = $_post['school'];
    $book = $_post['book'];
    $query = "SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect'";
    $send = $conn->query($query);
     $resultnum = mysqli_num_rows($send);
    $i = 0;
    while($result = mysqli_fetch_assoc($send)){
        $i++;
        
        $firstname = $result['firstname'];
        $lastname = $result['lastname'];
        $class = $result['class'];
        $uniq = $result['uniqe'];

        $query2 = "SELECT * FROM loanedbook WHERE school = '$school' AND campus ='$campusselect' AND loanto ='$uniq' AND book='$book' AND returnto ='' ORDER BY id DESC LIMIT 1";
        $send2 = $conn->query($query2);
        $resultnum2 = mysqli_num_rows($send2);

        if($resultnum2 > 0){
          $result2 = mysqli_fetch_assoc($send2);
          $loandate = $result2['date'];
          $loanbook = $result2['number'];


          echo('

    <!-- s -->
    <tr class="stt d " style="">
    <input type="hidden" id="'.$uniq.'" value="'.$campusselect.'" class="'.$class.'" >

     <td >'.$i.'</td>
     <td><span class="student text-primary text-decoration-underline" onclick="a('.$uniq.')" style="cursor: pointer;">'.$uniq.'</span></td>
     <td class="dc">'.$firstname.'</td>
     <td class="dc" >'.$lastname.'</td>
     <td class="dc" >'.$book.'</td>
     <td class="dc" >'.$loandate.'</td>
     <td class="dc" >'.$loanbook.'</td>
    
    

 </tr>
    
    ');


        }


  
    
        

    }    exit();
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
        <div class="body flex-grow-1 bg-light  align-items-center d-flex " style="height: 100%;">




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



     




     <!-- popperbookadd-->
<div class=" d-none popperbookadd  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 60%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-12">
          <div class="formbox">
            <label for="" class="col-12">Book Name</label>
            <input type="text" class="form-control" name="bookname">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Price For Each</label>
            <input type="number" class="form-control img-" name="price">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Total Number of Books</label>
            <input type="number" class="form-control" name="number" min='0' >

          </div>
          <div class="formbox mt-3">
            <input type="submit" class="form-control bg-primary text-light" value="Update">

          </div>
        </form>
    
        
          

   
    </div>
    </div>
    </div>
     <!-- popper book add e-->
     <!-- popperbookreturn-->
<div class=" d-none popperbookreturn  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 60%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-12">
          
          
          
          <div class="formbox">
            <label for="" class="col-12">Book Name</label>
            <select name="rname" id="" class="form-control">
            <?php
            $query ="SELECT * FROM library WHERE school = '$school' AND campus = '$campusselect'";
            $send = $conn->query($query);
            while($result=mysqli_fetch_assoc($send)){
              $name = $result['name'];
              ?>
                          <option value="<?=$name?>"><?=$name?></option>

              <?php
            }
            
            ?>
            </select>

          </div>
        
          <div class="formbox">
            <label for="" class="col-12">Book Number</label>
            <input type="number" class="form-control" name="rnumber" min='0'>

          </div>
          <div class="formbox">
            <label for="" class="col-12">Student ID</label>
            <input type="text" class="form-control" name="ridnumber">

          </div>
          <div class="formbox mt-3">
            <input type="submit" class="form-control bg-primary text-light" value="Update">

          </div>
        </form>
        
          

   
    </div>
    </div>
    </div>
     <!-- popper book return e-->


     <!-- popperbookmodify-->
<div class=" d-none popperbookmodify  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 60%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-12">
          
          
          
          <div class="formbox">
            <label for="" class="col-12">Book Name</label>
            <select name="name" id="" class="form-control">
            <?php
            $query ="SELECT * FROM library WHERE school = '$school' AND campus = '$campusselect'";
            $send = $conn->query($query);
            while($result=mysqli_fetch_assoc($send)){
              $name = $result['name'];
              ?>
                          <option value="<?=$name?>"><?=$name?></option>

              <?php
            }
            
            ?>
            </select>

          </div>
        
          <div class="formbox">
            <label for="" class="col-12">Book Number</label>
            <input type="number" class="form-control" name="total" min='0'>

          </div>
          <div class="formbox">
            <label for="" class="col-12">Book Price</label>
            <input type="text" class="form-control" name="price">

          </div>
          <div class="formbox mt-3">
            <input type="submit" class="form-control bg-primary text-light" value="Update">

          </div>
        </form>
        
          

   
    </div>
    </div>
    </div>
     <!-- popper book modify e-->


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
             <td>Book</td>
             <td>Date</td>
             <td>Book Number</td>

         </tr>
         <!-- e -->

  
  
       
     </table>
    </div>

   
    </div>
    </div>
    </div>
     <!-- popperclassliste -->





     <!-- popperloanbook-->
<div class=" d-none popperbookloan  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 60%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-12">
          
          
          <div class="formbox">
            <label for="" class="col-12">Student ID</label>
            <input type="text" class="form-control" name="idnumber">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Book Name</label>
            <select name="name" id="" class="form-control">
            <?php
            $query ="SELECT * FROM library WHERE school = '$school' AND campus = '$campusselect'";
            $send = $conn->query($query);
            while($result=mysqli_fetch_assoc($send)){
              $name = $result['name'];
              ?>
                          <option value="<?=$name?>"><?=$name?></option>

              <?php
            }
            
            ?>
            </select>

          </div>
          <div class="formbox">
            <label for="" class="col-12">Book Number</label>
            <input type="number" class="form-control" name="number">

          </div>
          <div class="formbox mt-3">
            <input type="submit" class="form-control bg-primary text-light" value="Update">

          </div>
        </form>
 
        
          

   
    </div>
    </div>
    </div>
     <!-- popper loanbook e-->

    


            <div class="col-11 col-md-8 h-75  m-auto position-relative box2" style="padding: 10px;max-width: 100vw;">
               <a href="" class="btn btn-dark bookadd text-capitalize <?=$addnewbook?> mb-3"> Add new Book</a>
               <a href="" class="btn btn-dark bookloan text-capitalize mb-3 <?=$lbook?>"> Loan Book</a>
               <a href="" class="btn btn-dark bookreturn text-capitalize mb-3 <?=$rbook?>"> Return Book</a>
               <a href="" class="btn btn-dark popperbook text-capitalize mb-3 <?=$modifybook?>">Modify Book</a>

               <form action="" class="col-12 d-none">
        <div class="input-group mt-2 form-control w-100">
                   <input type="text" class="form-control search" placeholder="search name" id="sea">
                    <button class="btn btn-dark"><i class="fa fa-search"></i></button>
                </div>
         </form>




               <div class="table-responsive h-100 overflow-scroll mt-5" >

               <table class=" tablem d-flex flex-column" style="text-transform: capitalize;" id="classtable" >
                <!-- s -->
                <tr class="table-active" style="font-weight: 600;">
                        <td>#</td>
                        <td>Book name</td>
                        <td>Total</td>
                        <td>Available</td>
                        <td>Loaned</td>
                        <td>Price</td>

                    </tr>
                    <!-- e -->

                    <?php
                    $query ="SELECT * FROM library WHERE school = '$school' AND campus ='$campusselect'";
                    $send = $conn->query($query);
                    $j=0;
                    while($result= mysqli_fetch_assoc($send)){
                      $j++;
                      $bookname = $result['name'];
                      $total = $result['total'];
                      $available = $result['available'];
                      $loaned = $result['loaned'];
                      $price = $result['price'];

                      ?>

                        <!-- s -->
                        <tr class="d" style="">
                        <td><?=$j?></td>
                        <td class="dc" style="min-width: 3cm;"><?=$bookname?></td>
                        <td><?=$total?></td>
                        <td><?=$available?></td>
                        <td class="studentclasslist3" style="text-decoration: underline; color:blue;cursor:pointer"><?=$loaned?><input type="hidden" class="book" value="<?=$bookname?>"> <input type="hidden" class="campusselect" value="<?=$campusselect?>"> <input type="hidden" class="school" value="<?=$school?>"> </td>
                        <td><?=$price?></td>
                        

                    </tr>
                    <!-- e -->

                      <?php

                    }
                    
                    
                    ?>
                    
                 
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
        xml.open('POST','library.php');
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