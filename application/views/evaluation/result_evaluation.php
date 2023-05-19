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
                    <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                        <i class="fa fa-cubes"></i>&nbsp;แบบประเมินบทความวิจัย/วิชาการ เพื่อพิจารณาลงพิมพ์ใน NCTechEd Proceedings 
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12">                  
                    <form id="pickDateForm" method="POST" name="form_authen" action="upload" enctype="multipart/form-data">
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
                                
                                $comment = array(
                                    'comment1' => "คะแนน 4.00 ขึ้นไป รับลงพิมพ์โดยไม่ต้องแก้ไข",
                                    'comment2' => "คะแนน 3.00 ถึง 3.99 รับลงพิมพ์โดยต้องแก้ไขเล็กน้อย ไม่ต้องผ่านกรรมการพิจารณา (ให้แก้ไขตามเอกสารแนบ)",
                                    'comment3' => "คะแนน 2.00 ถึง 2.99 รับลงพิมพ์โดยแก้ไขส่วนใหญ่ต้องผ่านกรรมการพิจารณาอีกครั้ง (ให้แก้ไขตามเอกสารแนบ)",
                                    'comment4' => "ไม่เหมาะสมที่จะลงพิมพ์เนื่องจาก",
                                );
                                ?>
                                <hr />
                                <div class="thsarabunnew"><p>คะแนนประเมินเฉลี่ยที่ได้ = <?php echo $result; ?> </p></div>
                                <hr />
                                <div class="thsarabunnew">
                                    <p>5. สรุปผลการประเมิน</p>
                                <?php 
                                    if($result >= 4.00){
                                ?>
                                    <div><?php echo $comment['comment1']; ?></div>
                                    <div><input type="hidden" name="comment" value="<?php echo $comment['comment1']; ?>"></div>
                                <?php
                                    }
                                    else if($result >= 3.00 && $result <= 3.99){
                                ?>
                                    <div><?php echo $comment['comment2']; ?></div>
                                    <div><input type="file" name="filename" size="20" /></div>
                                    <div><input type="hidden" name="comment" value="<?php echo $comment['comment2']; ?>"></div>
                                <?php
                                    }
                                    else if($result >= 2.00 && $result <= 2.99){
                                ?>
                                    <div><?php echo $comment['comment3']; ?></div>
                                    <div><input type="file" name="filename" size="20" /></div>
                                    <div><input type="hidden" name="comment" value="<?php echo $comment['comment3']; ?>"></div>
                                <?php
                                    }
                                    else if($result <= 1.99) {
                                ?>
                                    <div><?php echo $comment['comment4'].'<b style="color:red;" class="thsarabunnew">*กรุณากรอก</b>'; ?></div>
                                    <div><textarea name="comment"></textarea></div>
                                    <div><input type="file" name="filename" size="20" /></div>
                                <?php
                                    }    
                                    if(($result >= 4.00)==false)
                                    {
                                        echo '<b style="color:red;" class="thsarabunnew">** สามารถอัฟโหลดไฟล์สกุล .pdf .doc .docx .zip .rar .7z .jpg เท่านั้น **</b>';
                                    }
                                ?>
                                
                                </div>
                                <?php if(validation_errors() != ''){ ?>
                                    <div class="alert alert-danger">
                                        <span class="font12"><?php echo validation_errors(); ?></span>
                                    </div>
                                <?php } ?>
                                <li><input type="submit" value="ถัดไป"  class="bt-submit thsarabunnew" name="btn_submit"/>
                                    
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