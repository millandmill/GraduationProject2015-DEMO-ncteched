<link href="<?php echo base_url().'public/lib/';?>css/pagination-index.css" rel="stylesheet" type="text/css" />
<?php
    $conferences_on ="";
    $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
    foreach ($query1112->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
?>
<div class="col-lg-12" id="printTable">
        <link rel="stylesheet" href=<?php echo base_url().'public/lib/css/fonts/thsarabunnew.css'; ?>>
        <h2 style="font-family: 'THSarabunNew', sans-serif;">ประกาศข่าว</h2>
        <table class="table table-striped" style="font-family: 'THSarabunNew', sans-serif;" id="main-table">
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
                    $query = $this->db->query("SELECT * FROM news_public WHERE news_public_conferences = ".$conferences_on);
                    if($query->num_rows()>0)
                    {
                        foreach ($query->result() as $row)
                        {    
            ?>
                <tr>
                    <td style="width:9%"><center><?php echo $row->news_public_id; ?></center></td>
                    <td style="width:47%"><?php echo $row->news_name; ?></td>
                    <td style="width:33%"><center><?php echo DateThai($row->news_public_date);  ?></center></td>
                    <td style="width:12%"><center><?php echo $row->news_public_times." น.";  ?></center></td>
                </tr> 
        <?php                        
                        } 
                    }
                    else 
                    {
                        echo '<td style="text-align:center" colspan="4"><center><b style="color: red;">----- ไม่มีข่าวสารที่ประกาศ -----</b></center></td>';
                    }
        ?>        
            </tbody>
        </table>
        <?php 
            $this->load->view('template/pagination/pagination_system');  
            echo "<br/>";
        ?>
</div>
<div class="col-lg-12">
    <?php
    if($query->num_rows()>0)
    {
    ?>
        <p><a class="btn btn-success" onclick="window.location.href='../print_report/news'"">พิมพ์ประกาศข่าวทั้งหมด &raquo;</a></p>
    <?php
    }
    ?>  
</div>
