<?php
	if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
	
	if(isset($paper_detail_edit)){
		$resultData = $paper_detail_edit;
	}
	
?>

		    <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
		        <div class="content">
		            <div class="panel panel-warning">
		                <div class="panel-heading">
		                    <div class="pull-left">
		                        <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
		                            <i class="fa fa-cubes glyphicon glyphicon-file"></i>&nbsp;ส่งบทความ
		                        </div>
		                    </div>
		                    <div class="clearfix"></div>
		                </div>
		                <div class="panel-body">
		                  	<div class="row">
			                    <div class="col-md-12"> 
			                        <form method="POST" name="form_authen" action="paper_detail_add" enctype="multipart/form-data">
			                                <ul class="nav nav-tabs">
                                                                <li class="active"><a data-toggle="tab" href="#menu1"><h6>ชื่อผลงานวิจัย</h6></a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div id="menu1" class="tab-pane fade in active">
                                                                <div class="form-addproduct">
                                                                    <input type="hidden" name="paper_detail_id" value="<?php if(isset($resultData[0]['paper_detail_id'])){ echo $resultData[0]['paper_detail_id']; } ?>"/>
                                                                    <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>"/>
                                                                    <span class="font12 thsarabunnew">ภาษาไทย</span>
                                                                    <input class="form-control thsarabunnew" type="text" name="paper_detail_name_th" value="<?php if(isset($resultData[0]['paper_detail_name_th'])){ echo $resultData[0]['paper_detail_name_th']; } ?>" maxlength="250"/><br/>
                                                                    <span class="font12 thsarabunnew">ภาษาอังกฤษ</span>
                                                                    <input class="form-control thsarabunnew" type="text" name="paper_detail_name_en" value="<?php if(isset($resultData[0]['paper_detail_name_en'])){ echo $resultData[0]['paper_detail_name_en']; } ?>" maxlength="250"/><br/>
                                                                    <span class="font12 thsarabunnew">สาขางานที่นำเสนอ</span><br/>
                                                                    <select class="thsarabunnew" name="department_id" class="slt">
                                                                        <option class="thsarabunnew" value="0">----- เลือกสาขา -----</option>
                                                                        <option class="thsarabunnew" value="1">เครื่องกล</option>
                                                                        <option class="thsarabunnew" value="2">คอมพิวเตอร์</option>
                                                                        
                                                                    </select>
                                                                </div>	                
                                                            </div>
                                                        </div>
                                                        
                                                        <ul class="nav nav-tabs">
                                                                <li class="active"><a data-toggle="tab" href="#menu2"><h6>รายละเอียด</h6></a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div id="menu2" class="tab-pane fade in active">
                                                                <div class="form-addproduct">
                                                                   <span class="font12 thsarabunnew">บทคัดย่อ</span>
                                                                        <textarea rows="10" class="form-control thsarabunnew" type="text" name="paper_detail_abstract" maxlength=""/><?php if(isset($resultData[0]['paper_detail_abstract'])){ echo $resultData[0]['paper_detail_abstract']; } ?></textarea><br/>
                                                                            
                                                                </div>	                
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <ul class="nav nav-tabs">
                                                                <li class="active"><a data-toggle="tab" href="#menu2"><h6>คำสำคัญ</h6></a></li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div id="menu3" class="tab-pane fade in active">
                                                                <div class="form-addproduct">
                                                                   <span class="font12 thsarabunnew">ภาษาไทย</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_keyword_th" value="<?php if(isset($resultData[0]['paper_detail_keyword_th'])){ echo $resultData[0]['paper_detail_keyword_th']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">ภาษาอังกฤษ</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_keyword_en" value="<?php if(isset($resultData[0]['paper_detail_keyword_en'])){ echo $resultData[0]['paper_detail_keyword_en']; } ?>" maxlength="250"/><br/>  
                                                                </div>	                
                                                            </div>
                                                        </div>
                                                    
                                                            <ul class="nav nav-tabs">
                                                                <li class="active"><a data-toggle="tab" href="#menu2"><h6>ชื่อผู้ส่ง ชื่อผู้นำเสนอ ชื่อเจ้าของผลงาน</h6></a></li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div id="menu4" class="tab-pane fade in active">
                                                                    <div class="form-addproduct">
                                                                        <span class="font12 thsarabunnew">ชื่อเจ้าของผลงาน</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_name1" value="<?php if(isset($resultData[0]['paper_detail_name1'])){ echo $resultData[0]['paper_detail_name1']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">อีเมล์</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_email1" value="<?php if(isset($resultData[0]['paper_detail_email1'])){ echo $resultData[0]['paper_detail_email1']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">เบอร์โทร</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_tel1" value="<?php if(isset($resultData[0]['paper_detail_tel1'])){ echo $resultData[0]['paper_detail_tel1']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">ที่อยู่</span>
                                                                        <textarea rows="5" class="form-control thsarabunnew" type="text" name="paper_detail_add1" maxlength="250" ><?php if(isset($resultData[0]['paper_detail_add1'])){ echo $resultData[0]['paper_detail_add1']; } ?></textarea><br/>                                                                     
                                                                        
                                                                    
                                                                        <div class="input-group checkbox font12 thsarabunnew">
                                                                        <span class="input-group-addon">    
                                                                            <label><input class="thsarabunnew" type="checkbox" name="paper_detail_presenter1" value="YES" checked <?php if(isset($resultData[0]['paper_detail_presenter1']) && trim($resultData[0]['paper_detail_presenter1'] != '') ){ echo "checked"; } ?> />เป็นผู้นำเสนอผลงาน</label>
                                                                        </span>
                                                                        </div>
                                                                        <br />
                                                                    
                                                                    
                                                                        <span class="font12 thsarabunnew">ชื่อร่วมส่งงานวิจัยคนที่ 1</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_name2" value="<?php if(isset($resultData[0]['paper_detail_name2'])){ echo $resultData[0]['paper_detail_name2']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">อีเมล์</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_email2" value="<?php if(isset($resultData[0]['paper_detail_email2'])){ echo $resultData[0]['paper_detail_email2']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">เบอร์โทร</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_tel2" value="<?php if(isset($resultData[0]['paper_detail_tel2'])){ echo $resultData[0]['paper_detail_tel2']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">ที่อยู่</span>
                                                                        <textarea rows="5" class="form-control thsarabunnew" type="text" name="paper_detail_add2" maxlength="250" ><?php if(isset($resultData[0]['paper_detail_add2'])){ echo $resultData[0]['paper_detail_add2']; } ?></textarea><br/>
                                                                        
                    
                                                                        <div class="input-group checkbox font12 thsarabunnew">
                                                                        <span class="input-group-addon">    
                                                                            <label><input class="thsarabunnew" type="checkbox" name="paper_detail_presenter2" value="YES" <?php if(isset($resultData[0]['paper_detail_presenter2']) && trim($resultData[0]['paper_detail_presenter2'] != '')){ echo "checked"; } ?> />เป็นผู้นำเสนอผลงาน</label>
                                                                        </span>
                                                                        </div>
                                                                        <br />
                    
                                                                        <span class="font12 thsarabunnew">ชื่อร่วมส่งงานวิจัยคนที่ 2</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_name3" value="<?php if(isset($resultData[0]['paper_detail_name3'])){ echo $resultData[0]['paper_detail_name3']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">อีเมล์</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_email3" value="<?php if(isset($resultData[0]['paper_detail_email3'])){ echo $resultData[0]['paper_detail_email3']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">เบอร์โทร</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_tel3" value="<?php if(isset($resultData[0]['paper_detail_tel3'])){ echo $resultData[0]['paper_detail_tel3']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">ที่อยู่</span>
                                                                        <textarea rows="5" class="form-control thsarabunnew" type="text" name="paper_detail_add3"  maxlength="250" ><?php if(isset($resultData[0]['paper_detail_add3'])){ echo $resultData[0]['paper_detail_add3']; } ?></textarea><br/>
                                                                        
                                                                        <div class="input-group checkbox font12 thsarabunnew">
                                                                        <span class="input-group-addon">    
                                                                            <label><input class="thsarabunnew" type="checkbox" name="paper_detail_presenter3" value="YES" <?php if(isset($resultData[0]['paper_detail_presenter3'])&& trim($resultData[0]['paper_detail_presenter3'] != '')){ echo "checked"; } ?> />เป็นผู้นำเสนอผลงาน</label>
                                                                        </span>
                                                                        </div>
                                                                        <br />
                    
                                                                        <span class="font12 thsarabunnew">ชื่อร่วมส่งงานวิจัยคนที่ 3</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_name4" value="<?php if(isset($resultData[0]['paper_detail_name4'])){ echo $resultData[0]['paper_detail_name4']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">อีเมล์</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_email4" value="<?php if(isset($resultData[0]['paper_detail_email4'])){ echo $resultData[0]['paper_detail_email4']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">เบอร์โทร</span>
                                                                        <input class="form-control thsarabunnew" type="text" name="paper_detail_tel4" value="<?php if(isset($resultData[0]['paper_detail_tel4'])){ echo $resultData[0]['paper_detail_tel4']; } ?>" maxlength="250"/><br/>
                                                                        <span class="font12 thsarabunnew">ที่อยู่</span>
                                                                        <textarea rows="5" class="form-control thsarabunnew" type="text" name="paper_detail_add4"  maxlength="250" ><?php if(isset($resultData[0]['paper_detail_add4'])){ echo $resultData[0]['paper_detail_add4']; } ?></textarea><br/>
                    
                                                                        <div class="input-group checkbox font12 thsarabunnew">
                                                                        <span class="input-group-addon">    
                                                                            <label><input class="thsarabunnew" type="checkbox" name="paper_detail_presenter4" value="YES" <?php if(isset($resultData[0]['paper_detail_presenter4'])&& trim($resultData[0]['paper_detail_presenter4'] != '')){ echo "checked"; } ?> />เป็นผู้นำเสนอผลงาน</label>
                                                                        </span>
                                                                        </div>
                                                                        <br />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="tab-content">
                                                                <div id="menu5" class="tab-pane fade in active">
                                                                    <div class="form-addproduct">
                                                                        
                                                                        <center><input type="submit" value="บันทึก" class="bt-submit thsarabunnew" name="btn_submit"/>
								        <input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" /> 
                                                                        <input type="reset" value="ย้อนกลับ" class="bt-reset thsarabunnew" name="btn_back" /></center>
                                                                    </div>
                                                                </div>
                                                            </div>
								    
                                            </div>
                                        </div>
                                    </div>
                                </div>                     
			    </div>
		        </div>
</body>
</html>