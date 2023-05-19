<?php
    //ตรวจสอบประเภทสมาชิกที่ทำการ login ว่าถูกต้องตามประเภทหรือไม่ ? โดยระงับการใช้งานหรือไม่ //ประเภท admin คณะกรรมการ
    $id['user_id'] = $this->session->userdata('user_id');
    $this->db->select('active_status, user_type, user_bad');
    $this->db->where('user_id',$id['user_id']);
    $qet_active_status = $this->db->get('user');
    $data_check = array_shift($qet_active_status->result_array());
    $user_type = $data_check['user_type'];
    $user_bad = $data_check['user_bad'];
        if($user_type!=1){
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("คุณไม่มีสิทธิเข้าถึงในส่วนนี้"); }'
                                        . '</script></body></html>';
            redirect('welcome/login', 'refresh');    
        }
        if($user_bad!=0){
            echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("คุณโดยระงับการใช้บัญชีนี้\nกรุณา ติดต่อผู้ดูแล เพื่อแก้ไข"); }'
                                        . '</script></body></html>';
            redirect('welcome/login', 'refresh');    
        }
?>
  <div class="row">
    <div class="col-xs-12 col-lg-3 col-sm-5 col-md-5">
      <div class="nav-side-menu" >
          <div class="brand">NCTECHED SYSTEM</div>
            <i class="fa fa-bars fa-2x" data-toggle="collapse" data-target="#menu-content"></i>
            <div class="menu-list">
                <ul id="menu-content" class="menu-content collapse out ">
                  <li>
                    <center><i class="glyphicon glyphicon-th"></i>
                    <b><a  href="#" style="color: white; font-family: 'THSarabunNew', sans-serif;">โหมดคณะกรรมการ</a></b>
                    <i class="glyphicon glyphicon-th"></i></center>
                  </li>
                  <li>
                    <i class="glyphicon glyphicon-book"></i>
                    <?php $this->db->select('file_manual_name');
                          $this->db->where('file_manual_type','คณะกรรมการ' );
                          $q = $this->db->get('file_manual');
                          $data = array_shift($q->result_array()); 
                          $fliename = $data['file_manual_name'];
                    ?>
                    <a  href="<?php echo base_url(); ?>public/download/manual/<?php echo $fliename;?>" style="color: white; font-family: 'THSarabunNew', sans-serif;">คู่มือการใช้งาน</a>
                  </li>
           
                  <li data-toggle="collapse" data-target="#conference" class="collapsed">
                    <i class="glyphicon glyphicon-bullhorn"></i>
                    <a href="#" style="color: white; font-family: 'THSarabunNew', sans-serif;">ตั้งค่าการประชุม<span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="conference">
                    <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>front/conference_on">ตั้งค่าการประชุมเป็นครั้งที่</a></li>
                    <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>time/cycle_time_paper">กำหนดเวลาส่งบทความวิจัย</a></li>
                  </ul>
          
                  <li>
                    <i class="glyphicon glyphicon-briefcase"></i>
                    <a  href="<?php echo base_url(); ?>commeettee/commeettee_detail" style="color: white; font-family: 'THSarabunNew', sans-serif;">ข้อมูลส่วนตัว</a>
                  </li>
                  
                  <li data-toggle="collapse" data-target="#front-end" class="collapsed">
                    <i class="glyphicon glyphicon-list-alt"></i>
                    <a href="#" style="color: white; font-family: 'THSarabunNew', sans-serif;">จัดการข้อมูลหน้าเว็บ<span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="front-end">
                    <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>front/header">กำหนดรูปสำหรับ Header</a></li>
                    <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>front/footer">กำหนดรูปสำหรับ Footer</a></li>
                    <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>front/announce_file_all">ไฟล์ประกาศรายละเอียดการส่งบทความ</a></li>
                    <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>front/schedule_file_all">ไฟล์ตารางการนำเสนอบทความ</a></li>
                  </ul>
                       
                  <li data-toggle="collapse" data-target="#NEWS">
                    <i class="glyphicon glyphicon-align-justify"></i>
                    <a href="#" style="color: white; font-family: 'THSarabunNew', sans-serif;">ข่าวและกำหนดการ<span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="NEWS">
                      <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>news/news_public">ข่าวประกาศหน้าเว็บ</a></li>
                      <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>time/program_date">กำหนดการประชุมวิชาการ</a></li>
                      <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>news_email">ระบบส่งข้อมูลข่าวสารผ่านอีเมล์</a></li>
                  </ul>
                  
                  <li data-toggle="collapse" data-target="#products">
                    <i class="glyphicon glyphicon-user"></i>
                    <a href="#" style="color: white; font-family: 'THSarabunNew', sans-serif;">จัดการบุคลากรในระบบ<span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="products">
                      <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>commeettee/users_all">รายชื่อผู้ส่งงานวิจัย</a></li>
                      <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>commeettee/commeettee_type">ประเภทคณะกรรมการ</a></li>
                      <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>commeettee/commeettee_all">รายชื่อคณะกรรมการ</a></li>
                      <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>commeettee/reviewer_all">รายชื่อผู้ตรวจบทความ</a></li>
                  </ul>
                  <li  data-toggle="collapse" data-target="#purchase" class="collapsed active">
                    <i class="glyphicon glyphicon-education"></i>
                    <a href="#" style="color: white; font-family: 'THSarabunNew', sans-serif;">จัดการงานวิจัย<span class="arrow"></span></a>
                  </li>
                  
                  <ul class="sub-menu collapse" id="purchase">
                      <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>research/department">ประเภทงานวิจัย</a></li>
                      <li><a style="font-family: 'THSarabunNew', sans-serif;" href="<?php echo base_url(); ?>front/downloadpaper_file_all">ผลงานวิจัยที่ผ่านมา (ตีพิมพ์รวมเล่ม)</a></li>
                 </ul>
                    <li>
                        <i class="glyphicon glyphicon-user"></i>
                        <a  href="<?php echo base_url(); ?>paper_with_admin/share_research" style="color: white; font-family: 'THSarabunNew', sans-serif;">แจกแจงงานวิจัยให้ผู้ตรวจ</a>
                    </li>
                  <li>
                    <i class="glyphicon glyphicon-envelope"></i>
                    <a style="font-family: 'THSarabunNew', sans-serif; color: white;" href="<?php echo base_url(); ?>paper_with_admin/approve_paper">ตรวจสอบงานวิจัย</a>
                  </li>
                    <li>
                        <i class="glyphicon glyphicon-check"></i>
                        <a style="font-family: 'THSarabunNew', sans-serif; color: white;" href="<?php echo base_url(); ?>paper_with_admin/paper_checked">งานวิจัยที่ตรวจสอบแล้ว</a>
                    </li>
                  <li>
                    <i class="glyphicon glyphicon-hourglass"></i>
                    <a style="font-family: 'THSarabunNew', sans-serif; color: white;" href="<?php echo base_url(); ?>payment_system_admin">รอการตรวจสอบการชำระเงิน</a>
                  </li>
                  <li>
                    <i class="glyphicon glyphicon-btc"></i>
                    <a style="font-family: 'THSarabunNew', sans-serif; color: white;" href="<?php echo base_url(); ?>payment_system_admin/index2">ชำระเงินแล้ว</a>
                  </li>
                  <li>
                    <i class="glyphicon glyphicon-book"></i>
                    <a  href="<?php echo base_url(); ?>manual_file/manual_file_all" style="color: white; font-family: 'THSarabunNew', sans-serif;">จัดการคู่มือการใช้งาน</a>
                  </li>
                  <li>
                    <i class="glyphicon glyphicon-off"></i>
                    <a href="<?php echo base_url(); ?>welcome/logout" style="color: white; font-family: 'THSarabunNew', sans-serif;">ออกจากระบบ</a>
                  </li>
                </ul>
              </div>
      
      </div><!-- end nav-side-menu -->
    </div><!-- end col-xs-12 -->

    
 