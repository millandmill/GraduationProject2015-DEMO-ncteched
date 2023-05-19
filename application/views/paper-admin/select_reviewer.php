<?php
if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }

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
                        <i class="fa fa-cubes glyphicon glyphicon-file"></i>&nbsp;เพิ่มผู้ตรวจบทความคนที่ <?php if(isset($reviewer_number)){ echo $reviewer_number; } ?> ของ : <?php if(isset($paper_detail_name_th)){ echo $paper_detail_name_th; } ?>
                    </div>
                </div>


                <div class="pull-right">

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo form_open_multipart('paper_with_admin/reviewer_check_paper');?>
                        <table class="table table-striped table-bordered" id="main-table">

                            <?php
//ย้ายไปใส่ ใน model และ controller แล้ว
                            //11111111111111111111111111111111111111
//                            $this->db->select('commeettee_id, commeettee_fname, commeettee.user_id, user.email, commeettee_department,user.user_type');
//                            $this->db->join('user', 'commeettee.user_id = user.user_id');
//                            $this->db->from('commeettee');
//                            $this->db->where('user.user_type',"2");
//                            $this->db->like('commeettee_department', $department_name);
//                            $query_reviewer = $this->db->get();
//                            $result_reviewer = array();
//
//                            foreach ($query_reviewer->result() as $obj_reviewer) {
//                                array_push($result_reviewer,$obj_reviewer);
//                            }
//
//                            //print_r ($result_reviewer);
//
//                            $array_reviewer = json_decode(json_encode($result_reviewer), True);
//
//                            print_r ($array_reviewer);
//
//                            //22222222222222222222222222222222222222222222222222222
//                            $this->db->select('*');
//                            $this->db->from('paper_reviewer');
//                            $this->db->where('paper_detail_id',$paper_detail_id);
//                            $query_r = $this->db->get();
//                            $second_compare_reviewer = array();
//
//                            foreach ($query_r->result() as $obj_rss){
//                                $second_compare_reviewer[0]['user_id'] = $obj_rss->paper_file_owner_comment1 ;
//                                $second_compare_reviewer[1]['user_id'] = $obj_rss->paper_file_owner_comment2 ;
//                                $second_compare_reviewer[2]['user_id'] = $obj_rss->paper_file_owner_comment3 ;
//                                $second_compare_reviewer[3]['user_id'] = $obj_rss->paper_file_owner_comment4 ;
//                            }
//
//                            print_r ($second_compare_reviewer);
//
//                            $split_uid1 = array_map(function ($ar) {return $ar['user_id'];}, $array_reviewer);
//                            $split_uid2 = array_map(function ($ar) {return $ar['user_id'];}, $second_compare_reviewer);
//
//                            print_r($split_uid1);
//
//                            print_r($split_uid2);
//                            $result_diff = array_diff($split_uid1,$split_uid2);
//
//                            print_r($result_diff);
//
//
//                            //333333333333333333333333333333333333333333333333333333333333333333333333333333333333
//                            $this->db->select('commeettee_id, commeettee_fname, commeettee.user_id, user.email, commeettee_department,user.user_type');
//                            $this->db->join('user', 'commeettee.user_id = user.user_id');
//                            $this->db->from('commeettee');
//                            $this->db->where_in('user.user_id',$result_diff);
//                            $query_reviewer = $this->db->get();
//                            $result_reviewer = array();
//
//                            foreach ($query_reviewer->result() as $obj_reviewer) {
//                                array_push($result_reviewer,$obj_reviewer);
//                            }
//


                            ?>

                            <?php if(isset($reviewer_number) && ($reviewer_number == 1)) { ?>
                            <tr  style="border: 1px solid black;">
                                <td style="min-width:500px;"><b>คนตรวจคนที่ 1</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php

                                    $this->db->select('*');
                                    $this->db->join('commeettee', 'paper_reviewer.paper_file_owner_comment1 = commeettee.user_id');
                                    $this->db->from('paper_reviewer');
                                    $this->db->where('paper_detail_id',$paper_detail_id);
                                    $query_r = $this->db->get();

                                    foreach ($query_r->result() as $rss){
                                        echo "<b>ชื่อ - นามสกุล :</b> ".$rss->commeettee_fname."<br/><br/>";
                                        //print_r($second_compare_reviewer[0]);
                                    }

                                    ?>
                                    <?php
                                    if(isset($second_compare_reviewer[0]['user_id'])){
                                        //echo "is Data";
                                        $rr1 = $second_compare_reviewer[0]['user_id'];
                                        //print_r($rr1);
                                    }
                                    else{
                                        $rr1 = 0;
                                        //echo "set 0";
                                    }

                                    if($rr1 == 0){

                                    ?>
                                        <select  data-validation="required"
                                                 data-validation-error-msg-required="กรุณาเลือกสาขางานที่นำเสนอ"
                                                 class="thsarabunnew" name="reviewer1" class="slt">
                                            <option class="thsarabunnew" value="">---เลือกคนตรวจ---</option>
                                            <?php
                                            foreach ($result_reviewer as $reviewer){
                                                ?>
                                                <option class="thsarabunnew" value="<?php echo $reviewer->user_id; ?>" ><?php echo $reviewer->commeettee_fname; ?></option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                            <?php } else if(isset($reviewer_number) && ($reviewer_number == 2)) { ?>
                            <tr>
                                <td><b>คนตรวจคนที่ 2</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php

                                    $this->db->select('*');
                                    $this->db->join('commeettee', 'paper_reviewer.paper_file_owner_comment2 = commeettee.user_id');
                                    $this->db->from('paper_reviewer');
                                    $this->db->where('paper_detail_id',$paper_detail_id);
                                    $query_r = $this->db->get();

                                    foreach ($query_r->result() as $rss1){
                                        echo "<b>ชื่อ - นามสกุล :</b> ".$rss1->commeettee_fname."<br/><br/>";
                                        //if ($second_compare_reviewer[1]['user_id'] = 0){
                                            //echo "nodata";
                                        //}
                                    }

                                    ?>
                                    <?php
                                    if(isset($second_compare_reviewer[1]['user_id'])){
                                        //echo "is Data";
                                        $rr1 = $second_compare_reviewer[1]['user_id'];
                                        //print_r($rr1);
                                    }
                                    else{
                                        $rr1 = 0;
                                        //echo "set 0";
                                    }

                                    if($rr1 == 0){
                                        ?>
                                        <select  data-validation="required"
                                                 data-validation-error-msg-required="กรุณาเลือกสาขางานที่นำเสนอ"
                                                 class="thsarabunnew" name="reviewer2" class="slt">
                                            <option class="thsarabunnew" value="">---เลือกคนตรวจ---</option>
                                            <?php
                                            foreach ($result_reviewer as $reviewer){
                                                ?>
                                                <option class="thsarabunnew" value="<?php echo $reviewer->user_id; ?>" ><?php echo $reviewer->commeettee_fname; ?></option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php } else if(isset($reviewer_number) && ($reviewer_number == 3)) { ?>
                            <tr>
                                <td><b>คนตรวจคนที่ 3</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php

                                    $this->db->select('*');
                                    $this->db->join('commeettee', 'paper_reviewer.paper_file_owner_comment3 = commeettee.user_id');
                                    $this->db->from('paper_reviewer');
                                    $this->db->where('paper_detail_id',$paper_detail_id);
                                    $query_r = $this->db->get();

                                    foreach ($query_r->result() as $rss1){
                                        echo "<b>ชื่อ - นามสกุล :</b> ".$rss1->commeettee_fname."<br/><br/>";
                                    }

                                    ?>
                                    <?php
                                    if(isset($second_compare_reviewer[2]['user_id'])){
                                        //echo "is Data";
                                        $rr1 = $second_compare_reviewer[2]['user_id'];
                                        //print_r($rr1);
                                    }
                                    else{
                                        $rr1 = 0;
                                        //echo "set 0";
                                    }

                                    if($rr1 == 0) {
                                        ?>
                                        <select class="thsarabunnew" name="reviewer3" class="slt">
                                            <option class="thsarabunnew" value="">---เลือกคนตรวจ---</option>
                                            <?php
                                            foreach ($result_reviewer as $reviewer) {
                                                ?>
                                                <option class="thsarabunnew"
                                                        value="<?php echo $reviewer->user_id; ?>"><?php echo $reviewer->commeettee_fname; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <?php
                                    }
                                        ?>
                                </td>
                            </tr>
                            <?php } else if(isset($reviewer_number) && ($reviewer_number == 4)) { ?>
                            <tr>
                                <td><b>คนตรวจคนที่ 4</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php

                                    $this->db->select('*');
                                    $this->db->join('commeettee', 'paper_reviewer.paper_file_owner_comment4 = commeettee.user_id');
                                    $this->db->from('paper_reviewer');
                                    $this->db->where('paper_detail_id',$paper_detail_id);
                                    $query_r = $this->db->get();

                                    foreach ($query_r->result() as $rss1){
                                        echo "<b>ชื่อ - นามสกุล :</b> ".$rss1->commeettee_fname."<br/><br/>";
                                    }

                                    ?>
                                    <?php
                                    if(isset($second_compare_reviewer[3]['user_id'])){
                                        //echo "is Data";
                                        $rr1 = $second_compare_reviewer[3]['user_id'];
                                        //print_r($rr1);
                                    }
                                    else{
                                        $rr1 = 0;
                                        //echo "set 0";
                                    }

                                    if($rr1 == 0) {
                                        ?>

                                        <select class="thsarabunnew" name="reviewer4" class="slt">
                                            <option class="thsarabunnew" value="">---เลือกคนตรวจ---</option>
                                            <?php
                                            foreach ($result_reviewer as $reviewer) {
                                                ?>
                                                <option class="thsarabunnew"
                                                        value="<?php echo $reviewer->user_id; ?>"><?php echo $reviewer->commeettee_fname; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <?php
                                    }
                                    ?>

                                </td>
                            </tr>
                            <?php } else { echo "<td>มีผู้ตรวจบทความสูงสุดเพียงแค่สี่คนเท่านั้น</td>";} ?>
                            <?php
                            if(isset($rr1)){
                                if($rr1 == 0){

                                ?>
                                <tr>
                                    <td><b>บันทึก</b></td>
                                </tr>
                                <tr>
                                        <td>
                                        <input type="hidden" name="paper_detail_id" value="<?php echo $paper_detail_id; ?>"/>
                                        <input type="submit" value="บันทึก"  class="bt-submit thsarabunnew" name="btn_submit"/>
    <!--                                    <br/><br/><b class="thsarabunnew" style="color:red;">*** ก่อนกดบันทึกกรุณาเลือกผู้ตรวจทั้ง 3 คน มิฉะนั้นระบบจะตั้งเป็นค่าเริ่มต้น</b>-->
    <!--                                    <br/><br/><b class="thsarabunnew" style="color:red;">*** ต้องเลือกคนตรวจอย่างน้อย 1 คนขึ้นไป</b>-->
                                    </td>
                                </tr>
                                <?php
                                }
                            }
                            ?>
                        </table>
                        <?php echo form_close(); ?>

                    </div>
                </div><!-- class = row -->
            </div>
        </div>
    </div><!-- end content -->
</div><!-- end col-xs-12 -->



</body>
</html>