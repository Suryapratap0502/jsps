<?php $this->load->view('admin/link');

$model_short_name = $this->uri->segment(1);
$policy_no2 = base64_encode($policy_no);
$policy_no1 = rtrim($policy_no2, '=');
$claim_id = "JSPS" . $policy_no . mt_rand();
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
        font-size: 12px;
    }

    .seth5 {
        font-size: 12px;
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
                        <h4 class="mb-sm-0">All Claims Regarding - <?= $policy_no ?></h4>
						
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
                    <div class="card" style="background: #c9ccd029;">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">All Claims list of <u> <?= $policy_no ?> </u> Policy Number</h4>

                            <div class="flex-shrink-0">
                                <a href="<?= base_url(); ?>initiate_claim/<?= $policy_no1 ?>" type="button" class="btn btn-primary waves-effect waves-light">Initiate New Claim</a>
                            </div>

                        </div><!-- end card header -->

                        <div class="modal zoomIn fade" id="add_new_initiate" tabindex="-1" aria-labelledby="add_new_initiate" aria-modal="true">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalgridLabel">Initiate New Claim for <?= $policy_no; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>

                                    <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>
                                        </div>

                                        <form method="POST" id="initiate_new_claim">
                                            <div class="row g-3">
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="firstName" class="form-label">Policy Number</label>
                                                        <input type="text" class="form-control" name="policy_number" id="policy_number" value="<?= $policy_no?>" placeholder="Enter Policy" readonly>
                                                    </div>
                                                    <div class="error" id="policynumError"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="firstName" class="form-label">Subject</label>
                                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Enter Subject">
                                                    </div>
                                                    <div class="error" id="policynumError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="firstName" class="form-label">Patient Name</label>
                                                        <input type="text" class="form-control" name="patient_name" id="patient_name" placeholder="Enter Patient Name">
                                                    </div>
                                                    <div class="error" id="policynumError"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="exampleInputno" class="form-label">Company Name
                                                            <span class="setredcolor">*</span></label>
                                                        <select class="form-select form-control" aria-label=".form-select-sm example" name="company_name" id="company_name">
                                                            <option selected>Select Company</option>
                                                            <?php foreach ($company as $data) {
                                                            ?>
                                                                <option value="<?= $data['id']; ?>"><?= $data['name'] ?></option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                    <div class="error" id="policynumError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="firstName" class="form-label">Claim Intimation No.</label>
                                                        <input type="text" class="form-control" name="claim_intimation_no" id="claim_intimation_no" placeholder="Enter Claim Initiation No.">
                                                    </div>
                                                    <div class="error" id="policynumError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Reason for Admit</label>
                                                        <input type="text" class="form-control" name="reason_admit" id="reason_admit" placeholder="Enter Reason for admit">
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>
                                                <!--end col-->


                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Health Card</label>
                                                        <input type="text" class="form-control" name="health_card" id="health_card" placeholder="Enter Health Card Details">
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Admission Date</label>
                                                        <input type="date" class="form-control" name="admission_date" id="admission_date" placeholder="Enter Admission Date">
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Network / Non Newtork</label>
                                                        <select class="form-control form-select" name="is_network" id="is_network">
                                                            <option value="">Select Network / Non Newtork</option>
                                                            <option value="network">Network</option>
                                                            <option value="non_network">Non Network</option>
                                                        </select>
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Claim Type</label>
                                                        <select class="form-control form-select" name="claim_type" id="claim_type">
                                                            <option value="">Select Claim Type</option>
                                                            <option value="reimbursement">Reimbursement</option>
                                                            <option value="cahless">Cahless</option>
                                                        </select>
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Claim for</label>
                                                        <select class="form-control form-select" name="claim_for" id="claim_for">
                                                            <option value="">Select Claim Reason</option>
                                                            <option value="Main Hospitalisation">Main Hospitalisation</option>
                                                            <option value="Pre & Post">Pre & Post</option>
                                                            <option value="Travel Claim">Travel Claim</option>
                                                            <option value="OPD">OPD</option>
                                                            <option value="Travel Claim">Travel Claim</option>
                                                            <option value="Health+ Check-Up">Health+ Check-Up</option>
                                                            <option value="Main Hospitalization">Main Hospitalization</option>

                                                            <option value="Hospital Cash">Hospital Cash</option>
                                                            <option value="Individual Death claim">Individual Death claim</option>
                                                            <option value="Post Hospitalization">Post Hospitalization</option>
                                                            <option value="Pre Hospitalization">Pre Hospitalization</option>
                                                            <option value="Home Quarantine">Home Quarantine</option>
                                                            <option value="Naturopathy">Naturopathy</option>
                                                            <option value="Ayurvedic">Ayurvedic</option>

                                                            <option value="Share Accomodation">Share Accomodation</option>
                                                            <option value="Daily Cash Benefit">Daily Cash Benefit</option>
                                                            <option value="Pre Hospitalization(Daily Cash)">Pre Hospitalization(Daily Cash)</option>
                                                            <option value="Pre-Post (Daily cash)">Pre-Post (Daily cash)</option>
                                                            <option value="Dental OPD">Dental OPD</option>
                                                            <option value="Hospital Daily Cash">Hospital Daily Cash</option>
                                                            <option value="Hospital Cash Benifit">Hospital Cash Benifit</option>
                                                            <option value="Health checkup">Health checkup</option>




                                                        </select>
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Pre Auth Status</label>
                                                        <select class="form-control form-select" name="pre_auth_status" id="pre_auth_status">
                                                            <option value="">Select Pre Auth Status</option>
                                                            <option value="denied">Denied</option>
                                                            <option value="approved">Approved</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="in_progress">In Progress</option>
                                                            <option value="rejected">Rejected</option>
                                                        </select>
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>


                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Pre Auth Amount</label>
                                                        <input type="number" class="form-control" name="pre_auth_amt" id="pre_auth_amt" placeholder="Enter Pre Auth Amount">
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Claim Status</label>
                                                        <select class="form-control form-select" name="claim_status" id="claim_status">
                                                            <option value="">Select Claim Status</option>
                                                            <option value="Rejected">Rejected</option>
                                                            <option value="Approved">Approved</option>
                                                            <option value="Ask for Reimbursement">Ask for Reimbursement</option>
                                                            <option value="Pending">Pending</option>

                                                            <option value="Under Query">Under Query</option>
                                                            <option value="In Progress">In Progress</option>
                                                            <option value="Withdrawn">Withdrawn</option>

                                                        </select>
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Total Bill Amount </label>
                                                        <input type="number" class="form-control" name="total_bill_amt" id="total_bill_amt" placeholder="Enter Total Bill Amount">
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Total Approve Amount </label>
                                                        <input type="number" class="form-control" name="total_approve_amt" id="total_approve_amt" placeholder="Enter Total Approve Amount">
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Hospital Discount</label>
                                                        <input type="number" class="form-control" name="hospital_discount" id="hospital_discount" placeholder="Enter Hospital Discount">
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Deduction Amount</label>
                                                        <input type="number" class="form-control" name="deduction_amt" id="deduction_amt" placeholder="Enter Disuction Amount">
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Deduction Amount Details</label>
                                                        <textarea class="form-control" name="deduction_amt_details" id="deduction_amt_details" placeholder="Enter Disuction Amount Details"></textarea>
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Customer Remarks</label>
                                                        <textarea class="form-control" name="customer_remarks" id="customer_remarks" placeholder="Enter Customer Remarks"></textarea>
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Paid On</label>
                                                        <input type="date" class="form-control" name="paid_on" id="paid_on" placeholder="Enter Disuction Amount Details">
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Final Status</label>
                                                        <select class="form-control form-select" name="final_status" id="final_status">
                                                            <option value="">Select Fianl Status</option>
                                                            <option value="paid">Paid</option>
                                                            <option value="rejected">Rejected</option>


                                                        </select>
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <label for="lastName" class="form-label">Remarks</label>
                                                        <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks"></textarea>
                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>
                                                <input type="hidden" name="module_name" id="module_name" value="<?= $model_short_name ?>">

                                                <div class="col-xxl-5">
                                                    <div>
                                                        <label for="exampleInputno" class="form-label"> Documents Title </label>
                                                        <input type="text" class="form-control mb-1" name="title[]" id="image" aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>
                                                <div class="col-xxl-5">
                                                    <div>
                                                        <label for="exampleInputno" class="form-label">Upload Documents </label>
                                                        <input type="file" class="form-control mb-1" name="image[]" id="image" aria-describedby="emailHelp">

                                                    </div>
                                                    <div class="error" id="descriptionError"></div>
                                                </div>
                                                <div class="col-md-2" style="text-align: left;">
                                                    <a onclick="add()" style="cursor: pointer;color:blue;"><i class="ri-add-circle-line"></i></a>
                                                    <a onclick="remove()" style="cursor: pointer;color:red;"><i class="ri-close-circle-line"></i></a>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <div id="new_chq"></div>
                                                </div>
                                                <input type="hidden" value="1" id="total_chq">

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

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div id="fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php
                                                $i = 1;
                                                if (!empty($claim_list)) {
                                                    foreach ($claim_list as $row) { 
                                                ?>
                                                        <div class="card border " style="border-color: #21252973!important;">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                        <div class="col-md-12" style="display:flex;">

                                                                            <div class="col-md-2">
                                                                                <p class="setpara mb-1">CLAIM ID</p>
                                                                                <h5 class="seth5"><b>
                                                                                        <a href="<?= base_url() ?>claims/claim_details/<?= $row['claim_intimation_no']; ?>"> <?php if (!empty($row['claim_intimation_no'])) { ?>
                                                                                                <?php echo $row['claim_intimation_no']; ?>
                                                                                            <?php } ?>
                                                                                        </a></b></h5>
                                                                            </div>
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
                                                                        <p class="setpara mb-1">Reason for Admit</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['reason_admit'])) { ?>
                                                                                    <?php echo $row['reason_admit']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                            <div class="col-md-2">
                                                                                <p class="setpara mb-1">POLICY NO</p>
                                                                                <h5 class="seth5"><b>
                                                                                        <?php if (!empty($row['policy_no'])) { ?>
                                                                                            <?php echo $row['policy_no']; ?>
                                                                                        <?php } ?>
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
                                                                                    <?php echo $row['created_at']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>


                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <p class="setpara mb-1">Description</p>
                                                                            <p class="setpara"><b>
                                                                                    <?php if (!empty($row['remarks'])) { ?>
                                                                                        <?php echo $row['remarks']; ?>
                                                                                    <?php } ?>
                                                                                </b></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="margin:auto;">
                                                                        <div class="col-md-2" style="margin-left: 120px;margin-top: -30px;">

                                                                            <div class="d-flex gap-2 mt-1">
                                                                                <a class="btn btn-sm " href="<?= base_url(); ?>claims/showclaimdetails/<?= $row['id']; ?>"><i class="ri-edit-box-line" data-toggle="tooltip" data-placement="bottom" title="Edit Claim" style="font-size: 15px; color:blue;"></i></a>
                                                                                
                                                                                <a class="btn btn-sm "><i class="ri-phone-line" data-toggle="tooltip" data-placement="bottom" title="Add Call Reminder" data-bs-toggle="modal" data-bs-target="#add_reminder" data-placement="bottom" title="Claim Passed" style="font-size: 15px; color:blue;"></i></a>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                <?php $i++;
                                                    } } ?>
                                            </div>
                                            

                                        </div>
                                    </div>

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

<div class="modal fade" id="add_reminder" tabindex="-1" aria-labelledby="add_reminder" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalgridLabel">Add Reminder</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <div id="success">
                    <div id="error">
                    </div>
                </div>
                <form method="POST" id="add_call_reminder">
                    <div class="row g-3">
                        <!--end col-->

                        <div class="col-xxl-4">
                            <label for="exampleInputEmail1" class="form-label">Call Reminder </label>
                            <select class="form-select form-control" name="sel_scheduled">
                                <option>Select Scheduled Call</option>
                                <?php if (!empty($scheduled_call)) {
                                    foreach ($scheduled_call as $value) { ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['call_remark'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-xxl-4">
                            <label for="exampleInputEmail1" class="form-label">Date & Time </label>
                            <input type="datetime-local" class="form-control mb-1" name="reminder_date" id="reminder_date" aria-describedby="emailHelp">
                        </div>
                        <div class="col-xxl-4">
                            <label for="exampleInputEmail1" class="form-label">Reminder Remark </label>
                            <textarea type="text" class="form-control mb-1" name="reminder_remark" id="reminder_remark" aria-describedby="emailHelp"></textarea>
                        </div>

                        <input type="hidden" name="module_name" id="module_name" value="<?= $model_short_name ?>">

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


<!-- End Page-content -->


<!-- pass -->

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

<script>
    //  add modal
    $(document).on('submit', '#initiate_new_claim', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);

        var error = false;
        if (error == false) {
            $.ajax({
                url: "<?= base_url('Claims/add_initiate_claim'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                        swal('Claim Initiated Done 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                        swal('Something Went Wrong ☹️', ' ', 'success');

                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);

                    }


                },
                cache: false,
                contentType: false,
                processData: false,
            })

        }

    })


    $(document).on('submit', '#add_call_reminder', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);

        var error = false;
        if (error == false) {
            $.ajax({
                url: "<?= base_url('Claims/add_reminder'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                        swal('Reminder Added 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                        swal('Something Went Wrong ☹️', ' ', 'error');

                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function add() {

        var new_chq_no = parseInt($('#total_chq').val()) + 1;
        var new_input = "<div class='row'  id='new_" + new_chq_no + "'> <div class='col-xxl-5'> <div><input type='text' class='form-control mb-1' name='title[]' id='title' aria-describedby='emailHelp' placeholder='Document Title'></div></div> <div class='col-xxl-5'><input type='file' class='form-control mb-1' name='image[]' id='image' aria-describedby='emailHelp'></div>";
        $('#new_chq').append(new_input);
        $('#total_chq').val(new_chq_no)
    }

    function remove() {
        var last_chq_no = $('#total_chq').val();
        if (last_chq_no > 1) {
            $('#new_' + last_chq_no).remove();
            $('#total_chq').val(last_chq_no - 1);
        }
    }
</script>

<script>
    function changestatus(id, status) {
        swal({
                title: "Are you sure?",
                text: "Update Claim as " + status,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, " + status + " Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>form/changestatus",
                        type: 'post',
                        data: {
                            id: id,
                            status: status
                        },
                        success: function(result) {
                            var dataResult = JSON.parse(result);
                            if (dataResult.done == '1') {
                                swal('Claim updated as ' + status + ' 🙂', ' ', 'success');

                                setTimeout(function() {
                                    location.reload(true);
                                }, 1000);

                            }

                        },

                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }
            }
        )
    }
</script>
</body>

</html>