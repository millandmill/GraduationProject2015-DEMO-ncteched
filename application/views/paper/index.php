<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีข้อมูลงานวิจัยอยู่ในระบบ<br/>ท่านยังไม่ส่งงานวิจัยในการประชุมครั้งนี้</font>";
    if(isset($public)){
        $resultData = $public;
        $countData = count($resultData);
    }
    
  $primaryID = 'paper_detail_id';
  $dataShow = array(
        'paper_numbering_code' => array('รหัสบทความ', 'paper_numbering_code', '20%', 'center', 'center'),
        'paper_detail_name_th' => array('ชื่องานวิจัย', 'paper_detail_name_th', '60%', 'center; min-width:400px', 'left'),
        'paper_detail_year' => array('วัน/เดือน/ปี ที่ส่ง', 'paper_detail_year', '30%', 'center; min-width:150px', 'center'),
        'option' => array('รายละเอียด', '', '5', 'center', 'center'),
        );

?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-file"></i>&nbsp;<?php echo $title ?><span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right">
                          <!-- START CONTROL BUTTON -->
                          <?php if($btn_flg){ ?>
                              <button name="add" type="button" class="btn btn-success btn-addp thsarabunnew" onclick="location.href='<?php echo base_url(); ?>paper/paper_detail_add';">
                                  <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                  <span>เพิ่มงานวิจัย</span>
                              </button>
                          <?php } ?>
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
                                                        <button name="edit" class="btn glyphicon glyphicon-zoom-in" onclick="location.href='<?php echo base_url(); ?>paper/show_detail/<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
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