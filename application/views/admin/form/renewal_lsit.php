<?php $this->load->view('admin/link');
$short_name = $this->uri->segment(1);
$model_short_name = $this->uri->segment(2);
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$total_premium = $this->db->query("select sum(gross_premium) as totalpremium from form where flag='0'")->result();
$policy_count = $this->db->query("select count(policy_no) as totalpolicy from form where flag='0'")->result();

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
</style>
<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Sale Closure Listing</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Sale Closure Listing</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Sale Closure Listing</h4>

                            <div class="flex-shrink-0">
                               <!-- <p class=" mb-0 flex-grow-1">Total Renewal Premium - </p>
                                <p class=" mb-0 flex-grow-1">Total N.O.P - </p>-->
                                <?php $sess = $this->session->userdata('pmsadmin');
                                $id = $sess['id'];
                                $role = $sess['role'];
                                $name = $sess['name'];

                                if ($role == 'Master') { ?>
                                    <a href="<?= base_url(); ?>add_form/<?= $model_short_name ?>" type="button" title="Add New Regional Head" class="btn btn-primary waves-effect waves-light"><i class="ri-user-add-line"></i></a>
                                <?php } ?>

                            </div>

                        </div><!-- end card header -->
                        <style>
                            .shift_left {
                                margin-left: -70px;
                            }
                        </style>

                        <div class="card-body border border-dashed border-end-0 border-start-0">

                            <div class="row">
                            <?php date_default_timezone_set('Asia/Kolkata');
                                    $current_date = date('Y-m-d');
                                    $current_month = date('Y-m'); ?>

                                <!--end col-->
                                <div class="col-md-2 col-sm-2">
                                    <div>
                                        <input type="date" class="form-control" name="start_date"  id="start_date" onchange="datefilter();" placeholder="Select Start date">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div>
                                        <input type="date" class="form-control" name="end_date" id="end_date" onchange="datefilter();" placeholder="Select End date">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-1">
                                
                                        <select class="form-select form-select" aria-expanded="false" id="search_by_disp" name="search_by_disp" onchange="datefilter(); ">
                                            <option value="" selected>Select</option>
                                            <?php if (!empty($disposition_name)) {
                                                foreach ($disposition_name as $val) { ?>
                                                    <option value="<?= $val['id'] ?>"><?= $val['disposition']; ?></option>

                                            <?php }
                                            } ?>
                                        </select>
                                  

                                </div>
                                <!-- Buttons with dropdowns -->
                                <style>
                                    #com_name {
                                        display: none;
                                    }
                                </style>
                                <div class="col-md-5 col-sm-6">
                                    <div class="input-group">
                                        <select class="form-select form-select-sm" aria-expanded="false" id="select_attribute" name="select_attribute" onchange="show_input(this.value);">
                                            <option value="" selected>Select Attributes</option>
                                            <option value="by_company">By Company</option>
                                            <option value="by_customer_name">By Customer Name</option>
                                            <option value="by_policy_no">By Policy No.</option>
                                            <option value="by_log_id">By Log ID</option>
                                            <option value="by_cust_id">By Customer ID</option>
                                            <option value="by_email">By Email ID</option>
                                            <option value="by_contact">By Contact No.</option>
                                        </select>
                                        <div id="com_name">
                                            <select class="form-select form-control" id="company_name" onchange="searchdata();">
                                                <option value="" selected>Select Company</option>
                                                <?php if (!empty($company)) {
                                                    foreach ($company as $com) { ?>
                                                        <option value="<?= $com['id'] ?>"><?= $com['name'] ?></option>
                                                <?php  }
                                                } ?>
                                            </select>
                                        </div>
                                        <input type="text" id="search" name="search" class="form-control search" onkeyup="searchdata();" onkeydown="searchdata();" onchange="datefilter();" placeholder="Enter Keyword for Search" readonly>

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
                                                <?php date_default_timezone_set('Asia/Kolkata');
                                                $current_date = date('Y-m-d');
                                                $current_month = date('Y-m'); 
                                              	$next_month =  date('Y-m', strtotime('+ 1 month', strtotime($current_month)));?>

                                                <input type="radio" class="btn-check" name="options-outlined" value="<?=$current_date;?>" id="current_date" onClick="datefilter();">
                                                <label class="btn btn-outline-success" for="current_date">Current Date</label>
                                                <!-- <button type="button" class="btn btn-outline-primary waves-effect waves-light setsmallbtnsize41" onClick="filetr_wise_all();">Current Date</button> -->
                                                <!-- <button type="button" class="btn btn-outline-secondary waves-effect waves-light setsmallbtnsize41" onClick="filter_wise_all_month();">Current Month</button> -->
                                                <input type="radio" class="btn-check" name="options-outlined" value="<?=$current_month;?>" id="current_month" onClick="datefilter();">
                                                <label class="btn btn-outline-success" for="current_month">Current Month</label>
                                                <input type="radio" class="btn-check" name="options-outlined" value="<?=$next_month;?>" id="next_month" onClick="datefilter();">
                                                <label class="btn btn-outline-success" for="next_month">Next Month</label>
                                                


                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1">

                                            <!-- Soft Buttons -->
                                            <!-- Base Buttons -->
                                            <!-- Outline Buttons -->

                                            <p id="total_premium">Total Premium - <?= $total_premium[0]->totalpremium; ?> </p>
                                            <span>Total No. Of Policy - <span id="policy_count">
                                        <?= $policy_count[0]->totalpolicy; ?>
                                    </span></span>
										 </div>
                                    </div>
                       


                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalgridLabel">Add New Form </h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>

                                    <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>

                                        </div>
                                        <form method="POST" id="addSubadmin">
                                            <div class="row g-3">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="sub_name" id="sub_name" placeholder="Enter Name">
                                                    </div>
                                                    <div class="error" id="subnameError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="sub_email" id="sub_email" placeholder="Enter Email">
                                                    </div>
                                                    <div class="error" id="subemailError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="sub_password" id="sub_password" placeholder="Enter Password">
                                                    </div>
                                                    <div class="error" id="subpassError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Contact</label>
                                                        <input type="number" class="form-control" name="sub_contact" id="sub_contact" placeholder="Enter your Contact">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Employee id</label>
                                                        <input type="text" class="form-control" name="sub_employee" id="sub_employee" placeholder="Enter your Employee id">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Department</label>
                                                        <input type="text" class="form-control" name="sub_department" id="sub_department" placeholder="Enter your Department">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Admin Role</label>
                                                        <select class="form-control" name="sub_adminrole">
                                                            <option value="Master Admin">Master Admin</option>
                                                            <option value="Underwriter/Verifier">Underwriter/Verifier
                                                            </option>
                                                            <option value="Operations">Operations</option>
                                                            <option value="Services">Services</option>
                                                            <option value="Claims">Claims</option>
                                                            <option value="Renewals">Renewals</option>
                                                            <option value="Griveance/Customer Services">
                                                                Griveance/Customer Services</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!--end col-->
                                                <div class="col-lg-12">
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

                        <input type="hidden" id="module_short_name" name="module_short_name" value="<?=$model_short_name;?>">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body" style="background: #c9ccd029;">
                                    <div id="fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="filterdata">

                                            <?php
                                            $i = 1;
                                            if (!empty($subadminData->result())) {
                                                foreach ($subadminData->result() as $row) {
                                                    $policy_no1 = base64_encode($row->policy_no);
                                                    $policy_no = rtrim($policy_no1, '=');
                                                    $form_remark = $this->Form_model->fetch_verify_data('form_disposition_remark', 'form_id', $row->id);
                                                    if (!empty($form_remark)) {
                                            ?>
                                                        <ul class="nav nav-tabs-custom border-bottom-0 ms-4">

                                                            <?php foreach ($form_remark as $val) {

                                                                $underwriter = '';

                                                                if ($val['done_by_module'] == 'underwriter_verifier') {
                                                                    $underwriter = 'UNDERWRITING';
                                                                }
                                                                if ($val['done_by_module'] == 'operations') {
                                                                    $underwriter = 'OPERATIONS';
                                                                }
                                                                if ($val['done_by_module'] == 'services') {
                                                                    $underwriter = 'SERVICES';
                                                                }
                                                                if ($val['disposition'] == '28') {
                                                                    $underwriter = 'ENFORCED';
                                                                }
                                                                if ($val['disposition'] == '29') {
                                                                    $underwriter = 'REJECTED';
                                                                } ?>
                                                                <li class="nav-item navitem1" style="background: <?php if ($underwriter == 'UNDERWRITING') {
                                                                                                                        echo "#71d7df";
                                                                                                                    } else if ($underwriter == 'OPERATIONS') {
                                                                                                                        echo "#ffbc00";
                                                                                                                    } else if ($underwriter == 'SERVICES') {
                                                                                                                        echo "#ff8100";
                                                                                                                    } elseif ($underwriter == 'ENFORCED') {
                                                                                                                        echo "blue";
                                                                                                                    } elseif ($underwriter == 'REJECTED') {
                                                                                                                        echo "red";
                                                                                                                    } ?>">
                                                                    <a class="nav-link active">
                                                                        <?= $underwriter; ?>
                                                                    </a>
                                                                </li>&nbsp;&nbsp;
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>

                                                    <div class="card border ribbon-box shadow-none" style="border-color: #21252973!important; padding: 0px 4px;">
                                                        <div class="card-body">
                                                            <div class="ribbon ribbon-primary round-shape"><?= $i ?></div>
                                                            <div class="row count_1" style="margin-bottom: -15px;">
                                                                <div class="col-md-12 mb-1" style="display:flex;align-items: center;">

                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">PROPOSER NAME</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row->proposer_name)) { ?>
                                                                                    <?php echo $row->proposer_name; ?>
                                                                                <?php } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">COMPANY NAME</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row->company_name)) { ?>
                                                                                    <?php $id = $row->company_name;
                                                                                    $this->db->select('name');
                                                                                    $this->db->from('company');
                                                                                    $this->db->where('id', $id);
                                                                                    $row1 = $this->db->get()->row();
                                                                                    echo $row1->name;
                                                                                    ?>
                                                                                    
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                }?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">PLAN NAME</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row->product_name)) { ?>
                                                                                    <?php echo $row->product_name; ?>
                                                                                <?php } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">GROSS PREMIUM</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row->gross_premium)) { ?>
                                                                                    <?php echo $row->gross_premium; ?>
                                                                                <?php } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">BOOK DATE</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row->date_of_closure)) { ?>
                                                                                    <?php     $date_of_closure = date("d-m-Y", strtotime($row->date_of_closure));
                                                                                          echo $date_of_closure; ?>
                                                                                <?php } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">POLICY NO</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row->policy_no)) { ?>
                                                                                    <?php echo $row->policy_no; ?>
                                                                                <?php } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">EXPIRY DATE</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row->policy_end_date)) { ?>
                                                                                    <?php   $policy_end = date("d-m-Y", strtotime($row->policy_end_date));
                                                                                            echo $policy_end; ?>
                                                                                <?php } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                     <div class="col-md-1" style="margin-left:-20px;margin-top:-5px;margin-bottom:5px;">
                                                                        <?php $claim_status = $this->Form_model->check_badges('claim', 'policy_no', $row->policy_no); ?>
                                                                        <!-- <button type="button" class=" setsmallbtnsize mb-1">CLAIM INITIATE(<?= $claim_status ?>)</button> -->
                                                                        <?php $gr_status = $this->Form_model->check_badges('grievance', 'policy_no', $row->policy_no); ?>
                                                                        <?php
                                                                        date_default_timezone_set('Asia/Kolkata');
                                                                        $current_date = date('Y-m-d');
                                                                        $start = strtotime($current_date);
                                                                        $end = strtotime($row->policy_end_date);

                                                                        $days_between = (($end - $start) / 86400); ?>
                                                                        <a href="<?= base_url(); ?>claims/view_claims/<?php echo $policy_no; ?>" type="button" class="py-1 px-1 setsmallbtnsize mb-1">CLAIM INITIATE(<?= $claim_status ?>)</a>
                                                                         <a href="<?=base_url()?>griveance_customer_services/griveance_customer_services" type="button" class="py-1 px-1 setsmallbtnsize3 mb-1">GRIEVANCE(<?= $gr_status ?>)</a>
                                                                         <?php
                                                                        if ($days_between < 30 && $days_between > 0) { ?>
                                                                            <button type="button" class="setsmallbtnsize2 mb-1">EXPIRING IN(<?= $days_between ?> Day)</button>
                                                                        <?php }
                                                                        if ($days_between < 0) { ?>
                                                                            <button type="button" class="setsmallbtnsize2 mb-1">EXPIRED(<?= $days_between ?> Ago)</button>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="col-md-1" style="
    											margin-top: -10px;margin-left: 0;">

                                                                        <div class="d-flex gap-2">
                                                                            <a class="btn  " data-toggle="tooltip" title="Edit" href="<?= base_url(); ?>form_listing/subadminedit/<?= $model_short_name ?>/<?php echo $row->id; ?>"><i class="ri-edit-2-line" style=" font-size:20px;"></i></a>
                                                                            <a class="btn  " data-id="4" data-toggle="tooltip" title="View" href="<?= base_url(); ?>form_listing/view_sale/<?php echo $row->id; ?>"><i class="ri-eye-line" style=" font-size:20px;"></i></a>
                                                                            <a class="btn " data-toggle="tooltip" title="Delete">
                                                                                <?php if ($this->rbac->hasPrivilege($model_short_name, 'can_delete')) { ?>
                                                                                    <i class="ri-delete-bin-6-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->id; ?>)" data-toggle="tooltip" data-placement="bottom" style=" font-size:20px;"></i>
                                                                                <?php } ?>
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                            <?php $i++;
                                                }
                                            } ?>
                                        </div>
                                       <!-- pagination start -->
                                         <div class="align-items-center mt-2 row g-3 text-center text-sm-start">
                                            <div class="col-sm">
                                                <div class="text-muted">Showing<span class="fw-semibold"> <?= count($subadminData ->result()) ?> -
                                                        <?= isset($count) ? $count : ''; ?></span> Results
                                                </div>
                                            </div>
                                            <div class="col-sm-auto">
                                                <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                                    <?php $uri = $this->uri->segment(4); ?>

                                                    <?php for ($i = 0; $i < ($count / 10); $i++) { ?>
                                                        <li class="page-item <?php if (($uri == '') && ($i + 1 == 1)) {
                                                                                    echo 'active';
                                                                                } else if ($uri == ($i + 1)) {
                                                                                    echo 'active';
                                                                                } ?>">
                                                            <a href="<?= base_url() ?><?= $short_name; ?>/index/<?= $model_short_name; ?>/<?= $i + 1 ?>" class="page-link" style="<?php if ($uri == '') {
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
                                                            <a href="<?= base_url() ?><?= $short_name; ?>/index/<?= $model_short_name; ?>/<?= $uri + 1 ?>" class="page-link">→</a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- paginaton end -->
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

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<script>
    function datefilter() {
        var total_premium = $('#totalpremium').val();
        var startdate = $('#start_date').val();
        var enddate = $('#end_date').val();
        var sel_disposition = $('#search_by_disp').val();
        var module_short_name = $('#module_short_name').val();
        var select_attribute = $('#select_attribute').val();
        var content = $('#search').val();
      	var nextmonth = $('#next_month').val();
        if ($('#current_date').is(':checked')) {
            var current_date = $('#current_date').val();
        }

        if ($('#current_month').is(':checked')) {
            var current_month = $('#current_month').val();
        }
      	
      	if ($('#next_month').is(':checked')) {
            var next_month = $('#next_month').val();
        }

        $.ajax({
            url: "<?= base_url(); ?>filter/datefilter",
            type: "post",
            data: {
                startdate: startdate,
                enddate: enddate,
                sel_disposition:
                sel_disposition,
                module_short_name: module_short_name,
                current_date: current_date,
                current_month: current_month,
              	next_month:next_month,
                select_attribute:select_attribute,
                content:content

            },
            success: function(response) {
               var rowCount = $('.filterdata').html(response).find('.count_1').length;
                    $('#policy_count').text(rowCount);
                $('.filterdata').html(response);
              let total = sessionStorage.getItem("total_pre");
                    $("#total_premium").text("Total Premium -"+ total);
            }
        })
    }

    function searchdata() {
      var total_premium = $('#totalpremium').val();
        var select_attribute = $('#select_attribute').val();
        var content = $('#search').val();
        var company_name = $('#company_name').val();
        var search_by_disp = $('#search_by_disp').val();
        var startdate = $('#start_date').val();
        var enddate = $('#end_date').val();
      	var next_month = $('#next_month').val();
        var module_short_name = $('#module_short_name').val();
        var date_or_month = '';

        if ($("#current_date").is(':checked')) {
            var current_date = $('#current_date').val();
        } else if ($("#current_month").is(':checked')) {
            var current_month = $('#current_month').val();
        } else if($("#next_month").is(':checked'))
        {
          var next_month = $('#next_month').val();
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
                current_month: current_month,
              	next_month:next_month

            },
            success: function(response) {
				var rowCount = $('.filterdata').html(response).find('.count_1').length;
                $('#policy_count').text(rowCount);
                $('.filterdata').html(response);
                let total = sessionStorage.getItem("total_pre");
                $("#total_premium").text("Total Premium -" + total);
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
                   var rowCount = $('.filterdata').html(response).find('.count_1').length;
                    $('#policy_count').text(rowCount);
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
                   var rowCount = $('.filterdata').html(response).find('.count_1').length;
                    $('#policy_count').text(rowCount);
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
                   var rowCount = $('.filterdata').html(response).find('.count_1').length;
                    $('#policy_count').text(rowCount);
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
                   var rowCount = $('.filterdata').html(response).find('.count_1').length;
                    $('#policy_count').text(rowCount);
                    $('.filterdata').html(response);
                    $('#current_date').attr('checked', true);


                }
            })
        }

    }

</script>


</body>

</html>