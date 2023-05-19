<link href="<?php echo base_url().'public/lib/';?>css/pagination.css" rel="stylesheet" type="text/css" />
<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีข่าวประกาศหน้าเว็บอยู่ในระบบ<br/>กรุณาเพิ่มข่าวประกาศหน้าเว็บ</font>";
    if(isset($news_public)){
        $resultData = $news_public;
        $countData = count($resultData);
    }
    
  $primaryID = 'news_public_id';
  $dataShow = array(
        'option' => array('แก้ไข', '', '5', 'center', 'center'),
        'news_public_id' => array('ID_news', 'news_public_id', '5%', 'center', 'center'),
        'news_name' => array('ชื่อเรื่อง', 'news_name', '40%', 'center;min-width:250px', 'left'),
        'news_description' => array('รายละเอียด', 'news_description', '25%', 'center;min-width:200px', 'left'),
        'news_type_status' => array('สถานะ', 'news_type_status', '5%', 'center', 'center'),
        'news_public_date' => array('ปี/เดือน/วัน', 'news_public_date', '15%', 'center;min-width:150px', 'center'),
        'news_public_times' => array('เวลา', 'news_public_times', '5%', 'center', 'center'),
        );

?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-align-justify"></i>&nbsp;ข่าวประกาศหน้าเว็บ<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right">
                          <!-- START CONTROL BUTTON -->
                              <button name="add" type="button" class="btn btn-success btn-addp thsarabunnew" onclick="location.href='<?php echo base_url(); ?>news/news_public_add';">
                                  <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                  <span>เพิ่มข่าวประกาศหน้าเว็บ</span>
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
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>news/news_public_add?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                        <button name="del" class="btn glyphicon glyphicon-remove" onclick="location.href='<?php echo base_url(); ?>news/news_public_del?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
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
<?php $this->load->view('template/pagination/pagination_system'); ?>