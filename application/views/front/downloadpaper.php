<style type="text/css">
    

    
    #flashcontent {
   width: 100%;
   height: 100%;
   
};

</style>

<div class="col-lg-12">
      <h2>ผลงานวิจัยที่ผ่านมา</h2>
            <h4 style="text-align:left; line-height: 200%; text-indent: 0.5in; ">
                <?php   
                        $query = $this->db->query("SELECT * FROM downloadpaper_file");
                        foreach ($query->result() as $row)
                        {    
                           echo '<a href="'.base_url().'public/download/DBPass/'.$row->downloadpaper_file_name.'"><p>ผลงานการประชุมวิชาการระดับชาติครั้งที่ '.$row->downloadpaper_file_no.'/ '.$row->downloadpaper_file_year.'</p></a>';
                       
                        }   
                ?>
            </h4>
</div> 