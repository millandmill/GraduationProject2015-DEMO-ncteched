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
                                    <i class="fa fa-cubes"></i>&nbsp;ตั้งค่าการประชุมเป็นครั้งที่
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body" style="overflow: hidden;">
                          <div class="row">
                            <div class="col-md-12"> 
                                <form id="pickDateForm" method="POST" name="form_authen" action="conference_on" enctype="multipart/form-data">
                                    <div class="form-addproduct">
                                        <ul>        
                                            <li><input type="reset" value="เพิ่มครั้งที่" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../time/cycle_time_paper_add'""/></li><br/>
                                            <li><span class="font12 thsarabunnew">ครั้งที่</span></li>
                                            <li><select  data-validation="required number"
                                                        data-validation-error-msg-required="กรุณาใส่ครั้งที่ของงานประชุมวิชาการ"
                                                        data-validation-error-msg-number="กรุณาใส่ครั้งที่ของงานประชุมวิชาการ เป็นตัวเลขเท่านั้น"
                                                        class="form-control thsarabunnew" type="text" name="conferences_select_on" id="conferences_select_on" class="slt" onchange="run()">
                                                        <option class="thsarabunnew" value="">----- กรุณาเลือก -----</option>
                                                        <?php foreach ($forConference as $key => $value) { ?>
                                                                <option value="<?php echo $forConference[$key]['conferences_select_on']; ?>" <?php if($forConference[$key]['conferences_select_status'] == 1){ echo "selected";} ?>><?php echo $forConference[$key]['conferences_select_on']." (".$forConference[$key]['conferences_select_note'].")"; ?></option>
                                                        <?php } ?>
                                                </select>
                                             </li>
                                             <li><br/><center><input type="reset" value="แก้ไข Note ของครั้งที่นี้"class="thsarabunnew btn btn-primary" onclick="window.location.href='../front/conference_on_note?c_id='+value1"/></center></li>
                                                <br/>
                                                <br/>
                                            <li><input type="submit" value="เลือกครั้งที่นี้"  class="bt-submit thsarabunnew" name="btn_submit"/><li><br/>
                                            <li><input type="reset" value="กลับ" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../commeettee/commeettee_detail'"/></li>
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
<script> 
    var value1=null;
    var x = document.getElementById("conferences_select_on").selectedIndex

    if(value1===null)
    {
        value1 = document.getElementsByTagName("option")[x].value;
    }

    function run()
    {
        value1 = document.getElementById("conferences_select_on").value;
    }
</script>
    
    
