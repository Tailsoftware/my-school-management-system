<?php
include('../session.php');
include('../config.php');

if(isset($_POST['mpdf'])){
    pdf(
        $_POST['mpdf']
    );
  
}

