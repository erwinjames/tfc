<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

</head>
<style>
    table td {
        white-space: nowrap;
        border: 1px solid black;
    }

    .signature-pad {
        width: auto;
        box-shadow: 0 0 5px 1px #ddd inset;
        border: dashed 2px #53777A;
        border: dashed 1px #53777A;
        margin: 0;
        text-align: center;
        min-height: 80px;
        min-width: 340px;
        transition: .2s;
    }

    .notification.icon {
        position: absolute;
        text-align: center;
        font-size: 1em;
        color: #FFF;
        padding: 10px;
        color: #333;
        height: 40px;
    }

    .notification.icon .notification-number {
        position: absolute;
        right: -5px;
        top: -15px;
        z-index: 1;
        background: #cc2311;
        border: 3px solid #FFF;
        border-radius: 50%;
        padding-top: 5px;
        height: 25px;
        width: 25px;
        font-family: sans-serif;
        text-align: center;
        font-size: 15px;
        font-weight: 700;
        line-height: 10px;
        color: #FFF;
        -webkit-animation: bounce 1s infinite;
    }

    @-webkit-keyframes bounce {

        0%,
        100%,
        20%,
        53%,
        80% {
            -webkit-transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
            transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
            -webkit-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        40%,
        43% {
            -webkit-transition-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
            transition-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
            -webkit-transform: translate3d(0, -30px, 0);
            -ms-transform: translate3d(0, -30px, 0);
            transform: translate3d(0, -30px, 0);
        }

        70% {
            -webkit-transition-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
            transition-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
            -webkit-transform: translate3d(0, -15px, 0);
            -ms-transform: translate3d(0, -15px, 0);
            transform: translate3d(0, -15px, 0);
        }

        90% {
            -webkit-transform: translate3d(0, -4px, 0);
            -ms-transform: translate3d(0, -4px, 0);
            transform: translate3d(0, -4px, 0);
        }
    }
</style>

<body>
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div id="mlecs_record" class="modal-content">


            </div>
        </div>
    </div>
    <div class="modal fade" id="cartModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div id="mlecs_record_review">
                    </div>
                    <table class="table table-bordered" style=" font-size: 13px!important;">
                        <tr style="background:#E8E8E8">
                            <td class="text-center fw-bold">Reviewed by</td>
                            <td class="text-center fw-bold">Verified by</td>
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
                                                <textarea type="text" class="signature-data-text1 d-none" name="reviewer_sign" value="" readonly></textarea>
                                            </div>
                                        </div><br>
                                        <div id="showU1" class="signature1 d-none">
                                            <input type="file" id="m-actual-image1" name="reviewer_sign_img" onchange="dataURLv(this,1)" style="margin-bottom:7px;" /><br>
                                            <img id="m-actual-image-res1" width="220" height="80" src="#" /><br>
                                            <button class="border-1 mt-1" type="button" id="reset-image-val1">Remove</button>
                                        </div>

                                        <div id="image-sig-r" class="d-none">
                                            <div class="rimg-signature"></div><br>
                                            <button class="border-1 mt-1" type="button" id="rclear-image">Remove</button>
                                        </div><br>

                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control mb-1"  name="reviewer_name" placeholder="Name">
                                        </div>

                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control mb-1"  name="r_position" placeholder="Position">
                                        </div>

                                        <div class="input-group input-group-sm">
                                            <input type="datetime-local" class="form-control"  name="reviewed_date">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="m-3 mb-5" style="display:flex; justify-content:center;">
                                    <div>
                                        <select id="main-sig-selection2" class="mb-1 p-1">
                                            <option value="D2">Select Signature Option</option>
                                            <option value="D2">Draw Signature</option>
                                            <option value="U2">Upload Signature</option>
                                        </select>
                                        <div id="showD2" class="signature2" style="display:flex; justify-content:center">
                                            <div class="signature-pad-container">
                                                <div style="" class="signature-pad" id="signature-pad-2"></div><br>
                                                <button type="button" class="border-1 bg-success text-light asig-submitBtn" id="">Confirm Signature</button>
                                                <button type="button" class="clear-btn2 border-1" id="">Clear</button>
                                                <textarea type="text" class="signature-data-text2 d-none" name="approver_sign" value="" readonly></textarea>
                                            </div>
                                        </div><br>
                                        <div id="showU2" class="signature2 d-none">
                                            <input type="file" id="m-actual-image2" name="approver_sign_img" onchange="dataURLv(this,2)" style="margin-bottom:7px;" /><br>
                                            <img id="m-actual-image-res2" width="220" height="80" src="#" /><br>
                                            <button class="border-1 mt-1" type="button" id="reset-image-val2">Remove</button>
                                        </div>
                                        <div id="image-sig-a" class="d-none">
                                            <div class="aimg-signature"></div><br>
                                            <button class="border-1 mt-1" type="button" id="aclear-image">Remove</button>
                                        </div><br>

                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control mb-1"  name="approver_name" placeholder="Name">
                                        </div>

                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control mb-1"  name="a_position" placeholder="Position">
                                        </div>

                                        <div class="input-group input-group-sm">
                                            <input type="datetime-local" class="form-control" name="approved_date">
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="modal-footer border-top-0 d-flex justify-content-between">
                        <button type="submit" name="update_record" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
            <!-- end of modal content -->
        </div>
    </div>
    <center><img width="10%" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="" srcset="">
        <h5>THERMOMETER CHECK FORM
        </h5>
    </center>
    <br>
    <br>
    <br>
    <div id="exTab2" class="container">

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a href="#info" role="tab" data-toggle="tab" class="nav-link active"> Records </a>
            </li>
            <li class="nav-item">
                <?php
                $this->db->distinct();
                $this->db->select('tcf_record_table_id');
                $this->db->where('review_status', 0);
                $query = $this->db->get('tcf_record');
                $count = $query->num_rows();
                if ($count > 0) { ?>
                    <a href="#ratings" role="tab" data-toggle="tab" class="notification icon  nav-link"> Pending Records
                        <span class="notification-number"><?php echo $count; ?></span>
                    </a>
                <?php } else { ?>
                    <a href="#ratings" role="tab" data-toggle="tab" class="nav-link"> Pending Records
                    </a>
                <?php } ?>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="info">
                <table id="table_record" class="table table table-bordered table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th>Record #</th>
                            <th>Date Record</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="mlecs_list">
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" role="tabpanel" id="ratings">
                <table id="table_record_review" class="table table-bordered table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th>Record #</th>
                            <th>Date Record</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="mlecs_list_review">

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="<?php echo base_url(); ?>jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jSignature/2.1.3/jSignature.min.js"></script>
<script>
    $(document).ready(function() {
        show_list();
        show_list_review();

        function show_list() {
            var url = '<?php echo base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: url + 'forms/mlecs_show_list',
                success: function(response) {
                    $('#mlecs_list').html(response);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }


        function show_list_review() {
            var url = '<?php echo base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: url + 'forms/mlecs_show_list_review',
                success: function(response) {
                    $('#mlecs_list_review').html(response);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }
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
        $(document).on('click', '.select-record', function() {
            var url = '<?php echo base_url(); ?>';
            var record_id = $(this).attr('id');
            console.log(record_id);
            $.ajax({
                type: 'POST',
                url: url + 'forms/mlecs_show_record_data',
                data: {
                    record_id: record_id
                },
                success: function(response) {
                    console.log(response);
                    $('#mlecs_record').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
        $(document).on('click', '.select-record', function() {
            var url = '<?php echo base_url(); ?>';
            var record_id = $(this).attr('id');
            console.log(record_id);
            $.ajax({
                type: 'POST',
                url: url + 'forms/mlecs_show_record_data_review',
                data: {
                    record_id: record_id
                },
                success: function(response) {
                    console.log(response);
                    $('#mlecs_record_review').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });

        $(document).on('click', '.pdfDownload', function(event) {
            event.preventDefault();
            var url = '<?php echo base_url(); ?>';
            var p_id = $(this).attr('id');
            // Make an AJAX request to the PDF generation endpoint
            $.ajax({
                url: url + 'forms/pdf',
                method: 'POST',
                data: {
                    id: p_id
                },
                xhrFields: {
                    responseType: 'blob' // Set the response type to blob
                },
                success: function(response) {
                    // Create a new blob object
                    var blob = new Blob([response], {
                        type: 'application/pdf'
                    });

                    // Create a URL for the blob object
                    var url = URL.createObjectURL(blob);

                    // Use the URL to download the file
                    var a = document.createElement('a');
                    a.href = url;
                    a.download = 'example.pdf';
                    document.body.appendChild(a);
                    a.click();
                },
                error: function(error) {
                    console.log(JSON.stringify(error));
                }
            });
        });
        $(document).on('click', '.pdfPrint', function(event) {
            event.preventDefault();
            var url = '<?php echo base_url(); ?>';
            var p_id = $(this).attr('id');

            // Make an AJAX request to the PDF generation endpoint
            $.ajax({
                url: url + 'forms/pdf',
                method: 'POST',
                data: {
                    id: p_id
                },
                xhrFields: {
                    responseType: 'blob' // Set the response type to blob
                },
                success: function(response) {
                    console.log(response);
                    // Create a new blob object
                    var blob = new Blob([response], {
                        type: 'application/pdf'
                    });

                    // Create a URL for the blob object
                    var url = URL.createObjectURL(blob);

                    // Open the PDF in a new window
                    var newWindow = window.open(url, '_blank');

                    // Wait for the PDF to load and trigger the print dialog
                    newWindow.addEventListener('load', function() {
                        newWindow.print();
                    });
                },
                error: function(error) {
                    console.log(JSON.stringify(error));
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        var $modal = $('#myModal');
        $modal.find('.modal-content')
            .css({
                width: 625,
                height: 175,
            })
            .resizable({
                minWidth: 625,
                minHeight: 175,
                handles: 'n, e, s, w, ne, sw, se, nw',
            })
            .draggable({
                handle: '.modal-header'
            });

        var launch = function() {
            $modal.modal();
        }
    });
</script>
<script>
    $(document).ready(function() {
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

        $('#signature-pad-1').jSignature({
            'width': 300,
            'height': 100
        });
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
        $('#signature-pad-2').jSignature({
            'width': 300,
            'height': 100
        });
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

</html>