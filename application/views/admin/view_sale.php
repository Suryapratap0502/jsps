<?php include 'link.php'; ?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'topar.php'; ?>

    <?php include 'imgheader.php'; ?>
    <?php include 'sidebar.php'; ?>
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
<style>
    .setpara {
        font-size: 12px;
        text-transform: uppercase;
    }

    .seth5 {
        font-size: 10px;
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
</style>

<div class="vertical-overlay"></div>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">View Details of <?= $sale_details[0]['proposer_name'] ?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Sale Closure Details</li>
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
                                                            <h5>PERSONAL INFORMATION</h5>
                                                            <div class="col-md-12" style="display:flex;padding-bottom: 0px;">
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Proposer Name</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($sale_details[0]['proposer_name'])) {
                                                                                echo $sale_details[0]['proposer_name'];
                                                                            } else {
                                                                                echo "NA";
                                                                            } ?>
                                                                        </b>
                                                                    </h5>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Customer Name</p>
                                                                    <h5 class="seth5">
                                                                        <?php if (!empty($sale_details[0]['customer_name'])) {
                                                                            echo $sale_details[0]['customer_name'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </h5>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Date of Birth</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($sale_details[0]['dob'])) {
                                                                                echo $sale_details[0]['dob'];
                                                                            } else {
                                                                                echo "NA";
                                                                            } ?>

                                                                        </b></h5>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Customer City</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($sale_details[0]['customer_city'])) {
                                                                                echo $sale_details[0]['customer_city'];
                                                                            } else {
                                                                                echo "NA";
                                                                            } ?>


                                                                        </b></h5>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Email</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($sale_details[0]['email'])) {
                                                                                echo $sale_details[0]['email'];
                                                                            } else {
                                                                                echo "NA";
                                                                            } ?>

                                                                        </b></h5>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Contact</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($sale_details[0]['contact'])) {
                                                                                echo $sale_details[0]['contact'];
                                                                            } else {
                                                                                echo "NA";
                                                                            } ?>


                                                                        </b>
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12" style="display:flex;">

                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Alternate Number</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($sale_details[0]['alternate_no'])) {
                                                                                echo $sale_details[0]['alternate_no'];
                                                                            } else {
                                                                                echo "NA";
                                                                            } ?>
                                                                        </b></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>




                                                        <h5>POLICY DETAILS</h5>
                                                        <div class="col-md-12" style="display:flex;">
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Policy No</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['policy_no'])) {
                                                                            echo $sale_details[0]['policy_no'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>
                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Policy Type</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['policy_type'])) {
                                                                            echo $sale_details[0]['policy_type'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>
                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Portability Duration</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['portability_duration'])) {
                                                                            echo $sale_details[0]['portability_duration'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>

                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Port Company</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['portability'])) {
                                                                            $port_id = $sale_details[0]['portability'];
                                                                            $this->db->select('*');
                                                                            $this->db->from('company');
                                                                            $this->db->where('id', $port_id);
                                                                            $rows1 = $this->db->get()->row();
                                                                            echo $rows1->name;
                                                                            echo $sale_details[0]['portability'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b>
                                                                </h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Company Name</p>
                                                                <h5 class="seth5"><b>


                                                                        <?php if (!empty($sale_details[0]['company_name'])) {
                                                                            $com_id = $sale_details[0]['company_name'];
                                                                            $this->db->select('*');
                                                                            $this->db->from('company');
                                                                            $this->db->where('id', $com_id);
                                                                            $rows1 = $this->db->get()->row();
                                                                            echo $rows1->name;
                                                                            echo $sale_details[0]['company_name'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>


                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Port End Date</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['port_end_date'])) {
                                                                            echo $sale_details[0]['port_end_date'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>
                                                            </div>

                                                        </div>




                                                        <div class="col-md-12" style="display:flex;padding-bottom: 10px;">
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Product Name</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['product_name'])) {
                                                                            echo $sale_details[0]['product_name'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Booked Date</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['date_of_closure'])) {
                                                                            echo $sale_details[0]['date_of_closure'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Sum Assured</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['sum_assured_1'])) {
                                                                            echo $sale_details[0]['sum_assured_1'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Cover Type</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['cover_type'])) {
                                                                            echo $sale_details[0]['cover_type'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Family Type</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($member_details[0]['family_type'])) {
                                                                            echo $member_details[0]['family_type'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Medical Requirment</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['medical'])) {
                                                                            echo $sale_details[0]['medical'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>
                                                            </div>



                                                        </div>

                                                        <div class="col-md-12" style="display:flex;">
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Data Source</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['data_source'])) {
                                                                            echo $sale_details[0]['data_source'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Zone</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['zone'])) {
                                                                            echo $sale_details[0]['zone'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>


                                                                    </b>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5>PREMIUM DETAILS</h5>
                                                        <div class="col-md-12" style="display:flex;padding-bottom: 10px;">

                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Gross Premium</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['gross_premium'])) {
                                                                            echo $sale_details[0]['gross_premium'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>


                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Net Premium</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['net_premium'])) {
                                                                            echo $sale_details[0]['net_premium'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>
                                                                    </b></h5>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Payment Tenure </p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['payment_tenure'])) {
                                                                            echo $sale_details[0]['payment_tenure'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>


                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Payment Mode</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['payment_mode'])) {
                                                                            echo $sale_details[0]['payment_mode'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>
                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Discount If Any</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['discount'])) {
                                                                            echo $sale_details[0]['discount'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>
                                                                    </b></h5>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Team Leader</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['tl'])) {
                                                                            $team_leader = $sale_details[0]['tl'];
                                                                            $this->db->select('*');
                                                                            $this->db->from('team_leader');
                                                                            $this->db->where('id', $team_leader);
                                                                            $rows1 = $this->db->get()->row();
                                                                            echo $rows1->name;
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-12" style="display:flex;padding-bottom: 10px;">
                                                        <div class="col-md-2">
                                                                <p class="setpara mb-1">Manager</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['manager'])) {
                                                                            $id = $sale_details[0]['manager'];
                                                                            $this->db->select('*');
                                                                            $this->db->from('manager');
                                                                            $this->db->where('id', $id);
                                                                            $rows1 = $this->db->get()->row();
                                                                            echo $rows1->name;
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?>

                                                                    </b></h5>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <p class="setpara mb-1">Covarage Type</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['coverage_type'])) {
                                                                            echo $sale_details[0]['coverage_type'];
                                                                        } ?>
                                                                    </b></h5>
                                                            </div>

                                                            <!-- <div class="col-md-2">
                                                                <p class="setpara mb-1">Discount</p>
                                                                <h5 class="seth5"><b>
                                                                        <?php if (!empty($sale_details[0]['discount'])) {
                                                                            echo $sale_details[0]['discount'];
                                                                        } ?>

                                                                    </b></h5>
                                                            </div> -->


                                                        </div>



                                                        <hr>
                                                        <h5>INSURED DETAILS</h5>
                                                        <?php foreach ($member_details as $data) {
                                                        ?>
                                                            <div class="col-md-12" style="display:flex;padding-bottom: 10px;">

                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Name</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($data['member_name'])) {
                                                                                echo $data['member_name'];
                                                                            } else echo "NA"; ?>

                                                                        </b></h5>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Gender</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($data['member_gender'])) {
                                                                                echo $data['member_name'];
                                                                            } else echo "NA"; ?>
                                                                        </b></h5>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">D.O.B. </p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($data['member_dob'])) {
                                                                                echo $data['member_dob'];
                                                                            } else echo "NA"; ?>
                                                                        </b></h5>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Relation</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($data['member_relation'])) {
                                                                                echo $data['member_relation'];
                                                                            } else echo "NA"; ?>
                                                                        </b></h5>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">INSURED PED</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($data['insured_pd_details'])) {
                                                                                echo $data['insured_pd_details'];
                                                                            } else echo "NA"; ?>
                                                                        </b></h5>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">UNDERWRITER PED</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if (!empty($data['underwriter_ped'])) {
                                                                                echo $data['underwriter_ped'];
                                                                            } else echo "NA"; ?>
                                                                        </b></h5>
                                                                </div>

                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="row">
                                    <div class="col-12">


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card border card-border-primary" style="border-color: #21252973!important;">
                                                    <div class="card-header" style="border-color:#21252973!important;">

                                                        <h6 class="card-title mb-0" style="border-color: #21252973!important;">Underwriter
                                                            Remarks</h6>
                                                    </div>
                                                    <div class="card-body">
                                                       <div class="accordion" id="accordionExample0">
                                                            <?php foreach ($present_date as $value) { ?>
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header" id="heading6<?= $value['present_year'] ?>">
                                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6<?= $value['present_year'] ?>" aria-expanded="true" aria-controls="collapse6<?= $value['present_year'] ?>">
                                                                            <?= $value['present_year'] ?>
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapse6<?= $value['present_year'] ?>" class="accordion-collapse collapse show" aria-labelledby="heading6<?= $value['present_year'] ?>" data-bs-parent="#accordionExample0">
                                                                        <?php
                                                                        if (!empty($value['present_year'])) {
                                                                            $date = $value['present_year'];
                                                                        ?>

                                                                            <div class="accordion-body">
                                                                                <div class="table-responsive table-card">
                                                                                    <table class="table align-middle table-nowrap mb-0">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Policy No.</th>
                                                                                                <th>Disposition</th>
                                                                                                <th>Sub Disposition</th>
                                                                                                <th>Call Date</th>
                                                                                                <th>Remark</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php
                                                                                            $underwriter_remark = $this->Form_model->get_underwriter_remark($sale_details[0]['id'], $date);
                                                                                            foreach ($underwriter_remark as $data) { ?>

                                                                                                <tr>
                                                                                                    <td><?= $data['policy_no'] ?></td>
                                                                                                    <td><?php if (!empty($data['disposition'])) {
                                                                                                            $disp_id = $data['disposition'];
                                                                                                            $this->db->select('disposition');
                                                                                                            $this->db->from('disposition');
                                                                                                            $this->db->where('id', $disp_id);
                                                                                                            $this->db->where('flag', '0');
                                                                                                            $rows1 = $this->db->get()->row();
                                                                                                            echo $rows1->disposition;
                                                                                                        }
                                                                                                        ?></td>
                                                                                                    <td><?= $data['sub_disposition'] ?></td>
                                                                                                    <td><?= $data['created_at'] ?></td>
                                                                                                    <td><?= $data['remark'] ?></td>
                                                                                                </tr>

                                                                                            <?php } ?>

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                            </div>

                                                                    </div>
                                                                </div>

                                                        <?php } else {
                                                                            echo "NA";
                                                                        }
                                                                    } ?>

                                                        </div>
                                                    </div>
                                                </div><!-- end col -->


                                            </div><!-- end row -->

                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="row">
                                <div class="col-12">


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card border card-border-primary" style="border-color: #21252973!important;">
                                                <div class="card-header" style="border-color: #21252973!important;">

                                                    <h6 class="card-title mb-0">Operation Remarks</h6>
                                                </div>
                                                <div class="card-body">
                                                   <div class="accordion" id="accordionExample5">
                                                        <?php foreach ($present_date as $value) { ?>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="heading5<?= $value['present_year'] ?>">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5<?= $value['present_year'] ?>" aria-expanded="true" aria-controls="collapse5<?= $value['present_year'] ?>">
                                                                        <?= $value['present_year'] ?>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse5<?= $value['present_year'] ?>" class="accordion-collapse collapse show" aria-labelledby="heading5<?= $value['present_year'] ?>" data-bs-parent="#accordionExample5">
                                                                    <?php
                                                                    if (!empty($value['present_year'])) {
                                                                        $date = $value['present_year'];
                                                                    ?>

                                                                        <div class="accordion-body">
                                                                            <div class="table-responsive table-card">
                                                                                <table class="table align-middle table-nowrap mb-0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Policy No.</th>
                                                                                            <th>Disposition</th>
                                                                                            <th>Sub Disposition</th>
                                                                                            <th>Call Date</th>
                                                                                            <th>Remark</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                        $operation_remark = $this->Form_model->get_operation_remark($sale_details[0]['id'], $date);
                                                                                        foreach ($operation_remark as $data) { ?>

                                                                                            <tr>
                                                                                                <td><?= $data['policy_no'] ?></td>
                                                                                                <td><?php if (!empty($data['disposition'])) {
                                                                                                        $disp_id = $data['disposition'];
                                                                                                        $this->db->select('disposition');
                                                                                                        $this->db->from('disposition');
                                                                                                        $this->db->where('id', $disp_id);
                                                                                                        $this->db->where('flag', '0');
                                                                                                        $rows1 = $this->db->get()->row();
                                                                                                        echo $rows1->disposition;
                                                                                                    }
                                                                                                    ?></td>
                                                                                                <td><?= $data['sub_disposition'] ?></td>
                                                                                                <td><?= $data['created_at'] ?></td>
                                                                                                <td><?= $data['remark'] ?></td>
                                                                                            </tr>

                                                                                        <?php } ?>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>

                                                                        </div>

                                                                </div>
                                                            </div>

                                                    <?php } else {
                                                                        echo "NA";
                                                                    }
                                                                } ?>

                                                    </div>
                                                </div>
                                            </div><!-- end col -->


                                        </div><!-- end row -->

                                    </div><!-- end col -->
                                </div><!-- end row -->

                                <div class="">
                                    <div class="col-md-12">
                                        <div class="card border card-border-primary" style="border-color: #21252973!important;">
                                            <div class="card-header" style="border-color:#21252973!important;">

                                                <h6 class="card-title mb-0" style="border-color: #21252973!important;">
                                                    Other Remarks</h6>
                                            </div>
                                            <div class="card-body">

                                                <div class="col-md-12">

                                                    <div class="card">
                                                        <div class="card-body">

                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#nav-border-justified-home" role="tab" aria-selected="false" style="color: #ff8100!important;border-top-color: #ff8100!important;">
                                                                        <i class="ri-home-5-line align-middle me-1"></i>
                                                                        Services
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-profile" role="tab" aria-selected="false" style="color: #0aaf3d!important;border-top-color: #0aaf3d!important;">
                                                                        <i class="ri-user-line me-1 align-middle"></i>
                                                                        Renewals
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-messages" role="tab" aria-selected="false" style="color: #007aff!important;border-top-color: #007aff!important;">
                                                                        <i class="ri-question-answer-line align-middle me-1"></i> Claim
                                                                    </a>
                                                                </li>
                                                                <!-- <li class="nav-item">
                                                                    <a class="nav-link " data-bs-toggle="tab" href="#nav-border-justified-home1" role="tab" aria-selected="false" style="color: #6559cc!important;border-top-color: #6559cc!important;">
                                                                        <i class="ri-home-5-line align-middle me-1"></i>
                                                                        Griveance/Customer Services
                                                                    </a>
                                                                </li> -->
                                                                <!-- <li class="nav-item">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-profile2" role="tab" aria-selected="false" style="color: #007aff!important;border-top-color: #007aff!important;">
                                                                        <i class="ri-user-line me-1 align-middle"></i>
                                                                        After Renewal Sales Services
                                                                    </a>
                                                                </li> -->

                                                            </ul>
                                                            <div class="tab-content text-muted">
                                                               <div class="tab-pane active" id="nav-border-justified-home" role="tabpanel">

                                                                    <h6>Year Wise Remark Here</h6>

                                                                    <div class="accordion" id="accordionExample">
                                                                        <?php foreach ($present_date as $value) { ?>
                                                                            <div class="accordion-item">
                                                                                <h2 class="accordion-header" id="heading<?= $value['present_year'] ?>">
                                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $value['present_year'] ?>" aria-expanded="true" aria-controls="collapse<?= $value['present_year'] ?>">
                                                                                        <?= $value['present_year'] ?>
                                                                                    </button>
                                                                                </h2>
                                                                                <div id="collapse<?= $value['present_year'] ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?= $value['present_year'] ?>" data-bs-parent="#accordionExample">
                                                                                    <?php
                                                                                    if (!empty($value['present_year'])) {
                                                                                        $date = $value['present_year'];
                                                                                    ?>

                                                                                        <div class="accordion-body">
                                                                                            <div class="table-responsive table-card">
                                                                                                <table class="table align-middle table-nowrap mb-0">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Policy No.</th>
                                                                                                            <th>Disposition</th>
                                                                                                            <th>Sub Disposition</th>
                                                                                                            <th>Call Date</th>
                                                                                                            <th>Remark</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php
                                                                                                        $service_remark = $this->Form_model->get_service_remark($sale_details[0]['id'], $date);
                                                                                                        foreach ($service_remark as $data) { ?>

                                                                                                            <tr>
                                                                                                                <td><?= $data['policy_no'] ?></td>
                                                                                                                <td><?php if (!empty($data['disposition'])) {
                                                                                                                        $disp_id = $data['disposition'];
                                                                                                                        $this->db->select('disposition');
                                                                                                                        $this->db->from('disposition');
                                                                                                                        $this->db->where('id', $disp_id);
                                                                                                                        $this->db->where('flag', '0');
                                                                                                                        $rows1 = $this->db->get()->row();
                                                                                                                        echo $rows1->disposition;
                                                                                                                    }
                                                                                                                    ?></td>
                                                                                                                <td><?= $data['sub_disposition'] ?></td>
                                                                                                                <td><?= $data['created_at'] ?></td>
                                                                                                                <td><?= $data['remark'] ?></td>
                                                                                                            </tr>

                                                                                                        <?php } ?>

                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>

                                                                                        </div>

                                                                                </div>
                                                                            </div>

                                                                    <?php } else {
                                                                                        echo "NA";
                                                                                    }
                                                                                } ?>

                                                                    </div>

                                                                </div>
                                                                <div class="tab-pane" id="nav-border-justified-profile" role="tabpanel">
                                                                    <h6>Year Wise Remark Here</h6>
                                                                    <!-- Base Example -->
                                                                     <div class="accordion" id="accordionOne">
                                                                        <?php foreach ($present_date as $value) { ?>
                                                                            <div class="accordion-item">
                                                                                <h2 class="accordion-header" id="heading098<?= $value['present_year'] ?>">
                                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse09<?= $value['present_year'] ?>" aria-expanded="true" aria-controls="collapse09<?= $value['present_year'] ?>">
                                                                                        <?= $value['present_year'] ?>
                                                                                    </button>
                                                                                </h2>
                                                                                     <div id="collapse09<?= $value['present_year'] ?>" class="accordion-collapse collapse show" aria-labelledby="heading098<?= $value['present_year'] ?>" data-bs-parent="#accordionOne">
                                                                                    <?php
                                                                                    if (!empty($value['present_year'])) {
                                                                                        $date = $value['present_year'];
                                                                                    ?>
                                                                                        <div class="accordion-body ">

                                                                                            <div class="table-responsive table-card">
                                                                                                <table class="table align-middle table-nowrap mb-0">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Policy No.</th>
                                                                                                            <th>Disposition</th>
                                                                                                            <th>Gross Premium</th>
                                                                                                            <th>Call Date</th>
                                                                                                            <th>Remark</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                       <?php
                                                                                                        $renewal_remark = $this->Form_model->get_renewal_remark($sale_details[0]['id'], $date);
                                                                                                        foreach ($renewal_remark as $value) {
                                                                                                            $json = json_decode($value['remark'], true);
                                                                                                            if (!empty($json)) {
                                                                                                        ?>
                                                                                                                <tr>
                                                                                                                    <td><?= $value['policy_no'] ?></td>
                                                                                                                    <td><?php if (!empty($value['disposition'])) {
                                                                                                                            $disp_id = $value['disposition'];
                                                                                                                            $this->db->select('disposition');
                                                                                                                            $this->db->from('disposition');
                                                                                                                            $this->db->where('id', $disp_id);
                                                                                                                            $this->db->where('flag', '0');
                                                                                                                            $rows1 = $this->db->get()->row();
                                                                                                                            echo $rows1->disposition;
                                                                                                                        }
                                                                                                                        ?></td>
                                                                                                                    <td><?php
                                                                                                                        if (!empty($json['Gross Premium'])) {
                                                                                                                            echo $json['Gross Premium'];
                                                                                                                        } else {
                                                                                                                            echo "NA";
                                                                                                                        } ?></td>
                                                                                                                    <td><?= $value['created_at'] ?></td>
                                                                                                                    <td><?php
                                                                                                                        if (!empty($json['Port IN Remark'])) {
                                                                                                                            echo $json['Port IN Remark'];
                                                                                                                        } else {
                                                                                                                            echo "NA";
                                                                                                                        } ?></td>

                                                                                                                </tr>
                                                                                                        <?php } 
                                                                                                        } ?>


                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>

                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane" id="nav-border-justified-messages" role="tabpanel">
                                                                    <h6>Year Wise Remark Here</h6>

                                                                    <div class="accordion" id="accordionExample77">
                                                                        <?php foreach ($present_date as $value) { ?>
                                                                            <div class="accordion-item">
                                                                                <h2 class="accordion-header" id="heading01<?= $value['present_year'] ?>">
                                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse02<?= $value['present_year'] ?>" aria-expanded="true" aria-controls="collapse02<?= $value['present_year'] ?>">
                                                                                        <?= $value['present_year'] ?>
                                                                                    </button>
                                                                                </h2>
                                                                                <div id="collapse02<?= $value['present_year'] ?>" class="accordion-collapse collapse show" aria-labelledby="heading01<?= $value['present_year'] ?>" data-bs-parent="#accordionExample77">
                                                                                    <?php
                                                                                    if (!empty($value['present_year'])) {
                                                                                        $date = $value['present_year'];
                                                                                    ?>

                                                                                        <div class="accordion-body">
                                                                                            <div class="table-responsive table-card">
                                                                                                <table class="table align-middle table-nowrap mb-0">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Policy No.</th>
                                                                                                            <th>Patient Name</th>
                                                                                                            <th>Disposition</th>

                                                                                                            <th>Total Approved Amount</th>
                                                                                                            <th>Remark</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php
                                                                                                        $claim_remark =  $this->Form_model->get_claim_remark('claim', 'policy_no', $sale_details[0]['policy_no'], $value['present_year']);

                                                                                                        foreach ($claim_remark as $data) { ?>

                                                                                                            <tr>
                                                                                                                <td><?= $data['policy_no'] ?></td>
                                                                                                                <td><?= $data['patient_name'] ?></td>
                                                                                                                <td><?= $data['claim_status'] ?></td>

                                                                                                                <td><?= $data['total_approve_amt'] ?></td>
                                                                                                                <td><?= $data['remarks'] ?></td>
                                                                                                            </tr>

                                                                                                        <?php } ?>

                                                                   
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                       
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="nav-border-justified-messages" role="tabpanel">
                                                                    <h6>Year Wise Remark Here</h6>
                                                                    <!-- Base Example -->
                                                                   <div class="accordion" id="accordionExample77">
                                                                        <?php foreach ($present_date as $value) { ?>
                                                                            <div class="accordion-item">
                                                                                <h2 class="accordion-header" id="heading01<?= $value['present_year'] ?>">
                                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse02<?= $value['present_year'] ?>" aria-expanded="true" aria-controls="collapse02<?= $value['present_year'] ?>">
                                                                                        <?= $value['present_year'] ?>
                                                                                    </button>
                                                                                </h2>
                                                                                   <div id="collapse02<?= $value['present_year'] ?>" class="accordion-collapse collapse show" aria-labelledby="heading01<?= $value['present_year'] ?>" data-bs-parent="#accordionExample77">
                                                                                    <?php
                                                                                    if (!empty($value['present_year'])) {
                                                                                        $date = $value['present_year'];
                                                                                    ?>

                                                                                        <div class="accordion-body">
                                                                                            <div class="table-responsive table-card">
                                                                                                <table class="table align-middle table-nowrap mb-0">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Policy No.</th>
                                                                                                            <th>Patient Name</th>
                                                                                                            <th>Disposition</th>

                                                                                                            <th>Total Approved Amount</th>
                                                                                                            <th>Remark</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php
                                                                                                        $claim_remark =  $this->Form_model->get_claim_remark('claim', 'policy_no', $sale_details[0]['policy_no'], $value['present_year']);

                                                                                                        foreach ($claim_remark as $data) { ?>

                                                                                                            <tr>
                                                                                                                <td><?= $data['policy_no'] ?></td>
                                                                                                                <td><?= $data['patient_name'] ?></td>
                                                                                                                <td><?= $data['claim_status'] ?></td>

                                                                                                                <td><?= $data['total_approve_amt'] ?></td>
                                                                                                                <td><?= $data['remarks'] ?></td>
                                                                                                            </tr>

                                                                                                        <?php } ?>

                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>

                                                                                        </div>

                                                                                </div>
                                                                            </div>

                                                                    <?php } else {
                                                                                        echo "NA";
                                                                                    }
                                                                                } ?>

                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                </div><!-- end col -->


                                            </div><!-- end row -->

                                        </div><!-- end col -->
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
<?php include 'footer.php'; ?>
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






</body>

</html>