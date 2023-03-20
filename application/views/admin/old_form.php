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
    $(document).ready( function () {
    $('#Datatable1').DataTable();
} );
</script>
<style>
  .setredcolor{
    color:red;
  }
  .form-control {
    display: block;
    width: 100%;
    padding: 0.2rem 0.6rem!important;
  }
  .setwidthcol2{
    width:20%;
  }
  #i1 {
  	display:none;
  }
   #i2 {
  	display:none;
  }
   #i3 {
  	display:none;
  }
   #i4 {
  	display:none;
  }
   #i5 {
  	display:none;
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
                                <li class="breadcrumb-item"><a href="<?php base_url()?>Dashboard">Dashboards</a></li>
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
                          
                            <div class="flex-shrink-0">
                                <?php if($this->rbac->hasPrivilege($model_short_name,'can_add')) { ?>
                              	<a href="<?= base_url();?>form_listing" type="button" title="Add New Regional Head" class="btn btn-primary waves-effect waves-light"><i class="ri-arrow-left-fill"></i></a>
								<?php } ?>

                            </div>

                        </div><!-- end card header -->


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
                                        <form method="POST">
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
                                                            <option value="Underwriter/Verifier">Underwriter/Verifier</option>
                                                            <option value="Operations">Operations</option>
                                                            <option value="Services">Services</option>
                                                            <option value="Claims">Claims</option>
                                                            <option value="Renewals">Renewals</option>
                                                            <option value="Griveance/Customer Services">Griveance/Customer Services</option>
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

                        <div class="card-body">


                            <div class="live-preview">
								
                              <form method="POST" id="addSubadmin" style="width: 100%;">
                                <div class="row">
                                  <!-- first-->
                                  <div class="col-md-2 setwidthcol2">
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Proposer Name <span class="setredcolor">*</span></label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="proposer_name" id="proposer_name" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Policy_No <span class="setredcolor">*</span></label>
                                      <input type="text" class="form-control" id="exampleInputno" name="policy_no" id="policy_no" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3" id="policy_type_action_1">
                                      <label for="exampleInputno" class="form-label">Portability From <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="portability" id="portability">
                                        <option selected>Select Portability Form</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Medical Required <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medical" id="medical">
                                        <option selected>Is Medical Required?</option>
                                        <option value="yes">yes</option>
                                        <option value="No">No</option>
                                      
                                      </select>
                                    </div>
                                    <div class="mb-3" id="i1">
                                       <label for="exampleInputno" class="form-label">Insured 1 Ped <span class="setredcolor">*</span></label>
                                      <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="insured_1_ped" id="insured_1_ped"></textarea>
                                      </div>
                                    </div>
                                   	<div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Discount If Any <span class="setredcolor">*</span></label>
                                      <input type="text" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="discount" id="discount">
                                    </div>
                                     <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Remarks <span class="setredcolor">*</span></label>
                                       <textarea class="form-control" placeholder="Enter Your Remarks" name="remarks" id="remarks"></textarea>
                                 	</div>
                                  </div>
                                  <!-- second-->
                                  <div class="col-md-2 setwidthcol2">
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Company Name <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="company_name" id="company_name">
                                        <option selected>Select Company</option>
                                        <option value="Care health insaurance">Care health insaurance</option>
                                        <option value="Nivo health insaurance">Nivo health insaurance</option>
                                        <option value="Reliance general insaurance">Reliance general insaurance</option>
                                         <option value="Manipal signa heath insaurance">Manipal signa heath insaurance</option>
                                         <option value="Oriental insaurance">Oriental insaurance</option>
                                      
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Date Of Closure <span class="setredcolor">*</span></label>
                                      <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_of_closure" id="date_of_closure">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Cover Type <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="cover_type" id="cover_type">
                                        <option selected>Select Cover Type</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Floater">Floater</option>
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Payment Tenure <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="payment_tenure" id="payment_tenure">
                                        <option selected>Select Payment Tenure</option>
                                        <option value="1 year"> 1 year</option>
                                        <option value="3 year ">3 year </option>
                                        <option value=" 5 year"> 5 year</option>
                                      </select>
                                    </div>
                                    <div class="mb-3" id="i2">
                                       <label for="exampleInputno" class="form-label">Insured 2 Ped <span class="setredcolor">*</span></label>
                                      <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="insured_2_ped" id="insured_2_ped"></textarea>
                                      </div>
                                    </div>
                                   	<div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Alternate No <span class="setredcolor">*</span></label>
                                      <input type="number" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="alternate_no" id="alternate_no">
                                    </div>
                                    <?php if(!empty($disposition_name)){ ?>
                                	 <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Desposition <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="disposition_name" id="disposition_name">
                                        <option selected>Select Desposition..</option>
                                        <?php foreach($disposition_name as $val){ ?>
                                        <option value="<?=$val['id']?>"><?=$val['disposition']?></option>
                                       <?php } ?>
                                      </select>
                                    </div>
                                	<?php } ?>
                                    
                                   </div>
                                  
                                  <!-- THree-->
                                  <div class="col-md-2 setwidthcol2">
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Product Name <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="product_name" id="product_name">
                                        <option selected>Select Product</option>
                                        <option value="NCB Super Premium">NCB Super Premium</option>
                                        <option value="Care plus">Care plus</option>
                                        <option value="Max Saver">Max Saver</option>
                                        <option value="Health Companion">Health Companion</option>
                                        <option value="Health gain">Health gain</option>
                                        <option value="Prime – Protect">Prime – Protect</option>
                                        <option value="ProHealth - Plus">ProHealth - Plus</option>
                                        
                                      </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Sum Assured<span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sum_assured_1" id="sum_assured_1">
                                        <option selected>Select Sum Assured</option>
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
                                        
                                        <option value="1500000">1500000</option>
                                        <option value="2000000">2000000</option>
                                        <option value="2500000">2500000</option>
                                        
                                        <option value="3000000">3000000</option>
                                        <option value="4000000">4000000</option>
                                        <option value="5000000">5000000</option>
                                        
                                        
                                        <option value="7500000">7500000</option>
                                        <option value="9000000">9000000</option>
                                        
                                        <option value="9500000">9500000</option>
                                        <option value="10000000">10000000</option>
                                        
                                      
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Family Type <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="coverage_type" id="coverage_type">
                                        <option selected>Select Family Type</option>
                                        <option value="1_adult">1 Adult</option>
                                        <option value="1_adult_1_child">1 Adult+1 Child</option>
                                        <option value="1_adult_2_child">1 Adult+2 Child</option>
                                        <option value="1_adult_3_child">1 Adult+3 Child</option>
                                        <option value="2_adult">2 Adult</option>
                                        <option value="2_adult_1_child">2 Adult+1 Child</option>
                                        <option value="2_adult_2_child">2 Adult+2 Child</option>
                                        <option value="2_adult_3_child">2 Adult+3 Child</option>
                                       
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Data Source <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="data_source" id="data_source">
                                        <option selected>select menu..</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    </div>
                                    
                                    <div class="mb-3" id="i3">
                                       <label for="exampleInputno" class="form-label">Insured 3 Ped <span class="setredcolor">*</span></label>
                                      <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="insured_3_ped" id="insured_3_ped"></textarea>
                                      </div>
                                    </div>
                                   	<div class="mb-3">
                                      <label for="exampleInputno" class="form-label">TL <span class="setredcolor">*</span></label>
                                       <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tl" id="tl">
                                        <option selected>select menu..</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    </div>
                                    
                                   
                                    <div class="mb-3" style="width: 323%;">
                                       <?php $sess = $this->session->userdata('pmsadmin');
                                   
                                    $role = $sess['role'];
                                    if($role !='Master'){
                                    ?>
                                      <label for="exampleInputEmail1" class="form-label">Add Call Reminder & Remarks <span class="setredcolor">*</span></label>
                                      <div class="row" >
                                        <div class="col-md-6" style="z-index:99999;">
                                      		<input type="date" class="form-control" id="exampleInputEmail1" name="reminder_date" id="reminder_date" aria-describedby="emailHelp">
                                        </div>
                                        <div class="col-md-6" style="z-index:99999;">
                                      		<input type="text" class="form-control" id="exampleInputEmail1" name="reminder_title" id="reminder_title" placeholder="Add Your Call Reminder" aria-describedby="emailHelp">
                                        </div>
                                      </div>
                                       <?php } ?>
                                    </div>
                                    
                                    
                                  </div>
                                 
                                  
                                  
                                  
                                   <!-- Four-->
                                  <div class="col-md-2 setwidthcol2">
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Gross Premium <span class="setredcolor">*</span></label>
                                      <input type="number" class="form-control" id="gross_premium" onkeyup="calnet();" onkeydown="calnet();" aria-describedby="emailHelp" name="gross_premium">
                                    </div>
                                    
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Policy Type <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="policy_type" name="policy_type" onchange="policy_type_action();">
                                        <option selected>Select Policy Type</option>
                                        <option value="fresh">Fresh</option>
                                        <option value="Port">Port</option>
                                      </select>
                                    </div>
                                    <div class="mb-3" >
                                      <label for="exampleInputEmail1" class="form-label">DOB(Eldest Member) <span class="setredcolor">*</span></label>
                                      <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dob">
                                    </div>
                                    <div class="mb-3" >
                                      <label for="exampleInputno" class="form-label">Zone <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="zone">
                                        <option selected>select menu..</option>
                                        <option value="keshav puram">keshav puram</option>
                                        <option value="Azadpur">Azadpur</option>
                                        <option value="burari">burari</option>
                                      </select>
                                    </div>
                                    
                                    <div class="mb-3" id="i4">
                                       <label for="exampleInputno" class="form-label">Insured 4 Ped <span class="setredcolor">*</span></label>
                                      <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="insured_4_ped" id="insured_4_ped"></textarea>
                                      </div>
                                    </div>
                                     <div class="mb-3">
                                       	<label for="exampleInputno" class="form-label">Email ID <span class="setredcolor">*</span></label>
                                        <input type="email" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="email" id="email">
                                    </div>
                                    
                                    
                                    
                                   
                                   	
                                  </div>
                                  
                                   <!-- Five-->
                                  <div class="col-md-2 setwidthcol2">
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Net Premium <span class="setredcolor">*</span></label>
                                      
                                    <input type="number" class="form-control"  aria-describedby="emailHelp" name="net_premium" id="net_premium" onkeyup="calgross();" onkeydown="calgross();">

                                    </div>
                                    
                                    <div class="mb-3" id="policy_type_action_2">
                                      <label for="exampleInputno" class="form-label">Portability Duration <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="portability_duration" id="portability_duration">
                                        <option selected>Select Portability Duration</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Customer City <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="customer_city" id="customer_city">
                                        <option selected>Select City</option>
                                        <option value="delhi">delhi</option>
                                        <option value="mumbai">mumbai</option>chennai
                                        <option value="chennai">chennai</option>
                                      </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                      <label for="exampleInputno" class="form-label">Payment Mode <span class="setredcolor">*</span></label>
                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="payment_mode" id="payment_mode">
                                        <option selected>Select Payment Mode</option>
                                        <option value="upi">upi</option>
                                        <option value="bank">bank</option>
                                      </select>
                                    </div>
                                    <div class="mb-3" id="i5">
                                       <label for="exampleInputno" class="form-label">Insured 5 Ped <span class="setredcolor">*</span></label>
                                      <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="insured_3_ped" id="insured_3_ped"></textarea>
                                      </div>
                                    </div>
                                   
                                    
                                   
                                  

                                   	 </div>
                                  </div>
                                <input type="hidden" name = "module_short_name" id="module_short_name" value="<?=$model_short_name?>">
                                
                                	
                                	
                                    <?php if($model_short_name =='underwriter_verifier' || $model_short_name =='operations') {?>
                                    <div class="md-3">
                                        <div class="row">
                                            <label for="exampleInputno" class="form-label">Upload Documents <span
                                                    class="setredcolor">*</span></label>
                                            <div class="col-md-8 mb-3" style='display:flex'>
                                                <input type="text" class="form-control" name="doc_label[]"
                                                    id="doc_label" placeholder="Enter Title of document">
                                                <input type="file" class="form-control" aria-describedby="emailHelp"
                                                    name="doc_image[]" id="doc_image">
                                            </div>
                                            <div class="col-md-4">
                                                <button onclick="add()" class="btn btn-primary btn-sm">+</button>
                                                <button onclick="remove()" class="btn btn-danger btn-sm">-</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style='display:flex'>
                                            <div id="new_chq"></div>
                                        </div>
                                        <input type="hidden" value="1" id="total_chq">
                                    </div>
                                    <?php } ?>

                                
                                	
                                  
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
    



	



    <?php include 'footer.php'; ?>
</div>


<!-- JAVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="assets/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="assets/js/app.js"></script>
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
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>user/deletesubadmin/id",
          type: "post",
          data: {id:id},
          success:function(){
            swal('Record Deleted 🙂', ' ', 'success');
            $("#delete"+id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })

          },
          error:function(){
            swal('Record Not Deleted ☹️', 'error');
          }
      });
  }
  	else{
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
       
        if (error == false) {
            $.ajax({
                url: "<?= base_url('form/addsubadmin'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                   
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Sale Added 🙂', ' ', 'success');
                       setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                       window.location.href = '<?=base_url()?>form_listing';
                    }

                    if (dataResult.done == '0') {
                       swal('Sale Not Added ☹️', ' ', 'success');
                      

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
                url: "<?=base_url()?>user/updatesubadmi/",
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
                         
                    }
                    else
                    {

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
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>user/update/id",
          type: "post",
          data: {id:id},
          success:function(){
            swal('Account Enable 🙂', ' ', 'success');
            $("#delete"+id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
				location.reload(true);
			}, 1000);

          },
          error:function(){
            swal('Account Still Disable ☹️', 'error');
          }
      });
  }
  else {
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
           function(isConfirm){
             if (isConfirm) {
      $.ajax({
          url: "<?=base_url()?>user/updatedisable/id",
          type: "post",
          data: {id:id},
          success:function(){
            swal('Account Disable 🙂', ' ', 'success');
            $("#delete"+id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })
            setTimeout(function() {
				location.reload(true);
			}, 1000);

          },
          error:function(){
            swal('Account Still Enable ☹️', 'error');
          }
      });
  }
  else {
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
                url: "<?=base_url()?>user/changesubpass",
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
  if(id != '') {
   
    $.ajax({
        url: '<?=base_url()?>user/showstates/' + id,
        success: function (res) {
         
            $(".state").html(res.output);
           
        },
        error: function () {
            alert("Fail")
        }
    });
  }  
}

function showcity(id) {

  if(id != '') {
    $.ajax({
        url: '<?=base_url()?>Subadmin/showcity/' + id,
        success: function (res) {
            $(".city").html(res.output);
        },
        error: function () {
            alert("Fail")
        }
    });
  }  
}
</script>
<!-- filter Data -->

<script>
	
	//change password
	$(document).ready(function () {
		$("#changepasswordsubadmin").on('submit', (function (e) {
			e.preventDefault();
			err = 0;
			var formData = new FormData(this);
			formData.append('action', "enqdet");

			var new_pass = $("#new_pass").val();
			var confirm_pass = $("#confirm_pass").val();
		

			if (err == 0) {
			$.ajax({
				url: "<?=base_url()?>user/changesubpass",
				type: "POST",
				data: formData,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function () {
					$("#editpass").attr('disabled', true);
				},
				success: function (result) {
                  	var response = JSON.parse(result);
                  	$("#showerror").html(response.msg);
                  	if(response.status == true) {
                      setTimeout(function() {
                          location.reload();
                      }, 1500);
                    }  
				}
			});
			}
		}));
	});


	function changepass(id,ipdid) {
		//console.log(id);
		$.ajax({
			url: '<?=base_url()?>user/changepass/' + id,
			success: function (res){
				
				$("#showclient_details").html(res);
			},
			error: function () {
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
  
  function calnet()
  {
  	var gross_amt = $('#gross_premium').val();
    var net_amt = Number(gross_amt)/1.18;
   	$("#net_premium").val(net_amt.toFixed(2));
    $('#net_premium').attr('readonly', true);
    if(gross_amt=='')
    {
    	$('#net_premium').attr('readonly', false);
    }
    
  }
  
  function calgross()
  {
  	var net_amt = $('#net_premium').val();
    var gross_amt = Number(net_amt + (net_amt * 0.18));
   	$("#gross_premium").val(gross_amt.toFixed(2));
    $('#gross_premium').attr('readonly', true);
    if(net_amt=='')
    {
    	$('#gross_premium').attr('readonly', false);
    }
    
  }
  
  function policy_type_action()
  {
   	if ($('#policy_type').val() == 'fresh') {
                $('#policy_type_action_1').css("display", "none");
       			$('#policy_type_action_2').css("display", "none");
            }
      
    	else
        {
        	  $('#policy_type_action_1').css("display", "block");
       			$('#policy_type_action_2').css("display", "block");
        }
  }
  
  
  $(document).ready(function () {
    $("#cover_type").change(function () {
        var val = $(this).val();
        if (val == "Individual") {
            $("#coverage_type").html("<option selected>Select Family Type</option><option value='1_adult'>1 Adult</option>");
        } 
      
      	else
        {
        	$("#coverage_type").html("<option selected>Select Family Type</option><option value='1_adult_1_child'>1 Adult+1 Child</option><option value='1_adult_2_child'>1 Adult+2 Child</option><option value='1_adult_3_child'>1 Adult+3 Child</option><option value='2_adult'>2 Adult</option><option value='2_adult_1_child'>2 Adult+1 Child</option><option value='2_adult_2_child'>2 Adult+2 Child</option><option value='2_adult_3_child'>2 Adult+3 Child</option>");
          	
        }
    });
});
  
  
  $(document).ready(function () {
    $("#coverage_type").change(function () {
        var val = $(this).val();
        if (val == "1_adult") {
            $('#i1').css("display", "block");
        }
    else  if (val == "1_adult_1_child" || val == "2_adult") {
        $('#i1').css("display", "block");
            $('#i2').css("display", "block");
        } 
    else  if (val == "1_adult_2_child" || val == "2_adult_1_child") {
        $('#i1').css("display", "block");
            $('#i2').css("display", "block");
             $('#i3').css("display", "block");
        } 
     else if (val == "1_adult_3_child") {
         $('#i1').css("display", "block");
            $('#i2').css("display", "block");
             $('#i3').css("display", "block");
            $('#i4').css("display", "block");
        }
      	
     else if (val == "1_adult_3_child" || val == "2_adult_2_child") {
        $('#i1').css("display", "block");
            $('#i2').css("display", "block");
             $('#i3').css("display", "block");
           
            $('#i4').css("display", "block");
        }
      	
    else if (val == "2_adult_3_child" ) {
       $('#i1').css("display", "block");
            $('#i2').css("display", "block");
             $('#i3').css("display", "block");
           
            $('#i4').css("display", "block");
            $('#i5').css("display", "block");
        }
    });
});
  
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<div class='row'  id='new_"+new_chq_no+"' style='display:flex'><div class='col-md-6'><input type='text' class='form-control' name='doc_label[]' placeholder='Enter Title of document'></div> <div class='col-md-6'><input type='file' class='form-control mb-3' aria-describedby='emailHelp' name='doc_image[]'> </div> </div>";
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)
    }
    function remove(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }
</script>

</body>

</html>
