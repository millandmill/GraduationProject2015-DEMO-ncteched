<?php
if ($this->session->userdata('user_id') == "") {
    redirect('welcome/logout');
}
?>


<div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
    <div class="content">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="pull-left">
                    <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                        <i class="glyphicon glyphicon-briefcase"></i></i>&nbsp;อัพเดตสถานะงานวิจัย
                    </div>
                </div>


                <div class="pull-right">

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <tr>
                                <td style=" min-width: 200px" class="thsarabunnew"><strong>รหัสบทความ</strong></td>
                                <td class="thsarabunnew"><?php if(isset($r->paper_numbering_code)){ echo $r->paper_numbering_code; } ?></td>
                            </tr>
                            <tr>
                                <td style=" min-width: 200px" class="thsarabunnew"><strong>ชื่อบทความภาษาไทย</strong>
                                </td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_name_th)) {
                                        echo $r->paper_detail_name_th;
                                    } ?></td>
                            </tr>
                            <tr>
                                <td class="thsarabunnew"><strong>ชื่อบทความภาษาอังกฤษ</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_name_en)) {
                                        echo $r->paper_detail_name_en;
                                    } ?></td>
                            </tr>
                            <tr>
                                <td class="thsarabunnew"><strong>สาขาวิชา</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->department_name)) {
                                        echo $r->department_name;
                                    } ?></td>
                            </tr>
                            <tr>
                                <td class="thsarabunnew"><strong>คำสำคัญภาษาไทย</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_keyword_th)) {
                                        echo $r->paper_detail_keyword_th;
                                    } ?></td>
                            </tr>
                            <tr>
                                <td class="thsarabunnew"><strong>คำสำคัญภาษาอังกฤษ</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_keyword_en)) {
                                        echo $r->paper_detail_keyword_en;
                                    } ?></td>
                            </tr>
                            <tr>
                                <td class="thsarabunnew"><strong>บทคัดย่อ</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_abstract)) {
                                        echo $r->paper_detail_abstract;
                                    } ?></td>
                            </tr>
                            <tr>
                                <td class="thsarabunnew"><strong>ปี</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_year)) {
                                        echo date("Y", strtotime($r->paper_detail_year));
                                    } ?></td>
                            </tr>
                            <tr>
                                <td class="thsarabunnew"><strong>สถานะ</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_status)) {
                                        echo $r->paper_detail_status_name;
                                    } ?></td>
                            </tr>
                            <?php if (isset($r->paper_detail_name1) && trim($r->paper_detail_name1 != "")) { ?>

                                <tr>
                                    <td class="thsarabunnew"><strong>ผู้แต่งบทความคนที่ 1</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_name1)) {
                                            echo $r->paper_detail_name1;
                                        } ?></td>
                                </tr>

                                <tr>
                                    <td class="thsarabunnew"><strong>อีเมล</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_email1)) {
                                            echo $r->paper_detail_email1;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>เบอร์โทรศัพท์</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_tel1)) {
                                            echo $r->paper_detail_tel1;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>ที่อยู่</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_add1)) {
                                            echo $r->paper_detail_add1;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>ผู้นำเสนองานวิจัย</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_presenter1)) {
                                            echo $r->paper_detail_presenter1;
                                        } ?></td>
                                </tr>
                            <?php } ?>

                            <?php if (isset($r->paper_detail_name2) && trim($r->paper_detail_name2 != "")) { ?>
                                <td class="thsarabunnew"><strong>ผู้แต่งบทความคนที่ 2</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_name2)) {
                                        echo $r->paper_detail_name2;
                                    } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>อีเมล</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_email2)) {
                                            echo $r->paper_detail_email2;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>เบอร์โทรศัพท์</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_tel2)) {
                                            echo $r->paper_detail_tel2;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>ที่อยู่</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_add2)) {
                                            echo $r->paper_detail_add2;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>ผู้นำเสนองานวิจัย</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_presenter2)) {
                                            echo $r->paper_detail_presenter2;
                                        } ?></td>
                                </tr>
                            <?php } ?>

                            <?php if (isset($r->paper_detail_name3) && trim($r->paper_detail_name3 != "")) { ?>
                                <td class="thsarabunnew"><strong>ผู้แต่งบทความคนที่ 3</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_name3)) {
                                        echo $r->paper_detail_name3;
                                    } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>อีเมล</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_email3)) {
                                            echo $r->paper_detail_email3;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>เบอร์โทรศัพท์</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_tel3)) {
                                            echo $r->paper_detail_tel3;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>ที่อยู่</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_add3)) {
                                            echo $r->paper_detail_add3;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <td class="thsarabunnew"><strong>ผู้นำเสนองานวิจัย</strong></td>
                                    <td class="thsarabunnew"><?php if (isset($r->paper_detail_presenter3)) {
                                            echo $r->paper_detail_presenter3;
                                        } ?></td>
                                </tr>
                            <?php } ?>


                            <tr>
                                <td class="thsarabunnew"><strong>ไฟล์งานวิจัย</strong></td>
                                <td class="thsarabunnew">
                                    <b style="color:red;">*** การแก้ไขสถานะของงานวิจัยเมื่องานวิจัย เปลี่ยนเป็นสถานะ
                                        ผ่าน จะเปลี่ยนเป็นไม่ผ่านไม่ได้</b><br/>
                                    <b style="color:red;">*** เมื่อเปลี่ยนเป็นสถานะ ผ่าน จะการส่ง E-mail
                                        ไปยังผู้ส่งบทความวิจัยโดยใช้ E-mail ที่สมัครสมาชิก</b>
                                    <table class="table table-striped table-bordered" id="main-table">
                                        <tr style="border: 1px solid black;">
                                            <td style="min-width:200px;"><b>ไฟล์งาน</b></td>
                                            <td style="min-width:175px;"><b>แก้ไขสถานะ</b></td>
                                            <td style="min-width:300px;"><b>ให้ความคิดเห็น</b></td>
                                            <td><b>บันทึก</b></td>
                                        </tr>
                                        <?php
                                        $rs = $this->upload_file->get_file_by_paper_detail_id($r->paper_detail_id);
                                        $num = 1;
                                        foreach ($rs as $r1) {
                                            ?>
                                            <tr>
                                                <?php echo form_open_multipart('paper_with_admin/update_status'); ?>
                                                <td>

                                                    <code> <?php echo "ส่งครั้งที่ " . $num; ?> <a
                                                            href="<?php echo base_url(); ?>index.php/uploadfile/download/<?php echo $r1->paper_file_show; ?>"><?php echo $r1->paper_file_show; ?></a></code>
                                                </td>
                                                <td>

                                                    <select style="padding:1px;" class="form-control"
                                                            name="selected_status" id="selected_status">
                                                        <option
                                                            value="กำลังรอการตรวจสอบ" <?php if (isset($r1->paper_file_format_status)) {
                                                            if ($r1->paper_file_format_status == 'กำลังรอการตรวจสอบ') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>กำลังรอการตรวจสอบ
                                                        </option>
                                                        <option
                                                            value="หัวข้อไม่ผ่าน" <?php if (isset($r1->paper_file_format_status)) {
                                                            if ($r1->paper_file_format_status == 'หัวข้อไม่ผ่าน') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>หัวข้อไม่ผ่าน
                                                        </option>
                                                        <option
                                                            value="รูปแบบไม่ผ่าน" <?php if (isset($r1->paper_file_format_status)) {
                                                            if ($r1->paper_file_format_status == 'รูปแบบไม่ผ่าน') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>รูปแบบไม่ผ่าน
                                                        </option>
                                                        <option
                                                            value="เนื้อหาไม่ผ่าน" <?php if (isset($r1->paper_file_format_status)) {
                                                            if ($r1->paper_file_format_status == 'เนื้อหาไม่ผ่าน') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>เนื้อหาไม่ผ่าน
                                                        </option>
                                                        <option
                                                            value="ไม่ผ่านด้วยสาเหตุอื่นๆ" <?php if (isset($r1->paper_file_format_status)) {
                                                            if ($r1->paper_file_format_status == 'ไม่ผ่านด้วยสาเหตุอื่นๆ') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>ไม่ผ่านด้วยสาเหตุอื่นๆ
                                                        </option>
                                                        <option
                                                            value="ผ่าน ได้รับการพิจารณา กรุณาชำระเงิน" <?php if (isset($r1->paper_file_format_status)) {
                                                            if ($r1->paper_file_format_status == 'ผ่าน ได้รับการพิจารณา กรุณาชำระเงิน') {
                                                                echo 'selected';
                                                            }
                                                        } ?>>ผ่าน ได้รับการพิจารณา กรุณาชำระเงิน
                                                        </option>
                                                    </select>

                                                </td>
                                                <td>
                                                    <div class="col-md-12">
                                                        <?php
                                                        $this->db->select('*');
                                                        $this->db->where('paper_file_id', $r1->paper_file_id);
                                                        $c1 = $this->db->get('paper_file');
                                                        $cc1 = array_shift($c1->result_array());
                                                        $ccc1 = $cc1['paper_file_comment1'];
                                                        $ccc2 = $cc1['paper_file_comment2'];
                                                        $ccc3 = $cc1['paper_file_comment3'];
                                                        ?>
                                                        <div class="thsarabunnew"><?php echo "คนที่ 1 " ?>สถานะ
                                                            <?php if ($cc1['paper_file_owner_comment1_status'] == 'Reject') {
                                                                echo '<span class="label label-danger glyphicon glyphicon-remove" > ไม่ผ่าน</span>';
                                                            } else if ($cc1['paper_file_owner_comment1_status'] == 'Pass') {
                                                                echo '<span class="label label-success glyphicon glyphicon-ok"> ผ่าน</span>';
                                                            } else {
                                                                echo '<span class="label label-info glyphicon glyphicon-edit"> NONE</span>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                        if ($ccc1 != "") {
                                                            ?>
                                                            <br/>
                                                            <div class="thsarabunnew"><a
                                                                    href="<?php echo base_url(); ?>index.php/uploadfile/download_review/<?php echo $ccc1; ?>">ไฟล์ของผู้ตรวจบทความคนที่
                                                                    1</a></div><br/>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <br/>
                                                            <div class="thsarabunnew">ผู้ตรวจบทความคนที่ 1
                                                                ยังไม่ได้ส่งไฟล์
                                                            </div><br/>
                                                            <?php
                                                        }
                                                        ?>


                                                        <!-- -->
                                                        <div class="thsarabunnew"><?php echo "คนที่ 2 " ?>สถานะ
                                                            <?php if ($cc1['paper_file_owner_comment2_status'] == 'Reject') {
                                                                echo '<span class="label label-danger glyphicon glyphicon-remove" > ไม่ผ่าน</span>';
                                                            } else if ($cc1['paper_file_owner_comment2_status'] == 'Pass') {
                                                                echo '<span class="label label-success glyphicon glyphicon-ok"> ผ่าน</span>';
                                                            } else {
                                                                echo '<span class="label label-info glyphicon glyphicon-edit"> NONE</span>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                        if ($ccc2 != "") {
                                                            ?>
                                                            <br/>
                                                            <div class="thsarabunnew"><a
                                                                    href="<?php echo base_url(); ?>index.php/uploadfile/download_review/<?php echo $ccc2; ?>">ไฟล์ของผู้ตรวจบทความคนที่
                                                                    2</a></div><br/>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <br/>
                                                            <div class="thsarabunnew">ผู้ตรวจบทความคนที่ 2
                                                                ยังไม่ได้ส่งไฟล์
                                                            </div><br/>
                                                            <?php
                                                        }
                                                        ?>

                                                        <!-- -->
                                                        <div class="thsarabunnew"><?php echo "คนที่ 3 " ?>สถานะ
                                                            <?php if ($cc1['paper_file_owner_comment3_status'] == 'Reject') {
                                                                echo '<span class="label label-danger glyphicon glyphicon-remove" > ไม่ผ่าน</span>';
                                                            } else if ($cc1['paper_file_owner_comment3_status'] == 'Pass') {
                                                                echo '<span class="label label-success glyphicon glyphicon-ok"> ผ่าน</span>';
                                                            } else {
                                                                echo '<span class="label label-info glyphicon glyphicon-edit"> NONE</span>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <?php
                                                        if ($ccc3 != "") {
                                                            ?>
                                                            <br/>
                                                            <div class="thsarabunnew"><a
                                                                    href="<?php echo base_url(); ?>index.php/uploadfile/download_review/<?php echo $ccc3; ?>">ไฟล์ของผู้ตรวจบทความคนที่
                                                                    3</a></div><br/>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <br/>
                                                            <div class="thsarabunnew">ผู้ตรวจบทความคนที่ 3
                                                                ยังไม่ได้ส่งไฟล์
                                                            </div><br/>
                                                            <?php
                                                        }
                                                        ?>


                                                        <input type="hidden" name="file_id"
                                                               value="<?php echo $r1->paper_file_id; ?>"/>
                                                        <input type="hidden" name="paper_detail_id"
                                                               value="<?php echo $r->paper_detail_id; ?>"/>
                                                        <input type="hidden" name="user_id"
                                                               value="<?php echo $r->user_id; ?>"/>

                                                        <span class="text-danger"><?php if (isset($error)) {
                                                                echo $error;
                                                            } ?></span>


                                                    </div>

                                                </td>
                                                <td>
                                                    <?php
                                                    if ($r1->paper_file_format_status == ""){
                                                    ?>

                                                    <input type="submit" value="เปลี่ยนแปลงสถานะ"
                                                           class="btn btn-primary"/>
                                                </td>
                                            <?php
                                            } else {
                                                ?>
                                                <input disabled="disabled" type="button" value="คุณได้อัพเดตไปแล้ว"
                                                       class="btn btn-primary"/>
                                                <?php
                                            }
                                            ?>

                                                <?php echo form_close(); ?>
                                            </tr>
                                            <?php
                                            $num++;
                                        }
                                        ?>

                                    </table>
                                </td>
                            </tr>


                            <?php if ($r->paper_detail_status == 1) { ?>
                                <?php echo form_open_multipart('paper_with_admin/check_paper'); ?>
                                <tr>
                                    <td><b>
                                            <div class="thsarabunnew">ตรวจสอบหัวข้องานวิจัย</div>
                                        </b></td>
                                    <td>
                                        <select style="padding:1px;" class="form-control thsarabunnew"
                                                name="selected_status" id="selected_status">
                                            <option value="0">ไม่ผ่าน</option>
                                            <option value="2">ผ่าน</option>
                                        </select>
                                        <br/><b style="color:red;" class="thsarabunnew">*** การอนุมัติหัวข้องานวิจัย
                                            ถ้าอนุมัติผ่านแล้ว จะเปลี่ยนเป็นไม่ผ่าน ไม่ได้</b>
                                        <br/><b style="color:red;" class="thsarabunnew">***
                                            กรุณาใช้ความระมัดระวัง</b><br/>

                                        <input type="hidden" name="paper_detail_id"
                                               value="<?php echo $r->paper_detail_id; ?>"/>
                                        <input type="hidden" name="user_id" value="<?php echo $r->user_id; ?>"/>

                                        <br/><input class="bt-submit thsarabunnew" type="submit" value="ตกลง"/>
                                    </td>
                                </tr>

                                <?php echo form_close(); ?>
                            <?php } ?>
                            <?php if ($r->paper_detail_status == 2 || $r->paper_detail_status == 3) { ?>

                                <td class="thsarabunnew"><strong>การแจกแจงงานวิจัย</strong></td>
                                <td class="thsarabunnew"><a
                                        onclick="location.href='<?php echo base_url(); ?>paper_with_admin/share_research_detail/<?php echo $r->paper_detail_id; ?>';"
                                        class="btn btn-info" role="button">ไปหน้าการแจกแจงงานวิจัย</a></td>

                            <?php } ?>


                            <?php if ($r->paper_detail_status == 4 || $r->paper_detail_status == 5) { ?>

                                <td class="thsarabunnew"><strong>ตรวจสอบการชำระเงิน</strong></td>
                                <td class="thsarabunnew"><a
                                        onclick="location.href='<?php echo base_url(); ?>payment_system_admin/show_detail/<?php echo $r->paper_detail_id; ?>';"
                                        class="btn btn-info" role="button">ไปหน้าการส่งสลิปชำระเงิน</a></td>
                            <?php } ?>
                        </table>
                    </div>
                </div><!-- class = row -->
            </div>
        </div>
    </div><!-- end content -->
</div><!-- end col-xs-12 -->
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="<?php echo base_url() . 'public/lib/'; ?>js/site.js"></script>
<script src="<?php echo base_url() . 'public/lib/'; ?>js/ajaxfileupload.js"></script>
</body>
</html>