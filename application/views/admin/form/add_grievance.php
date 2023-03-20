<?php $this->load->view('admin/link'); ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php $this->load->view('admin/topar');
    $this->load->view('admin/imgheader');
    $this->load->view('admin/sidebar'); ?>

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
    .setredcolor {
        color: red;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.2rem 0.6rem !important;
    }

    .setwidthcol2 {
        width: 20%;
    }

    .setcalc {
        width: 16.66% !important;
    }

    .setcalc4 {
        width: 25% !important;
    }

    .setcalc8 {
        width: 55% !important;
        float: right;
    }

    input[type="file"] {
        right: -9999px;
    }

    label {
        text-transform: uppercase;
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
                        <h4 class="mb-sm-0">Grievance</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Grievance</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Add Grievance</h4>


                        </div><!-- end card header -->
                        <div class="card-body">


                            <div class="live-preview">

                                <form method="POST" id="addgrievance">
                                    <div class="row">
                                        <!-- first-->
                                        <div class="col-md-12 ">

                                            <div class="row">
                                            <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Priority<span class="setredcolor"></span></label>
                                                        <select class="form-control form-select" name="priority" id="priority">
                                                        <option value="" selected>Select</option>
                                                        <option value="Heigh">Heigh</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="Low">Low</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Policy Number
                                                            <span class="setredcolor"></span></label>
                                                        <input type="text" class="form-control search"  name="policy_no" id="policy_no" aria-describedby="emailHelp" placeholder="Enter Policy No.">
                                                  		<div class="error" id="policy_error"></div>  
                                                  </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Customer ID</label>
                                                        <input type="number" class="form-control" id="cust_id" aria-describedby="emailHelp" name="cust_id" placeholder="Enter Customer ID">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label"> Company Name
                                                        </label>
                                                        <input class="search__input form-control" id="company_name" name="company_name" type="text" placeholder="Enter Company Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Book Date</label>
                                                        <input type="date" class="form-control" id="date_of_closure" aria-describedby="emailHelp" name="sale_book_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Gross Premium
                                                        </label>
                                                        <input type="number" class="form-control" id="gross_premium" aria-describedby="emailHelp" name="premium" placeholder="Enter Premium">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Grievance Type</label>
                                                        <select class="form-control form-select" name="gr_type" id="gr_type">
                                                            <option value="" selected>Select</option>
                                                            <option value="Claim">Claim</option>
                                                            <option value="Policy T &C">Policy T &C</option>
                                                            <option value="Discount">Discount</option>
                                                            <option value="Cancellation">Cancellation</option>
                                                            <option value="Endorsement">Endorsement</option>
                                                            <option value="Service Issue">Service Issue</option>
                                                            <option value="Health Checkup">Health Checkup</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                        <div class="error" id="gr_type_Error"></div>

                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Compaint Received By</label>
                                                        <select class="form-control form-select" name="complaint_recv_by" id="complaint_recv_by">
                                                            <option value="" selected>Select</option>
                                                            <option value="Company">Company</option>
                                                            <option value="Service Team">Service Team</option>
                                                            <option value="Renewal Team">Renewal Team</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                        <div class="error" id="com_recv_by_Error"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Date Of Complaint
                                                        </label>
                                                        <input type="date" class="form-control" id="rise_date_time" aria-describedby="emailHelp" name="rise_date_time">
                                                        <div class="error" id="date_complaint_Error"></div>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Agent Name
                                                        </label>
                                                        <input type="text" class="form-control" id="agent_name" aria-describedby="emailHelp" name="agent_name" placeholder="Enter Agent Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Team Leader
                                                        </label>
                                                        <input type="text" class="form-control" id="tl_name" aria-describedby="emailHelp" name="tl_name" placeholder="Enter TL Name">
                                                    </div>
                                                </div>
                                               </div>
                                            <div class="row">
                                            
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Action Taken
                                                        </label>
                                                        <textarea class="form-control" id="action_taken" aria-describedby="emailHelp" name="action_taken" placeholder="Describe Taken Action"></textarea>
                                                        <div class="error" id="action_taken_Error"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                        </div>


                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>

                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->



        </div>
        <!-- container-fluid -->
    </div>

    <!-- End Page-content -->








    <?php $this->load->view('admin/footer'); ?>
</div>


<!-- JAVASCRIPT -->
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= base_url(); ?>assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- apexcharts -->
<script src="<?= base_url(); ?>assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="<?= base_url(); ?>assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="<?= base_url(); ?>assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="<?= base_url(); ?>assets/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


<script>
    //  add modal
    $(document).on('submit', '#addgrievance', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var gr_type = $('#gr_type').val();
        var complaint_recv_by = $('#complaint_recv_by').val();
        var rise_date_time = $('#rise_date_time').val();
        var status = $('#gr_status').val();
        var action_taken = $('#action_taken').val();
        if (gr_type == '') {
            $('#gr_type_Error').html('Select Grivevance Type');
            $('.error').css('color', 'red');
            error = true;
        }

        if (com_recv_by_Error == '') {
            $('#gr_type_Error').html('Select Complaint Receive By');
            $('.error').css('color', 'red');
            error = true;
        }

        if (rise_date_time == '') {
            $('#date_complaint_Error').html('Enter Complaint Book Date');
            $('.error').css('color', 'red');
            error = true;
        }

        if (status == '') {
            $('#status_Error').html('Select Status');
            $('.error').css('color', 'red');
            error = true;
        }

        if (status == '') {
            $('#status_Error').html('Select Status');
            $('.error').css('color', 'red');
            error = true;
        }

        if (action_taken == '') {
            $('#action_taken_Error').html('Enter Taken action');
            $('.error').css('color', 'red');
            error = true;
        }
      	

        if (error == false) {
            $.ajax({
                url: "<?= base_url('grievance/add_gr_form'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {

                    var dataResult = JSON.parse(result);
                    if (dataResult.inserted == '1') {
                        swal('Grievance Added 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                        window.location.href = "<?=base_url()?>grievance";
                        
                    }

                    if (dataResult.inserted == '0') {
                        swal('Grievance Not Added ☹️', ' ', 'success');
                    }
                  if (dataResult.policy == '0') {
                        $('#policy_error').html('Policy Does Not Exist');
                    	$('.error').css('color','red');

					 }

                },
                cache: false,
                contentType: false,
                processData: false,
            })

        }

    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script>
    $('.search').typeahead({
      	minLength: 4,
        source: function(query, result) {
            $.ajax({
                url: "<?= base_url() ?>grievance/searchpolicyno",
                method: "POST",
                data: {
                    query: query
                },
                dataType: "json",
                success: function(data) {
                    if (data.length > 0) {
                        result($.map(data, function(item) {
                            return item;
                        }));
                    } else {

                    }
                },
            })
        },
        afterSelect: function(item) {
            var items = JSON.parse(JSON.stringify(item));

            $.ajax({
                url: "<?= base_url('grievance/data_of_policy'); ?>",
                type: "post",
                data: {
                    items: items,
                },
                success: function(response) {
                    var res = JSON.parse(response);
                    
                    if (res.cust_id != '') {
                        $('#cust_id').val(res.cust_id);
                        $('#cust_id').attr('readonly', true);
                    }
                    if (res.company_name != '') {
                        $('#company_name').val(res.company_name);
                        $('#company_name').attr('readonly', true);
                    }
                    if (res.book_date != '') {
                        $('#date_of_closure').val(res.book_date);
                        $('#date_of_closure').attr('readonly', true);
                    }
                    if (res.gross_premium != '') {
                        $('#gross_premium').val(res.gross_premium);
                        $('#gross_premium').attr('readonly', true);
                    }
                    if (res.agent_name != '') {
                        $('#agent_name').val(res.agent_name);
                        $('#agent_name').attr('readonly', true);
                    }
                    if (res.team_leader != '') {
                        $('#tl_name').val(res.team_leader);
                        $('#tl_name').attr('readonly', true);
                    }
                }

            })
        }
    });
</script>
</body>

</html>