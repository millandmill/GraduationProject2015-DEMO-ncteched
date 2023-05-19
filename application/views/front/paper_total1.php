<style type="text/css">
    

    
    #flashcontent {
   width: 100%;
   height: 100%;
   
};
</style>
<?php
    $conferences_on ="";
    $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
    foreach ($query1112->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
?>

<div class="col-lg-12">
    <h2 style="line-height: 200%;">การสรุปงานวิจัยแบ่งกลุ่มสาขา ในการประชุมวิชาการ ครั้งที่ <?php echo "$conferences_on"; ?> ดังนี้</h2>
            <table class="table table-striped">
            <thead>
              <tr>
                <th style="width:20%"><center>ลำดับที่</center></th>
                <th style="width:60%">แบ่งตามสาขาวิชา</th>
                <th style="width:20%">จำนวนวิจัย</th>
              </tr>
            </thead>
            <tbody>
               <?php   
                        $num_dep=1;
                        $sum_research=0;
                        $query = $this->db->query("SELECT department_name, count(department_name)AS count FROM paper_detail INNER JOIN department ON department.department_id=paper_detail.department_id WHERE paper_detail_status=6 and conferences_select_id =".$conferences_on." GROUP BY department_name");
                        if($query->num_rows()>0)
                        {
                            foreach ($query->result() as $row)
                            {    
                                echo '<tr>';
                                echo       '<td style="text-align:center" >'.$num_dep.'</td>';
                                echo       '<td>'. $row->department_name.'</td>'; 
                                echo       '<td style="text-align:center">'.$row->count.' เรื่อง</td>'; 
                                echo '</tr>';
                                $sum_research = $row->count + $sum_research;
                                $num_dep++;
                            }
                        }
                        else 
                        {
                            echo '<tr>';
                            echo       '<td style="text-align:center" colspan="3"><center><b style="color: red;">----- ยังไม่มีงานวิจัยเข้าร่วมงาน -----</b></center></td>';
                            echo '</tr>';
                        }
                ?> 
              <tr>
                <td style="text-align:center"></td>
                <td></td>
                <td style="text-align:center">รวมทั้งหมด <?php echo "$sum_research"; ?> เรื่อง</td>
              </tr>
            </tbody>
        </table>
</div>
<div class="col-lg-12">
    <?php
    if($query->num_rows()>0)
    {
    ?>
        <p><a class="btn btn-success" onclick="window.location.href='../print_report/paper_total1'"">พิมพ์สรุปงานวิจัยแบ่งตามกลุ่มสาขา &raquo;</a></p>
    <?php
    }
    ?>  
</div>