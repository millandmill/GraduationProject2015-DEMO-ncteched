<?php
    $conferences_on ="";
    $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
    foreach ($query1112->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
?>
<div class="col-lg-12">

    <div class="container col-lg-12" id="printTable" style="font-family: 'THSarabunNew', sans-serif;">
      <link rel="stylesheet" href=<?php echo base_url().'public/lib/css/fonts/thsarabunnew.css'; ?>>
      <h2>โปรแกรม</h2>
        <h4 style="text-align: center; line-height: 200%; "> 
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width:40%"><center>วัน/เดือน/ปี เวลา</center></th>
                    <th style="width:60%"><center>โปรแกรม</center></th>
                  </tr>
                </thead>
                <tbody>
                <?php   
                        $query = $this->db->query("SELECT * FROM program_date WHERE program_date_conferences = ".$conferences_on);
                        foreach ($query->result() as $row)
                        {    
                ?>
                  <tr>
                    <td style="text-align:center"><?php echo DateThai($row->program_date_day);  ?><br/><?php echo substr($row->program_date_time_start, 0, 5)." น. - ";  ?><?php echo substr($row->program_date_time_end, 0, 5)." น.";  ?></td>
                    <td style="text-align:left"><?php echo $row->program_date_name;  ?></td>
                  </tr> 
                <?php                        
                        }   
                ?>   
                </tbody>
            </table>
        </h4>  
            <p style="color:red"><b>*หมายเหตุ : กำหนดการอาจมีการเปลี่ยนแปลงตามความเหมาะสม</b></p>
            
    </div>
    <p><a class="btn btn-success" onclick="window.location.href='../print_report/program_date'"">พิมพ์โปรแกรมกำหนดการการประชุมวิชาการ &raquo;</a></p>
</div>

