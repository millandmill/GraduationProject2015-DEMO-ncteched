<?php
    $conferences_on ="";
    $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
    foreach ($query1112->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
?>
<div class="col-lg-0">
        <h2>Consortium</h2>
        <center>
            <marquee onmouseover="this.stop();" onmouseout="this.start();" scrolldelay="1"  >
        <?php   
                    $query = $this->db->query("SELECT * FROM footer WHERE footer_status='YES' AND footer_conferences_on=".$conferences_on);
                    foreach ($query->result() as $row)
                    {    
        ?>
        
                <img style="max-width: 100%; height: auto;max-height:150px" src="<?php echo base_url().'uploads/pic-footer/';?><?php echo $row->footer_pic;?>"/>
        <?php                        
                    }   
        ?>
            </marquee>
        </center>
</div>
