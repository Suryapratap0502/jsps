<?php
$model_short_name = $this->uri->segment(2);
$this->load->view('admin/link');
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
?>
<style>
    #com_name {
        display: none;
    }
</style>
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

<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Claim Report</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Claim Report</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="card-body border border-dashed border-end-0 border-start-0">

                                        <div class="row">

                                            <!--end col-->
                                            <div class="col-md-2 col-sm-2">
                                                <div>
                                                    <input type="date" class="form-control" name="start_date" id="start_date" onchange="datefilter_reprt();" placeholder="Select Start date">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div>
                                                    <input type="date" class="form-control" name="end_date" value="<?= $date ?>" id="end_date" onchange="datefilter_reprt();" placeholder="Select End date">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-1">
                                            <div>
                                                    <select class="form-control form-select" name="sel_for_filter" id="sel_for_filter" onchange="datefilter_reprt();">
                                                        <option value="" selected>Select Status</option>
                                                        <option value="Rejected">Rejected</option>
                                                                    <option value="Approved">Approved</option>
                                                                    <option value="Ask for Reimbursement">Ask for Reimbursement
                                                                    </option>
                                                                    <option value="Pending">Pending</option>

                                                                    <option value="Under Query">Under Query</option>
                                                                    <option value="In Progress">In Progress</option>
                                                                    <option value="Withdrawn">Withdrawn</option>
                                                    </select>
                                                </div>
                                            
                                               </div>
                                            <!-- Buttons with dropdowns -->
                                            <div class="col-md-5 col-sm-6">
                                                <div class="input-group">
                                                    <select class="form-select form-select-sm" aria-expanded="false" id="select_attribute" onchange="show_input(this.value);" name="select_attribute">
                                                        <option value="" selected>Select Attributes</option>
                                                        <option value="by_company">By Company</option>
                                                        <option value="by_policy_no">By Policy Number</option>
                                                        <option value="by_customer_name">By Patient Name</option>
                                                        <option value="by_intimation_no">By Claim Intimation No</option>
                                                       </select>
                                                  <div id="com_name">
                                                        <select class="form-select form-control" id="company_name" onchange="datefilter_reprt();">
                                                            <option value="" selected>Select Company</option>
                                                            <?php if (!empty($company)) {
                                                                foreach ($company as $com) { ?>
                                                                    <option value="<?= $com['name'] ?>"><?= $com['name'] ?></option>
                                                            <?php  }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <input type="text" id="search" name="search" class="form-control search" onkeyup="datefilter_reprt();" onkeydown="datefilter_reprt();" placeholder="Enter Keyword for Search" readonly>

                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-2">
                                                <div>
                                                    <a href="<?=base_url()?>report/exportexcel" class="btn btn-primary" style="float: right;"><i class="ri-download-cloud-line"></i></a>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-2 col-sm-6" style="float:right;">
                                    <div class="search-box">
                                        <input type="text" id="search" name="search" class="form-control search" onkeyup="searchdata(this.value)" onkeydown="searchdata(this.value)" placeholder="Enter Keyword for Search">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>-->

                                            <!--end col-->

                                            <!--end col-->

                                            <!--end col-->
                                        </div>
                                        <!--end row-->

                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <!-- Soft Buttons -->
                                                <!-- Base Buttons -->
                                                <!-- Outline Buttons -->

                                                <input type="radio" class="btn-check" name="options-outlined" value="current_date" id="current_date" onClick="filetr_wise_all();">
                                                <label class="btn btn-outline-success" for="current_date">Current Date</label>
                                                <!-- <button type="button" class="btn btn-outline-primary waves-effect waves-light setsmallbtnsize41" onClick="filetr_wise_all();">Current Date</button> -->
                                                <!-- <button type="button" class="btn btn-outline-secondary waves-effect waves-light setsmallbtnsize41" onClick="filter_wise_all_month();">Current Month</button> -->
                                                <input type="radio" class="btn-check" name="options-outlined" value="current_month" id="current_month" onClick="datefilter_reprt();">
                                                <label class="btn btn-outline-success" for="current_month">Current Month</label>


                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1">

                                            <!-- Soft Buttons -->
                                            <!-- Base Buttons -->
                                            <!-- Outline Buttons -->

                                            <p id="total_premium">Total Premium -<?php if (!empty($claim)) { ?>
                                                <?= $total_premium; ?>
                                            <?php } ?> </p>
                                            <p id="policy_count">Total No. Of Policy - <?php if (!empty($claim)) { ?>
                                                    <?= count($claim) ?>
                                                <?php } ?> </p>


                                        </div>
                                    </div><br>

                                    <div class="live-preview">

                                        <div class="table-responsive table-card">

                                            <table class="table align-middle table-nowrap mb-0">

                                                <thead class="table-light">
                                                    <tr>

                                                        <th>S.No</th>
                                                        <th>Policy No.</th>
                                                        <th>Patient Name</th>
                                                        <th>Company</th>
                                                        <th>Claim Intimation No</th>
                                                        <th>Reason For Admit</th>

                                                        <th>Health Card</th>
                                                        <th>Admission Date</th>
                                                        <th>Network/Non Network</th>
                                                        <th>Claim Type</th>
                                                        <th>Claim For</th>
                                                        <th>Pre Auth Status</th>

                                                        <th>Pre Auth Amount</th>
                                                        <th>Claim Status</th>
                                                        <th>Total Bill Amount</th>
                                                        <th>Total Approve Amount </th>
                                                        <th>Hospital Discount</th>
                                                        <th>Deduction Amount</th>

                                                        <th>Deduction Amount Detail</th>
                                                        <th>Paid on</th>
                                                        <th>Remark</th>
                                                        <th>Final Status</th>
                                                        
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody class="filterdata">
                                                    <?php
                                                    $i = 1;
                                                    if (!empty($claim)) {
                                                        foreach ($claim as $row) { ?>
                                                            <tr>
                                                                <td class="count_2"><?php echo $i; ?></td>
                                                                <td><?php if (!empty($row['policy_no'])) { ?><?php echo $row['policy_no'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['patient_name'])) { ?><?php echo $row['patient_name'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['company_name'])) { ?><?php echo $row['company_name'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['claim_intimation_no'])) { ?><?php echo $row['claim_intimation_no']; ?> <?php } ?></td>

                                                                <td><?php if (!empty($row['reason_admit'])) { ?><?php echo $row['reason_admit'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['health_card'])) { ?><?php echo $row['health_card'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['admission_date'])) { ?><?php echo $row['admission_date'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['is_network'])) { ?><?php echo $row['is_network'] ?> <?php } ?></td>
                                                                

                                                                <td><?php if (!empty($row['claim_type'])) { ?><?php echo $row['claim_type'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['claim_for'])) { ?><?php echo $row['claim_for'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['pre_auth_status'])) { ?><?php echo $row['pre_auth_status'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['pre_auth_amt'])) { ?><?php echo $row['pre_auth_amt'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['claim_status'])) { ?><?php echo $row['claim_status']; ?> <?php } ?></td>

                                                                <td><?php if (!empty($row['total_bill_amt'])) { ?><?php echo $row['total_bill_amt'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['total_approve_amt'])) { ?><?php echo $row['total_approve_amt'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['hospital_discount'])) { ?><?php echo $row['hospital_discount'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['deduction_amt'])) { ?><?php echo $row['deduction_amt'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['deduction_amt_details'])) { ?><?php echo $row['deduction_amt_details']; ?> <?php } ?></td>

                                                                <td><?php if (!empty($row['paid_on'])) { ?><?php echo $row['paid_on'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['remarks'])) { ?><?php echo $row['remarks'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['final_status'])) { ?><?php echo $row['final_status'] ?> <?php } ?></td>
                                                                
                                                            </tr>
                                                    <?php $i++;
                                                        }
                                                    } ?>

                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                   <!-- pagination start -->
                                      <div class="align-items-center mt-2 row g-3 text-center text-sm-start">
                                        <div class="col-sm">
                                            <div class="text-muted">Showing<span class="fw-semibold"> <?= count($claim) ?> -
                                                    <?= isset($count) ? $count : ''; ?></span> Results
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                                <?php $uri = $this->uri->segment(4); ?>

                                                <?php for ($i = 0; $i < ($count / 50); $i++) { ?>
                                                    <li class="page-item <?php if (($uri == '') && ($i + 1 == 1)) {
                                                                                echo 'active';
                                                                            } else if ($uri == ($i + 1)) {
                                                                                echo 'active';
                                                                            } ?>">
                                                        <a href="<?= base_url() ?>report/<?= $model_short_name;?>/<?= $i + 1 ?>" class="page-link" style="<?php if ($uri == '') {
                                                                                                                                                                            if ($i + 1 == 1) {
                                                                                                                                                                                echo 'pointer-events: none;';
                                                                                                                                                                            }
                                                                                                                                                                        } else if ($uri == $i + 1) {
                                                                                                                                                                            echo 'pointer-events: none;';
                                                                                                                                                                        } ?>"><?= $i + 1 ?></a>
                                                    </li>
                                                <?php } ?>

                                                <?php if ($i > $uri) { ?>
                                                    <li class="page-item">
                                                        <a href="<?= base_url() ?>report/<?= $model_short_name;?>/<?= $uri + 1 ?>" class="page-link">→</a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- paginaton end -->

                                </div><!-- end card-body -->
                            </div>

                        </div>

                    </div><!-- end row -->


                </div>
                <!-- container-fluid -->
            </div>
        </div>
    </div>

    <?php $this->load->view('admin/footer');  ?>
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
<script src="<?= base_url() ?>assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="<?= base_url() ?>assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="<?= base_url() ?>assets/js/pages/dashboard-ecommerce.init.js"></script>
<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/datatables.init.js"></script>

<!-- App js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="<?= base_url() ?>assets/js/app.js"></script>
<script>
   function datefilter_reprt() {
        var startdate = $('#start_date').val();
        var enddate = $('#end_date').val();
        var sel_disp = $('#sel_for_filter').val();
        var total_premium = $('#totalpremium').val();
        var select_attribute = $('#select_attribute').val();
        var content = $('#search').val();
        var company_name = $('#company_name').val();
        if ($("#current_date").is(':checked')) {
            var date_or_month = 'current_date';
        }
        var date_or_month = '';
        if ($("#current_month").is(':checked')) {
            var date_or_month = 'current_month';
        }
        $.ajax({
            url: "<?= base_url(); ?>filter/date_filter_claim_report",
            type: "post",
            data: {
                startdate: startdate,
                enddate: enddate,
                sel_disp: sel_disp,
                date_or_month: date_or_month,
                content: content,
                select_attribute: select_attribute,
                company_name: company_name
            },
            success: function(response) {
                $('.filterdata').html(response);
                let total = sessionStorage.getItem("total_pre");
                $("#total_premium").text("Total Premium -" + total);
                var rowCount = $('.filterdata').html(response).find('.count_2').length;
                $('#policy_count').text("Total No. Of Policy -" + rowCount);
            }
        })
    }

    function current_date_data_report() {
        $.ajax({
            url: "<?= base_url('filter/current_date_filter_claim_report'); ?>",

            success: function(response) {
                $('.filterdata').html(response);
            }
        })
    }

    function show_input(val) {
        if ($("select[name='select_attribute']").selectedIndex == 0 || val == '') {
            $("#search").prop("readonly", true);
        } else {
            $("#search").prop("readonly", false);
        }


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
    function searchdata() {
        var select_attribute = $('#select_attribute').val();
        var content = $('#search').val();

        $.ajax({
            url: "<?= base_url('filter/searchdata_claim_reprt'); ?>",
            type: "post",
            data: {
                content: content,
                select_attribute: select_attribute

            },
            success: function(response) {

                $('.filterdata').html(response);
            }
        })
    }

  



  function filter_by_status(val)
  {
    $.ajax({
            method:'post',
            url: "<?= base_url('filter/filter_by_status_claim'); ?>",
           	data: {val: val},
            success: function (response) {
                $('.filterdata').html(response);
            }
        })
  }

  function filetr_wise_all() {
    	var total_premium = $('#totalpremium').val();
        var sel_disp = $('#sel_for_filter').val();

        var date_or_month = '';

        if ($("#current_date").is(':checked')) {
            var date_or_month = 'current_date';
        }
        $.ajax({
            method: 'post',
            url: "<?= base_url('filter/current_date_filter_claim_report'); ?>",
            data: {
                sel_disp: sel_disp,
                date_or_month: date_or_month
            },
            success: function(response) {
                $('.filterdata').html(response);
 				let total = sessionStorage.getItem("total_pre");
                $("#total_premium").text("Total Premium -" + total);
                var rowCount = $('.filterdata').html(response).find('.count_2').length;
                $('#policy_count').text("Total No. Of Policy -" +rowCount);
            }
        })

    }

    function filter_wise_all_month() {
     	var total_premium = $('#totalpremium').val();
        var sel_disp = $('#sel_for_filter').val();
        var date_or_month = '';
        if ($("#current_month").is(':checked')) {
            var date_or_month = 'current_month';
        }
        $.ajax({
            method: 'post',
            url: "<?= base_url('filter/current_month_filter_claim_report'); ?>",
            data: {
                sel_disp: sel_disp,
                date_or_month: date_or_month
            },
            success: function(response) {
                $('.filterdata').html(response);
               let total = sessionStorage.getItem("total_pre");
                $("#total_premium").text("Total Premium -" + total);
                var rowCount = $('.filterdata').html(response).find('.count_2').length;
                $('#policy_count').text("Total No. Of Policy -" +rowCount);
            }
        })

    }
</script>


</body>

</html>