<?php
    $conferences_on ="";
    $query1112 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
    foreach ($query1112->result() as $data){
       $conferences_on  = $data->conferences_select_on;
    }
?>
<div class="col-lg-0">
        <h2>Consortium</h2>
        <style>
            .mySlides {display:none;}
        </style>
                <?php   
                    $query = $this->db->query("SELECT * FROM footer WHERE footer_status='YES' AND footer_conferences_on=".$conferences_on);
                    foreach ($query->result() as $row)
                    {    
                ?>
            <center>       
                  <img class="mySlides" style="max-width: 100%; height: auto;max-height:150px" src="<?php echo base_url().'uploads/pic-footer/';?><?php echo $row->footer_pic;  ?>"/>
            </center>    
                <?php                        
                    }   
                ?>        
        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                   x[i].style.display = "none";  
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}    
                x[myIndex-1].style.display = "block";  
                setTimeout(carousel, 2000); // Change image every 2 seconds
            }
        </script>
</div>
