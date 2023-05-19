<link href="<?php echo base_url().'public/lib/';?>css/pagination.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url().'public/lib/check-date-textbox/';?>check-date-text.js"></script>

<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    $text = "<font color='red' class='thsarabunnew'><br/>ไม่มีกำหนดการส่งบทความ<br/>กรุณากำหนดการส่งบทความวิจัยหน้าเว็บ</font>";
    if(isset($time_cycle_paper)){
        $resultData = $time_cycle_paper;
        $countData = count($resultData);
    }
  $primaryID = 'time_cycle_paper_id';
  $dataShow = array(
        //'time_cycle_conferences' => array('ประชุมครั้งที่', 'time_cycle_conferences', '20%', 'center; min-width:80px', 'center'),
        'time_cycle_paper_name' => array('กิจกรรม', 'time_cycle_paper_name', '50%', 'center; min-width:200px', 'left'),
        //'time_cycle_paper_id' => array('ID_cycle', 'time_cycle_paper_id', '2%', 'center', 'center'),
        'time_cycle_paper_date_start' => array('วันที่เริ่ม', 'time_cycle_paper_date_start', '10%', 'center; min-width:120px', 'center'),
        'time_cycle_paper_date_end' => array('วันที่สิ้นสุด', 'time_cycle_paper_date_end', '10%', 'center; min-width:120px', 'center'),      
        );
  $conferences_on ="";
  $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
  foreach ($query1112->result() as $data){
      $conferences_on  = $data->conferences_select_on;
  }
?>
        <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7 ">
          <div class="content">
              <div class="panel panel-warning">
                  <div class="panel-heading">
                      <div class="pull-left">
                          <div class="thsarabunnew" style="font-size:1.2em;margin-top:6px;">
                              <i class="glyphicon glyphicon-hourglass"></i>&nbsp;จัดการ<br/>กำหนดการส่งบทความวิจัยหน้าเว็บ ครั้งที่ <?php echo $conferences_on;?> </span>
                          </div>
                      </div>
                      <div class="pull-right">
                          <!-- START CONTROL BUTTON -->
                            <!--  <button name="add" type="button" <?php if($countData>=4) echo "disabled"; ?> class="btn btn-success btn-addp thsarabunnew" onclick="location.href='<?php echo base_url(); ?>time/cycle_time_edit';">  
                                  <?php if($countData<4) echo "<i class='glyphicon glyphicon-plus'></i>&nbsp; <span>เพิ่มวันเวลาการเข้าใช้งาน</span>"; ?>
                                  <?php if($countData>=4) echo "<span>เพิ่มวันเวลาการเข้าใช้งานครบแล้ว</span>"; ?>
                              </button> -->
                          <!-- END CONTROL BUTTON -->
                      </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-12">
                           <br/>
                                <!--<input type="reset" value="เพิ่มครั้งที่งานประชุม" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='cycle_time_paper_add'""/>   
                           <br/><br/>  -->
                           <form id="pickDateForm" method="POST" name="form_authen" style="margin-left: 20px;" >
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
                                                        <button name="edit" class="btn glyphicon glyphicon-wrench" onclick="location.href='<?php echo base_url(); ?>time/cycle_time_paper_edit?c_id=<?php echo $rowID; ?>';"><i class="fa fa-edit"></i></button>
                                                    </td>
                                                 <?php break;
                                                  case 'time_cycle_paper_date_start': ?>
                                              
                                              <td style="width:100px;text-align:center;" >
                                                        <input type="hidden" <?php echo "name='time_cycle_paper_id".$rowID."'"; ?> value="<?php if(isset($rowID)){ echo $rowID; } ?>"/>
                                                        <?php //echo $rowID; ?>
                                                            <input  data-validation='required' 
                                                                    data-validation-error-msg-required='กรุณาเลือกวันที่เริ่ม'
                                                                    maxlength="10"
                                                                    type='text' class='font12 thsarabunnew' onblur="validate(this)" onclick="getval(this)" onkeypress="return isNumber(event)" onkeydown="return (event.keyCode!=13);" <?php echo "id='date_start".$rowID."'"; echo 'name="time_cycle_paper_date_start'.$rowID.'"'; ?>  <?php echo 'value="'; if(isset($rows[$dataShow[$key][1]])){ echo $rows[$dataShow[$key][1]]; } ?>"/>                                                
                                                    </td>   
                                                 <?php break;
                                                  case 'time_cycle_paper_date_end': ?>
                                                    
                                                    <td style="width:100px;text-align:center;">
                                                        <input type="hidden" <?php echo "name='time_cycle_paper_id".$rowID."'"; ?> value="<?php if(isset($rowID)){ echo $rowID; } ?>"/>
                                                        <?php //echo $rowID; ?>
                                                        <input  data-validation="required" 
                                                                data-validation-error-msg-required="กรุณาเลือกวันที่สิ้นสุด"
                                                                maxlength="10"
                                                                type="text" class="font12 thsarabunnew" onblur="validate(this)" onclick="getval(this)" onkeypress="return isNumber(event)" onkeydown="return (event.keyCode!=13);" <?php echo "id='date_end".$rowID."'"; echo 'name="time_cycle_paper_date_end'.$rowID.'"'; ?>  <?php echo 'value="'; if(isset($rows[$dataShow[$key][1]])){ echo $rows[$dataShow[$key][1]]; } ?>"/>
                                                    </td>
                                                    
                                                    <?php if($rowID%4==0){
                                                        echo '<tr style="height:20px;"><td bgcolor="black" colspan="4"></td></tr>';
                                                        $pre_con= $conferences_on-1;
                                                        echo '<thead class="pon-thead">
                                                            <tr class="thsarabunnew">
                                                                <th colspan=3 width="70%" style="text-align:center; min-width:440px">กำหนดการส่งบทความวิจัยของการประชุมครั้งที่แล้ว ครั้งที่ '.$pre_con.'</th>
                                                            </tr>
                                                            <tr class="thsarabunnew">
                                                                <th width="50%" style="text-align:center; min-width:200px">กิจกรรม</th>
                                                                <th width="10%" style="text-align:center; min-width:120px">วันที่เริ่ม</th>
                                                                <th width="10%" style="text-align:center; min-width:120px">วันที่สิ้นสุด</th>
                                                            </tr></thead>';

                                                            echo '<tbody id="view_inventory">';
                                                            $query = $this->db->query("SELECT * FROM time_cycle_paper WHERE time_cycle_conferences=".$pre_con);
                                                            if($query->num_rows()>0)
                                                            {
                                                                foreach ($query->result() as $row)
                                                                {
                                                                    echo '<tr class="thsarabunnew" style="display: table-row;">';
                                                                    if($row->time_cycle_paper_name=='Regist สมัครสมาชิก')
                                                                    {
                                                                        $row->time_cycle_paper_name="สมัครสมาชิกและ login ผู้ส่งบทความ";
                                                                    }       
                                                                    echo '  <td class="text2input" style="text-align:left;">'.$row->time_cycle_paper_name.'</td>';
                                                                    echo '  <td style="width:100px;text-align:center;">';
                                                                    echo '      <input type="text" class="font12 thsarabunnew" value="'.$row->time_cycle_paper_date_start.'" disabled>';                                        
                                                                    echo '  </td>';
                                                                    echo '  <td style="width:100px;text-align:center;">';
                                                                    echo '  <input type="text" class="font12 thsarabunnew" value="'.$row->time_cycle_paper_date_end.'" disabled>';
                                                                    echo '</td></tr>';
                                                                }
                                                            }
                                                            echo '</tbody>';   
                                                        }
                                                    ?>      
                                                  <?php break;
                                                  default: ?>
                                                    <td class="text2input" style="text-align:<?php echo $dataShow[$key][4]; ?>;">
                                                      <?php if(!isset($rows[$dataShow[$key][1]])){
                                                        $rows[$dataShow[$key][1]] =" ";
                                                        echo $rows[$dataShow[$key][1]];
                                                      }else{
                                                          if($rows[$dataShow[$key][1]]=='Regist สมัครสมาชิก')
                                                          {
                                                              echo "สมัครสมาชิกและ login ผู้ส่งบทความ";
                                                          }else
                                                          {
                                                              echo $rows[$dataShow[$key][1]];
                                                          }     
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
                               <input  type="submit" value="บันทึกการแก้ไข"  class="bt-submit thsarabunnew" name="btn_submit"/>
                                <input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../time/cycle_time_paper'"/>          
                            </form>                          
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
<?php //$this->load->view('template/pagination/pagination_system_limit4'); ?>