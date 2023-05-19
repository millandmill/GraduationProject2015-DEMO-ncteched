<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    if(isset($file_manual_edit)){
        
        $resultData = $file_manual_edit;
    } 
?>

            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;กำหนดไฟล์คู่มือการใช้งาน
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12"> 
                                <form id="pickDateForm" method="POST" name="form_authen" action="manual_file_add" enctype="multipart/form-data">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><input type="hidden" name="file_manual_id" value="<?php if(isset($resultData[0]['file_manual_id'])){ echo $resultData[0]['file_manual_id']; } ?>"/></li>
                                            <li><span class="font12 thsarabunnew">ประเภท : <?php if(isset($resultData[0]['file_manual_type'])){ echo $resultData[0]['file_manual_type']; } ?></span></li><br/>

                                            <li><span class="font12 thsarabunnew">อัฟโหลดไฟล์คู่มือ</span></li>
                                            <li><input 
                                                      data-validation="mime required"
                                                      data-validation-allowing="doc , docx , pdf" 
                                                      data-validation-error-msg-mime="อนุญาติให้อัฟโหลดเฉพาะไฟล์สกุล doc , docx และ pdf" 
                                                      data-validation-error-msg-required="กรุณาเลือกไฟล์ที่ต้องการทำเป็นคู่มือของ<?php if(isset($resultData[0]['file_manual_type'])){ echo $resultData[0]['file_manual_type']; } ?>"
                                                      type="file" name="file_manual_name" value="<?php if(isset($resultData[0]['file_manual_name'])){ echo $resultData[0]['file_manual_name']; } ?>"/>
                                            </li><br/>
                                            <li><span class="font12 thsarabunnew">รายละเอียด</span></li>
                                            <li><input class="form-control thsarabunnew" type="text" name="file_manual_note" value="<?php if(isset($resultData[0]['file_manual_note'])){ echo $resultData[0]['file_manual_note']; } ?>"/></li><br/>

                                            <?php if(validation_errors() != ''){ ?>
                                                <div class="alert alert-danger">
                                                    <span class="font12"><?php echo validation_errors(); ?></span>
                                                </div>
                                            <?php } ?>
                                            <li><input type="submit" value="แก้ไข"  class="bt-submit thsarabunnew" name="btn_submit"/>
                                                <input type="reset" value="กลับ" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../manual_file/manual_file_all'"/> 
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
    
    
