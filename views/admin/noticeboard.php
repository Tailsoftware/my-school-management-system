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
////////////////////////////

if($_SERVER['REQUEST_METHOD'] == 'POST'){

 
   if(isset($_POST['content']) AND $_FILES['postimg']['size']>0 AND  isset($_POST['campus'])  AND isset($_POST['poster'])  AND isset($_POST['header']) AND isset($_POST['eventtype'])  ){

      if($_POST['content'] !="" AND $_POST['campus'] !="" AND  $_POST['poster']!="" AND  $_POST['header']!=""  AND $_POST['eventtype'] !=""){


      $school = $school;
      $campus = trim( htmlspecialchars(filter_input(INPUT_POST,'campus',FILTER_SANITIZE_SPECIAL_CHARS)));
      $content = trim( htmlspecialchars(filter_input(INPUT_POST,'content',FILTER_SANITIZE_SPECIAL_CHARS)));
      $type = trim( htmlspecialchars(filter_input(INPUT_POST,'eventtype',FILTER_SANITIZE_SPECIAL_CHARS)));
      $header = trim( htmlspecialchars(filter_input(INPUT_POST,'header',FILTER_SANITIZE_SPECIAL_CHARS)));
      $poster = $section;
      $imgname = $_FILES['postimg']['name'];
      $extarray = array('png','jpg');
      $ext =  pathinfo($imgname,PATHINFO_EXTENSION);
      $ext = strtolower($ext);
      $destination = '../upload/'.$imgname;
      $tmpfolder = $_FILES['postimg']['tmp_name'];
      if(in_array($ext,$extarray)){
        if(file_exists($destination)){
            
            $imgname = time().$imgname;
            $destination = '../upload/'.$imgname;
            move_uploaded_file($tmpfolder,$destination);
            $query ="INSERT INTO `newsandevent`(`school`, `campus`, `header`, `content`, `poster`, `postimg`,`type`) VALUES ('$school','$campus','$header','$content','$poster','$imgname','$type')";
          
            $send = $conn->query($query);
      
            echo"<script>alert('$type uploded succesfull')</script>";
      

        }
        else{
           
            $destination = '../upload/'.$imgname;
            move_uploaded_file($tmpfolder,$destination);

            $query ="INSERT INTO `newsandevent`(`school`, `campus`, `header`, `content`, `poster`, `postimg`,`type`) VALUES ('$school','$campus','$header','$content','$poster','$imgname','$type')";
          
            $send = $conn->query($query);
      
            echo"<script>alert('$type uploded succesfull')</script>";
      
        }

      }

      

    

    }
  
   }else{
    
   }


   if(isset($_POST['deletepost'])){

    if($_POST['deletepost'] != ''){
        $id = htmlspecialchars($_POST['deletepost']);
        $query = "DELETE FROM newsandevent WHERE id = $id";
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

        <script defer src="../../library/js/jquery.js"></script>
        <script defer src="../../library/js/bootstrap.min.js"></script>

        <script defer src="../../library/js/main.js"></script>
        <script defer src="../../library/calendar library/calendar.js"></script>


        <title>news and event</title>
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
          
        <div class="row m-0 position-relative  justify-content-center w-100 sh gap-2 " style="overflow-y: scroll; height: 90%;padding: 1cm; background-color: rgba(128, 128, 128, 0.39);">
      
      
            <!-- editnews -->
       
            <div class=" d-none  col-12 col-md-8 bg-light mb-4 p-2" style="height: 400px; border-radius: 10px; ">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <div class="formbox col-12">
                    <label for="">News and Event</label>
                    <input type="radio" class="form-check-input" name="eventtype" value="eventandnews">
                    <label for="">Noticeboard</label>
                    <input type="radio" class="form-check-input" name="eventtype" value="noticeboard">

                </div>
                <div class="formbox col-12">
                <select name="campus" id="" class="form-control" style="">
                <option value="">select campus</option>

                <?php
                
                $query = "SELECT * FROM campus WHERE school = '$school'";
                $send = $conn->query($query);
                $resultnum = mysqli_num_rows($send);

                for($i=0;$i<$resultnum ;$i++){
                $result = mysqli_fetch_assoc($send);
                $campus = $result['campus'];
                ?>
                <option value="<?=$campus?>"><?=$campus?></option>
               <?php
                }


                
                ?>

                </select>
                </div>
                <div class="formbox col-12">
                  
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="postimg">

                </div>

               
                <div class="formbox col-12">
                  
                    <label for="">Header</label>
                    <input type="text" class="form-control" name="header">

                </div>
                <div class="formbox col-12">
                  
                    <input type="hidden" class="form-control" name="poster" value="<?=$section?>">

                </div>
                <div class="formbox col-12">
                  
                    <label for="">Content</label>
                    <textarea name="content" id="" cols="30" rows="10" style="resize: none; height: 100px;" class="form-control"></textarea>

                </div>
                <div class="formbox col-12">
                  <input type="submit" class="form-control mt-4 bg-primary text-light" value="Publish">
                    
                </div>
            </form>
       
            </div>
      

        <!-- editnewse -->
        <!--select post from newsandevent table depending on user b -->



         <?php
         
         if($section =='admin'){

        
         

         
            $query = "SELECT * FROM newsandevent WHERE school = '$school' AND `type` = 'noticeboard'";
            $send = $conn->query($query);
            $resultnum = mysqli_num_rows($send);
            for($i = 0;$i < $resultnum; $i++){
                $result = mysqli_fetch_assoc($send);
                $header = $result['header'];
                $content = $result['content'];
                $poster = $result['poster'];
                $postimg = $result['postimg'];
                $posttime = $result['posttime'];





            ?>
                <!--  -->
                <div class="card col-12 col-md-5" style="height: 70vh;">
                   <button class="btn btn-danger  position-absolute" style="right: 0; top: 0;">X</button>
                   <img src="../upload/<?=$postimg?>" alt="" class="card-img-top" style="max-height: 150px;">
                   <div class="card-header p-2"  style="max-height: 100px; overflow-y: scroll;">
                       <h5 class="card-title text-capitalize"><?=$header?>.</h5>
                       <small class="text-secondary"><?=$poster?></small>
                       <small class="text-secondary"><?=$posttime?></small>
                   </div>
                   <div class="card-body " style="max-height: 250px; overflow-y: scroll;">
                   <?=$content?>
                   </div>
                </div>
                <!--  -->

            <?php

            }

         
         
        


         }
           if($section == 'teacher' OR $section == 'student'  OR $section == 'staff'){
            $query = "SELECT * FROM newsandevent WHERE school = '$school' AND campus = '$campus' AND `type` = 'noticeboard'";
/*             $query = "SELECT * FROM newsandevent WHERE school = '$school' AND campus = '$campus' OR school = '$school' AND campus = 'all'";
 */            $send = $conn->query($query);
              $resultnum = mysqli_num_rows($send);
            for($i = 0;$i < $resultnum; $i++){
                $result = mysqli_fetch_assoc($send);
                $header = $result['header'];
                $content = $result['content'];
                $poster = $result['poster'];
                $postimg = $result['postimg'];
                $posttime = $result['posttime'];
                $school = $result['school'];
                $campus = $result['campus'];
                $id = $result['id'];





            ?>
                <!--  -->
      
                <div class="card col-12 col-md-5" style="height: 70vh;">
                  <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                  <input type="hidden" value ='<?=$id?>' name="deletepost">
                  <button class="btn btn-danger  position-absolute <?=$c?>" style="right: 0; top: 0;">X</button>
                </form> 
                   <img src="../upload/<?=$postimg?>" alt="" class="card-img-top" style="max-height: 150px;">
                   <div class="card-header p-2"  style="max-height: 100px; overflow-y: scroll;">
                       <h5 class="card-title text-capitalize"><?=$header?>.</h5>
                       <small class="text-secondary"><?=$poster?></small>
                       <small class="text-secondary"><?=$posttime?></small>
                   </div>
                   <div class="card-body " style="max-height: 250px; overflow-y: scroll;">
                   <?=$content?>
                   </div>
                </div>
                <!--  -->

            <?php

            }

            
   
         }
        
         
         
         
         
         
         ?>



        <!--select post from newsandevent table depending on user e -->
      



       
           
          
        </div>

        </div>
        <!-- body -->
    </div>
    
</body>
</html>