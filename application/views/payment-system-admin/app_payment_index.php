<link href="<?php echo base_url().'public/lib/';?>css/pagination.css" rel="stylesheet" type="text/css" />
<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีข้อมูลงานวิจัยอยู่ในระบบ<br/></font>";
    if(isset($public)){
        $resultData = $public;
        $countData = count($resultData);
    }
    
  $primaryID = 'paper_detail_id';
  $dataShow = array(
        'select_box' => array('action', '', '5', 'center', 'center'),
        'option' => array('รายละเอียด', '', '5', 'center', 'center'),
        'paper_numbering_code' => array('รหัสบทความ', 'paper_numbering_code', '20%', 'center', 'center'),
        'paper_detail_name_th' => array('ชื่องานวิจัย', 'paper_detail_name_th', '80%', 'center; min-width:400px', 'left'),
        'payment_system_showslip_filename' => array('ไฟล์สลิปเงินล่าสุด', 'payment_system_showslip_filename', '20%', 'center; min-width:150px', 'left'),
        'paper_detail_year' => array('วัน/เดือน/ปี ที่ส่ง', 'paper_detail_year', '40%', 'center; min-width:150px', 'center'),
        );

?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-btc"></i>&nbsp;งานวิจัยที่รอการตรวจสอบการชำระเงิน<span name="total">&nbsp;-&nbsp;<?php if(isset($countData)){ echo $countData; }else{ echo "0"; }?>&nbsp;รายการ</span>
                          </div>
                      </div>
                      <div class="pull-right">
                          <!-- START CONTROL BUTTON -->
                              
                          <!-- END CONTROL BUTTON -->
                      </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12">
                            <?php echo form_open_multipart('payment_system_admin/multi_app_update_conf'); ?>
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
                                  <?php if(isset($links)){ echo $links; } ?>
                                  <?php if(isset($resultData)){ ?>
                                <tbody id="view_inventory">
                                      <?php foreach ($resultData as $rows) {
                                        $rowID = $rows[$primaryID]; ?>
                                            <!-- เนื้อหา -->
                                            <tr class="thsarabunnew">
                                              <?php foreach($dataShow as $key => $value) { ?>
                                                <?php switch ($key) {
                                                  case 'select_box': ?>
                                                      <td style="width:100px;text-align: center;">
                                                          <?php if($rows['payment_flg'] == 0){ ?>
                                                          <input type="checkbox" class="checkbox_arr" name="seclected_tb[]" value="<?php echo $rowID ?>" />
                                                          <?php } ?>
                                                      </td>
                                                      <?php break;
                                                  case 'option': ?>
                                                      <td style="width:100px;text-align:center;">
                                                          <a onclick="location.href='<?php echo base_url(); ?>payment_system_admin/show_detail/<?php echo $rowID; ?>';"><span class="glyphicon glyphicon-zoom-in"/></a>
                                                      </td>
                                                    <?php break;
                                                  default: ?>
                                                    <td class="text2input" style="text-align:<?php echo $dataShow[$key][4]; ?>;">
                                                      <?php if(!isset($rows[$dataShow[$key][1]])){
                                                        $rows[$dataShow[$key][1]] =" ";
                                                        echo $rows[$dataShow[$key][1]];
                                                      }else{
                                                          if($key == 'payment_system_showslip_filename'){
                                                              if ($rows[$key] != null){

                                                                      //TODO ในอนาคตอาจจะต้องเเพิ่มสถานะด้วย
                                                                      if ($rows[$key] != null){
//                                                                          echo "<h6><span class=\"label label-success\">ประเมินแล้ว</span></h6>";
                                                                    ?>
                                                                      <a href="<?php echo base_url(). 'uploadfile/download_payment/'.$rows['payment_system_hash_str']; ?>" target="_blank">
                                                                          Download
                                                                      </a>
                                                                      <input type="hidden" name="payment_system_id" value="<?php echo $rows['payment_system_id'] ?>" />
                                                                    <?php
                                                                      }else{
//                                                                          echo "<h6><span class=\"label label-default\">ยังไม่ได้ประเมิน</span><h6></h6>";
                                                                        }
                                                              }
                                                              else{
                                                                  echo "ยังไม่ได้แจกแจง";
                                                              }

                                                          }else{
                                                              echo $rows[$dataShow[$key][1]];
//                                                                echo $key;
                                                          }
                                                      } ?>
                                                    </td>
                                                  <?php break; ?>
                                                <?php } ?>
                                              <?php } ?>
                                            </tr>
                                      <?php } ?>
                                </tbody>
                              <tfoot>
                              <tr>
                                  <td colspan="1" class="thsarabunnew" style="text-align: center;">
                                      <input type="checkbox" id="select_all"/>
                                  </td>
                                  <td colspan="2" class="thsarabunnew">
                                      เลือกทั้งหมด
                                  </td>
                                  <td colspan="1" class="thsarabunnew">
                                      <select style="padding:1px;" class="form-control" name="selected_status" id="selected_status" >
                                          <?php //<option value="กำลังตรวจสอบ">กำลังตรวจสอบ</option> ?>
                                          <option value="ไม่สามารถตรวจสอบได้">ไม่สามารถตรวจสอบได้</option>
                                          <option value="ชำระเงินเรียบร้อยแล้ว">ชำระเงินเรียบร้อยแล้ว</option>
                                      </select>
                                      <input type="submit" value="ตกลง"/>
                                  </td>
                                  <td colspan="1" class="thsarabunnew">
                                  </td>
                              </tr>
                              </tfoot>
                                  <?php }else { echo $text ; echo"<br/><br/>"; } ?>
                              </table>
                          <?php echo form_close(); ?>
                      </div>
                    </div><!-- class = row -->
                  </div>
              </div>
          </div><!-- end content -->
        </div><!-- end col-xs-12 -->
      </div>
  </div>
</body>
<script type="text/javascript">
    var select_all = document.getElementById("select_all"); //select all checkbox
    var checkboxes = document.getElementsByClassName("checkbox_arr"); //checkbox items

    //select all checkboxes
    select_all.addEventListener("change", function(e){
        for (i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = select_all.checked;
        }
    });

    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(this.checked == false){
                select_all.checked = false;
            }
            //check "select all" if all checkbox items are checked
            if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                select_all.checked = true;
            }
        });
    }
</script>
</html>
<?php $this->load->view('template/filter/filter_search'); ?>