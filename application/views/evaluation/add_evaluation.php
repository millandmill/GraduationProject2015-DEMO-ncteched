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
                    <form method="POST" name="form_authen" action="evaluation_add" enctype="multipart/form-data">
                        <div class="form-addproduct">
                            <ul>
                                
                                <div class="thsarabunnew"><p>1. ชื่อเรื่อง : <?php echo $paper_detail_name_th; ?></p></div>
                                <div class="thsarabunnew"><p>2. ชื่อเจ้าของผลงานหลัก : <?php if(isset($paper_detail_owner_name)){ echo $paper_detail_owner_name; } else { echo "<span style='color: red'>ยังไม่ได้เลือกผู้นิพนธ์ประสานงาน</span>";} ?></p></div>
                                <div class="thsarabunnew"><p>3. ชื่อผู้ตรวจงานวิจัย : <?php echo $commeettee_fname; ?></p></div>
                                <br/>
                                <div class="thsarabunnew"><p>4. การประเมินบทความ</p></div>
                                <table class="thsarabunnew table table-striped table-bordered" >
                                        <tr>
                                            <th class="center-table" rowspan="2" style="vertical-align: middle;">คำอธิบาย</th>
                                                <th class="center-table" colspan="7">คะแนน</th>
                                        </tr>
                                        <tr>
                                                <td class="center-table"> </td>
                                                <td class="center-table">1</td>
                                                <td class="center-table">2</td>
                                                <td class="center-table">3</td>
                                                <td class="center-table">4</td>
                                                <td class="center-table">5</td>
                                                <td class="center-table"> </td>
                                        </tr>
                                        <tr>
                                                <td>
                                                1) การจัดโครงสร้างของบทความ
                                                </td>
                                                <td class="center-table">ไม่ดี</td>
                                                <td class="center-table"><input type="radio" name="number1" value="1" required></td>
                                                <td class="center-table"><input type="radio" name="number1" value="2"></td>
                                                <td class="center-table"><input type="radio" name="number1" value="3"></td>
                                                <td class="center-table"><input type="radio" name="number1" value="4"></td>
                                                <td class="center-table"><input type="radio" name="number1" value="5"></td>
                                                <td class="center-table">ดีมาก</td>
                                        </tr>
                                        <tr>
                                                <td>
                                                2) ความใหม่ของแนวคิด/ทฤษฎี/การประยุกต์
                                                </td>
                                                <td class="center-table">เก่า</td>
                                                <td class="center-table"><input type="radio" name="number2" value="1" required></td>
                                                <td class="center-table"><input type="radio" name="number2" value="2"></td>
                                                <td class="center-table"><input type="radio" name="number2" value="3"></td>
                                                <td class="center-table"><input type="radio" name="number2" value="4"></td>
                                                <td class="center-table"><input type="radio" name="number2" value="5"></td>
                                                <td class="center-table">ใหม่</td>
                                        </tr>
                                        <tr>
                                                <td>
                                                3) ความชัดเจนของปัญหาและวัตถุประสงค์ของงาน
                                                </td>
                                                <td class="center-table">ไม่ชัดเจน</td>
                                                <td class="center-table"><input type="radio" name="number3" value="1" required></td>
                                                <td class="center-table"><input type="radio" name="number3" value="2"></td>
                                                <td class="center-table"><input type="radio" name="number3" value="3"></td>
                                                <td class="center-table"><input type="radio" name="number3" value="4"></td>
                                                <td class="center-table"><input type="radio" name="number3" value="5"></td>
                                                <td class="center-table">ชัดเจน</td>
                                        </tr>
                                        <tr>
                                                <td>
                                                4) ผลที่ได้การวิเคราะห์และสรุป
                                                </td>
                                                <td class="center-table">ไม่ดี</td>
                                                <td class="center-table"><input type="radio" name="number4" value="1" required></td>
                                                <td class="center-table"><input type="radio" name="number4" value="2"></td>
                                                <td class="center-table"><input type="radio" name="number4" value="3"></td>
                                                <td class="center-table"><input type="radio" name="number4" value="4"></td>
                                                <td class="center-table"><input type="radio" name="number4" value="5"></td>
                                                <td class="center-table">ดีมาก</td>
                                        </tr>
                                        <tr>
                                                <td>
                                                5) ความสําคัญของาน
                                                </td>
                                                <td class="center-table">ไม่สำคัญ</td>
                                                <td class="center-table"><input type="radio" name="number5" value="1" required></td>
                                                <td class="center-table"><input type="radio" name="number5" value="2"></td>
                                                <td class="center-table"><input type="radio" name="number5" value="3"></td>
                                                <td class="center-table"><input type="radio" name="number5" value="4"></td>
                                                <td class="center-table"><input type="radio" name="number5" value="5"></td>
                                                <td class="center-table">สำคัญมาก</td>
                                        </tr>
                                        <tr>
                                                <td>
                                                6) ความถูกต้องของข้อมูล
                                                </td>
                                                <td class="center-table">ผิด</td>
                                                <td class="center-table"><input type="radio" name="number6" value="1" required></td>
                                                <td class="center-table"><input type="radio" name="number6" value="2"></td>
                                                <td class="center-table"><input type="radio" name="number6" value="3"></td>
                                                <td class="center-table"><input type="radio" name="number6" value="4"></td>
                                                <td class="center-table"><input type="radio" name="number6" value="5"></td>
                                                <td class="center-table">ถูกต้อง</td>
                                        </tr>
                                        <tr>
                                                <td>
                                                7) ความชัดเจนของบทความ
                                                </td>
                                                <td class="center-table">ไม่ชัดเจน</td>
                                                <td class="center-table"><input type="radio" name="number7" value="1" required></td>
                                                <td class="center-table"><input type="radio" name="number7" value="2"></td>
                                                <td class="center-table"><input type="radio" name="number7" value="3"></td>
                                                <td class="center-table"><input type="radio" name="number7" value="4"></td>
                                                <td class="center-table"><input type="radio" name="number7" value="5"></td>
                                                <td class="center-table">ชัดเจน</td>
                                        </tr>
                                        <tr>
                                                <td>
                                                8) ความยาวของบทความ
                                                </td>
                                                <td class="center-table">ไม่เหมาะสม</td>
                                                <td class="center-table"><input type="radio" name="number8" value="1" required></td>
                                                <td class="center-table"><input type="radio" name="number8" value="2"></td>
                                                <td class="center-table"><input type="radio" name="number8" value="3"></td>
                                                <td class="center-table"><input type="radio" name="number8" value="4"></td>
                                                <td class="center-table"><input type="radio" name="number8" value="5"></td>
                                                <td class="center-table">เหมาะสม</td>
                                        </tr>
                                        <tr>
                                                <td>
                                                9) การอ้างอิงงานวิจัย วรรณกรรมและทฤษฏีที่เกี่ยวข้อง
                                                </td>
                                                <td class="center-table">ไม่ครอบคลุม</td>
                                                <td class="center-table"><input type="radio" name="number9" value="1" required></td>
                                                <td class="center-table"><input type="radio" name="number9" value="2"></td>
                                                <td class="center-table"><input type="radio" name="number9" value="3"></td>
                                                <td class="center-table"><input type="radio" name="number9" value="4"></td>
                                                <td class="center-table"><input type="radio" name="number9" value="5"></td>
                                                <td class="center-table">ครบถ้วน</td>
                                        </tr>
                                        <tr>
                                                <td>
                                                10)ความใหม่และจํานวนของเอกสารอ้างอิง
                                                </td>
                                                <td class="center-table">ไม่เหมาะสม</td>
                                                <td class="center-table"><input type="radio" name="number10" value="1" required></td>
                                                <td class="center-table"><input type="radio" name="number10" value="2"></td>
                                                <td class="center-table"><input type="radio" name="number10" value="3"></td>
                                                <td class="center-table"><input type="radio" name="number10" value="4"></td>
                                                <td class="center-table"><input type="radio" name="number10" value="5"></td>
                                                <td class="center-table">เหมาะสม</td>
                                        </tr>

                                </table>

                                <?php if(validation_errors() != ''){ ?>
                                    <div class="alert alert-danger">
                                        <span class="font12"><?php echo validation_errors(); ?></span>
                                    </div>
                                <?php } ?>
                                    <input type="hidden" name="file_id" value="<?php echo $paper_file_id; ?>"/>
                                    <input type="hidden" name="paper_id" value="<?php echo $paper_detail_id; ?>"/>
                                <li><input type="submit" value="เพิ่ม"  class="bt-submit thsarabunnew" name="btn_submit"/>
                                    <input type="reset" value="กลับ" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../evaluation/index'"/> 
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