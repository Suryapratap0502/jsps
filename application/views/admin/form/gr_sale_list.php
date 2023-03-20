<?php $this->load->view('admin/link');

$model_short_name = $this->uri->segment(2);
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
        padding: 1px 14px;
        border-radius: 5px;
        background-color: rgb(235 230 244);
        border-color: rgb(235 230 244);
        color: rgb(158 130 204);
    }

    .setmodulwid {
        width: 11.11% !important;
    }
</style>
<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Grievance Listing</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Grievance Listing</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Grievance Listing</h4>

                            <div class="flex-shrink-0">

                                <a href="<?= base_url(); ?>grievance/add" type="button" title="Generate New Ticket" class="btn btn-primary waves-effect waves-light">Generate New Token</a>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body" style="background: #c9ccd029;">
                                    <div id="fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">

                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="">

                                            <?php
                                            $i = 1;
                                            if (!empty($gr_list)) {
                                                foreach ($gr_list as $row) {
                                                  $enocde_ticket = base64_encode($row['ticket_id']);
												  $ticket_id = rtrim($enocde_ticket, '=');
                                                  
                                                  date_default_timezone_set('Asia/Kolkata');
                                                    $date2 = date('d-m-Y');
                                                    $date1 = $row['rise_date_time'];

                                                    $diff = abs(strtotime($date2) - strtotime($date1));
                                                    $years = floor($diff / (365 * 60 * 60 * 24));
                                                    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                                                    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                                            ?>
                                                    <ul class="nav nav-tabs-custom border-bottom-0 ms-4">

                                                        
                                                            <li class="nav-item navitem1" style="background: <?php if ($row['priority'] == 'High') {
                                                                                                                    echo "red";
                                                                                                                } else if ($row['priority'] == 'Medium') {
                                                                                                                    echo "#ffbc00";
                                                                                                                } else if ($row['priority'] == 'Low') {
                                                                                                                    echo "#ff8100";
                                                                                                                } ?>">
                                                                <a class="nav-link active">
                                                                    <?= $row['priority']; ?>
                                                                </a>
                                                            </li>&nbsp;&nbsp;
                                                       
                                                    </ul>
                                                    <div class="card border ribbon-box shadow-none" style="border-color: #21252973!important;">
                                                        <div class="card-body">
                                                            <div class="ribbon ribbon-primary round-shape"><?= $i; ?></div>
                                                            <div class="row" style="margin-bottom:-15px;">
                                                                <!--<div class="col-md-12" style="display:flex;align-items: center;">-->
                                                               <div class="col-md-12 d-flex flex-row" >
                                                                    <div class="col-md-1 mt-2">

                                                                        <?php if ($row['status'] == 'Resolved') { ?>
                                                                            <div class="flex-shrink-0 text-center me-2">
                                                                                <img src="<?= base_url() ?>assets/images/tick-square.png" alt="" class="avatar-xs rounded-circle" style="margin-top: -13px;">
                                                                            </div>
                                                                        <?php } elseif ($row['status'] == 'Cancelled') { ?>
                                                                            <div class="flex-shrink-0 text-center me-2">
                                                                                <img src="<?= base_url() ?>assets/images/pending.png" alt="" class="avatar-xs rounded-circle" style="margin-top: -13px;">
                                                                            </div>
                                                                        <?php } elseif ($row['status'] == 'Pending') { ?>
                                                                            <div class="flex-shrink-0 text-center me-2">
                                                                                <img src="<?= base_url() ?>assets/images/process.png" alt="" class="avatar-xs rounded-circle">
                                                                            </div>
                                                                        <?php } ?>


                                                                    </div>
                                                                  <div class="col-md-2 flex-fill setmodulwid">
                                                                        <p class="setpara mb-1">TICKET ID</p>
                                                                        <h5 class="seth5"><b>
                                                                                <a href="<?= base_url() ?>view_ticket_details/<?= $ticket_id; ?>"><?php if (!empty($row['ticket_id'])) { ?>
                                                                                        <?php echo $row['ticket_id']; ?>
                                                                                    <?php } else {
                                                                                                                                                            echo "NA";
                                                                                                                                                        } ?></a>
                                                                            </b></h5>
                                                                    </div>

                                                                    <div class="col-md-2 flex-fill setmodulwid">
                                                                        <p class="setpara mb-1">POLICY NO.</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['policy_no'])) { ?>
                                                                                    <?php echo $row['policy_no']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 flex-fill setmodulwid">
                                                                        <p class="setpara mb-1">Grievance Type</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['gr_type'])) { ?>
                                                                                    <?php echo $row['gr_type']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 flex-fill setmodulwid">
                                                                        <p class="setpara mb-1">Complaint Received By</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['complaint_recv_by'])) { ?>
                                                                                    <?php echo $row['complaint_recv_by']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 flex-fill setmodulwid">
                                                                        <p class="setpara mb-1">Date of Complaint</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['rise_date_time'])) { ?>
                                                                                    <?php  $risedate = date("d-m-Y h:i:s", strtotime($row['rise_date_time']));
                                                                                         echo $risedate;?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 flex-fill text-center setmodulwid">
                                                                        <p class="setpara mb-1">TL</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['tl_name'])) { ?>
                                                                                    <?php echo $row['tl_name']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 flex-fill setmodulwid">
                                                                        <p class="setpara mb-1">TAT</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php printf("%d days\n", $days);?>ago
                                                                            </b></h5>
                                                                    </div>

                                                                    


                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                            <?php $i++;
                                                }
                                            } else {
                                                echo "No Data ";
                                            } ?>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>

                    </div>






                    <div class="card-body">
                        <div class="live-preview">

                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->


            </div>
            <!-- container-fluid -->
        </div>
        <div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changepassword">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- End Page-content -->
        <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="successs">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- pass -->
        <div class="modal" id="changepassword">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Change password</h6>
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>

                        <!-- <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button> -->
                    </div>
                    <form id="changepass" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="modal-body" id="showclient_details">

                        </div>
                        <div class="modal-footer">
                            <!-- <button class="btn btn-indigo" id="editdetailsbtn" type="submit" name="submit">Save changes</button>  -->
                            <button type="submit" name="submit" class="btn w-sm btn-success " id="editpass">Update</button>

                        </div>
                        <div class="modal-body">
                            <span id='showerror'></span>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/footer'); ?>
</div>



<!-- JAVASCRIPT -->
<!-- <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= base_url() ?>assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->

<!-- apexcharts -->
<!-- <script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script> -->

<!-- Vector map-->
<!-- <script src="<?= base_url() ?>assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="<?= base_url() ?>assets/libs/jsvectormap/maps/world-merc.js"></script> -->

<!--Swiper slider js-->
<!-- <script src="<?= base_url() ?>assets/libs/swiper/swiper-bundle.min.js"></script> -->

<!-- Dashboard init -->
<!-- <script src="<?= base_url() ?>assets/js/pages/dashboard-ecommerce.init.js"></script> -->
<!--datatable js-->
<!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="../assets/js/pages/datatables.init.js"></script> -->

<!-- App js -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="<?= base_url() ?>assets/js/app.js"></script> -->
<script type="text/javascript">
    function archiveFunction(id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete User Record ",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>Form_listing/deletesubadmin/id",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal('Record Deleted 🙂', ' ', 'success');
                            setTimeout(function() {
                                location.reload(true);
                            }, 1000);

                        },
                        error: function() {
                            swal('Record Not Deleted ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }

            });
    }
</script>


<script type="text/javascript">
    function holdModal(exampleModalgrid) {
        $('#' + exampleModalgrid).modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }
</script>
<script>
    //  add modal
    $(document).on('submit', '#addSubadmin', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var subname = $('#sub_name').val();
        var subemail = $('#sub_email').val();
        var subpassword = $('#sub_password').val();
        var subcontact = $('#sub_contact').val();
        var country = $('#sub_employee').val();
        var state = $('#sub_department').val();
        var state = $('#sub_adminrole').val();



        // if (subname == '') {
        //     $('#subnameError').html('Enter Your Name');
        //     $('.error').css('color', 'red');
        //     error = true;
        //     // alert("hi");

        // }
        // if (subemail == '') {
        //     $('#subemailError').html('Enter Your Email');
        //     $('.error').css('color', 'red');
        //     error = true;

        //     // alert("hi");

        // }
        // if (subpassword == '') {
        //     $('#subpassError').html('Enter Your Password');
        //     $('.error').css('color', 'red');
        //     error = true;

        //     // alert("hi");

        // }
        // if (subcontact == '') {
        //     $('#subcontactError').html('Enter Your Mobile Number');
        //     $('.error').css('color', 'red');
        //     error = true;

        //     // alert("hi");

        // }
        // if (Subemployee == '') {
        //     $('#subemployeeError').html('Select Your Employee id');
        //     $('.error').css('color', 'red');
        //     error = true;

        //     // alert("hi");

        // }

        // if (subdepartment == '') {
        //     $('#subdepartmentError').html('Select Your Department');
        //     $('.error').css('color', 'red');
        //     error = true;

        //     // alert("hi");

        // }

        if (error == false) {
            $.ajax({
                url: "<?= base_url('user/addsubadmin'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                        swal('Regional Head Added 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                        swal('Regional Head Not Added ☹️', ' ', 'success');

                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);

                    }

                    if (dataResult.email == '0') {
                        swal('Email Already Exist ☹️', ' ', 'error');



                    }


                },
                cache: false,
                contentType: false,
                processData: false,
            })

        }

    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.editmodel').click(function() {

            var userid = $(this).data('id');

            $.ajax({
                url: "<?= base_url('User/subadminedit'); ?>",
                type: "post",
                data: {
                    id: userid
                },
                success: function(response) {

                    $('.modal-body').html(response);
                    $('.bannerData').modal('show');

                }
            })


        });
    });
</script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#bannerModelSubmits', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>user/updatesubadmi/",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data

                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('Record Updated 🙂', ' ', 'success');

                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);

                } else {

                }
                // if (dataResult.inserted == '1') {
                //     $('#success').html("Category Added Succefully!");
                //     $('#success').css('color', 'green');

                // }


            },
            cache: false,
            contentType: false,
            processData: false,
        })
    })
</script>

<script type="text/javascript">
    function enableaccount(id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Enable User Account ",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Enable Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>user/update/id",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal('Account Enable 🙂', ' ', 'success');
                            $("#delete" + id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
                            })
                            setTimeout(function() {
                                location.reload(true);
                            }, 1000);

                        },
                        error: function() {
                            swal('Account Still Disable ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }

            });
    }
</script>

<script type="text/javascript">
    function disableaccount(id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Disable User Account",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Disable Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>user/updatedisable/id",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal('Account Disable 🙂', ' ', 'success');
                            $("#delete" + id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
                            })
                            setTimeout(function() {
                                location.reload(true);
                            }, 1000);

                        },
                        error: function() {
                            swal('Account Still Enable ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }

            });
    }
</script>

<script type="text/javascript">
    // update modal
    $(document).on('submit', '#changepasswordsubadmin', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>user/changesubpass",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data

                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('Password Changed 🙂', ' ', 'success');

                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);

                }

                if (dataResult.inserted == '0') {
                    swal('Password Not Changed ☹️', ' ', 'success');

                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);

                }

                if (dataResult.password == '0') {
                    swal('Current Password Mismatch ☹️', ' ', 'error');
                }


                // if (dataResult.inserted == '1') {
                //     $('#success').html("Category Added Succefully!");
                //     $('#success').css('color', 'green');

                // }


            },
            cache: false,
            contentType: false,
            processData: false,
        })
    })

    function showstates(id) {
        if (id != '') {

            $.ajax({
                url: '<?= base_url() ?>user/showstates/' + id,
                success: function(res) {

                    $(".state").html(res.output);

                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }

    function showcity(id) {

        if (id != '') {
            $.ajax({
                url: '<?= base_url() ?>Subadmin/showcity/' + id,
                success: function(res) {
                    $(".city").html(res.output);
                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }
</script>
<!-- filter Data -->

<script>
    //change password
    $(document).ready(function() {
        $("#changepasswordsubadmin").on('submit', (function(e) {
            e.preventDefault();
            err = 0;
            var formData = new FormData(this);
            formData.append('action', "enqdet");

            var new_pass = $("#new_pass").val();
            var confirm_pass = $("#confirm_pass").val();


            if (err == 0) {
                $.ajax({
                    url: "<?= base_url() ?>user/changesubpass",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#editpass").attr('disabled', true);
                    },
                    success: function(result) {
                        var response = JSON.parse(result);
                        $("#showerror").html(response.msg);
                        if (response.status == true) {
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        }
                    }
                });
            }
        }));
    });


    function changepass(id, ipdid) {
        //console.log(id);
        $.ajax({
            url: '<?= base_url() ?>user/changepass/' + id,
            success: function(res) {

                $("#showclient_details").html(res);
            },
            error: function() {
                alert("Fail")

            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.changepass').click(function() {

            var userid = $(this).data('id');

            $.ajax({
                url: "<?= base_url('User/changepass'); ?>",
                type: "post",
                data: {
                    userid: userid
                },
                success: function(response) {

                    $('.modal-body').html(response);
                    $('.changepassword').modal('show');

                }
            })


        });
    });
</script>


</body>

</html>