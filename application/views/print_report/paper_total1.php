<?php
     require_once('mpdf/mpdf.php');
     ob_start();
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
    $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
    foreach ($query1112->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
    $item = 0;
?>
     <table align="center">
        <?php   
                $headtable ="   <tr>
                                    <td width='50'><center><b>ลำดับ</b></center></td>
                                    <td width='550'><center><b>แบ่งตามสาขาวิชา</b></center></td>
                                    <td width='100'><center><b>จำนวนวิจัย</b></center></td>
                                </tr>
                            ";
                $query = $this->db->query("SELECT department_name, count(department_name)AS count FROM paper_detail INNER JOIN department ON department.department_id=paper_detail.department_id WHERE paper_detail_status=6 and conferences_select_id =".$conferences_on." GROUP BY department_name");
                $num=1;
        
                foreach ($query->result() as $row)
                {    
                    $item=$item+1;
        ?>
                    <tr>
                        <td width='50'><center><?php echo $num; $num++;?></center></td>
                        <td width='550'><?php echo $row->department_name;?></td>   
                        <td width='100'><center><?php echo $row->count;?></center></td>
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
    $pdf->SetTitle('สรุปงานวิจัยแบ่งกลุ่มสาขา การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on);
    $pdf->SetHTMLHeader('<h2>สรุปงานวิจัยแบ่งกลุ่มสาขา การประชุมวิชาการครุศาสตร์อุตสาหกรรมฯ ครั้งที่ ' . $conferences_on . '</h2><hr width="100%" align="center" border-bottom="0"  noshade color="black">'.'<table align="center">'.$headtable.'</table>');
    $pdf->SetFooter('NCTECHED SYSTEM||{PAGENO} / {nb}');
    $pdf->WriteHTML($html, 0); 
    $pdf->SetAuthor('ncteched');
    $pdf->SetAutoFont();
    $pdf->SetDisplayMode('fullpage');
    $pdf->Output('paper-total-'.$conferences_on.'.pdf', 'I'); 
?>