<?php
    $conferences_on ="";
    $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
    foreach ($query1112->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
?>
<div class="col-lg-12">

    <div class="container col-lg-12" id="printTable" style="font-family: 'THSarabunNew', sans-serif;">
      <link rel="stylesheet" href=<?php echo base_url().'public/lib/css/fonts/thsarabunnew.css'; ?>>
      <h2>วันกำหนดที่สำคัญ</h2>
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
                <td style="text-align:center"><?php $this->db->select('*');
                                                    $this->db->where('time_cycle_paper_name','Regist สมัครสมาชิก' );
                                                    $this->db->where('time_cycle_conferences',$conferences_on );
                                                    $q = $this->db->get('time_cycle_paper');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_paper_date_start'];
                                                    $endDate = $data['time_cycle_paper_date_end'];
                                                    echo DateThai($strDate)." ถึง ".DateThai($endDate);
                                                ?>
                                              
                </td>
                <td style="text-align:center">สมัครสมาชิก และล็อกอินเข้าระบบ</td>
              </tr>
              
              <tr>
                <td style="text-align:center"><?php $this->db->select('*');
                                                    $this->db->where('time_cycle_paper_name','วันเปิดรับผลงานวิจัย' );
                                                    $this->db->where('time_cycle_conferences',$conferences_on );
                                                    $q = $this->db->get('time_cycle_paper');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_paper_date_start'];
                                                    $endDate = $data['time_cycle_paper_date_end'];
                                                    echo DateThai($strDate)." ถึง ".DateThai($endDate);
                                                ?>
                                              
                </td>
                <td style="text-align:center">วันเปิดรับผลงานวิจัย</td>
              </tr>

              <tr>
                <td style="text-align:center"><?php $this->db->select('*');
                                                    $this->db->where('time_cycle_paper_name','แจ้งผลการพิจารณาผลงานวิจัย' );
                                                    $this->db->where('time_cycle_conferences',$conferences_on );
                                                    $q = $this->db->get('time_cycle_paper');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_paper_date_start'];
                                                    $endDate = $data['time_cycle_paper_date_end'];
                                                    echo DateThai($strDate)." ถึง ".DateThai($endDate);
                                                ?>
                                              
                </td>
                <td style="text-align:center">แจ้งผลการพิจารณาผลงานวิจัย</td>
              </tr>
  
              
              <tr>
                <td style="text-align:center"><?php $this->db->select('*');
                                                    $this->db->where('time_cycle_paper_name','Payment การชำระค่าลงทะเบียน' );
                                                    $this->db->where('time_cycle_conferences',$conferences_on );
                                                    $q = $this->db->get('time_cycle_paper');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_paper_date_start'];
                                                    $endDate = $data['time_cycle_paper_date_end'];
                                                    echo DateThai($strDate)." ถึง ".DateThai($endDate);
                                                ?>
                                              
                </td>
                <td style="text-align:center">ชำระค่าลงทะเบียน</td>
              </tr>
            </tbody>
            </table>
        </h4>  
            
    </div>
    <p><a class="btn btn-success" onclick="window.location.href='../print_report/important_dates'"">พิมพ์วันกำหนดที่สำคัญในการส่งงานวิจัย &raquo;</a></p>
</div>

