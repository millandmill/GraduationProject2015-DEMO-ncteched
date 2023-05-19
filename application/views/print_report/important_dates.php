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
    $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
    foreach ($query1112->result() as $data){
       $conferences_on  = $data->conferences_select_on;
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
                <td width='200' style="text-align:center"><?php $this->db->select('*');
                                                    $this->db->where('time_cycle_paper_name','Regist สมัครสมาชิก' );
                                                    $this->db->where('time_cycle_conferences',$conferences_on );
                                                    $q = $this->db->get('time_cycle_paper');
                                                    $data = array_shift($q->result_array()); 
                                                    $strDate = $data['time_cycle_paper_date_start'];
                                                    $endDate = $data['time_cycle_paper_date_end'];
                                                    echo DateThai($strDate)." ถึง ".DateThai($endDate);
                                                ?>
                                              
                </td>
                <td width='450' style="text-align:center">สมัครสมาชิก และล็อกอินเข้าระบบ</td>
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
            </table>     
    </div>
</div>
<?php
    $html = ob_get_contents();        
    ob_end_clean();
    $pdf = new mPDF('th', 'A4', '0', '', '12', '12', '27.8', '18');
    $pdf->SetTitle('วันกำหนดที่สำคัญ การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on);
    $pdf->SetHTMLHeader('<h2>วันกำหนดที่สำคัญ การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on . '</h2><hr width="100%" align="center" border-bottom="0"  noshade color="black">'.'<table align="center">'.$headtable.'</table>');
    $pdf->SetFooter('NCTECHED SYSTEM||{PAGENO} / {nb}');
    $pdf->WriteHTML($html, 0); 
    $pdf->SetAuthor('ncteched');
    $pdf->SetAutoFont();
    $pdf->SetDisplayMode('fullpage');
    $pdf->Output('important-dates-NCTECHED-'.$conferences_on.'.pdf', 'I'); 
?>
