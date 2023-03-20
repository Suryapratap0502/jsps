<?php $this->load->view('admin/link.php'); 
$model_short_name = $module_short;

?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php $this->load->view('admin/topar.php'); ?>

    <?php $this->load->view('admin/imgheader.php'); ?>
    <?php $this->load->view('admin/sidebar.php'); ?>
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
  .setcalc{
    width:16.66%!important;
  }
  .setcalc4{
    width:25%!important;
  }
  .setcalc8{
    width:55%!important;
    float:right;
  }
  label{
    text-transform:uppercase;
  }
  input[type=file]::-webkit-file-upload-button {
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
                        <h4 class="mb-sm-0">Edit Sale Closure</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url()?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Sale Closure Edit</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Edit Sale Closure</h4>
                          
                           

                        </div><!-- end card header -->


                       
                        <div class="card-body">


                            <div class="live-preview">
								
                              <form method="POST" id="edit_sale_closure" style="width: 100%;">
                                <div class="row">
                                  <!-- first-->
                                  <div class="col-md-12">
                                    <h5 class="mb-3"><b>PERSONAL INFORMATION</b></h5>
                                    <div class="row">
                                    <div class="col-md-2 setcalc">
                                        <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Proposer Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $content[0]['proposer_name'];?>"name="proposer_name" id="proposer_name" aria-describedby="emailHelp" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>>
                                        </div>
                                    </div>
                                    <div class="col-md-2 setcalc">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">DOB(Eldest Member)</label>	
                                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dob" value="<?php echo $content[0]['dob'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>>
                                        </div>
                                    </div>
                                    <div class="col-md-2 setcalc">
                                        <div class="mb-3">
                                            <label for="exampleInputno" class="form-label">Customer City </label>
                                            <input class="search__input search form-control" type="text" placeholder="Enter Your City" value="<?php $id = $content[0]['customer_city'];  $this->db->select('*');
                                                  $this->db->from('city');
                                                  $this->db->where('id',$id);
                                                  $rows1 = $this->db->get()->row();
                                                   if(!empty($rows1)){
                                                 	echo $rows1->name; }?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>>
                                        </div>
                                    </div>
                                    <div class="col-md-2 setcalc">
                                        <div class="mb-3">
                                            <label for="exampleInputno" class="form-label">Email ID </label>
                                            <input type="email" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="email" id="email" value="<?php echo $content[0]['email'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>>
                                        </div>
                                    </div>
                                    <div class="col-md-2 setcalc">
                                        <div class="mb-3">
                                            <label for="exampleInputno" class="form-label">Alternate No </label>
                                            <input type="number" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="alternate_no" id="alternate_no" value="<?php echo $content[0]['alternate_no'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>>
                                          </div>
                                    </div>
                                    </div>
                                    
                                  </div>
                                  <hr>
                                  <!-- second-->
                                 <div class="col-md-12">
                                        <h5 class="mb-3"><b>LIFE INSURED'S DETAILS</b></h5>
                                        <div class="row">
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                <label for="exampleInputno" class="form-label">Company Name </label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="company_name" id="company_name" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                    <?php foreach ($company as $data) {
                                                        ?>
                                                    <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['company_name'])) { if ($content[0]['id'] == $data['id']) { echo "selected"; } } ?>><?= $data['name'] ?></option>
                                                    <?php } ?>
                                                
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Product Name </label>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="product_name" id="product_name" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                    <option value="<?php echo $content[0]['product_name'];?>" selected><?php echo $content[0]['product_name'];?></option>
                                                    
                                                    <option value="NCB Super Premium">NCB Super Premium</option>
                                                    <option value="Care plus">Care plus</option>
                                                    <option value="Max Saver">Max Saver</option>
                                                    <option value="Health Companion">Health Companion</option>
                                                    <option value="Health gain">Health gain</option>
                                                    <option value="Prime – Protect">Prime – Protect</option>
                                                    <option value="ProHealth - Plus">ProHealth - Plus</option>
                                                    
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Policy Type </label>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="policy_type" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                    <option value="<?php echo $content[0]['policy_type'];?>" selected><?php echo $content[0]['policy_type'];?></option>
                                                    <option value="fresh">Fresh</option>
                                        			<option value="Port">Port</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Portability Duration </label>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="portability_duration" id="portability_duration" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                     <option selected>Select Portability Duration</option>
                                                           <option value="na">NA</option>
                                                            <option value="1_year">1 Year</option>
                                                            <option value="2_year">2 Year</option>
                                                            <option value="3_year">3 Year</option>
                                                          	<option value="4_year">4 Year</option>
                                                            <option value="5_year">5 Year</option>
                                                          	
                                                          	 <option value="6_year">6 Year</option>
                                                            <option value="7_year">7 Year</option>
                                                            <option value="8_year">8 Year</option>
                                                          	<option value="9_year">9 Year</option>
                                                            <option value="10_year">10 Year</option>
                                                          
                                                          	 <option value="11_year">11 Year</option>
                                                            <option value="12_year">12 Year</option>
                                                            <option value="13_year">13 Year</option>
                                                          	<option value="14_year">14 Year</option>
                                                            <option value="15_year">15 Year</option>
                                                          
                                                          	 <option value="16_year">16 Year</option>
                                                            <option value="17_year">17 Year</option>
                                                            <option value="18_year">18 Year</option>
                                                          	<option value="19_year">19 Year</option>
                                                            <option value="20_year">20 Year</option>
                                                    </select>
                                                </div>
                                            </div>
                                           <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Portability From </label>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="portability" id="portability" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                        <option value="<?php echo $content[0]['portability'];?>" selected><?php echo $content[0]['portability'];?></option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Date Of Closure </label>
                                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_of_closure" id="date_of_closure" value="<?php echo $content[0]['date_of_closure'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>>
                                                </div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Sum Assured 1 </label>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sum_assured_1" id="sum_assured_1" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
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
                                            </div>
                                          <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Policy No </label>
                                                    <input type="text" class="form-control" id="exampleInputno" name="policy_no" id="policy_no" aria-describedby="emailHelp" value="<?php echo $content[0]['policy_no'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Cover Type </label>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="cover_type" id="cover_type" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                         <option selected>Select Cover Type</option>
                                                            <option value="Individual">Individual</option>
                                                            <option value="Floater">Floater</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Family Type </label>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="coverage_type" id="coverage_type" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                      <option selected>Select Family Type</option>
                                                      <option value="Individual">Individual</option>
                                                      <option value="Floater">Floater</option>
                                                    </select>
                                                </div>
                                            </div>
                                        

                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                <label for="exampleInputno" class="form-label">Medical_required </label>
                                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medical" id="medical" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                    <option selected>Is Medical Required?</option>
                                                  <option value="yes">yes</option>
                                                  <option value="No">No</option>
                                                
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Data Source </label>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="data_source" id="data_source" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                      <option value="<?php echo $content[0]['data_source'];?>" selected><?php echo $content[0]['data_source'];?></option>
                                                      <option value="1">One</option>
                                                      <option value="2">Two</option>
                                                      <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Zone </label>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="zone" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                      <option selected>Select Zone..</option>
                                                      <option value="keshav puram">keshav puram</option>
                                                      <option value="Azadpur">Azadpur</option>
                                                      <option value="burari">burari</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                  <hr>
                                  <!-- THree-->
                                  <div class="col-md-12">
                                        <h5 class="mb-3"><b>BENEFICIARY INFORMATION</b></h5>
                                        <div class="row">
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                <label for="exampleInputno" class="form-label">Insured 1 Ped </label>
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="insured_1_ped" id="insured_1_ped" value="<?php echo $content[0]['insured_1_ped'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>></textarea>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Insured 2 Ped </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="insured_2_ped" id="insured_2_ped" value="<?php echo $content[0]['insured_2_ped'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Insured 3 Ped </label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="insured_3_ped" id="insured_3_ped" value="<?php echo $content[0]['insured_3_ped'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 setcalc">
                                                <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Insured 4 Ped </label>
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="insured_4_ped" id="insured_4_ped" value="<?php echo $content[0]['insured_4_ped'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>></textarea>
                                                </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                  <hr>
                                   <!-- Four-->
                                 <div class="col-md-12">
                                   <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="mb-3"><b>PREMIUM DETAILS</b></h5>
                                            <div class="row">
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Gross Premium </label>
                                                    <input type="number" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="gross_premium" value="<?php echo $content[0]['gross_premium'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Net Premium </label>
                                                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="net_premium" id="net_premium" value="<?php echo $content[0]['net_premium'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Payment Tenure </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="payment_tenure" id="payment_tenure" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                            <option value="<?php echo $content[0]['payment_tenure'];?>" selected><?php echo $content[0]['payment_tenure'];?></option>
                                                            <option value="1 year"> 1 year</option>
                                                            <option value="3 year ">3 year </option>
                                                            <option value=" 5 year"> 5 year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                    <label for="exampleInputno" class="form-label">Payment Mode </label>
                                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="payment_mode" id="payment_mode" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                        <option value="<?php echo $content[0]['payment_mode'];?>" selected><?php echo $content[0]['payment_mode'];?></option>
                                                        <option value="upi">upi</option>
                                                        <option value="bank">bank</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 setcalc4">
                                                        <div class="mb-3">
                                                          <label for="exampleInputno" class="form-label">Discount If Any </label>
                                                          <input type="text" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="discount" id="discount" value="<?php echo $content[0]['discount'];?>" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "readonly";}?>>
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4 setcalc4">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Team Leader </label>
                                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tl" id="tl" <?php if($model_short_name =='services' || $model_short_name =='claims') { echo "disabled='true'";}?>>
                                                            <option value="<?php echo $content[0]['tl'];?>" selected><?php echo $content[0]['tl'];?></option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                 
                                            </div>
                                              
                                               <div class="col-md-4">
                                                    <div class="mb-3">
                                                      <label for="exampleInputno" class="form-label">Disposition </label>
                                                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="disposition_name" id="disposition_name">
                                                        <option value="" selected>Select Disposition..</option>
                                                        <?php foreach($disposition_name as $val){ ?>
                                                        <option value="<?=$val['id']?>"><?=$val['disposition']?></option>
                                                       <?php } ?>
                                                      </select>
                                                    </div>
                                                  </div>
                                                </div>
                                              
                                        </div>
                                        <div class="col-md-4">
                                          <div class="col-md-4">
                                          </div>
                                                <div class="col-md-8 setcalc8">
                                                    <div class="mb-3">
                                                        <label for="exampleInputno" class="form-label">Remarks </label>
                                                        <textarea class="form-control" placeholder="Enter Your Remarks" name="remarks" id="remarks"></textarea>
                                                    </div>
                                                   
                                                </div>
                                          <div class="col-md-4">
                                            
                                          </div>
                                          	<?php $sess = $this->session->userdata('pmsadmin');
                                            $name = $sess['name'];
                                            $role = $sess['role'];
                                            $sess_id = $sess['id']; 
                                          	if($role != 'Master' && $model_short_name !='claims'){
                                          	?>
                                                <div class="col-md-8 setcalc8">
                                                    <div class="mb-3" >
                                                        	<label for="exampleInputEmail1" class="form-label">SCHEDULE YOUR CALL </label>
                                                            <input type="date" class="form-control mb-1" id="exampleInputEmail1" name="reminder_date" id="reminder_date" aria-describedby="emailHelp" <?php if($model_short_name =='services') { echo "readonly";}?>>
                                                            <input type="text" class="form-control" id="exampleInputEmail1" name="reminder_remark" id="reminder_remark" placeholder="remarks" aria-describedby="emailHelp" <?php if($model_short_name =='services') { echo "readonly";}?>>
                                                    </div>
                                                </div>
                                          <?php } ?>
                                          <?php if($model_short_name =='claims') {?>
                                          		<div class="col-md-8 setcalc8">
                                                  <label for="exampleInputEmail1" class="form-label">REMIND YOUR CALL </label>
                                                  <select class="form-select form-select-sm mb-1" name="sel_remind_remark" id="sel_remind_remark">
                                                    <option>Select Scheduled Call</option>
                                                    <?php if(!empty($scheduled_call)){ foreach($scheduled_call as $value){ $val = explode("-",$value['reminder_by_user_module']);  ?>
                                                    <option value="<?=$value['id'];?>"><?php echo $value['call_remark']. " on (". $user_id = $value['call_time']; ?></option>
                                                                  <?php }} ?>
                                                  </select>
                                                  <input type="datetime-local" class="form-control mb-1"  name="sel_remind_remark" id="sel_remind_remark" aria-describedby="emailHelp">
                                                  <input type="text" class="form-control" id="exampleInputEmail1" name="sel_remind_remark" id="sel_remind_remark" placeholder="Add Your Call Reminder" aria-describedby="emailHelp">

                                         		 </div>
                                          <?php } ?>
                                        </div>
                                   </div>
                                   
                                   		<table class="table table-bordered table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Remarks</th>
                                                    <th scope="col">User Name</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Implement new UX</td>
                                                    <td>Lanora Sandoval</td>
                                                    <td>31-10-2022</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                   
                                    </div><hr>
                                   <!-- Five-->
                                 <div class="col-md-12">
                                   <h5 class="mb-3"><b>UPLOAD DOCUMENTS</b></h5>
                                        <div class="row">
                                            <div class="col-md-8">
                                              
                                                <input type="hidden" name = "module_short_name" id="module_short_name" value="<?=$model_short_name?>">

                                                <?php if($model_short_name =='underwriter_verifier' || $model_short_name =='operations' || $model_short_name =='claims'){ ?>
                                                    <div class="md-3">
                                                      <div class="row">
                                                        <div class="col-md-4">
                                                          <label for="exampleInputno" class="form-label">Upload Documents </label><br>
                                                        </div>
                                                        
                                                          <div class="col-md-4" style="text-align: left;">
                                                            <a  onclick="add()" style="cursor: pointer;color:blue;"><b>Add more +</b></a>
                                                            <a  onclick="remove()" style="cursor: pointer;color:red;"><b>Remove -</b></a>
                                                          </div>
                                                        
                                                           <div class="col-md-8 mb-3" style='display:flex'>
                                                              <input type="text" class="form-control" name="doc_label[]" id="doc_label" placeholder="Enter Title of document" >&nbsp;&nbsp;&nbsp;&nbsp;
                                                             <label for="doc_image" class="uploaddata" style="background-color: #54b2e5;
                                                              padding: 4px 14px;
                                                              border-radius: 8px;margin-bottom:0px;" >Upload</label>
                                                             
                                                              <input type="file" class="form-control" aria-describedby="emailHelp" name="doc_image[]" id="doc_image" style="border:none;">
                                                        </div>
                                                        
                                                      </div>
                                                      <div class="col-md-6 mb-3">
                                                          <div id="new_chq"></div>
                                                      </div>
                                                      <input type="hidden" value="1" id="total_chq">
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                   <table class="table table-bordered table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Remarks</th>
                                                    <th scope="col">User Name</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Implement new UX</td>
                                                    <td>Lanora Sandoval</td>
                                                    <td>31-10-2022</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                  
                                  
                                  
                                </div>
                                
                                  <input type="hidden" name="id" value="<?php echo $this->uri->segment(4);?>">
                               
                                <button type="submit" class="btn btn-primary">Intiate Claim</button>
                              
                                
                                
                              </form>
                                
                            </div>

                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->



        </div>
        <!-- container-fluid -->
    </div>
    
  
    <?php $this->load->view('admin/footer.php'); ?>
</div>


<!-- JAVASCRIPT -->
<script src="<?=base_url()?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?=base_url()?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?=base_url()?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?=base_url()?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?=base_url()?>assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- apexcharts -->
<script src="<?=base_url()?>assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="<?=base_url()?>assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="<?=base_url()?>assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="<?=base_url()?>assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="<?=base_url()?>assets/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="<?=base_url()?>assets/js/app.js"></script>


<script type="text/javascript">
      // update modal
        $(document).on('submit', '#edit_sale_closure', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
          
            $.ajax({
                url: "<?=base_url()?>claims/update_sale_closure",
                type: 'post',
                data: formData,
                success: function(result) {
                    //json data

                      var dataResult = JSON.parse(result);
                
                    if (dataResult.inserted == '1') {
                       swal('Record Updated 🙂', ' ', 'success');
                        // window.history.back();
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<div class='row'  id='new_"+new_chq_no+"'><div class='col-md-6 mb-3'><input type='text' class='form-control' name='doc_label[]' placeholder='Enter Title of document'></div> <div class='col-md-3'><label for='doc_image' style='background-color: #54b2e5;padding: 4px 14px;border-radius: 8px;margin-bottom:0px;'>Upload</label></div><div class='col-md-3'><input type='file' class='form-control mb-3' aria-describedby='emailHelp' name='doc_image[]' style='border:none;'></div></div>";
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
  
  function initiate_claim(id)
  {
  	
  
  
  }
  </script>
</body>

</html>
