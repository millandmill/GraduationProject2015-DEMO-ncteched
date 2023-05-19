<?php
    $conferences_on ="";
    $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
    foreach ($query1112->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
?>
        

<div class="col-lg-12">
    <div class="col-lg-6">
        <h2>ประกาศข่าว</h2>
        <table class="table table-striped">
            <thead>
              <tr>
                <th style="width:9%"><center>ลำดับ</center></th>
                <th style="width:47%"><center>เรื่อง</center></th>
                <th style="width:33%"><center>วัน/เดือน/ปี</center></th>
                <th style="width:12%"><center>เวลา</center></th>
              </tr>
            </thead>    
            <tbody>
            <?php   
                        $query = $this->db->query("SELECT * FROM news_public WHERE news_public_conferences = ".$conferences_on." LIMIT 2");
                        if($query->num_rows()>0)
                        {
                            foreach ($query->result() as $row)
                            {    
                                $ii=1;
            ?>
                <tr>
                    <td style="width:9%"><center><?php echo $ii; ?></center></td>
                    <td style="width:47%"><?php echo $row->news_name; ?></td>
                    <td style="width:33%"><center><?php echo DateThai($row->news_public_date);  ?></center></td>
                    <td style="width:12%"><center><?php echo $row->news_public_times." น.";  ?></center></td>
                </tr> 
        <?php                        
                            }
                               $ii++;
                        }
                        else
                        {
                            echo '<td style="text-align:center" colspan="4"><center><b style="color: red;">----- ยังไม่มีประกาศข่าว -----</b></center></td>';
                        }
        ?>        
            </tbody>
        </table>
        <?php
        $query = $this->db->query("SELECT * FROM news_public WHERE news_public_conferences = ".$conferences_on);
        if($query->num_rows()>0)
        {
        ?>
            มีจำนวนข่าวทั้งหมด <?php echo "$query->num_rows"; ?> รายการ
        <?php
        }
        ?>   
        <?php
        if($query->num_rows()>=2)
        {
        ?>
            <p><a class="btn btn-success" href="<?php echo base_url().'all/';?>news">แสดงจำนวนข่าวทั้งหมด &raquo;</a></p>    
        <?php
        }
        ?>
    </div>
    <!-- ปฏิทินกิจกรรม -->
    <div class="col-lg-6">
        <h2>ปฏิทินกิจกรรม</h2>
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
        <p><a class="btn btn-success"  href="<?php echo base_url();?>welcome/dates">ไปยังหน้าปฏิทินกิจกรรมในการส่งงานวิจัย &raquo;</a></p>
    </div>
    

    
    <div class="col-lg-0">
        <h2>ชื่อบทความที่เข้าร่วมในงานประชุมวิชาการ ครั้งที่ <?php echo $conferences_on; ?></h2>
        <!--<table class="table table-striped">
            <thead>
              <tr>
                <th style="width:10%"><center>หมายเลข</center></th>
                <th style="width:90%"><center>ชื่อบทความวิจัย</center></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align:center">1</td>
                <td style="text-align:left">ชุดต้นแบบการควบคุมอุปกรณ์ไฟฟ้าด้วยการขยับกล้ามเนื้อหน้าท้อง เพื่อผู้พิการทางกายภาพ</td>
              </tr>
              <tr>
                <td style="text-align:center">2</td>
                <td style="text-align:left">ชุดควบคุมการขับเคลื่อนของรถเข็นคนพิการด้วยระบบการตรวจจับการเอียงของศีรษะ</td>
              </tr>
              <tr>
                <td style="text-align:center">3</td>
                <td style="text-align:left">แอพพลิเคชันช่วยติดตามรถจักรยานยนต์สูญหาย</td>
              </tr>
              <tr>
                <td style="text-align:center">4</td>
                <td style="text-align:left">กรณีศึกษา: การสร้างหุ่นยนต์ สำหรับประชาสัมพันธ์</td>
              </tr>
              <tr>
                <td style="text-align:center">5</td>
                <td style="text-align:left">การพัฒนาระบบสำหรับทดสอบการส่งข้อมูลดิจิตอลด้วยเทคนิค QAM โดยใช้ SDR</td>
              </tr>
                           <tr>
                <td style="text-align:center">6</td>
                <td style="text-align:left">รูปแบบการจัดการศึกษาเพื่อพัฒนาสมรรถนะการสอนสำหรับนักศึกษาครูช่าง</td>
              </tr>
              <tr>
                <td style="text-align:center">7</td>
                <td style="text-align:left">การศึกษาสาเหตุการเกิดโรคความดันโลหิตสูง กรณีศึกษาโรงพยาบาลภาครัฐแห่งหนึ่งในประเทศไทย</td>
              </tr>
              <tr>
                <td style="text-align:center">8</td>
                <td style="text-align:left">ผลกระทบต่อขนาดคละต่อความสามารถการซึมผ่านของดินลูกรังบดอัด</td>
              </tr>
              <tr>
                <td style="text-align:center">9</td>
                <td style="text-align:left">การจัดการเรียนรู้ด้วยกระบวนการกลุ่มที่มีผลต่อผลสัมฤทธิ์ทางการเรียน วิชาระบบสารสนเทศและการให้คำปรึกษาทางธุรกิจ</td>
              </tr>
              <tr>
                <td style="text-align:center">10</td>
                <td style="text-align:left">ชุดเครื่องกำเนิดสัญญาณโฟโต้เพลตตี้สโมกราฟฟี่ในการสอนและการฝึกปฏิบัติทางด้านการวิเคราะห์สัญญาณทางการแพทย์</td>
              </tr>
              <tr>
                <td style="text-align:center">11</td>
                <td style="text-align:left">การสร้างและประเมินผลลัพธ์ของแผนการจัดการกระบวนการเรียนรู้แบบ 2CBL ในรายวิชา งานเขียนแบบและอ่านแบบเครื่องกล ตามหลักสูตรประกาศนียบัตรวิชาชีพ พุทธศักราช 2556</td>
              </tr>
              <tr>
                <td style="text-align:center">12</td>
                <td style="text-align:left">เทคนิค 5 ประการของกระบวนกร เพื่อเปลี่ยนห้องเรียนไปสู่การจัดการเรียนรู้เชิงรุก</td>
              </tr>
              <tr>
                <td style="text-align:center">13</td>
                <td style="text-align:left">การสร้างชุดการเรียนรู้ด้วยวิธีการสร้างความรู้ด้วยตนเอง กรณีศึกษา เรื่อง พื้นฐานระบบกลไกทางแมคคาทรอนิกส์</td>
              </tr>
              <tr>
                <td style="text-align:center">14</td>
                <td style="text-align:left">การพัฒนาบทเรียนคอมพิวเตอร์ช่วยสอนผ่านเว็บ ตามฐานสมรรถนะรายวิชาทฤษฎีภาพเคลื่อนไหว ร่วมกับเทคนิคการเรียนรู้แบบโครงงานเป็นฐาน</td>
              </tr>
              <tr>
                <td style="text-align:center">15</td>
                <td style="text-align:left">การพัฒนาระบบการบริหารจัดการงานประชุมวิชาการ</td>
              </tr> 
            </tbody>
        </table>
            มีจำนวนบทความมีทั้งหมด 52 รายการ
            <p><a class="btn btn-success" href="http://www.yiiframework.com/doc/">แสดงบทความทั้งหมด &raquo;</a></p> -->  
        <?php
            $num_paper =1;

        //เอากลับมาเหมือนเดิม เพราะวาที่มันเออเร่อ เพราะตารางมันหายไป ตอนนี้สร้างตารางนี้กลับมาเหมือนเดมละ จริงๆ มันจำเป็นต้อใช้ index_paper_file ด้วย เหมือนกันกับ paper_connference
        $join = "LEFT JOIN paper_file_index_hash ON index_paper_file.index_paper_file_id = paper_file_index_hash.index_paper_file_id ";
        $where = "WHERE index_paper_file.index_paper_file_no=".$conferences_on." ";
        $order = "ORDER BY index_paper_file.index_paper_file_id ASC LIMIT 5";
        $select = "SELECT index_paper_file.*, paper_file_index_hash.paper_file_index_hash_str FROM index_paper_file ".$join.$where.$order."";
        //            $query_paper = $this->db->query("SELECT * FROM paper_detail
        //                                             INNER JOIN department ON paper_detail.department_id = department.department_id
        //                                             WHERE paper_detail_status=6
        //                                             AND conferences_select_id=".$conferences_on."");
        $query_paper = $this->db->query($select);
        //เอากลับมาเหมือนเดิม เพราะวาที่มันเออเร่อ เพราะตารางมันหายไป ตอนนี้สร้างตารางนี้กลับมาเหมือนเดมละ จริงๆ มันจำเป็นต้อใช้ index_paper_file ด้วย เหมือนกันกับ paper_connference
        ?>
        <table class="table table-striped">
            <thead>
              <tr style="text-align:center">
                <th style="width:10%">หมายเลข</th>
                <th style="width:20%;">รหัสบทความ</th>
                <th style="width:60%">ชื่อบทความวิจัย</th>
                <th style="width:10%">ดาวน์โหลด</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                
        <?php
            if($query_paper->num_rows()>0)
            {
                foreach ($query_paper->result() as $data_paper_index){
                    echo '<tr>';
                    echo       '<td style="text-align:center">'.$num_paper.'</td>';
                    echo       '<td style="text-align:center">'.$data_paper_index->index_paper_file_key.'</td>';
                    echo       '<td style="text-align:center">'.$data_paper_index->index_paper_file_name.'</td>';
                    echo       '<td style="text-align:center"><a href="'.base_url().'uploadfile/download_file_index/'.$data_paper_index->paper_file_index_hash_str.'" target="_blank"><span class="glyphicon glyphicon-download-alt"></span></a></td>';
                    echo '</tr>';
                    $num_paper++;
                }
            }
            else
            {
                echo '<td style="text-align:center" colspan="2"><center><b style="color: red;">----- ยังไม่มีงานวิจัยเข้าร่วมงาน -----</b></center></td>';
            }
            
        ?>   
              </tr>
            </tbody>
        </table>
        <?php
        $query = $this->db->query("SELECT * FROM paper_detail INNER JOIN department ON paper_detail.department_id = department.department_id WHERE paper_detail_status=6 AND conferences_select_id=".$conferences_on."");
        if($query->num_rows()>0)
        {
        ?>
            <br/>มีจำนวนบทความมีทั้งหมด <?php echo "$query->num_rows"; ?> รายการ
            <p><a class="btn btn-success" href="all/paper_conference">แสดงบทความทั้งหมด &raquo;</a></p> 
        <?php
        }
        ?>
            
    </div>
    
    
    <div class="jumbotron">
        <h1>ต้องการเป็นส่วนหนึ่งของการประชุมวิชาการ ?</h1>

        <p class="lead">สมัครสมาชิก หรือ เข้าระบบ เพื่อส่งผลงานวิชาการ</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo base_url(); ?>welcome/register">สมัครสมาชิก</a> <a class="btn btn-lg btn-default" href="<?php echo base_url(); ?>welcome/login">เข้าสู่ระบบ</a></p>
    </div>
    <div class="jumbotron" style="padding-top: 0px; padding-bottom: 20px;">
        <h3 style="line-height: 30px;" class="glyphicon glyphicon-search"><i class="thsarabunnew"> ต้องการค้นหางานวิจัยที่ได้รับการเข้าร่วมงาน ? </i></h3>
        <button class="btn btn-lg btn-success" onclick="window.location.href='welcome/paper_search_index'""><span class="glyphicon glyphicon-search"></span> กลับไปยังหน้าค้นหา</button>
    </div>
    <hr/>
<div id="fb-root"></div>
    <script>
        (function(d, s, id) 
        {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.6";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    
    <div class="col-lg-0"><h2>Facebook</h2><div class="fb-page" style="#fbcomments, .fb_iframe_widget, .fb_iframe_widget[style], .fb_iframe_widget iframe[style], #fbcomments iframe[style] {width: 100% !important;}" data-href="https://www.facebook.com/NCTeched-FTE-107308746052828" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/NCTeched-FTE-107308746052828" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/NCTeched-FTE-107308746052828">NCTeched FTE</a></blockquote></div></div>
    
    <!-- ตรวจสอบ Brower เพื่อกำหนดการ Slide ภาพ-->
    <?php  
        if(chkBrowser("Chrome")==1){  
            $this->load->view('template/footer/pics1_index');
        }
        else{  
            $this->load->view('template/footer/pics2_index'); 
        }  
    ?>
    <br/>
    
</div>
