<?php include 'link.php';
$model_short_name = $this->uri->segment(2);


?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'topar.php'; ?>

    <?php include 'imgheader.php'; ?>
    <?php include 'sidebar.php'; ?>
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

    #idmain {
        display: none;
    }

    #i1 {}

    #i2 {
        display: none;
    }

    #i3 {
        display: none;
    }

    #i4 {
        display: none;
    }

    #i5 {
        display: none;
    }

    #i6 {
        display: none;
    }
    #i7 {
        display: none;
    }
    #i8 {
        display: none;
    }
    .hr{
        display: none;
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
                        <h4 class="mb-sm-0">Sale Closure</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Sale Closure</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Add Sale Closure</h4>


                        </div><!-- end card header -->
                        <div class="card-body">


                            <div class="live-preview">

                                <form method="POST" id="addSubadmin">
                                    <div class="row">
                                        <!-- first-->
                                        <div class="col-md-12 ">
                                            <h5 class="mb-3"><b>PERSONAL INFORMATION</b></h5>
                                            <div class="row">
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Proposer Name
                                                            <span class="setredcolor"></span></label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="proposer_name" id="proposer_name" aria-describedby="emailHelp" placeholder="Enter Proposer Name">
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">DOB(Eldest
                                                            Member) </label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dob" value="1980-01-01">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label"> City
                                                        </label>
                                                        <input class="search__input search form-control" name="customer_city" type="text" placeholder="Enter Your City" placeholder="Enter City">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Email ID </label>
                                                        <input type="email" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="email" id="email" placeholder="Enter Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Contact No
                                                        </label>
                                                        <input type="number" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="contact" id="contact" placeholder="Enter Contact No.">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Alternate No
                                                        </label>
                                                        <input type="number" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="alternate_no" id="alternate_no" placeholder="Enter Alternate No.">
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                        <hr>
                                        <!-- second-->
                                        <div class="col-md-12 ">
                                            <h5 class="mb-3"><b>POLICY DETAILS</b></h5>
                                            <div class="row">
                                               


                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Policy Type</label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="policy_type" name="policy_type" onchange="policy_type_action();">
                                                            <option value="" selected>Select</option>
                                                            <option value="fresh">Fresh</option>
                                                            <option value="Port">Port</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc" id="policy_type_action_2" >
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Portability
                                                            Duration </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="portability_duration" id="portability_duration">
                                                            <option value="" selected>Select</option>
                                                            <option value="na">NA</option>
                                                            <option value="1 Year">1 Year</option>
                                                            <option value="2 Year">2 Year</option>
                                                            <option value="3 Year">3 Year</option>
                                                            <option value="4 Year">4 Year</option>
                                                            <option value="5 Year">5 Year</option>

                                                            <option value="6 Year">6 Year</option>
                                                            <option value="7 Year">7 Year</option>
                                                            <option value="8 Year">8 Year</option>
                                                            <option value="9 Year">9 Year</option>
                                                            <option value="10 Year">10 Year</option>

                                                            <option value="11 Year">11 Year</option>
                                                            <option value="12 Year">12 Year</option>
                                                            <option value="13 Year">13 Year</option>
                                                            <option value="14 Year">14 Year</option>
                                                            <option value="15 Year">15 Year</option>

                                                            <option value="16 Year">16 Year</option>
                                                            <option value="17 Year">17 Year</option>
                                                            <option value="18 Year">18 Year</option>
                                                            <option value="19 Year">19 Year</option>
                                                            <option value="20 Year">20 Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc" id="policy_type_action_1">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">PORT COMPANY
                                                        </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="portability" id="portability">
                                                            <option value="" selected>Select</option>
                                                            <?php foreach ($company as $data) {
                                                            ?>
                                                                <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['company_name'])) {
                                                                                                        if ($content[0]['id'] == $data['id']) {
                                                                                                            echo "selected";
                                                                                                        }
                                                                                                    } ?>><?= $data['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc" id="policy_type_action_1_1">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Portability End Date
                                                        </label>
                                                        <input type="date" name="port_end_date" id="port_end_date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Policy No</label>
                                                        <input type="text" class="form-control" id="exampleInputno" name="policy_no" id="policy_no" aria-describedby="emailHelp" placeholder="Enter Policy No.">
                                                      <div class="error" id="policy_exist"></div>
                                                    </div>
                                                </div>                                                          
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Company Name
                                                        </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="company_name" id="company_name" onchange="fetchproduct(this.value)">
                                                            <option value="" selected>Select</option>
                                                            <?php foreach ($company as $data) {
                                                            ?>
                                                                <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['company_name'])) {
                                                                                                        if ($content[0]['id'] == $data['id']) {
                                                                                                            echo "selected";
                                                                                                        }
                                                                                                    } ?>><?= $data['name'] ?></option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Product Name
                                                        </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="product_name" id="product_name">
                                                            <!-- <option value=""selected>Select</option>
                                                            <option value="NCB Super Premium">NCB Super Premium</option>
                                                            <option value="Care plus">Care plus</option>
                                                            <option value="Max Saver">Max Saver</option>
                                                            <option value="Health Companion">Health Companion</option>
                                                            <option value="Health gain">Health gain</option>
                                                            <option value="Prime – Protect">Prime – Protect</option>
                                                            <option value="ProHealth - Plus">ProHealth - Plus</option> -->
                                                             <option value=""selected>Select</option>
                                                            <?php
                                                foreach ($products as $values) {
                                                ?>
                                                    <option value="<?php echo $values['product_name']; ?>"><?php echo $values['product_name']; ?></option>

                                                <?php
                                                }
                                                ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Booked Date</label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_of_closure" id="date_of_closure">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Sum Assured
                                                        </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sum_assured_1" id="sum_assured_1">
                                                            <option value=""selected>Select</option>
                                                            <option value="200000">200000</option>
                                                            <option value="300000">300000</option>
                                                            <option value="350000">350000</option>

                                                            <option value="400000">400000</option>
                                                            <option value="450000">450000</option>
                                                            <option value="500000">500000</option>

                                                            <option value="550000">550000</option>
                                                            <option value="600000">600000</option>
                                                            <option value="650000">650000</option>

                                                            <option value="700000">700000</option>
                                                            <option value="750000">750000</option>
                                                            <option value="1000000">1000000</option>

                                                            <option value="1050000">1050000</option>
                                                          <option value="1050000">1100000</option>
                                                           <option value="1050000">1500000</option>
                                                            <option value="2000000">2000000</option>
                                                            <option value="2050000">2050000</option>
															 <option value="1050000">2500000</option>
                                                            <option value="3000000">3000000</option>
                                                            <option value="4000000">4000000</option>
                                                            <option value="5000000">5000000</option>


                                                            <option value="7500000">7500000</option>
                                                            <option value="8000000">8000000</option>

                                                            <option value="9000000">9000000</option>
                                                            <option value="10000000">10000000</option>


                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Cover Type</label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="cover_type" id="cover_type">
                                                            <option value=""selected>Select</option>
                                                            <option value="Individual">Individual</option>
                                                            <option value="Floater">Floater</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Family Type
                                                        </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="coverage_type" id="coverage_type">
 														<option selected>Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            

                                            
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Medical Required
                                                        </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medical" id="medical">
                                                            <option value="" selected>Is Medical Required?</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Data Source</label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="data_source" id="data_source">
                                                            <option value="" selected>Select</option>
                                                            <option value="Data 1">Data 1</option>
                                                            <option value="Data 3">Data 3</option>
                                                            <option value="NIVA">NIVA</option>
                                                            <option value="02">02</option>
                                                            <option value="Reference">Reference</option>
                                                            <option value="Port In">Port In</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Zone</label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="zone">
                                                            <option value="" selected>Select</option>
                                                            <option value="Zone 1">Zone 1</option>
                                                            <option value="Zone 2">Zone 2</option>
                                                            <option value="Zone 3">Zone 3</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">AGENT</label>
                                                        <input type="agent" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="agent" id="agent" placeholder="Enter Agent Name">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <hr>
                                        <!-- THree-->

                                        <div class="col-md-12" id="idmain">
                                            <h5 class="mb-3"><b>INSURED DETAILS</b></h5>

                                            <div class="row" id="i1">
                                               
                                               
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3" >
                                                        <label for="exampleInputEmail1" class="form-label mt-3">NAME
                                                            <span class="setredcolor"></span></label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="insured_1_name" id="proposer_name" aria-describedby="emailHelp" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_1_gender">
                                                        <option value="" selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                                                            <span class="setredcolor"></span></label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" name="insured_1_dob" id="insured_1_dob" aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                                                        <select class="form-select form-select-sm insured_1_rel" aria-label=".form-select-sm example" name="insured_1_relation" >
                                                        <option value="" selected>Select</option>
                                                           <option value="Self">Self</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother In Law">Mother In Law</option>
                                                        <option value="Father In Law">Father In Law</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                               
                                               
                                              
                                              <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height) </label>
                                                        <select class="form-select form-select-sm insured_1_feet" aria-label=".form-select-sm example" name="insured_1_feet">
                                                        <option value="" selected>Select</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                              	 <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height) </label>
                                                        <select class="form-select form-select-sm insured_1_inch" aria-label=".form-select-sm example" name="insured_1_inch">
                                                        <option value="" selected>Select</option>
                                                           <option value="0">0</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                           <option value="8">8</option>
                                                           <option value="9">9</option>
                                                           <option value="10">10</option>
                                                           <option value="11">11</option>
                                                           <option value="12">12</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Weight </label>
                                                        <select class="form-select form-select-sm insured_1_weight" aria-label=".form-select-sm example" name="insured_1_weight" >
                                                        <option value="" selected>Select</option>
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 1
                                                        <textarea class="form-control" placeholder="Insured PED 1" id="floatingTextarea" name="insured_1_ped" id="insured_1_ped"></textarea>
                                                    </div>
                                                </div>
												<div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Any Claim
                                                        <textarea class="form-control" placeholder="Any claim" id="floatingTextarea" name="insured_1_claim" id="insured_1_claim"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                                                            
                                                        <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_1_ped" id="underwriter_1_ped"></textarea>
                                                    </div> 
                                                </div>
                                                     <hr>
    										</div>
                                               
                                            <div class="row" id="i2">
                                               
                                                
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3" >
                                                        <label for="exampleInputEmail1" class="form-label mt-3">NAME
                                                            <span class="setredcolor"></span></label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="insured_2_name" id="insured_2_name" aria-describedby="emailHelp" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_2_gender">
                                                        <option value="" selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                                                            <span class="setredcolor"></span></label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" name="insured_2_dob" id="insured_2_dob" aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_2_relation">
                                                        <option value="" selected>Select</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother In Law">Mother In Law</option>
                                                        <option value="Father In Law">Father In Law</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                              
                                               <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height) </label>
                                                        <select class="form-select form-select-sm insured_2_feet" aria-label=".form-select-sm example" name="insured_2_feet">
                                                        <option value="" selected>Select</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                              	 <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height) </label>
                                                        <select class="form-select form-select-sm insured_2_inch" aria-label=".form-select-sm example" name="insured_2_inch">
                                                        <option value="" selected>Select</option>
                                                             <option value="0">0</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                           <option value="8">8</option>
                                                           <option value="9">9</option>
                                                           <option value="10">10</option>
                                                           <option value="11">11</option>
                                                           <option value="12">12</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Weight </label>
                                                        <select class="form-select form-select-sm insured_2_weight" aria-label=".form-select-sm example" name="insured_2_weight" >
                                                       <option value="" selected>Select</option>
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 2
                                                            
                                                        <textarea class="form-control" placeholder="Insured PED 2" id="floatingTextarea" name="insured_2_ped" id="insured_2_ped"></textarea>
                                                    </div>
                                                </div>
												<div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Any Claim
                                                        <textarea class="form-control" placeholder="Any claim" id="floatingTextarea" name="insured_2_claim" id="insured_2_claim"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                                                            
                                                        <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_2_ped" id="underwriter_2_ped"></textarea>
                                                    </div>
                                                </div>
                                                  <hr>
										 </div>

                                            <div class="row" id="i3">
                                               
                                             
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3" >
                                                        <label for="exampleInputEmail1" class="form-label mt-3">NAME
                                                            <span class="setredcolor"></span></label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="insured_3_name" id="insured_3_name" aria-describedby="emailHelp" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_3_gender">
                                                        <option value="" selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                                                            <span class="setredcolor"></span></label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" name="insured_3_dob" id="insured_3_dob" aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_3_relation">
                                                        <option value="" selected>Select</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother In Law">Mother In Law</option>
                                                        <option value="Father In Law">Father In Law</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                              
                                               <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height) </label>
                                                        <select class="form-select form-select-sm insured_3_feet" aria-label=".form-select-sm example" name="insured_3_feet">
                                                        <option value="" selected>Select</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                              	 <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height) </label>
                                                        <select class="form-select form-select-sm insured_3_inch" aria-label=".form-select-sm example" name="insured_3_inch">
                                                        <option value="" selected>Select</option>
                                                             <option value="0">0</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                           <option value="8">8</option>
                                                           <option value="9">9</option>
                                                           <option value="10">10</option>
                                                           <option value="11">11</option>
                                                           <option value="12">12</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Weight </label>
                                                        <select class="form-select form-select-sm insured_3_weight" aria-label=".form-select-sm example" name="insured_3_weight" >
                                                       <option value="" selected>Select</option>
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 3
                                                            
                                                        <textarea class="form-control" placeholder="Insured PED 3" id="floatingTextarea" name="insured_3_ped" id="insured_3_ped"></textarea>
                                                    </div>
                                                </div>
												<div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Any Claim
                                                        <textarea class="form-control" placeholder="Any claim" id="floatingTextarea" name="insured_3_claim" id="insured_3_claim"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                                                            
                                                        <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_3_ped" id="underwriter_3_ped"></textarea>
                                                    </div>
                                                </div>
<hr>
                                                
                                               
                                            </div>

                                            <div class="row" id="i4">
                                               
                                               
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3" >
                                                        <label for="exampleInputEmail1" class="form-label mt-3">NAME
                                                            <span class="setredcolor"></span></label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="insured_4_name" id="insured_4_name" aria-describedby="emailHelp" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_4_gender">
                                                        <option value="" selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                                                            <span class="setredcolor"></span></label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" name="insured_4_dob" id="insured_4_dob" aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_4_relation">
                                                        <option value="" selected>Select</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother In Law">Mother In Law</option>
                                                        <option value="Father In Law">Father In Law</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                              
                                               <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height) </label>
                                                        <select class="form-select form-select-sm insured_4_feet" aria-label=".form-select-sm example" name="insured_4_feet">
                                                        <option value="" selected>Select</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                              	 <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height) </label>
                                                        <select class="form-select form-select-sm insured_4_inch" aria-label=".form-select-sm example" name="insured_4_inch">
                                                        <option value="" selected>Select</option>
                                                             <option value="0">0</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                           <option value="8">8</option>
                                                           <option value="9">9</option>
                                                           <option value="10">10</option>
                                                           <option value="11">11</option>
                                                           <option value="12">12</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Weight </label>
                                                        <select class="form-select form-select-sm insured_4_weight" aria-label=".form-select-sm example" name="insured_4_weight" >
                                                       <option value="" selected>Select</option>
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 4
                                                            
                                                        <textarea class="form-control" placeholder="Insured PED 4" id="floatingTextarea" name="insured_4_ped" id="insured_4_ped"></textarea>
                                                    </div>
                                                </div>
												<div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Any Claim
                                                        <textarea class="form-control" placeholder="Any claim" id="floatingTextarea" name="insured_4_claim" id="insured_4_claim"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                                                            
                                                        <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_4_ped" id="underwriter_4_ped"></textarea>
                                                    </div>
                                                </div>

                                                <hr>
                    				 </div>
                      				 <div class="row" id="i5">
                                               <div class="col-md-2 setcalc">
                                                    <div class="mb-3" >
                                                        <label for="exampleInputEmail1" class="form-label mt-3">NAME
                                                            <span class="setredcolor"></span></label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="insured_5_name" id="insured_5_name" aria-describedby="emailHelp" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_5_gender">
                                                        <option value="" selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                                                            <span class="setredcolor"></span></label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" name="insured_5_dob" id="insured_5_dob" aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_5_relation">
                                                        <option value="" selected>Select</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother In Law">Mother In Law</option>
                                                        <option value="Father In Law">Father In Law</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                               
                                        <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height) </label>
                                                        <select class="form-select form-select-sm insured_5_feet" aria-label=".form-select-sm example" name="insured_5_feet">
                                                        <option value="" selected>Select</option>
                                                          
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                              	 <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height) </label>
                                                        <select class="form-select form-select-sm insured_5_inch" aria-label=".form-select-sm example" name="insured_5_inch">
                                                        <option value="" selected>Select</option>
                                                             <option value="0">0</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                           <option value="8">8</option>
                                                           <option value="9">9</option>
                                                           <option value="10">10</option>
                                                           <option value="11">11</option>
                                                           <option value="12">12</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Weight </label>
                                                        <select class="form-select form-select-sm insured_5_weight" aria-label=".form-select-sm example" name="insured_5_weight" >
                                                       <option value="" selected>Select</option>
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 5
                                                            
                                                        <textarea class="form-control" placeholder="Insured PED 5" id="floatingTextarea" name="insured_5_ped" id="insured_5_ped"></textarea>
                                                    </div>
                                                </div>
												<div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Any Claim
                                                        <textarea class="form-control" placeholder="Any claim" id="floatingTextarea" name="insured_5_claim" id="insured_5_claim"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                                                            
                                                        <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_5_ped" id="underwriter_5_ped"></textarea>
                                                    </div>
                                                </div>

                                                
                                               <hr>
                                            </div>

                                            <div class="row" id="i6">
                                               
                                               
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3" >
                                                        <label for="exampleInputEmail1" class="form-label mt-3">NAME
                                                            <span class="setredcolor"></span></label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="insured_6_name" id="insured_6_name" aria-describedby="emailHelp" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_6_gender">
                                                        <option value="" selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                                                            <span class="setredcolor"></span></label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" name="insured_6_dob" id="insured_6_dob" aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_6_relation">
                                                        <option value="" selected>Select</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother In Law">Mother In Law</option>
                                                        <option value="Father In Law">Father In Law</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                               
                                               <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height) </label>
                                                        <select class="form-select form-select-sm insured_6_feet" aria-label=".form-select-sm example" name="insured_6_feet">
                                                        <option value="" selected>Select</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                              	 <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height) </label>
                                                        <select class="form-select form-select-sm insured_7_inch" aria-label=".form-select-sm example" name="insured_7_inch">
                                                        <option value="" selected>Select</option>
                                                             <option value="0">0</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                           <option value="8">8</option>
                                                           <option value="9">9</option>
                                                           <option value="10">10</option>
                                                           <option value="11">11</option>
                                                           <option value="12">12</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Weight </label>
                                                        <select class="form-select form-select-sm insured_6_weight" aria-label=".form-select-sm example" name="insured_6_weight" >
                                                       <option value="" selected>Select</option>
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 6
                                                            
                                                        <textarea class="form-control" placeholder="Insured PED 6" id="floatingTextarea" name="insured_6_ped" id="insured_6_ped"></textarea>
                                                    </div>
                                                </div>
 												<div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Any Claim
                                                        <textarea class="form-control" placeholder="Any claim" id="floatingTextarea" name="insured_6_claim" id="insured_6_claim"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                                                            
                                                        <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_6_ped" id="underwriter_6_ped"></textarea>
                                                    </div>
                                                </div>

                                                <hr>
                                               
                                            </div>

                                            <div class="row" id="i7">
                                               
                                               
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3" >
                                                        <label for="exampleInputEmail1" class="form-label mt-3">NAME
                                                            <span class="setredcolor"></span></label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="insured_7_name" id="insured_7_name" aria-describedby="emailHelp" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_7_gender">
                                                        <option value="" selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                                                            <span class="setredcolor"></span></label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" name="insured_7_dob" id="insured_7_dob" aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_7_relation">
                                                        <option value="" selected>Select</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother In Law">Mother In Law</option>
                                                        <option value="Father In Law">Father In Law</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                              
                                               <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height) </label>
                                                        <select class="form-select form-select-sm insured_7_feet" aria-label=".form-select-sm example" name="insured_7_feet">
                                                        <option value="" selected>Select</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                              	 <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height) </label>
                                                        <select class="form-select form-select-sm insured_7_inch" aria-label=".form-select-sm example" name="insured_7_inch">
                                                        <option value="" selected>Select</option>
                                                             <option value="0">0</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                           <option value="8">8</option>
                                                           <option value="9">9</option>
                                                           <option value="10">10</option>
                                                           <option value="11">11</option>
                                                           <option value="12">12</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Weight </label>
                                                        <select class="form-select form-select-sm insured_7_weight" aria-label=".form-select-sm example" name="insured_7_weight" >
                                                       <option value="" selected>Select</option>
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 7
                                                            
                                                        <textarea class="form-control" placeholder="Insured PED 7" id="floatingTextarea" name="insured_7_ped" id="insured_7_ped"></textarea>
                                                    </div>
                                                </div>
												<div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Any Claim
                                                        <textarea class="form-control" placeholder="Any claim" id="floatingTextarea" name="insured_7_claim" id="insured_7_claim"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                                                            
                                                        <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_7_ped" id="underwriter_7_ped"></textarea>
                                                    </div>
                                                </div>

                                                <hr>
                                               
                                            </div>

                                            <div class="row" id="i8">
                                               
                                               
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3" >
                                                        <label for="exampleInputEmail1" class="form-label mt-3">NAME
                                                            <span class="setredcolor"></span></label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name="insured_8_name" id="insured_8_name" aria-describedby="emailHelp" placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_8_gender">
                                                        <option value="" selected>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                                                            <span class="setredcolor"></span></label>
                                                        <input type="date" class="form-control" id="exampleInputEmail1" name="insured_8_dob" id="insured_8_dob" aria-describedby="emailHelp">
                                                    </div>
                                                </div>

                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_8_relation">
                                                        <option value="" selected>Select</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Son">Son</option>
                                                        <option value="Daughter">Daughter</option>
                                                        <option value="Mother">Mother</option>
                                                        <option value="Father">Father</option>
                                                        <option value="Mother In Law">Mother In Law</option>
                                                        <option value="Father In Law">Father In Law</option>
                                                        <option value="Brother">Brother</option>
                                                        <option value="Sister">Sister</option>
                                                    </select>
                                                           
                                                    </div>
                                                </div>
                                               
                                               <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height) </label>
                                                        <select class="form-select form-select-sm insured_8_feet" aria-label=".form-select-sm example" name="insured_8_feet">
                                                        <option value="" selected>Select</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                              	 <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height) </label>
                                                        <select class="form-select form-select-sm insured_8_inch" aria-label=".form-select-sm example" name="insured_8_inch">
                                                        <option value="" selected>Select</option>
                                                             <option value="0">0</option>
                                                          <option value="1">1</option>
                                                          <option value="2">2</option>
                                                          <option value="3">3</option>
                                                           <option value="4">4</option>
                                                           <option value="5">5</option>
                                                           <option value="6">6</option>
                                                           <option value="7">7</option>
                                                           <option value="8">8</option>
                                                           <option value="9">9</option>
                                                           <option value="10">10</option>
                                                           <option value="11">11</option>
                                                           <option value="12">12</option>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Weight </label>
                                                        <select class="form-select form-select-sm insured_8_weight" aria-label=".form-select-sm example" name="insured_8_weight" >
                                                       <option value="" selected>Select</option>
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                                                        </select>
                                                           
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 8
                                                            
                                                        <textarea class="form-control" placeholder="Insured PED 8" id="floatingTextarea" name="insured_8_ped" id="insured_2_ped"></textarea>
                                                    </div>
                                                </div>
												<div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">Any Claim
                                                        <textarea class="form-control" placeholder="Any claim" id="floatingTextarea" name="insured_8_claim" id="insured_8_claim"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 setcalc">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                                                            
                                                        <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_8_ped" id="underwriter_2_ped"></textarea>
                                                    </div>
                                                </div>

                                                
                                               
                                            </div>

                                        </div>
                                        <hr id="idmain">
                                        <!--<hr class="hr">-->
                                        
                                        <!-- Four-->
                                        <div class="col-md-8 ">
                                            <h5 class="mb-3"><b>PREMIUM DETAILS</b></h5>
                                            <div class="row">
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Gross Premium</label>
                                                        <input type="number" class="form-control" id="gross_premium" onkeyup="calnet();" onkeydown="calnet();" aria-describedby="emailHelp" name="gross_premium" placeholder="Enter Gross Premium">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Net Premium </label>
                                                        <input type="number" class="form-control" aria-describedby="emailHelp" name="net_premium" id="net_premium" onkeyup="calgross();" onkeydown="calgross();" placeholder="Enter Net Premium">

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Payment Tenure </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="payment_tenure" id="payment_tenure">
                                                            <option value=""selected>Select</option>
                                                            <option value="1 year"> 1 year</option>
                                                            <option value="3 year ">3 year </option>
                                                            <option value=" 5 year"> 5 year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Payment Mode</label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="payment_mode" id="payment_mode">
                                                            <option value-"" selected>Select</option>
                                                            <option value="Offline Link">Offline Link</option>
                                                            <option value="Cheque">Cheque</option>
                                                            <option value="Online">Online</option>
                                                            <option value="Atom Star">Atom Star</option>
                                                            <option value="OTC NIVA">OTC NIVA</option>
                                                            <option value="Quick Payment Cigna">Quick Payment Cigna</option>
                                                            <option value="Cash">Cash</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Discount If Any</label>
                                                        <input type="text" class="form-control" id="exampleInputno" aria-describedby="emailHelp" placeholder="Discount"name="discount" id="discount">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Manager</label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="manager" id="manager">
                                                            <option value=""selected>Select</option>
                                                            <?php if (!empty($manager)) {
                                                                foreach ($manager as $value) { ?>
                                                                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Team Leader</label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tl" id="tl">
                                                            <option value="" selected>Select</option>
                                                            <?php if (!empty($team_leader)) {
                                                                foreach ($team_leader as $value) { ?>
                                                                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>
                                       
                                    </div>


                                    <hr>
                                    <!-- Five-->
                                    <?php if ($model_short_name == 'underwriter_verifier' || $model_short_name == 'operations') { ?>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <h5 class="mb-3"><b>UPLOAD DOCUMENTS</b></h5>
                                                <div class="col-md-6">
                                                    <input type="hidden" name="module_short_name" id="module_short_name" value="<?= $model_short_name ?>">




                                                    <div class="md-3">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="exampleInputno" class="form-label">Upload Documents</label>
                                                            </div>
                                                            <div class="col-md-4" style="text-align: right;">
                                                                <a onclick="add()" style="cursor: pointer;color:blue;"><b>Add more +</b></a>&nbsp;
                                                                <a onclick="remove()" style="cursor: pointer;color:red;"><b>Remove -</b></a>
                                                            </div>
                                                            <div class="col-md-8 mb-3" style='display:flex'>
                                                                <input type="text" class="form-control" name="doc_label[]" id="doc_label" placeholder="Enter Title of document">&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <label for="doc_image" class="uploaddata" style="background-color: #54b2e5;
                                                        padding: 4px 14px;
                                                        border-radius: 8px;margin-bottom:0px;" onChange="myFunction(1)">Upload</label>

                                                                <input type="file" class="form-control btn btn-primary" aria-describedby="emailHelp" name="doc_image[]" id="doc_image" style="display:none;">&nbsp;&nbsp;&nbsp;&nbsp;

                                                                <input type="checkbox" class="setcheck" name="status" value="true" id="uploaddata_1">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div id="new_chq"></div>
                                                        </div>
                                                        <input type="hidden" value="1" id="total_chq">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                            </div>
                        <?php } ?>



                        <button type="submit" class="btn btn-primary submit_form">Submit</button>
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








<?php include 'footer.php'; ?>
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

<script src="<?= base_url(); ?>assets/js/app.js"></script>
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
                        url: "<?= base_url() ?>user/deletesubadmin/id",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal('Record Deleted 🙂', ' ', 'success');
                            $("#delete" + id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
                            })

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
    function holdModal(exampleModalgrid) {
        $('#' + exampleModalgrid).modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    }
</script>
<script>
    //  add modal
    $(document).on('submit', '#addSubadmin', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
		var module_short_name =  $("#module_short_name").val();
        if (error == false) {
            $.ajax({
                url: "<?= base_url('form/addsubadmin'); ?>",
                type: 'post',
                data: formData,
              	beforeSend: function() {
                        $(".submit_form").html('<lord-icon src="https://cdn.lordicon.com/xjovhxra.json" trigger="loop" colors="primary:#109121" style="width:40px;height:40px;"></lord-icon>');

                   },
                success: function(result) {

                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                        swal('Sale Added 🙂', ' ', 'success');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                        window.location.href = '<?= base_url() ?>form_listing/sale_closure'+ module_short_name;
                    }

                    if (dataResult.done == '0') {
                        swal('Sale Not Added ☹️', ' ', 'success');
					}
                  
                  	if (dataResult.policy_no == '0') {
                        $('#policy_exist').html('Policy Already Exist');
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

<script type="text/javascript">
    function disableaccount(id) {
        event.preventDefault(); // prevent form submit

        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Disable User Account",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Disable Please",
                cancelButtonText: "No, cancel Please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?= base_url() ?>user/updatedisable/id",
                        type: "post",
                        data: {
                            id: id
                        },
                        success: function() {
                            swal('Account Disable 🙂', ' ', 'success');
                            $("#delete" + id).fadeTo("slow", 0.7, function() {
                                $(this).remove();
                            })
                            setTimeout(function() {
                                location.reload(true);
                            }, 1000);

                        },
                        error: function() {
                            swal('Account Still Enable ☹️', 'error');
                        }
                    });
                } else {
                    swal("Cancelled", "User Account is safe 🙂", "error");
                }

            });
    }
</script>

<script type="text/javascript">
    // update modal
    $(document).on('submit', '#changepasswordsubadmin', function(ev) {
        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        $.ajax({
            url: "<?= base_url() ?>user/changesubpass",
            type: 'post',
            data: formData,
            success: function(result) {
                //json data

                var dataResult = JSON.parse(result);
                if (dataResult.inserted == '1') {
                    swal('Password Changed 🙂', ' ', 'success');

                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);

                }

                if (dataResult.inserted == '0') {
                    swal('Password Not Changed ☹️', ' ', 'success');

                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);

                }

                if (dataResult.password == '0') {
                    swal('Current Password Mismatch ☹️', ' ', 'error');
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

    function showstates(id) {
        if (id != '') {

            $.ajax({
                url: '<?= base_url() ?>user/showstates/' + id,
                success: function(res) {

                    $(".state").html(res.output);

                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }

    function showcity(id) {

        if (id != '') {
            $.ajax({
                url: '<?= base_url() ?>Subadmin/showcity/' + id,
                success: function(res) {
                    $(".city").html(res.output);
                },
                error: function() {
                    alert("Fail")
                }
            });
        }
    }
</script>
<!-- filter Data -->

<script>
    //change password
    $(document).ready(function() {
        $("#changepasswordsubadmin").on('submit', (function(e) {
            e.preventDefault();
            err = 0;
            var formData = new FormData(this);
            formData.append('action', "enqdet");

            var new_pass = $("#new_pass").val();
            var confirm_pass = $("#confirm_pass").val();


            if (err == 0) {
                $.ajax({
                    url: "<?= base_url() ?>user/changesubpass",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#editpass").attr('disabled', true);
                    },
                    success: function(result) {
                        var response = JSON.parse(result);
                        $("#showerror").html(response.msg);
                        if (response.status == true) {
                            setTimeout(function() {
                                location.reload();
                            }, 1500);
                        }
                    }
                });
            }
        }));
    });


    function changepass(id, ipdid) {
        //console.log(id);
        $.ajax({
            url: '<?= base_url() ?>user/changepass/' + id,
            success: function(res) {

                $("#showclient_details").html(res);
            },
            error: function() {
                alert("Fail")

            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.changepass').click(function() {

            var userid = $(this).data('id');

            $.ajax({
                url: "<?= base_url('User/changepass'); ?>",
                type: "post",
                data: {
                    userid: userid
                },
                success: function(response) {

                    $('.modal-body').html(response);
                    $('.changepassword').modal('show');

                }
            })


        });
    });

    function calnet() {
        var gross_amt = $('#gross_premium').val();
        var net_amt = Math.round(Number(gross_amt) / 1.18);
        $("#net_premium").val(net_amt.toFixed(2));
        $('#net_premium').attr('readonly', true);
        if (gross_amt == '') {
            $('#net_premium').attr('readonly', false);
        }

    }

    function calgross() {
        var net_amt = $('#net_premium').val();
        var gross_amt = Math.round(Number(net_amt) + (Number(net_amt) * 0.18));
        $("#gross_premium").val(gross_amt.toFixed(2));
        $('#gross_premium').attr('readonly', true);
        if (net_amt == '') {
            $('#gross_premium').attr('readonly', false);
        }

    }

    function policy_type_action() {
        if ($('#policy_type').val() == 'fresh') {
            $('#policy_type_action_1').css("display", "none");
            $('#policy_type_action_1_1').css("display", "none");
            $('#policy_type_action_2').css("display", "none");
        } else {
            $('#policy_type_action_1').css("display", "block");
          $('#policy_type_action_1_1').css("display", "block");
            $('#policy_type_action_2').css("display", "block");
        }
    }


    $(document).ready(function() {
        $("#cover_type").change(function() {
            var val = $(this).val();
            if (val == "Individual") {
                $("#coverage_type").html("<option selected>Select</option><option value='1'>1</option>");
              	
            } else {
                $("#coverage_type").html("<option selected>Select</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option>");
				$('#idmain').css("display", "none");
              	$('#i1').css("display", "none");
                $('#i2').css("display", "none");
                $('#i3').css("display", "none");
                $('#i4').css("display", "none");
                $('#i5').css("display", "none");
                $('#i6').css("display", "none");
                $('#i7').css("display", "none");
                $('#i8').css("display", "none");
                $('.hr').css("display", "none");
            }
        });
    });


    $(document).ready(function() {
        $("#coverage_type").change(function() {
            var val = $(this).val();
            if (val == "1") {
                $('#idmain').css("display", "block");
              	$('#i1').css("display", "flex");
                $('#i2').css("display", "none");
                $('#i3').css("display", "none");
                $('#i4').css("display", "none");
                $('#i5').css("display", "none");
                $('#i6').css("display", "none");
                $('#i7').css("display", "none");
                $('#i8').css("display", "none");
                $('.hr').css("display", "block");

            } else if (val == "2") {
                $('#idmain').css("display", "block");
                $('#i1').css("display", "flex");
                $('#i2').css("display", "flex");
                $('#i3').css("display", "none");
                $('#i4').css("display", "none");
                $('#i5').css("display", "none");
                $('#i6').css("display", "none");
                $('#i7').css("display", "none");
                $('#i8').css("display", "none");
                $('.hr').css("display", "block");
            } else if (val == "3") {
                $('#idmain').css("display", "block");
                $('#i1').css("display", "flex");
                $('#i2').css("display", "flex");
                $('#i3').css("display", "flex");
                $('#i4').css("display", "none");
                $('#i5').css("display", "none");
                $('#i6').css("display", "none");
                $('#i7').css("display", "none");
                $('#i8').css("display", "none");
                $('.hr').css("display", "block");
            } else if (val == "4") {
                $('#idmain').css("display", "block");
                $('#i1').css("display", "flex");
                $('#i2').css("display", "flex");
                $('#i3').css("display", "flex");
                $('#i4').css("display", "flex");
                $('#i5').css("display", "none");
                $('#i6').css("display", "none");
                $('#i7').css("display", "none");
                $('#i8').css("display", "none");
                $('.hr').css("display", "block");
            } else if (val == "4" || val == "4") {
                $('#idmain').css("display", "block");
                $('#i1').css("display", "flex");
                $('#i2').css("display", "flex");
                $('#i3').css("display", "flex");
                $('#i4').css("display", "flex");
                $('#i5').css("display", "none");
                $('#i6').css("display", "none");
                $('#i7').css("display", "none");
                $('#i8').css("display", "none");
                $('.hr').css("display", "block");


            } else if (val == "5") {
                $('#idmain').css("display", "block");
                $('#i1').css("display", "flex");
                $('#i2').css("display", "flex");
                $('#i3').css("display", "flex");

                $('#i4').css("display", "flex");
                $('#i5').css("display", "flex");
                $('#i6').css("display", "none");
                $('#i7').css("display", "none");
                $('#i8').css("display", "none");
                $('.hr').css("display", "block");
            }else if (val == "6") {
                $('#idmain').css("display", "block");
                $('#i1').css("display", "flex");
                $('#i2').css("display", "flex");
                $('#i3').css("display", "flex");

                $('#i4').css("display", "flex");
                $('#i5').css("display", "flex");
                $('#i6').css("display", "flex");
                $('#i7').css("display", "none");
                $('#i8').css("display", "none");
                $('.hr').css("display", "block");
            }
            else if (val == "7") {
                $('#idmain').css("display", "block");
                $('#i1').css("display", "flex");
                $('#i2').css("display", "flex");
                $('#i3').css("display", "flex");

                $('#i4').css("display", "flex");
                $('#i5').css("display", "flex");
                $('#i6').css("display", "flex");
                $('#i7').css("display", "flex");
                $('#i8').css("display", "none");
                $('.hr').css("display", "block");
            }
            else if (val == "8") {
                $('#idmain').css("display", "block");
                $('#i1').css("display", "flex");
                $('#i2').css("display", "flex");
                $('#i3').css("display", "flex");

                $('#i4').css("display", "flex");
                $('#i5').css("display", "flex");
                $('#i6').css("display", "flex");
                $('#i7').css("display", "flex");
                $('#i8').css("display", "flex");
                $('.hr').css("display", "block");
            }


            
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function add() {
        var new_chq_no = parseInt($('#total_chq').val()) + 1;
        var new_input = "<div class='row'  id='new_" + new_chq_no + "' style='display:flex'><div class='col-md-5'><input type='text' class='form-control' name='doc_label[]' placeholder='Enter Title of document'></div> <div class='col-md-6 mb-3'><label for='doc_image' class='uploaddata' style='background-color: #54b2e5;padding: 4px 14px;border-radius: 8px;margin-bottom:0px;'>Upload</label><input type='file' class='form-control mb-3' aria-describedby='emailHelp' name='doc_image[]' style='display:none;'> </div> </div>";
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
<script type="text/javascript">
    function myFunction(id) {
        $("#uploaddata_" + id).attr('checked', 'checked');
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script>
    $('.search').typeahead({

        source: function(query, result) {
            $.ajax({
                url: "<?= base_url() ?>getcity",
                method: "POST",
                data: {
                    query: query
                },
                dataType: "json",
                success: function(data) {
                    result($.map(data, function(item) {
                        return item;
                    }));
                },

            })
        },

    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(function() {
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var minDate = year + '-' + month + '-' + day;

        $('#exampleInputEmail1').attr('min', minDate);
    });
</script>



<!-- <script>
    $(document).ready(function() {
        $('#company_name').on('change', function() {
            var comp_id = $('#company_name').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>products/getproduct',
                data: {
                    comp_id: comp_id
                },
                success: function(response) {
                    $('#product_name').html(response);

                }
            });

        });
    });
</script> -->

<script type="text/javascript">
    
     function fetchproduct(com_id) {
        var com_id = com_id;
        $.ajax({
            url: "<?php echo  base_url('products/getproduct'); ?>",
            type: "POST",
            data: {
                com_id: com_id
            },
            success: function(response) {
                //var dataResult = JSON.parse(response);
                $('#product_name').html(response);
               
            }
        })
    }
</script>
</body>

</html>