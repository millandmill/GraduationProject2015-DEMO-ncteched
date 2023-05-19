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
      <h2>ดาวน์โหลด</h2>
            <h4 style="text-align: left; line-height: 200%; text-indent: 0.5in; ">
                <?php   
                    $query = $this->db->query("SELECT * FROM file_announce WHERE file_announce_status='YES' AND file_announce_conferences_on=".$conferences_on);
                    foreach ($query->result() as $row)
                    {    
                ?> 
                <a href="<?php echo base_url().'public/download/announce/';?><?php echo $row->file_announce_name;?>"><p>ประกาศรายละเอียดการส่งบทความ การประชุมวิชาการ ครั้งที่ <?php echo $row->file_announce_conferences_on;?></p></a>
                <?php                        
                    }   
                ?>
                <a href="<?php echo base_url().'public/download/';?>tt.doc"><p >แบบลงทะเบียนประชุมวิชาการ</p></a>
                <a href="<?php echo base_url().'public/download/';?>NCteched05.dot"><p>รูปแบบบทความ และแม่แบบบทความ</p></a>
                <a href="<?php echo base_url().'public/download/';?>%E0%B9%81%E0%B8%9A%E0%B8%9A%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%A1%E0%B8%B4%E0%B8%99%E0%B8%9A%E0%B8%97%E0%B8%84%E0%B8%A7%E0%B8%B2%E0%B8%A1%E0%B8%A7%E0%B8%B4%E0%B8%88%E0%B8%B1%E0%B8%A2-%E0%B8%A7%E0%B8%B4%E0%B8%8A%E0%B8%B2%E0%B8%81%E0%B8%B2%E0%B8%A3.doc"><p>แบบประเมินบทความวิจัย/วิชาการ</p></a>
                
                <?php   
                    $query = $this->db->query("SELECT * FROM file_schedule WHERE file_schedule_conferences_on=".$conferences_on);
                    foreach ($query->result() as $row)
                    {    
                ?> 
                <a href="<?php echo base_url().'public/download/schedule/';?><?php echo $row->file_schedule_name;?>"><p>ตารางการนำเสนอบทความ ครั้งที่ <?php echo $row->file_schedule_conferences_on;?></p></a>
                <?php                        
                    }   
                ?>
                
                
                
                
            </h4>
</div>
<div class="container col-lg-12">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#menu1"><h6>VDO สาธิต </h6></a></li>
      </ul>
      <div class="tab-content">
        <div id="menu1" class="tab-pane fade in active">
            <h5 style="text-align: left; line-height: 200%; text-indent: 0.5in; ">
                <a href="<?php echo base_url().'public/download/VDO/';?>NCTECHED04-VDO1.swf"><p>การเริ่มใช้แม่แบบเอกสาร</p></a>
                <a href="<?php echo base_url().'public/download/VDO/';?>NCTECHED04-VDO2.swf"><p>การนำเข้าข้อความจาก Notepad สู่บทความ </p></a>
                <a href="<?php echo base_url().'public/download/VDO/';?>NCTECHED04-VDO3.swf"><p>เทคนิคการใช้ลักษณะ</p></a>
                <a href="<?php echo base_url().'public/download/VDO/';?>NCTECHED04-VDO4.swf"><p>การวาดภาพบนผืนผ้าใบ</p></a>
                <a href="<?php echo base_url().'public/download/VDO/';?>NCTECHED04-VDO5.swf"><p>การแทรกตารางในบทความ</p></a>
                <a href="<?php echo base_url().'public/download/VDO/';?>NCTECHED04-VDO6.swf"><p>การแทรกภาพลงในบทความ</p></a>
                <a href="<?php echo base_url().'public/download/VDO/';?>NCTECHED04-VDO7.swf"><p>การใช้แม่แบบบทความใน MS word 2007</p></a>
            </h5>
        </div>
      </div>
    <h4 style="text-align: left; line-height: 200%; text-indent: 0.5in; ">
                
            </h4>
    </div>  