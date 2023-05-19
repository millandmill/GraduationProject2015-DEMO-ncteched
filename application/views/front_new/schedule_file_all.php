
<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีไฟล์ตารางการนำเสนอบทความอยู่ในระบบ<br/>กรุณาเพิ่มไฟล์ตารางการนำเสนอบทความ</font>";
    if(isset($schedule)){
        $resultData = $schedule;
        $countData = count($resultData);
    }

  $primaryID = 'file_schedule_id';
  $dataShow = array(
        'option' => array('แก้ไข', '', '5', 'center', 'center'),
        'file_schedule_id' => array('ID', 'file_schedule_id', '5%', 'center;min-width:50px;max-width:50px;', 'center'),
        'file_schedule_name' => array('ชื่อไฟล์',  'file_schedule_name', '25%', 'center;min-width:450px;max-width:450px;', 'center'),
        'file_schedule_conferences_on' => array('ประชุม ครั้งที่',  'file_schedule_conferences_on', '25%', 'center;min-width:120px;max-width:120px;', 'center'),
        'file_schedule_note' => array('รายละเอียด', 'file_schedule_note', '40%', 'center;min-width:100px;max-width:100px;', 'left'),
        
        );

  $picshow = 1;
  
?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-user"></i>&nbsp;ไฟล์ตารางการนำเสนอบทความ ทั้งหมด<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right"> 
                          <!-- START CONTROL BUTTON -->
                          <button name="add" type="button" class="btn btn-success btn-addp thsarabunnew" <?php  if($countData>=1){echo "disabled";} ?> onclick="location.href='<?php echo base_url(); ?>front/schedule_file_add';">
                                  <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                  
                                  <?php  if($countData>=1){echo "สามารถเพิ่มไฟล์ตารางได้เพียง 1 ไฟล์";}else{  echo "<span>เพิ่มไฟล์ตาราง</span>";} ?>
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
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>front/schedule_file_add?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                    </td>
                                                    <?php break;
                                                  default: ?>
                                                    <td class="text2input" style="text-align:<?php echo $dataShow[$key][4]; ?>;">
                                                      <?php if(!isset($rows[$dataShow[$key][1]])){
                                                        $rows[$dataShow[$key][1]] =" ";
                                                        echo $rows[$dataShow[$key][1]];
                                                        
                                                      }else{
          
                                                        $picshow=$picshow+1;
                                                        if(strpos('/'.$rows[$dataShow[$key][1]].'/',"NCtechEd")==true)         
                                                        {   
                                                            echo '<center><a href="'.base_url().'/public/download/schedule/'.$rows[$dataShow[$key][1]].'" >'.$rows[$dataShow[$key][1]].'</a></center>';  
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