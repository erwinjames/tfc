<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RCF</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/popper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

    <style>
        .signature-pad {
            border-radius: 2px;
            border: 1px dashed #ccc;
            cursor: crosshair;
            width: 300px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog modal-m">
                <div class="modal-content">
                    <form id="mlecs_add_list_form">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Add List</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tcf_date">DATE</label>
                                <input type="date" class="form-control" id="tcf_date" required>
                            </div>
                            <div class="form-group">
                                <label for="tcf_time">TIME (AM/PM):</label>
                                <input type="time" class="form-control" id="tcf_time" required>
                            </div>
                            <div class="form-group">
                                <label for="tcf_ci">CHECKER INITIALS:</label>
                                <input type="text" class="form-control" id="tcf_ci" required>
                            </div>
                            <div class="form-group">
                                <label for="tcf_ti">THERMOMETER ID:</label>
                                <input class="form-control" id="tcf_ti" required>
                            </div>
                            <div class="form-group">
                                <label for="tcf_ther">NIST/MERCURY THERMOMETER:</label>
                                <input type="text" class="form-control" id="tcf_ther" required>
                            </div>
                            <div class="form-group">
                                <label for="tcf_tar">THERMOMETER ACTUAL READING:</label>
                                <input type="text" class="form-control" id="tcf_tar" required>
                            </div>
                            <div class="form-group">
                                <label for="tcf_dr">DIFFERENCE (RESULTS):</label>
                                <input type="text" class="form-control" id="tcf_dr" required>
                            </div>
                            <div class="form-group">
                                <label for="tcf_cn">COMMENTS /NOTES:</label>
                                <textarea type="text" class="form-control" id="tcf_cn" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save List</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="card shadow" style="padding:40px;">
                <center><img width="15%" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="" srcset=""></center>
                <br>
                <center>
                    <h5>THERMOMETER CHECK FORM</h5>
                </center>
                <br>
                <div class="row" style="padding:30px 30px 0px 30px">
                    <div class="col-md-2">

                    </div>
                </div>
                <br>
                <table class="table table-bordered table-hover">
                    <thead class="bg-gray-200" style="font-size:14px;text-align:center;background-color:#cccccc4f">
                        <tr>
                            <th>DATE</th>
                            <th>TIME (AM/PM)</th>
                            <th>CHECKER INITIALS</th>
                            <th>THERMOMETER ID</th>
                            <th>NIST/MERCURY THERMOMETER</th>
                            <th>THERMOMETER ACTUAL READING</th>
                            <th>DIFFERENCE (RESULTS)</th>
                            <th>COMMENTS /NOTES:</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th colspan="8" width="100%" style="text-align:center;background-color:#cccccc4f">
                                <a width="100%" class="btn btn-success" data-toggle="modal" style="font-size:12px;text-align:center;" data-target="#largeModal">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="mlecs_form_data_list" style="font-size:12px;">

                    </tbody>
                </table>
                <table class="table table-bordered" style=" font-size: 13px!important;">
                    <tr>
                        <td class="text-center fw-bold">Performer:</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <div class="m-3 mb-5" style="display:flex; justify-content:center;">
                                <div>
                                    <select id="main-sig-selection1" class="mb-1 p-1">
                                        <option value="D1">Select Signature Option</option>
                                        <option value="D1">Draw Signature</option>
                                        <option value="U1">Upload Signature</option>
                                    </select>
                                    <div id="showD1" class="signature1" style="display:flex; justify-content:center">
                                        <div class="signature-pad-container">
                                            <div style="" class="signature-pad" id="signature-pad-1"></div><br>
                                            <button type="button" class="border-1 bg-success text-light rsig-submitBtn" id="">Confirm Signature</button>
                                            <button type="button" class="clear-btn1 border-1" id="">Clear</button>
                                            <textarea type="text" class="signature-data-text1 d-none" name="performer_sign" value="" readonly></textarea>
                                        </div>
                                    </div><br>
                                    <div id="showU1" class="signature1 d-none">
                                        <input type="file" id="m-actual-image1" name="performer_sign_img" onchange="dataURLv(this,1)" style="margin-bottom:7px;" /><br>
                                        <img id="m-actual-image-res1" width="220" height="80" src="#" /><br>
                                        <button class="border-1 mt-1" type="button" id="reset-image-val1">Remove</button>
                                    </div>

                                    <div id="image-sig-r" class="d-none">
                                        <div class="rimg-signature"></div><br>
                                        <button class="border-1 mt-1" type="button" id="rclear-image">Remove</button>
                                    </div><br>

                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control mb-1" required name="performer_name" placeholder="Name">
                                    </div>

                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control mb-1" required name="performer_position" placeholder="Position">
                                    </div>

                                    <div class="input-group input-group-sm">
                                        <input type="datetime-local" class="form-control" required name="perform_date">
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                </table>
                <hr>
                <br>
                <input type="submit" name="save_record" style="padding:5px;width:100px;" class="btn btn-success" value="Save">
                <br>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.4/js/dataTables.responsive.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jSignature/2.1.3/jSignature.min.js"></script>
    <script>
        $(document).ready(function() {
            var url = '<?php echo base_url(); ?>';
            mlecs_table();

            function mlecs_table() {
                var url = '<?php echo base_url(); ?>';
                $.ajax({
                    type: 'POST',
                    url: url + 'forms/mlecs_show',
                    success: function(response) {
                        $('#mlecs_form_data_list').html(response);
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log(xhr.responseText);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                });
            }
            $(document).on('click', '.delete_list', function() {
                var list_id = $(this).attr('id');
                Swal.fire({
                    title: 'Are you sure you want to delete this record?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post(url + 'forms/delete_list', {
                            list_id: list_id
                        }, function(response) {
                            if (response == 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Updated',
                                    text: 'List Deleted Successfully!',
                                    padding: '4em',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                mlecs_table();
                            } else {
                                alert('An error occurred while deleting the record.');
                            }
                        });
                    }
                })
            });

            $(document).on('blur', '.editingtd', function() {
                var field = $(this).data('field');
                var id = $(this).data('id');
                var value = $(this).text();
                $.ajax({
                    url: url + 'forms/edit_td',
                    method: 'POST',
                    data: {
                        field: field,
                        id: id,
                        value: value
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, textStatus, errorThrown) {}
                });
            });

            $("#mlecs_add_list_form").submit(function(event) {
                event.preventDefault(); // prevent form submission
                var tcf_date = $("#tcf_date").val();
                var tcf_time = $("#tcf_time").val();
                var tcf_ci = $("#tcf_ci").val();
                var tcf_ti = $("#tcf_ti").val();
                var tcf_ther = $("#tcf_ther").val();
                var tcf_tar = $("#tcf_tar").val();
                var tcf_dr = $("#tcf_dr").val();
                var tcf_cn = $("#tcf_cn").val();

                $.ajax({
                    url: url + 'forms/mlecs_insert_form',
                    type: "POST",
                    data: {
                        tcf_date: tcf_date,
                        tcf_time: tcf_time,
                        tcf_ci: tcf_ci,
                        tcf_ti: tcf_ti,
                        tcf_ther: tcf_ther,
                        tcf_tar: tcf_tar,
                        tcf_dr: tcf_dr,
                        tcf_cn: tcf_cn
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            title: 'Updated',
                            text: 'Record Updated Successfully!',
                            padding: '4em',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        $("#mlecs_add_list_form")[0].reset(); //reset the form
                        $("#largeModal").modal("hide"); //hide the modal
                        location.reload();
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log(xhr.responseText);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                });
            });

            for (let id = 0; id < 4; id++) {
                $('#main-sig-selection' + id).on('change', function() {
                    var demovalue = $(this).val();
                    $('div.signature' + id).addClass('d-none');
                    $('#show' + demovalue).removeClass('d-none');
                    $('#sign_type' + id).val(demovalue);
                });

                $('#reset-image-val' + id).on('click', function() {
                    $('#m-actual-image' + id).val('');
                    $('#m-actual-image-res' + id).removeAttr('src');
                    $('#main-sig-selection' + id).attr('disabled', false)
                });
            }

            $('#signature-pad-1').jSignature();
            $('.clear-btn1').click(function() {
                $(this).siblings('#signature-pad-1').jSignature('clear');
                $(this).siblings('.signature-data-text1').val('');
                $('#main-sig-selection1').attr('disabled', false)
            });
            $('#signature-pad-1').on('change', function() {
                var signatureData = $(this).jSignature('getData', 'default');
                $(this).siblings('.signature-data-text1').val(signatureData);
                $('#main-sig-selection1').attr('disabled', true)
            });

            $('.rsig-submitBtn').on('click', function() {
                $('#image-sig-r').toggleClass('d-none')
                $('#showD1').toggleClass('d-none')
                var data = $('#signature-pad-1').jSignature('getData', 'default');
                var image = new Image();
                image.src = data;
                $('.rimg-signature').append(image);
            })

            $('#rclear-image').on('click', function() {
                $('#showD1').toggleClass('d-none')
                $('#image-sig-r').toggleClass('d-none')
                $('#signature-pad-1').jSignature('clear');
                $('.signature-data-text1').val('');
                $('.rimg-signature').empty();
            })


            // Approver
            $('#signature-pad-2').jSignature();
            $('.clear-btn2').click(function() {
                $(this).siblings('#signature-pad-2').jSignature('clear');
                $(this).siblings('.signature-data-text2').val('');
                $('#main-sig-selection2').attr('disabled', false)
            });
            $('#signature-pad-2').on('change', function() {
                var signatureData = $(this).jSignature('getData', 'default');
                $(this).siblings('.signature-data-text2').val(signatureData);
                $('#main-sig-selection2').attr('disabled', true)
            });

            $('.asig-submitBtn').on('click', function() {
                $('#image-sig-a').toggleClass('d-none')
                $('#showD2').toggleClass('d-none')
                var data = $('#signature-pad-2').jSignature('getData', 'default');
                var image = new Image();
                image.src = data;
                $('.aimg-signature').append(image);
            })

            $('#aclear-image').on('click', function() {
                $('#showD2').toggleClass('d-none')
                $('#image-sig-a').toggleClass('d-none')
                $('#signature-pad-2').jSignature('clear');
                $('.signature-data-text2').val('');
                $('.aimg-signature').empty();
            })

            function dataURLv(input, id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#m-actual-image-res" + id).attr('src', e.target.result);
                        $('#main-sig-selection' + id).attr('disabled', true)
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        });
    </script>
</body>

</html>