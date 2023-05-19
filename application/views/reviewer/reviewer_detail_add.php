<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
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
		                            <i class="fa fa-cubes"></i>&nbsp;ข้อมูลส่วนตัว
		                        </div>
		                    </div>
		                    <div class="clearfix"></div>
		                </div>
		                <div class="panel-body" style="overflow: hidden;">
		                  	<div class="row">
			                    <div class="col-md-12"> 
			                        <form method="POST" name="form_authen" action="reviewer_detail_add" enctype="multipart/form-data">
			                            <div class="form-addproduct" style="margin:0;">
			                                <ul>
                                                            <li><span class="font12 thsarabunnew"><i>ต้องกรอก <b style="color:red;"> *</b></i></span></li><br/>
			                                	<li><input type="hidden" name="commeettee_id" value="<?php if(isset($resultData[0]['commeettee_id'])){ echo $resultData[0]['commeettee_id']; } ?>"/></li>
								                <li><span class="font12 thsarabunnew">ชื่อ-นามสกุล</span><b style="color:red;"> *</b></li>
								                <li><input data-validation="required" 
                                                                                           data-validation-error-msg-required="กรุณาใส่ชื่อนามสกุล"
                                                                                           class="form-control thsarabunnew" type="text" name="name" value="<?php if(isset($resultData[0]['commeettee_fname'])){ echo $resultData[0]['commeettee_fname']; } ?>" maxlength="250"/></li><br/>
                                                                                <li><span class="font12 thsarabunnew">ฝ่าย</span><b style="color:red;"> *</b></li>
								                <li>
								                    <select  data-validation="required" 
                                                                                             data-validation-error-msg-required="กรุณาเลือกฝ่าย"
                                                                                             class="thsarabunnew" name="commeettee_type_name" class="slt">
								                        <option class="thsarabunnew" value="">----- กรุณาเลือก -----</option>
								                        <?php foreach ($forCommeettee_type as $key => $value) { ?>
								                        	<option value="<?php echo $forCommeettee_type[$key]['commeettee_type_name']; ?>" <?php if(isset($resultData[0]['commeettee_type_name'])){ if($resultData[0]['commeettee_type_name'] == $forCommeettee_type[$key]['commeettee_type_name']){ echo "selected"; } } ?>><?php echo $forCommeettee_type[$key]['commeettee_type_name']; ?></option>
								                        <?php } ?>
								                    </select>
								                </li><br/>
                                                                                <li><span class="font12 thsarabunnew">ที่อยู่</span><b style="color:red;"> *</b></li>
								                <li><input  data-validation="required" 
                                                                                            data-validation-error-msg-required="กรุณาใส่ที่อยู่"
                                                                                            class="form-control thsarabunnew" type="text" name="address" value="<?php if(isset($resultData[0]['commeettee_address'])){ echo $resultData[0]['commeettee_address']; } ?>" maxlength="100"/></li><br/>
								                <li><span class="font12 thsarabunnew">อาคาร</span></li>
								                <li><input class="form-control thsarabunnew" type="text" name="building" value="<?php if(isset($resultData[0]['commeettee_building'])){ echo $resultData[0]['commeettee_building']; } ?>" maxlength="100"/></li><br/>
								                <li><span class="font12 thsarabunnew">ชั้น</span></li>
								                <li><input class="form-control thsarabunnew" type="text" name="floor" value="<?php if(isset($resultData[0]['commeettee_floor'])){ echo $resultData[0]['commeettee_floor']; } ?>" maxlength="100"/></li><br/>
								                <li><span class="font12 thsarabunnew">ถนน</span></li>
								                <li><input class="form-control thsarabunnew" type="text" name="road" value="<?php if(isset($resultData[0]['commeettee_road'])){ echo $resultData[0]['commeettee_road']; } ?>" maxlength="100"/></li><br/>
								                <li><span class="font12 thsarabunnew">ตำบล/แขวง</span><b style="color:red;"> *</b></li>
								                <li><input  data-validation="required" 
                                                                                            data-validation-error-msg-required="กรุณาใส่ตำบล/แขวง"
                                                                                            class="form-control thsarabunnew" type="text" name="district" value="<?php if(isset($resultData[0]['commeettee_district'])){ echo $resultData[0]['commeettee_district']; } ?>" maxlength="100"/></li><br/>
								                <li><span class="font12 thsarabunnew">เขต/อำเภอ</span><b style="color:red;"> *</b></li>
								                <li><input data-validation="required" 
                                                                                           data-validation-error-msg-required="กรุณาใส่เขต/อำเภอ"
                                                                                           class="form-control thsarabunnew" type="text" name="county" value="<?php if(isset($resultData[0]['commeettee_county'])){ echo $resultData[0]['commeettee_county']; } ?>" maxlength="100"/></li><br/>
								                <li class="text-left thsarabunnew"><span class="font12">จังหวัด</span><b style="color:red;"> *</b></li>
								                <li>
								                    <select   data-validation="required" 
                                                                                              data-validation-error-msg-required="กรุณาใส่จังหวัด"
                                                                                              class="thsarabunnew" name="sltprovince" class="slt">
								                        <option class="thsarabunnew" value="">----- กรุณาเลือก -----</option>
								                        <?php foreach ($forProvince as $key => $value) { ?>
								                        	<option value="<?php echo $forProvince[$key]['province_name']; ?>" <?php if(isset($resultData[0]['commeettee_province'])){ if($resultData[0]['commeettee_province'] == $forProvince[$key]['province_name']){ echo "selected"; } } ?>><?php echo $forProvince[$key]['province_name']; ?></option>
								                        <?php } ?>
								                    </select>
								                </li><br/>
								                <li><span class="font12 thsarabunnew">รหัสไปรษณีย์</span><b style="color:red;"> *</b></li>
								                <li><input data-validation="required number length" 
                                                                                           data-validation-length="min5"
                                                                                           data-validation-error-msg-length="กรุณาใส่รหัสไปรษณีย์เป็นตัวเลขความยาว 5 ตัว"
                                                                                           data-validation-error-msg-number="กรุณาใส่รหัสไปรษณีย์เป็นตัวเลข"
                                                                                           data-validation-error-msg-required="กรุณาใส่รหัสไปรษณีย์"
                                                                                           class="form-control thsarabunnew" type="text" name="zip" maxlength="5" onkeypress="return isNumber(event)" value="<?php if(isset($resultData[0]['commeettee_zip'])){ echo $resultData[0]['commeettee_zip']; } ?>" onkeypress="return isNumber(event)"/></li><br/>
								                <li><span class="font12 thsarabunnew">เบอร์โทรศัพท์บ้าน/มือถือ</span><b style="color:red;"> *</b></li>
								                <li><input  data-validation="required
                                                                                            data-validation-error-msg-required="กรุณาใส่หมายเลขโทรศัพท์ที่สามารถติดต่อกลับได้"
                                                                                            class="form-control thsarabunnew" type="text" name="tel" maxlength="10" onkeypress="return isNumber(event)" value="<?php if(isset($resultData[0]['commeettee_tel'])){ echo $resultData[0]['commeettee_tel']; } ?>"/></li><br/>
								                <li><span class="font12 thsarabunnew">เบอร์โทรศัพท์ที่ทำงาน/โทรสาร</span></li>
								                <li><input class="form-control thsarabunnew" type="text" name="fax" maxlength="16" value="<?php if(isset($resultData[0]['commeettee_fax'])){ echo $resultData[0]['commeettee_fax']; } ?>"/></li><br/>
								                <li><span class="font12 thsarabunnew">ความเชี่ยวชาญด้านวิชาการ</span></li>
								                <li>
								                    <?php foreach ($forDepartment as $key => $value) { ?>
                                                                                        <input type="checkbox" name="department[]" value="<?php echo $forDepartment[$key]['department_name']; ?>" <?php if(isset($resultData[0]['commeettee_department'])){ if(preg_match('/'.$forDepartment[$key]['department_name'].'/',$resultData[0]['commeettee_department'])){ echo "checked"; } } ?>><?php echo '<z class="font12 thsarabunnew"> '. $forDepartment[$key]['department_name'].'</z>';?><br/>
								                    <?php } ?>  
								                </li><br/>
                                                                                <!--<li><span class="font12 thsarabunnew">ภาพบุคลากร</span></li>
								                <li><img id="img_company" src="#" alt="no image" width="120px" height="120px"/></li><br/>
                                                                                <li><input  data-validation="mime size" 
                                                                                            data-validation-allowing="jpg, png" 
		                                                                            data-validation-max-size="10M"
                                                                                            data-validation-error-msg-allowing="อนุญาติให้อัฟภาพรูปบุคคลกรที่เป็นสกุลไฟล์ jpg และ png เท่านั้น"
                                                                                            data-validation-error-msg-max-size="อนุญาติให้อัฟภาพรูปบุคคลกรขนาดสูงสุดที่ 10 MB"
                                                                                            type="file" name="image" accept="image/*" value="<?php if(isset($resultData[0]['commeettee_pic'])){ echo $resultData[0]['commeettee_pic']; } ?>" onchange="previewImg(this);"/><li><br />
                                                                               	<li><div class="thsarabunnew" style="color: red;">***** รูปต้องมีขนาดไม่เกิน 2 MB *****</div></li>
                                                                                <li><div class="thsarabunnew" style="color: red;">***** กรุณาเลือกรูปก่อนกดปุ่มบันทึกมิฉะนั้นรูปจะกลับเป็นค่าดั้งเดิม *****</div></li>
								                <li><div class="h20"></div></li>-->
								                <?php if(validation_errors() != ''){ ?>
								                    <div class="alert alert-danger thsarabunnew">
								                        <span class="font12"><?php echo validation_errors(); ?></span>
								                    </div>
								                <?php } ?>
								                <li><input type="submit" value="บันทึก" class="bt-submit thsarabunnew" name="btn_submit"/>
								                    <input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../reviewer/reviewer_detail'"/> 
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
  
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
        
</body>
</html>