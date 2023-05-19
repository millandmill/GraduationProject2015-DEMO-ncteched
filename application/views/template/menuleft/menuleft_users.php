<?php
function DateThai($strDate)
{

    $strwday = date("w", strtotime($strDate));
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $TH_Day = Array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
    $sstrwdayth = $TH_Day[$strwday];
    $strMonthThai = $strMonthCut[$strMonth];
    return "วัน$sstrwdayth ที่ $strDay $strMonthThai $strYear";
}



$id['user_id'] = $this->session->userdata('user_id');
$this->db->select('active_status, user_type, user_bad');
$this->db->where('user_id', $id['user_id']);
$qet_active_status = $this->db->get('user');
$data_check = array_shift($qet_active_status->result_array());
$active_status = $data_check['active_status'];

//ตรวจสอบการยืนยัน E-mail
/*if ($active_status != 1) {
    redirect('welcome/login', 'refresh');
}*/

//ตรวจสอบประเภทสมาชิกที่ทำการ login ว่าถูกต้องตามประเภทหรือไม่ ? //ผู้ส่งงานวิจัย
$user_type = $data_check['user_type'];
if ($user_type != 0) {
    echo '<html><head><meta charset="utf-8"></head><body><script type="text/javascript"> window.onload = function () { alert("คุณไม่มีสิทธิเข้าถึงในส่วนนี้"); }'
        . '</script></body></html>';
    redirect('welcome/login', 'refresh');
}

//โดยระงับการใช้งานหรือไม่
$user_bad = $data_check['user_bad'];
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
                            <b><a href="#" style="color: white; font-family: 'THSarabunNew', sans-serif;">โหมดผู้ส่งงานวิจัย</a></b>
                            <i class="glyphicon glyphicon-th"></i></center>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-book"></i>
                        <?php $this->db->select('file_manual_name');
                        $this->db->where('file_manual_type', 'ผู้ส่งงานวิจัย');
                        $q = $this->db->get('file_manual');
                        $data = array_shift($q->result_array());
                        $fliename = $data['file_manual_name'];
                        ?>
                        <a href="<?php echo base_url(); ?>public/download/manual/<?php echo $fliename; ?>"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">คู่มือการใช้งาน</a>
                    </li>
                    <?php
                    if ($active_status != 1) {
                    ?>    
                    <li>
                        <i class="glyphicon glyphicon-briefcase"></i>
                        <a href="<?php echo base_url(); ?>users/sendVerificatinEmail_again"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">กดเพื่อส่ง email link ยืนยันผู้ใช้อีกครั้ง</a>
                    </li>
                    <?php } ?>
                    <li>
                        <i class="glyphicon glyphicon-briefcase"></i>
                        <a href="<?php echo base_url(); ?>users/users_detail"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">ข้อมูลส่วนตัว</a>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-align-justify"></i>
                        <a href="<?php echo base_url(); ?>users/news"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">ข่าว</a>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-time"></i>
                        <a href="<?php echo base_url(); ?>users/news_time"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">ดูระยะเวลาการส่งบทความ</a>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-file"></i>
                        <a href="<?php echo base_url(); ?>paper/paper_detail_add"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">สร้างบทความใหม่</a>
                    </li>
                    <li>

                        <i class="glyphicon glyphicon-file"></i>
                        <a href="<?php echo base_url(); ?>paper/index"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">รายการบทความของคุณ</a>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-btc"></i>
                        <a href="<?php echo base_url(); ?>payment_system"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">ส่งสลิปการชำระเงิน</a>
                    </li>
                    <li>
                        <i class="glyphicon glyphicon-file"></i>
                        <a href="<?php echo base_url(); ?>paper/index_archive"
                           style="color: white; font-family: 'THSarabunNew', sans-serif;">รายการบทความที่ผ่านมา</a>
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

    
 