<?php

include('../../views/session.php');
include('../../views/config.php');
if(empty($_SESSION['section'])){
    header("location:../../views/admin/login.php");
}
else{
    if(isset($_POST['campusselect'])){
        if($_POST['campusselect'] !=''){
            $_SESSION['campusselect']  = htmlspecialchars($_POST['campusselect']);
        }
    } 
   
   $campusselect = $_SESSION['campusselect'];
  $uniqe = $_SESSION['uniqe'];
  $section = $_SESSION['section'];
  
if($section == 'admin'){
  $admin = '';
  $teacher = 'd-none';
  $student = 'd-none';
  $uniqe = $_SESSION['uniqe'];
  $query = "SELECT * FROM `admin` WHERE email = '$uniqe'";
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
  $resultnum = mysqli_num_rows($send);
  if($resultnum>0){
  $firstname = $result['firstname'];
  $lastname = $result['lastname'];
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
    $firstname = $result['firstname'];
    $lastname = $result['lastname'];
    $uniqe= $result['uniqe'];
    $school= $result['school'];
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
  $dob= $result['dbirth'];
  $position= $result['position'];
  $profileimg = $result['profileimg'];

  }

}



}



if(isset($_POST['feename']) AND isset($_POST['uniqe'])){
  if($_POST['feename'] !='' AND $_POST['uniqe'] !=''){

  
  $stuniqe = $_POST['uniqe'];
  $query ="SELECT * FROM students WHERE uniqe ='$stuniqe'"; 
  $send = $conn->query($query);
  $result = mysqli_fetch_assoc($send);
  $sfirstname = $result['firstname'];
  $slastname = $result['lastname'];
  $semail = $result['email'];
  $class = $result['class'];
  $sphonenumber = $result['phonenumber'];





    $feename = $_POST['feename'];

    $query ="SELECT * FROM fees WHERE school ='$school'AND campus ='$campusselect' AND class ='$class' AND feename = '$feename'"; 
    $send = $conn->query($query);
    $resultnum =mysqli_num_rows($send);
    if($resultnum>0){
        $result = mysqli_fetch_assoc($send);
       $amount = $result['amount'];
       $feename = $result['feename'];
    };
  }
  else{
    header("location:../../views/admin/payment.php");
  }
}
else{
  header("location:../../views/admin/payment.php");
}



$reff = 'TXREF'.uniqid();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Payment for <?=$feename?></title>
    <style>
        #btn-of-destiny {
            margin-top: 2em;
        }

        #explain1 {
            padding: 20px;
            margin: 2em auto auto;
        }

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<form action="" id="hide">
  <input type="hidden" class="amount" name="amount" value="<?=$amount?>">
  <input type="hidden" class="number" name="number" value="<?=$reff?>">
  <input type="hidden" class="feename" name="feename" value="<?=$feename?>">
  <input type="hidden" class="uniqe" name="uniqe" value="<?=$stuniqe?>">
  <input type="hidden" class="firstname" name="firstname" value="<?=$sfirstname?>">
  <input type="hidden" class="lastname" name="lastname" value="<?=$slastname?>">
  <input type="hidden" class="phonenumber" name="phonenumber" value="<?=$sphonenumber?>">
  <input type="hidden" class="email" name="email" value="<?=$semail?>">
</form>

<form method="POST" action="processPayment.php" id="paymentForm">
    <input type="hidden"  name="amount" value="<?=$amount?>"/> 
    <!-- Replace the value with your transaction amount -->
    <input type="hidden"  name="description" value="<?=$stuniqe .'paid for'. $feename?>"/>
    <!-- Replace the value with your transaction description -->
    <input type="hidden" name="currency" value="NGN"/> 
    <!-- Replace the value with your transaction currency -->
    <input type="hidden" name="payment_method" value="card"/> 
    <input type="hidden" name="email" value="<?=$semail?>"/> 
    <!-- Replace the value with your customer email -->
    <input type="hidden" name="first_name" value="<?=$sfirstname?>"/>
    <!-- Replace the value with your customer firstname (optional) -->
    <input type="hidden" name="last_name" value="<?=$slastname?>"/>
    <!-- Replace the value with your customer lastname (optional) -->
    <input type="hidden" name="phone_number" value="<?=$sphonenumber?>"/>
    <!-- Replace the value with your customer phonenumber (optional if email is passes) -->
    <input type="hidden" name="pay_button_text" value="Complete Payment"/>
    <!-- Replace the value with the payment button text you prefer (optional) -->
     <input type="hidden" name="tx_ref" value="<?=$reff?>">
    <!-- Replace the value with your transaction reference. It must be unique per transaction. You can delete this line if you want one to be generated for you. -->
    <input type="hidden" name="success_url" value="http://localhost/project/myschool/management/views/admin/invoice.php?status=success">
    <!-- Put your success url here -->
    <input type="hidden" name="failure_url" value="http://localhost/project/myschool/management/views/admin/payment.php?status=faild">
    <!-- Put your failure url here -->

    

  <center class="text-capitalize mt-3"><h2>invoice for payment of <?=$feename?></h2></center>
  <center><small>please copy and save your Transaction Reference Number</small></center>
  <center> <div class="table-responsive col-12 col-md-6">
  <table class="table table-striped m-auto invt">
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
      <td><?=$stuniqe?></td>
    </tr>
    <tr>
      <th>Student firstname</th>
      <td><?=$sfirstname?></td>
    </tr>
    <tr>
      <th>Student lastname</th>
      <td><?=$slastname?></td>
    </tr>
    <tr>
      <th>Student Phonenumber</th>
      <td><?=$sphonenumber?></td>
    </tr>
    <tr>
      <th>Student Email</th>
      <td><?=$semail?></td>
    </tr>

 </table>


  </div>
  </center>
 



    <center><input id="btn-of-destiny" class="btn btn-warning paynow" type="submit" value="Pay Now"/></center>
</form>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <script>
        let invtable =  document.querySelector('.invt');
        
        let data =  document.querySelector('#hide');
        let paybuth =  document.querySelector('.paynow');
        paybuth.addEventListener('click',()=>{
          let xml = new XMLHttpRequest;
          xml.open('POST','../../views/admin/invoice.php');
          xml.onreadystatechange = ()=>{
            if(xml.readyState == 4 && xml.status==200){
              console.log(xml.responseText);
            }
          }
          xml.send(new FormData(data));
        })
        </script>
</body>
</html>
