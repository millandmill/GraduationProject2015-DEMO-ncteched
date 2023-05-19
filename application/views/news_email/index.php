<?php
if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }

//if(isset($paper_detail_edit)){
//    $resultData = $paper_detail_edit;
//}

?>

<div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
    <div class="content">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="pull-left">
                    <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                        <i class="fa fa-cubes glyphicon glyphicon-file"></i>&nbsp;ระบบส่งข้อมูลข่าวสารผ่านอีเมล์
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
<!--            <div class="panel-body">-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="jsError thsarabunnew"></div>

                        <form class="jsform" method="POST" name="form_authen" action="/news_email/send_email" enctype="multipart/form-data">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#menu1"><h6>กำหนดกลุ่มผู้ส่ง</h6></a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="menu1" class="tab-pane fade in active">
                                    <div class="form-addproduct">
                                        <div class="checkbox thsarabunnew">
                                            <label><input type="checkbox" name="chk_group[]" value="0">คณะกรรมการ</label>
                                        </div>
                                        <div class="checkbox thsarabunnew">
                                            <label><input type="checkbox" name="chk_group[]" value="1">ผู้ตรวจบทความ</label>
                                        </div>
                                        <div class="checkbox thsarabunnew">
                                            <label><input type="checkbox" name="chk_group[]" value="2">ผู้ส่งบทความ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#menu2"><h6>รายละเอียด</h6></a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="menu2" class="tab-pane fade in active">
                                    <div class="form-addproduct">
                                        <span class="font12 thsarabunnew">เรื่อง</span>

                                        <input class="form-control thsarabunnew" type="text" name="title" value="" maxlength="250"/><br/>
                                        <span class="font12 thsarabunnew">แนบไฟล์</span>

                                        <input type="file" id="filename" name="filename" size="20" accept=".jpg,.pdf,.doc,.docx" />

                                    </div>

                                    <div class="form-addproduct">
                                        <span class="font12 thsarabunnew">ข้อความ</span>
                                        <textarea rows="10" id="area_th" class="form-control thsarabunnew" type="text" name="message" maxlength=""/></textarea><br/>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div id="menu5" class="tab-pane fade in active">
                                    <div class="form-addproduct" style="text-align: center">
                                        <input type="submit" value="ส่ง" class="bt-submit thsarabunnew" name="btn_submit"/>

                                            <input type="reset" value="ย้อนกลับ" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../news/news_public'"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
<!--            </div>-->
        </div>
    </div>
</div>

<div class="modal"></div>

<script src="<?php echo base_url() ?>public/lib/js/jquery-1.10.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $body = $("body");

        $(document).on('submit','form', function (event) {
            $body.addClass("loading");
            event.preventDefault();

            var url = $(this).attr("action");

            $.ajax({
                url: url,
                type: $(this).attr("method"),
                enctype: 'multipart/form-data',
                dataType: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data, status)
                {
                    $('div.jsError').html(data.err);
                },
                error: function (xhr, desc, err)
                {

                }
            })
                .done(function (data) {
                    if(data.flag){
                        $( 'form.jsform' ).each(function(){
                            this.reset();
                        });
                    }

                    $body.removeClass("loading");
                });

        })

    });
</script>

</body>
</html>
