<?php
     require_once('mpdf/mpdf.php');
     ob_start();
?>
<?php
    function DateThai($strDate)
    {
        $strwday= date("w",strtotime($strDate));
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        $TH_Day = Array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
        $sstrwdayth=$TH_Day[$strwday];
        $strMonthThai=$strMonthCut[$strMonth];
        $at ="ที่";
        return "$sstrwdayth$at  $strDay $strMonthThai $strYear";
    }
?>
<style type="text/css">
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
    line-height: 25px; 
}
h2 {
   line-height: 1%;
   padding-top: 0px;
}
        
</style>
<div class="col-lg-12">
<?php
    $conferences_on ="";
    $query2 = $this->db->query("SELECT file_announce_conferences_on FROM file_announce");
    foreach ($query2->result() as $data){
       $conferences_on  = $data->file_announce_conferences_on;
    }
?>
    <div class="container col-lg-12" id="printTable">
            <table align="center">
                <?php
                $headtable ="   <tr>
                                    <td width='200'><center><b>วัน/เดือน/ปี</b></center></td>
                                    <td width='450'><center><b>กิจกรรม</b></center></td>
                                </tr>
                            ";
                ?>
                  <tr>
                    <td style="text-align:center" width='200'><?php $this->db->select('time_cycle_date_start');
                                                        $this->db->where('time_cycle_name','Regist สมัครสมาชิก' );
                                                        $this->db->where('time_cycle_conferences',$conferences_on);
                                                        $q = $this->db->get('time_cycle');
                                                        $data = array_shift($q->result_array()); 
                                                        $strDate = $data['time_cycle_date_start'];
                                                        echo DateThai($strDate);
                                                        echo "<br/> <b>ถึง</b> <br/>"
                                                    ?>
                                                  <?php $this->db->select('time_cycle_date_end');
                                                        $this->db->where('time_cycle_name','Regist สมัครสมาชิก' );
                                                        $this->db->where('time_cycle_conferences',$conferences_on);
                                                        $q = $this->db->get('time_cycle');
                                                        $data = array_shift($q->result_array()); 
                                                        $strDate = $data['time_cycle_date_end'];
                                                        echo DateThai($strDate);
                                                    ?>
                    </td>
                    <td style="text-align:center" width='450'>สมัครสมาชิกเป็นผู้ส่งบทความวิจัย<br/><b><i style="color:red;">หรือ</i></b> อนุญาติให้ผู้ส่งบทความ Login เข้าสู่ระบบ</td>
                  </tr>
                  <tr>
                    <td style="text-align:center"><?php $this->db->select('time_cycle_date_start');
                                                        $this->db->where('time_cycle_name','ส่งบทความ' );
                                                        $this->db->where('time_cycle_conferences',$conferences_on);
                                                        $q = $this->db->get('time_cycle');
                                                        $data = array_shift($q->result_array()); 
                                                        $strDate = $data['time_cycle_date_start'];
                                                        echo DateThai($strDate);
                                                        echo "<br/> <b>ถึง</b> <br/>"
                                                    ?>
                                                    <?php $this->db->select('time_cycle_date_end');
                                                        $this->db->where('time_cycle_name','ส่งบทความ' );
                                                        $this->db->where('time_cycle_conferences',$conferences_on);
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
                                                        $this->db->where('time_cycle_conferences',$conferences_on);
                                                        $q = $this->db->get('time_cycle');
                                                        $data = array_shift($q->result_array()); 
                                                        $strDate = $data['time_cycle_date_start'];
                                                        echo DateThai($strDate);
                                                        echo "<br/> <b>ถึง</b> <br/>"
                                                    ?>
                                                    <?php $this->db->select('time_cycle_date_end');
                                                        $this->db->where('time_cycle_name','การแก้ไข paper' );
                                                        $this->db->where('time_cycle_conferences',$conferences_on);
                                                        $q = $this->db->get('time_cycle');
                                                        $data = array_shift($q->result_array()); 
                                                        $strDate = $data['time_cycle_date_end'];
                                                        echo DateThai($strDate);
                                                    ?>
                    </td>
                  <td style="text-align:center">แก้ไขบทความวิจัยจนกระทั่งสมบูรณ์</td>
                </tr>
            </table>     
    </div>
</div>
<?php
    $html = ob_get_contents();        
    ob_end_clean();
    $pdf = new mPDF('th', 'A4', '0', '', '12', '12', '27.8', '18');
    $pdf->SetTitle('ระยะเวลาการส่งผลงาน การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on);
    $pdf->SetHTMLHeader('<h2>ระยะเวลาส่งผลงาน การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on . '</h2><hr width="100%" align="center" border-bottom="0"  noshade color="black">'.'<table align="center">'.$headtable.'</table>');
    $pdf->SetFooter('NCTECHED SYSTEM||{PAGENO} / {nb}');
    $pdf->WriteHTML($html, 0); 
    $pdf->SetAuthor('ncteched');
    $pdf->SetAutoFont();
    $pdf->SetDisplayMode('fullpage');
    $pdf->Output('paper-dates-NCTECHED-'.$conferences_on.'.pdf', 'I'); 
?>
