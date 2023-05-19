<?php
    $conferences_on ="";
    $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
    foreach ($query1112->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
?>
<link href="<?php echo base_url().'public/lib/';?>css/pagination-index.css" rel="stylesheet" type="text/css" />
<div class="col-lg-12" id="printTable">
        <link rel="stylesheet" href=<?php echo base_url().'public/lib/css/fonts/thsarabunnew.css'; ?>>
        <h2 style="font-family: 'THSarabunNew', sans-serif;">ชื่อบทความที่เข้าร่วมในงานประชุมวิชาการ ครั้งที่ <?php echo $conferences_on; ?></h2>
        <?php
            $num_paper =1;

            //เอากลับมาเหมือนเดิม เพราะวาที่มันเออเร่อ เพราะตารางมันหายไป ตอนนี้สร้างตารางนี้กลับมาเหมือนเดมละ จริงๆ มันจำเป็นต้อใช้ index_paper_file ด้วย
            $join = "LEFT JOIN paper_file_index_hash ON index_paper_file.index_paper_file_id = paper_file_index_hash.index_paper_file_id ";
            $where = "WHERE index_paper_file.index_paper_file_no=".$conferences_on." ";
            $order = "ORDER BY index_paper_file.index_paper_file_id ASC";
            $select = "SELECT index_paper_file.*, paper_file_index_hash.paper_file_index_hash_str FROM index_paper_file ".$join.$where.$order."";
//            $query_paper = $this->db->query("SELECT * FROM paper_detail
//                                             INNER JOIN department ON paper_detail.department_id = department.department_id
//                                             WHERE paper_detail_status=6
//                                             AND conferences_select_id=".$conferences_on."");
            $query_paper = $this->db->query($select);
            //เอากลับมาเหมือนเดิม เพราะวาที่มันเออเร่อ เพราะตารางมันหายไป ตอนนี้สร้างตารางนี้กลับมาเหมือนเดมละ จริงๆ มันจำเป็นต้อใช้ index_paper_file ด้วย

        ?>
        <table class="table table-striped" style="font-family: 'THSarabunNew', sans-serif;" id="main-table">
            <thead>
              <tr style="text-align:center">
                <th style="width:10%;">หมายเลข</th>
                <th style="width:20%;">รหัสบทความ</th>
                <th style="width:60%;">ชื่อบทความวิจัย</th>
                <th style="width:10%;">ดาวน์โหลด</th>
              </tr>
            </thead>    
            <tbody>
              <tr>
                <?php
                //var_dump($query_paper);
                    if($query_paper->num_rows()>0)
                    {
                        foreach ($query_paper->result() as $data_paper_index){
                            echo '<tr>';
                            echo       '<td style="text-align:center">'.$num_paper.'</td>';
                            echo       '<td style="text-align:center">'.$data_paper_index->index_paper_file_key.'</td>';
                            echo       '<td style="text-align:center">'.$data_paper_index->index_paper_file_name.'</td>';
                            echo       '<td style="text-align:center"><a href="'.base_url().'uploadfile/download_file_index/'.$data_paper_index->paper_file_index_hash_str.'" target="_blank"><span class="glyphicon glyphicon-download-alt"></span></a></td>';
                            echo '</tr>';
                            $num_paper++;
                        }
                    }
                    else
                    {
                        echo '<td style="text-align:center" colspan="2"><center><b style="color: red;">----- ยังไม่มีงานวิจัยเข้าร่วมงาน -----</b></center></td>';
                    }
                ?> 
              </tr>
            </tbody>
        </table>
        <?php 
            $this->load->view('template/pagination/pagination_system');  
            echo "<br/>";
        ?>
        <br/>มีจำนวนบทความมีทั้งหมด <?php echo "$query_paper->num_rows"; ?> รายการ
</div>
<div class="col-lg-12">
    <?php
        if($query_paper->num_rows()>0)
        {
    ?>
            <p><a class="btn btn-success" onclick="window.location.href='../print_report/paper_conference'"">พิมพ์ชื่อบทความที่เข้าร่วมทั้งหมด &raquo;</a></p>
    <?php
        }
    ?>
</div>
   