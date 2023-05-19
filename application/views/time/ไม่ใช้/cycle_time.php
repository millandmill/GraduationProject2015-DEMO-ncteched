<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีวันเวลาการเข้าใช้งานอยู่ในระบบ<br/>กรุณาเพิ่มวันเวลาการเข้าใช้งาน</font>";
    if(isset($time_cycle)){
        $resultData = $time_cycle;
        $countData = count($resultData);
    }
    
  $primaryID = 'time_cycle_id';
  $dataShow = array(
        'option' => array('แก้ไข', '', '5%', 'center', 'center'),
        //'time_cycle_id' => array('ID_cycle', 'time_cycle_id', '2%', 'center', 'center'),
        'time_cycle_name' => array('กลุ่ม', 'time_cycle_name', '50%', 'center; min-width:200px', 'left'),
        'time_cycle_date_start' => array('วันที่เริ่ม', 'time_cycle_date_start', '10%', 'center; min-width:120px', 'center'),
        'time_cycle_date_end' => array('วันที่สิ้นสุด', 'time_cycle_date_end', '10%', 'center; min-width:120px', 'center'),
        'time_cycle_status' => array('สถานะ', 'time_cycle_status', '10%', 'center', 'center'),
        );

?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-hourglass"></i>&nbsp;จัดการ<br/>วันเวลาการเข้าใช้งาน<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right">
                          <!-- START CONTROL BUTTON -->                          
                              <!-- <button name="add" type="button" <?php if($countData>=4) echo "disabled"; ?> class="btn btn-success btn-addp thsarabunnew" onclick="location.href='<?php echo base_url(); ?>time/cycle_time_edit';">  
                                  <?php if($countData<4) echo "<i class='glyphicon glyphicon-plus'></i>&nbsp; <span>เพิ่มวันเวลาการเข้าใช้งาน</span>"; ?>
                                  <?php if($countData>=4) echo "<span>เพิ่มวันเวลาการเข้าใช้งานครบแล้ว</span>"; ?>
                              </button>  -->  
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
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>time/cycle_time_edit?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                    </td>
                                                    <?php break;
                                                  default: ?>
                                                    <td class="text2input" style="text-align:<?php echo $dataShow[$key][4]; ?>;">
                                                      <?php if(!isset($rows[$dataShow[$key][1]])){
                                                        $rows[$dataShow[$key][1]] =" ";
                                                        echo $rows[$dataShow[$key][1]];
                                                      }else{
                                                        echo $rows[$dataShow[$key][1]];
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