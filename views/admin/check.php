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



$query ="SELECT * FROM session WHERE school = '$school' ORDER BY id DESC LIMIT 1";
$send = $conn->query($query);
$result = mysqli_fetch_assoc($send);
$sessionstart = $result['sessionstart'];
$_SESSION['sessionstart'] = $sessionstart;
$sessionend = $result['sessionend'];
$_SESSION['sessionend'] = $sessionend;
$term = $result['term'];
$_SESSION['term'] = $term;


if(isset($_POST['class']) AND isset($_POST['number']) AND isset($_POST['section']) AND isset($_POST['campus'])  ){

    if($_POST['class'] !='' AND $_POST['number'] !='' AND $_POST['section'] !='' AND $_POST['campus'] !='' ){
      $school = $school;
      $campus = $_POST['campus'];
      $class = $_POST['class'];
      $number = $_POST['number'];
      $section = $_POST['section'];
      $mclass = $class.$number.$section;
      $query = "SELECT * FROM class WHERE mclass = '$mclass' AND school = '$school' AND campus ='$campus'";
      $send = $conn->query($query);
      $resultnum = mysqli_num_rows($send);
      if($resultnum > 0){
        echo "<script>alert('class already exist')</script>";
      }
      else{

        $query ="INSERT INTO class (school,campus,class,`number`,section,mclass) VALUES('$school','$campus','$class','$number','$section','$mclass')";
        $send = mysqli_query($conn,$query);
  
      }

      
    }
}


if(isset($_POST['subject']) AND isset($_POST['cl'])AND isset($_POST['hclass']) AND isset($_POST['campus']) ){
    if($_POST['subject'] !='' AND $_POST['cl'] !='' AND $_POST['hclass'] !='' AND $_POST['campus'] !=''){
        $school = $school;
        $subject = htmlspecialchars($_POST['subject']);
        $creditload = htmlspecialchars($_POST['cl']);
        $campus = htmlspecialchars($_POST['campus']);

        $class = htmlspecialchars($_POST['hclass']);
        $query ="INSERT INTO `subject` VALUES('','$subject','$creditload','$school','$class','$campus')";
        $send = $conn->query($query);
       
    }
}

//echo $_POST['inpue'];
if(isset($_POST['input'])){
    if($_POST['input'] != ''){
       echo $subject = $_POST['inpue'];
    }

    exit;
}
 



if(isset($_POST['selectteacher']) AND isset($_POST['iclass']) AND isset($_FILES['timetable']) AND isset($_FILES['scheme']) AND isset($_FILES['assignment'])){
   if($_POST['selectteacher'] !='' AND $_POST['iclass'] !='' AND $_FILES['timetable']['size'] >0 AND $_FILES['scheme']['size'] >0 AND $_FILES['assignment']['size'] >0){
    $_POST['selectteacher']; 
    $_POST['iclass']; 
    $_FILES['timetable']['name']; 
    $_FILES['scheme']['name']; 
    $_FILES['assignment']['name'];
   
   
   
    $teacher = $_POST['selectteacher'];
    $class = $_POST['iclass'];
    $arrayext = array('png','jpg','jpeg');
    $timetableimgname = $_FILES['timetable']['name'];
    $timetabletmpfolder = $_FILES['timetable']['tmp_name'];
   $timetableimgname = time().$timetableimgname;
    $destination = '../upload/'.$timetableimgname;
    $ext = pathinfo($timetableimgname,PATHINFO_EXTENSION);
    if(in_array($ext,$arrayext)){
    move_uploaded_file($timetabletmpfolder,$destination);
    }
    $schemeimgname = $_FILES['scheme']['name'];
    $schemetmpfolder = $_FILES['scheme']['tmp_name'];
    $schemeimgname = time().$schemeimgname;
    $destination = '../upload/'.$schemeimgname;
    $ext = pathinfo($schemeimgname,PATHINFO_EXTENSION);
    if(in_array($ext,$arrayext)){
    move_uploaded_file($schemetmpfolder,$destination);
    }
   $assignmentimgname = $_FILES['assignment']['name'];
    $assignmenttmpfolder = $_FILES['assignment']['tmp_name'];
    $assignmentimgname = time().$assignmentimgname;
    $destination = '../upload/'.$assignmentimgname;
    $ext = pathinfo($assignmentimgname,PATHINFO_EXTENSION);
    if(in_array($ext,$arrayext)){
    move_uploaded_file($assignmenttmpfolder,$destination);
    }

 $query ="UPDATE class SET teacher ='$teacher',timetable ='$timetableimgname',scheme ='$schemeimgname',assignment ='$assignmentimgname' WHERE mclass = '$class'";
 $send = $conn->query($query);



 }
 ///////
else if($_POST['selectteacher'] !='' AND $_POST['iclass'] !='' AND $_FILES['timetable']['size'] ==0 AND $_FILES['scheme']['size'] ==0 AND $_FILES['assignment']['size'] ==0){
    $teacher = $_POST['selectteacher'];
    $class = $_POST['iclass'];
  

 $query ="UPDATE class SET teacher ='$teacher' WHERE mclass = '$class'";
 $send = $conn->query($query);



 }

/////
///////



 



else if($_POST['selectteacher'] =='' AND $_POST['iclass'] !='' AND $_FILES['timetable']['size'] >0 AND $_FILES['scheme']['size'] ==0 AND $_FILES['assignment']['size'] ==0){
    
    
    
    $class = $_POST['iclass'];

    $arrayext = array('png','jpg','jpeg');
    $timetableimgname = $_FILES['timetable']['name'];
    $timetabletmpfolder = $_FILES['timetable']['tmp_name'];
   $timetableimgname = time().$timetableimgname;
    $destination = '../upload/'.$timetableimgname;
    $ext = pathinfo($timetableimgname,PATHINFO_EXTENSION);
    if(in_array($ext,$arrayext)){
    move_uploaded_file($timetabletmpfolder,$destination);
    }
  

 $query ="UPDATE class SET timetable ='$timetableimgname' WHERE mclass = '$class'";
 $send = $conn->query($query);



 }

/////

///////
else if($_POST['selectteacher'] =='' AND $_POST['iclass'] !='' AND $_FILES['timetable']['size'] ==0 AND $_FILES['scheme']['size'] >0 AND $_FILES['assignment']['size'] ==0){
    
    $class = $_POST['iclass'];

    $arrayext = array('png','jpg','jpeg');
    $schemeimgname = $_FILES['scheme']['name'];
    $schemetmpfolder = $_FILES['scheme']['tmp_name'];
    $schemeimgname = time().$schemeimgname;
    $destination = '../upload/'.$schemeimgname;
    $ext = pathinfo($schemeimgname,PATHINFO_EXTENSION);
    if(in_array($ext,$arrayext)){
    move_uploaded_file($schemetmpfolder,$destination);
    }
  

 $query ="UPDATE class SET scheme ='$schemeimgname' WHERE mclass = '$class'";
 $send = $conn->query($query);



 }

/////

///////
else if($_POST['selectteacher'] =='' AND $_POST['iclass'] !='' AND $_FILES['timetable']['size'] ==0 AND $_FILES['scheme']['size'] ==0 AND $_FILES['assignment']['size'] >0){
   
    $class = $_POST['iclass'];

    $arrayext = array('png','jpg','jpeg');
    $assignmentimgname = $_FILES['assignment']['name'];
    $assignmenttmpfolder = $_FILES['assignment']['tmp_name'];
    $assignmentimgname = time().$assignmentimgname;
    $destination = '../upload/'.$assignmentimgname;
    $ext = pathinfo($assignmentimgname,PATHINFO_EXTENSION);
    if(in_array($ext,$arrayext)){
    move_uploaded_file($assignmenttmpfolder,$destination);
    }
  

 $query ="UPDATE class SET assignment ='$assignmentimgname' WHERE mclass = '$class'";
 $send = $conn->query($query);



 }

/////

}






if(isset($_POST['idsubject'])){
 
 $id = $_POST['idsubject'];
    $query = "DELETE FROM `subject` WHERE `id` ='$id'";
   $send = $conn->query($query);
};





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
    $stid = $result['uniqe'];
    $class = $result['class'];
    $class = strtoupper($class);
    $query = "SELECT * FROM examp WHERE school = '$school' AND campus ='$campusselect' AND uniqe ='$uniqe'AND date > '$sessionstart' AND date < '$sessionend' ";
    $send = $conn->query($query);
   $number = mysqli_num_rows($send);
    $pdfhtml='';
   
     echo('
     

     <!--  -->
     <div class="d-flex justify-content-center">
        <div class="imgbox" style=" width: 150px; height:150px ; border-radius: 50%;">
         <img src="../upload/1698500615e2.jpg" alt="" style="width: 100%; height: 100%; display: block; border-radius: 50%;">
        </div>
     </div>
     <div class="" style="text-align: center;">
     <h3>SECONDARY EDUCATION MANAGEMENT BOARD</h3>
     <h3>CONTINIOUS ASSESMENT REPORT BOOK/DOSSIER</h3>
     <h5>FOR</h5>
     <h5>SENIOUR SECONDARY SCHOOLS</h5>
     
     </div>
     <div class="">
         <!--  -->
         <div class="mt-3 d-flex align-items-center">
             <span>NAME</span>: &nbsp; <span class="flex-grow" style=""><big>'.$firstname.' '.$lastname.'</big> </span>
         </div>
         <div class="mt-3 d-flex align-items-center ">
             <span>SCHOOL</span>: &nbsp;<span class="flex-grow" style=""><big>'.$school.'</big> </span>
         </div>
         <div class="mt-3 d-flex align-items-center">
             <span>CLASS</span>: &nbsp;<span class="flex-grow" style=""><big>'.$class.'</big> </span>
         </div>
       
         <!--  -->
        
     </div>
     
     <h4 class="text-center mt-4">FIRST ANUAL REPORT</h4>
     
     <table style="" class="table table-striped" >
     <thead>

     <tr>
     <th class="colspan" style="width: 200px;">
     <div class="block">
         <h5>PART-A </h5>
         <h5>COGNITIVE</h5>
     </div>
     
     </th>
     <th><span class="">1st test</span></th>
     <th><span class="">2st test</span></th>
     <th><span class="">Exam</span></th>
     <th><span class="">total score</span></th>
     <th><span class="">weighted average</span></th>
     <th><span class="">Remark</span></th>
 </tr>
</thead>
<tbody>
     
     ');
 $i =0;
 $paverage =0;

    while($result = mysqli_fetch_assoc($send)){
        $subject = $result['subject'];
        $test1 = $result['test1'];
        $test2 = $result['test2'];
        $exam = $result['totalscore'];
        $total = $result['total'];
        $paverage += $total;
        $weighedaverage = $test1+$test2+$exam/3;
        $weighedaverage = round($weighedaverage,2);
        if($total >=70){
            $remark = 'Excellent';
        }
        else if($total>=50 && $total<=69){
             $remark ='credit';
        }
        else if($total>=40 && $total<=49){
             $remark ='pass';
        }
        else if($total>=0 && $total<=39){
             $remark ='fail';
        };
        $i++;
      echo('

         <!--  -->
         <tr>
             <td class="colspan" style="width: 100px;">
               <table>
                 <tr>
                     <th>'.$i.'</th>
                     <th>'.$subject.'</th>
                 </tr>
               </table>
             </td>
             <td>'.$test1.'</td>
             <td>'.$test2.'</td>
             <td>'.$exam.'</td>
             <td>'.$total.'</td>
             <td>'.$weighedaverage.'%</td>
             <td>'.$remark.'</td>
          
            
         </tr>
         <!--  -->
        ');
    }
     $jclass ='premark';
     $b='remm';
     $paverage;
       $paverage =$paverage*$number/100;
    echo('

    </tbody>
    
    </table>

    <h5>Total Average: &nbsp; <big>'.$paverage.'%</big></h5> 
    <h2 style="text-align: center;">performance</h2>

    <!-- <div class="mbox">
        <div class="containerb">
            <div class="bar" style="height: 60%; background-color: blueviolet;">
            <span class="titles">Art</span>
            </div>
            <div class="bar" style="height: 50%; background-color: rgb(170, 105, 231);">
            <span class="titles">Science</span>

            </div>
          
        
       </div>
    </div>-->

    <div class="mbox2">

        <div class="containerb2">
          ');
          $query = "SELECT * FROM examp WHERE school = '$school' AND campus ='$campusselect' AND uniqe ='$uniqe'  AND date > '$sessionstart' AND date < '$sessionend'";
          $send = $conn->query($query);
          $bcolor = array(
            'red',
            'orange',
            'yellow',
            'green',
            'blue',
          );
            $i = 0;
          while($result = mysqli_fetch_assoc($send)){
            $i++;
            if($i == 5){
                $i = 0;
            }
            $subject = $result['subject'];
            $subject = substr($subject,0,7);
            $subject = $subject.'...';
            $test1 = $result['test1'];
            $test2 = $result['test2'];
            $exam = $result['totalscore'];
            $total = $result['total'];
            $paverage += $total;
            $weighedaverage = $test1+$test2+$exam/3;
            $weighedaverage = round($weighedaverage,2);

          echo('
            <div class="bar2" style="width:'.$weighedaverage.'%; background-color:'.$bcolor[$i].';">
            <span class="titles2">'.$subject.'</span>
            </div>
            ');
          };
            

          


            echo('

            </div>
        
       </div>
    </div>
        ');

        echo('
       <div class="mt-4 position-relative" style="min-height:350px">
        <h5 class="d-flex align-items-center">Principal Remark: &nbsp; <form id="updatem"> <textarea name="remark" id="premark" cols="30" rows="10" style="width:50%;height:50px;resize:none;" class="p-3">
        ');
        $query ="SELECT * FROM remark WHERE school='$school' AND campus='$campusselect' AND  student='$teacherid'";
        $send = $conn->query($query);
       $resultnum = mysqli_num_rows($send);
        if($resultnum > 0){
            $dis='d-none';
            $result = mysqli_fetch_assoc($send);
            $remark = $result['remarkk'];
         echo $remark;
        }
        else{
            $dis='';

        }
        echo('
        </textarea>

        <input name="student" type="hidden" value="'.$teacherid.'" > &nbsp; <button name="student"   class="btn btn-dark '.$dis.'" id="remm" onclick="remarki('.$jclass.','.$b.')">&nbsp;<i class="fa fa-save"></i>
        &nbsp;</button></form> </h5> 
        <h5>Date: &nbsp; <small style="border-bottom: 1px solid black;min-width: 70%;">20th december 2024</small></h5> 
      
        <div class="position-absolute bg-warning " style="width:200px;height:150px;bottom:0;right:0;border-radius:60%">
        <img src="../upload/1698500615e2.jpg" alt="" style="width: 100%; height: 100%; display: block; border-radius: 60%;">

        </div>
        </div>
    
       
    
    </div>
   <!--  -->

       
       ');
      
    }

    
    else if(isset($teachername['campusselect']) AND isset($teachername['classs'])){

        $campusselect = $teachername['campusselect']; 
        $class = $teachername['classs'];
        $date = date('Y-m-d');
        $query = "SELECT * FROM students WHERE school = '$school' AND campus ='$campusselect' AND class ='$class' AND lastattendance NOT LIKE '$date%'";
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
      
        echo('
    
        <!-- s -->
        <tr class="stt d " style="">
        <input type="hidden" id="'.$uniqe.'" value="'.$campusselect.'" class="'.$class.'" >
    
         <td >'.$i.'</td>
         <td><span class="student text-primary text-decoration-underline" onclick="pop('.$uniqe.')" style="cursor: pointer;">'.$uniqe.'</span></td>
         <td class="dc">'.$firstname.'</td>
         <td class="dc" >'.$lastname.'</td>
        
        
    
     </tr>
        
        ');
            
    
        }
    
        exit();
        }

    exit();
    }
    if(isset($teachername['studentcampus2']) AND isset($teachername['uniqe2'])){

        $campusselect = $teachername['studentcampus2']; 
        $teacherid = $teachername['uniqe2'];
       $query = "UPDATE students SET domitory ='no' WHERE school = '$school' AND campus ='$campusselect' AND uniqe ='$teacherid'";
       $send = $conn->query($query);
    } 
}
    


  if(isset($_POST['remark']) AND isset($_POST['student'])){
    $remark = htmlspecialchars($_POST['remark']);
    $student = trim(htmlspecialchars($_POST['student']));
    $query = "INSERT INTO remark(school,campus,student,remarkk) VALUES ('$school','$campusselect','$student','$remark')";
    $send = $conn->query($query);
    echo'done';
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
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="../../library/fontawesome/css/font-awesome.min.css">
       
        <script defer src="../../library/js/bootstrap.min.js"></script>

        <script defer src="jquery.js"></script>

        <script defer src="jquery.canvasjs.min.js"></script>
        <script defer src="../../library/js/main.js"></script>

        <title>domitory</title>
        <style>
 .mbox{
            width:500px;
            height:300px;
            margin: auto;

        }
        .mbox2{
            width:500px;
            height:300px;
            margin: auto;
            margin-top: 3cm;

        }
       .containerb{
            width:400px;
            height:300px;
            border-left: 2px solid gray;
            border-bottom: 2px solid gray;
            display: flex;
            align-items: flex-end;
            gap: .5cm;
            padding: 10px;
            justify-content: space-around;
        }
       .containerb2{
            width:400px;
            height:300px;
            border-left: 2px solid gray;
            border-bottom: 2px solid gray;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: .5cm;
            padding: 10px;
        }
        .bar{
            width: 2cm;
            position: relative;
        }
        .bar2{
            height: 1cm;
            position: relative;
        }
        .titles{
            position: absolute;
            bottom: -40px;
        }
        .titles2{
            position: absolute;
            left: -100px;
        }
        </style>
    </head>
<body>





    <div class="container-fluid full-vh  d-flex p-0" style="background-color: rgb(8, 8, 88);">
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
  
<!-- popperclasslist -->
<div class="  d-none popperclasslist popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-7 bg-light position-relative" style="border-radius: 10px;height: 80%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>

    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 100%; padding-bottom: 1cm ;">
   
              
        <form action="" class="col-12 d-none">
        <div class="input-group mt-2 form-control w-100">
                   <input type="text" class="form-control search" placeholder="search name" id="sea">
                    <button class="btn btn-dark"><i class="fa fa-search"></i></button>
                </div>
         </form>

         <div class="h-100 w-100" style="overflow: scroll;">

          
<table class="tablem table-striped thestudentlistch  m-auto " style="text-transform: capitalize;"  >

     <!-- s -->
     <tr class="table-active" style="font-weight: 600;">
             <td>#</td>
             <td>Reg no</td>
             <td>Firstname</td>
             <td>Lastname</td>

         </tr>
         <!-- e -->

  
  
       
     </table>
    </div>

   
    </div>
    </div>
    </div>
     <!-- popperclassliste -->
<!-- popperEditclasslist -->
<div class=" d-none poppereditclass popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-4 bg-light position-relative" style="border-radius: 10px;height: 70%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center " style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
   
            <form action="<?=$_SERVER['PHP_SELF']?>" class="col-12 d-flex justify-content-center flex-column a" id="editclassform" method="POST" enctype="multipart/form-data">
                <div class="formbox">
                    <label for="selectteacher " class="col-12 text-capitalize">Assign teacher</label>
                    <select name="selectteacher" id="" class="form-control" style="">
                        <option value=""></option>
                        <?php
                        $query = "SELECT * FROM teachers WHERE school = '$school' AND campus ='$campusselect'";
                        $send = $conn->query($query);
                        while($result = mysqli_fetch_assoc($send)){
                            $firstname = $result['firstname'];
                            $lastname = $result['lastname'];
                            $uniqe = $result['uniqe'];
                            $name = $firstname.' '.$lastname;
                        ?>
                            <option value="<?=$uniqe?>"><?=$name?></option>

                        <?php


                        }
                        
                        
                        
                        ?>
                       
                    </select>
                </div>
                <input type="hidden" class="iclass" name="iclass">

                

                


                <div class="formbox mt-3">
                    <label for="" class="col-12 text-capitalize">Update timetable</label>
                    <input type="file" class="form-control" style="" name="timetable">

                </div>
                <div class="formbox mt-3">
                    <label for="" class="col-12 text-capitalize">Update scheme of work</label>
                    <input type="file" class="form-control" style="" name="scheme">

                </div>
                <div class="formbox mt-3">
                    <label for="" class="col-12 text-capitalize">Update asssignment</label>
                    <input type="file" class="form-control" style="" name="assignment">

                </div>
                <div class="formbox mt-3">
                    <input type="submit" class="form-control bg-primary text-light" style="" value="update">

                </div>
             

            </form>

        
    </div>
    </div>
    </div>
     <!-- popperEditclassliste -->


     <!-- popperteacher -->
<div class=" d-none popperteachersdetails popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 90%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center  appentteachersresponse" style="height: 90%; overflow-y: scroll; padding-bottom: 1cm ;">
   
    

    </div>
    </div>
    </div>
     <!-- popperteachere -->

     <!-- popperstudent -->
    <div class=" col-12  d-none popperstudent popperdetails position-fixed d-flex justify-content-center align-items-center " style="width:100vw ;height:100vh;z-index: 10; top: 0; left: 0; ">
    <div class="col-12 col-md-9 bg-light position-relative " style="border-radius: 10px;;overflow:scroll;height:80%;">
    <button class="btn btn-danger float-end close">X</button>
   <form action="mpdf.php" method="POST" id="rem"><button name="mpdf" value="" id="dpdf" class="btn btn-dark float-end dbuth" ><i class="fa fa-download "></i></button></form>
  <div class="table-responsive col-8 m-auto">
    <div class=" table p-3    appendstudentdetails"  id="">
    

    </div>
    </div>
    </div>
    </div>
     <!-- popperstudente -->


     <!-- popperpicture -->
    <div class=" d-none  popperpicture d-flex align-items-center justify-content-center " style="position: fixed; top: 0; height: 100%; width: 100%; z-index: 10;right: 0;background-color: rgba(0, 0, 0, 0.808);" ">
       <button class="btn btn-danger position-absolute close2" style="top: 10px; right: 10px; ">X</button>
      <img src="../../res/images/paxlogo.jpg" alt="">
    </div>


     <!-- popperpicture -->


<!--  -->
<div class="col-12 col-md-8 h-75 box1 m-auto position-relative">
<div class=" d-flex gap-3 m-3">
       <a href="exampro.php" class="btn btn-dark text-capitalize text-light" style="width: 1.5cm;">Fill</a>

       <a href="result.php" class="btn btn-dark text-capitalize text-light" style="width: 1.5cm;">View</a>

       <a href="check.php" class="btn btn-primary text-capitalize text-light" style="">Check</a>
       </div>
<!-- -->
           
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="d-none" style="width: 100%;">
                <div class="input-group" style=" display:flex;background-color:aqua; flex-flow:row wrap;">
                    
                    <input type="text" class="form-control" placeholder="jss" name="class">


                    <input type="number" class="form-control" min="1" max="3" placeholder="1" name="number">


                    <select name="section" id="" class="form-control" >
                        <option value="">section</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                        <option value="e">E</option>
                        <option value="f">F</option>
                        <option value="g">G</option>
                        <option value="h">H</option>
                        <option value="i">I</option>
                        <option value="j">J</option>
                        <option value="k">K</option>
                        <option value="l">L</option>
                        <option value="m">M</option>
                        <option value="n">N</option>
                        <option value="o">O</option>
                        <option value="p">P</option>
                        <option value="q">Q</option>
                        <option value="r">R</option>
                        <option value="s">S</option>
                        <option value="t">T</option>
                        <option value="u">U</option>
                        <option value="v">V</option>
                        <option value="w">W</option>
                        <option value="x">X</option>
                        <option value="y">Y</option>
                        <option value="z">Z</option>

                    </select>
                    <select name="campus" id="" class="form-control" >
                    <option value="">campus</option>

                    <?php

                         $query = "SELECT * FROM campus WHERE school = '$school'";
                         $send = $conn->query($query);
                         $resultnum = mysqli_num_rows($send);

                         for($i=0;$i<$resultnum ;$i++){
                         $result = mysqli_fetch_assoc($send);
                         $camp = $result['campus'];
                    ?>
                         <option value="<?=$camp?>"><?=$camp?></option>
                    <?php
                    }



                     ?>

                    
                    </select>

                    <button class=" btn btn-dark text-capitalize"> Add new Class</button>


                </div>
                </form>

               <form action="" class="col-12 <?=$none?> d-none" >
                <div class="input-group mt-2 form-control w-100">
                   <input type="text" class="form-control search" placeholder="search class eg jss1a">
                    <button class="btn btn-dark"><i class="fa fa-search"></i></button>
                </div>
               </form>
               <div class="table-responsive">

               <table class=" table table-striped " style="text-transform: capitalize;" id="classtable" >
<!-- s -->
<tr class=" " style="font-weight: 600;min-width:100%">
       <td style="">#</td>
       <td style="">Class</td>
       <td style=""> No</td>
       <td style="">teacher</td>
      

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
                    
                      <td class="" style=" line-break: break-all;"> <a href="" class="teachersdetails"><?=$teachername?> <input type="hidden" name="teacherid" value="<?=$teacher?>" class="teacherid"> <input type="hidden" class="campusselect" value="<?=$campusselect?>"></a></td>

                    
                 </tr>
                 <!-- e -->

     
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
                   <td class="" style=" line-break: break-all;"> <a href="" class="teachersdetails"><?=$teachername?> <input type="hidden" name="teacherid" value="<?=$teacher?>" class="teacherid"> <input type="hidden" class="campusselect" value="<?=$campusselect?>"></a></td>

                  
  
                     
                       
                   </tr>
  
  
  
  
                  
                  <?php
                      }
                  }
              
                    
                  ?>
                    
  
  
                  </table>
               </div>

            </div>


         


            
        </div>
   <!-- popperEditsubjects -->
   <div class=" d-none   poppereditsubject popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
    <div class="col-12 col-md-4 bg-light position-relative" style="border-radius: 10px;height: 50%; padding: 10px; overflow-y: scroll;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12   d-flex flex-column gap-2 align-items-center  " style="height: 100%;padding-bottom: 1cm ;">
   
   
                       


              
                <div class="formbox mt-3  d-flex w-100 justify-content-center">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="w-100" id="formsubject" style="">
                    <div class="input-group">
                    <input type="text" class="form-control" style="" placeholder="subject" name="subject">
                    <input type="number" class="form-control " style="max-width: 2cm;" placeholder="CL" name="cl">
                    <input type="hidden" name="campus" value="<?=$campusselect?>">
                    <input type="hidden" class="hclass" name="hclass">
                    <button class="btn btn-success addsubjectbuth">Add</button>
                    </div>
                </form>


                </div>
              
          

        
    </div>
    </div>
    </div>
     <!-- popperEditsubjects -->

        <!-- body -->
    </div>

    <script>
window.onload = function () {

//Better to construct options first and then pass it as a parameter
var options = {
	animationEnabled: true,
	title: {
		text: "performance",   ///title of the chart             
		fontColor: "Peru"
	},	
	axisY: {
		tickThickness: 0,
		lineThickness: 0,
		valueFormatString: " ",
		gridThickness: 0                    
	},
	axisX: {
		tickThickness: 0,
		lineThickness: 0,
		labelFontSize: 18,
		labelFontColor: "Peru"				
	},
	data: [{
		indexLabelFontSize: 26,
		toolTipContent: "<span style=\"color:#62C9C3\">{indexLabel}:</span> <span style=\"color:#CD853F\"><strong>{y}</strong></span>",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
		indexLabelFontWeight: 600,
		indexLabelFontFamily: "Verdana",
		color: "#62C9C3",
		type: "bar",
		dataPoints: [
			{ y: 21, label: "21%", indexLabel: "Video" },
			{ y: 25, label: "25%", indexLabel: "Dining" },
			{ y: 33, label: "33%", indexLabel: "Entertainment" },
			{ y: 36, label: "36%", indexLabel: "News" },
			{ y: 42, label: "42%", indexLabel: "Music" },
			{ y: 49, label: "49%", indexLabel: "Social Networking" },
			{ y: 50, label: "50%", indexLabel: "Maps/ Search" },
			{ y: 55, label: "55%", indexLabel: "Weather" },
			{ y: 61, label: "61%", indexLabel: "Games" }
		]
	}]
};

$("#chartContainer").CanvasJSChart(options);
}
</script>



    <script>

    




    
    
        function pop(a){
            let stuniqe = a.getAttribute('id');
            console.log(stuniqe)

            let uniqe = document.getElementsByClassName(a)[0];
            let data = {
                studentcampus : a.value,
                uniqe:stuniqe
            }
            data = JSON.stringify(data);
            let xml = new XMLHttpRequest;
        xml.open('POST','check.php');
        xml.onreadystatechange =()=>{
            if(xml.readyState == 4 && xml.status == 200){
                let response = xml.responseText;
                let studentdetails = document.querySelector('.appendstudentdetails');
                studentdetails.innerHTML += response;
             
            }
        }
        xml.setRequestHeader('content-type','application/json')
        xml.send(data);

            $('.popperstudent').removeClass('d-none');

        }

        function b(a){
            let stuniqe = a.getAttribute('id');
            console.log(stuniqe)

            let uniqe = document.getElementsByClassName(a)[0];
            let data = {
                studentcampus2 : a.value,
                uniqe2:stuniqe
            }
            data = JSON.stringify(data);
            let xml = new XMLHttpRequest;
        xml.open('POST','domitory.php');
        xml.onreadystatechange =()=>{
            if(xml.readyState == 4 && xml.status == 200){
                let response = xml.responseText;
                let studentdetails = document.querySelector('.appendstudentdetails');
                studentdetails.innerHTML += response;
            }
        }
        xml.setRequestHeader('content-type','application/json')
        xml.send(data);

              a.parentElement.style.display='none';
        }


        

        function remarki(a,b){
    let formm = document.querySelector('#updatem');
    console.log(formm)
    formm.addEventListener('submit',(e)=>{
        e.preventDefault()

  
    var xml = new XMLHttpRequest;
    xml.open('POST','check.php');
    xml.onreadystatechange =()=>{
        if(xml.readyState==4 && xml.status ==200){
            b.classList.add('d-none')
        }
    }
    xml.send(new FormData(formm));
})

 };


 
    </script>



</body>
</html>



