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
?>
     <table align="center">
        <?php   
                $headtable ="   <tr>
                                    <td width='70'><center><b>หมายเลข</b></center></td>
                                    <td width='125.25'><center><b>รหัสบทความ</b></center></td>
                                    <td width='547'><center><b>ชื่อบทความวิจัย</b></center></td>
                                </tr>
                            ";
                $join = "LEFT JOIN paper_file_index_hash ON index_paper_file.index_paper_file_id = paper_file_index_hash.index_paper_file_id ";
                $where = "WHERE index_paper_file.index_paper_file_no=".$conferences_on." ";
                $order = "ORDER BY index_paper_file.index_paper_file_id ASC";
                $query = $this->db->query("SELECT index_paper_file.*, paper_file_index_hash.paper_file_index_hash_str FROM index_paper_file ".$join.$where.$order."");
                $num=1;
        
                foreach ($query->result() as $row)
                {    
        ?>
                    <tr>
                        <td width='70'><center><?php echo $num; $num++;?></center></td>
                        <td width='110'><?php echo $row->index_paper_file_key;?></td>   
                        <td width='550'><?php echo $row->index_paper_file_name;?></td>   
                    </tr>
            
        <?php   
                }   
        ?>        
     </table> <!--<pagebreak />-->
    
</div>
<?php
    $html = ob_get_contents();        
    ob_end_clean();
    $pdf = new mPDF('th', 'A4', '0', '', '12', '12', '27.5', '18');
    $pdf->SetTitle('ชื่อบทความที่เข้าร่วม การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on);
    $pdf->SetHTMLHeader('<h2>ชื่อบทความที่เข้าร่วม การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ ครั้งที่ ' . $conferences_on . '</h2><hr width="100%" align="center" border-bottom="0"  noshade color="black">'.'<table align="center">'.$headtable.'</table>');
    $pdf->SetFooter('NCTECHED SYSTEM||{PAGENO} / {nb}');
    $pdf->WriteHTML($html, 0); 
    $pdf->SetAuthor('ncteched');
    $pdf->SetAutoFont();
    $pdf->SetDisplayMode('fullpage');
    $pdf->Output('paper-conference-NCTECHED-'.$conferences_on.'.pdf', 'I');
?>