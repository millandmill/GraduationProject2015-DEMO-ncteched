<?php 
    //if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //echo $message. '<br>';
        //echo $email .'<br>';
        //echo $hash. '<br>';
        $host  = $_SERVER['HTTP_HOST'];
        //$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        //$uri = "/ncteched/";
        $extra = "/welcome/login";
            
        //echo $host."<br>";
        //echo $uri."<br>";
        //echo $result->user_id .'<br>';
        //echo $result->username .'<br>';
        //echo $result->password .'<br>';
        //echo $result->email .'<br>';
        //echo $result->hash .'<br>';
        echo "ขอขอบคุณที่สมัครสมาชิก กรุณาเข้าอีเมลที่ใช้สมัครเพื่อยืนยันบัญชีของคุณ หน้านี้จะถูกเปลี่ยนไปยังหน้าล๊อกอินในอีก 5 วินาที";
        header("refresh:5; http://$host$extra");
        ?>
    </body>
</html>
