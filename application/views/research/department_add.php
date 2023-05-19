<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    if(isset($department_edit)){
        $resultData = $department_edit;
    }

?>

            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;ประเภทงานวิจัย
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12"> 
                                <form method="POST" name="form_authen" action="department_add">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><input type="hidden" name="department_id" value="<?php if(isset($resultData[0]['department_id'])){ echo $resultData[0]['department_id']; } ?>"/></li>
                                            <li><span class="font12 thsarabunnew">ชื่อประเภทงานวิจัย</span></li>
                                            <li><input class="form-control thsarabunnew" type="text" name="department_name" value="<?php if(isset($resultData[0]['department_name'])){ echo $resultData[0]['department_name']; } ?>"/></li><br/>
                                            <li><span class="font12 thsarabunnew">อนุญาตไหม</span></li>
                                            <li>
                                                <select style="font-family: 'THSarabunNew', sans-serif;" id="select_type" name="department_status" class="slt" onchange="chk_count()">
                                                    <option class="thsarabunnew" value="">----- กรุณาเลือก -----</option>
                                                    <option class="thsarabunnew" value="YES" <?php if(isset($resultData[0]['department_status'])){ if($resultData[0]['department_status'] == 'YES'){ echo 'selected'; }} ?>>YES</option>
                                                    <option class="thsarabunnew" value="NO" <?php if(isset($resultData[0]['department_status'])){ if($resultData[0]['department_status'] == 'NO'){ echo 'selected'; }} ?>>NO</option>
                                                </select>
                                            </li><br/>
                                            <?php if(validation_errors() != ''){ ?>
                                                <div class="alert alert-danger">
                                                    <span class="font12"><?php echo validation_errors(); ?></span>
                                                </div>
                                            <?php } ?>
                                            <li><input type="submit" value="เพิ่ม/แก้ไข"  class="bt-submit thsarabunnew" name="btn_submit"/>
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
</body>
</html>