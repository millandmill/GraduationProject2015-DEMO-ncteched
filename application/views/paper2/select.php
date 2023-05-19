<?php 
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    /*
    if(isset($public)){
        $resultData = $public;
    }
*/
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
                                            <td style=" min-width: 200px" class="thsarabunnew"><strong>ชื่อบทความภาษาไทย</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->paper_detail_name_th)){ echo $r->paper_detail_name_th; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>ชื่อบทความภาษาอังกฤษ</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->paper_detail_name_en)){ echo $r->paper_detail_name_en; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>สาขาวิชา</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->department_id)){ echo $r->department_name; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>คำสำคัญภาษาไทย</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->paper_detail_keyword_th)){ echo $r->paper_detail_keyword_th; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>คำสำคัญภาษาอังกฤษ</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->paper_detail_keyword_en)){ echo $r->paper_detail_keyword_en; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>บทคัดย่อภาษาไทย</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->paper_detail_abstract_th)){ echo $r->paper_detail_abstract_th; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>บทคัดย่อภาษาอังกฤษ</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->paper_detail_abstract_en)){ echo $r->paper_detail_abstract_en; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>ปี/ครั้งที่ประชุม</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->conferences_select_note)){ echo $r->conferences_select_note; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>สถานะ</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->paper_detail_status)){ echo $r->paper_detail_status_name; } ?></td>
                                        </tr>
                                        <tr>
                                            <td class="thsarabunnew"><strong>ผู้ร่วมงานวิจัย</strong></td>
                                            <td class="thsarabunnew">
                                                <table class="table table-striped table-bordered" id="main-table">
                                                    <tr  style="border: 1px solid black;">
                                                        <td style="min-width:20px;"><b>คนที่</b></td>
                                                        <td style="min-width:220px;"><b>ชื่อ</b></td>
                                                        <td style="min-width:200px;"><b>อีเมล</b></td>
                                                        <td style="min-width:200px;"><b>ที่อยู่</b></td>
                                                        <td style="min-width:200px;"><b>เบอร์โทรศัพท์</b></td>
                                                    </tr>
                                                    <?php if(isset($r->paper_detail_id)){
                                                        $rs = $this->paper->get_paper_owner($r->paper_detail_id);
                                                        $num=1;
                                                        if ($rs > 0){
                                                            foreach ($rs as $r1){
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php  echo $num; ?>
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
                                                            <?php echo $r1->paper_detail_owner_tel; ?>
                                                        </td>
                                                    </tr> 
                                                            <?php $num++; }}
                                                            else{
                                                            ?>
                                                        <tr>
                                                            <td colspan="5">
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
                                                <table class="table table-striped table-bordered" id="main-table">
                                                    <tr  style="border: 1px solid black;">
                                                        <td style="min-width:200px;"><b>ไฟล์งาน</b></td>
                                                        <td style="min-width:300px;"><b>ความคิดเห็น</b></td>
                                                        <td><b>ให้ความคิดเห็น</b></td>
                                                    </tr>
                                                        <?php
                                                            $rs = $this->upload_file->get_file_by_paper_detail_id($r->paper_detail_id);
                                                            $num=1;
                                                            foreach ($rs as $r){  
                                                            ?>
                                                    <tr>
                                                        <td>

                                                            <code> <?php  echo "ส่งครั้งที่ ".$num; ?> <a href="<?php echo base_url(); ?>uploadfile/download/<?php echo $r->paper_file_hash_str; ?>" target = '_blank'><?php echo $r->paper_file_show; ?></a></code>
                                                        </td>
                                                        <td><?php $on_rs = $this->paper2->get_result_evaluation($r->paper_detail_id,$r->paper_file_id,$this->session->userdata('user_id')); ?>
                                                            <?php if(isset($on_rs->evaluation_id)){ ?>
                                                                <?php $no_comment = $this->paper2->get_numrow_evaluation_comment($on_rs->evaluation_id,$this->session->userdata('user_id')); ?>
                                                                <?php if($no_comment == true){ ?>
                                                                <a href="<?php echo base_url(); ?>evaluation/result_view?c_id=<?php echo $on_rs->evaluation_id; ?>" target="_blank"><?php echo 'ดูความคิดเห็น';?></a>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12">

                                                                <input type="hidden" name="file_id" value="<?php echo $r->paper_file_id; ?>"/>
                                                                <input type="hidden" name="paper_detail_id" value="<?php echo $r->paper_detail_id; ?>"/>
                                                                <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>"/>

                                                                <span class="text-danger"><?php if (isset($error)) { echo $error; } ?></span>
                                                                <?php $no_rs = $this->paper2->get_numrow_evaluation($r->paper_detail_id,$r->paper_file_id,$this->session->userdata('user_id')); ?>
                                                                <?php if($no_rs == FALSE){ ?>
                                                                <button name="edit" class="btn glyphicon glyphicon-hand-up" onclick="location.href='<?php echo base_url(); ?>evaluation/evaluation_add?c_id=<?php echo $r->paper_file_id; ?>';"><i class="fa fa-edit"></i></button>
                                                                <?php }elseif($no_rs == TRUE){ ?>
                                                                    <?php if($no_comment == FALSE){ ?>

                                                                        <button name="edit" class="btn glyphicon glyphicon-hand-up" onclick="location.href='<?php echo base_url(); ?>evaluation/add_result?c_id=<?php echo $on_rs->evaluation_id; ?>';"><i class="fa fa-edit"></i></button>
                                                                    <?php }else{ ?>

                                                                        <button disabled name="edit" class="btn glyphicon glyphicon-hand-up"><i class="fa fa-edit"></i></button>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                        </tr> 
                                                             <?php
                                                             $num++;
                                                             }
                                                         ?>                    
                                                 <div class="thsarabunnew" style="color: red;">***** การส่งไฟล์ให้ความคิดเห็นสามารถส่งได้ครั้งเดียว<br/>***** เมื่อคณะกรรมการทำการอนุมัติงานวิจัยแล้ว ส่งแล้วผู้ส่งบทความสามารถเห็นความคิดเห็นของผู้ตรวจบทความได้ทันที</div><br/>  
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
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="<?php echo base_url().'public/lib/';?>js/site.js"></script>
    <script src="<?php echo base_url().'public/lib/';?>js/ajaxfileupload.js"></script>
</body>
</html>