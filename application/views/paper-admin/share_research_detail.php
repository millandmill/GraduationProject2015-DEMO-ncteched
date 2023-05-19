<?php
if ($this->session->userdata('user_id') == "") {
    redirect('welcome/logout');
}

//  if(isset($public)){
//      $resultData = $public;
//  }

?>


<div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
    <div class="content">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="pull-left">
                    <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                        <i class="glyphicon glyphicon-briefcase"></i></i>&nbsp;รายละเอียดงานวิจัย
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
                                <td style="min-width: 200px" class="thsarabunnew"><strong>ชื่อบทความภาษาไทย</strong>
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
                                <td class="thsarabunnew"><strong>บทคัดย่อภาษาไทย</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_abstract_th)) {
                                        echo $r->paper_detail_abstract_th;
                                    } ?></td>
                            </tr>
                            <tr>
                                <td class="thsarabunnew"><strong>บทคัดย่อภาษาอังกฤษ</strong></td>
                                <td class="thsarabunnew"><?php if (isset($r->paper_detail_abstract_en)) {
                                        echo $r->paper_detail_abstract_en;
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
                            <tr>
                                <td class="thsarabunnew"><strong>ผู้ร่วมงานวิจัย</strong></td>
                                <td class="thsarabunnew">
                                    <table class="table table-striped table-bordered" id="main-table">
                                        <tr  style="border: 1px solid black; text-align: center">
                                            <td style="min-width:55px;"><b>คนที่</b></td>
                                            <td style="min-width:55px;"><b>ผู้นิพนธ์ประสานงาน</b></td>
                                            <td style="min-width:100px;"><b>คำนำหน้า</b></td>
                                            <td style="min-width:220px;"><b>ชื่อ สกุล</b></td>
                                            <td style="min-width:200px;"><b>อีเมล</b></td>

                                        </tr>
                                        <?php if(isset($r->paper_detail_id)){
                                            $rs = $this->paper->get_paper_owner($r->paper_detail_id);
                                            $num=1;
                                            if ($rs > 0){
                                                foreach ($rs as $r1){
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $num ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($r1->paper_detail_owner_flg == 1) {
                                                                echo "<h6><span class=\"label label-success\">เป็นผู้นิพนธ์ประสานงาน</span></h6>";
                                                            }else{
                                                                echo "<h6><span class=\"label label-default\">เป็นผู้ร่วมวิจัย</span></h6>";
                                                            }
                                                            ?>

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
                                                    </tr>
                                                    <?php $num++; }}
                                            else{
                                                ?>
                                                <tr>
                                                    <td colspan="4">
                                                        <?php  echo '<div>ไม่พบข้อมูลผู้ร่วมวิจัย</div>'; ?>
                                                    </td>
                                                </tr>
                                            <?php    }} ?>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="thsarabunnew"><strong>แจกแจงงานวิจัย</strong></td>
                                <td class="thsarabunnew">
                                    <?php //echo form_open_multipart('paper_with_admin/reviewer_check_paper'); ?>
                                    <table class="table table-striped table-bordered" id="main-table">
                                        <tr style="border: 1px solid black;">
                                            <td style="min-width:500px;"><b>คนตรวจคนที่ 1</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php

                                                $this->db->select('*');
                                                $this->db->join('commeettee', 'paper_reviewer.paper_file_owner_comment1 = commeettee.user_id');
                                                $this->db->from('paper_reviewer');
                                                $this->db->where('paper_detail_id', $r->paper_detail_id);
                                                $query_r = $this->db->get();
                                                $peple1="";
                                                foreach ($query_r->result() as $rss) {
                                                    echo "<b>ชื่อ - นามสกุล :</b> " . $rss->commeettee_fname . "<br/>";
                                                    $peple1=$rss->commeettee_fname;
                                                }

                                                ?>
                                                <?php
                                                    if(isset($query_r)){}
                                                ?>


                                                <?php
                                                    if($peple1=="")
                                                    {    
                                                ?>
                                                <button name="add" type="button" class="btn btn-info"
                                                        onclick="location.href='<?php echo base_url(); ?>paper_with_admin/select_reviewer?c_id=<?php echo $r->paper_detail_id; ?>&re=<?php echo "1"; ?>';">
                                                    <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                                    <span class="thsarabunnew">เพิ่มผู้ตรวจบทความ</span>
                                                </button>
                                                <?php } ?>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>คนตรวจคนที่ 2</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php

                                                $this->db->select('*');
                                                $this->db->join('commeettee', 'paper_reviewer.paper_file_owner_comment2 = commeettee.user_id');
                                                $this->db->from('paper_reviewer');
                                                $this->db->where('paper_detail_id', $r->paper_detail_id);
                                                $query_r = $this->db->get();
                                                $peple2="";
                                                foreach ($query_r->result() as $rss1) {
                                                    echo "<b>ชื่อ - นามสกุล :</b> " . $rss1->commeettee_fname . "<br/>";
                                                    $peple2=$rss1->commeettee_fname;
                                                }
                                                if($peple2=="")
                                                {
                                                ?>   
                                                <button name="add" type="button" class="btn btn-info"
                                                        onclick="location.href='<?php echo base_url(); ?>paper_with_admin/select_reviewer?c_id=<?php echo $r->paper_detail_id; ?>&re=<?php echo "2"; ?>';">
                                                    <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                                    <span class="thsarabunnew">เพิ่มผู้ตรวจบทความ</span>
                                                </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>คนตรวจคนที่ 3</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php

                                                $this->db->select('*');
                                                $this->db->join('commeettee', 'paper_reviewer.paper_file_owner_comment3 = commeettee.user_id');
                                                $this->db->from('paper_reviewer');
                                                $this->db->where('paper_detail_id', $r->paper_detail_id);
                                                $query_r = $this->db->get();
                                                $peple3="";
                                                foreach ($query_r->result() as $rss1) {
                                                    echo "<b>ชื่อ - นามสกุล :</b> " . $rss1->commeettee_fname . "<br/>";
                                                    $peple3=$rss1->commeettee_fname;
                                                }
                                                if($peple3=="")
                                                {
                                                ?>
                                                <button name="add" type="button" class="btn btn-info"
                                                        onclick="location.href='<?php echo base_url(); ?>paper_with_admin/select_reviewer?c_id=<?php echo $r->paper_detail_id; ?>&re=<?php echo "3"; ?>';">
                                                    <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                                    <span class="thsarabunnew">เพิ่มผู้ตรวจบทความ</span>
                                                </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>คนตรวจคนที่ 4</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php

                                                $this->db->select('*');
                                                $this->db->join('commeettee', 'paper_reviewer.paper_file_owner_comment4 = commeettee.user_id');
                                                $this->db->from('paper_reviewer');
                                                $this->db->where('paper_detail_id', $r->paper_detail_id);
                                                $query_r = $this->db->get();
                                                $peple4="";
                                                foreach ($query_r->result() as $rss1) {
                                                    echo "<b>ชื่อ - นามสกุล :</b> " . $rss1->commeettee_fname . "<br/><br/>";
                                                    $peple4=$rss1->commeettee_fname;     
                                                }
                                                if($peple4=="")
                                                {
                                                ?>
                                                <button name="add" type="button" class="btn btn-info"
                                                        onclick="location.href='<?php echo base_url(); ?>paper_with_admin/select_reviewer?c_id=<?php echo $r->paper_detail_id; ?>&re=<?php echo "4"; ?>';">
                                                    <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                                    <span class="thsarabunnew">เพิ่มผู้ตรวจบทความ</span>
                                                </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b class="thsarabunnew" style="color:red;">**คนตรวจเมื่อเลือกแล้วจะไม่สามารถเปลี่ยนแปลงกรุณาใช้ความระมัดระวัง</b>
                                            </td>
                                        </tr>
<!--                                        <tr>-->
<!--                                            <td><b>บันทึก</b></td>-->
<!--                                        </tr>-->
<!--                                        <tr>-->
<!--                                            <td>-->
<!--                                                <input type="submit" value="บันทึก" class="bt-submit thsarabunnew"-->
<!--                                                       name="btn_submit"/>-->
<!--                                                <br/><br/><b class="thsarabunnew" style="color:red;">***-->
<!--                                                    ก่อนกดบันทึกกรุณาเลือกผู้ตรวจทั้ง 3 คน-->
<!--                                                    มิฉะนั้นระบบจะตั้งเป็นค่าเริ่มต้น</b>-->
<!--                                                <br/><br/><b class="thsarabunnew" style="color:red;">***-->
<!--                                                    ต้องเลือกคนตรวจอย่างน้อย 1 คนขึ้นไป</b>-->
<!--                                            </td>-->
<!--                                        </tr>-->

                                    </table>
                                    <?php //echo form_close(); ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="text-align: center">
                                    <button name="add" type="button" class="bt-submit thsarabunnew"
                                            onclick="location.href='<?php echo base_url(); ?>paper_with_admin/share_research';">
                                        <!--                                                <i class="glyphicon glyphicon-plus"></i>&nbsp;-->
                                        <span class="thsarabunnew">ย้อนกลับ</span>
                                    </button>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div><!-- class = row -->
            </div>
        </div>
    </div><!-- end content -->
</div><!-- end col-xs-12 -->


</body>
</html>