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

<div class="col-lg-12" id="printTable">
<?php
    $conferences_on ="";
    $query2 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1");
    foreach ($query2->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
    $item = 0;
    $max_record_1paper = 1;
?>
     <table align="center">
        <?php   
                $headtable ="   <tr>
                                    <td width='50'><center><b>ลำดับ</b></center></td>
                                    <td width='350'><center><b>เรื่อง</b></center></td>
                                    <td width='200'><center><b>วัน/เดือน/ปี</b></center></td>
                                    <td width='100'><center><b>เวลา</b></center></td>
                                </tr>
                            ";
                $query = $this->db->query("SELECT * FROM news_public WHERE news_public_conferences = ".$conferences_on);
                $num=1;
        
                foreach ($query->result() as $row)
                {    
                    $item=$item+1;
        ?>
                    <tr>
                        <td width='50'><center><?php echo $num; $num++;?></center></td>
                        <td width='350'><?php echo $row->news_name;?></td>   
                        <td width='200'><center><?php echo DateThai($row->news_public_date);?></center></td>
                        <td width='100'><center><?php echo $row->news_public_times." น.";?></center></td>
                    </tr>
            
        <?php   
                }   
        ?>        
   </table> <!--<pagebreak />-->
    
</div>
<?php
    $html = ob_get_contents();        
    ob_end_clean();
    $pdf = new mPDF('th', 'A4', '0', '', '12', '12', '27.8', '18');
    $pdf->SetTitle('ประกาศข่าว การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on);
    $pdf->SetHTMLHeader('<h2>ประกาศข่าว การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on . '</h2><hr width="100%" align="center" border-bottom="0"  noshade color="black">'.'<table align="center">'.$headtable.'</table>');
    $pdf->SetFooter('NCTECHED SYSTEM||{PAGENO} / {nb}');
    $pdf->WriteHTML($html, 0); 
    $pdf->SetAuthor('ncteched');
    $pdf->SetAutoFont();
    $pdf->SetDisplayMode('fullpage');
    $pdf->Output('NEWS-NCTECHED-'.$conferences_on.'.pdf', 'I'); 
?>