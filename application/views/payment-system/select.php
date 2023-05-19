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
                                    <i class="glyphicon glyphicon-btc"></i></i>&nbsp;รายละเอียดการชำระเงิน
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
                                        <?php if($r->paper_detail_status == 4 || $r->paper_detail_status == 5){ ?>
                                        
                                        <?php echo form_open_multipart('payment_system/upload');?>
                                        <tr>
                                            <td class="thsarabunnew"><strong>อัปโหลดสลิป</strong></td>
                                            <td class="thsarabunnew"><div><input type="file" name="filename" size="20" required="" /><br /></div>
                                                <b class="thsarabunnew" style="color:red;">*** อนุญาติให้อัฟโหลดสลิปเฉพาะไฟล์สกุล .pdf .jpg .png</b><br/>
                                                <input type="hidden" name="paper_detail_id" value="<?php echo $r->paper_detail_id; ?>"/>
                                                <div><input class="btn btn-primary" type="submit" value="Upload" /></div>
                                            </td>
                                        </tr>
                                        <?php echo form_close(); ?>
                                        <?php } ?>
                                        <tr>
                                            <td class="thsarabunnew"></td>
                                            <td class="thsarabunnew">
                                                
                                                
                                                
                                                <div><strong>ประวัติการอัพโหลดสลิป</strong></div>
                                                <table class="table table-striped table-bordered" id="main-table">
                                                    <tr  style="border: 1px solid black;">
                                                        <td style="min-width:90px;"><b><center>ครั้งที่</center></b></td>
                                                        <td style="min-width:280px;"><b><center>ชื่อไฟล์</center></b></td>
                                                        <td style="min-width:180px;"><b><center>วันเวลาที่อัปโหลด</center></b></td>
                                                        <td style="min-width:200px;"><b><center>สถานะ</center></b></td>
                                                    </tr>
                                                    
                                                    <?php
                                                
//                                                    $this->db->select('*');
//                                                    $this->db->where('paper_detail_id',$r->paper_detail_id );
//                                                    $query = $this->db->get('payment_system');

                                                    $query = $this->payment_system->get_payment_with_hash($r->paper_detail_id);
                                                    $num=1;
                                                    foreach ($query->result() as $row)
                                                        {

                                                    ?>
                                                    
                                                    <tr>
                                                        <td style="width:120px;"><?php echo '<center>'.$num.'</center>'; ?></td>
                                                        <td><?php if(isset($row->payment_system_showslip_filename)){ ?>
                                                            
                                                            <div class="thsarabunnew"><a href="<?php echo base_url(); ?>uploadfile/download_payment/<?php echo $row->payment_system_hash_str; ?>" target="_blank"><?php echo $row->payment_system_showslip_filename; ?></a></div>
                                                        
                                                        <?php }?></td>
                                                        
                                                        <td><?php if(isset($row->payment_system_date)){ echo $row->payment_system_date; } ?></td>
                                                        <td><?php if(isset($row->payment_system_status)){ echo $row->payment_system_status; } ?></td>
                                                    </tr>
                                                    <?php
                                                    $num++;
                                                        }
                                                    ?>
                                                    
                                                    
                                                    
                                                </table>
                                            </td>
                                        </tr>
                                        <?php if($r->paper_detail_status == 6 || $r->paper_detail_status == 7){ ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><div class="thsarabunnew"><b style="color: red;">รอการตีพิมพ์</b></div></td>
                                                    </tr>    
                                                    
                                                    
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
</body>
</html>
