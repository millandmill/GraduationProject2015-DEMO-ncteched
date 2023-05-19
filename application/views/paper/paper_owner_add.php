<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
    <div class="content">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="pull-left">
                    <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                        <i class="fa fa-cubes glyphicon glyphicon-file"></i>&nbsp;เพิ่มผู้วิจัยใหม่ : <?php if(isset($paper_detail_name_th)){ echo $paper_detail_name_th; } ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="jsError thsarabunnew"></div>

                        <form method="POST" name="form_authen" id="frm_submit" action="../paper/add_owner" enctype="multipart/form-data">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#menu1"><h6>ผู้วิจัย</h6></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Text input-->
                                <table style="width: 100%" class="table">
                                    <thead>
                                    <tr>
<!--                                        <th>ลำดับที่</th>-->
                                        <th> </th>
                                        <th>คำนำหน้า</th>
                                        <th>ชื่อ - นามสกุล</th>
                                        <th>อีเมล</th>
                                        <th>ที่อยู่</th>
                                        <th>เบอร์โทรศัพท์มือถือ</th>
                                        <th>เบอร์โทรศัพท์ที่ทำงาน</th>
                                    </tr>
                                    </thead>
                                    <tbody id="table-details"><tr id="row1" class="jdr1">
                                        <td>
<!--                                            <span class="btn btn-sm btn-default">1</span>-->
                                            <input type="hidden" value="6437" name="count[]">
                                            <input type="hidden" value="<?php if(isset($paper_detail_id)){ echo $paper_detail_id; } ?>" name="paper_detail_id">
                                            <input type="hidden" value="1" name="status">
                                        </td>
                                        <td>
                                            <input type="text" required="" class="form-control input-sm" placeholder="คำนำหน้า" name="prename" style="width: 100px">
                                        </td>
                                        <td>
                                            <input type="text" required="" class="form-control input-sm" placeholder="ชื่อ นามสกุล" name="name" style="width: 200px">
                                        </td>
                                        <td>
                                            <input type="text" required="" class="form-control input-sm" placeholder="อีเมล" name="email" style="width: 150px">
                                        </td>
                                        <td>
                                            <input type="text" required="" class="form-control input-sm" placeholder="ที่อยู่" name="address" style="width: 250px">
                                        </td>
                                        <td>
                                            <input type="text" required="" class="form-control input-sm" placeholder="เบอร์โทรศัพท์มือถือ" maxlength="10" name="mobile" onkeypress="return isNumber(event)" style="width: 100px">
                                        </td>
                                        <td>
                                            <input type="text" required="" class="form-control input-sm" placeholder="เบอร์โทรศัพท์ที่ทำงาน" name="tel" style="width: 100px">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-content">
                                <div id="menu5" class="tab-pane fade in active" style="text-align: center;">
                                    <div class="form-addproduct">
                                            <input type="submit" value="บันทึก" class="bt-submit thsarabunnew" name="btn_submit" />
                                            <!--<input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" /> -->
                                            <input type="reset" value="ย้อนกลับ" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../paper/paper_owner_manage?c_id=<?php echo $paper_detail_id; ?>'" />
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

                    if (data.redirect) {
                        // data.redirect contains the string URL to redirect to
                        window.location.href = data.redirect;
                    }

                    $body.removeClass("loading");
                });

        })

    });
</script>


</body>
</html>