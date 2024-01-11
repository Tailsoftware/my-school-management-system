<?php
 include('session.php');

class Database{
    private $server;
    private $user;
    private $pass;
    private $dbname;
    public $conn;
    public function __construct($server,$user,$pass,$dbname)
    {
      $this->server=$server;
      $this->user=$user;
      $this->pass=$pass;
      $this->dbname=$this->dbname;
      try{
        $this->conn=mysqli_connect($server,$user,$pass,$dbname);
      }
      catch(mysqli_sql_exception){

      }
        
    }

}

class Myclass extends Database{
    public $section;
    public $uniqe;
    public $myuniqe;
    public $campusselect;
    public $campus;
    public $attendancee;
    public $resultts;
    public $classt;
    public $lbook;
    public $rbook;
    public $h;
    public $registration;
    public $information;
    public $fee;
    public $addnewbook;
    public $modifybook;
    public $addnewclass;
    public $teachersd;
    public $studentd;
    public $dometryd;
    public $adddclass;
    public $adddfees;
    public $updatepricee;
    public $studentnotpermit;
    public $lib;
    public $ccselect;
    public $attstu;
    public $conn;
    public $database;
    public $admin;
    public $id;
    public $teacher;
    public $student;
    public $query;
    public  $send;
    public $result;
    public  $resultnum;
    public $mfirstname;
    public $mlastname;
    public $email;
    public $date;
    public $regdate;
    public $profileimg;
    public $school;
    public $schoolimg;
    public $class;
    public $homeaddr;
    public $gender;
    public $qualification;
    public $familymember;
    public $familyfirstname;
    public $familylastname;
    public $familynumber;
    public $firstname;
    public $lastname;
    public $fmember;
    public $fmemberfirstname;
    public $fmemberlastname;
    public $fnumber;
    public $domitory;
    public $schoolfees;
    public $feeamount;
    public $i;
    public $query2;
    public  $send2;
    public  $resultnum2;
    public $payed;
    public $result2;
    public $remaining;
    public $tcollected;
    public $newcollected;
    public $completed;
    public $time;
    public $sessionstart;
    public $sessionend;
    public $noticeboard;
    public $loanedbook;
    public $number;
    public $d;
    public $teachersnum;
    public  $teachersatt;
    public $teacersabsent;
    public $uniqet;
    public $studentnumber;
    public $studentatt;
    public $studentabsent;
    public  $totalincome;
    public $totalsalary;
    public $salary;
    public $teas;
    public $movement;
    public $officestaffnotpermit;

   
    public function __construct()
    {

        $this->database = new Database('localhost','root','','myschool');
        $this->conn= $this->database->conn;

        if(empty($_SESSION['section'])){
            header("location:login.php");
        };
        
        $this->uniqe = $_SESSION['myuniqe'];
        $this->myuniqe = $_SESSION['myuniqe'];
        $this->section = $_SESSION['section'];

        
       

        if($this->section=='student'){
            $this->attendancee ='d-none';
            $this->movement ='d-none';
            $this->resultts ='d-none';
            $this->classt='d-none';
            $this->lbook='d-none';
            $this->rbook='d-none';
            $this->h ='0cm';
            $this->registration = 'd-none';
            $this->information = 'd-none';
            $this->fee = 'd-none';
            $this->addnewbook = 'd-none';
            $this->modifybook = 'd-none';
            $this->addnewclass ='d-none';
            $this->teachersd ='d-none';
            $this->studentd ='d-none';
            $this->dometryd ='d-none';
            $this->adddclass ='d-none';
            $this->adddfees ='d-none';
            $this->updatepricee ='d-none';
            $this->studentnotpermit='d-none';
            $this->ccselect='d-none';
            $this->lib ='';


            $this->admin = 'd-none';
            $this->teacher = 'd-none';
            $this->student = '';
          
            $this->query = "SELECT * FROM `students` WHERE uniqe = ' $this->uniqe'";
            $this->send = $this->conn->query( $this->query);
            $this->result = mysqli_fetch_assoc( $this->send);
            $this->resultnum = mysqli_num_rows( $this->send);
            if( $this->resultnum>0){
              $this->mfirstname = $this->result['firstname'];
              $this->mlastname = $this->result['lastname'];
              $this->school = $this->result['school'];
              $this->uniqe= $this->result['uniqe'];
              $this->class= $this->result['class'];
              $this->section= $this->result['section'];
              $this->homeaddr= $this->result['homeaddr'];
              $this->gender= $this->result['gender'];
              $this->regdate= $this->result['regdate'];
              $this->qualification= $this->result['qualification'];
              $this->familymember= $this->result['fmember'];
              $this->familyfirstname= $this->result['fmemberfirstname'];
              $this->familylastname= $this->result['fmemberlastname'];
              $this->familynumber= $this->result['fnumber'];
              $this->email= $this->result['email'];
              $this->profileimg = $this->result['profileimg'];
              $this->campus = $this->result['campus'];
              $this->campusselect = $this->campus;
            }
            $this->query ="SELECT schoolimg FROM admin WHERE school ='$this->school'";
            $this->send =$this->conn->query($this->query);
            $this->result = mysqli_fetch_assoc($this->send);
            $this->schoolimg = $this->result['schoolimg'];
        }
        elseif( $this->section=='staff'){
            $this->attstu ='d-none';
            $this->officestaffnotpermit ='d-none';
            $this->resultts ='d-none';
            $this->classt='d-none';
            $this->h ='0cm';
            $this->lib ='d-none';
            $this->registration = 'd-none';
            $this->information = 'd-none';
            $this->fee = 'd-none';
            $this->addnewbook = 'd-none';
            $this->modifybook = 'd-none';
            $this->addnewclass ='d-none';
            $this->teachersd ='d-none';
            $this->studentd ='d-none';
            $this->dometryd ='d-none';
            $this->adddclass ='d-none';
            $this->adddfees ='d-none';
            $this->updatepricee ='d-none';
            $this->ccselect='d-none';
            $this->admin = 'd-none';
            $this->teacher = 'd-none';
            $this->student = '';

            $this->query = "SELECT * FROM `officestaf` WHERE uniqe = ' $this->uniqe'";
            $this->send = $this->conn->query( $this->query);
            $this->result = mysqli_fetch_assoc( $this->send);
            $this->resultnum = mysqli_num_rows( $this->send);
            if( $this->resultnum>0){
              $this->mfirstname = $this->result['firstname'];
              $this->mlastname = $this->result['lastname'];
              $this->school = $this->result['school'];
              $this->uniqe= $this->result['uniqe'];
              $this->class= $this->result['class'];
              $this->section= $this->result['section'];
              $this->homeaddr= $this->result['homeaddr'];
              $this->gender= $this->result['gender'];
              $this->regdate= $this->result['regdate'];
              $this->familymember= $this->result['fmember'];
              $this->familyfirstname= $this->result['fmemberfirstname'];
              $this->familylastname= $this->result['fmemberlastname'];
              $this->familynumber= $this->result['fnumber'];
              $this->email= $this->result['email'];
              $this->profileimg = $this->result['profileimg'];
              $this->campus = $this->result['campus'];
              $this->campusselect = $this->campus;
            }
            $this->query ="SELECT schoolimg FROM admin WHERE school ='$this->school'";
            $this->send =$this->conn->query($this->query);
            $this->result = mysqli_fetch_assoc($this->send);
            $this->schoolimg = $this->result['schoolimg'];
            
        }
        elseif( $this->section=='teacher'){
            $this->movement ='d-none';

            $this->h ='3cm';
            $this->registration = 'd-none';
            $this->information = 'd-none';
            $this->addnewbook = 'd-none';
            $this->modifybook = 'd-none';
            $this->addnewclass ='d-none';
            $this->teachersd ='d-none';
            $this->studentd ='d-none';
            $this->dometryd ='d-none';
            $this->adddclass ='d-none';
            $this->adddfees ='d-none';
            $this->updatepricee ='d-none';
            $this->ccselect='d-none';
            $this->lib ='';


            $this->admin = 'd-none';
            $this->teacher = '';
            $this->student = 'd-none';
          
            $this->query = "SELECT * FROM `teachers` WHERE uniqe = ' $this->uniqe'";
            $this->send = $this->conn->query( $this->query);
            $this->result = mysqli_fetch_assoc( $this->send);
            $this->resultnum = mysqli_num_rows( $this->send);
            if( $this->resultnum>0){
              $this->mfirstname = $this->result['firstname'];
              $this->mlastname = $this->result['lastname'];
              $this->school = $this->result['school'];
              $this->uniqe= $this->result['uniqe'];
              $this->class= $this->result['class'];
              $this->section= $this->result['section'];
              $this->homeaddr= $this->result['homeaddr'];
              $this->gender= $this->result['gender'];
              $this->regdate= $this->result['regdate'];
              $this->qualification= $this->result['qualification'];
              $this->familymember= $this->result['fmember'];
              $this->familyfirstname= $this->result['fmemberfirstname'];
              $this->familylastname= $this->result['fmemberlastname'];
              $this->familynumber= $this->result['fnumber'];
              $this->email= $this->result['email'];
              $this->profileimg = $this->result['profileimg'];
              $this->campus = $this->result['campus'];
              $this->campusselect = $this->campus;
            }
            $this->query ="SELECT schoolimg FROM admin WHERE school ='$this->school'";
            $this->send =$this->conn->query($this->query);
            $this->result = mysqli_fetch_assoc($this->send);
            $this->schoolimg = $this->result['schoolimg'];

        }
        elseif( $this->section=='admin'){
            $this->registration = '';
            $this->information = '';
            $this->fee = '';
            $this->addnewbook = '';
            $this->modifybook = '';
            $this->addnewclass ='';
            $this->teachersd ='';
            $this->studentd ='';
            $this->dometryd ='';
            $this->h ='10cm';
            $this->adddclass='';
            $this->adddfees ='';
            $this->updatepricee ='';
            $this->attendancee ='';
            $this->resultts ='';
            $this->classt='';
            $this->lbook='';
            $this->rbook='';
            $this->attstu='';
            $this->lib='';
            $this->studentnotpermit='';
            $this->ccselect='';

            $this->admin = '';
            $this->teacher = 'd-none';
            $this->student = 'd-none';
            $this->uniqe = $_SESSION['myuniqe'];
            $this->query = "SELECT * FROM `admin` WHERE email = '$this->uniqe'";
            $this->send = $this->conn->query( $this->query);
            $this->result = mysqli_fetch_assoc( $this->send);
            $this->resultnum = mysqli_num_rows( $this->send);
           if( $this->resultnum>0){
            $this->mfirstname =  $this->result['firstname'];
            $this->mlastname =  $this->result['lastname'];
            $this->email = $this->result['email'];
            $this->uniqe = $this->result['uniqe'];
            $this->regdate =  $this->result['regdate'];
            $this->profileimg =  $this->result['profileimg'];
            $this->section = $this->result['section'];
            $this->school =  $this->result['school'];
            $this->schoolimg = $this->result['schoolimg'];
         
           }

           if(isset($_SESSION['campusselect'])){
            $this->campusselect = $_SESSION['campusselect'];
           }

            $this->query = "SELECT * FROM plan WHERE school ='$this->school' AND admin ='$this->email'";
            $this->send = $this->conn->query( $this->query);
           $this->resultnum = mysqli_num_rows( $this->send);
           if($this->resultnum<1){
            $this->query = "INSERT INTO plan (school,admin,plan) VALUES ('$this->school','$this->email','active')";
            $this->send = $this->conn->query( $this->query);
           }

           $this->query = "SELECT * FROM smscount WHERE school ='$this->school' AND email ='$this->email'";
           $this->send = $this->conn->query($this->query);
           $this->resultnum = mysqli_num_rows($this->send);
           if($this->resultnum<1){
             $this->query = "INSERT INTO smscount (school,email,count) VALUES ('$this->school','$this->email','0')";
             $this->send = $this->conn->query($this->query);
           }
        }  
        

            
        $this->query = "SELECT * FROM session WHERE school ='$this->school' ORDER BY id DESC LIMIT 1";
        $this->send = $this->conn->query($this->query);
        $this->result = mysqli_fetch_assoc($this->send);
         $_SESSION['sessionstart'] = $this->result['sessionstart'];
        $_SESSION['sessionend'] = $this->result['sessionend'];
        
        
        if(isset($_SESSION['sessionstart'])){
            $this->sessionstart = $_SESSION['sessionstart'];
        }
        if(isset($_SESSION['sessionend'])){
            $this->sessionend = $_SESSION['sessionend'];
        }
        



        $this->query = "SELECT * FROM newsandevent WHERE school = '$this->school' AND campus = '$this->campusselect' AND `type` = 'noticeboard'";
        /*             $this->query = "SELECT * FROM newsandevent WHERE school = '$this->school' AND campus = '$campus' OR school = '$this->school' AND campus = 'all'";
         */            $this->send = $this->conn->query($this->query);
         $this->noticeboard = mysqli_num_rows($this->send);
        
        
                        if($this->section =='student'){
                            $this->query = "SELECT * FROM loanedbook WHERE loanto ='$this->myuniqe'";
                            $this->send = $this->conn->query($this->query);
                           $this->resultnum = mysqli_num_rows($this->send);
                           $this->loanedbook = 0;
                          while($this->result = mysqli_fetch_assoc($this->send)){
                            $this->number = $this->result['number'];
                            $this->loanedbook+=$this->number;
                          }
                           
                        }
                        elseif($this->section =='admin'){
                            $this->query = "SELECT * FROM loanedbook WHERE school ='$this->school' AND campus = '$this->campusselect'";
                            $this->send = $this->conn->query($this->query);
                            $this->resultnum = mysqli_num_rows($this->send);
                             $this->loanedbook = 0;
                           while($this->result = mysqli_fetch_assoc($this->send)){
                            $this->number = $this->result['number'];
                             $this->loanedbook+=$this->number;
                           }
                        }
                        elseif($this->section =='staff'){
                            $this->query = "SELECT * FROM loanedbook WHERE school ='$this->school' AND campus = '$this->campusselect'";
                            $this->send = $this->conn->query($this->query);
                            $this->resultnum = mysqli_num_rows($this->send);
                             $this->loanedbook = 0;
                           while($this->result = mysqli_fetch_assoc($this->send)){
                            $this->number = $this->result['number'];
                             $this->loanedbook+=$this->number;
                        }
                        }
                        elseif($this->section =='teacher'){
                            $this->query = "SELECT * FROM loanedbook  WHERE loanby ='$this->myuniqe'";
                            $this->send = $this->conn->query($this->query);
                           $this->resultnum = mysqli_num_rows($this->send);
                            $this->loanedbook = 0;
                          while($this->result = mysqli_fetch_assoc($this->send)){
                           $this->number = $this->result['number'];
                            $this->loanedbook+=$this->number;
                          }
                           
                        }
        
        
                        $this->d = date('Y-m');
                        $this->query = "SELECT * FROM teachers WHERE school ='$this->school' AND campus = '$this->campusselect' AND lastattendance LIKE '$this->d%'";
                        $this->send = $this->conn->query($this->query);
                       $this->teachersnum = mysqli_num_rows($this->send);
        
        
                         $this->d = date('Y-m-d');
                        $this->query = "SELECT * FROM attendance WHERE school ='$this->school' AND campus = '$this->campusselect' AND section='teachers' AND datetime LIKE '$this->d%'";
                        $this->send = $this->conn->query($this->query);
                        $this->teachersatt = mysqli_num_rows($this->send);
        
        
        
                        $this->d = date('Y-m');
                        $this->query = "SELECT * FROM teachers WHERE school ='$this->school' AND campus = '$this->campusselect' AND lastattendance LIKE '$this->d%'";              
                         $this->send = $this->conn->query($this->query);
                         $this->teacersabsent = 0;
                         $this->d = date('Y-m-d');
        
                      while($this->result = mysqli_fetch_assoc($this->send)){
                        $this->uniqet = $this->result['uniqe'];
                        $this->query2 = "SELECT * FROM attendance WHERE school ='$this->school' AND campus = '$this->campusselect' AND section='teachers' AND uniqe = '$this->uniqet' AND datetime LIKE '$this->d%'";
                        $this->send2 = $this->conn->query($this->query2);
                       $this->resultnum2 = mysqli_num_rows($this->send2);
                       if($this->resultnum2 <= 0){
                        $this->teacersabsent++;
                       }
        
                      }
        
                      if($this->section =='teacher'){
                        $this->query = "SELECT * FROM students WHERE school ='$this->school' AND campus = '$this->campusselect' AND class = '$this->class'";
                      $this->send = $this->conn->query($this->query);
                      $this->studentnumber = mysqli_num_rows($this->send);
        
                     $this->d = date('Y-m-d');
        
                     $this->query = "SELECT * FROM students WHERE school ='$this->school' AND campus = '$this->campusselect' AND lastattendance LIKE '$this->d%' AND class = '$this->class' ";
                      $this->send = $this->conn->query($this->query);
                      $this->studentatt = mysqli_num_rows($this->send);
        
        
        
                     $this->query = "SELECT * FROM students WHERE school ='$this->school' AND campus = '$this->campusselect' AND lastattendance NOT LIKE '$this->d%' AND class = '$this->class'";
                      $this->send = $this->conn->query($this->query);
                      $this->studentabsent = mysqli_num_rows($this->send);
        
        
                     
        
                      }
                      elseif($this->section =='admin'){
                        $this->query = "SELECT * FROM students WHERE school ='$this->school' AND campus = '$this->campusselect'";
                        $this->send = $this->conn->query($this->query);
                        $this->studentnumber = mysqli_num_rows($this->send);
        
                       $this->d = date('Y-m-d');
        
                     $this->query = "SELECT * FROM students WHERE school ='$this->school' AND campus = '$this->campusselect' AND lastattendance LIKE '$this->d%'";
                      $this->send = $this->conn->query($this->query);
                      $this->studentatt = mysqli_num_rows($this->send);
        
                     $this->query = "SELECT * FROM students WHERE school ='$this->school' AND campus = '$this->campusselect' AND lastattendance NOT LIKE '$this->d%'";
                     $this->send = $this->conn->query($this->query);
                     $this->studentabsent = mysqli_num_rows($this->send);
        
                      }
        
                      $this->query = "SELECT * FROM payedfees WHERE payedto ='$this->myuniqe' AND time > '$this->sessionstart' AND time < '$this->sessionend'";
                      $this->send = $this->conn->query($this->query);
                     $this->resultnum = mysqli_num_rows($this->send);
                     $this->totalincome = 0;
                     while($this->result=mysqli_fetch_assoc($this->send)){
                        $this->payed = $this->result['payed'];
                        $this->totalincome += $this->payed;
                     }
        
        
                     if($this->section =='admin'){
                        $this->query = "SELECT * FROM payedfees WHERE school ='$this->school' AND campus = '$this->campusselect' AND time > '$this->sessionstart' AND time < '$this->sessionend'";
                        $this->send = $this->conn->query($this->query);
                       $this->resultnum = mysqli_num_rows($this->send);
                       $this->totalincome = 0;
                       while($this->result=mysqli_fetch_assoc($this->send)){
                        $this->payed = $this->result['payed'];
                        $this->totalincome += $this->payed;
                       }
        
                        
                       $this->d = date('Y-m');
                       $this->query = "SELECT * FROM teachers WHERE school ='$this->school' AND campus = '$this->campusselect' AND lastattendance LIKE '$this->d%'";
                       $this->send = $this->conn->query($this->query);
                       $this->resultnum = mysqli_num_rows($this->send);
                       $this->totalsalary = 0;
        if($this->resultnum>0){
            $this->result = mysqli_fetch_assoc($this->send);
            for($this->i=0;$this->i<$this->resultnum;$this->i++){
                $this->uniqet = $this->result['uniqe'];
        
                $this->salary = $this->result['salary'];
                $this->salary = $this->salary/28;
        
                $this->query2 = "SELECT * FROM attendance WHERE school ='$this->school' AND campus = '$this->campusselect' AND section='teachers' AND uniqe = '$this->uniqet' AND datetime LIKE '$this->d%'";
                $this->send2 = $this->conn->query($this->query2);
               $this->resultnum2 = mysqli_num_rows($this->send2);
               $this->salary = $this->salary*$this->resultnum2;
               $this->totalsalary = round($this->totalsalary+=$this->salary);
                $_SESSION['tsalary'] = $this->totalsalary;
            }
            
             
                       
                      
        }
        $this->query = "SELECT * FROM officestaf WHERE school ='$this->school' AND campus = '$this->campusselect' AND lastattendance LIKE '$this->d%'";
        $this->send = $this->conn->query($this->query);
                       $this->resultnum = mysqli_num_rows($this->send);
                      $this->totalsalary = 0;
        if($this->resultnum>0){
            $this->result = mysqli_fetch_assoc($this->send);
            for($this->i=0;$this->i<$this->resultnum;$this->i++){
                $this->uniqet = $this->result['uniqe'];
        
                $this->salary = $this->result['salary'];
                $this->salary = $this->salary/28;
        
               $this->query2 = "SELECT * FROM attendance WHERE school ='$this->school' AND campus = '$this->campusselect' AND section='staff' AND uniqe = '$this->uniqet' AND datetime LIKE '$this->d%'";
                $this->send2 = $this->conn->query($this->query2);
               $this->resultnum2 = mysqli_num_rows($this->send2);
               $this->salary = $this->salary*$this->resultnum2;
                $this->totalsalary = round($_SESSION['tsalary']+=$this->salary);
            }
            
             
                       
                      
        }
        $this->teas = '';
                     
        
        }

    }



    public function campusselect($campus,$source)
    {
         $_SESSION['campusselect']  = $campus;
        
         header("location:admin/$source.php");
    }
    public function logout()
    {
        header("location:admin/login.php");
        session_destroy();
    }

    public function makefee($fee,$amount,$class,$source)
    {
        $this->query ="INSERT INTO fees (feename,amount,`class`,school,campus) VALUES ('$fee','$amount','$class','$this->school','$this->campusselect')";
        $this->send = $this->conn->query($this->query);
        header("location:admin/$source.php");

    }

    public function teachearsdetails($campusselect,$teacherid)
    {
    $this->query = "SELECT * FROM teachers WHERE school = '$this->school' AND campus ='$campusselect' AND uniqe ='$teacherid'";
    $this->send = $this->conn->query($this->query);
    $this->result = mysqli_fetch_assoc($this->send);
    $this->resultnum = mysqli_num_rows($this->send);
    $this->firstname = $this->result['firstname'];
    $this->lastname = $this->result['lastname'];
    $this->uniqe = $this->result['uniqe'];
    $this->class = $this->result['class'];
    $this->homeaddr = $this->result['homeaddr'];
    $this->regdate = $this->result['regdate'];
    $this->gender = $this->result['gender'];
    $this->qualification =$this->result['qualification'];
    $this->fmember = $this->result['fmember'];
    $this->fmemberfirstname =$this->result['fmemberfirstname'];
    $this->fmemberlastname =$this->result['fmemberlastname'];
    $this->fnumber =$this->result['fnumber'];
    $this->email = $this->result['email'];
    $this->profileimg = $this->result['profileimg'];
    exit('  
    
    <!-- profilepic -->
    <div class="profilebox" style="height: 230px;">
    <div class="profilepic bg-primary" style="width: 200px; height: 200px; border-radius: 50%;">
         <img src="../upload/'.$this->profileimg.'" alt="img">

    </div>
    </div>
      <!-- profilepic e -->



    
      <!-- teachers details -->
      <div class="mt-3 col-12">
    
    
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">Firstname :</span> &nbsp; <span>'.$this->firstname.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">Lastname :</span> &nbsp; <span>'.$this->lastname.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">reg no :</span> &nbsp; <span>'.$this->uniqe.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">class :</span> &nbsp; <span>'.$this->class.'</span>
    </div>
    <!--  -->
   
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">address :</span> &nbsp; <span>'.$this->homeaddr.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;"> Registration Date : <span style="font-weight: 300;">'.$this->regdate.'</span>  </span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">gender :</span> &nbsp; <span>'.$this->gender.'</span>
    </div>
    <!--  -->
   
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">qualification</span> &nbsp; <span>'.$this->qualification.'</span>
    </div>
    <!--  -->
   
  
    
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">family :</span> &nbsp; <span>'.$this->fmember.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">family firstname :</span> &nbsp; <span>'.$this->fmemberfirstname.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">family lastname :</span> &nbsp; <span>'.$this->fmemberlastname.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;">family number :</span> &nbsp; <span>'.$this->fnumber.'</span>
    </div>
    <!--  -->
    <!--  -->
    <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
    <span style="font-weight: 600;"> email :</span> &nbsp; <span style="text-transform: none;">'.$this->email.'</span>
    </div>
    <!--  -->

    </div>

    <!-- teachers details -->

   ');
    }

    public function studentdetails($campusselect,$studentid){
        $this->query = "SELECT * FROM students WHERE school = '$this->school' AND campus ='$campusselect' AND uniqe ='$studentid'";
        $this->send = $this->conn->query($this->query);
        $this->result = mysqli_fetch_assoc($this->send);
        $this->resultnum = mysqli_num_rows($this->send);
        $this->firstname = $this->result['firstname'];
        $this->lastname = $this->result['lastname'];
        $this->uniqe =$this->result['uniqe'];
        $this->class =$this->result['class'];
        $this->homeaddr = $this->result['homeaddr'];
        $this->regdate = $this->result['regdate'];
        $this->gender = $this->result['gender'];
        $this->domitory = $this->result['domitory'];
        $this->fmember =$this->result['fmember'];
        $this->fmemberfirstname =$this->result['fmemberfirstname'];
        $this->fmemberlastname = $this->result['fmemberlastname'];
        $this->fnumber = $this->result['fnumber'];
        $this->email = $this->result['email'];
        $this->profileimg =$this->result['profileimg'];
        $this->schoolfees =$this->result['schoolfees'];
        exit('  
        
        <!-- profilepic -->
        <div class="profilebox" style="height: 230px;">
        <div class="profilepic bg-primary" style="width: 200px; height: 200px; border-radius: 50%;">
             <img src="../upload/'. $this->profileimg.'" alt="img">
    
        </div>
        </div>
          <!-- profilepic e -->
    
    
    
        
          <!-- teachers details -->
          <div class="mt-3 col-12">
        
        
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">Firstname :</span> &nbsp; <span>'.$this->firstname.'</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">Lastname :</span> &nbsp; <span>'.$this->lastname.'</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">reg no :</span> &nbsp; <span>'.$this->uniqe.'</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">class :</span> &nbsp; <span>'.$this->class.'</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">schoolfees paid :</span> &nbsp; <span>'.$this->schoolfees.'</span>
        </div>
        <!--  -->
       
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">address :</span> &nbsp; <span>'.$this->homeaddr.'</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;"> Registration Date : <span style="font-weight: 300;">'.$this->regdate.'</span>  </span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">gender :</span> &nbsp; <span>'.$this->gender.'</span>
        </div>
        <!--  -->
       
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">domitory</span> &nbsp; <span>'.$this->domitory.'</span>
        </div>
        <!--  -->
       
      
        
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">family :</span> &nbsp; <span>'.$this->fmember.'</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">family firstname :</span> &nbsp; <span>'.$this->fmemberfirstname.'</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">family lastname :</span> &nbsp; <span>'.$this->fmemberlastname.'</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;">family number :</span> &nbsp; <span>'.$this->fnumber.'</span>
        </div>
        <!--  -->
        <!--  -->
        <div class="infor  col-12 d-flex align-items-center ps-2 text-capitalize" style="height: 1cm; border-top: 1px solid gray;">
        <span style="font-weight: 600;"> email :</span> &nbsp; <span style="text-transform: none;">'.$this->email.'</span>
        </div>
        <!--  -->
    
        </div>
    
        <!-- teachers details -->
    
       ');
    }

    public function studentpaidfees($campusselect,$feename,$class)
    {
        $this->query = "SELECT * FROM fees WHERE school = '$this->school' AND campus ='$campusselect' AND class ='$class' OR school = '$this->school' AND campus ='$campusselect' AND class ='all'";
        $this->send = $this->conn->query($this->query);
        $this->result = mysqli_fetch_assoc($this->send);
        $this->feeamount = $this->result['amount'];
        $this->query = "SELECT * FROM students WHERE school = '$this->school' AND campus ='$campusselect' AND class ='$class'";
        $this->send = $this->conn->query($this->query);
        $this->resultnum = mysqli_num_rows($this->send);
        $this->i = 0;
        while($this->result = mysqli_fetch_assoc($this->send)){
            $this->i++;
            $this->campusselect = $campusselect; 
    
            $this->firstname = $this->result['firstname'];
        $this->lastname = $this->result['lastname'];
        $this->uniqe = $this->result['uniqe'];
        $this->class = $this->result['class'];
        $this->query2 = "SELECT * FROM payedfees WHERE uniqe ='$this->uniqe' AND feename ='$feename'";
        $this->send2 = $this->conn->query($this->query2);
        $this->resultnum2 = mysqli_num_rows($this->send2);
        if($this->resultnum2>0){
        $this->result2 = mysqli_fetch_assoc($this->send2);
        $this->payed = $this->result2['payed'];
        $this->remaining = $this->result2['remaining'];
    
        echo('
        <!-- s -->
        <tr class="stt d" style="">
        <input type="hidden" id="'.$this->uniqe.'" value="'.$this->campusselect.'">
    
         <td>1</td>
         <td><span class="student text-primary text-decoration-underline" onclick="a('.$this->uniqe.')" style="cursor: pointer;">'.$this->uniqe.'</span></td>
         <td class="dc">'.$this->firstname.'</td>
         <td class="dc" >'.$this->lastname.'</td>
        
         <td>'.$this->payed.'</td>
         <td>'.$this->remaining.'</td>
    
     </tr>
        
        ');
        }
        else{
        
        echo('
        <!-- s -->
        <tr class="stt d" style="">
        <input type="hidden" id="'.$this->uniqe.'" value="'.$this->campusselect.'">
    
         <td>1</td>
         <td><span class="student text-primary text-decoration-underline" onclick="a('.$this->uniqe.')" style="cursor: pointer;">'.$this->uniqe.'</span></td>
         <td class="dc">'.$this->firstname.'</td>
         <td class="dc" >'.$this->lastname.'</td>
        
         <td>0</td>
         <td>'.$this->feeamount.'</td>
    
     </tr>
        
        ');
    
        }
       
        }
    
        exit();
    }


    public function deletestudent($campusselect,$studentid)
    {
        $this->query = "DELETE  FROM students WHERE school = '$this->school' AND campus ='$campusselect' AND uniqe ='$studentid'";
        $this->send = $this->conn->query($this->query);
    }


    public function makefeepaymentto($payedto,$studentid,$feename,$amountpayed,$source)
    {   


        $this->query = "SELECT *  FROM fees WHERE school ='$this->school' AND campus='$this->campusselect' AND feename ='$feename'";
        $this->send = $this->conn->query($this->query);
        $this->resultnum = mysqli_num_rows($this->send);
        $this->result = mysqli_fetch_assoc($this->send);
        $this->feeamount = $this->result['amount'];
        $this->tcollected = $this->result['collected'];
        $this->newcollected = $this->tcollected+$amountpayed;
        $this->query ="UPDATE fees SET collected ='$this->newcollected' WHERE feename ='$feename' AND school ='$this->school' AND campus ='$this->campusselect'";
        $this->send = $this->conn->query($this->query);



        $this->query = "SELECT *  FROM students WHERE  uniqe ='$studentid'";
        $this->send = $this->conn->query($this->query);
        $this->resultnum = mysqli_num_rows($this->send);
        if($this->resultnum>0){
        $this->result = mysqli_fetch_assoc($this->send);
        $this->firstname = $this->result['firstname'];
        $this->lastname = $this->result['lastname'];
        $this->class = $this->result['class'];
        }
        $this->remaining = $this->feeamount - $amountpayed;
        if($this->feeamount === $amountpayed){
            $this->completed ='completed';

        }
        else{
            $this->completed ='not completed';
        }
        if($this->resultnum>0){
            $this->time = time();

            $this->query ="INSERT INTO payedfees (uniqe,class,payed,remaining,completed,feename,firstname,lastname,school,campus,payedto,time) VALUES('$studentid','$this->class','$amountpayed','$this->remaining','$this->completed','$feename','$this->firstname','$this->lastname','$this->school','$this->campusselect','$payedto','$this->time')";
            $this->send = $this->conn->query($this->query);
            echo '<script>alert("payment made succesfull")</script>';
        }
        else{
            echo '<script>alert("incorect student ID")</script>';
        }

        header("location:admin/$source.php");

    }
    public function updatefeeamount($amount,$name,$time)
    {
        $this->query="UPDATE fees SET amount ='$amount',time='$time' WHERE feename ='$name' AND school='$this->school' AND campus='$this->campusselect'";
        $this->send=$this->conn->query($this->query);
    }
    public function schoolcallenderevent($date,$content)
    {
        $this->query = "INSERT INTO cal (school,date,content) VALUES('$this->school','$date','$content')";
        $this->send= $this->conn->query($this->query);

    }
    public function deleteschoolcallenderevent($date,$content)
    {
        $this->query = "DELETE FROM cal WHERE school='$this->school' AND date='$date' AND content ='$content'";
        $this->send= $this->conn->query($this->query);

    }
    public function teachersattendance($uniq,$time,$source)
    {

        echo'mmmmmmmmmmmmmmmm';
       $this->query ="SELECT * FROM teachers WHERE uniqe ='$uniq'";
        $this->send = $this->conn->query($this->query);
        $this->resultnum = mysqli_num_rows($this->send);
        if( $this->resultnum>0){
            $this->date = date('Y-m-d');
           $this->query ="SELECT * FROM attendance WHERE uniqe ='$uniq' AND `datetime` LIKE '$this->date%'";
            $this->send = $this->conn->query($this->query);
             $this->resultnum = mysqli_num_rows($this->send);
            if( $this->resultnum>0){
                echo'<script>alert("already signed today")</script>';
            }
            else{
                $this->date = date('Y-m-d H:i:s');
               $this->query ="INSERT INTO attendance (uniqe,section,school,campus,time) VALUES ('$uniq','staff','$this->school','$this->campusselect','$time')";
                $this->send = $this->conn->query($this->query);
               $this->query ="UPDATE officestaf SET lastattendance ='$this->date' WHERE uniqe ='$uniq'";
                $this->send = $this->conn->query($this->query);
                echo'<script>alert("done")</script>';
            }
    
    
    
    
           
        }
        else{
            echo'<script>alert("invalid uniqe number")</script>';
        }
    
        header("location:admin/$source.php");
    }

    public function numberofattendance($date,$campusselect,$teacherid)
    {
        $this->query = "SELECT * FROM attendance WHERE school = '$this->school' AND campus ='$campusselect' AND  uniqe ='$teacherid' AND datetime LIKE '$date%' ORDER BY `datetime` DESC";
        $this->send = $this->conn->query($this->query);
        $this->i=0;
       while($this->result = mysqli_fetch_assoc($this->send)){
        $this->i++;
        $this->time = $this->result['datetime'];
           $this->query = "SELECT * FROM officestaf WHERE school = '$this->school' AND campus ='$campusselect' AND uniqe ='$teacherid'";
           $this->send = $this->conn->query($this->query);
           $this->result = mysqli_fetch_assoc($this->send);
           $this->resultnum = mysqli_num_rows($this->send);
           $this->firstname = $this->result['firstname'];
           $this->lastname = $this->result['lastname'];
           $this->uniqe = $this->result['uniqe'];
           $this->class = $this->result['class'];
           $this->homeaddr = $this->result['homeaddr'];
           $this->regdate = $this->result['regdate'];
           $this->gender = $this->result['gender'];
           $this->qualification = $this->result['qualification'];
           $this->fmember = $this->result['fmember'];
           $this->fmemberfirstname = $this->result['fmemberfirstname'];
           $this->fmemberlastname = $this->result['fmemberlastname'];
           $this->fnumber = $this->result['fnumber'];
           $this->email = $this->result['email'];
           $this->profileimg = $this->result['profileimg'];
           echo('  
           
           <!-- s -->
                    <tr class="table-active" style="font-weight: 600;">
                            <td>'.$this->i.'</td>
                            <td>'.$this->gender.'</td>
                            <td>'.$this->firstname.'</td>
                            <td>'.$this->lastname.'</td>
                            <td>'.$this->class.'</td>
                            <td>'.$this->time.'</td>
                            <td><button class="btn btn-danger">Delete</button></td>
       
                        </tr>
                        <!-- e -->
          ');
   
   
       };
   
      exit();
    }
    
};
//////////

$functions = new Myclass();


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['logout'])){
        $functions->logout();
    }
    if(isset($_POST['campusselect']) AND isset($_POST['source'])){
        if($_POST['campusselect'] !=''){
            $campus = htmlspecialchars($_POST['campusselect']);
            $source = htmlspecialchars($_POST['source']);
            $functions->campusselect($campus,$source);
        }
    } 

    if(isset($_POST['feetype']) AND isset($_POST['feeamount']) AND isset($_POST['class']) ){
        $fee = htmlspecialchars($_POST['feetype']);
        $amount = htmlspecialchars($_POST['feeamount']);
        $class = htmlspecialchars($_POST['class']);
        $source = htmlspecialchars($_POST['source']);

        $functions->makefee($fee,$amount,$class,$source);

    }
    
    if(isset($_POST['makefeepayment'])){
    if(isset($_POST['payedto']) AND isset($_POST['studentid']) AND isset($_POST['feename']) AND isset($_POST['amountpayed'])){
        $this->payedto = htmlspecialchars($_POST['payedto']);
        $studentid = htmlspecialchars($_POST['studentid']);
        $feename = htmlspecialchars($_POST['feename']);
        $amountpayed = htmlspecialchars($_POST['amountpayed']);
        $source = htmlspecialchars($_POST['source']);

        $functions->makefeepaymentto($this->payedto,$studentid,$feename,$amountpayed,$source);

    }
    else{
        echo '<script>alert("please fill all field")</script>';

    }
    if(isset($_POST['attuniqe'])){
       echo $uniq = htmlspecialchars($_POST['attuniqe']);
        $time = time();
        $source = htmlspecialchars($_POST['source']);


        $functions->teachersattendance($uniq,$time,$source);

     
         
     }
    }

   



    $_post = file_get_contents('php://input');
    if($_post != null){
        $_post = json_decode($_post,true);
        if(isset($_post['campusselect']) AND isset($_post['classteachrsname'])){
            $this->campusselect = $_post['campusselect']; 
            $teacherid = $_post['classteachrsname'];
            $functions->teachearsdetails($this->campusselect,$teacherid);
        }
        if(isset($_post['studentcampus']) AND isset($_post['uniqe'])){
            $this->campusselect = $_post['studentcampus']; 
            $studentid = $_post['uniqe'];
            $functions->studentdetails($this->campusselect,$studentid);
        }
        if(isset($_post['campusselect']) AND isset($_post['classs'])  AND isset($_post['feename'])){

            $this->campusselect = $_post['campusselect']; 
            $feename = $_post['feename']; 
            $class = $_post['classs'];
            $functions->studentpaidfees($this->campusselect,$feename,$class);
           
        }
        if(isset($_post['studentcampus2']) AND isset($_post['uniqe2'])){
            $this->campusselect = $_post['studentcampus2']; 
            $studentid = $_post['uniqe2'];
            $functions->deletestudent($this->campusselect,$studentid);
        }

        if(isset($_post["updateamount"]) AND isset($_post['feename'])){
            $amount=htmlspecialchars($_post["updateamount"]);
            $name=htmlspecialchars($_post["feename"]);
            $time = time();
            $functions->updatefeeamount($amount,$name,$time);
   
             
         }
         if(isset($_post['date']) AND isset($_post['content'])){

            $date = htmlspecialchars($_post['date']);
            $content = htmlspecialchars($_post['content']);

            $functions->schoolcallenderevent($date,$content);
    
           
        }
        if(isset($_post['ddate']) AND isset($_post['dcontent'])){

            $date = htmlspecialchars($_post['ddate']);
            $content = htmlspecialchars($_post['dcontent']);
            $functions->deleteschoolcallenderevent($date,$content);
          
    
        }
        if(isset($_post['campusselect3']) AND isset($_post['classteachrsname3'])){

            $this->campusselect = $_post['campusselect3']; 
            $teacherid = $_post['classteachrsname3'];
            $date = date('Y-m');
            $functions->numberofattendance($date,$this->campusselect,$teacherid);

           }


       

         


    }

}