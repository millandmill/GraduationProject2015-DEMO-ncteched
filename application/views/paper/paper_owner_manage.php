<div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
    <div class="content">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="pull-left">
                    <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                        <i class="fa fa-cubes glyphicon glyphicon-file"></i>&nbsp;หน้าจัดการผู้วิจัย : <?php if(isset($paper_detail_name_th)){ echo $paper_detail_name_th; } ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" name="form_authen" id="frm_submit" action="presenter_owner?c_id=<?php echo $paper_detail_id ?>" enctype="multipart/form-data">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#menu1"><h6>รายชื่อผู้วิจัย</h6></a>
                                </li>
                            </ul>
                            <div class="tab-content thsarabunnew">
                                <!-- Text input-->
                                <table class="table table-striped table-bordered" id="main-table">
                                    <tr  style="border: 1px solid black;">
                                        <td style="min-width:55px;min-width:105px;"><b>เลือกผู้ประสานงาน</b></td>
                                        <td style="min-width:100px;"><b>คำนำหน้า</b></td>
                                        <td style="min-width:220px;"><b>ชื่อ</b></td>
                                        <td style="min-width:200px;"><b>อีเมล</b></td>
                                        <td style="min-width:200px;"><b>สังกัด</b></td>
                                        <td style="min-width:200px;"><b>เบอร์โทรศัพท์มือถือ</b></td>
                                        <td style="min-width:200px;"><b>เบอร์โทรศัพท์ที่ทำงาน</b></td>
                                        <td>
                                            <div class="pull-right">
                                                <button name="add" type="button" class="btn btn-info" onclick="location.href='<?php echo base_url(); ?>paper/paper_detail_add_owner?c_id=<?php echo $paper_detail_id; ?>';">
                                                    <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                                    <span class="thsarabunnew">เพิ่มผู้วิจัย</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php if(isset($paper_detail_id)){
                                        $rs = $this->paper->get_paper_owner($paper_detail_id);
                                        $num=1;
                                        if ($rs > 0){
                                            foreach ($rs as $r1){
                                                ?>
                                                <div class="btn-group" data-toggle="buttons">
                                                <tr>
                                                    <td style="text-align:center;">
                                                        <input type="radio" name="presenter" autocomplete="off" value="<?php echo $r1->paper_detail_owner_id; ?>" <?php if($r1->paper_detail_owner_flg == 1){echo "checked";} ?> />
                                                    </td>
                                                    <td>
                                                        <?php echo $r1->paper_detail_owner_prename; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $r1->paper_detail_owner_name; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $r1->paper_detail_owner_email; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $r1->paper_detail_owner_address; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $r1->paper_detail_owner_mobile; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $r1->paper_detail_owner_tel; ?>
                                                    </td>
                                                    <td>
                                                        <div class="pull-right">
                                                            <button name="add" type="button" class="btn btn-warning" onclick="location.href='<?php echo base_url(); ?>paper/paper_detail_update_owner?c_id=<?php echo $paper_detail_id; ?>&o_id=<?php echo $r1->paper_detail_owner_id; ?>';">
                                                                <i class="glyphicon glyphicon-pencil"></i>&nbsp;
                                                                <span class="thsarabunnew">แก้ไขผู้วิจัย</span>
                                                            </button>
                                                        </div>
                                                        <div class="pull-right">
                                                            <button name="add" type="button" class="btn btn-danger" onclick="location.href='<?php echo base_url(); ?>paper/delete_owner?c_id=<?php echo $paper_detail_id; ?>&o_id=<?php echo $r1->paper_detail_owner_id; ?>';">
                                                                <i class="glyphicon glyphicon-trash"></i>&nbsp;
                                                                <span class="thsarabunnew">ลบผู้วิจัย</span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $num++; }
                                        }else{
                                            ?>
                                            <tr>
                                                <td colspan="6">
                                                    <?php  echo '<div>ไม่พบข้อมูลผู้ร่วมวิจัย</div>'; ?>
                                                </td>
                                            </tr>
                                        <?php    }} ?>

                                </table>

                            </div>

                            <div class="tab-content">
                                <div id="menu5" class="tab-pane fade in active" style="text-align: center;">
                                    <div class="form-addproduct">
                                            <input type="submit" value="ปรับปรุง" class="bt-submit thsarabunnew" name="btn_submit" />
                                            <!--<input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" /> -->
                                            <input type="reset" value="ย้อนกลับ" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../paper/show_detail/<?php echo $paper_detail_id; ?>'" />
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<


</body>
</html>