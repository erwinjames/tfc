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
</style>

<body>
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div id="tcf_record" class="modal-content">


            </div>
        </div>
    </div>

    <!-- veriefier end modal -->

    <center><img width="15%" src="<?php echo base_url('assets/images/logo.png'); ?>" alt="" srcset="">
        <h4>Master List of Equipment Calibration Schedule Record</h4>
    </center>
    <br>
    <br>
    <div class="container">
        <div class="tab-pane active" role="tabpanel" id="info">
            <table id="table_record" class="table table table-bordered table-hover dt-responsive">
                <thead>
                    <tr>
                        <th>Record #</th>
                        <th>Date Record</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tcf_list">
                </tbody>
            </table>
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
        tcf_show_list();
        show_list_review();

        function tcf_show_list() {
            var url = '<?php echo base_url(); ?>';
            $.ajax({
                type: 'POST',
                url: url + 'forms/tcf_show_list',
                success: function(response) {
                    $('#tcf_list').html(response);
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
                url: url + 'forms/tcf_show_list_review',
                success: function(response) {
                    $('#tcf_list_review').html(response);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }
        $(document).on('click', '.select-record', function() {
            var url = '<?php echo base_url(); ?>';
            var record_id = $(this).attr('id');
            console.log(record_id);
            $.ajax({
                type: 'POST',
                url: url + 'forms/tcf_show_record_data',
                data: {
                    record_id: record_id
                },
                success: function(response) {
                    console.log(response);
                    $('#tcf_record').html(response);
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
                url: url + 'forms/tcf_pdf',
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
                url: url + 'forms/tcf_pdf',
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