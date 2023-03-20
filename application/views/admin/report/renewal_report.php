<?php
$model_short_name = $this->uri->segment(2);
$this->load->view('admin/link');
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
?>
<style>
    #tl_name {
        display: none;
    }

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
                        <h4 class="mb-sm-0">Renewal Report</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Renewal Report</li>
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
                                             <div class="col-md-4 col-sm-2">
                                                <button type="button" class="btn btn-outline-primary waves-effect waves-light setsmallbtnsize41" onClick="current_date_data_report();">Current Date</button>
                                                <button type="button" class="btn btn-outline-secondary waves-effect waves-light setsmallbtnsize41" onClick="current_month_data();">Current Month</button>
                                            </div>
                                            <div class="col-md-2 col-sm-1">
                                            <div>
                                                   <select class="form-control form-select" name="sel_for_filter" id="sel_for_filter" onchange="datefilter_reprt();">
                                                        <option value="" selected>Select Status</option>
                                                        <?php if (!empty($disposition_name)) {
                                                            foreach ($disposition_name as $val) { ?>
                                                                <option value="<?= $val['id'] ?>"><?= $val['disposition']; ?></option>

                                                        <?php }
                                                        } ?>
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
                                                        <option value="by_customer_name">By Customer Name</option>
                                                        <option value="by_tl">By Team Leader</option>
                                                        <option value="by_log_id">By Log ID</option>
                                                        <option value="by_cust_id">By Customer ID</option>
                                                        <option value="by_expiry_date">By Expiry Date</option>
                                                    </select>
                                                  <div id="com_name">
                                                        <select class="form-select form-control" id="company_name" onchange="datefilter_reprt();">
                                                            <option value="" selected>Select Company</option>
                                                            <?php if (!empty($company)) {
                                                                foreach ($company as $com) { ?>
                                                                    <option value="<?= $com['id'] ?>"><?= $com['name'] ?></option>
                                                            <?php  }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div id="tl_name">
                                                        <select class="form-select form-control" id="tl_name1" onchange="datefilter_reprt();">
                                                            <option value="" disabled selected>Select Team Leader</option>
                                                            <?php if (!empty($team_leader)) {
                                                                foreach ($team_leader as $com) { ?>
                                                                    <option value="<?= $com['id'] ?>"><?= $com['name'] ?></option>


                                                            <?php  }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <input type="text" id="search" name="search" class="form-control search" onkeyup="datefilter_reprt();" onkeydown="datefilter_reprt();" placeholder="Enter Keyword for Search" readonly>

                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-2">
                                                <div>
                                                   <a href="<?= base_url() ?>report/exportexcel_renawal_report" class="btn btn-primary" style="float: right;"><i class="ri-download-cloud-line"></i></a>
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
 										<div class="row">
                                                    <div class="col-md-3 col-sm-2">
                                                        <p style="color:blue ;"> Start Date
                                                        <div>
                                                            <input type="date" class="form-control" name="start_date" id="start_date" onchange="datefilter_reprt();" placeholder="Select Start date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-2">
                                                        <p style="color:blue ;"> End Date
                                                        <div>
                                                            <input type="date" class="form-control" name="end_date" value="<?= $date ?>" id="end_date" onchange="datefilter_reprt();" placeholder="Select End date">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-2">
                                                        <p style="color:blue ;"> Expiry Start Date
                                                        <div>
                                                            <input type="date" class="form-control" name="exp_start_date" id="exp_start_date" onchange="datefilter_reprt();" placeholder="Select Start date">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-sm-2">
                                                        <p style="color:blue ;">Expiry End Date
                                                        <div>
                                                            <input type="date" class="form-control" name="exp_end_date" id="exp_end_date" onchange="datefilter_reprt();" placeholder="Select End date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4">

                                            <!-- Soft Buttons -->
                                            <!-- Base Buttons -->
                                            <!-- Outline Buttons -->

                                             <p id="total_premium">Total Renewal Premium -<?php if (!empty($renewal)) { ?>
                                                <?= $total_premium; ?>
                                            <?php } ?> </p>
                                            <p id="policy_count">Total No. Of Policy - <?php if (!empty($renewal)) { ?>
                                                    <?= count($renewal) ?>
                                                <?php } ?> </p>


                                        </div>
                                    </div><br>

                                    <div class="live-preview">

                                        <div class="table-responsive table-card">

                                            <table class="table align-middle table-nowrap mb-0">

                                                <thead class="table-light">
                                                    <tr>

                                                        <th>S.No</th>
                                                        <th>Customer Name</th>
                                                        <th>Policy</th>
                                                        <th>New Policy</th>
                                                        <th>Phone No.</th>
                                                        <th>Alternate No.</th>

                                                        <th>Alternate No.2</th>
                                                        <th>Email</th>
                                                        <th>City</th>
                                                        <th>Date Of Birth</th>
                                                        <th>Company Name</th>
                                                        <th>Product Name</th>

                                                        <th>Policy End Date</th>
                                                        <th>Payment Due On</th>
                                                        <th>Faimly Type</th>
                                                        <th>Sum Assured</th>
                                                        <th>Payment Date</th>
                                                        <th>Due Renewal</th>

                                                        <th>Paid Renewal</th>
                                                        <th>Upsell</th>
                                                        <th>Tenure1</th>
                                                       <th>Disposition</th>
                                                        <th>Agent Name</th>
                                                        <th>Payment Mode</th>
                                                        <th>Discount</th>
                                                        <th>Upselling</th>
                                                        
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody class="filterdata">
                                                    <?php
                                                    $i = 1;
                                                    if (!empty($renewal)) {
                                                        foreach ($renewal as $row) {  
                                                            $json = json_decode($row['sub_remark'], true);?>
                                                            <tr>
                                                                <td id="count_2"><?php echo $i; ?></td>
                                                                <td><?php if (!empty($row['customer_name'])) { ?><?php echo $row['customer_name'] ?> <?php } else {
                                                                                                                                                        echo $row['proposer_name'];
                                                                                                                                                    } ?></td>
                                                                <td><?php if (!empty($row['policy_no'])) { ?><?php echo $row['policy_no'] ?> <?php } ?></td>
                                                                
                                                                <td><?php if (!empty($json['New Policy'])) { ?><?php echo $json['New Policy'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['contact'])) { ?><?php echo $row['contact']; ?> <?php } ?></td>

                                                                <td><?php if (!empty($json['Alternate Number'])) { ?><?php echo $json['Alternate Number'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['alternate_no'])) { ?><?php echo $row['alternate_no'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['email'])) { ?><?php echo $row['email'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['customer_city'])) { ?><?php echo $row['customer_city'] ?> <?php } ?></td>
                                                                

                                                                <td><?php if (!empty($json['Proposer Date Of Birth'])) { ?><?php echo $json['Proposer Date Of Birth'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['company_name'])) { ?><?php if($row['company_name']== $company[0]['id']){ echo $company[0]['name'];} ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['product_name'])) { ?><?php echo $row['product_name'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($row['policy_end_date'])) { ?><?php echo $row['policy_end_date'] ?> <?php } ?></td>
                                                                <td>Payment Due On</td>

                                                                <td><?php if (!empty($row['coverage_type'])) { ?><?php echo $row['coverage_type'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($json['New Sum Assured'])) { ?><?php echo $json['New Sum Assured'] ?> <?php } ?></td>
                                                                <td>Payment Date</td>
                                                                <td>Due Renewal</td>
                                                                <td>Paid Renewal</td>

                                                                <td>Upsell</td>
                                                                <td><?php if (!empty($json['New Payment Tenure'])) { ?><?php echo $json['New Payment Tenure'] ?> <?php } ?></td>
                                                                
                                                              <td><?php if (!empty($row['desposition_id'])) { ?><?php $id = $row['desposition_id']; 
                                                                    $this->db->select('*');
                                                                    $this->db->from('disposition');
                                                                    $this->db->where('id',$id);
                                                                    $rows1 = $this->db->get()->row();
                                                                    echo $rows1->disposition; ?> <?php } ?></td>  
                                                              <td><?php if (!empty($row['agent'])) { ?><?php echo $row['agent'] ?> <?php } ?></td>
                                                              <td><?php if (!empty($json['New Payment Mode'])) { ?><?php echo $json['New Payment Mode'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($json['New Discount'])) { ?><?php echo $json ['New Discount'] ?> <?php } ?></td>
                                                                <td><?php if (!empty($json['Upselling'])) { ?><?php echo $json['Upselling'] ?> <?php } ?></td>
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
                                            <div class="text-muted">Showing<span class="fw-semibold"> <?= count($renewal) ?> -
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
        var expstartdate = $('#exp_start_date').val();
        var expenddate = $('#exp_end_date').val();
        var total_premium = $('#totalpremium').val();
        var select_attribute = $('#select_attribute').val();
        var content = $('#search').val();
        var company_name = $('#company_name').val();
        var tl_name1 = $('#tl_name1').val();
        var date_or_month = '';
        var sel_disp = $('#sel_for_filter').val();
        if ($("#current_date").is(':checked')) {
            var date_or_month = 'current_date';
        } else if ($("#current_month").is(':checked')) {
            var date_or_month = 'current_month';
        }
        $.ajax({
            url: "<?= base_url(); ?>filter/date_filter_renewal_report",
            type: "post",
            data: {
                expstartdate: expstartdate,
                expenddate: expenddate,
                startdate: startdate,
                enddate: enddate,
                sel_disp: sel_disp,
                content: content,
                select_attribute: select_attribute,
                date_or_month: date_or_month,
                company_name: company_name,
                tl_name1: tl_name1
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
        var total_premium = $('#totalpremium').val();
        $.ajax({
            url: "<?= base_url('filter/current_date_filter_claim_report'); ?>",

            success: function(response) {
               $('.filterdata').html(response);
                let total = sessionStorage.getItem("total_pre");
                $("#total_premium").text("Total Premium -" + total);
                var rowCount = $('.filterdata').html(response).find('.count_2').length;
                $('#policy_count').text("Total No. Of Policy -" +rowCount);
            }
        })
    }

     function show_input(val) {
        if (val == 'by_company') {
            $("#tl_name").css("display", 'none');
            $("#com_name").css("display", 'block');
            $("#search").css("display", 'none');
        } else if (val == 'by_tl') {
            $("#tl_name").css("display", 'block');
            $("#com_name").css("display", 'none');
            $("#search").css("display", 'none');
        } else {
            $("#tl_name").css("display", 'none');
            $("#com_name").css("display", 'none');
            $("#search").css("display", 'block');
        }
        if ($("select[name='select_attribute']").selectedIndex == 0 || val == '') {
            $("#search").prop("readonly", true);
        } else {
            $("#search").prop("readonly", false);
        }
    }

    /*function searchdata() {
        var select_attribute = $('#select_attribute').val();
        var content = $('#search').val();

        $.ajax({
            url: "<?= base_url('filter/searchdata_service_reprt'); ?>",
            type: "post",
            data: {
                content: content,
                select_attribute: select_attribute

            },
            success: function(response) {

                $('.filterdata').html(response);
            }
        })
    }*/

    function current_month_data()
  {
    var total_premium = $('#totalpremium').val();
  	$.ajax({
            url: "<?= base_url('filter/current_month_filter_claim_report'); ?>",
           	
            success: function (response) {
              $('.filterdata').html(response);
                let total = sessionStorage.getItem("total_pre");
                $("#total_premium").text("Total Premium -" + total);
                var rowCount = $('.filterdata').html(response).find('.count_2').length;
                $('#policy_count').text("Total No. Of Policy -" +rowCount);
            }
        })
  }

  function filter_by_disposition(val)
  {
    //var val = $('#sel_for_filter').val();
    $.ajax({
            method:'post',
            url: "<?= base_url('filter/filter_by_disposition_services'); ?>",
           	data: {val: val},
            success: function (response) {
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
</script>


</body>

</html>