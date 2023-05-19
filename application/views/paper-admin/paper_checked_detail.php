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
                        <i class="glyphicon glyphicon-briefcase"></i></i>&nbsp;รายละเอียดงานวิจัยที่ถูกตรวจสอบแล้ว
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
                                <td class="thsarabunnew"><strong>ไฟล์งานวิจัย</strong></td>
                                <td class="thsarabunnew">
                                    <b style="color:red;">*** การแก้ไขสถานะของงานวิจัยเมื่องานวิจัย เปลี่ยนเป็นสถานะ
                                        ผ่าน จะเปลี่ยนเป็นไม่ผ่านไม่ได้</b><br/>
                                    <b style="color:red;">*** เมื่อเปลี่ยนเป็นสถานะ ผ่าน จะการส่ง E-mail
                                        ไปยังผู้ส่งบทความวิจัยโดยใช้ E-mail ที่สมัครสมาชิก</b>
                                    <table class="table table-striped table-bordered" id="main-table">
                                        <tr  style="border: 1px solid black;">
                                            <td style="min-width:120px;"><b>ไฟล์งาน</b></td>
                                            <td style="min-width:220px;"><b>สถานะ</b></td>
                                            <td style="min-width:200px;"><b>การให้ความเห็น</b></td>
                                        </tr>
                                        <?php
                                        $rs = $this->upload_file->get_file_by_paper_detail_id($r->paper_detail_id);
                                        $num=1;
                                        foreach ($rs as $r1){
                                            ?>
                                            <tr>
                                                <td>
                                                    <code> <?php  echo "ส่งครั้งที่ ".$num; ?> <a href="<?php echo base_url(); ?>uploadfile/download/<?php echo $r1->paper_file_hash_str; ?>" target="_blank"><?php echo $r1->paper_file_show; ?></a></code>
                                                </td>
                                                <td>
                                                    <?php
                                                    if($r1->paper_file_flg == 1) {

                                                        echo "สถานะ : ";

                                                        if($r1->paper_file_status != 0){
                                                            if ($r1->paper_file_status == 1){
                                                                echo "ไม่ผ่าน<br>";
                                                            }
                                                            else if ($r1->paper_file_status == 2){
                                                                echo "ผ่านแต่มีการแก้ไข<br>";
                                                            }
                                                            else if ($r1->paper_file_status == 3){
                                                                echo "ผ่านโดยไม่ต้องแก้ไข<br>";
                                                            }
                                                            else{
                                                                echo "ยังไม่มีถานะ";
                                                            }
                                                            if ($r1->paper_file_format_status != ""){
                                                                echo "ความเห็นเพิ่มเติม : ".$r1->paper_file_format_status;
                                                            }
                                                        }else{
                                                            echo "ไม่มีสถานะ<br>";
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td style="min-width:300px;">
                                                    <?php

                                                    if($r1->paper_file_flg == 1) {

                                                        $rs1 = $this->paper->getUser_paper_reviewer($r->paper_detail_id);

                                                        if (!empty($rs1)) {
//

                                                            if ($rs1[0]['user_id'] != 0) {
                                                                echo "ผู้ตรวจบทความคนที่ 1 <br />";
                                                                $user_id1 = $rs1[0]['user_id'];
                                                                $eval1 = $this->paper->getEvaluation_by_file_id($r1->paper_file_id,$user_id1);

                                                                if(!empty($eval1)){
                                                                    echo "ดูรายละเอียด : ";
                                                                    echo '<a href="'.base_url().'paper_with_admin/result?c_id='.$eval1->evaluation_id.'" target="_blank">'."คลิก". '</a><br />';
                                                                }
                                                            }
                                                            if ($rs1[1]['user_id'] != 0) {
                                                                echo "ผู้ตรวจบทความคนที่ 2 <br />";
                                                                $user_id2 = $rs1[1]['user_id'];
                                                                $eval2 = $this->paper->getEvaluation_by_file_id($r1->paper_file_id,$user_id2);

                                                                if(!empty($eval2)){
                                                                    echo "ดูรายละเอียด : ";
                                                                    echo '<a href="'.base_url().'paper_with_admin/result?c_id='.$eval2->evaluation_id.'" target="_blank">'."คลิก". '</a><br />';
                                                                }
                                                            }
                                                            if ($rs1[2]['user_id'] != 0) {
                                                                echo "ผู้ตรวจบทความคนที่ 3 <br />";
                                                                $user_id3 = $rs1[2]['user_id'];
                                                                $eval3 = $this->paper->getEvaluation_by_file_id($r1->paper_file_id,$user_id3);
                                                                if(!empty($eval3)){
                                                                    echo "ดูรายละเอียด : ";
                                                                    echo '<a href="'.base_url().'paper_with_admin/result?c_id='.$eval3->evaluation_id.'" target="_blank">'."คลิก". '</a><br />';
                                                                }

                                                            }
                                                            if ($rs1[3]['user_id'] != 0) {
                                                                echo "ผู้ตรวจบทความคนที่ 4 <br />";
                                                                $user_id4 = $rs1[3]['user_id'];
                                                                $eval4 = $this->paper->getEvaluation_by_file_id($r1->paper_file_id,$user_id4);
                                                                if(!empty($eval4)){
                                                                    echo "ดูรายละเอียด : ";
                                                                    echo '<a href="'.base_url().'paper_with_admin/result?c_id='.$eval4->evaluation_id.'" target="_blank">'."คลิก". '</a><br />';
                                                                }

                                                            }
                                                        } else {
                                                            print_r('empty');
                                                        }
                                                    }
                                                    else {
                                                        print_r('');
                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $num++;
                                        }
                                        ?>
                                    </table>
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