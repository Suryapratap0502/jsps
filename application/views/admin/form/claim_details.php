<?php
$this->load->view('admin/link');
$claim_id = $this->uri->segment(3);
$module = $this->uri->segment(1);

?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php $this->load->view('admin/topar');
    $this->load->view('admin/imgheader');
    $this->load->view('admin/sidebar');
    ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
</script>
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
                        <h4 class="mb-sm-0">View Details of CLAIM INTIMATION NO - <span style="color:#405189;">
                                <?= $claim_id; ?></span></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Claim Details</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="modal fade" id="addnewthread" tabindex="-1" aria-labelledby="addnewthread" aria-modal="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalgridLabel">Add To Thread In <?= $claim_id; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="success">
                                <div id="error">
                                </div>
                            </div>
                            <form method="POST" id="addnewthread">
                                <div class="row g-3">
                                    <div class="col-xxl-12">
                                        <div>
                                            <label for="firstName" class="form-label">Policy Number</label>
                                            <input type="text" class="form-control" name="policy_no" id="policy_no" value="<?= $claim_details[0]['policy_no'] ?>" placeholder="Enter Policy" readonly>
                                        </div>
                                        <div class="error" id="policynumError"></div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div>
                                            <label for="firstName" class="form-label">Claim Intimation No</label>
                                            <input type="text" class="form-control" name="claim_id" id="claim_id" value="<?= $claim_id ?>" placeholder="Enter Claim" readonly>
                                        </div>
                                        <div class="error" id="policynumError"></div>
                                    </div>
                                    <!--end col-->

                                    <!--end col-->
                                    <div class="col-xxl-12">
                                        <div>
                                            <label for="lastName" class="form-label">Description</label>
                                            <textarea type="text" class="form-control" name="description" id="description" placeholder="Enter Description"></textarea>
                                        </div>
                                        <div class="error" id="descriptionError"></div>
                                    </div>
                                    <!--end col-->




                                    <input type="hidden" name="module_name" id="module_name" value="<?= $module; ?>">
                                    <div class="col-xxl-5">
                                        <div>
                                            <label for="exampleInputno" class="form-label"> Documents Title </label>
                                            <input type="text" class="form-control mb-1" name="title[]" id="title" aria-describedby="emailHelp" placeholder=" Document Title">
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
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Claim Details of Claim Intimation No -
                                <?= $claim_id; ?></h4>
                            <div class="flex-shrink-0">
                                <button type="button" data-toggle="tooltip" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addnewthread"> Add To Thread</button>
                            </div>
                        </div><!-- end card header -->



                        <div class="card-body">
                            <div class="live-preview">


                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Claim Details Listing</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <div class="live-preview">
                                                    <div class="row">
                                                        <div class="col-12">


                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="card border " style="border-color: #21252973!important;">
                                                                        <div class="card-body">

                                                                            <div class="row">
                                                                                <h5>CLAIM DETAILS</h5>
                                                                                <div class="col-md-12" style="display:flex;padding-bottom: 0px;">
                                                                                    <div class="col-md-2">
                                                                                        <p class="setpara mb-1">POLICY NO</p>

                                                                                        <p class="seth5"><b>
                                                                                                <a>
                                                                                                    <?php if (!empty($claim_details[0]['policy_no'])) {
                                                                                                        echo $claim_details[0]['policy_no'];
                                                                                                    } else {
                                                                                                        echo "NA";
                                                                                                    } ?>
                                                                                                </a></b></p>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <p class="setpara mb-1">PATIENT NAME</p>
                                                                                        <h5 class="seth5"><b>


                                                                                                <?php if (!empty($claim_details[0]['patient_name'])) {
                                                                                                    echo $claim_details[0]['patient_name'];
                                                                                                } else {
                                                                                                    echo "NA";
                                                                                                } ?>
                                                                                            </b>

                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <p class="setpara mb-1">COMPANY NAME</p>
                                                                                        <h5 class="seth5"><b>


                                                                                                <?php if (!empty($claim_details[0]['company_name'])) {


                                                                                                    echo $claim_details[0]['company_name'];
                                                                                                } else {
                                                                                                    echo "NA";
                                                                                                } ?>
                                                                                            </b></h5>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <p class="setpara mb-1">CLAIM INTIMATION NO</p>
                                                                                        <h5 class="seth5"><b>


                                                                                                <?php if (!empty($claim_details[0]['claim_intimation_no'])) {
                                                                                                    echo $claim_details[0]['claim_intimation_no'];
                                                                                                } else {
                                                                                                    echo "NA";
                                                                                                } ?>
                                                                                            </b></h5>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <p class="setpara mb-1">REASON FOR ADMIT
                                                                                        </p>
                                                                                        <h5 class="seth5"><b>


                                                                                                <?php if (!empty($claim_details[0]['reason_admit'])) {
                                                                                                    echo $claim_details[0]['reason_admit'];
                                                                                                } else {
                                                                                                    echo "NA";
                                                                                                } ?>
                                                                                            </b></h5>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <p class="setpara mb-1">HEALTH CARD
                                                                                        </p>
                                                                                        <h5 class="seth5"><b>


                                                                                                <?php if (!empty($claim_details[0]['health_card'])) {
                                                                                                    echo $claim_details[0]['health_card'];
                                                                                                } else {
                                                                                                    echo "NA";
                                                                                                } ?>
                                                                                            </b></h5>
                                                                                    </div>

                                                                                </div>


                                                                            </div>

                                                                            <div class="col-md-12" style="display:flex;padding-bottom: 0px;">
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">ADMISSION DATE
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>

                                                                                            <?php if (!empty($claim_details[0]['admission_date'])) {
                                                                                                echo $claim_details[0]['admission_date'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">HOSPITAL TYPE
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($claim_details[0]['is_network'])) {
                                                                                                echo $claim_details[0]['is_network'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">CLAIM TYPE
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($claim_details[0]['claim_type'])) {
                                                                                                echo $claim_details[0]['claim_type'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">CLAIM FOR
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($claim_details[0]['claim_for'])) {
                                                                                                echo $claim_details[0]['claim_for'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                            </div>


                                                                            <hr>




                                                                            <h5>PRE AUTH STATUS</h5>

                                                                            <div class="col-md-12" style="display:flex;">
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">PRE AUTH STATUS
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($claim_details[0]['pre_auth_status'])) {
                                                                                                echo $claim_details[0]['pre_auth_status'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">PRE AUTH STATUS AMOUNT
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($claim_details[0]['pre_auth_amt'])) {
                                                                                                echo $claim_details[0]['pre_auth_amt'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>


                                                                            </div>

                                                                            <hr>
                                                                            <h5>CLAIM SETTLEMENT DETAILS</h5>
                                                                            <div class="col-md-12" style="display:flex;padding-bottom: 10px;">

                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">CLAIM STATUS</p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($claim_details[0]['claim_status'])) {
                                                                                                echo $claim_details[0]['claim_status'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">TOTAL BILL AMOUNT</p>
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>

                                                                                            <?php if (!empty($claim_details[0]['total_bill_amt'])) {
                                                                                                echo $claim_details[0]['total_bill_amt'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>

                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">TOTAL APPROVE AMOUNT </p>
                                                                                    <h5 class="seth5"><b>

                                                                                            <?php if (!empty($claim_details[0]['total_approve_amt'])) {
                                                                                                echo $claim_details[0]['total_approve_amt'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">HOSPITAL DISCOUNT
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($claim_details[0]['hospital_discount'])) {
                                                                                                echo $claim_details[0]['hospital_discount'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">DEDUCATION AMOUNT
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($claim_details[0]['deduction_amt'])) {
                                                                                                echo $claim_details[0]['deduction_amt'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">DEDUCATION DETAILS</p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($claim_details[0]['deduction_details'])) {
                                                                                                echo $claim_details[0]['deduction_details'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>

                                                                                        </b></h5>
                                                                                </div>



                                                                            </div>

                                                                            <div class="col-md-12" style="display:flex;padding-bottom: 10px;">



                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">CUSTOMER REMARKS</p>
                                                                                    <h5 class="seth5"><b>

                                                                                            <?php if (!empty($claim_details[0]['customer_remarks'])) {
                                                                                                echo $claim_details[0]['customer_remarks'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">PAID ON
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>

                                                                                            <?php if (!empty($claim_details[0]['paid_on'])) {
                                                                                                echo $claim_details[0]['paid_on'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>

                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">FINAL STATUS
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>

                                                                                            <?php if (!empty($claim_details[0]['final_status'])) {
                                                                                                echo $claim_details[0]['final_status'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>

                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">DEDUCATION AMOUNT DETAILS
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>

                                                                                            <?php if (!empty($claim_details[0]['deduction_amt_details'])) {
                                                                                                echo $claim_details[0]['deduction_amt_details'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>

                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <p class="setpara mb-1">REMARKS
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>

                                                                                            <?php if (!empty($claim_details[0]['remarks'])) {
                                                                                                echo $claim_details[0]['remarks'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>

                                                                                        </b></h5>
                                                                                </div>


                                                                            </div>
                                                                            <hr>

                                                                            <h5>DOCUMENTS</h5>
                                                                            <?php $claim_docs = $this->Form_model->list_common_where3('sale_docs', 'policy_no', $claim_details[0]['policy_no']); ?>
                                                                            <?php if(!empty($claim_docs)){foreach($claim_docs as $val){ ?>
                                                                            <div class="col-md-12" style="display:flex;">
                                                                                <div class="col-md-4">
                                                                                    <p class="setpara mb-1">DOCUMENT NAME
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($val['docs_name'])) {
                                                                                                echo $val['docs_name'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <p class="setpara mb-1">SALES DOCUMENT
                                                                                    </p>
                                                                                   <a href="<?=base_url()?>assets/upload/documents/<?=$val['sale_docs'];?>"> <h5 class="seth5"><b>


                                                                                            <?php if (!empty($val['sale_docs'])) {
                                                                                                echo $val['sale_docs'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5></a>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <p class="setpara mb-1">CREATED DATE
                                                                                    </p>
                                                                                    <h5 class="seth5"><b>


                                                                                            <?php if (!empty($val['created_at'])) {
                                                                                                echo $val['created_at'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?>
                                                                                        </b></h5>
                                                                                </div>


                                                                            </div>
                                                                            <?php }} ?>



                                                                        </div>
                                                                    </div>

                                                                </div><!-- end col -->
                                                            </div><!-- end row -->
                                                        </div><!-- end card -->
                                                    </div><!-- end col -->

                                                    <!-- end card -->
                                                </div><!-- end col -->

                                                <!-- end row -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div><!-- end row -->




                                </div><!-- end card -->
                            </div><!-- end col -->


                            <div class="row">
                                <div class="col-12">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card border card-border-primary">
                                                <div class="card-header">

                                                    <h6 class="card-title mb-0">Added Thread</h6>
                                                </div>
                                                <div class="card-body">
                                                    <?php
                                                    $i = 1;
                                                    if (!empty($thread_docs)) {
                                                        foreach ($thread_docs as $row) {
                                                    ?>
                                                            <div class="card border " style="border-color: #21252973!important;">
                                                                <div class="card-body" style="background-color: #0000000f;">
                                                                    <div class="row">
                                                                        <div class="col-md-12" style="display:flex;">

                                                                            <div class="col-md-3">
                                                                                <p class="setpara mb-1"> NAME</p>
                                                                                <p class="seth5"><b>
                                                                                        <a> <?php if (!empty($row['docs_name'])) { ?>
                                                                                                <?php echo $row['docs_name']; ?>
                                                                                            <?php } ?>
                                                                                        </a></b></p>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <p class="setpara mb-1">DOCUMENT</p>
                                                                                <p class="seth5"><b>
                                                                                        <?php if (!empty($row['sale_docs'])) { ?>
                                                                                            <?php echo $row['sale_docs']; ?>
                                                                                        <?php } ?>
                                                                                    </b></p>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <p class="setpara mb-1">DESCRIPTION</p>
                                                                                <p class="seth5"><b>
                                                                                        <?php if (!empty($row['description'])) { ?>
                                                                                            <?php echo $row['description']; ?>
                                                                                        <?php } else {
                                                                                            echo "At Intiate Claim";
                                                                                        } ?>
                                                                                    </b></p>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <p class="setpara mb-1">UPLOADED BY</p>
                                                                                <p class="seth5"><b>
                                                                                        <?php if (!empty($row['user_id'])) { ?>
                                                                                        <?php $user_id = $row['user_id'];
                                                                                            $this->db->select('*');
                                                                                            $this->db->from('admin');
                                                                                            $this->db->where('id', $user_id);
                                                                                            $rows1 = $this->db->get()->row();
                                                                                            echo $rows1->name;
                                                                                        }
                                                                                        ?>

                                                                                    </b></p>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <p class="setpara mb-1">UPLOADED DATE</p>
                                                                                <p class="seth5"><b>
                                                                                        <?php if (!empty($row['created_at'])) { ?>
                                                                                            <?php echo $row['created_at']; ?>
                                                                                        <?php } ?>
                                                                                    </b></p>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                    <?php $i++;
                                                        }
                                                    } else {
                                                        echo "No Thread Available";
                                                    } ?>
                                                </div>
                                            </div><!-- end col -->


                                        </div><!-- end row -->

                                    </div><!-- end col -->
                                </div><!-- end row -->


                            </div><!-- end row -->


                        </div><!-- end row -->





                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->




        </div>
        <!-- container-fluid -->
    </div>

    <!-- End Page-content -->



</div>
</div>

<?php $this->load->view('admin/footer'); ?>
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>



<!-- Vector map-->
<script src="<?= base_url(); ?>assets/libs/jsvectormap/js/jsvectormap.min.js"></script>


<!--Swiper slider js-->
<script src="<?= base_url(); ?>assets/libs/swiper/swiper-bundle.min.js"></script>



<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script>
    //  add modal
    $(document).on('submit', '#addnewthread', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);

        var error = false;
        if (error == false) {
            $.ajax({
                url: "<?= base_url('Claims/add_new_thread'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                        swal('Thread Added 🙂', ' ', 'success');
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
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function add() {

        var new_chq_no = parseInt($('#total_chq').val()) + 1;
        var new_input = "<div class='row'  id='new_" + new_chq_no +
            "'> <div class='col-xxl-5'> <div><input type='text' class='form-control mb-1' name='title[]' id='title' aria-describedby='emailHelp' placeholder='Document Title'></div></div> <div class='col-xxl-5'><input type='file' class='form-control mb-1' name='image[]' id='image' aria-describedby='emailHelp'></div>";
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





</body>

</html>