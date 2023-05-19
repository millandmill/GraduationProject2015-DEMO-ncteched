<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    if(isset($header_edit)){
        $resultData = $header_edit;
    } 
?>

            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;กำหนดรูปสำหรับ Header
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12"> 
                                <form id="pickDateForm" method="POST" name="form_authen" action="header_add" enctype="multipart/form-data">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><input type="hidden" name="header_id" value="<?php if(isset($resultData[0]['header_id'])){ echo $resultData[0]['header_id']; } ?>"/></li>
                                            
                                            <?php
                                                $this->db->select('*');
                                                $this->db->where('header_status','YES' )->where('header_id',($resultData[0]['header_id']));
                                                $q = $this->db->get('header');
                                                $data = array_shift($q->result_array());
                                                $pic = $data['header_pic'];                                
                                                $pic_src="";
                                                if($pic!=""){
                                                    echo '<li><span class="font12 thsarabunnew">รูปที่มีอยู่เดิม</span></li>';
                                                    $pic_src=base_url().'uploads/pic-header/'.$pic;  
                                                }  else {
                                                    echo '<li><span class="font12 thsarabunnew">กรุณาเลือกรูป</span></li>';
                                                    $pic_src="#";
                                                }  
                                            ?>    
                                            <li><img src="<?php echo $pic_src; ?>" alt="no image" width="120px" height="120px"/></li><br/>
                                            <?php
                                            if($pic!=""){
                                                            echo '<li><span class="font12 thsarabunnew">รูปใหม่</span></li>';
                                                            echo '<li><img id="img_company" src="#" alt="no image" width="120px" height="120px"/></li><br/>'; 
                                                        }
                                            ?>
                                            <li><input 
                                                      data-validation="mime  <?php if(isset($resultData[0]['header_pic'])){ echo ""; }else { echo "required";} ?>"
                                                      data-validation-allowing="jpg, png" 
                                                      data-validation-error-msg-mime="อนุญาติให้อัฟโหลดเฉพาะไฟล์สกุล jpg และ png" 
                                                      data-validation-error-msg-required="กรุณาเลือกรูปที่ต้องการทำเป็น Header"
                                                      type="file" name="image" accept="image/*" value="<?php if(isset($resultData[0]['header_pic'])){ echo $resultData[0]['header_pic']; } ?>" onchange="previewImg(this);"/>
                                            </li><br/>
                                            <?php
                                            if($pic!=""){
                                                echo '<li><span class="font10 thsarabunnew"><b style="color: red">***ก่อนกดปุ่ม เพิ่ม / แก้ไข กรุณาเลือกรูปก่อน***</span></b></li>';
                                            }
                                            ?>
                                            <li><span class="font12 thsarabunnew">URL</span></li>
                                            <li><input data-validation="url" data-validation-error-msg="กรุณาใส่ URL เต็ม เช่น http://google.com" class="form-control thsarabunnew" type="text" name="header_url" value="<?php if(isset($resultData[0]['header_url'])){ echo $resultData[0]['header_url']; } ?>"/></li><br/>
                                            <li><span class="font12 thsarabunnew">สถานะให้แสดงหน้าเว็บไหม</span></li>
                                            <li>
                                                <select  data-validation="required" 
                                                         data-validation-error-msg-required="กรุณาเลือกสถานะการแสดงหน้าเว็บ"
                                                         style="font-family: 'THSarabunNew', sans-serif; image{ right: 8px;} 	background-position: center; " id="select_type" name="header_status" class="slt" onchange="chk_count()">
                                                    <option class="thsarabunnew" value="">----- กรุณาเลือก -----</option>
                                                    <option class="thsarabunnew" value="YES" <?php if(isset($resultData[0]['header_status'])){ if($resultData[0]['header_status'] == 'YES'){ echo 'selected'; }} ?>>YES</option>
                                                    <option class="thsarabunnew" value="NO" <?php if(isset($resultData[0]['header_status'])){ if($resultData[0]['header_status'] == 'NO'){ echo 'selected'; }} ?>>NO</option>
                                                </select>
                                            </li><br/>
      
                                            <?php if(validation_errors() != ''){ ?>
                                                <div class="alert alert-danger">
                                                    <span class="font12"><?php echo validation_errors(); ?></span>
                                                </div>
                                            <?php } ?>
                                            <li><input type="submit" value="เพิ่ม / แก้ไข"  class="bt-submit thsarabunnew" name="btn_submit"/>
                                                <input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../front/header'""/> 
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
    
    
