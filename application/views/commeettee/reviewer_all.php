<link href="<?php echo base_url().'public/lib/';?>css/pagination.css" rel="stylesheet" type="text/css" />
<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีรายชื่อผู้ตรวจบทความอยู่ในระบบ<br/>กรุณาเพิ่มรายชื่อผู้ตรวจบทความ</font>";
    if(isset($reviewer)){
        $resultData = $reviewer;
        $countData = count($resultData);
    }
    
  $primaryID = 'commeettee_id';
  $dataShow = array(
        'option' => array('แก้ไข', '', '10%', 'center; min-width:270px', 'center'),
        'commeettee_id' => array('ID', 'commeettee_id', '10%', 'center; min-width:50px', 'center'),
        'username' => array('ชื่อผู้ใช้', 'username', '10%', 'center; min-width:150px', 'center'),    
        'commeettee_fname' => array('ชื่อ-นามสกุล', 'commeettee_fname', '10%', 'center; min-width:150px', 'left'),
        'commeettee_address' => array('ที่อยู่', 'commeettee_address', '10%', 'center; min-width:300px', 'left'),
        'commeettee_district' => array('ตำบล/แขวง', 'commeettee_district', '10%', 'center; min-width:150px', 'center'),
        'commeettee_county' => array('เขต/อำเภอ', 'commeettee_county', '10%', 'center; min-width:150px', 'center'),
        'commeettee_road' => array('ถนน', 'commeettee_road', '10%', 'center; min-width:170px', 'center'),
        'commeettee_building' => array('ตึก', 'commeettee_building', '10%', 'center; min-width:200px', 'center'),
        'commeettee_floor' => array('ชั้น', 'commeettee_floor', '10%', 'center; min-width:30px', 'center'),
        'commeettee_province' => array('จังหวัด', 'commeettee_province', '10%', 'center; min-width:150px', 'center'),
        'commeettee_zip' => array('รหัสไปรษณีย์', 'commeettee_zip', '10%', 'center', 'center'),
        'commeettee_tel' => array('เบอร์โทรศัพท์', 'commeettee_tel', '10%', 'center', 'center'),
        'commeettee_fax' => array('โทรสาร', 'commeettee_fax', '10%', 'center', 'center'),
        'commeettee_type_name' => array('ฝ่าย', 'commeettee_type_name', '10%', 'center; min-width:150px', 'center'),
        'commeettee_department' => array('ประเภทงานวิจัย', 'commeettee_department', '10%', 'center; min-width:300px', 'left'),                                              
    );

?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-user"></i>&nbsp;รายชื่อผู้ตรวจบทความ<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right">
                          <!-- START CONTROL BUTTON -->
                              <button name="add" type="button" class="btn btn-success btn-addp thsarabunnew" onclick="location.href='<?php echo base_url(); ?>commeettee/reviewer_add';">
                                  <i class="glyphicon glyphicon-plus"></i>&nbsp;
                                  <span>เพิ่มผู้ตรวจบทความ</span>
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
                              <span class="input-group-addon thsarabunnew">กรองรายชื่อ</span>
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
                                    
                                  <?php if(isset($links)){ echo $links; } ?>
                                  <?php if(isset($resultData)){ ?>
                                      <?php foreach ($resultData as $rows) {
                                        $rowID = $rows[$primaryID]; ?>
                                            <!-- เนื้อหา -->
                                            <tr class="thsarabunnew">
                                              <?php foreach($dataShow as $key => $value) { ?>
                                                <?php switch ($key) {
                                                  case 'option': ?>
                                                    <td style="width:100px;">
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>commeettee/reviewer_add?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                        <br/><br/><button name="edit" type="button" class="btn btn-danger thsarabunnew" onclick="location.href='<?php echo base_url(); ?>commeettee/forget_password_reviewer?c_id=<?php echo $rowID; ?>';"><b>กดเพื่อรีเซ็ตรหัสผ่านแบบสุ่ม6หลัก</b></button> 
                                                        <br/><br/><button name="edit" type="button" class="btn btn-danger thsarabunnew" onclick="location.href='<?php echo base_url(); ?>commeettee/forget_password_reviewer_123456?c_id=<?php echo $rowID; ?>';"><b>กดเพื่อรีเซ็ตรหัสผ่าน 123456</b></button>
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