<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีกำหนดการประชุมวิชาการอยู่ในระบบ<br/>กรุณาเพิ่มโปรแกรม</font>";
    if(isset($program_date)){
        $resultData = $program_date;
        $countData = count($resultData);
    }
    
  $primaryID = 'program_date_id';
  $dataShow = array(
        'program_date_name' => array('โปรแกรม', 'program_date_name', '10%', 'center; min-width:550px', 'left'),
        'program_date_day' => array('ปี/เดือน/วัน', 'program_date_day', '10%', 'center; min-width:100px', 'center'),
        'program_date_time_start' => array('เวลาเริ่ม', 'program_date_time_start', '10%', 'center; min-width:100px', 'center'),
        'program_date_time_end' => array('เวลาสิ้นสุด', 'program_date_time_end', '10%', 'center; min-width:100px', 'center'),
        'option' => array('ตัวเลือก', '', '30%', 'center', 'center'),
        );

?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-hourglass"></i>&nbsp;จัดการ<br/>กำหนดการประชุมวิชาการ<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right">
                          <!-- START CONTROL BUTTON -->
                              <button name="add" type="button" class="btn btn-success btn-addp thsarabunnew" onclick="location.href='<?php echo base_url(); ?>time/program_date_edit';">
                                  <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                  <span>เพิ่มโปรแกรม</span>
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
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>time/program_date_edit?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                        <button name="del" class="btn glyphicon glyphicon-remove" onclick="location.href='<?php echo base_url(); ?>time/program_date_del?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
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