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
    
    if(isset($time_cycle_paper_edit)){
        $resultData = $time_cycle_paper_edit;
    } 
?>

<script>
$(document).ready(function() {

    $('#date_start').pickadate({
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
    }); 
    $('#date_end').pickadate({
        
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
    });


    var from_$input = $('#date_start').pickadate(),
        from_picker = from_$input.pickadate('picker');

    var to_$input = $('#date_end').pickadate(),
        to_picker = to_$input.pickadate('picker');


    // Check if there’s a “from” or “to” date to start with.
    if ( from_picker.get('value') ) {
      to_picker.set('min', from_picker.get('select'));
    }
    if ( to_picker.get('value') ) {
      from_picker.set('max', to_picker.get('select'));
    }

    // When something is selected, update the “from” and “to” limits.
    from_picker.on('set', function(event) {
      if ( event.select ) {
        to_picker.set('min', from_picker.get('select'));    
      }
      else if ( 'clear' in event ) {
        to_picker.set('min', false);
      }
    });
    to_picker.on('set', function(event) {
      if ( event.select ) {
        from_picker.set('max', to_picker.get('select'));
      }
      else if ( 'clear' in event ) {
        from_picker.set('max', false);
      }
    });
});
</script>


            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;วันเวลาการเข้าใช้งาน
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">                  
                                <form id="pickDateForm" method="POST" name="form_authen" action="cycle_time_paper_edit">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><input type="hidden" name="time_cycle_paper_id" value="<?php if(isset($resultData[0]['time_cycle_paper_id'])){ echo $resultData[0]['time_cycle_paper_id']; } ?>"/></li>

                                            <li><span class="font12 thsarabunnew">กิจกรรมที่ต้องการจัดการ</span></li>
                                            
                                            <!--
                                            <li><input type="radio"  name="time_cycle_paper_name" class="thsarabunnew" value="วันแรกของการเปิดรับผลงานวิจัย" checked<?php if(isset($resultData[0]['time_cycle_paper_name'])){ if($resultData[0]['time_cycle_paper_name'] == 'วันแรกของการเปิดรับผลงานวิจัย'){ echo ''; }} ?>><span class="thsarabunnew"> วันแรกของการเปิดรับผลงานวิจัย</span></li>
                                            <li><input type="radio"  name="time_cycle_paper_name" class="thsarabunnew" value="วันสุดท้ายของการรับผลงานวิจัยฉบับเต็ม" <?php if(isset($resultData[0]['time_cycle_paper_name'])){ if($resultData[0]['time_cycle_paper_name'] == 'วันสุดท้ายของการรับผลงานวิจัยฉบับเต็ม'){ echo 'checked'; }} ?>><span class="thsarabunnew"> วันสุดท้ายของการรับผลงานวิจัยฉบับเต็ม</span></li>
                                            <li><input type="radio"  name="time_cycle_paper_name" class="thsarabunnew" value="แจ้งผลการพิจารณาผลงานวิจัยฉบับเต็ม" <?php if(isset($resultData[0]['time_cycle_paper_name'])){ if($resultData[0]['time_cycle_paper_name'] == 'แจ้งผลการพิจารณาผลงานวิจัยฉบับเต็ม'){ echo 'checked'; }} ?>><span class="thsarabunnew"> แจ้งผลการพิจารณาผลงานวิจัยฉบับเต็ม</span></li>
                                            <li><input type="radio" id="def" name="time_cycle_paper_name" class="thsarabunnew" value="ส่งผลงานวิจัยฉบับสมบูรณ์"  <?php if(isset($resultData[0]['time_cycle_paper_name'])){ if($resultData[0]['time_cycle_paper_name'] == 'ส่งผลงานวิจัยฉบับสมบูรณ์'){ echo 'checked'; }} ?>><span class="thsarabunnew"> ส่งผลงานวิจัยฉบับสมบูรณ์</span></li>
                                            
                                            -->
                                            
                                            <?php 
                                                    if(isset($resultData[0]['time_cycle_paper_name'])){ 
                                                        if($resultData[0]['time_cycle_paper_name'] == 'วันแรกของการเปิดรับผลงานวิจัย'){ echo '<li><span class="font12 thsarabunnew"><b>วันแรกของการเปิดรับผลงานวิจัย</b></span></li>'; }
                                                        if($resultData[0]['time_cycle_paper_name'] == 'วันสุดท้ายของการรับผลงานวิจัยฉบับเต็ม'){ echo '<li><span class="font12 thsarabunnew"><b>วันสุดท้ายของการรับผลงานวิจัยฉบับเต็ม</b></span></li>'; }
                                                        if($resultData[0]['time_cycle_paper_name'] == 'แจ้งผลการพิจารณาผลงานวิจัยฉบับเต็ม'){ echo '<li><span class="font12 thsarabunnew"><b>แจ้งผลการพิจารณาผลงานวิจัยฉบับเต็ม</b></span></li>'; }
                                                        if($resultData[0]['time_cycle_paper_name'] == 'ส่งผลงานวิจัยฉบับสมบูรณ์'){ echo '<li><span class="font12 thsarabunnew"><b>ส่งผลงานวิจัยฉบับสมบูรณ์</b></span></li>'; }
                                                    } 
                                            ?>                         
                                            
                                            <br/>
                                            
                                            
                                            <li><span class="font12 thsarabunnew">วันที่เริ่ม</span></li>
                                            <input  data-validation="required" 
                                                    data-validation-error-msg-required="กรุณาเลือกวันที่เริ่ม"
                                                    type="text" class="font12 thsarabunnew" name="time_cycle_paper_date_start" id="date_start" value="<?php if(isset($resultData[0]['time_cycle_paper_date_start'])){ echo $resultData[0]['time_cycle_paper_date_start']; } ?>"/>
                                           
                                            <li><span class="font12 thsarabunnew">วันที่สิ้นสุด</span></li>
                                            <input data-validation="required" 
                                                   data-validation-error-msg-required="กรุณาเลือกวันที่สิ้นสุด"
                                                   type="text" class="font12 thsarabunnew" name="time_cycle_paper_date_end" id="date_end" value="<?php if(isset($resultData[0]['time_cycle_paper_date_end'])){ echo $resultData[0]['time_cycle_paper_date_end']; } ?>"/>
                                           
                                            <li><span class="font12 thsarabunnew">สถานะ</span></li>
                                            <li>
                                                <select  data-validation="required" 
                                                         data-validation-error-msg-required="กรุณาเลือกสถานะ"
                                                         style="font-family: 'THSarabunNew', sans-serif;" id="select_type" name="time_cycle_paper_status" class="slt" onchange="chk_count()">
                                                    <option class="thsarabunnew" value="">----- กรุณาเลือก -----</option>
                                                    <option class="thsarabunnew" value="YES" <?php if(isset($resultData[0]['time_cycle_paper_status'])){ if($resultData[0]['time_cycle_paper_status'] == 'YES'){ echo 'selected'; }} ?>>YES</option>
                                                    <option class="thsarabunnew" value="NO" <?php if(isset($resultData[0]['time_cycle_paper_status'])){ if($resultData[0]['time_cycle_paper_status'] == 'NO'){ echo 'selected'; }} ?>>NO</option>
                                                </select>
                                            </li><br/>
                                            
                                            <?php if(validation_errors() != ''){ ?>
                                                <div class="alert alert-danger">
                                                    <span class="font12"><?php echo validation_errors(); ?></span>
                                                </div>
                                            <?php } ?>
                                            <li><input type="submit" value="เพิ่ม / แก้ไข"  class="bt-submit thsarabunnew" name="btn_submit"/>
                                                <br/><br/>
                                                <input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../time/cycle_time_paper'"/> 
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
    
    
    
