<!--<--link rel="stylesheet" href="css/fonts/thsarabunnew.css" />-->
<!--


-->


<style>
.login-page {
  width: 300px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}

</style>

 <div class="login-page text-center">
     
  <div class="form">
      <div class="font16">ลงทะเบียน<br/>ผู้ส่งบทความวิจัย</div><br/>
    <form class="login-form" method="POST" name="form_authen" action="register_chk">
        
      <input style="font-family: 'THSarabunNew', sans-serif;"  
             data-validation="required" 
             data-validation-error-msg-required="กรุณาใส่ username"
             type="text" placeholder="username" name="username" maxlength="13" value="<?php echo set_value('username')?>" />
      <input style="font-family: 'THSarabunNew', sans-serif;" type="password" placeholder="password" name="password" />
      <input style="font-family: 'THSarabunNew', sans-serif;" type="text" placeholder="E-mail" name="email" value="<?php echo set_value('email')?>" />
      <?php if(validation_errors() != ''){ ?>             
            <div class="alert alert-danger thsarabunnew">
                <span class="font12 thsarabunnew"><?php echo validation_errors(); ?></span>
            </div>
      <?php } ?> 
      ภาพยืนยันความปลอดภัย
      <!--<div  class="g-recaptcha" data-theme="light" data-sitekey="6Ld9lyYTAAAAAKTbiY9CCQ0_GjxDeUNave6pfEOn" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
      -->
      <img id="captcha" src="<?php echo base_url().'public/lib/';?>securimage/securimage_show.php" alt="CAPTCHA Image" />
      <input type="text" name="captcha_code" size="10" maxlength="6" placeholder="กรอกผลลัพธ์"/>
      <a href="#" onclick="document.getElementById('captcha').src = '<?php echo base_url().'public/lib/';?>securimage/securimage_show.php?' + Math.random(); return false">[ เปลี่ยนภาพใหม่ ]</a><br/><br/>
      <?php
        
      ?>
      
      <button style="font-family: 'THSarabunNew', sans-serif;" name="btn_submit" value="สมัคร">สมัคร</button><br/><br/>
      <button style="font-family: 'THSarabunNew', sans-serif;" name="btn_back" value="login">กลับ</button>

    </form>
  </div>
    <span class="grey thsarabunnew">Copyright 2015 © <br/>Powered by NCTECHED KMUTNB</span>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.23/jquery.form-validator.min.js"></script>
<script>
  $.validate({
    lang: 'en',
    onError : function() {
      alert('Validation of form '+$form.attr('id')+' failed!');
    }
  });
  
</script>

