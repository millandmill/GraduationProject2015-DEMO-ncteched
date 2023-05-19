<?php
      $conferences_max=0;         
      $this->db->select('*');
      $this->db->order_by('time_cycle_conferences', 'DESC'); 
      $this->db->limit(1);
      $query_max = $this->db->get('time_cycle_paper');
      $query_max->result_array();
      foreach($query_max->result_array() as $row)
      {    
        $conferences_max=$row['time_cycle_conferences'];
      }
      $conferences_ins=$conferences_max+1;
      
      $dt = new DateTime();
                    
      //กำหนดการส่งบทความวิจัย
      $this->db->query("INSERT INTO time_cycle_paper (time_cycle_paper_name, time_cycle_conferences, time_cycle_paper_date_start, time_cycle_paper_date_end) VALUES ('Regist สมัครสมาชิก','".$conferences_ins."','".$dt->format('Y-m-d')."','".$dt->format('Y-m-d')."')");
      $this->db->query("INSERT INTO time_cycle_paper (time_cycle_paper_name, time_cycle_conferences, time_cycle_paper_date_start, time_cycle_paper_date_end) VALUES ('วันเปิดรับผลงานวิจัย','".$conferences_ins."','".$dt->format('Y-m-d')."','".$dt->format('Y-m-d')."')");
      $this->db->query("INSERT INTO time_cycle_paper (time_cycle_paper_name, time_cycle_conferences, time_cycle_paper_date_start, time_cycle_paper_date_end) VALUES ('แจ้งผลการพิจารณาผลงานวิจัย','".$conferences_ins."','".$dt->format('Y-m-d')."','".$dt->format('Y-m-d')."')"); 
      $this->db->query("INSERT INTO time_cycle_paper (time_cycle_paper_name, time_cycle_conferences, time_cycle_paper_date_start, time_cycle_paper_date_end) VALUES ('Payment การชำระค่าลงทะเบียน','".$conferences_ins."','".$dt->format('Y-m-d')."','".$dt->format('Y-m-d')."')");
      $this->db->query("INSERT INTO conferences_select_on (conferences_select_on, conferences_select_note) VALUES ('".$conferences_ins."','".$dt->format('Y')."/".$conferences_ins."')");
      
      //ไฟล์ประกาศรายละเอียดการส่งบทความ
      $this->db->query("INSERT INTO file_announce (file_announce_name, file_announce_conferences_on, file_announce_status, file_announce_note) VALUES ('NC-conferences-x-xxxx-x.pdf','".$conferences_ins."','NO','-')");
      
      //header pic
      $this->db->query("INSERT INTO header (header_pic, header_conferences_on, header_status, header_url, header_order) VALUES ('haedwebNC-2016-01.jpg','".$conferences_ins."','YES','#','1')");
      $this->db->query("INSERT INTO header (header_pic, header_conferences_on, header_status, header_url, header_order) VALUES ('haedwebNC-2016-02.jpg','".$conferences_ins."','YES','#','2')");  

      //footer pic
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-0.jpg','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-01.jpg','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-0.png','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-01.png','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-02.png','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-03.png','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-04.png','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-02.jpg','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-03.JPG','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-04.jpg','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-05.jpg','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-06.jpg','".$conferences_ins."','YES')");
      $this->db->query("INSERT INTO footer (footer_pic, footer_conferences_on, footer_status) VALUES ('footerwebNC-2016-07.jpg','".$conferences_ins."','YES')");  
      
      echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("ได้ทำการเพิ่มครั้งที่ของงานประชุม ครั้งที่ '.$conferences_ins.'\nและกำหนดการส่งบทความวิจัย เป็นที่เรียบร้อยแล้ว"); }'
                                        . '</script></body></html>';
      
      
      redirect('time/cycle_time_paper', 'refresh');
      
      
?>