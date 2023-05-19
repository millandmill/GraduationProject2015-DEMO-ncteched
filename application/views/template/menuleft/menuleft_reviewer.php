<?php
//ตรวจสอบประเภทสมาชิกที่ทำการ login ว่าถูกต้องตามประเภทหรือไม่ ? โดยระงับการใช้งานหรือไม่//ประเภท ผู้ตรวจบทความ
$id['user_id'] = $this->session->userdata('user_id');
$this->db->select('active_status, user_type, user_bad');
$this->db->where('user_id', $id['user_id']);
$qet_active_status = $this->db->get('user');
$data_check = array_shift($qet_active_status->result_array());
$user_type = $data_check['user_type'];
$user_bad = $data_check['user_bad'];
if ($user_type != 2) {
    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("คุณไม่มีสิทธิเข้าถึงในส่วนนี้"); }'
        . '</script></body></html>';
    redirect('welcome/login', 'refresh');
}
if ($user_bad != 0) {
    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("คุณโดยระงับการใช้บัญชีนี้\nกรุณา ติดต่อผู้ดูแล เพื่อแก้ไข"); }'
        . '</script></body></html>';
    redirect('welcome/login', 'refresh');
}
?>
<div class="row">
    <div class="col-xs-12 col-lg-3 col-sm-5 col-md-5">
        <div class="nav-side-menu">
            <div class="brand">NCTECHED SYSTEM</div>
            <i class="fa fa-bars fa-2x" data-toggle="collapse" data-target="#menu-content"></i>
            <div class="menu-list">
                <ul id="menu-content" class="menu-content collapse out ">
                    <li>
                        <center><i class="glyphicon glyphicon-th"></i>
                            <b><a href="#" style="color: white; font-family: 'THSarabunNew', sans-serif;">โหมดผู้ตรวจบทความ</a></b>
                            <i class="glyphicon glyphicon-th"></i></center>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-book"></i>
                        <?php $this->db->select('file_manual_name');
                        $this->db->where('file_manual_type', 'ผู้ตรวจบทความ');
                        $q = $this->db->get('file_manual');
                        $data = array_shift($q->result_array());
                        $fliename = $data['file_manual_name'];
                        ?>
                        <a href="<?php echo base_url(); ?>public/download/manual/<?php echo $fliename; ?>"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">คู่มือการใช้งาน</a>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-briefcase"></i>
                        <a href="<?php echo base_url(); ?>reviewer/reviewer_detail"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">ข้อมูลส่วนตัว</a>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-file"></i>
                        <a href="<?php echo base_url(); ?>paper2/index"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">รายชื่อบทความที่ต้องตรวจ</a>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-file"></i>
                        <a href="<?php echo base_url(); ?>paper2/index_archive"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">บทความที่เคยตรวจครั้งที่ผ่านมา</a>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-off"></i>
                        <a href="<?php echo base_url(); ?>welcome/logout"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">ออกจากระบบ</a>
                    </li>
                </ul>
            </div>

        </div><!-- end nav-side-menu -->
    </div><!-- end col-xs-12 -->

    
 