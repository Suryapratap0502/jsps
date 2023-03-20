<?php $this->load->view('admin/link');
$short_name = $this->uri->segment(1);
$module_short_name = $this->uri->segment(2);
//$policy_no = $this->uri->segment(3);
$claim_id = "JSPS1234" . mt_rand();
$total_premium = $this->db->query("select sum(total_approve_amt) as totalpremium from claim where flag='0'")->result();
$policy_count = $this->db->query("select count(policy_no) as totalpolicy from claim where flag='0'")->result();

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

    .setsmallbtnsize4 {
        font-size: 8px;
        margin-top: 14px;
        height: 30%;
        padding: 4px;
    }

    .setmodulwid {
        width: 11.11% !important;
    }

    .setsearchinput {
        margin-right: 345px !important;
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
                        <h4 class="mb-sm-0 claim_change_text">Initiated Claim List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active claim_change_text">Initiated Claim List</li>
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
                            <h4 class="card-title mb-0 flex-grow-1 claim_change_text">Initiated Claim List</h4>
                            <form class="app-search d-none d-md-block" style="padding: calc(12px/2) 0;">
                                <div class="position-relative">
                                    <input type="text" class="form-control search setsearchinput" placeholder="Search Policy No , Mobile No , Email Id for claim intimation" value="">
                                    <span class="mdi mdi-magnify search-widget-icon"></span>
                                    <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                                </div>
                            </form>
                            <div class="flex-shrink-0">
                                <?php $sess = $this->session->userdata('pmsadmin');
                                $id = $sess['id'];
                                $role = $sess['role'];
                                $name = $sess['name'];

                                if ($role == 'Master') { ?>
                                    <a href="<?= base_url(); ?>add_form/<?= $model_short_name ?>" type="button" title="Add New Regional Head" class="btn btn-primary waves-effect waves-light"><i class="ri-user-add-line"></i></a>
                                <?php } ?>

                            </div>

                        </div><!-- end card header -->
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            <div class="row">


                                <!--end col-->
                                <div class="col-md-2 col-sm-2">
                                    <div>
                                        <input type="date" class="form-control" name="start_date" id="start_date" onchange="searchdata();" placeholder="Select Start date">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div>
                                        <input type="date" class="form-control" name="end_date" id="end_date" onchange="searchdata();" placeholder="Select End date">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-1">
                                    <div>
                                        <select class="form-control form-select" name="sel_for_filter" id="sel_for_filter" onchange="searchdata();">
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
                                <style>
                                    #com_name {
                                        display: none;
                                    }
                                </style>
                                <!-- Buttons with dropdowns -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <select class="form-select form-select-sm" aria-expanded="false" id="select_attribute" name="select_attribute" onchange="show_input(this.value);">
                                            <option value="" selected>Select Attributes</option>
                                            <option value="by_claim_inti">By Claim Intimation No.</option>
                                            <option value="by_company">By Company</option>
                                            <option value="by_policy_no">By Policy No.</option>
                                            <option value="by_patient">By Patient Name</option>
                                            <option value="by_log_id">By Log ID</option>
                                        </select>
                                        <div id="com_name">
                                            <select class="form-select form-control" id="company_name" onchange="searchdata();">
                                                <option value="" selected>Select Company</option>
                                                <?php if (!empty($company)) {
                                                    foreach ($company as $com) { ?>
                                                        <option value="<?= $com['name'] ?>"><?= $com['name'] ?></option>
                                                <?php  }
                                                } ?>
                                            </select>
                                        </div>
                                        <input type="text" id="sel_search" name="search" class="form-control sel_search" onkeyup="searchdata();" onkeydown="searchdata();" placeholder="Enter Keyword for Search" readonly>

                                    </div>
                                </div>


                            </div>






                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="card-body">
                                    
                                    
                                        <?php date_default_timezone_set('Asia/Kolkata');
                                        $current_date = date('Y-m-d'); ?>

                                        <input type="radio" class="btn-check" name="options-outlined" value="<?= $current_date; ?>" data-date="<?= $current_date; ?>" id="current_date" onClick="filetr_wise_all();">
                                        <label class="btn btn-outline-success" for="current_date">Current Date</label>


                                   

                                   
                                   
                                        <?php date_default_timezone_set('Asia/Kolkata');

                                        $current_month = date('Y-m'); ?>
                                        <input type="radio" class="btn-check" name="options-outlined" value="<?= $current_month; ?>" id="current_month" onClick="filter_wise_all_month();">
                                        <label class="btn btn-outline-success" for="current_month">Current Month</label>

                                   


                                </div>
                            </div>
                            <div class="col-md-4 mt-1">

                                <!-- Soft Buttons -->
                                <!-- Base Buttons -->
                                <!-- Outline Buttons -->

                                <p id="total_premium">Total Premium - <?= $total_premium[0]->totalpremium; ?></p>
                                 <span>Total No. Of Claims - <span id="policy_count">
                                        <?= $policy_count[0]->totalpolicy; ?>
                                    </span></span>




                            </div>
                        </div><br>
                        <input type="hidden" name="module_short_name" id="module_short_name" value="<?= $module_short_name ?>">




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
                                            if (!empty($claim_initiated_list)) {
                                                foreach ($claim_initiated_list as $row) {
													$policy_no1 = base64_encode($row['policy_no']);
													$policy_no = rtrim($policy_no1, '=');
                                                    $form_remark = $this->Form_model->fetch_verify_data('form_disposition_remark', 'form_id', $row['form_id']);

                                                    if (!empty($form_remark)) {
                                            ?>
                                                        <ul class="nav nav-tabs-custom border-bottom-0 ms-4">

                                                            <?php foreach ($form_remark as $val) {
																$dis_name_bages  = $this->Form_model->list_common_where3('disposition', 'id', $val['disposition']);
                                								$show_disp  = $this->Form_model->show_disp('form_disposition_remark','done_by_module',$val['done_by_module'],'form_id',$val['form_id'],);
                                								$count_disp  = $this->Form_model->count_disp('form_disposition_remark','form_id',$val['form_id'],'done_by_module',$val['done_by_module']);
                                                                $underwriter = '';

                                                                if ($val['done_by_module'] == 'underwriter_verifier') {
                                                                    $underwriter = 'UNDERWRITING';
                                                                  $count_disp  = $this->Form_model->count_disp('form_disposition_remark','form_id',$val['form_id'],'done_by_module',$val['done_by_module']);
                                                                }
                                                                if ($val['done_by_module'] == 'operations') {
                                                                    $underwriter = 'OPERATIONS';
                                                                  $count_disp  = $this->Form_model->count_disp('form_disposition_remark','form_id',$val['form_id'],'done_by_module',$val['done_by_module']);
                                                                }
                                                                if ($val['done_by_module'] == 'services') {
                                                                    $underwriter = 'SERVICES';
                                                                  $count_disp  = $this->Form_model->count_disp('form_disposition_remark','form_id',$val['form_id'],'done_by_module',$val['done_by_module']);
                                                                }
                                              					if ($val['done_by_module'] == 'renewals') {
                                                                    $underwriter = 'RENEWALS';
                                                                  $count_disp  = $this->Form_model->count_disp('form_disposition_remark','form_id',$val['form_id'],'done_by_module',$val['done_by_module']);
                                                                }
                                              					
                                                               ?>
                                                                <li class="nav-item navitem1" style="background: <?php if ($underwriter == 'UNDERWRITING') {
                                                                                                                        echo "#71d7df";
                                                                                                                    } else if ($underwriter == 'OPERATIONS') {
                                                                                                                        echo "#ffbc00";
                                                                                                                    } else if ($underwriter == 'SERVICES') {
                                                                                                                        echo "#ff8100";
                                                                                                                    } else if ($underwriter == 'RENEWALS') {
                                                                                                                        echo "blue";
                                                                                                                    }  ?>">
                                                                    <a class="nav-link active">
                                                                        <?= $underwriter; ?> (<span class="curse_poin" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php $i=0; foreach($show_disp as $val){ $show_disp_name = $this->Form_model->list_common_where3('disposition','id',$val['disp_id']); echo '&#10;'. $show_disp_name[0]['disposition'] ;}?>"><?=$count_disp?></span>)

                                                                    </a>
                                                                </li>&nbsp;&nbsp;
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>


                                                    <div class="card border ribbon-box" style="border-color: #21252973!important;">
                                                        <div class="card-body">
                                                            <div class="ribbon ribbon-primary round-shape"><?= $i ?></div>
                                                            <div class="row count_1" style="margin-bottom:-15px;">
                                                                <div class="col-md-12" style="display:flex;align-items: center;">

                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">Patient Name</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['patient_name'])) { ?>
                                                                                    <?php echo $row['patient_name']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">COMPANY NAME</p>
                                                                       <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['company_name'])) {echo $row['company_name'];?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">CLAIM INTIMATION NO.</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['claim_intimation_no'])) { ?>
                                                                                    <?php echo $row['claim_intimation_no']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">POLICY NO</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['policy_no'])) { ?>
                                                                                    <?php echo $row['policy_no']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">CLAIM STATUS</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['claim_status'])) { ?>
                                                                                    <?php echo $row['claim_status']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">TOTAL AMT</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['total_bill_amt'])) { ?>
                                                                                    <?php echo $row['total_bill_amt']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>

                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">CLAIM DATE</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['created_at'])) { ?>
                                                                                    <?php   $claim_date = date("d-m-Y", strtotime($row ['created_at']));
                                                                                        echo $claim_date; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>


                                                                   <div class="col-md-1" style="margin-left:-20px;margin-top:-5px;margin-bottom:5px;">
                                                                        <?php $claim_status = $this->Form_model->check_badges('claim', 'policy_no', $row['policy_no']); ?>
                                                                        <?php $gr_status = $this->Form_model->check_badges('grievance', 'policy_no', $row['policy_no']); ?>
                                                                        <?php
                                                  						
                                                                        date_default_timezone_set('Asia/Kolkata');
                                                                        $current_date = date('Y-m-d');
                                                                        $start = strtotime($current_date);
                                                                        $end = strtotime($row['policy_end_date']);

                                                                        $days_between = (($end - $start) / 86400); ?>
                                                                       <a href="<?=base_url()?>claims/claims" type="button" class="py-1 px-1 setsmallbtnsize mb-1">CLAIM INITIATE(<?= $claim_status ?>)</a>
                                                                         <a href="<?=base_url()?>griveance_customer_services/griveance_customer_services" type="button" class="py-1 px-1 setsmallbtnsize3 mb-1">GRIEVANCE(<?= $gr_status ?>)</a>
                                                                        <?php
                                                                        if ($days_between < 30 && $days_between > 0) { ?>
                                                                            <button type="button" class="setsmallbtnsize2 mb-1">EXPIRING IN(<?= $days_between ?> Day)</button>
                                                                        <?php }
                                                                        if ($days_between < 0) { ?>
                                                                            <button type="button" class="setsmallbtnsize2 mb-1">EXPIRED(<?= $days_between ?> Ago)</button>
                                                                        <?php } ?>
                                                                    </div>
                                                                  
                                                                    <div class="col-md-1" style="margin-top:-12px;margin-left: 0;">

                                                                        <div class="d-flex gap-2" style="width: 150%;">

                                                                           <!-- <a class="btn  " data-id="4" data-toggle="tooltip" title="View" href="<?= base_url(); ?>form_listing/view_sale/<?php echo $row['id']; ?>"><i class="ri-eye-line" style="font-size:20px;"></i></a>-->
                                                                            <a type="button" class="btn btn-primary setsmallbtnsize4 mb-1" data-id="4" data-toggle="tooltip" title="View" href="<?= base_url(); ?>claims/view_claims/<?php echo $policy_no; ?>" style="">View Claim</a>
                                                                          	
                                                                          <!--<a class="btn  " data-toggle="tooltip" title="View Claims"
                                                     href="<?= base_url(); ?>claims/view_claims/<?php echo $row['policy_no']; ?>"><i
                                                      class="ri-file-user-line"
                                                          style=" font-size:20px;"></i></a>-->


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
                                                <div class="text-muted">Showing<span class="fw-semibold"> <?= count($claim_initiated_list) ?> -
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
                                                            <a href="<?= base_url() ?><?= $short_name; ?>/index/<?= $module_short_name; ?>/<?= $i + 1 ?>" class="page-link" style="<?php if ($uri == '') {
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
                                                            <a href="<?= base_url() ?><?= $short_name; ?>/index/<?= $module_short_name; ?>/<?= $uri + 1 ?>" class="page-link">→</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script>
    $('.search').typeahead({
        source: function(query, result) {
            $.ajax({
                url: "<?= base_url() ?>searchforclaim",
                method: "POST",
                data: {
                    query: query
                },
                dataType: "json",
                success: function(data) {
                    console.log(data.length);
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
                url: "<?= base_url('form/get_policy_data_after_search'); ?>",
                type: "post",
                data: {
                    items: items,
                },
                success: function(response) {
                    $('.filterdata').html(response);
                    $('.claim_change_text').text('Initiate Your Claim of ' + item);
                }
            })
        }
    });
</script>

<script>
    function date_filter() {
      var total_premium = $('#totalpremium').val();
        var startdate = $('#start_date').val();
        var enddate = $('#end_date').val();
        var sel_disposition = $('#sel_for_filter').val();
        var module_short_name = $('#module_short_name').val();
        if ($('#current_date').is(':checked')) {
            var current_date = $('#current_date').val();
        }

        if ($('#current_month').is(':checked')) {
            var current_month = $('#current_month').val();
        }

        $.ajax({
            url: "<?= base_url(); ?>filter/claim_date_filter",
            type: "post",
            data: {
                startdate: startdate,
                enddate: enddate,
                sel_disposition:
                sel_disposition,
                module_short_name: module_short_name,
                current_date: current_date,
                current_month: current_month
            },
            success: function(response) {
               var rowCount = $('.filterdata').html(response).find('.count_1').length;
                $('#policy_count').text(rowCount);
                $('.filterdata').html(response);
                $('#current_date').attr('checked', true);
                let total = sessionStorage.getItem("total_pre");
                $("#total_premium").text("Total Premium -" + total);
            }
        })
    }

    function filetr_wise_all() {
   		var total_premium = $('#totalpremium').val();
        var sel_disp = $('#sel_for_filter').val();
        var module_short_name = $('#module_short_name').val();
        if ($('#current_date').is(':checked')) {

            var current_date = $('#current_date').val();

            $.ajax({
                method: 'post',
                url: "<?= base_url('filter/current_date_filter_claim_page'); ?>",
                data: {
                    sel_disp: sel_disp,
                    current_date: current_date,
                    module_short_name: module_short_name
                },
                success: function(response) {
                    var rowCount = $('.filterdata').html(response).find('.count_1').length;
                    $('#policy_count').text(rowCount);
                    $('.filterdata').html(response);
                    $('#current_date').attr('checked', true);
					let total = sessionStorage.getItem("total_pre");
                    $("#total_premium").text("Total Premium -"+ total);


                }
            })
        } else {
            var current_month = $('#current_month').val();
            $.ajax({
                method: 'post',
                url: "<?= base_url('filter/current_date_filter_claim_page'); ?>",
                data: {
                    sel_disp: sel_disp,
                    current_month: current_month,
                    module_short_name: module_short_name
                },
                success: function(response) {
                   var rowCount = $('.filterdata').html(response).find('.count_1').length;
                    $('#policy_count').text(rowCount);
                    $('.filterdata').html(response);
                    $('#current_month').attr('checked', true);
					let total = sessionStorage.getItem("total_pre");
                    $("#total_premium").text("Total Premium -"+ total);

                }
            })

        }
    }


    

    function filter_wise_all_month() {
   		var total_premium = $('#totalpremium').val();
        var sel_disp = $('#sel_for_filter').val();
        var module_short_name = $('#module_short_name').val();
        if ($('#current_month').is(':checked')) {
            var current_month = $('#current_month').val();
            $.ajax({
                method: 'post',
                url: "<?= base_url('filter/current_date_filter_claim_page'); ?>",
                data: {
                    sel_disp: sel_disp,

                    current_month: current_month,
                    module_short_name: module_short_name
                },
                success: function(response) {
                   var rowCount = $('.filterdata').html(response).find('.count_1').length;
                    $('#policy_count').text(rowCount);
                    $('.filterdata').html(response);
                    $('#current_month').attr('checked', true);
					let total = sessionStorage.getItem("total_pre");
                    $("#total_premium").text("Total Premium -"+ total);

                }
            })
        } else {
            var current_date = $('#current_date').val();
            $.ajax({
                method: 'post',
                url: "<?= base_url('filter/current_date_filter_claim_page'); ?>",
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
					let total = sessionStorage.getItem("total_pre");
                    $("#total_premium").text("Total Premium -"+ total);

                }
            })
        }
    }

    function show_input(val) {
        if (val == 'by_company') {
            $("#com_name").css("display", 'block');
            $("#sel_search").css("display", 'none');
        } else {
            $("#com_name").css("display", 'none');
            $("#sel_search").css("display", 'block');
        }
        if ($("select[name='select_attribute']").selectedIndex == 0 || val == '') {
            $("#sel_search").prop("readonly", true);
        } else {
            $("#sel_search").prop("readonly", false);
        }


    }

    function searchdata() {
       var total_premium = $('#totalpremium').val();
        var select_attribute = $('#select_attribute').val();
        var content = $('#sel_search').val();
        var company_name = $('#company_name').val();
        var search_by_disp = $('#sel_for_filter').val();
        var startdate = $('#start_date').val();
        var enddate = $('#end_date').val();
        var date_or_month = '';
        var module_short_name = $('#module_short_name').val();

        if ($("#current_date").is(':checked')) {
            var current_date = $('#current_date').val();
        } else if ($("#current_month").is(':checked')) {
            var current_month = $('#current_month').val();
        }
        $.ajax({
            url: "<?= base_url('filter/searchdata_claim_page'); ?>",
            type: "post",
            data: {
                content: content,
                select_attribute: select_attribute,
                company_name: company_name,
                startdate: startdate,
                enddate: enddate,
                search_by_disp: search_by_disp,
                current_date: current_date,
                current_month: current_month,
                module_short_name: module_short_name

            },
            success: function(response) {

                var rowCount = $('.filterdata').html(response).find('.count_1').length;
                $('#policy_count').text(rowCount);
                $('.filterdata').html(response);
                $('#current_date').attr('checked', true);
                let total = sessionStorage.getItem("total_pre");
                $("#total_premium").text("Total Premium -" + total);
            }
        })
    }
</script>

</body>

</html>