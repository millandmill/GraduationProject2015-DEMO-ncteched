<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    if(isset($file_schedule_edit)){
        
        $resultData = $file_schedule_edit;
    } 
?>

            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;กำหนดไฟล์ตารางการนำเสนอบทความ
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12"> 
                                <form id="pickDateForm" method="POST" name="form_authen" action="schedule_file_add" enctype="multipart/form-data">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><input type="hidden" name="file_schedule_id" value="<?php if(isset($resultData[0]['file_schedule_id'])){ echo $resultData[0]['file_schedule_id']; } ?>"/></li>
                                            
                                            <li><span class="font12 thsarabunnew">ไฟล์เอกสาร</span></li>
                                            <li><input 
                                                      data-validation="mime required"
                                                      data-validation-allowing="jpg, png, doc , docx , pdf" 
                                                      data-validation-error-msg-mime="อนุญาติให้อัฟโหลดเฉพาะไฟล์สกุล jpg, png, doc , docx และ pdf" 
                                                      data-validation-error-msg-required="กรุณาเลือกไฟล์ตารางการนำเสนอบทความ"
                                                      type="file" name="file_schedule_name" value="<?php if(isset($resultData[0]['file_schedule_name'])){ echo $resultData[0]['file_schedule_name']; } ?>"/>
                                            </li><br/>
                                            <li><span class="font12 thsarabunnew">ครั้งที่</span></li>
                                            <li><input data-validation="required number"
                                                       data-validation-error-msg-required="กรุณาใส่ครั้งที่ของงานประชุมวิชาการ"
                                                       data-validation-error-msg-number="กรุณาใส่ครั้งที่ของงานประชุมวิชาการ เป็นตัวเลขเท่านั้น"
                                                       class="form-control thsarabunnew" type="text" name="file_schedule_conferences_on" value="<?php if(isset($resultData[0]['file_schedule_conferences_on'])){ echo $resultData[0]['file_schedule_conferences_on']; } ?> " disabled/></li><br/>
                                            <li><span class="font12 thsarabunnew">รายละเอียด</span></li>
                                            <li><input class="form-control thsarabunnew" type="text" name="file_schedule_note" value="<?php if(isset($resultData[0]['file_schedule_note'])){ echo $resultData[0]['file_schedule_note']; } ?>"/></li><br/>
                                            
                                            
      
                                            <?php if(validation_errors() != ''){ ?>
                                                <div class="alert alert-danger">
                                                    <span class="font12"><?php echo validation_errors(); ?></span>
                                                </div>
                                            <?php } ?>
                                            <li><input type="submit" value="เพิ่ม / แก้ไข"  class="bt-submit thsarabunnew" name="btn_submit"/>
                                                <input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" /> 
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
    
    
