<?php
if ($this->session->userdata('user_id') == "") {
    redirect('welcome/logout');
}

if (isset($paper_detail_edit)) {
    $resultData = $paper_detail_edit;
}

?>

<div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
    <div class="content">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="pull-left">
                    <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                        <i class="fa fa-cubes glyphicon glyphicon-file"></i>&nbsp;ส่งบทความ (หัวข้อ)
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" name="form_authen" action="<?php echo $action; ?>" enctype="multipart/form-data">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#menu1"><h6>ชื่อผลงานวิจัย</h6></a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="menu1" class="tab-pane fade in active">
                                    <div class="form-addproduct">
                                        <input type="hidden" name="user_id"
                                               value="<?php echo $this->session->userdata('user_id'); ?>"/>
                                        <span class="font12 thsarabunnew">ภาษาไทย</span>
                                        <?php echo form_error('paper_detail_name_th', '<div class="error thsarabunnew" style="color:red">', '</div>'); ?>
                                        <input data-validation="required"
                                               data-validation-error-msg-required="กรุณาใส่ชื่องานวิจัยภาษาไทย"
                                               class="form-control thsarabunnew" type="text" name="paper_detail_name_th"
                                               value="<?php if (isset($resultData[0]['paper_detail_name_th'])) {
                                                   echo $resultData[0]['paper_detail_name_th'];
                                               } echo set_value('paper_detail_name_th'); ?>" maxlength="250"/><br/>
                                        <span class="font12 thsarabunnew">ภาษาอังกฤษ</span>
                                        <?php echo form_error('paper_detail_name_en', '<div class="error thsarabunnew" style="color:red">', '</div>'); ?>
                                        <input data-validation="required"
                                               data-validation-error-msg-required="กรุณาใส่ชื่องานวิจัยภาษาอังกฤษ"
                                               class="form-control thsarabunnew" type="text" name="paper_detail_name_en"
                                               value="<?php if (isset($resultData[0]['paper_detail_name_en'])) {
                                                   echo $resultData[0]['paper_detail_name_en'];
                                               } echo set_value('paper_detail_name_en'); ?>" maxlength="250"/><br/>
                                        <span class="font12 thsarabunnew">สาขางานที่นำเสนอ</span><br/>

                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('department');
                                        $this->db->where('department_status', 'YES');
                                        $query_department = $this->db->get();
                                        ?>
                                        <select data-validation="required"
                                                data-validation-error-msg-required="กรุณาเลือกสาขางานที่นำเสนอ"
                                                class="thsarabunnew" name="department_id" class="slt">
                                            <option class="thsarabunnew" value="">---เลือกสาขางาน---</option>
                                            <?php
                                            foreach ($query_department->result() as $department) {
                                                ?>
                                                <option class="thsarabunnew"
                                                        value="<?php echo $department->department_id; ?>" <?php if (isset($resultData[0]['department_id'])) {
                                                    if ($resultData[0]['department_id'] == $department->department_id) {
                                                        echo 'selected';
                                                    }
                                                } echo set_select('department_id', $department->department_id, False); ?>><?php echo $department->department_name; ?></option>
                                                <?php
                                            }
                                            ?>
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
                                        <span class="font12 thsarabunnew">บทคัดย่อภาษาไทย</span>
                                        <?php echo form_error('paper_detail_abstract_th', '<div class="error thsarabunnew" style="color:red">', '</div>'); ?>
                                        <!--<b><li class="font8 thsarabunnew" style="color: red; text-align:right">กรอกตัวอักษรได้อีก <span class="font12 thsarabunnew" id="maxlength_th">1000</span> ตัว</li></b>-->
                                        <textarea rows="10" id="area_th" class="form-control thsarabunnew" type="text"
                                                  name="paper_detail_abstract_th"
                                                  maxlength=""/><?php if (isset($resultData[0]['paper_detail_abstract_th'])) {
                                            echo $resultData[0]['paper_detail_abstract_th'];
                                        } echo set_value('paper_detail_abstract_th'); ?></textarea><br/>

                                    </div>
                                    <div class="form-addproduct">
                                        <span class="font12 thsarabunnew">บทคัดย่อภาษาอังกฤษ</span>
                                        <?php echo form_error('paper_detail_abstract_en', '<div class="error thsarabunnew" style="color:red">', '</div>'); ?>
                                        <!--<b><li class="font8 thsarabunnew" style="color: red; text-align:right">กรอกตัวอักษรได้อีก <span class="font12 thsarabunnew" id="maxlength_en">1000</span> ตัว</li></b>-->
                                        <textarea rows="10" id="area_en" class="form-control thsarabunnew" type="text"
                                                  name="paper_detail_abstract_en"
                                                  maxlength=""/><?php if (isset($resultData[0]['paper_detail_abstract_en'])) {
                                            echo $resultData[0]['paper_detail_abstract_en'];
                                        } echo set_value('paper_detail_abstract_en'); ?></textarea><br/>

                                    </div>
                                </div>
                            </div>


                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#menu3"><h6>คำสำคัญ</h6></a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="menu3" class="tab-pane fade in active">
                                    <div class="form-addproduct">

                                        <span class="font12 thsarabunnew">ภาษาไทย</span>
                                        <?php echo form_error('paper_detail_keyword_th', '<div class="error thsarabunnew" style="color:red">', '</div>'); ?>
                                        <input data-validation="required"
                                               data-validation-error-msg-required="กรุณาใส่คำสำคัญ ภาษาไทย"
                                               class="form-control thsarabunnew" type="text"
                                               name="paper_detail_keyword_th"
                                               value="<?php if (isset($resultData[0]['paper_detail_keyword_th'])) {
                                                   echo $resultData[0]['paper_detail_keyword_th'];
                                               } echo set_value('paper_detail_keyword_th'); ?>" maxlength="250"/><br/>

                                        <span class="font12 thsarabunnew">ภาษาอังกฤษ</span>
                                        <?php echo form_error('paper_detail_keyword_en', '<div class="error thsarabunnew" style="color:red">', '</div>'); ?>
                                        <input data-validation="required"
                                               data-validation-error-msg-required="กรุณาใส่คำสำคัญ ภาษาอังกฤษ"
                                               class="form-control thsarabunnew" type="text"
                                               name="paper_detail_keyword_en"
                                               value="<?php if (isset($resultData[0]['paper_detail_keyword_en'])) {
                                                   echo $resultData[0]['paper_detail_keyword_en'];
                                               } echo set_value('paper_detail_keyword_en'); ?>" maxlength="250"/><br/>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div id="menu5" class="tab-pane fade in active">
                                    <div class="form-addproduct" style="text-align: center">

                                        <input type="submit" value="บันทึก" class="bt-submit thsarabunnew"
                                                       name="btn_submit"/>
                                            <!--<input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" /> -->
                                            <input type="reset" value="ย้อนกลับ" class="bt-reset thsarabunnew"
                                                   name="btn_back"
                                                   onclick="window.location.href='../<?php echo $btn_back; ?>'"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.20/jquery.form-validator.min.js"></script>
<script>

    $.validate({
        modules: 'location, date, security, file',
        onModulesLoaded: function () {
            $('#country').suggestCountry();
        }
    });

    // Restrict presentation length
    $('#presentation').restrictLength($('#pres-max-length'));


</script>
<script>
    $.validate({
        lang: 'en'
    });
</script>
<script>
    $('#area_th').restrictLength($('#maxlength_th'));
    $('#area_en').restrictLength($('#maxlength_en'));
</script> 