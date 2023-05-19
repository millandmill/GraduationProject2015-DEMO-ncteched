<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีไฟล์ประกาศรายละเอียดการส่งบทความอยู่ในระบบ<br/>กรุณาเพิ่มไฟล์ประกาศรายละเอียดการส่งบทความ</font>";
    if(isset($footer)){
        $resultData = $footer;
        $countData = count($resultData);
    }
    
    
    
    
  $primaryID = 'file_announce_id';
  $dataShow = array(
        'option' => array('แก้ไข', '', '5', 'center', 'center'),
        'file_announce_id' => array('ID', 'file_announce_id', '5%', 'center;min-width:50px;max-width:50px;', 'center'),
        'file_announce_status' => array('สถานะแสดงหน้าเว็บ',  'file_announce_status', '20%', 'center;min-width:250px;max-width:250px;', 'center'),
        'file_announce_name' => array('ชื่อไฟล์',  'file_announce_name', '25%', 'center;min-width:250px;max-width:250px;', 'center'),
        'file_announce_conferences_on' => array('ประชุม ครั้งที่',  'file_announce_conferences_on', '25%', 'center;min-width:120px;max-width:120px;', 'center'),
        'file_announce_note' => array('รายละเอียด', 'file_announce_note', '20%', 'center;min-width:100px;max-width:100px;', 'left'),
        
        );

  $picshow = 1;
  
?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-user"></i>&nbsp;ไฟล์ประกาศรายละเอียดการส่งบทความ ทั้งหมด<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right"> 
                          <!-- START CONTROL BUTTON -->
                          <button name="add" type="button" class="btn btn-success btn-addp thsarabunnew" <?php  if($countData>=1){echo "disabled";} ?> onclick="location.href='<?php echo base_url(); ?>front/announce_file_add';">
                                  <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                  
                                  <?php  if($countData>=1){echo "สามารถเพิ่มไฟล์ประกาศได้เพียง 1 ไฟล์";}else{  echo "<span>เพิ่มไฟล์ประกาศ</span>";} ?>
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
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>front/announce_file_add?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                    </td>
                                                    <?php break;
                                                  default: ?>
                                                    <td class="text2input" style="text-align:<?php echo $dataShow[$key][4]; ?>;">
                                                      <?php if(!isset($rows[$dataShow[$key][1]])){
                                                        $rows[$dataShow[$key][1]] =" ";
                                                        echo $rows[$dataShow[$key][1]];
                                                        
                                                      }else{
          
                                                        $picshow=$picshow+1;
                                                        if(strpos('/'.$rows[$dataShow[$key][1]].'/',"NC-conferences")==true)         
                                                        {   
                                                            echo '<center><a href="'.base_url().'/public/download/announce/'.$rows[$dataShow[$key][1]].'" >'.$rows[$dataShow[$key][1]].'</a></center>';  
                                                        }   
                                                        else
                                                        {
                                                            if(($rows[$dataShow[$key][1]]=='YES')||($rows[$dataShow[$key][1]]=='NO'))
                                                            {
                                                                if($rows[$dataShow[$key][1]]=='YES')
                                                                {
                                                                    echo "YES";
                                                        ?>
                                                                <br/><br/><button name="edit" type="button" class="btn btn-danger thsarabunnew" onclick="location.href='<?php echo base_url(); ?>front/disable_announce_file?c_id=<?php echo $rowID; ?>';"><b>กดเพื่อไม่ให้แสดงข้อมูลหน้าเว็บ</b></button>
                                                        
                                                        <?php
                                                                }
                                                                if($rows[$dataShow[$key][1]]=='NO')
                                                                {
                                                                    echo "NO";
                                                        ?>
                                                                <br/><br/><button name="edit" type="button" class="btn btn-success thsarabunnew" onclick="location.href='<?php echo base_url(); ?>front/enabled_announce_file?c_id=<?php echo $rowID; ?>';"><b>กดเพื่อให้แสดงข้อมูลหน้าเว็บ</b></button>
                                                        <?php        
                                                                }
                                                                
                                                            }
                                                            else
                                                            {
                                                                echo $rows[$dataShow[$key][1]];
                                                            }
                                                      }} ?>
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