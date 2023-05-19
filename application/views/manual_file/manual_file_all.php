<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีไฟล์คู่มือการใช้งานอยู่ในระบบ<br/>กรุณาเพิ่มไฟล์คู่มือการใช้งาน</font>";
    if(isset($manual)){
        $resultData = $manual;
        $countData = count($resultData);
    }
    
    
    
    
  $primaryID = 'file_manual_id';
  $dataShow = array(
        'option' => array('แก้ไข', '', '5', 'center', 'center'),
        'file_manual_id' => array('ID', 'file_manual_id', '5%', 'center;min-width:50px;max-width:50px;', 'center'),
        'file_manual_type' => array('ประเภท',  'file_manual_type', '25%', 'center;min-width:150px;max-width:150px;', 'center'),
        'file_manual_name' => array('ชื่อไฟล์',  'file_manual_name', '25%', 'center;min-width:360px;max-width:360px;', 'left'),
        'file_manual_note' => array('รายละเอียด', 'file_manual_note', '40%', 'center;min-width:100px;max-width:100px;', 'left'),
        
        );

  $picshow = 1;
  
?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-book"></i>&nbsp;ไฟล์คู่มือการใช้งาน ทั้งหมด<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
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
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>manual_file/manual_file_add?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                    </td>
                                                    <?php break;
                                                  default: ?>
                                                    <td class="text2input" style="text-align:<?php echo $dataShow[$key][4]; ?>;">
                                                      <?php if(!isset($rows[$dataShow[$key][1]])){
                                                        $rows[$dataShow[$key][1]] =" ";
                                                        echo $rows[$dataShow[$key][1]];
                                                        
                                                      }else{
          
                                                        $picshow=$picshow+1;
                                                        if(strpos('/'.$rows[$dataShow[$key][1]].'/',"NC-manual-")==true)         
                                                        {   
                                                            echo '<a href="'.base_url().'/public/download/manual/'.$rows[$dataShow[$key][1]].'" >'.$rows[$dataShow[$key][1]].'</a>';  
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