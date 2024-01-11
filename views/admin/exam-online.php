
<?php
include('../session.php');
include('../config.php');
$start='';
if(isset($_POST['uniqe']) AND isset($_POST['code'])){
  if($_POST['uniqe'] !='' AND $_POST['code'] !=''){
    $uniqe =htmlspecialchars($_POST['uniqe']);

    $code =htmlspecialchars($_POST['code']);
    $query ="SELECT * FROM students WHERE uniqe = '$uniqe'";
    $send = $conn->query($query);
    $resultnum = mysqli_num_rows($send);
    if($resultnum>0){
      $result = mysqli_fetch_assoc($send);
      $school = $result['school'];
      $uniqe = $result['uniqe'];
      $_SESSION['school'] = $school;
      $campus = $result['campus'];
      $_SESSION['campus'] = $campus;
      $_SESSION['uniqe'] = $uniqe;


      $class = $result['class'];

      $query ="SELECT * FROM exam WHERE code = '$code'";
      $send = $conn->query($query);
      $resultnum = mysqli_num_rows($send);
      if($resultnum>0){
        $result = mysqli_fetch_assoc($send);
        $starttime1 = $result['starttime'];
        $endtime1 = $result['endtime'];
        $_SESSION['endtime'] = $endtime1;
        $endtime = strtotime($endtime1);
        $starttime = strtotime($starttime1);
        $sec = $endtime - time();
        $sec = date('H:i:s',$sec);
       

        $start = 'd-none';
        $examcode = $code;
        $_SESSION['examcode'] = $code;
        echo'<script>alert("Please note that this exam will end by  '.$sec.' try minimise the time you spend on each question we wish you best of luck!")</script>';


      }
      else{
        echo'<script>alert("invalid Exam Code")</script>';

      }
    

    }
    else{


      $query ="SELECT * FROM teachers WHERE uniqe = '$uniqe'";
      $send = $conn->query($query);
      $resultnum = mysqli_num_rows($send);
      if($resultnum>0){
        $result = mysqli_fetch_assoc($send);
        $school = $result['school'];
        $uniqe = $result['uniqe'];
        $_SESSION['school'] = $school;
        $campus = $result['campus'];
        $_SESSION['campus'] = $campus;
        $_SESSION['uniqe'] = $uniqe;
  
  
        $class = $result['class'];
  
        $query ="SELECT * FROM exam WHERE code = '$code'";
        $send = $conn->query($query);
        $resultnum = mysqli_num_rows($send);
        if($resultnum>0){
          $result = mysqli_fetch_assoc($send);
          $starttime1 = $result['starttime'];
          $endtime1 = $result['endtime'];
          $_SESSION['endtime'] = $endtime1;
          $endtime = strtotime($endtime1);
          $starttime = strtotime($starttime1);
          $sec = $endtime - time();
          $sec = date('H:i:s',$sec);
         
  
          $start = 'd-none';
          $examcode = $code;
          $_SESSION['examcode'] = $code;
          echo'<script>alert("Please note that this exam will end by  '.$sec.' try minimise the time you spend on each question we wish you best of luck!")</script>';
  
  
        }
        else{
          echo'<script>alert("invalid Exam Code")</script>';
  
        }
      
      
    }
    else{
      echo'<script>alert("invalid student ID")</script>';

    }
  }
}
}

$_post = file_get_contents('php://input');
$_post = json_decode($_post,true);
if($_post != null){

  if(isset($_post['time'])){
    $endtime = strtotime($_SESSION['endtime']);
    $diff = $endtime-time() ;
    $tim = $diff;
    if($diff < 0 OR $diff == 0){
      $tim = 0;
    }
    echo $tim;
     $sec = date('H:i:s',$diff);
   exit();
  }
 

  if(isset($_post['question']) AND isset($_post['ans'])){
    $question = htmlspecialchars($_post['question']);
    $ans = htmlspecialchars($_post['ans']);

    $school = $_SESSION['school'];
    $campus = $_SESSION['campus'];
    $uniqe = $_SESSION['uniqe'];
    $examcode = $_SESSION['examcode'];
    $query ="SELECT * FROM exam WHERE question = '$question' AND code ='$examcode'";
    $send = $conn->query($query);
    $result = mysqli_fetch_assoc($send);
    $mark = $result['mark'];
    $answer = $result['answer'];
    if($ans == $answer){
      $score = 'good';
    }
    else{
      $score = 'bad';
    }

    $query ="SELECT * FROM examonline WHERE question = '$question' AND code ='$examcode' AND uniqe = '$uniqe'";
    $send = $conn->query($query);
    $resultnum = mysqli_num_rows($send);
    if($resultnum > 0){
      $query ="UPDATE examonline SET selected = '$ans',score = '$score' WHERE code ='$examcode' AND uniqe ='$uniqe' AND question ='$question'";
      $send = $conn->query($query);
    }
    else{
      $query ="INSERT INTO examonline (school,campus,code,uniqe,mark,score,selected,question,answer) VALUES ('$school','$campus','$examcode','$uniqe','$mark','$score','$ans','$question','$answer')";
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


        <title>Dashboard</title>
    </head>
<body>
    <div class="container-fluid full-vh  d-flex p-0" style="background-color: rgb(11, 11, 97);">

        <div class=" ann animate__animated  d-flex justify-content-center align-items-center text-dark position-fixed d-md-none " style="width: 2cm; height: 2cm; top: 10px;left: 10px;">
            <i class="fa fa-bars" style="font-size: 1cm;"></i>
        </div>
        <!-- body -->
        <div class="body flex-grow-1 bg-light  align-items-center d-flex " style="height: 100%;">

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



     

     <!-- popperbookloan-->
<div class=" d-none  popperbookloanto  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 80%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="" class="col-12">
          <div class="input-group mt-2 form-control">
           
            <input type="text" class="form-control" placeholder="Search Book Name..">
          
            <button class="btn btn-primary"><i class="fa fa-search"></i></button>
          </div>
         </form>



        

        <div class="table-responsive h-75 overflow-scroll mt-5 col-12" >

          
               <form action="">

                <table class="table table-striped table-bordered" style="text-transform: capitalize;">
                 <!-- s -->
                 <tr class="table-active" style="font-weight: 600;">
                         <td>#</td>
                         <td>id</td>
                         <td>gender</td>
                         <td>firstname</td>
                         <td>lastname</td>
                         <td>class</td>
                         <td>Teacher</td>
                         <td>Book name</td>
                         <td>collected</td>
                         <td>action</td>
 
                     </tr>
                     <!-- e -->
                     <!-- s -->
                     <tr class="" style="">
                         <td>1</td>
                         <td> <a href="" class="studentdetails">4543errd5</a></td>
                         <td>mrs</td>
                         <td>kingsley</td>
                         <td>samuel</td>
                         <td>jss3A</td>
                         <td>mr eze</td>
                         <td style="min-width: 3cm;">Essential English</td>
                         <td>5</td>
                         <td>
                                
                              <button class="btn btn-danger">Delete</button>

                         </td>
 
                     </tr>
                     <!-- e -->
                  

                 </table>
                </form>
 
            </div>
          

   
    </div>
    </div>
    </div>
     <!-- popper book loan e-->



     <!-- popperbookadd-->
<div class=" d-none popperbookadd  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 60%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="" class="col-12">
          <div class="formbox">
            <label for="" class="col-12">Book Name</label>
            <input type="text" class="form-control">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Price For Each</label>
            <input type="number" class="form-control img-">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Total Number of Books</label>
            <input type="number" class="form-control">

          </div>
          <div class="formbox mt-3">
            <input type="submit" class="form-control bg-primary text-light" value="Update">

          </div>
        </form>
 
        
          

   
    </div>
    </div>
    </div>
     <!-- popper book add e-->


     <!-- popperexamlogin-->
<div class=" <?=$start?>  popperbookadd   popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12  bg-light position-relative" style="height: 100%; padding: 10px;">
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center justify-content-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="col-12 col-md-4 ">
          <div class="formbox">
            <label for="" class="col-12">ID Number</label>
            <input type="text" class="form-control" name="uniqe">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Code</label>
            <input type="text" class="form-control" name="code">

          </div>
         
          <div class="formbox mt-3">
            <input type="submit" class="form-control bg-primary text-light" value="Start Exam">

          </div>
        </form>
 
        
          

   
    </div>
    </div>
    </div>
     <!-- popperexamlogin e-->




     <!-- popperloanbook-->
<div class=" d-none popperbookloan  popperdetails position-fixed d-flex justify-content-center align-items-center " style="height: 100%; width:100% ;z-index: 10; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.808);">
  
    <div class="col-12 col-md-6 bg-light position-relative" style="border-radius: 10px;height: 60%; padding: 10px;">
    <button class="btn btn-danger float-end close">X</button>
    <div class="col-12 pt-5  d-flex flex-column g-2 align-items-center" style="height: 90%; padding-bottom: 1cm ;">
   
              
        <form action="" class="col-12">
          
          
          <div class="formbox">
            <label for="" class="col-12">ID number</label>
            <input type="text" class="form-control">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Book Name</label>
            <input type="text" class="form-control">

          </div>
          <div class="formbox">
            <label for="" class="col-12">Book Number</label>
            <input type="number" class="form-control">

          </div>
          <div class="formbox mt-3">
            <input type="submit" class="form-control bg-primary text-light" value="Update">

          </div>
        </form>
 
        
          

   
    </div>
    </div>
    </div>
     <!-- popper loanbook e-->

    


            <div class="col-12 col-md-8 h-75  m-auto position-relative">
               <button class="btn btn-dark  text-capitalize mb-3 float-end timeleft">00:00:00</button>
               <button class="btn btn-dark  text-capitalize mb-3 me-2 float-end">End:<?=$endtime1?></button>

               <button class="btn btn-dark  text-capitalize mb-3 me-2 float-end">Start:<?=$starttime1?></button>

               <button class="btn btn-dark text-capitalize mb-3 ">submit</button>

              




               <div class="table-responsive h-100 overflow-scroll mt-5" >

               <table class="table table-striped table-bordered" style="text-transform: capitalize;">
                <!-- s -->
                <tr class="table-active" style="font-weight: 600;">
                        <td>#</td>
                        <td>Question</td>
                        <td>Answer</td>
                       

                    </tr>
                    <!-- e -->

                     <?php
                     $query ="SELECT * FROM exam WHERE code = '$examcode'";
                     $send = $conn->query($query);
                     $resultnum = mysqli_num_rows($send);

                     if($resultnum>0){
                      $j=0;
                      while($result=mysqli_fetch_assoc($send)){
                        $j++;
                        $question = $result['question'];
                        $opta = $result['opta'];
                        $optb = $result['optb'];
                        $optc = $result['optc'];
                        $optd = $result['optd'];
                        ?>
                     <!-- s -->
                    <tr class="" style="">
                    <td><?=$j?></td>
                    <td><?=$question?><br>
                      <small style="col-12"><span>(A)</span><?=$opta?></small><br>
                      <small style="col-12"><span>(B)</span><?=$optb?></small><br>
                      <small style="col-12"><span>(C)</span><?=$optc?></small><br>
                      <small style="col-12"><span>(D)</span><?=$optd?></small><br>
                    </td>
                    <td style="min-width: 4cm;">
                    <div class="d-flex g-3 w-100 justify-content-around"> 
                      <div class="d-flex flex-column align-items-center">
                        <label for="">A</label>
                        <input type="radio" class="form-check-input answer" name="<?='answer'.$j?>" value="opta">
                        <input type="hidden" class="question" value="<?=$question?>">
                        <input type="hidden" class="ans" value="opta">
                      </div>
                      <div class="d-flex flex-column align-items-center" >
                        <label for="">B</label>
                        <input type="radio" class="form-check-input answer" name="<?='answer'.$j?>" value="optb">
                        <input type="hidden" class="question" value="<?=$question?>">
                        <input type="hidden" class="ans" value="optb">
                      </div>
                      <div class="d-flex flex-column align-items-center">
                        <label for="">C</label>
                        <input type="radio" class="form-check-input answer" name="<?='answer'.$j?>" value="optc">
                        <input type="hidden" class="question" value="<?=$question?>">
                        <input type="hidden" class="ans" value="optc">
                      </div>
                      <div class="d-flex flex-column align-items-center">
                        <label for="">D</label>
                        <input type="radio" class="form-check-input answer" name="<?='answer'.$j?>" value="optd">
                        <input type="hidden" class="question" value="<?=$question?>">
                        <input type="hidden" class="ans" value="optd">
                      </div>
                    
                   </div>
                     
                    </td>
                   

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
        <!-- body -->
    </div>
    <script>
    
    setInterval(()=>{
      let data = {
        time:'time'
      }
    data = JSON.stringify(data)
  let xml = new XMLHttpRequest;
  xml.open('POST','<?=$_SERVER['PHP_SELF']?>');
  xml.onreadystatechange = ()=>{
    if(xml.readyState == 4 && xml.status == 200){
      document.getElementsByClassName('timeleft')[0].innerHTML = xml.responseText;
    }
  }
  xml.setRequestHeader('content-type','application/json');
  xml.send(data)
    
    },1000)


      let answer = document.getElementsByClassName('answer');
      let i;
      for(i=0;i<answer.length;i++){
       console.log(answer[i].getAttribute('name'));
      }
    </script>
</body>
</html>