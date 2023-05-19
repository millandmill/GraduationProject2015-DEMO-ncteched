
<div class="col-lg-12">

    <div class="container col-lg-12">
      <h2>ประกาศรับผลงาน</h2>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#menu1"><h6>ขอบเขตของการประชุม</h6></a></li>
        <li><a data-toggle="tab" href="#menu2"><h6>กำหนดการส่งบทความ</h6></a></li>
      </ul>

      <div class="tab-content">
        <div id="menu1" class="tab-pane fade in active">
            <h4 style="text-align: left; line-height: 200%; text-indent: 0.5in; ">
                <p>ผลงานวิจัยที่จะนำเสนอในการประชุมกำหนดขอบเขตครอบคลุม ในสาขาวิชาต่าง ๆ ดังนี้ </p>
                <?php   
                        $query = $this->db->query("SELECT * FROM department WHERE department_status='YES'");
                        foreach ($query->result() as $row)
                        {    
                ?>
                <?php echo"<p>- ". $row->department_name."</p>"; ?>
                <?php                        
                        }   
                ?>
            </h4>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h4 style="text-align: center; line-height: 200%; text-indent: 0.5in;"> 
                <table class="table table-striped"> 
                    <thead>
                      <tr>
                        <th style="width:40%"><center>วัน/เดือน/ปี</center></th>
                        <th style="width:60%"><center>กิจกรรม</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="text-align:center"><?php $this->db->select('time_cycle_paper_date_start');
                                                            $this->db->where('time_cycle_paper_name','วันแรกของการเปิดรับผลงานวิจัย' );
                                                            $q = $this->db->get('time_cycle_paper');
                                                            $data = array_shift($q->result_array()); 
                                                            $strDate = $data['time_cycle_paper_date_start'];
                                                            echo DateThai($strDate);
                                                        ?>
                        </td>
                        <td style="text-align:center">วันแรกของการเปิดรับผลงานวิจัย</td>
                      </tr>
                      <tr>
                        <td style="text-align:center"><?php $this->db->select('time_cycle_paper_date_end');
                                                            $this->db->where('time_cycle_paper_name','วันสุดท้ายของการรับผลงานวิจัยฉบับเต็ม' );
                                                            $q = $this->db->get('time_cycle_paper');
                                                            $data = array_shift($q->result_array()); 
                                                            $strDate = $data['time_cycle_paper_date_end'];
                                                            echo DateThai($strDate);
                                                        ?>
                        </td>
                        <td style="text-align:center">วันสุดท้ายของการรับผลงานวิจัยฉบับเต็ม<br>(Submission of  Full paper)</td>
                      </tr>
                      <tr>
                        <td style="text-align:center"><?php $this->db->select('time_cycle_paper_date_start');
                                                            $this->db->where('time_cycle_paper_name','แจ้งผลการพิจารณาผลงานวิจัยฉบับเต็ม' );
                                                            $q = $this->db->get('time_cycle_paper');
                                                            $data = array_shift($q->result_array()); 
                                                            $strDate = $data['time_cycle_paper_date_start'];
                                                            echo DateThai($strDate);
                                                            echo "<br/> <b>ถึง</b> <br/>"
                                                        ?>
                                                        <?php $this->db->select('time_cycle_paper_date_end');
                                                            $this->db->where('time_cycle_paper_name','แจ้งผลการพิจารณาผลงานวิจัยฉบับเต็ม' );
                                                            $q = $this->db->get('time_cycle_paper');
                                                            $data = array_shift($q->result_array()); 
                                                            $strDate = $data['time_cycle_paper_date_end'];
                                                            echo DateThai($strDate);
                                                        ?>
                        </td>
                        <td style="text-align:center">แจ้งผลการพิจารณาผลงานวิจัยฉบับเต็ม<br>(Notification of Acceptance)</td>
                      </tr>
                      <tr>
                          <td style="text-align:center"><?php $this->db->select('time_cycle_paper_date_start');
                                                            $this->db->where('time_cycle_paper_name','ส่งผลงานวิจัยฉบับสมบูรณ์' );
                                                            $q = $this->db->get('time_cycle_paper');
                                                            $data = array_shift($q->result_array()); 
                                                            $strDate = $data['time_cycle_paper_date_start'];
                                                            echo DateThai($strDate);
                                                            echo "<br/> <b>ถึง</b> <br/>"
                                                        ?>
                                                        <?php $this->db->select('time_cycle_paper_date_end');
                                                            $this->db->where('time_cycle_paper_name','ส่งผลงานวิจัยฉบับสมบูรณ์' );
                                                            $q = $this->db->get('time_cycle_paper');
                                                            $data = array_shift($q->result_array()); 
                                                            $strDate = $data['time_cycle_paper_date_end'];
                                                            echo DateThai($strDate);
                                                        ?>
                          </td>
                        <td style="text-align:center">ส่งผลงานวิจัยฉบับสมบูรณ์<br>(Submission of Final Manuscript)</td>
                      </tr>
                    </tbody>
                </table>
            </h4>  
        </div>
      </div>
    </div>
</div>
