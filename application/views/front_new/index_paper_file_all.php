<link href="<?php echo base_url().'public/lib/';?>css/pagination.css" rel="stylesheet" type="text/css" />
<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีสารบัญงานวิจัยที่ได้รับการตีพิมพ์อยู่ในระบบ<br/>กรุณาเพิ่มสารบัญงานวิจัยที่ได้รับการตีพิมพ์</font>";
    if(isset($index_paper_book)){
        $resultData = $index_paper_book;
        $countData = count($resultData);
    }

  $primaryID = 'index_paper_file_id';
  $dataShow = array(
        'index_paper_file_id' => array('ID', 'index_paper_file_id', '5%', 'center', 'center'),
        'index_paper_file_key' => array('รหัสหมายเลขงานวิจัย', 'index_paper_file_key', '20%', 'center; min-width:175px', 'center'),   
        'index_paper_file_name' => array('ชื่องานวิจัย',  'index_paper_file_name', '30%', 'center; min-width:300px', 'left'),
        'index_paper_file_author' => array('ชื่อผู้แต่งหรือผู้ร่วมแต่ง',  'index_paper_file_author', '30%', 'center; min-width:300px', 'left'),
        'index_paper_file_year' => array('ปี', 'index_paper_file_year', '10%', 'center', 'center'),
        'index_paper_file_department_name' => array('สาขา', 'index_paper_file_department_name', '20%', 'center; min-width:150px', 'center'),
        'index_paper_file_no' => array('ประชุมครั้งที่', 'index_paper_file_no', '10%', 'center; min-width:110px', 'center'),
        'index_paper_file_page' => array('อยู่หน้าที่', 'index_paper_file_page', '10%', 'center; min-width:110px', 'center'),
        'option' => array('แก้ไข', '', '5%', 'center; min-width:115px', 'center'),
        );
  $picshow = 1;
  
?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-th-list"></i>&nbsp;สารบัญงานวิจัยที่ได้รับการตีพิมพ์<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right"> 
                          <!-- START CONTROL BUTTON -->
                          <button name="add" type="button" class="btn btn-success btn-addp thsarabunnew" onclick="location.href='<?php echo base_url(); ?>front/index_paper_file_add';">
                                  <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                  <span>เพิ่มสารบัญงานวิจัยที่ได้รับการตีพิมพ์</span>
                          </button>
                          
                          <!-- END CONTROL BUTTON -->
                      </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12"> 
                                
                              <!-- ช่องค้นหา -->
                              <br style="display: block; margin: 0.5px 0; content:' ';" />
                              <div class="input-group has-feedback has-clear">
                                  <span class="input-group-addon thsarabunnew">กรองสารบัญ</span>
                                  <input type="text" class="form-control table-filter thsarabunnew" style="line-height: 2.2em;" data-table="table" placeholder=" ใส่คำค้น...">
                                    <span class="form-control-clear glyphicon glyphicon-remove form-control-feedback hidden"></span>
                              </div>
                              <br style="display: block; margin: 0.5px 0; content:' ';" />
                              <!--// ช่องค้นหา -->
                          
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
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>front/index_paper_file_add?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                        <button name="del" class="btn glyphicon glyphicon-remove" onclick="location.href='<?php echo base_url(); ?>front/index_paper_file_del?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
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
<?php $this->load->view('template/filter/filter_search'); ?>