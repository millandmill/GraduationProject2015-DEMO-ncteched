<style>
    .center-table{
        text-align: center;
    }
</style>
<div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
    <div class="content">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="pull-left">
                    <div class="thsarabunnew " style="font-size:1.6em;margin-top:6px;">
                        <i class="fa fa-cubes"></i>&nbsp;แบบประเมินบทความวิจัย/วิชาการ เพื่อพิจารณาลงพิมพ์ใน NCTechEd Proceedings 
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">                  
                    
                        <div class="form-addproduct">
                            <ul>
                                
                                <div class="thsarabunnew"><p>1. ชื่อเรื่อง : <?php echo $paper_detail_name; ?></p></div>
                                <div class="thsarabunnew"><p>2. ชื่อเจ้าของผลงานหลัก : <?php if(isset($paper_detail_owner_name)){ echo $paper_detail_owner_name; } else { echo "<span style='color: red'>ยังไม่ได้เลือกผู้นิพนธ์ประสานงาน</span>";} ?></p></div>
                                <div class="thsarabunnew"><p>3. ชื่อผู้ตรวจงานวิจัย : <?php echo $commeettee_fname; ?></p></div>
                                <br/>
                                <div class="thsarabunnew"><p>4. การประเมินบทความ</p></div>
                                <input type="hidden" name="evaluation_id" value="<?php echo $evaluation_id; ?>" />
                                <table class="thsarabunnew table table-striped table-bordered">
                                        <tr>
                                                <th class="center-table">คำอธิบาย</th>
                                                <th class="center-table" colspan="7">คะแนน</th>
                                        </tr>
                                        <tr>
                                                <td>
                                                1) การจัดโครงสร้างของบทความ
                                                </td>
                                                <td class="center-table"><?php echo $number1; ?></td>
                                        </tr>
                                        <tr>
                                                <td>
                                                2) ความใหม่ของแนวคิด/ทฤษฎี/การประยุกต์
                                                </td>
                                                <td class="center-table"><?php echo $number2; ?></td>
                                        </tr>
                                        <tr>
                                                <td>
                                                3) ความชัดเจนของปัญหาและวัตถุประสงค์ของงาน
                                                </td>
                                                <td class="center-table"><?php echo $number3; ?></td>
                                        </tr>
                                        <tr>
                                                <td>
                                                4) ผลที่ได้การวิเคราะห์และสรุป
                                                </td>
                                                <td class="center-table"><?php echo $number4; ?></td>
                                        </tr>
                                        <tr>
                                                <td>
                                                5) ความสําคัญของาน
                                                </td>
                                                <td class="center-table"><?php echo $number5; ?></td>
                                        </tr>
                                        <tr>
                                                <td>
                                                6) ความถูกต้องของข้อมูล
                                                </td>
                                                <td class="center-table"><?php echo $number6; ?></td>
                                        </tr>
                                        <tr>
                                                <td>
                                                7) ความชัดเจนของบทความ
                                                </td>
                                                <td class="center-table"><?php echo $number7; ?></td>
                                        </tr>
                                        <tr>
                                                <td>
                                                8) ความยาวของบทความ
                                                </td>
                                                <td class="center-table"><?php echo $number8; ?></td>
                                        </tr>
                                        <tr>
                                                <td>
                                                9) การอ้างอิงงานวิจัย วรรณกรรมและทฤษฏีที่เกี่ยวข้อง
                                                </td>
                                                <td class="center-table"><?php echo $number9; ?></td>
                                        </tr>
                                        <tr>
                                                <td>
                                                10)ความใหม่และจํานวนของเอกสารอ้างอิง
                                                </td>
                                                <td class="center-table"><?php echo $number10; ?></td>
                                        </tr>

                                </table>
                                <?php
                                //คำนวณตรงตรงนี้
                                $result_number = ($number1 + $number2 + $number3 + $number4 + $number5 + $number6 + $number7 + $number8 + $number9 + $number10) / 10 ;
                                $result = number_format($result_number, 2, '.', '');
                                //$result = 2.00;
                                
                                
                                ?>
                                <hr />
                                <div class="thsarabunnew"><p>คะแนนประเมินเฉลี่ยที่ได้ = <?php echo $result; ?> </p></div>
                                <hr />
                                <div class="thsarabunnew">
                                    <p>5. สรุปผลการประเมิน</p>
                                    <p><?php echo $comment; ?></p>
                                    <p>ไฟล์แนบ <a href="<?php echo base_url(); ?>uploadfile/download_evaluation_file/<?php echo $file; ?>" target="_blank"><?php echo $file_show; ?></a></p>
                                
                                </div>
                                <?php if(validation_errors() != ''){ ?>
                                    <div class="alert alert-danger">
                                        <span class="font12"><?php echo validation_errors(); ?></span>
                                    </div>
                                <?php } ?>
                            </ul>
                        </div>
                    
                </div>
              </div><!-- class = row -->
            </div>
        </div>
    </div><!-- end content -->
</div><!-- end col-xs-12 -->
</div>
</div>