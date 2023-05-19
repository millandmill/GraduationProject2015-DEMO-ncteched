<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().'public/lib/js/';?>paging.js"></script> 
<script type="text/javascript">
            $(document).ready(function() {
                $('#main-table').paging({limit:10});
            });
</script>

