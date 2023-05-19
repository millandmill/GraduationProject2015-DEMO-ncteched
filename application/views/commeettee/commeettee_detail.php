<?php 
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    if(isset($commeettee)){
        $resultData = $commeettee;
    }

?>
            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="glyphicon glyphicon-briefcase"></i></i>&nbsp;ข้อมูลส่วนตัว
                                </div>
                            </div>
                            <div class="pull-right">
                                <!-- START CONTROL BUTTON -->
                                    <?php if(!isset($resultData)){ ?>
                                    <button name="add" type="button" class="btn btn-success" onclick="location.href='<?php echo base_url(); ?>commeettee/commeettee_detail_add';">
                                        <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                        <span class="thsarabunnew">เพิ่มข้อมูลส่วนตัว</span>
                                    </button>
                                    <?php } ?>
                                    <?php if(isset($resultData)){ ?>
                                        <button name="add" type="button" class="btn btn-info" onclick="location.href='<?php echo base_url(); ?>commeettee/commeettee_detail_add?c_id=<?php echo $resultData[0]['commeettee_id']; ?>';">
                                            <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                            <span class="thsarabunnew">แก้ไขข้อมูลส่วนตัว</span>
                                        </button>
                                    <?php } ?>
                                <!-- END CONTROL BUTTON -->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <table class="table table-hover">
                                        
                                        <tr>
                                            <td class="thsarabunnew"><strong>ชื่อ-นามสกุล</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_fname'])){ echo $resultData[0]['commeettee_fname']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>ฝ่าย</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_type_name'])){ echo $resultData[0]['commeettee_type_name']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>ที่อยู่</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_address'])){ echo $resultData[0]['commeettee_address']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>อาคาร</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_building'])){ echo $resultData[0]['commeettee_building']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>ชั้น</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_floor'])){ echo $resultData[0]['commeettee_floor']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>ถนน</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_road'])){ echo $resultData[0]['commeettee_road']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>ตำบล/แขวง</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_district'])){ echo $resultData[0]['commeettee_district']; } ?></td>
    						            </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>เขต/อำเภอ</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_county'])){ echo $resultData[0]['commeettee_county']; } ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="thsarabunnew"><strong>จังหวัด</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_province'])){ echo $resultData[0]['commeettee_province']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>รหัสไปรษณีย์</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_zip'])){ echo $resultData[0]['commeettee_zip']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>เบอร์โทรศัพท์บ้าน/มือถือ</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_tel'])){ echo $resultData[0]['commeettee_tel']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>เบอร์โทรศัพท์ที่ทำงาน/โทรสาร</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_fax']) && $resultData[0]['commeettee_fax'] != 0){ echo $resultData[0]['commeettee_fax']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>E-mail</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['email'])){ echo $resultData[0]['email']; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>ความเชี่ยวชาญด้านวิชาการ</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($resultData[0]['commeettee_department'])){ echo $resultData[0]['commeettee_department']; } ?></td>
                                        </tr>
                                        <!--<tr>
                                            <td class="thsarabunnew"><strong>ภาพบุคลากร</strong></td>
                                            <td>
                                                <?php if(isset($resultData[0]['commeettee_pic']) && trim($resultData[0]['commeettee_pic'] != "")) { ?> 
                                                    <img border="0" width="120px" height="120px" src="<?php echo base_url('uploads/img/'.$resultData[0]['commeettee_pic'].'') ?>" >
                                                <?php }else { ?>
                                                    <img border="0" width="120px" height="120px" src="<?php echo base_url('uploads/img/default-image.jpg') ?>" >
                                                <?php } ?> 
                                            </td>
                                        </tr>-->
                                    </table>
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