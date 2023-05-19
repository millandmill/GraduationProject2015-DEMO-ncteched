<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>การประชุมวิชาการครุศาสตร์อุตสาหกรรมระดับชาติ</title>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="<?php echo base_url().'public/lib/';?>css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/';?>bootstrap3.3.4/css/bootstrap-theme.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/';?>bootstrap3.3.4/css/bootstrap.css"/>
	<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>css/gridforms.css">
	<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>bootstrap3.3.4/css/datepicker.css">
        <!--<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>font-awesome-4.4.0/css/font-awesome.css"></script>
	<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>font-awesome-4.4.0/css/font-awesome.min.css"></script>-->
	<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>css/fonts/thsarabunnew.css"></script>
        <script src="<?php echo base_url().'public/lib/';?>css/jquery-ui.js"></script>
	<script src="<?php echo base_url().'public/lib/';?>js/jquery-1.10.1.min.js"></script>
	<script src="<?php echo base_url().'public/lib/';?>bootstrap3.3.4/js/bootstrap.js" type="text/javascript"></script>
	<script src="<?php echo base_url().'public/lib/';?>bootstrap3.3.4/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url().'public/lib/';?>bootstrap3.3.4/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url().'public/lib/';?>bootstrap/3.1.1/js/bootstrap.min.js"></script>
        
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/';?>jquery-easyui-1.4.4/themes/default/easyui.css">
    <script type="text/javascript" src="<?php echo base_url().'public/lib/';?>jquery-easyui-1.4.4/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'public/lib/';?>jquery-easyui-1.4.4/jquery.easyui.min.js"></script>
    
	<style type="text/css">
	    #content td:hover{
	        background: #fffded;
	    }
	    thead.purchaseOrder th
	    {
	        background: #ffffff!important;
	        color: #ED4F4F;
	    }
	    thead.purchaseOrder tr th
	    {
	        font-weight:bold;
	    }
	    thead tr th
	    {
	        text-align: center;
	    }
	    tbody.grid-form tr td input
	    {
	        height: 100% !important;
	    }
	    tbody.grid-form tr td, 
	    tfoot.grid-form tr td
	    {
	        height: 51px;
	        vertical-align: middle;
            }
            
            @media only screen and (max-width: 2560px) {
                .carousel-control{
                    top: 8% !important; 
                }
            }
            
            @media only screen and (max-width: 1440px) {
                .carousel-control{
                    top: 14% !important; 
                }
            }
            @media only screen and (max-width: 1366px) {
                .carousel-control{
                    top: 14% !important; 
                }
            }
                      
            
	</style>
        
        <script type="text/javascript">
            
            function previewImg(input) {
                if(input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img_company')
                                .attr('src', e.target.result)
                                .width(120)
                                .height(120);
                    };
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }
            
        </script>
        
 
    
</head>
<body>
<div>   
<nav class="navbar navbar-default  col-lg-12" style="z-index:1000">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header col-lg-12">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <!--<a class="navbar-brand" href="#">NCTECHED</a>-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

        <li><a href="<?php echo base_url(); ?>" class="glyphicon glyphicon-home"><c style="font-family: 'THSarabunNew', sans-serif;"> Home</c><span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url(); ?>welcome/rationale" class="glyphicon glyphicon-book"><c style="font-family: 'THSarabunNew', sans-serif;"> หลักการและเหตุผล</c></a></li>
        
          
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><c class="glyphicon glyphicon-calendar" ><f style="font-family: 'THSarabunNew', sans-serif;"> การส่งผลงานวิจัย </f></c><span class="caret"></span>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>welcome/call_paper" class="glyphicon glyphicon-eye-open"><c style="font-family: 'THSarabunNew', sans-serif;"> ขอบเขตของงานวิจัย</c></a></li>
                <li><a href="<?php echo base_url(); ?>welcome/paper_sub" class="glyphicon glyphicon-send"><c style="font-family: 'THSarabunNew', sans-serif;"> การส่งผลงาน</c></a></li>
                <li><a href="<?php echo base_url(); ?>welcome/paper_time_news" class="glyphicon glyphicon-time"><c style="font-family: 'THSarabunNew', sans-serif;"> ระยะเวลาการส่งผลงาน</c></a></li>
                <li><a href="<?php echo base_url(); ?>welcome/regis_method" class="glyphicon glyphicon-user"><c style="font-family: 'THSarabunNew', sans-serif;"> การลงทะเบียนและวิธีการชำระเงิน</c></a></li>
                <li><a href="<?php echo base_url(); ?>welcome/organizing" class="glyphicon glyphicon-lock"><c style="font-family: 'THSarabunNew', sans-serif;"> คณะกรรมการ</c></a></li>
            </ul>
        </li>  
 
       <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"/><c class="glyphicon glyphicon-calendar" ><f style="font-family: 'THSarabunNew', sans-serif;"> งานวิจัย </f></c><span class="caret"></span>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>welcome/paper_total1" class="glyphicon glyphicon-object-align-bottom"><c style="font-family: 'THSarabunNew', sans-serif;"> สรุปงานวิจัยแบ่งตามสาขา</c></a></li>
                <li><a href="<?php echo base_url(); ?>welcome/downloadpaper" class="glyphicon glyphicon-dashboard"><c style="font-family: 'THSarabunNew', sans-serif;"> ผลงานวิจัยที่ผ่านมา(ตีพิมพ์เป็นเล่มรวม)</c></a></li>
                <!--<li><a href="<?php echo base_url(); ?>welcome/best" class="glyphicon glyphicon-star"><c style="font-family: 'THSarabunNew', sans-serif;"> บทความวิจัยยอดเยี่ยม</c></a></li>
-->             <li><a href="<?php echo base_url(); ?>welcome/paper_search_index" class="glyphicon glyphicon-search"><c style="font-family: 'THSarabunNew', sans-serif;"> ค้นหางานวิจัยที่ได้รับการเข้าร่วมงาน</c></a></li>
            </ul>
        </li>  
          
        <li><a href="<?php echo base_url(); ?>welcome/download" class="glyphicon glyphicon-download-alt"><c style="font-family: 'THSarabunNew', sans-serif;"> ดาวน์โหลด</c></a></li>  
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"/><c class="glyphicon glyphicon-calendar" ><f style="font-family: 'THSarabunNew', sans-serif;"> กำหนดการและสถานที่จัดงาน </f></c><span class="caret"></span>
            <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>welcome/dates" class="glyphicon glyphicon-calendar"><c style="font-family: 'THSarabunNew', sans-serif;"> วันกำหนดที่สำคัญ</c></a></li>
                <li><a href="<?php echo base_url(); ?>welcome/program" class="glyphicon glyphicon-th-list"><c style="font-family: 'THSarabunNew', sans-serif;"> กำหนดการประชุมทางวิชาการ</c></a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo base_url(); ?>welcome/where" class="glyphicon glyphicon-plane"><c style="font-family: 'THSarabunNew', sans-serif;"> สถานที่จัดงาน</c></a></li>
            </ul>
        </li>
      </ul> 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!-- end row-->   
</div>    
    
    <?php
        $conferences_on_pic ="";
        $query11122 = $this->db->query("SELECT * FROM conferences_select_on WHERE conferences_select_status= 1 ");
        foreach ($query11122->result() as $data){
           $conferences_on_pic  = $data->conferences_select_on;
        }
    ?>
    <!-- class=carousel slide คือ ภาพไหว carousel คือ ภาพไม่ไหว data-interval คือ เพิ่มเวลาหน่วง หน่วยเป็น ms-->
    <div id="carousel-example-generic" class="carousel " data-ride="carousel" data-interval="10000">
      <!-- Indicators กำหนดจำนวนภาพ -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      </ol>

      <!-- Wrapper for slides ภาพ -->
      <div class="carousel-inner">
        <div class="item active">
         <?php   
            $this->db->select('*');
            $this->db->where('header_status','YES' );
            $this->db->where('header_order','1');
            $this->db->where('header_conferences_on',$conferences_on_pic);
            $q = $this->db->get('header');
            $data = array_shift($q->result_array());
            $pic1 = $data['header_pic'];
            $href_pic1 = $data['header_url'];
         ?> 
          <a href="<?php echo $href_pic1 ?>" target="_blank"><img src="<?php echo base_url().'uploads/pic-header/'.$pic1;?>" alt="..."></a>
        </div>
        <div class="item">
          <?php 
            $this->db->select('*');
            $this->db->where('header_status','YES' );
            $this->db->where('header_order','2');
            $this->db->where('header_conferences_on',$conferences_on_pic);
            $q = $this->db->get('header');
            $data = array_shift($q->result_array());
            $pic2 = $data['header_pic'];
            $href_pic2 = $data['header_url'];
          ?>
          <a href="<?php echo $href_pic2 ?>" target="_blank"><img src="<?php echo base_url().'uploads/pic-header/'.$pic2;?>" alt="..."></a>
        </div>
      </div>

      <!-- Controls ปุ่มเลื่อนภาพ -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div> <!-- Carousel -->

    
    
<?php
	function DateThai($strDate)
	{
                
                $strwday= date("w",strtotime($strDate));
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$TH_Day = Array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
                $sstrwdayth=$TH_Day[$strwday];
                $strMonthThai=$strMonthCut[$strMonth];
		return "วัน$sstrwdayth ที่ $strDay $strMonthThai $strYear";
	}

	 
    function chkBrowser($nameBroser){  
        return preg_match("/".$nameBroser."/",$_SERVER['HTTP_USER_AGENT']);  
    }  
    

?>



<script>
 //  function printData()
    {
        var divToPrint=document.getElementById("printTable");
        var htmlToPrint = '' +
        '<style type="text/css">' +
        'table {'+
        '    border-collapse: collapse; border-top:1px solid #000;'+
        '}'+
        'table th, table td {' +
        'border:1px solid black;' +
        'border-right:1px solid #000;' +
        '}' +
        'tr{border-left:1px solid #000;border-bottom:1px solid #000;}' +
        
        '</style>';
        
        htmlToPrint += divToPrint.outerHTML;
        newWin = window.open("");
        newWin.document.write(htmlToPrint);
        newWin.document.close();
        
        
        
        
        
        //newWin.document.write(htmlToPrint);
        //newWin.document.close();
        //newWin.focus();
        
        //newWin.print();
        
    }
</script>

