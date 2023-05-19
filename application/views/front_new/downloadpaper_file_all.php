<link href="<?php echo base_url().'public/lib/';?>css/pagination.css" rel="stylesheet" type="text/css" />

<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีงานวิจัยแบบรวมเล่มอยู่ในระบบ<br/>กรุณาเพิ่มงานวิจัยแบบรวมเล่ม</font>";
    if(isset($paper_book)){
        $resultData = $paper_book;
        $countData = count($resultData);
    }
    
    
    
    
  $primaryID = 'downloadpaper_file_id';
  $dataShow = array(
        'downloadpaper_file_id' => array('ID', 'downloadpaper_file_id', '5%', 'center', 'center'),
        'downloadpaper_file_name' => array('ชื่อไฟล์',  'downloadpaper_file_name', '40%', 'center', 'left'),
        'downloadpaper_file_year' => array('ปี', 'downloadpaper_file_year', '20%', 'center', 'center'),
        'downloadpaper_file_no' => array('ประชุมครั้งที่', 'downloadpaper_file_no', '20%', 'center; min-width:110px', 'center'),
        'option' => array('แก้ไข', '', '15%', 'center; min-width:135px', 'center'),
        );

  $picshow = 1;
  
?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-time"></i>&nbsp;ผลงานวิจัยที่ผ่านมา (ตีพิมพ์รวมเล่ม)<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right"> 
                          <!-- START CONTROL BUTTON -->
                          <button name="add" type="button" class="btn btn-success btn-addp thsarabunnew" onclick="location.href='<?php echo base_url(); ?>front/downloadpaper_file_add';">
                                  <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                  <span>เพิ่มงานวิจัยแบบรวมเล่ม</span>
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
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>front/downloadpaper_file_add?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                        <button name="del" class="btn glyphicon glyphicon-remove" onclick="location.href='<?php echo base_url(); ?>front/downloadpaper_file_del?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                    </td>
                                                    <?php break;
                                                  default: ?>
                                                    <td class="text2input" style="text-align:<?php echo $dataShow[$key][4]; ?>;">
                                                      <?php if(!isset($rows[$dataShow[$key][1]])){
                                                        $rows[$dataShow[$key][1]] =" ";
                                                        echo $rows[$dataShow[$key][1]];
                                                        
                                                      }else{
          
                                                        $picshow=$picshow+1;
                                                        if(strpos('/'.$rows[$dataShow[$key][1]].'/',"NCTechEd")==true)         
                                                        {   
                                                            echo '<a href="'.base_url().'/public/download/DBPass/'.$rows[$dataShow[$key][1]].'" >'.$rows[$dataShow[$key][1]].'</a>';  
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