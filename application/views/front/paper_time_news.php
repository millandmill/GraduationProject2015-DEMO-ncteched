
<div class="col-lg-12">

    <div class="container col-lg-12" id="printTable" style="font-family: 'THSarabunNew', sans-serif;">
      <link rel="stylesheet" href=<?php echo base_url().'public/lib/css/fonts/thsarabunnew.css'; ?>>
      <h2>ระยะเวลาการส่งผลงาน</h2>
        <h4 style="text-align: center; line-height: 150%; "> 
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width:40%"><center>วัน/เดือน/ปี</center></th>
                    <th style="width:60%"><center>กิจกรรม</center></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align:center"><?php $this->db->select('time_cycle_date_start');
                                                    $this->db->where('time_cycle_name','Regist สมัครสมาชิก' );
                                                    $q = $this->db->get('time_cycle');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_date_start'];
                                                    echo DateThai($strDate);
                                                    echo "<br/> <b>ถึง</b> <br/>"
                                                ?>
                                                <?php $this->db->select('time_cycle_date_end');
                                                    $this->db->where('time_cycle_name','Regist สมัครสมาชิก' );
                                                    $q = $this->db->get('time_cycle');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_date_end'];
                                                    echo DateThai($strDate);
                                                ?>
                    </td>
                    <td style="text-align:center">สมัครสมาชิกเป็นผู้ส่งบทความวิจัย<br/><b><i style="color:red;">หรือ</i></b> อนุญาติให้ผู้ส่งบทความ Login เข้าสู่ระบบ</td>
                  </tr>
                  <tr>
                    <td style="text-align:center"><?php $this->db->select('time_cycle_date_start');
                                                    $this->db->where('time_cycle_name','ส่งบทความ' );
                                                    $q = $this->db->get('time_cycle');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_date_start'];
                                                    echo DateThai($strDate);
                                                    echo "<br/><b>ถึง</b><br/>"
                                                ?>
                                                <?php $this->db->select('time_cycle_date_end');
                                                    $this->db->where('time_cycle_name','ส่งบทความ' );
                                                    $q = $this->db->get('time_cycle');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_date_end'];
                                                    echo DateThai($strDate);
                                                ?>
                    </td>
                    <td style="text-align:center">ส่งหัวข้อบทความวิจัย</td>
                  </tr>
                  <tr>
                    <td style="text-align:center"><?php $this->db->select('time_cycle_date_start');
                                                    $this->db->where('time_cycle_name','การแก้ไข paper' );
                                                    $q = $this->db->get('time_cycle');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_date_start'];
                                                    echo DateThai($strDate);
                                                    echo "<br/><b>ถึง</b><br/>"
                                                ?>
                                                <?php $this->db->select('time_cycle_date_end');
                                                    $this->db->where('time_cycle_name','การแก้ไข paper' );
                                                    $q = $this->db->get('time_cycle');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_date_end'];
                                                    echo DateThai($strDate);
                                                ?>
                    </td>
                    <td style="text-align:center">แก้ไขบทความวิจัยจนกระทั่งสมบูรณ์</td>
                  </tr>
                  <tr>
                    <td style="text-align:center"><?php $this->db->select('time_cycle_date_start');
                                                    $this->db->where('time_cycle_name','Payment การชำระค่าลงทะเบียน' );
                                                    $q = $this->db->get('time_cycle');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_date_start'];
                                                    echo DateThai($strDate);
                                                    echo "<br/><b>ถึง</b><br/>"
                                                ?>
                                                <?php $this->db->select('time_cycle_date_end');
                                                    $this->db->where('time_cycle_name','Payment การชำระค่าลงทะเบียน' );
                                                    $q = $this->db->get('time_cycle');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_date_end'];
                                                    echo DateThai($strDate);
                                                ?>
                    </td>
                    <td style="text-align:center">การชำระค่าลงทะเบียน</td>
                  </tr>
                </tbody>
            </table>
        </h4>  
            
    </div>
    <p><a class="btn btn-success" onclick="window.location.href='../print_report/paper_dates'"">พิมพ์ระยะเวลาการส่งผลงาน &raquo;</a></p>
</div>

