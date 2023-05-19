<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    if($_GET['c_id']==""){
        redirect('front/conference_on','refresh');
    }
    $this->db->select('*');
    $this->db->where('conferences_select_id',$_GET['c_id']);
    $q = $this->db->get('conferences_select_on');
    $data22 = $q->result_array();
                                            
?>
            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;แก้ไข Note การประชุมฯ ครั้งที่ <?php echo $data22[0]['conferences_select_on']; ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body" style="overflow: hidden;">
                          <div class="row">
                            <div class="col-md-12"> 
                                <form id="pickDateForm" method="POST" name="form_authen">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><span class="font12 thsarabunnew">note หมายเหตุ</span></li>
                                            <li><input data-validation="required" 
                                                       data-validation-error-msg-required="กรุณาใส่ชื่อนามสกุล"
                                                       class="form-control thsarabunnew" type="text" name="conferences_select_note"  maxlength="50" value="<?php if(isset($data22[0]['conferences_select_note'])){ echo $data22[0]['conferences_select_note']; } ?>"/></li>
                                            <br/><li><input type="submit" value="ตกลง"  class="bt-submit thsarabunnew" name="btn_submit"/><li><br/>
                                            <li><input type="reset" value="กลับ" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='conference_on'"/></li>
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
    
    

