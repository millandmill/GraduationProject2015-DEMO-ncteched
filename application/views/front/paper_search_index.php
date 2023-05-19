<style type="text/css">
    

    
    #flashcontent {
   width: 100%;
   height: 100%;
   
};

</style>

<div class="col-lg-12">
    <h2 style="line-height: 200%;">ค้นหางานวิจัยที่ได้รับการเข้าร่วมงาน</h2>
    <form action="paper_search_index2" method="POST">
       <div class="form-group">
           <label for="textsearch" >รหัสหมายเลขงานวิจัย <i style="color:red;">เช่น NCTechEd08-001</i></label>
                <input type="text" name="index_paper_file_key" class="form-control" placeholder="ค้นหาจาก รหัสหมายเลขงานวิจัย" autocomplete="off">
       </div>
       <div class="form-group">
            <label for="textsearch" >ชื่องานวิจัย</label>
                <input type="text" name="index_paper_file_name" class="form-control" placeholder="ค้นหาจาก ชื่องานวิจัย" autocomplete="off">
       </div>
        <div class="form-group">
            <label for="textsearch" >ครั้งที่ของงานประชุม</label>
                <select style="font-family: 'THSarabunNew', sans-serif;" name="index_paper_file_no" class="form-control">
                    <option class="thsarabunnew" value="">----- กรุณาเลือกสาขา -----</option>
                <?php   
                        $query = $this->db->query("SELECT * FROM conferences_select_on");
                        foreach ($query->result() as $row)
                        {
                           echo '<option class="thsarabunnew" value="'.$row->conferences_select_on.'">'.$row->conferences_select_note.'</option>';
                        }   
                ?>
                </select>   
       </div>
       <div class="form-group">
            <label for="textsearch" >สาขางานวิจัย</label>
                <select style="font-family: 'THSarabunNew', sans-serif;" name="index_paper_file_department_name" class="form-control">
                    <option class="thsarabunnew" value="">----- กรุณาเลือกสาขา -----</option>
                <?php   
                        $query = $this->db->query("SELECT * FROM department");
                        foreach ($query->result() as $row)
                        {
                           echo '<option class="thsarabunnew" value="'.$row->department_name.'">'.$row->department_name.'</option>';
                        }   
                ?>
                </select>   
       </div>
       <div class="form-group">
            <label for="textsearch" >ชื่อผู้แต่งหรือผู้ร่วมแต่ง</label>
                <input type="text" name="index_paper_file_author" class="form-control" placeholder="ค้นหาจาก ชื่อผู้แต่งหรือผู้ร่วมแต่ง" autocomplete="off">
       </div>
        <center><button type="submit" class="btn btn-primary" id="btnSearch"><span class="glyphicon glyphicon-search"></span> ค้นหา</button></center><br/>
    </form>
</div>
