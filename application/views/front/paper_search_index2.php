<style type="text/css">
    #flashcontent {
   width: 100%;
   height: 100%;
};

</style>
<link href="<?php echo base_url().'public/lib/';?>css/pagination-index.css" rel="stylesheet" type="text/css" />
<div class="col-lg-12">
    <h2 style="line-height: 200%;">ผลการค้นหา:</h2>
    
        <div class="container">
            <div class="row data-table">
                <table class="table table-striped" id="main-table">
                <thead>
                  <tr>
                    <th style="min-width:60px;"><center>ลำดับที่</center></th>
                    <th style="min-width:175px;">รหัสหมายเลขงานวิจัย</th>
                    <th style="min-width:300px;">ชื่องานวิจัย</th>
                    <th style="min-width:150px;">สาขา</th>
                    <th style="min-width:100px;">ประชุมครั้งที่</th>
                    <th style="min-width:200px;">ชื่อผู้แต่งหรือผู้ร่วมแต่ง</th>
                    <!--<th style="min-width:100px;">อยู่หน้าที่</th>
                    <th style="min-width:200px;">เปิดดูเอกสารรวมเล่ม</th>-->
                  </tr>
                </thead>
                <tbody>
                  <tr>

                    <?php 
                        if (empty($_POST['index_paper_file_key'])&&empty($_POST['index_paper_file_name'])&&empty($_POST['index_paper_file_author'])&&empty($_POST['index_paper_file_year'])&&empty($_POST['index_paper_file_no'])&&empty($_POST['index_paper_file_department_name']))
                        {
                            echo '<td colspan="8"><center><b style="color:red;">--กรุณาใส่คำค้นหา อย่างน้อย 1 ช่อง--</b></center></td>';
                            echo '<script>';
                            echo 'alert("กรุณาใส่คำค้นหา อย่างน้อย 1 ช่อง")';
                            echo '</script>';
                            redirect('welcome/paper_search_index', 'refresh');
                        }  
                        else 
                        {
                            $query = $this->db->query("SELECT *  , GROUP_CONCAT(paper_detail_owner.paper_detail_owner_name) AS NAME FROM paper_detail INNER JOIN paper_detail_owner ON paper_detail.paper_detail_id = paper_detail_owner.paper_detail_id INNER JOIN department ON paper_detail.department_id = department.department_id WHERE paper_detail_status=6 AND paper_numbering_code LIKE '%".$_POST['index_paper_file_key']."%' AND paper_detail_name_th  LIKE '%".$_POST['index_paper_file_name']."%' AND conferences_select_id LIKE '%".$_POST['index_paper_file_no']."%' AND department_name LIKE '%".$_POST['index_paper_file_department_name']."%'  GROUP BY paper_numbering_code HAVING NAME LIKE '%".$_POST['index_paper_file_author']."%' ");
                            $num =1;
                            if($query->num_rows()==0)
                            {
                                echo '<td colspan="8"><center><b style="color:red;">--ไม่พบผลลัพธ์ที่ต้องการ ผลลัพธ์ เท่ากับ 0 --</b></center></td>';
                            }
                            else 
                            {
                                $code_num='';
                                $code_num2='';
                                foreach ($query->result() as $row)
                                {
                                    $code_num=$row->paper_numbering_code;
                    ?>
                    <?php           echo '<tr>';
                                    echo '<td style="text-align:center" >'. $num.'</td>';
                                    echo '<td style="text-align:center" >'. $row->paper_numbering_code.'</td>'; 
                                    echo '<td style="text-align:center" >'. $row->paper_detail_name_th.'</td>'; 
                                    echo '<td style="text-align:center" >'. $row->department_name.'</td>'; 
                                    echo '<td style="text-align:center" >'. $row->conferences_select_id.'</td>'; 
                                    echo '<td>'. $row->NAME.'</td>'; 
                                    //echo '<td style="text-align:center" >'. $row->index_paper_file_page.'</td>';  
                                    //echo '<td style="text-align:center" >'.'<a href="'.base_url().'public/download/DBPass/NCTechEd'.sprintf("%03s",$row->index_paper_file_no).'&#46;pdf"><p>เปิดดู</p></a>'.'</td>';        
                                    $num++;
                                    echo '</tr>';
                                }
                            }   
                        }
                    ?>
                  </tr>
                </tbody>
                </table>
                <?php 
                    $this->load->view('template/pagination/pagination_system');  
                    echo "<br/>";
                ?>
            </div>
        </div>
        <style type="text/css">
            .data-table{min-width:300px; max-width:1200px; overflow-x: scroll; overflow-y:hidden; }
        </style>
        <br/>
        <?php
            if($query->num_rows()>0)
            {
                echo '<div style="float:right;"><b style="color:red;">ผลลัพธ์การค้นหามีทั้งหมด '.$query->num_rows().' รายการ</b></div>';
            }
        ?>
        <br/><center><button class="btn btn-primary" onclick="window.location.href='../welcome/paper_search_index'"><span class="glyphicon glyphicon-search"></span> << กลับไปยังหน้าค้นหา</button></center><br/>
      
</div>
