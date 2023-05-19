<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    if(isset($commeettee_edit)){
        $resultData = $commeettee_edit;  
    }
?>

            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;คณะกรรมการ
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12"> 
                                <form method="POST" name="form_authen" action="commeettee_add">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><input type="hidden" name="user_id" value="<?php if(isset($resultData[0]['user_id'])){ echo $resultData[0]['user_id']; } ?>"/></li>
                                            <li><span class="font12 thsarabunnew">ชื่อผู้ใช้ที่ใช้เข้าสู่ระบบ (เป็นภาษาอังกฤษ)</span></li>
                                            <li><input  data-validation="required" 
                                                        data-validation-error-msg-required="กรุณาใส่ชื่อผู้ใช้ และควรเป็นภาษาอังกฤษ"
                                                        class="form-control thsarabunnew" type="text" name="username" value="<?php if(isset($resultData[0]['username'])){ echo $resultData[0]['username']; } ?>"/></li><br/>
                                            <li><span class="font12 thsarabunnew">ชื่อ - นามสกุล ของผู้ใช้</span></li>
                                            <li><input  data-validation="required" 
                                                        data-validation-error-msg-required="กรุณาใส่ชื่อ - นามสกุล"
                                                        class="form-control thsarabunnew" type="text" name="commeettee_fname" value="<?php if(isset($resultData[0]['commeettee_fname'])){ echo $resultData[0]['commeettee_fname']; } ?>"/></li><br/>              
                                            <li><span class="font12 thsarabunnew">E-mail</span></li>
                                            <li><input  data-validation="email" 
                                                    data-validation-error-msg-email="กรุณาใส่ email ของผู้ใช้ให้ถูกต้อง"
                                                    class="form-control thsarabunnew" type="text" name="email" value="<?php if(isset($resultData[0]['email'])){ echo $resultData[0]['email']; } ?>"/></li><br/>
                                            <?php if(validation_errors() != ''){ ?>
                                                <div class="alert alert-danger">
                                                    <span class="font12"><?php echo validation_errors(); ?></span>
                                                </div>
                                            <?php } ?>
                                            <li><input type="submit" value="เพิ่ม/แก้ไข"  class="bt-submit thsarabunnew" name="btn_submit"/>
                                                <input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../commeettee/commeettee_all'"/> 
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                          </div><!-- class = row -->
                        </div>
                    </div>
                </div><!-- end content -->
            </div><!-- end col-xs-12 -->
        </div>
    </div>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.20/jquery.form-validator.min.js"></script>
<script>

  $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
    }
  });

  // Restrict presentation length
  $('#presentation').restrictLength( $('#pres-max-length') );
          

</script>
<script>
  $.validate({
    lang: 'en'
  });
</script>