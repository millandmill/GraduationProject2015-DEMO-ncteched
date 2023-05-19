<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    if(isset($index_paper_file_edit)){
        $resultData = $index_paper_file_edit;
    } 
?>

            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;สารบัญงานวิจัยที่ได้รับการตีพิมพ์
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12"> 
                                <form id="pickDateForm" method="POST" name="form_authen" action="index_paper_file_add" enctype="multipart/form-data">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><input type="hidden" name="index_paper_file_id" value="<?php if(isset($resultData[0]['index_paper_file_id'])){ echo $resultData[0]['index_paper_file_id']; } ?>"/></li>
                                            <li><span class="font12 thsarabunnew">รหัสหมายเลขงานวิจัย</span></li>
                                            <li><input data-validation="required" data-validation-error-msg-required="กรุณาใส่รหัสหมายเลขงานวิจัย"  class="form-control thsarabunnew" type="text" name="index_paper_file_key" value="<?php if(isset($resultData[0]['index_paper_file_key'])){ echo $resultData[0]['index_paper_file_key']; } ?>"/></li>
                                            <li><span class="font12 thsarabunnew">ชื่องานวิจัย</span></li>
                                            <li><input data-validation="required" data-validation-error-msg-required="กรุณาใส่ชื่องานวิจัย"  class="form-control thsarabunnew" type="text" name="index_paper_file_name" value="<?php if(isset($resultData[0]['index_paper_file_name'])){ echo $resultData[0]['index_paper_file_name']; } ?>"/></li>
                                            
                                            <li class="text-left thsarabunnew"><span class="font12">สาขา</span></li>
                                                <li>
                                                    <select  data-validation="required" 
                                                             data-validation-error-msg-required="กรุณาเลือก สาขา"
                                                             class="thsarabunnew" name="index_paper_file_department_name" class="slt">
                                                        <option class="thsarabunnew" value="">----- กรุณาเลือก -----</option>
                                                        <?php foreach ($forDepartment as $key => $value) { ?>
                                                                <option value="<?php echo $forDepartment[$key]['department_name']; ?>" <?php if(isset($resultData[0]['index_paper_file_department_name'])){ if($resultData[0]['index_paper_file_department_name'] == $forDepartment[$key]['department_name']){ echo "selected"; } } ?>><?php echo $forDepartment[$key]['department_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
					    </li><br/>
    
                                            <li><span class="font12 thsarabunnew">ชื่อผู้แต่งหรือผู้ร่วมแต่ง</span></li>
                                            <li><input data-validation="required" data-validation-error-msg-required="กรุณาใส่ชื่อผู้แต่งหรือผู้ร่วมแต่ง"  class="form-control thsarabunnew" type="text" name="index_paper_file_author" value="<?php if(isset($resultData[0]['index_paper_file_author'])){ echo $resultData[0]['index_paper_file_author']; } ?>"/></li>
                                            <li><span class="font12 thsarabunnew">ปี</span></li>
                                            <li>
                                                <select  data-validation="required" 
                                                         data-validation-error-msg-required="กรุณาเลือกปี"
                                                         style="font-family: 'THSarabunNew', sans-serif; image{ right: 8px;} 	background-position: center; " id="select_type" name="index_paper_file_year" class="slt">
                                                    <option class="thsarabunnew" value="">----- กรุณาเลือกปี -----</option>
                                                    <?php
                                                    $yearmin15 = date("Y")-15;
                                                    $thisyear = date("Y")+10;
                                                    
                                                    for ($x = $thisyear; $x > $yearmin15; $x--) { 
                                                        if(isset($resultData[0]['index_paper_file_year'])){
                                                            if($resultData[0]['index_paper_file_year'] != $thisyear){
                                                               echo '<option class="thsarabunnew" value="'.$thisyear.'">'.$thisyear.'</option>';
                                                            }
                                                            if($resultData[0]['index_paper_file_year'] == $thisyear){
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
                                            <li><input data-validation="number required" data-validation-error-msg="กรุณาใส่ครั้งที่เป็นตัวเลข"  maxlength="3" class="form-control thsarabunnew" type="text" name="index_paper_file_no" value="<?php if(isset($resultData[0]['index_paper_file_no'])){ echo $resultData[0]['index_paper_file_no']; } ?>"/></li><br/>
                                            <li><span class="font12 thsarabunnew">หน้าที่</span></li>
                                            <li><input data-validation="required" data-validation-error-msg="กรุณาใส่หน้าที่ ได้ทั้งตัวเลขและตัวอักษร"  maxlength="15" class="form-control thsarabunnew" type="text" name="index_paper_file_page" value="<?php if(isset($resultData[0]['index_paper_file_page'])){ echo $resultData[0]['index_paper_file_page']; } ?>"/></li><br/>
                                            
                                            
      
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
    
    
