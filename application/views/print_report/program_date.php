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
    $query2 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1");
    foreach ($query2->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
?>
    <div class="container col-lg-12" id="printTable">
        <h4 style="text-align: center; line-height: 200%; "> 
            <table align="center">
                <?php
                $headtable ="   <tr>
                                    <td width='180'><center><b>วัน/เดือน/ปี เวลา</b></center></td>
                                    <td width='530'><center><b>โปรแกรม</b></center></td>
                                </tr>
                            ";
                ?>
                <?php   
                        $query = $this->db->query("SELECT * FROM program_date WHERE program_date_conferences=".$conferences_on);
                        foreach ($query->result() as $row)
                        {    
                ?>
                  <tr>
                    <td width='180' style="text-align:center"><?php echo DateThai($row->program_date_day);  ?><br/><?php echo substr($row->program_date_time_start, 0, 5)." น. - ";  ?><?php echo substr($row->program_date_time_end, 0, 5)." น.";  ?></td>
                    <td width='530' style="text-align:left"><?php echo $row->program_date_name;  ?></td>
                  </tr> 
                <?php                        
                        }   
                ?>   
            </table>
        </h4>  
            <p style="color:red"><b>*หมายเหตุ : กำหนดการอาจมีการเปลี่ยนแปลงตามความเหมาะสม</b></p>
    </div>
</div>
<?php
    $html = ob_get_contents();        
    ob_end_clean();
    $pdf = new mPDF('th', 'A4', '0', '', '12', '12', '27.8', '18');
    $pdf->SetTitle('กำหนดการ การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on);
    $pdf->SetHTMLHeader('<h2>กำหนดการ การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on . '</h2><hr width="100%" align="center" border-bottom="0"  noshade color="black">'.'<table align="center">'.$headtable.'</table>');
    $pdf->SetFooter('NCTECHED SYSTEM||{PAGENO} / {nb}');
    $pdf->WriteHTML($html, 0); 
    $pdf->SetAuthor('ncteched');
    $pdf->SetAutoFont();
    $pdf->SetDisplayMode('fullpage');
    $pdf->Output('program-date-NCTECHED-'.$conferences_on.'.pdf', 'I'); 
?>
