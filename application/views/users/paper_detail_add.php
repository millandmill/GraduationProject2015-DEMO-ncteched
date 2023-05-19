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
		                            <i class="fa fa-cubes glyphicon glyphicon-file"></i>&nbsp;ส่งบทความ
		                        </div>
		                    </div>
		                    <div class="clearfix"></div>
		                </div>
		                <div class="panel-body">
		                  	<div class="row">
			                    <div class="col-md-12"> 
			                        <form method="POST" name="form_authen" action="commeettee_detail_add" enctype="multipart/form-data">
			                                <ul class="nav nav-tabs">
                                                                <li class="active"><a data-toggle="tab" href="#menu1"><h6>ชื่อผลงานวิจัย</h6></a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div id="menu1" class="tab-pane fade in active">
                                                                <div class="form-addproduct">
                                                                    <input type="hidden" name="commeettee_id" value="<?php if(isset($resultData[0]['commeettee_id'])){ echo $resultData[0]['commeettee_id']; } ?>"/>
                                                                    <span class="font12 thsarabunnew">ภาษาไทย</span>
                                                                    <input  data-validation="required" 
                                                                            data-validation-error-msg-required="กรุณาใส่ชื่องานวิจัยภาษาไทย"
                                                                            class="form-control thsarabunnew" type="text" name="name" value="<?php if(isset($resultData[0]['commeettee_fname'])){ echo $resultData[0]['commeettee_fname']; } ?>" maxlength="250"/><br/>
                                                                    <span class="font12 thsarabunnew">ภาษาอังกฤษ</span>
                                                                    <input data-validation="required" 
                                                                           data-validation-error-msg-required="กรุณาใส่ชื่องานวิจัยภาษาอังกฤษ"
                                                                           class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/><br/>
                                                                    <span class="font12 thsarabunnew">สาขางานที่นำเสนอ</span><br/>
                                                                    <select 
                                                                              class="thsarabunnew" name="sltprovince" class="slt">
                                                                        <option class="thsarabunnew" value="">----- เลือกสาขา -----</option>
                                                                        <?php foreach ($forProvince as $key => $value) { ?>
                                                                            <option value="<?php echo $forProvince[$key]['province_name']; ?>" <?php if(isset($resultData[0]['commeettee_province'])){ if($resultData[0]['commeettee_province'] == $forProvince[$key]['province_name']){ echo "selected"; } } ?>><?php echo $forProvince[$key]['province_name']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>	                
                                                            </div>
                                                        </div>
                                                            <ul class="nav nav-tabs">
                                                                <li class="active"><a data-toggle="tab" href="#menu2"><h6>ชื่อผู้ส่ง ชื่อผู้นำเสนอ ชื่อเจ้าของผลงาน</h6></a></li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div id="menu2" class="tab-pane fade in active">
                                                                    <div class="form-addproduct">
                                                                        <span class="font12 thsarabunnew">ชื่อเจ้าของผลงาน</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="name" value="<?php if(isset($resultData[0]['commeettee_fname'])){ echo $resultData[0]['commeettee_fname']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">อีเมล์</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">เบอร์โทร</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">ที่อยู่</span>
                                                                        <textarea rows="5" class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/></textarea><br/>                                                                    
                                                                        <span class="font12 thsarabunnew">ชื่อร่วมส่งงานวิจัยคนที่ 1</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="name" value="<?php if(isset($resultData[0]['commeettee_fname'])){ echo $resultData[0]['commeettee_fname']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">อีเมล์</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">เบอร์โทร</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">ที่อยู่</span>
                                                                        <textarea rows="5" class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/></textarea><br/>
                                                                        <span class="font12 thsarabunnew">ชื่อร่วมส่งงานวิจัยคนที่ 2</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="name" value="<?php if(isset($resultData[0]['commeettee_fname'])){ echo $resultData[0]['commeettee_fname']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">อีเมล์</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">เบอร์โทร</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">ที่อยู่</span>
                                                                        <textarea rows="5" class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/></textarea><br/>  
                                                                        <span class="font12 thsarabunnew">ชื่อร่วมส่งงานวิจัยคนที่ 3</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="name" value="<?php if(isset($resultData[0]['commeettee_fname'])){ echo $resultData[0]['commeettee_fname']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">อีเมล์</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">เบอร์โทร</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">ที่อยู่</span>
                                                                        <textarea rows="5" class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/></textarea>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <ul class="nav nav-tabs">
                                                                <li class="active"><a data-toggle="tab" href="#menu3"><h6>คำสำคัญ</h6></a></li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div id="menu3" class="tab-pane fade in active">
                                                                    <div class="form-addproduct">
                                                                        <span class="font12 thsarabunnew">ภาษาไทย</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="name" value="<?php if(isset($resultData[0]['commeettee_fname'])){ echo $resultData[0]['commeettee_fname']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">ภาษาอังกฤษ</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="commeettee_type_id" value="<?php if(isset($resultData[0]['commeettee_type_id'])){ echo $resultData[0]['commeettee_type_id']; } ?>" maxlength="250"/><br/> 
                                                                        <center><input type="submit" value="บันทึก" class="bt-submit thsarabunnew" name="btn_submit"/>
								        <input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" /> 
                                                                        <input type="reset" value="ย้อนกลับ" class="bt-reset thsarabunnew" name="btn_back" /></center>
                                                                    </div>
                                                                </div>
                                                            </div>
								    
                                            </div>
                                        </div>
                                    </div>
                                </div>                     
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