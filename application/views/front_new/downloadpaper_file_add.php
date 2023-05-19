<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    if(isset($downloadpaper_file_edit)){
        $resultData = $downloadpaper_file_edit;
    } 
?>

            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;ผลงานวิจัยที่ผ่านมา(ตีพิมพ์เป็นเล่มรวม)
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12"> 
                                <form id="pickDateForm" method="POST" name="form_authen" action="downloadpaper_file_add" enctype="multipart/form-data">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><input type="hidden" name="downloadpaper_file_id" value="<?php if(isset($resultData[0]['downloadpaper_file_id'])){ echo $resultData[0]['downloadpaper_file_id']; } ?>"/></li>
                                            <li><span class="font12 thsarabunnew">ไฟล์เล่ม</span></li>
                                            <li><input 
                                                      data-validation="mime required"
                                                      data-validation-allowing="doc, docx, pdf" 
                                                      data-validation-error-msg-mime="อนุญาติให้อัฟโหลดเฉพาะไฟล์สกุล doc docx และ pdf" 
                                                      data-validation-error-msg-required="กรุณาเลือกไฟล์เล่มผลงานวิจัย"
                                                      type="file" name="downloadpaper_file_name" accept="paper_file_name/*" value="<?php if(isset($resultData[0]['downloadpaper_file_name'])){ echo $resultData[0]['downloadpaper_file_name']; } ?>"/>
                                            </li><br/>
                                            <li><span class="font12 thsarabunnew">ปี</span></li>
                                            
                                            <li>
                                                <select  data-validation="required" 
                                                         data-validation-error-msg-required="กรุณาเลือกปี"
                                                         style="font-family: 'THSarabunNew', sans-serif; image{ right: 8px;} 	background-position: center; " id="select_type" name="downloadpaper_file_year" class="slt">
                                                    <option class="thsarabunnew" value="">----- กรุณาเลือกปี -----</option>
                                                    <?php
                                                    $yearmin15 = date("Y")-15;
                                                    $thisyear = date("Y")+10;
                                                    
                                                    for ($x = $thisyear; $x > $yearmin15; $x--) { 
                                                        if(isset($resultData[0]['downloadpaper_file_year'])){
                                                            if($resultData[0]['downloadpaper_file_year'] != $thisyear){
                                                               echo '<option class="thsarabunnew" value="'.$thisyear.'">'.$thisyear.'</option>';
                                                            }
                                                            if($resultData[0]['downloadpaper_file_year'] == $thisyear){
                                                                     echo '<option class="thsarabunnew" selected value="'.$thisyear.'">'.$thisyear.'</option>';
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo '<option class="thsarabunnew" value="'.$thisyear.'">'.$thisyear.'</option>';
                                                        }
                                                        $thisyear--;
                                                    }  
                                                    ?>
                                                </select>
                                            </li><br/>
                                            <li><span class="font12 thsarabunnew">งานครั้งที่</span></li>
                                            <li><input data-validation="number" data-validation-error-msg="กรุณาใส่ครั้งที่เป็นตัวเลข"  maxlength="3" class="form-control thsarabunnew" type="text" name="downloadpaper_file_no" value="<?php if(isset($resultData[0]['downloadpaper_file_no'])){ echo $resultData[0]['downloadpaper_file_no']; } ?>"/></li><br/>
                                            
                                            
      
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
    
    
