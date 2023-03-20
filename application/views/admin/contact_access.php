<?php include 'link.php'; ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'topar.php'; ?>

    <?php include 'imgheader.php'; ?>
    <?php include 'sidebar.php'; ?>
</div>

<div class="vertical-overlay"></div>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Contact Access</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Contact Access</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Contact Access</h4>

                    <div class="flex-shrink-0">

                        <?php if ($this->rbac->hasPrivilege('contact_access', 'can_add')) { ?>
                            <!-- <a href="<?= base_url(); ?>add_form/<?= $model_short_name ?>" type="button" title="Add New Contact Access" class="btn btn-primary waves-effect waves-light"><i class="ri-user-add-line"></i></a> -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="ri-user-add-line"></i>
                            </button>
                        <?php } ?>
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Contact Access</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="POST" id="addaccess">
                                            <div class="row g-3">
                                                <div class="col-xxl-12">
                                                    <div>
                                                        <label for="firstName" class="form-label"> Select User</label>
                                                        <select class="form-control" class="form-select form-control form-select-sm" aria-expanded="false" id="user_id" name="user_id" onchange="fetchdata(this.value);">
                                                            <option selected disabled value="">Select User</option>
                                                            <?php foreach ($admin->result() as $row) { ?>

                                                                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>

                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <!--end col-->

                                                <div id="show_modal">
                                                    <div class="d-flex ">
                                                        <div class="col-xxl-10 flex-fill">
                                                            <label for="contact_access" class="form-label">Contact Access</label>

                                                        </div>
                                                        <div class="col-xxl-2 d-flex justify-content-end">
                                                            <input class="form-check-input" type="checkbox" value="1" id="contact_access" name="contact_access">
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <!--end col-->
                                                    <div class="d-flex mt-3">
                                                        <div class="col-xxl-10 flex-fill">
                                                            <label for="emailInput" class="form-label">Alternate No. Access</label>
                                                        </div>

                                                        <div class="col-xxl-2 ">
                                                            <input class="form-check-input" type="checkbox" value="1" id="alt_no_access" name="alt_no_access">
                                                        </div>
                                                    </div>

                                                    <!--end col-->
                                                    <div class="d-flex mt-3">
                                                        <div class="col-xxl-10 flex-fill">
                                                            <label for="emailInput" class="form-label">Alternate No. 2 Access</label>
                                                        </div>

                                                        <div class="col-xxl-2 ">
                                                            <input class="form-check-input" type="checkbox" value="1" id="alt_no_2_access" name="alt_no_2_access">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12 mt-3">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                    </div>
                                                </div>

                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- </form> -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div id="fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="fixed-header" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline" style="width: 100%;" aria-describedby="fixed-header_info">
                                            <thead>
                                                <tr>

                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 606.4px;" aria-label="SR No.: activate to sort column ascending">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="ID: activate to sort column ascending">User Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 906.4px;" aria-label="Purchase ID: activate to sort column ascending">Contact Access</th>
                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Title: activate to sort column ascending">Alternate No. Access </th>
                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="User: activate to sort column ascending">Alternate No. 2 Access</th>
                                                    <!-- <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">Department</th> -->

                                                    <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Action: activate to sort column ascending">Action</th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                                <?php
                                                $i = 1;
                                                if (!empty($accessinfo)) {
                                                    foreach ($accessinfo as $row) {
                                                ?>
                                                        <tr class="odd">

                                                            <td><?php echo $i; ?></td>
                                                             <td><?php if (!empty($row['user_name'])) {
                                                                    echo $row['user_name'];
                                                                } else {
                                                                    echo "NA";
                                                                }
                                                                ?></td>
                                                            <td><input class="form-check-input" type="checkbox" value="1" id="contact_access" name="contact_access" <?php if (!empty($row['contact_access'])) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?> disabled></td>
                                                            <td><input class="form-check-input" type="checkbox" value="1" id="alt_no_access" name="alt_no_access" <?php if (!empty($row['alt_no_access'])) {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?> disabled></td>
                                                            <td><input class="form-check-input" type="checkbox" value="1" id="alt_no_2_access" name="alt_no_2_access" <?php if (!empty($row['alt_no_2_access'])) {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        } ?> disabled></td>


                                                            <!-- <?php if ($this->rbac->hasPrivilege('manager', 'can_edit')) { ?> -->
                                                            <td>

                                                                 <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row['id']; ?>"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                                <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row['id']; ?>)" data-toggle="tooltip" data-placement="bottom" style="color: red;"></i>

                                                            </td>
                                                            <!-- <?php } ?> -->



                                                        </tr>
                                                <?php $i++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Contact Access</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onClick="window.location.reload();" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="successs">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>
</div>

<!-- JAVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/datatables.init.js"></script>
<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="assets/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="assets/js/app.js"></script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#addaccess', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var contact_access = $('#contact_access').val();
        var alt_no_access = $('#alt_no_access').val();

        // alert(contact_access);
        $.ajax({
            url: "<?php base_url() ?>ContactAccess/add_useraccess",
            type: 'post',
            data: formData,
            success: function(result) {
                var dataResult = JSON.parse(result);
                if (dataResult.status == '1') {
                    swal('Access updated Successfully 🙂', ' ', 'success');

                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                }

                if (dataResult.code == 200) {

                    swal('Access Added Successfully 🙂', ' ', 'success');
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                }

                if (dataResult.code == 400) {
                    swal('Something went wrong 🙂', ' ', 'error');

                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                }

                if (dataResult.status == '0') {
                    swal('Something went wrong 🙂', ' ', 'error');
                }
            },
            cache: false,
            contentType: false,
            processData: false,
        })
    })
</script>
<script type="text/javascript">
    function archiveFunction(id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Record ",
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
                        url: "<?= base_url() ?>ContactAccess/delete/id",
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
    $(document).ready(function() {
        $('.editmodel').click(function() {

            var id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('ContactAccess/openeditmodel'); ?>",
                type: "post",
                data: {
                    id: id
                },
                success: function(response) {

                    $('.modal-body').html(response);

                }
            })


        });
    });
</script>
<script type="text/javascript">
    // update modal
    $(document).on('submit', '#updateaccess', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>ContactAccess/updateaccess/",
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
    function fetchdata(user_id) {
        var user_id = user_id;
        // alert(user_id);
        $.ajax({
            url: "<?php echo  base_url('ContactAccess/getdata'); ?>",
            type: "POST",
            data: {
                user_id: user_id
            },
            success: function(result) {

                $('#show_modal').html(result);


            }
        })
    }
</script>