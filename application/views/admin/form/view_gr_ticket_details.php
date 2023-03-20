<?php $this->load->view('admin/link');

$model_short_name = $this->uri->segment(2);
$ticket_id = $this->uri->segment(2);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php
    $this->load->view('admin/topar');
    $this->load->view('admin/imgheader');

    $this->load->view('admin/sidebar');
    ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#Datatable1').DataTable();
    });
</script>
<style>
    .setpara {
        font-size: 9px;
    }

    .seth5 {
        font-size: 12px;
    }

    .nav-tabs-custom .nav-item .nav-link {
        color: white;
    }

    .nav-tabs-custom .nav-item .nav-link.active {
        color: white;
    }

    .nav-tabs-custom .navitem1 {
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }

    .nav-tabs-custom .navitem2 .nav-link {
        background: #ffbc00;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }

    .nav-tabs-custom .navitem3 .nav-link {
        background: #71d7df;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }

    .nav-tabs-custom .nav-item .nav-link::after {
        background: none !important;
    }

    .card-body .nav-link {
        padding: 0.2rem 1rem;
        font-size: 11px;
    }

    .setsmallbtnsize {
        font-size: 8px;
        margin-top: 0px;
        border-radius: 5px;
        background-color: rgb(207 235 228);
        border-color: rgb(207 235 228);
        color: rgb(67 171 143);
    }

    .setsmallbtnsize2 {
        font-size: 8px;
        margin-top: 0px;
        border-radius: 5px;
        background-color: rgb(244 230 230);
        border-color: rgb(244 230 230);
        color: rgb(229 88 88);
    }

    .setsmallbtnsize3 {
        font-size: 8px;
        margin-top: 0px;
        padding: 1px 15px;
        border-radius: 5px;
        background-color: rgb(235 230 244);
        border-color: rgb(235 230 244);
        color: rgb(158 130 204);
    }

    .setmodulwid {
        width: 11.11% !important;
    }

    .setsmallbtnsize41 {
        font-size: 10px;

        height: 40%;
        padding: 4px;
    }

    #com_name {
        display: none;
    }

    /* .user-chat-topbar{
        background-color: #1423751f!important;
    } */
    div#accordionWithicon {
        background: #f3f3f9;
        padding: 12px;
    }

    .p-3.user-chat-topbar {
        max-height: 580px;
        overflow: auto;
        padding: 1rem;
        background: white;
        direction: ltr;
    }

    .user {
        display: none;
    }

    .staff {
        display: none;
    }

    .setredcolor {
        color: red;
    }

    .setredcolor1 {
        color: red;
    }

    .setredcolor2 {
        color: red;
    }

    .setredcolor3 {
        color: red;
    }

    .setredcolor4 {
        color: red;
    }
</style>
<div class="vertical-overlay"></div>

<div class="vertical-overlay"></div>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
                <div class="chat-leftsidebar">
                    <div class="px-4 pt-4 mb-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-grow-1">
                                <h5 class=""><u>Ticket</u> &nbsp; #<?php echo base64_decode($ticket_id); ?></h5>

                                <h6 class=""><u>Policy No.</u> &nbsp; <?= $token_details[0]['policy_no']; ?></h6>
                            </div>
                            <div class="flex-shrink-0">

                            </div>
                        </div>


                    </div> <!-- .p-4 -->
                    <hr>
                    <div class="chat-room-list" data-simplebar>



                        <div class="chat-message-list">

                            <ul class="list-unstyled chat-list chat-user-list" id="userList">
                                <li>
                                    <div class="row">
                                        <div class="px-4 mb-4">
                                            <label for="exampleInputno" class="form-label">Priority</label>
                                            <input type="text" class="form-control" name="token_priority" id="token_priority" value="<?= $token_details[0]['priority']; ?>" <?php if ($token_details[0]['priority'] == 'High') {
                                                                                                                                                                                echo "style='border:1px solid #ff0000; color:#ff0000;'";
                                                                                                                                                                            } elseif ($token_details[0]['priority'] == 'Medium') {
                                                                                                                                                                                echo "style='border:1px solid #ffbc00; color:#ffbc00;'";
                                                                                                                                                                            } elseif ($token_details[0]['priority'] == 'Low') {
                                                                                                                                                                                echo "style='border:1px solid green; color:green;'";
                                                                                                                                                                            } ?> readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="px-4 mb-4">
                                            <label for="exampleInputno" class="form-label" style="color:red;">Select anyone for change status.</label>
                                            <select class="form-control form-select" onchange="changestatus(this.value);" <?php if ($token_details[0]['status'] == 'Resolved') {
                                                                                                                                echo "disabled";
                                                                                                                            } ?>>
                                                <option value="Resolved" <?php if (!empty($token_details[0]['status'])) {
                                                                                if ($token_details[0]['status'] == 'Resolved') {
                                                                                    echo 'selected';
                                                                                }
                                                                            } ?>>Resolved</option>
                                                <option value="Cancelled" <?php if (!empty($token_details[0]['status'])) {
                                                                                if ($token_details[0]['status'] == 'Cancelled') {
                                                                                    echo 'selected';
                                                                                }
                                                                            } ?>>Cancelled</option>
                                                <option value="Pending" <?php if (!empty($token_details[0]['status'])) {
                                                                            if ($token_details[0]['status'] == 'Pending') {
                                                                                echo 'selected';
                                                                            }
                                                                        } ?>>Pending</option>
                                            </select>
                                            <div class="error" id="status_msg"></div>

                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="px-4 mb-4">
                                            <label for="exampleInputno" class="form-label">Customer ID</label>
                                            <input type="text" class="form-control" name="cus_id" id="cus_id" value="<?= $token_details[0]['cus_id']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="px-4 mb-4">
                                            <label for="exampleInputno" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" name="company_name" id="company_name" value="<?= $token_details[0]['company_name']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="px-4 mb-4">
                                            <label for="exampleInputno" class="form-label">Grievance Type</label>
                                            <input type="text" class="form-control" name="gr_type" id="gr_type" value="<?= $token_details[0]['gr_type']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="px-4 mb-4">
                                            <label for="exampleInputno" class="form-label">Complaint Received By</label>
                                            <input type="text" class="form-control" name="complaint_recv_by" id="complaint_recv_by" value="<?= $token_details[0]['complaint_recv_by']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="px-4 mb-4">
                                            <label for="exampleInputno" class="form-label">Date of Complaint</label>
                                            <input type="text" class="form-control" name="rise_date_time" id="rise_date_time" value="<?= $token_details[0]['rise_date_time']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="px-4 mb-4">
                                            <label for="exampleInputno" class="form-label">Agent Name</label>
                                            <input type="text" class="form-control" name="agent_name" id="agent_name" value="<?= $token_details[0]['agent_name']; ?>" readonly>
                                        </div>
                                    </div>


                                </li>


                            </ul>
                        </div>

                    </div>


                </div>




                <!-- end chat leftsidebar -->
                <!-- Start User chat -->
                <div class="user-chat w-100 overflow-hidden">

                    <div class="chat-content d-lg-flex">
                        <!-- start chat conversation section -->
                        <div class="w-100 overflow-hidden position-relative">
                            <!-- conversation user -->
                            <div class="position-relative">
                                <div class="p-3 user-chat-topbar">
                                    <div class="row align-items-center">
                                        <!-- Accordions with Icons -->
                                        <div class="accordion custom-accordionwithicon" id="accordionWithicon">

                                            <div class="accordion-item">
                                            <?php if ($token_details[0]['status'] != 'Resolved') { ?>
                                                <h2 class="accordion-header" id="accordionwithiconExample2">
                                                    
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_iconExamplecollapse2" aria-expanded="false" aria-controls="accor_iconExamplecollapse2">
                                                            <i class="ri-pen-nib-line" style="color:blue;"></i> &nbsp; <span style="color:blue;">Reply</span>
                                                        </button>
                                                    
                                                </h2>
                                                <?php } ?>
                                                <div id="accor_iconExamplecollapse2" class="accordion-collapse collapse" aria-labelledby="accordionwithiconExample2" data-bs-parent="#accordionWithicon">
                                                    <div class="accordion-body">
                                                        <form id="add_response" method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-md-4 setcalc">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Reply From<span class="setredcolor">*</span></label>
                                                                        <select class="form-control form-select" id="reply_from" name="reply_from" onchange="user_staff(this.value);">
                                                                            <option value="" selected>Select</option>
                                                                            <option value="Staff">JSPS</option>
                                                                            <option value="User">Customer</option>

                                                                        </select>

                                                                    </div>
                                                                    <div class="error" id="rep_from_error"></div>
                                                                </div>
                                                                <div class="col-md-4 setcalc staff">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Department<span class="setredcolor1">*</span></label>
                                                                        <input type="text" class="form-control" name="department_name" id="department_name" aria-describedby="emailHelp">
                                                                    </div>
                                                                    <div class="error" id="dep_name_error"></div>
                                                                </div>
                                                                <div class="col-md-4 setcalc staff">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Emp Name<span class="setredcolor2">*</span></label>
                                                                        <input type="text" class="form-control" name="emp_name" id="emp_name" aria-describedby="emailHelp">
                                                                    </div>
                                                                    <div class="error" id="emp_name_error"></div>

                                                                </div>
                                                                <div class="col-md-4 setcalc user">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">User Name<span class="setredcolor3">*</span></label>
                                                                        <input type="text" class="form-control" name="user_name" id="user_name" aria-describedby="emailHelp">
                                                                    </div>
                                                                    <div class="error" id="user_name_error"></div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Message<span class="setredcolor4">*</span></label>
                                                                        <textarea class="form-control" id="editor1" name="msg" rows="4" cols="50" placeholder="Describe Message / Response"></textarea>
                                                                    </div>
                                                                    <div class="error" id="msg_error"></div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Upload Docs if required</label>
                                                                        <input type="file" id="gr_docs" name="gr_docs" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="policy_no" name="policy_no" value="<?= $token_details[0]['policy_no']; ?>">
                                                                <input type="hidden" name="cus_id" name="cus_id" value="<?= $token_details[0]['cus_id']; ?>">
                                                                <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo base64_decode($ticket_id); ?>">
                                                                <div class="error" id="msg_success"></div>
                                                                <div class="col-lg-12">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                        <div id="resp_data">

                                        </div>
                                        <script>
                                            resp_msg_data();

                                            function resp_msg_data() {
                                                var ticket_id = $('#ticket_id').val();
                                                $.ajax({
                                                    method: 'post',
                                                    url: "<?= base_url('grievance/fetch_resp_msg_data'); ?>",
                                                    data: {
                                                        ticket_id: ticket_id,

                                                    },
                                                    success: function(response) {
                                                        $('#resp_data').html(response);

                                                    }
                                                })
                                            }
                                        </script>

                                    </div>




                                </div>

                            </div>


                        </div>


                    </div>


                </div>

            </div>
            <!-- container-fluid -->
        </div>

    </div>

    <?php $this->load->view('admin/footer'); ?>
</div>


<!-- JAVASCRIPT -->
<script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= base_url() ?>assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- apexcharts -->
<script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="<?= base_url() ?>assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<!--Swiper slider js-->
<script src="<?= base_url() ?>assets/libs/swiper/swiper-bundle.min.js"></script>

<script src="<?= base_url() ?>assets/js/app.js"></script>


<script>
    function datefilter() {
        var startdate = $('#start_date').val();
        var enddate = $('#end_date').val();
        var sel_disposition = $('#search_by_disp').val();
        var module_short_name = $('#module_short_name').val();
        var select_attribute = $('#select_attribute').val();
        var content = $('#search').val();
        if ($('#current_date').is(':checked')) {
            var current_date = $('#current_date').val();
        }

        if ($('#current_month').is(':checked')) {
            var current_month = $('#current_month').val();
        }

        $.ajax({
            url: "<?= base_url(); ?>filter/datefilter",
            type: "post",
            data: {
                startdate: startdate,
                enddate: enddate,
                sel_disposition: sel_disposition,
                module_short_name: module_short_name,
                current_date: current_date,
                current_month: current_month,
                select_attribute: select_attribute,
                content: content

            },
            success: function(response) {
                $('.filterdata').html(response);
            }
        })
    }

    function searchdata() {
        var select_attribute = $('#select_attribute').val();
        var content = $('#search').val();
        var company_name = $('#company_name').val();
        var search_by_disp = $('#search_by_disp').val();
        var startdate = $('#start_date').val();
        var enddate = $('#end_date').val();
        var module_short_name = $('#module_short_name').val();
        var date_or_month = '';

        if ($("#current_date").is(':checked')) {
            var current_date = $('#current_date').val();
        } else if ($("#current_month").is(':checked')) {
            var current_month = $('#current_month').val();
        }
        $.ajax({
            url: "<?= base_url('filter/searchdata_renewal_page'); ?>",
            type: "post",
            data: {
                content: content,
                select_attribute: select_attribute,
                company_name: company_name,
                startdate: startdate,
                enddate: enddate,
                search_by_disp: search_by_disp,
                module_short_name: module_short_name,
                current_date: current_date,
                current_month: current_month

            },
            success: function(response) {

                $('.filterdata').html(response);
            }
        })
    }

    function show_input(val) {
        if (val == 'by_company') {
            $("#com_name").css("display", 'block');
            $("#search").css("display", 'none');
        } else {
            $("#com_name").css("display", 'none');
            $("#search").css("display", 'block');
        }
        if ($("select[name='select_attribute']").selectedIndex == 0 || val == '') {
            $("#search").prop("readonly", true);
        } else {
            $("#search").prop("readonly", false);
        }


    }

    function filetr_wise_all() {



        var module_short_name = $('#module_short_name').val();
        var sel_disp = $('#search_by_disp').val();
        if ($('#current_date').is(':checked')) {

            var current_date = $('#current_date').val();

            $.ajax({
                method: 'post',
                url: "<?= base_url('filter/current_date_filter_list_page'); ?>",
                data: {
                    sel_disp: sel_disp,
                    module_short_name: module_short_name,
                    current_date: current_date
                },
                success: function(response) {
                    $('.filterdata').html(response);
                    $('#current_date').attr('checked', true);



                }
            })
        } else {

            var current_month = $('#current_month').val();
            $.ajax({
                method: 'post',
                url: "<?= base_url('filter/current_date_filter_list_page'); ?>",
                data: {
                    sel_disp: sel_disp,
                    module_short_name: module_short_name,
                    current_month: current_month
                },
                success: function(response) {
                    $('.filterdata').html(response);
                    $('#current_month').attr('checked', true);


                }
            })

        }



    }

    function filetr_wise_all_month() {

        var module_short_name = $('#module_short_name').val();
        var sel_disp = $('#search_by_disp').val();
        if ($('#current_month').is(':checked')) {
            var current_month = $('#current_month').val();
            $.ajax({
                method: 'post',
                url: "<?= base_url('filter/current_date_filter_list_page'); ?>",
                data: {
                    sel_disp: sel_disp,
                    module_short_name: module_short_name,
                    current_month: current_month
                },
                success: function(response) {
                    $('.filterdata').html(response);
                    $('#current_month').attr('checked', true);


                }
            })
        } else {
            var current_date = $('#current_date').val();
            $.ajax({
                method: 'post',
                url: "<?= base_url('filter/current_date_filter_list_page'); ?>",
                data: {
                    sel_disp: sel_disp,
                    module_short_name: module_short_name,
                    current_date: current_date
                },
                success: function(response) {
                    $('.filterdata').html(response);
                    $('#current_date').attr('checked', true);


                }
            })
        }

    }

    function user_staff(val) {
        $('.user').css('display', 'none');
        $('.staff').css('display', 'none');
        if (val == 'User') {
            $('.user').css('display', 'block');
            $('.setredcolor').css('color', 'white');
            $('#rep_from_error').html('');

        } else {
            $('.staff').css('display', 'block');
            $('.setredcolor').css('color', 'white');
            $('#rep_from_error').html('');
        }
    }


    $(document).on('submit', '#add_response', function(ev) {
        $('.error').html('');
        ev.preventDefault();
        var formData = new FormData(this);
        var error = false;
        var reply_from = $('#reply_from').val();
        var department_name = $('#department_name').val();
        var emp_name = $('#emp_name').val();
        var user_name = $('#user_name').val();
        var msg = $('#msg').val();


        if (reply_from == '') {
            $('#rep_from_error').html('Select Anyone');
            $('.error').css('color', 'red');
            error = true;
        } else {
            $('.setredcolor').css('color', 'white');
        }

        if (user_name == '') {
            $('#user_name_error').html('Enter User Name');
            $('.error').css('color', 'red');
            error = true;

            if (department_name == '') {
                $('#dep_name_error').html('Enter Department Name');
                $('.error').css('color', 'red');
                error = true;
            } else {
                $('.setredcolor1').css('color', 'white');
                error = false;
            }

            if (emp_name == '') {
                $('#emp_name_error').html('Enter Employee Name');
                $('.error').css('color', 'red');
                error = true;
            } else {
                $('.setredcolor2').css('color', 'white');
                error = false;
            }

        } else {
            $('.setredcolor3').css('color', 'white');
        }

        if (msg == '') {
            $('#msg_error').html('Enter Message / Response');
            $('.error').css('color', 'red');
            error = true;
        } else {
            $('.setredcolor4').css('color', 'white');
        }

        if (error == false) {
            $.ajax({
                url: "<?= base_url('grievance/add_ticket_resp'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    var dataResult = JSON.parse(result);
                    if (dataResult.status == true) {
                        $('#msg_success').html('Your Response has successfully added....');
                        $('.error').css('color', 'green');
                        $("#add_response")[0].reset();
                        resp_msg_data();
                    } else {

                        $('#msg_success').html('Something Went Wrong !!!....');
                        $('.error').css('color', 'red');
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
            })

        }

    })

    function changestatus(val) {
        var ticket_id = $('#ticket_id').val();
        $.ajax({
            method: 'post',
            url: "<?= base_url('grievance/update_status'); ?>",
            data: {
                val: val,
                ticket_id: ticket_id
            },
            success: function(response) {
                var dataResult = JSON.parse(response);
               
                if (dataResult.status == true) {
                    $('#status_msg').html('Status is Updated as ' + val);
                    $('.error').css('color', 'green');
                    setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                } else {

                    $('#status_msg').html('Something Went Wrong !!!....');
                    $('.error').css('color', 'red');
                }
            }
        })
    }
</script>
</body>

</html>