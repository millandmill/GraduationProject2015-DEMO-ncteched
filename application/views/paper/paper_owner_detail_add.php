<div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
    <div class="content">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="pull-left">
                    <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                        <i class="fa fa-cubes glyphicon glyphicon-file"></i>&nbsp;เพิ่มผู้วิจัย : <?php if(isset($paper_detail_name_th)){ echo $paper_detail_name_th; } ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" name="form_authen" id="frm_submit" action="add_batch" enctype="multipart/form-data">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#menu1"><h6>ผู้วิจัย</h6></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                            <!-- Text input-->
                            <table style="width: 100%" class="table">
                                <thead>
                                    <tr>
                                        <th>ลำดับที่</th>
                                        <th>ชื่อ</th>
                                        <th>อีเมล</th>
                                        <th>ที่อยู่</th>
                                        <th>เบอร์โทรศัพท์</th>
                                    </tr>
                                </thead>
                                <tbody id="table-details"><tr id="row1" class="jdr1">
                                        <td>
                                            <span class="btn btn-sm btn-default">1</span>
                                            <input type="hidden" value="6437" name="count[]">
                                            <input type="hidden" value="<?php if(isset($paper_detail_id)){ echo $paper_detail_id; } ?>" name="jpaper_id[]">
                                            <input type="hidden" value="1" name="status[]">
                                        </td>
                                        <td>
                                            <input type="text" required="" class="form-control input-sm" placeholder="ชื่อ" name="jname[]">
                                        </td>
                                        <td>
                                            <input type="text" required="" class="form-control input-sm" placeholder="อีเมล" name="jemail[]">
                                        </td>
                                        <td>
                                            <input type="text" required="" class="form-control input-sm" placeholder="ที่อยู่" name="jaddress[]">
                                        </td>
                                        <td>
                                            <input type="text" required="" class="form-control input-sm" placeholder="เบอร์โทรศัพท์" name="jtel[]">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                <div><p>*ลำดับที่ 1 จะเป็นผู้ติดต่อประสานงานหรือผู้วิจัยหลัก</p></div>
                                <div><p>**ลำดับต่อมา เป็นช่องผู้ร่วมวิจัย</p></div>
                            <button class="btn btn-primary btn-sm btn-add-more"><i class="glyphicon glyphicon-plus">เพิ่มช่องผู้วิจัย</i></button>
                            <button class="btn btn-sm btn-warning btn-remove-detail-row"><i class="glyphicon glyphicon-remove">ลบช่องผู้วิจัย</i></button>
                            </div>

                            <div class="tab-content">
                                <div id="menu5" class="tab-pane fade in active">
                                    <div class="form-addproduct">

                                        <center>
                                            <input class="btn btn-success pull-right" type="submit" value="submit" name="submit">
                                            <input type="submit" value="บันทึก" class="bt-submit thsarabunnew" name="btn_submit" />
                                            <!--<input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" /> -->
                                            <input type="reset" value="ย้อนกลับ" class="bt-reset thsarabunnew" name="btn_back" onclick="window.location.href='../users/users_detail'" />
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </form>
                            <div class="row">
                                <div class="alert alert-dismissable alert-success" style="display: none">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Data inserted successfully</strong>.
                                </div>

                                <div class="alert alert-dismissable alert-danger"  style="display: none">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Sorry something went wrong</strong>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
            $(document).ready(function (){
                $("body").on('click', '.btn-add-more', function (e) {
            e.preventDefault();
            var $sr = ($(".jdr1").length + 1);
            var rowid = Math.random();
            var $html = '<tr class="jdr1" id="' + rowid + '">' +
                    '<td><span class="btn btn-sm btn-default">' + $sr + '</span><input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'">' +
                    '<input type="hidden" value="<?php if(isset($paper_detail_id)){ echo $paper_detail_id; } ?>" name="jpaper_id[]">'+
                    '<input type="hidden" value="0" name="status[]"></td>' +
                    '<td><input type="text" name="jname[]" placeholder="ชื่อ" class="form-control input-sm"></td>' +
                    '<td><input type="text" name="jemail[]" placeholder="อีเมล" class="form-control input-sm"></td>' +
                    '<td><input type="text" name="jaddress[]" placeholder="ที่อยู่" class="form-control input-sm"></td>' +
                    '<td><input type="text" name="jtel[]" placeholder="เบอร์โทรศัพท์" class="form-control input-sm"></td>' +
                    '</tr>';
            $("#table-details").append($html);

        });
        $("body").on('click', '.btn-remove-detail-row', function (e) {
            e.preventDefault();
            if($("#table-details tr:last-child").attr('id') != 'row1'){
                $("#table-details tr:last-child").remove();
            }
            
        });
        $("body").on('focus', ' .datepicker', function () {
            $(this).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
        
//        $("#frm_submit").on('submit', function (e) {
//            e.preventDefault();
//            $.ajax({
//                url: '<?php echo base_url() ?>paper/add_batch',
//                type: 'POST',
//                data: $("#frm_submit").serialize()
//            }).always(function (response){
//                var r = (response.trim());
//                if(r == 1){
//                    $(".alert-success").show();
//                }
//                else{
//                    $(".alert-danger").show();
//                }
//            });
//        });
            });
</script>


    </body>
</html>