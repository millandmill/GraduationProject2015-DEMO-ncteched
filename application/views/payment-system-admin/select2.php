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
                                    <i class="glyphicon glyphicon-briefcase"></i></i>&nbsp;รายละเอียดการชำระเงิน
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
                                            <td style=" min-width: 200px" class="thsarabunnew"><strong>ชื่อบทความภาษาไทย</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->paper_detail_name_th)){ echo $r->paper_detail_name_th; } ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="thsarabunnew"><strong>สถานะ</strong></td>
                                            <td class="thsarabunnew"><?php if(isset($r->paper_detail_status)){ echo $r->paper_detail_status_name; } ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="thsarabunnew"></td>
                                            <td class="thsarabunnew">
                                                <b style="color:red;">** ถ้าเปลี่ยนเป็นสถานะผ่านแล้ว จะเปลี่ยนเป็นสถานะไม่ผ่านไม่ได้</b>
                                                <br/><b style="color:red;">** การเปลี่ยนสถานะทุกครั้ง จะมีการส่ง E-mail แจ้งการเปลี่ยนสถานะ ไปยัง ผู้ส่งบทความวิจัย</b>
                                                <div><br/><strong>ประวัติการอัพโหลดสลิป</strong></div><br/>
                                                <table class="table table-striped table-bordered" id="main-table">
                                                    <tr style="border: 1px solid black;">
                                                        <td style=" min-width:60px;"><b><center>ครั้งที่</center></b></td>
                                                        <td style=" min-width:200px;"><b><center>ชื่อไฟล์</center></b></td>
                                                        <td style=" min-width:180px;"><b><center>วันเวลาที่อัปโหลด</center></b></td>
                                                        <td style=" min-width:170px;"><b><center>สถานะ</center></b></td>
                                                    </tr>
                                                    
                                                    <?php
                                                
//                                                    $this->db->select('*');
//                                                    $this->db->where('paper_detail_id',$r->paper_detail_id );
//                                                    $query = $this->db->get('payment_system');

                                                    $query = $this->payment_system_admin->get_payment_with_hash($r->paper_detail_id);
                                                    $num=1;
                                                    foreach ($query->result() as $row)
                                                        {
                                                    ?>
                                                    
                                                    <tr>
                                                        <td style="width:120px;"><?php echo '<center>'.$num.'</center>'; ?></td>
                                                        <td><?php if(isset($row->payment_system_showslip_filename)){ ?>
                                                            
                                                            <div class="thsarabunnew"><a href="<?php echo base_url(); ?>index.php/uploadfile/download_payment/<?php echo $row->payment_system_hash_str; ?>"><?php echo $row->payment_system_showslip_filename; ?></a></div>
                                                        
                                                        <?php }?></td>
                                                        <td><?php if(isset($row->payment_system_date)){ echo $row->payment_system_date; } ?></td>
                                                        <td>
                                                        
                                                        <?php 
                                                            if($row->payment_system_status == 'กำลังตรวจสอบ'){ echo 'กำลังตรวจสอบ'; } 
                                                            if($row->payment_system_status == 'ไม่สามารถตรวจสอบได้'){ echo 'ไม่สามารถตรวจสอบได้'; } 
                                                            if($row->payment_system_status == 'ชำระเงินเรียบร้อยแล้ว'){ echo 'ชำระเงินเรียบร้อยแล้ว'; } 
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
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="<?php echo base_url().'public/lib/';?>js/site.js"></script>
    <script src="<?php echo base_url().'public/lib/';?>js/ajaxfileupload.js"></script>
</body>
</html>