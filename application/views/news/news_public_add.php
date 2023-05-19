<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/themes/default.css">
<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/themes/default.date.css">
<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/themes/default.time.css">

<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/tests/jquery.1.7.0.js"></script>
<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/picker.js"></script>
<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/picker.date.js"></script>
<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/legacy.js"></script>
<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/picker.time.js"></script>
<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/translations/th_TH.js"></script>

<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    if(isset($news_public_edit)){
        $resultData = $news_public_edit;
    } 
?>

<script>
$(document).ready(function() {
    $('#times').pickatime({
     formatSubmit: 'HH:i',
     format: 'HH:i',
     hiddenName: true         
    });
    $('#date').pickadate({
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
    });  
});
</script>


            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;ข่าวประกาศหน้าเว็บ
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">                  
                                <form id="pickDateForm" method="POST" name="form_authen" action="news_public_add">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><input type="hidden" name="news_public_id" value="<?php if(isset($resultData[0]['news_public_id'])){ echo $resultData[0]['news_public_id']; } ?>"/></li>
                                            <li><span class="font12 thsarabunnew">ชื่อเรื่อง</span></li>
                                            <li><input data-validation="required" 
                                                       data-validation-error-msg-required="กรุณาใส่ชื่อเรื่องข่าว"
                                                       class="form-control thsarabunnew" type="text" name="news_name" value="<?php if(isset($resultData[0]['news_name'])){ echo $resultData[0]['news_name']; } ?>"/></li>
                                            <li><span class="font12 thsarabunnew">รายละเอียด</span></li>
                                            <li><input data-validation="required" 
                                                       data-validation-error-msg-required="กรุณาใส่รายละเอียดข่าว"
                                                       class="form-control thsarabunnew" type="text" name="news_description" value="<?php if(isset($resultData[0]['news_description'])){ echo $resultData[0]['news_description']; } ?>"/></li><br/>
                                            <li><span class="font12 thsarabunnew">สถานะให้แสดงหน้าเว็บไหม</span></li>
                                            <li>
                                                <select data-validation="required" 
                                                        data-validation-error-msg-required="กรุณาเลือกสถานะการแสดงหน้าเว็บ"
                                                        style="font-family: 'THSarabunNew', sans-serif;" id="select_type" name="news_type_status" class="slt" onchange="chk_count()">
                                                    <option class="thsarabunnew" value="">----- กรุณาเลือก -----</option>
                                                    <option class="thsarabunnew" value="YES" <?php if(isset($resultData[0]['news_type_status'])){ if($resultData[0]['news_type_status'] == 'YES'){ echo 'selected'; }} ?>>YES</option>
                                                    <option class="thsarabunnew" value="NO" <?php if(isset($resultData[0]['news_type_status'])){ if($resultData[0]['news_type_status'] == 'NO'){ echo 'selected'; }} ?>>NO</option>
                                                </select>
                                            </li><br/>
                                            <li><span class="font12 thsarabunnew">ปี-เดือน-วัน</span></li>
                                            <input  data-validation="required" 
                                                    data-validation-error-msg-required="กรุณาเลือกปี-เดือน-วัน ของวันประกาศข่าวนี้"
                                                    type="text" class="font12 thsarabunnew" name="news_public_date" id="date" value="<?php if(isset($resultData[0]['news_public_date'])){ echo $resultData[0]['news_public_date']; } ?>"/>
                                            <li><span class="font12 thsarabunnew">เวลา</span></li>
                                            <input  data-validation="required" 
                                                    data-validation-error-msg-required="กรุณาเลือก เวลา ของประกาศข่าวนี้"
                                                    type="text" class="font12 thsarabunnew" name="news_public_times" id="times" value="<?php if(isset($resultData[0]['news_public_times'])){ echo $resultData[0]['news_public_times']; } ?>"/>

                                            
                                            <?php if(validation_errors() != ''){ ?>
                                                <div class="alert alert-danger">
                                                    <span class="font12"><?php echo validation_errors(); ?></span>
                                                </div>
                                            <?php } ?>
                                            <li><input type="submit" value="เพิ่ม / แก้ไข"  class="bt-submit thsarabunnew" name="btn_submit"/>
                                                <input type="reset" value="กลับ" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../news/news_public'"/> 
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
    
