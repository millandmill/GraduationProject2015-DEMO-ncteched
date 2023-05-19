<link href="<?php echo base_url().'public/lib/';?>css/pagination.css" rel="stylesheet" type="text/css" />

<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีรูป hearder อยู่หน้าเว็บอยู่ในระบบ<br/>กรุณาเพิ่มรูป hearder</font>";
    if(isset($header)){
        $resultData = $header;
        $countData = count($resultData);
    }
    
    
    
    
  $primaryID = 'header_id';
  $dataShow = array(
        'header_id' => array('ID', 'header_id', '5%', 'center', 'center'),
        'header_pic' => array('รูป',  'header_pic', '25%', 'center', 'left'),
        'header_url' => array('url', 'header_url', '5%', 'center', 'center'),
        'header_status' => array('สถานะ', 'header_status', '40%', 'center', 'left'),
        'option' => array('แก้ไข', '', '5', 'center', 'center'),
        );

  $picshow = 1;
  
?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-user"></i>&nbsp;กำหนดรูปสำหรับ Header<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right"> 
                          <!-- START CONTROL BUTTON -->
                          <button name="add" type="button" <?php if($countData>=2) echo "disabled"; ?> class="btn btn-success btn-addp thsarabunnew" onclick="location.href='<?php echo base_url(); ?>front/header_add';">  
                                  <?php if($countData<2) echo "<i class='glyphicon glyphicon-plus'></i>&nbsp; <span>เพิ่มรูป hearder หน้าเว็บ</span>"; ?>
                                  <?php if($countData>=2) echo "<span>ภาพ Header ใส่ครบแล้ว</span>"; ?>
                          </button>
                          
                          <!-- END CONTROL BUTTON -->
                      </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12"> 
                              <table class="table table-striped table-bordered" id="main-table">
                                <thead class="pon-thead">
                                    <!-- หัวข้อ -->
                                  <tr class="thsarabunnew">
                                    <?php foreach($dataShow as $key => $value) { ?>
                                      <th width="<?php echo $dataShow[$key][2]; ?>" style="text-align:<?php echo $dataShow[$key][3]; ?>">
                                        <?php echo $value[0]; ?>
                                      </th>
                                    <?php } ?>
                                  </tr>
                                </thead>
                                <tbody id="view_inventory">
                                  <?php   ?>
                                  <?php if(isset($links)){ echo $links; } ?>
                                  <?php if(isset($resultData)){ ?>
                                      <?php foreach ($resultData as $rows) {
                                        $rowID = $rows[$primaryID]; ?>
                                            <!-- เนื้อหา -->
                                            <tr class="thsarabunnew">
                                              <?php foreach($dataShow as $key => $value) { ?>
                                                <?php switch ($key) {
                                                  case 'option': ?>
                                                    <td style="width:100px;text-align:center;">
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>front/header_add?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                    </td>
                                                    <?php break;
                                                  default: ?>
                                                    <td class="text2input" style="text-align:<?php echo $dataShow[$key][4]; ?>;">
                                                      <?php if(!isset($rows[$dataShow[$key][1]])){
                                                        $rows[$dataShow[$key][1]] =" ";
                                                        echo $rows[$dataShow[$key][1]];
                                                        
                                                      }else{
          
                                                        $picshow=$picshow+1;
                                                        if(($picshow=="3")||($picshow=="7"))
                                                        {   
                                                            echo '<center><img src="'.base_url().'/uploads/pic-header/'.$rows[$dataShow[$key][1]].'" border="0" height="120px" width="120px"></center>';;  
                                                        }   else echo $rows[$dataShow[$key][1]];
                                                      } ?>
                                                    </td>
                                                  <?php break; ?>
                                                <?php } ?>
                                              <?php } ?>
                                            </tr>
                                      <?php } ?>
                                  <?php }else { echo $text ; echo"<br/><br/>"; } ?>
                                </tbody>
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
<?php $this->load->view('template/pagination/pagination_system'); ?>