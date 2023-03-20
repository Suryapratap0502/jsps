<?php $this->load->view('admin/link');

$model_short_name = $this->uri->segment(1);
//$policy_no = $this->uri->segment(3);
//$claim_id = "JSPS" .$policy_no. mt_rand();
$policy_no = base64_encode($claim_details[0]['policy_no']);
$base_p = rtrim($policy_no, '=');
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
	.setredcolor {
   	 color: red;
  	}
    label {
        text-transform: uppercase;
    }

    .setcalc {
        width: 16.66 !important;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 0.2rem 0.6rem !important;
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
                        <h4 class="mb-sm-0">EDIT INITIATE CLAIMS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Edit Initiate Claims</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Edit Initiate Claims list of <u> <?= $claim_details[0]['policy_no'] ?> </u> Policy Number</h4>
                        </div><!-- end card header -->

                        <!-- <div class="modal fade" id="exampleModalgrid" tabindex="-1"
                            aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalgridLabel">Add New Form </h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>

                                    </div> -->


                        <div class="modal-body">
                            <div id="success">
                                <div id="error">
                                </div>
                            </div>

                            <form method="POST" id="editclaim">
                                <input type="hidden" id="id" class="form-control" name="claim_id" value="<?= $claim_details[0]['id'] ?>">
                                <div class="row g-3">
                                    <div class="col-md-12 ">
                                        <h5 class="mb-3"><b>CLAIM DETAILS</b></h5>
                                        <div class="row">
                                            <div class="col-md-2 setcalc">
                                                <div>
                                                    <label for="firstName" class="form-label">Policy Number</label>
                                                    <input type="text" class="form-control" name="policy_number" id="policy_number" value="<?= $claim_details[0]['policy_no'] ?>" placeholder="Enter Policy" readonly>
                                                </div>
                                                <div class="error" id="policynumError"></div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div>
                                                    <label for="firstName" class="form-label">Patient Name<span class="setredcolor">*</span></label>
                                                    <input type="text" class="form-control" name="patient_name" id="patient_name" placeholder="Enter Patient Name" value="<?= $claim_details[0]['patient_name'] ?>">
                                                </div>
                                               <div class="patienterror" id="patientError"></div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div>
                                                    <label for="exampleInputno" class="form-label">Company Name
                                                        <span class="setredcolor"></span></label>
                                                    <input type="text" class=" form-control" name="company_name" id="company_name" value="<?= $claim_details[0]['company_name'] ?>" readonly>
                                                </div>
                                                <div class="error" id="policynumError"></div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div>
                                                    <label for="firstName" class="form-label">Claim Intimation No
                                                        .<span class="setredcolor">*</span></label>
                                                    <input type="text" class="form-control" name="claim_intimation_no" id="claim_intimation_no" placeholder="Enter Claim Initiation No." onkeyup="validateCode();" onkeydown="validateCode();" value="<?= $claim_details[0]['claim_intimation_no'] ?>">
                                                    <div class="error" id="claim_init_error"></div>
                                                </div>
                                               <div class="claim_intimation_noerror" id="claim_intimation_noError"></div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div>
                                                    <label for="lastName" class="form-label">Reason for
                                                        Admit</label>
                                                    <input type="text" class="form-control" name="reason_admit" id="reason_admit" placeholder="Enter Reason for admit" value="<?= $claim_details[0]['reason_admit'] ?>">
                                                </div>
                                                <div class="error" id="descriptionError"></div>
                                            </div>
                                            <!--</div>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <div class="row">-->
                                            <div class="col-md-2 setcalc">
                                                <label for="lastName" class="form-label">Health Card</label>
                                                <input type="text" class="form-control" name="health_card" id="health_card" placeholder="Enter Health Card Details" value="<?= $claim_details[0]['health_card'] ?>">
                                                <div class="error" id="descriptionError"></div>
                                            </div>
                                            <div class="col-md-2 setcalc mt-3">
                                                <label for="lastName" class="form-label">Admission Date<span class="setredcolor">*</span></label>
                                                <input type="date" class="form-control" name="admission_date" id="admission_date" placeholder="Enter Admission Date" value="<?= $claim_details[0]['admission_date'] ?>">
                                                <div class="admission_dateerror" id="admission_dateError"></div>
                                            </div>

                                            <div class="col-md-2 setcalc mt-3">
                                                <label for="lastName" class="form-label">Network / Non
                                                    Newtork</label>
                                                <select class="form-control form-select" name="is_network" id="is_network">
                                                    <option value="<?= $claim_details[0]['is_network'] ?>"><?= $claim_details[0]['is_network'] ?></option>
                                                    <option value="network">Network</option>
                                                    <option value="non_network">Non Network</option>
                                                </select>
                                                <div class="error" id="descriptionError"></div>
                                            </div>

                                            <div class="col-md-2 setcalc mt-3">
                                                <label for="lastName" class="form-label">Claim Type<span class="setredcolor">*</span></label>
                                                <select class="form-control form-select" name="claim_type" id="claim_type" onchange="hide_pre(this.value);">
                                                    <option value="<?= $claim_details[0]['claim_type'] ?>"><?= $claim_details[0]['claim_type'] ?></option>
                                                    <option value="reimbursement">Reimbursement</option>
                                                    <option value="cashless">Cashless</option>
                                                </select>
                                                <div class="claim_typeerror" id="claim_typeError"></div>
                                            </div>
                                            <div class="col-md-2 setcalc mt-3">
                                                <label for="lastName" class="form-label">Claim for</label>
                                                <select class="form-control form-select" name="claim_for" id="claim_for">
                                                    <option value="<?= $claim_details[0]['claim_for'] ?>"><?= $claim_details[0]['claim_for'] ?></option>
                                                    <option value="Main Hospitalisation">Main Hospitalisation
                                                    </option>
                                                    <option value="Pre & Post">Pre & Post</option>
                                                    <option value="Travel Claim">Travel Claim</option>
                                                    <option value="OPD">OPD</option>
                                                    <option value="Travel Claim">Travel Claim</option>
                                                    <option value="Health+ Check-Up">Health+ Check-Up</option>
                                                    <option value="Main Hospitalization">Main Hospitalization
                                                    </option>

                                                    <option value="Hospital Cash">Hospital Cash</option>
                                                    <option value="Individual Death claim">Individual Death
                                                        claim</option>
                                                    <option value="Post Hospitalization">Post Hospitalization
                                                    </option>
                                                    <option value="Pre Hospitalization">Pre Hospitalization
                                                    </option>
                                                    <option value="Home Quarantine">Home Quarantine</option>
                                                    <option value="Naturopathy">Naturopathy</option>
                                                    <option value="Ayurvedic">Ayurvedic</option>

                                                    <option value="Share Accomodation">Share Accomodation
                                                    </option>
                                                    <option value="Daily Cash Benefit">Daily Cash Benefit
                                                    </option>
                                                    <option value="Pre Hospitalization(Daily Cash)">Pre
                                                        Hospitalization(Daily Cash)</option>
                                                    <option value="Pre-Post (Daily cash)">Pre-Post (Daily cash)
                                                    </option>
                                                    <option value="Dental OPD">Dental OPD</option>
                                                    <option value="Hospital Daily Cash">Hospital Daily Cash
                                                    </option>
                                                    <option value="Hospital Cash Benifit">Hospital Cash Benifit
                                                    </option>
                                                    <option value="Health checkup">Health checkup</option>




                                                </select>
                                                <div class="error" id="descriptionError"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="col-md-12" id="hidepreauth">
                                        <h5 class="mb-3" style="margin-top: -1rem;"><b>PRE AUTH STATUS</b></h5>
                                        <div class="row">
                                            <div class="col-md-2 setcalc">
                                                <div>
                                                    <label for="lastName" class="form-label">Pre Auth Status</label>
                                                    <select class="form-control form-select" name="pre_auth_status" id="pre_auth_status" onchange="show_denied(this.value);">
                                                        <option value="<?= $claim_details[0]['pre_auth_status'] ?>"><?= $claim_details[0]['pre_auth_status'] ?></option>
                                                        <option value="denied">Denied</option>
                                                        <option value="approved">Approved</option>
                                                        <option value="pending">Pending</option>
                                                        <option value="in_progress">In Progress</option>
                                                        <option value="rejected">Rejected</option>
                                                    </select>
                                                </div>
                                                <div class="error" id="descriptionError"></div>
                                            </div>


                                            <div class="col-md-2 setcalc" id="pre_amount">
                                                <div>
                                                    <label for="lastName" class="form-label">Pre Auth Amount</label>
                                                    <input type="number" class="form-control" name="pre_auth_amt" id="pre_auth_amt" placeholder="Enter Pre Auth Amount" value="<?= $claim_details[0]['pre_auth_amt'] ?>">
                                                </div>
                                                <div class="error" id="descriptionError"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="hidepreauth">

                                    <div class="col-md-12 ">
                                        <h5 class="mb-3" style="margin-top: -1rem;"><b>CLAIM SETTLEMENT DETAILS</b></h5>
                                        <div class="row">
                                            <div class="col-md-2 setcalc">
                                                <div>
                                                    <label for="lastName" class="form-label">Claim Status</label>
                                                    <select class="form-control form-select" name="claim_status" id="claim_status" onchange="show_claim(this.value);">
                                                        <option value="<?= $claim_details[0]['claim_status'] ?>"><?= $claim_details[0]['claim_status'] ?></option>
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
                                                <div class="claim_statuserror" id="claim_statusError"></div>
                                            </div>
                                            <div class="col-md-2 setcalc" id="hide_amount">
                                                <div>
                                                    <label for="lastName" class="form-label">Total Bill Amount
                                                    </label>
                                                    <input type="number" class="form-control" name="total_bill_amt" id="total_bill_amt" placeholder="Enter Total Bill Amount" value="<?= $claim_details[0]['total_bill_amt'] ?>">
                                                </div>
                                                <div class="total_bill_amterror" id="total_bill_amtError"></div>
                                            </div>

                                            <div class="col-md-2 setcalc" id="hide_totalamount">
                                                <div>
                                                    <label for="lastName" class="form-label">Total Approve Amount
                                                    </label>
                                                    <input type="number" class="form-control" name="total_approve_amt" id="total_approve_amt" placeholder="Enter Total Approve Amount" value="<?= $claim_details[0]['total_approve_amt'] ?>">
                                                </div>
                                                 <div class="total_approve_amterror" id="total_approve_amtError"></div>
                                            </div>

                                            <div class="col-md-2 setcalc" id="hospital">
                                                <div>
                                                    <label for="lastName" class="form-label">Hospital
                                                        Discount</label>
                                                    <input type="number" class="form-control" name="hospital_discount" id="hospital_discount" placeholder="Enter Hospital Discount" value="<?= $claim_details[0]['hospital_discount'] ?>">
                                                </div>
                                               <div class="hospital_discounterror" id="hospital_discountError"></div>
                                            </div>

                                            <div class="col-md-2 setcalc" id="paid_date">
                                                <div>
                                                    <label for="lastName" class="form-label">Paid On Date</label>
                                                    <input type="date" class="form-control" name="paid_on" id="paid_on" placeholder="Enter Disuction Amount Details" value="<?= $claim_details[0]['paid_on'] ?>">
                                                </div>
                                                <div class="paid_onerror" id="paid_onError"></div>
                                            </div>
                                            <div class="col-md-2 setcalc" id="final_status_1" style="margin-top:15px;">
                                                <div>
                                                    <label for="lastName" class="form-label">Final Status</label>
                                                    <select class="form-control form-select" name="final_status" id="final_status">
                                                        <option value="<?= $claim_details[0]['final_status'] ?>"><?= $claim_details[0]['final_status'] ?></option>
                                                        <option value="paid">Paid</option>
                                                        <option value="rejected">Rejected</option>
														<option value="Pending">Pending</option>
        												<option value="Claim Withdraw">Claim Withdraw</option>
                                                        <option value="Ask for Reimbursement">Ask for Reimbursement</option>

                                                    </select>
                                                   <div class="final_statuserror" id="final_statusError"></div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-2 setcalc mt-3" id="deduct_amount">
                                                <div>
                                                    <label for="lastName" class="form-label">Deduction
                                                        Amount</label>
                                                    <input type="number" class="form-control" name="deduction_amt" id="deduction_amt" placeholder="Enter Deduction Amount" value="<?= $claim_details[0]['deduction_amt'] ?>">
                                                </div>
                                                <div class="deduction_amterror" id="deduction_amtError"></div>
                                            </div>
                                            <div class="col-md-2 setcalc mt-3" id="deduct_detail">
                                                <div>
                                                    <label for="lastName" class="form-label">Deduction
                                                        Details</label>
                                                    <textarea type="text" class="form-control" name="deduction_amt_details" id="deduction_amt_details" placeholder="Enter Deduction Details"><?= $claim_details[0]['deduction_amt_details'] ?></textarea>
                                                </div>
                                               <div class="deduction_amt_detailserror" id="deduction_amt_detailsError"></div>
                                            </div>


                                            <div class="col-md-4 mt-3" style="width: 40%;">
                                                <div>
                                                    <label for="lastName" class="form-label">Remarks</label>
                                                    <textarea class="form-control" name="remarks" id="remarks" placeholder="Enter Remarks"><?= $claim_details[0]['remarks'] ?></textarea>
                                                </div>
                                                <div class="remarkserror" id="remarksError"></div>
                                            </div>
                                            <!--<div class="col-md-2 setcalc">
                                                            <div>
                                                                <label for="lastName" class="form-label">Customer
                                                                    Remarks</label>
                                                                <textarea class="form-control" name="customer_remarks"
                                                                    id="customer_remarks"
                                                                    placeholder="Enter Customer Remarks"></textarea>
                                                            </div>
                                                            <div class="error" id="descriptionError"></div>
                                                        </div>

                                                        <div class="col-md-2 setcalc">
                                                            <div>
                                                                <label for="firstName" class="form-label">Subject</label>
                                                                <input type="text" class="form-control" name="subject"
                                                                    id="subject" placeholder="Enter Subject">
                                                            </div>
                                                            <div class="error" id="policynumError"></div>
                                                        </div>-->
                                        </div>
                                    </div>
                                    <hr>
                                    <!--end col-->

                                    <div class="col-md-12 ">
                                                    <h5 class="mb-3" style="margin-top: -1rem;"><b>UPLOAD DOCUMENT</b></h5>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <input type="hidden" name="module_name" id="module_name"
                                                            value="<?=$model_short_name?>">
            
                                                        </div>

                                                    </div>
                                                </div>
                                              <div class="col-md-12">
                                                      <div class="row mb-3">
                                                          <div class="col-md-6">
                                                              <table class="table table-bordered table-prescription">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>Document Title</th>
                                                                          <th>File</th>
                                                                          <th>Delete</th>
                                                                      </tr>
                                                                  </thead>

                                                                  <tbody>
                                                                      <tr class="prescription-row" id="presc_0">

                                                                          <td>
																			<select class="form-control form-select" id="doc_label" name="doc_label[]"> 

                                                                           <option value="" selected>Select</option>
                                                                           <option value="Approval">Approval</option>
                                                                           <option value="Re Consideration">Re Consideration</option>
                                                                           <option value="Rejection Latter">Rejection Latter</option>
                                                                           <option value="Pre Auth Approval">Pre Auth Approval</option>
                                                                           </select>                                                                          
                                                                        </td>
                                                                         <td>
                                                                              <input type="file" class='form-control search' placeholder="Choose file" name="doc_image[]" id="doc_image">
                                                                          </td>
                                                                          <td><a class="delete-row btn-sm btn-danger" style="cursor: pointer;">Delete</a></td>
                                                                      </tr>
                                                                  </tbody>
                                                                  <tfoot>
                                                                      <tr>
                                                                          <td><a class="add-new btn-sm btn-success" style="cursor: pointer;">Add More</a></td>
                                                                      </tr>
                                                                  </tfoot>
                                                              </table>
                                                          </div>
                                                      </div>
                                                    </div>



                                    <!--<input type="hidden" name="module_name" id="module_name"
                                                            value="<?= $model_short_name ?>">

                                                        <div class="col-xxl-5">
                                                            <div>
                                                                <label for="exampleInputno" class="form-label"> Documents Title
                                                                </label>
                                                                <input type="text" class="form-control mb-1" name="title[]"
                                                                    id="image" aria-describedby="emailHelp">

                                                            </div>
                                                            <div class="error" id="descriptionError"></div>
                                                        </div>
                                                        <div class="col-xxl-5">
                                                            <div>
                                                                <label for="exampleInputno" class="form-label">Upload Documents
                                                                </label>
                                                                <input type="file" class="form-control mb-1" name="image[]"
                                                                    id="image" aria-describedby="emailHelp">

                                                            </div>
                                                            <div class="error" id="descriptionError"></div>
                                                        </div>


                                                        <div class="col-md-2" style="text-align: left;">
                                                            <a onclick="add()" style="cursor: pointer;color:blue;"><i
                                                                    class="ri-add-circle-line"></i></a>
                                                            <a onclick="remove()" style="cursor: pointer;color:red;"><i
                                                                    class="ri-close-circle-line"></i></a>
                                                        </div>
        
                                                        <div class="col-md-12 mb-3">
                                                            <div id="new_chq"></div>
                                                        </div>
                                                        <input type="hidden" value="1" id="total_chq">-->




                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <!--<button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Close</button>-->
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!-- </div>
                            </div>
                        </div> -->




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
                                                            <div class="card-body" style="background-color: #0000000f;">
                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                        <div class="col-md-12" style="display:flex;">

                                                                            <div class="col-md-3">
                                                                                <p class="setpara mb-1">CLAIM ID</p>
                                                                                <h5 class="seth5"><b>
                                                                                        <a href="<?= base_url() ?>claims/claim_details/<?= $row['claim_intimation_no']; ?>">
                                                                                            <?php if (!empty($row['claim_intimation_no'])) { ?>
                                                                                                <?php echo $row['claim_intimation_no']; ?>
                                                                                            <?php } ?>
                                                                                        </a></b></h5>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <p class="setpara mb-1">POLICY NO</p>
                                                                                <h5 class="seth5"><b>
                                                                                        <?php if (!empty($row['policy_no'])) { ?>
                                                                                            <?php echo $row['policy_no']; ?>
                                                                                        <?php } ?>
                                                                                    </b></h5>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <p class="setpara mb-1">SUBJECT</p>
                                                                                <h5 class="seth5"><b>
                                                                                        <?php if (!empty($row['subject'])) { ?>
                                                                                            <?php echo $row['subject']; ?>
                                                                                        <?php } ?>
                                                                                    </b></h5>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <p class="setpara mb-1">STATUS</p>
                                                                                <h5 class="seth5"><b>
                                                                                        <?php if (!empty($row['status'])) { ?>
                                                                                            <?php echo $row['status']; ?>
                                                                                        <?php } ?>
                                                                                    </b></h5>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <p class="setpara mb-1">CLAIM DATE</p>
                                                                                <h5 class="seth5"><b>
                                                                                        <?php if (!empty($row['created_at'])) { ?>
                                                                                            <?php echo $row['created_at']; ?>
                                                                                        <?php } ?>
                                                                                    </b></h5>
                                                                            </div>


                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <p class="setpara mb-1">Description</p>
                                                                            <p class="setpara"><b>
                                                                                    <?php if (!empty($row['description'])) { ?>
                                                                                        <?php echo $row['description']; ?>
                                                                                    <?php } ?>
                                                                                </b></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="margin:auto;">
                                                                        <div class="col-md-2">

                                                                            <div class="d-flex gap-2 mt-1">
                                                                                <a class="btn btn-sm "><i class="ri-close-circle-line" data-toggle="tooltip" data-placement="bottom" title="Reject Claim" onclick="changestatus(<?= $row['id']; ?>,'Reject')" style="font-size: 15px; color:red;"></i></a>
                                                                                <a class="btn btn-sm "><i class="ri-file-list-3-line" data-toggle="tooltip" data-placement="bottom" title="Document Required" onclick="changestatus(<?= $row['id']; ?>,'Document Required')" style="font-size: 15px; color:blue;"></i></a>
                                                                                <a class="btn btn-sm "><i class="ri-star-half-line" data-toggle="tooltip" data-placement="bottom" title="Partially Passed" onclick="changestatus(<?= $row['id']; ?>,'Partially Passed')" style="font-size: 15px; color:green;"></i></a>
                                                                                <a class="btn btn-sm "><i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Claim Passed" onclick="changestatus(<?= $row['id']; ?>,'Claim Passed')" style="font-size: 15px; color:green;"></i></a>
                                                                                <a class="btn btn-sm "><i class="ri-phone-line" data-toggle="tooltip" data-placement="bottom" title="Add Call Reminder" data-bs-toggle="modal" data-bs-target="#add_reminder" data-placement="bottom" title="Claim Passed" style="font-size: 15px; color:blue;"></i></a>

                                                                            </div>

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

        <input type="hidden" name="base_policy" id="base_policy" value="<?= $base_p; ?>">
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
                                        <option value="<?= $value['id'] ?>">
                                            <?= $value['call_remark'] ?>
                                        </option>
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
    $(document).on('submit', '#editclaim', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
      
       var formData = new FormData(this);
        var error = false;
      
        var base_pol = $("#base_policy").val();
      
      	var patientname = $('#patient_name').val();
        var claim_intimation_no = $('#claim_intimation_no').val();
        var admission_date = $('#admission_date').val();
        var claim_type = $('#claim_type').val();
        var claim_status = $('#claim_status').val();
        var total_bill_amt = $('#total_bill_amt').val();
        var total_approve_amt = $('#total_approve_amt').val();
        var hospital_discount = $('#hospital_discount').val();
        var paid_on = $('#paid_on').val();
        var final_status = $('#final_status').val();
        var deduction_amt = $('#deduction_amt').val();
        var deduction_amt_details = $('#deduction_amt_details').val();
        var remarks = $('#remarks').val();
      if (patientname == '') {
            $(".patienterror").html('Enter Required Field');
            $('.patienterror').css('color', 'red');
            error = true;
         
        }else{
            $(".patienterror").html('');
           
        }
        if (claim_intimation_no == '') {
            $(".claim_intimation_noerror").html('Enter Required Field');
            $('.claim_intimation_noerror').css('color', 'red');
            error = true;
         
        }else{
            $(".claim_intimation_noerror").html('');
           
        }
        if (admission_date == '') {
            $(".admission_dateerror").html('Enter Required Field');
            $('.admission_dateerror').css('color', 'red');
            error = true;
         
        }else{
            $(".admission_dateerror").html('');
           
        }
        if (claim_type == '') {
            $(".claim_typeerror").html('Select Required Field');
            $('.claim_typeerror').css('color', 'red');
            error = true;
         
        }else{
            $(".claim_typeerror").html('');
           
        }
        if (claim_status == '') {
            $(".claim_statuserror").html('Select Required Field');
            $('.claim_statuserror').css('color', 'red');
            error = true;
         
        }else{
            $(".claim_statuserror").html('');
           
        }
        if (total_bill_amt == '') {
            $(".total_bill_amterror").html('Enter Required Field');
            $('.total_bill_amterror').css('color', 'red');
            error = true;
         
        }else{
            $(".total_bill_amterror").html('');
           
        }
        if (total_approve_amt == '') {
            $(".total_approve_amterror").html('Enter Required Field');
            $('.total_approve_amterror').css('color', 'red');
            error = true;
         
        }else{
            $(".total_approve_amterror").html('');
           
        }
        if (hospital_discount == '') {
            $(".hospital_discounterror").html('Enter Required Field');
            $('.hospital_discounterror').css('color', 'red');
            error = true;
         
        }else{
            $(".hospital_discounterror").html('');
           
        }
        if (paid_on == '') {
            $(".paid_onerror").html('Enter Required Field');
            $('.paid_onerror').css('color', 'red');
            error = true;
         
        }else{
            $(".paid_onerror").html('');
           
        }
        if (final_status == '') {
            $(".final_statuserror").html('Select Required Field');
            $('.final_statuserror').css('color', 'red');
            error = true;
         
        }else{
            $(".final_statuserror").html('');
           
        }
        if (deduction_amt == '') {
            $(".deduction_amterror").html('Enter Required Field');
            $('.deduction_amterror').css('color', 'red');
            error = true;
         
        }else{
            $(".deduction_amterror").html('');
           
        }
        if (deduction_amt_details == '') {
            $(".deduction_amt_detailserror").html('Enter Required Field');
            $('.deduction_amt_detailserror').css('color', 'red');
            error = true;
         
        }else{
            $(".deduction_amt_detailserror").html('');
           
        }
        if (remarks == '') {
            $(".remarkserror").html('Enter Required Field');
            $('.remarkserror').css('color', 'red');
            error = true;
         
        }else{
            $(".remarkserror").html('');
           
        }
        
        if (error == false) {
      
        $.ajax({
            url: "<?= base_url() ?>form/updateclaim",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data

                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('Record Updated 🙂', ' ', 'success');

                    setTimeout(function() {
                        window.location.href = '<?= base_url() ?>claims/view_claims/' + base_pol;
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
        })}
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
        var new_input = "<div class='row'  id='new_" + new_chq_no + "' style='display:flex;margin-bottom: 1rem;width:98%;'> <div class='col-md-6'> <input type='text' class='form-control mb-1' name='title[]' id='title' aria-describedby='emailHelp' placeholder='Enter Title of Document'></div><div class='col-xxl-5'><label for='doc_image' class='uploaddata' style='background-color: #54b2e5;padding: 4px 14px;border-radius: 8px;margin-bottom:0px;'>Upload</label><input type='file' class='form-control mb-3' aria-describedby='emailHelp' name='doc_image[]' style='display:none;'></div>";
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

<script>
    function hide_pre(val) {
        if (val == 'reimbursement') {
            $('#hidepreauth').css("display", "none");
            $('.hidepreauth').css("display", "none");
        } else {
            $('#hidepreauth').css("display", "block");
            $('.hidepreauth').css("display", "block");
        }
    }

    function show_denied(val) {
        if (val == 'denied' || val == 'pending' || val == 'in_progress' || val == 'rejected') {
            $('#pre_amount').css("display", "none");
        } else {
            $('#pre_amount').css("display", "block");
        }
    }

    function show_claim(val) {
        $('#hide_amount').css("display", "none");
        $('#hide_totalamount').css("display", "none");
        $('#deduct_amount_detail').css("display", "none");
        $('#paid_date').css("display", "none");
        $('#deduct_amount').css("display", "none");
        $('#deduct_detail').css("display", "none");
        $('#hospital').css("display", "none");

        if (val == 'Pending' || val == 'Under Query' || val == 'In Progress' || val == 'Withdrawn') {
            $('#hide_amount').css("display", "none");
            $('#hide_totalamount').css("display", "none");
            $('#deduct_amount_detail').css("display", "none");
            $('#paid_date').css("display", "none");
            $('#deduct_amount').css("display", "none");
            $('#deduct_detail').css("display", "none");
            $('#hospital').css("display", "none");
            $('#final_status_1').css("margin-top", "0px");

        }


        if (val == 'Rejected' || val == 'Ask for Reimbursement') {
            $('#hide_amount').css("display", "block");
        }


        if (val == 'Approved') {

            $('#hide_amount').css("display", "block");
            $('#hide_totalamount').css("display", "block");
            $('#deduct_amount_detail').css("display", "block");
            $('#paid_date').css("display", "block");
            $('#deduct_amount').css("display", "block");
            $('#deduct_detail').css("display", "block");
            $('#hospital').css("display", "block");
            $('#final_status_1').css("margin-top", "15px");

        } else {

            $('#final_status_1').css("margin-top", "0px");

        }
    }
</script>

<script>
    function validateCode() {
        var TCode = $('#claim_intimation_no').val();

        for (var i = 0; i < TCode.length; i++) {
            var char1 = TCode.charAt(i);
            var cc = char1.charCodeAt(0);

            if ((cc > 47 && cc < 58) || (cc > 64 && cc < 91) || (cc > 96 && cc < 123)) {
                $('#claim_init_error').html('');
            } else {
                $('#claim_init_error').html('Spaces are not allowed');
                $('.error').css('color', 'red');
                return false;
            }
        }

        return true;
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
 var i = 0;
    
    $('.add-new').click(function() {
        i++;
        var formTemplate = $('.prescription-row').first().html();
        var newForm = "<tr class='prescription-row' id='presc_"+i+"'>" + formTemplate + "</tr>";
        $('table.table-prescription > tbody').append(newForm);
    });

    $('body').on('click', '.delete-row', function() {
        if ($('table').find('.prescription-row').length > 1) {
            $(this).parents('.prescription-row').remove();
        } else {
            var formTemplate = $('.prescription-row').first().html();
            var newForm = "<tr class='prescription-row'>" + formTemplate + "</tr>";
            $(this).parents('.prescription-row').remove();
            $('table.table-prescription > tbody').append(newForm);
        }
    });
</script>



</body>

</html>