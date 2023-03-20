<?php 
$this->load->view('admin/link');?>
<!-- Begin page -->
<div id="layout-wrapper">

    <?php $this->load->view('admin/topar');
  $this->load->view('admin/imgheader');
  $this->load->view('admin/sidebar');?>
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
      text-transform:uppercase;
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
     background: none!important;
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
                                                                        <h5 class="seth5">
                                                                        <?php if(!empty($sale_details[0]['proposer_name'])){ echo $sale_details[0]['proposer_name'];}else{echo "NA";} ?>
                                                                                
                                                                            </h5>
                                                                    </div>
                                                                  	<div class="col-md-2">
                                                                        <p class="setpara mb-1">Customer Name</p>
                                                                        <h5 class="seth5">
                                                                        <?php if(!empty($sale_details[0]['customer_name'])){ echo $sale_details[0]['customer_name'];}else{echo "NA";} ?>
                                                                                
                                                                            </h5>
                                                                    </div>
                                                                  	<div class="col-md-2">
                                                                        <p class="setpara mb-1">Date of Birth</p>
                                                                        <h5 class="seth5"><b>
                                                                        <?php if(!empty($sale_details[0]['dob'])){ echo $sale_details[0]['dob'];}else{echo "NA";} ?>
                                                                                
                                                                            </b></h5>
                                                                    </div>
                                                                  <div class="col-md-2">
                                                                    <p class="setpara mb-1">Customer City</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['customer_city'])){ echo $sale_details[0]['customer_city'];}else{echo "NA";} ?>
                                                                      
                                                                      
                                                                        </b></h5>
                                                                	</div>
                                                                  <div class="col-md-2">
                                                                    <p class="setpara mb-1">Email</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if(!empty($sale_details[0]['email'])){ echo $sale_details[0]['email'];}else{echo "NA";} ?>
                                                                     
                                                                        </b></h5>
                                                                	</div>
                                                                  <div class="col-md-2">
                                                                    <p class="setpara mb-1">Alternate Number</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['policy_type'])){ echo $sale_details[0]['policy_type'];}else{echo "NA";} ?>
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
                                                                           <?php if(!empty($sale_details[0]['policy_no'])){ echo $sale_details[0]['policy_no'];}else{echo "NA";} ?> </b></h5>
                                                                </div>
                                                              <div class="col-md-2">
                                                                    <p class="setpara mb-1">Policy Type</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['policy_type'])){ echo $sale_details[0]['policy_type'];}else{echo "NA";} ?> </b></h5>
                                                                </div>
                                                              	<div class="col-md-2">
                                                                        <p class="setpara mb-1">Portability Duration</p>
                                                                        <h5 class="seth5">
                                                                        <?php if(!empty($sale_details[0]['portability'])){ echo $sale_details[0]['portability'];}else{echo "NA";} ?>

                                                                                
                                                                            </h5>
                                                                    </div>
                                                              		<div class="col-md-2">
                                                                        <p class="setpara mb-1">Portability Form</p>
                                                                        <h5 class="seth5">
                                                                        <?php if(!empty($sale_details[0]['portability'])){ echo $sale_details[0]['portability'];}else{echo "NA";} ?>

                                                                                
                                                                            </h5>
                                                                    </div>
                                                              	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Company Name</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['company_name'])){ echo $sale_details[0]['company_name'];}else{echo "NA";} ?>
                                                                      
                                                                      
                                                                        </b></h5>
                                                                </div>
                                                              <div class="col-md-2">
                                                                    <p class="setpara mb-1">Product Name</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if(!empty($sale_details[0]['product_name'])){ echo $sale_details[0]['product_name'];}else{echo "NA";} ?>
                                                                     
                                                                        </b></h5>
                                                                </div>
                                                                    
                                                            </div>

                                                            
                                                          
                                                          
                                                          <div class="col-md-12" style="display:flex;padding-bottom: 10px;">
                                                            
                                                            		<div class="col-md-2">
                                                                        <p class="setpara mb-1">Date of Closure</p>
                                                                        <h5 class="seth5"><b>
                                                                        <?php if(!empty($sale_details[0]['date_of_closure'])){ echo $sale_details[0]['date_of_closure'];}else{echo "NA";} ?>
                                                                                
                                                                            </b></h5>
                                                                    </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Sum Assured</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if(!empty($sale_details[0]['sum_assured_1'])){ echo $sale_details[0]['sum_assured_1'];}else{echo "NA";} ?>
                                                                       
                                                                        </b></h5>
                                                                </div>
                                                            
                                                            		<div class="col-md-2">
                                                                        <p class="setpara mb-1">Cover Type</p>
                                                                        <h5 class="seth5"><b>
                                                                        <?php if(!empty($sale_details[0]['cover_type'])){ echo $sale_details[0]['cover_type'];}else{echo "NA";} ?>
                                                                                
                                                                            </b></h5>
                                                                    </div>
                                                            		<div class="col-md-2">
                                                                        <p class="setpara mb-1">Family Type</p>
                                                                        <h5 class="seth5"><b>
                                                                        <?php if(!empty($sale_details[0]['cover_type'])){ echo $sale_details[0]['cover_type'];}else{echo "NA";} ?>
                                                                                
                                                                            </b></h5>
                                                                    </div>
                                                            		<div class="col-md-2">
                                                                        <p class="setpara mb-1">Medical Requirment</p>
                                                                        <h5 class="seth5"><b>
                                                                        <?php if(!empty($sale_details[0]['medical'])){ echo $sale_details[0]['medical'];}else{echo "NA";} ?>
                                                                               
                                                                            </b></h5>
                                                                    </div>

                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Data Source</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if(!empty($sale_details[0]['tl'])){ echo $sale_details[0]['tl'];}else{echo "NA";} ?>
                                                                     
                                                                        </b></h5>
                                                                </div>
                                                            	
                                                            </div>
                                                          
                                                          <div class="col-md-12" style="display:flex;">
																<div class="col-md-2">
                                                                    <p class="setpara mb-1">Zone</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['zone'])){ echo $sale_details[0]['zone'];}else{echo "NA";} ?>
                                                                      
                                                                      
                                                                        </b>
                                                                  </h5>
                                                                </div>
                                                          </div><hr>
                                                           <h5>PREMIUM DETAILS</h5>
                                                          <div class="col-md-12" style="display:flex;padding-bottom: 10px;">
                                                               
                                                              	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Gross Premium</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['data_source'])){ echo $sale_details[0]['data_source'];}else{echo "NA";} ?>
                                                                      
                                                                      
                                                                        </b></h5>
                                                                </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Net Premium</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['net_premium'])){ echo $sale_details[0]['net_premium'];}else{echo "NA";} ?>
                                                                      </b></h5>
                                                                </div>
                                                                
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">Payment Tenure </p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['payment_tenure'])){ echo $sale_details[0]['payment_tenure'];}else{echo "NA";} ?>
                                                                      
                                                                      
                                                                        </b></h5>
                                                                </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Payment Mode</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['payment_mode'])){ echo $sale_details[0]['payment_mode'];}else{echo "NA";} ?> </b></h5>
                                                                </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Discount If Any</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['discount'])){ echo $sale_details[0]['discount'];}else{echo "NA";} ?> </b></h5>
                                                                </div>
                                                            
                                                                
                                                             
                                                            </div>
                                                          
                                                          <div class="col-md-12" style="display:flex;padding-bottom: 10px;">
                                                            <div class="col-md-2">
                                                                        <p class="setpara mb-1">Team Leader</p>
                                                                        <h5 class="seth5"><b>
                                                                        <?php if(!empty($sale_details[0]['coverage_type'])){ echo $sale_details[0]['coverage_type'];}else{echo "NA";} ?>
                                                                                
                                                                            </b></h5>
                                                                    </div>
                                                            		<div class="col-md-2">
                                                                        <p class="setpara mb-1">Insured One</p>
                                                                        <h5 class="seth5"><b>
                                                                        <?php if(!empty($sale_details[0]['insured_1_ped'])){ echo $sale_details[0]['insured_1_ped'];}else{echo "NA";} ?>
                                                                               
                                                                            </b></h5>
                                                                    </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Insured Two</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['insured_2_ped'])){ echo $sale_details[0]['insured_2_ped'];}else{echo "NA";} ?> </b></h5>
                                                                </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Insured Three</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if(!empty($sale_details[0]['gross_premium'])){ echo $sale_details[0]['gross_premium'];}else{echo "NA";} ?>
                                                                       
                                                                        </b></h5>
                                                                </div>
                                                            <div class="col-md-2">
                                                                    <p class="setpara mb-1">Insured Four</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if(!empty($sale_details[0]['insured_4_ped'])){ echo $sale_details[0]['insured_4_ped'];}else{echo "NA";} ?>
                                                                       
                                                                        </b></h5>
                                                                </div>
                                                            <div class="col-md-2">
                                                                    <p class="setpara mb-1">Insured Five</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if(!empty($sale_details[0]['insured_5_ped'])){ echo $sale_details[0]['insured_4_ped'];}else{echo "NA";} ?>
                                                                       
                                                                        </b></h5>
                                                                </div>
                                                                
                                                              
                                                            </div>
                                                          
                                                          <div class="col-md-12" style="display:flex;">
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Covarage Type</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($sale_details[0]['coverage_type'])){ echo $sale_details[0]['coverage_type'];} ?>
                                                                      </b></h5>
                                                                </div>
                                                                   		
                                                                    <div class="col-md-2">
                                                                        <p class="setpara mb-1">Discount</p>
                                                                        <h5 class="seth5"><b>
                                                                        <?php if(!empty($sale_details[0]['discount'])){ echo $sale_details[0]['discount'];} ?>
                                                                                
                                                                            </b></h5>
                                                                    </div>

                                                            
                                                          </div>
                                                          <hr>
                                                           <h5>UPDATED DETAILS AT RENEWAL</h5>
                                                          <div class="col-md-12" style="display:flex;padding-bottom: 10px;">
                                                               <?php $json = json_decode($renewals_details[0]['remark'], true);?>
                                                              	<div class="col-md-2">
                                                                    <p class="setpara mb-1">New Policy</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($json['New Policy'])){ echo $json['New Policy'];}else{echo "NA";} ?>
                                                                      
                                                                      
                                                                        </b></h5>
                                                                </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Proposer Date Of Birth</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($json['Proposer Date Of Birth'])){ echo $json['Proposer Date Of Birth'];}else{echo "NA";} ?>
                                                                      </b></h5>
                                                                </div>
                                                                
                                                                <div class="col-md-2">
                                                                    <p class="setpara mb-1">New Sum Assured</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($json['New Sum Assured'])){ echo $json['New Sum Assured'];}else{echo "NA";} ?>
                                                                      
                                                                      
                                                                        </b></h5>
                                                                </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">New Net Premium</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($json['Net Premium'])){ echo $json['Net Premium'];}else{echo "NA";} ?> </b></h5>
                                                                </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">Upselling</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($json['Upselling'])){ echo $json['Upselling'];}else{echo "NA";} ?> </b></h5>
                                                                </div>
                                                            <div class="col-md-2">
                                                                    <p class="setpara mb-1">New Alternate Number</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($json['Alternate Number'])){ echo $json['Alternate Number'];}else{echo "NA";} ?> </b></h5>
                                                                </div>
                                                            
                                                                
                                                             
                                                            </div>
                                                          
                                                          <div class="col-md-12" style="display:flex;padding-bottom: 10px;">
                                                            <div class="col-md-2">
                                                                        <p class="setpara mb-1">New Payment Mode</p>
                                                                        <h5 class="seth5"><b>
                                                                        <?php if(!empty($json['New Payment Mode'])){ echo $json['New Payment Mode'];}else{echo "NA";} ?>
                                                                                
                                                                            </b></h5>
                                                                    </div>
                                                            		<div class="col-md-2">
                                                                        <p class="setpara mb-1">New Payment Tenure</p>
                                                                        <h5 class="seth5"><b>
                                                                        <?php if(!empty($json['New Payment Tenure'])){ echo $json['New Payment Tenure'];}else{echo "NA";} ?>
                                                                               
                                                                            </b></h5>
                                                                    </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">New Family Type</p>
                                                                    <h5 class="seth5"><b>
                                                                           <?php if(!empty($json['New Covergae Type'])){ echo $json['New Covergae Type'];}else{echo "NA";} ?> </b></h5>
                                                                </div>
                                                            	<div class="col-md-2">
                                                                    <p class="setpara mb-1">New Gross Premium</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if(!empty($json['New Gross Premium'])){ echo $json['New Gross Premium'];}else{echo "NA";} ?>
                                                                       
                                                                        </b></h5>
                                                                </div>
                                                            <div class="col-md-2">
                                                                    <p class="setpara mb-1">EMI</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if(!empty($json['EMI'])){ echo $json['EMI'];}else{echo "NA";} ?>
                                                                       
                                                                        </b></h5>
                                                                </div>
                                                             <div class="col-md-2">
                                                                    <p class="setpara mb-1">New Discount</p>
                                                                    <h5 class="seth5"><b>
                                                                            <?php if(!empty($json['New Discount'])){ echo $json['New Discount'];}else{echo "NA";} ?>
                                                                       
                                                                        </b></h5>
                                                                </div>
                                                            
                                                                
                                                              
                                                            </div>
                                                          
                                                          
                                                          
                                                          
                                                        </div>
                                                          
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
                                                        
                                                        <h6 class="card-title mb-0" style="border-color: #21252973!important;">Underwriter Remarks</h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <p  class="seth5">Whether article spirits new her covered hastily sitting her. Money witty books nor son add build on the card Chicken age had evening believe but proceed pretend mrs.</p>
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
                                                    <p class="seth5">Whether article spirits new her covered hastily sitting her. Money witty books nor son add build on the card Chicken age had evening believe but proceed pretend mrs.</p>
                                                </div>
                                            </div><!-- end col -->


                                        </div><!-- end row -->

                                    </div><!-- end col -->
                                </div><!-- end row -->

                                <div class="">
                                    <div class="col-md-12">
                                        <div class="card border card-border-primary" style="border-color: #21252973!important;">
                                            <div class="card-header"style="border-color:#21252973!important;">
                                                
                                                <h6 class="card-title mb-0" style="border-color: #21252973!important;">Other Remarks</h6>
                                            </div>
                                            <div class="card-body">

                                                <div class="col-md-12">

                                                    <div class="card">
                                                        <div class="card-body">

                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs nav-justified nav-border-top nav-border-top-success mb-3" role="tablist">
                                                                <li class="nav-item" >
                                                                    <a class="nav-link active" data-bs-toggle="tab" href="#nav-border-justified-home" role="tab" aria-selected="false" style="color: #ff8100!important;border-top-color: #ff8100!important;">
                                                                        <i class="ri-home-5-line align-middle me-1"></i> Services
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-profile" role="tab" aria-selected="false" style="color: #0aaf3d!important;border-top-color: #0aaf3d!important;">
                                                                        <i class="ri-user-line me-1 align-middle" ></i> Claim
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-messages" role="tab" aria-selected="false" style="color: #007aff!important;border-top-color: #007aff!important;">
                                                                        <i class="ri-question-answer-line align-middle me-1"></i>Renewals
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link " data-bs-toggle="tab" href="#nav-border-justified-home1" role="tab" aria-selected="false" style="color: #6559cc!important;border-top-color: #6559cc!important;">
                                                                        <i class="ri-home-5-line align-middle me-1"></i> Griveance/Customer Services
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" data-bs-toggle="tab" href="#nav-border-justified-profile2" role="tab" aria-selected="false" style="color: #007aff!important;border-top-color: #007aff!important;">
                                                                        <i class="ri-user-line me-1 align-middle"></i> After Renewal Sales Services
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                            <div class="tab-content text-muted">
                                                                <div class="tab-pane active" id="nav-border-justified-home" role="tabpanel">

                                                                    <h6>Year Wise Remark Here</h6>
                                                                    <!-- Base Example -->
                                                                    <div class="accordion" id="default-accordion-example">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingOne">
                                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                    2019
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    Although you probably won’t get into any legal trouble if you do it just once, why risk it? If you made your subscribers a promise, you should honor that. If not, you run the risk of a drastic increase in opt outs, which will only hurt you in the long run.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingTwo">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                                    2020
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    No charges are put in place by SlickText when subscribers join your text list. This does not mean however that charges 100% will not occur. Charges that may occur fall under part of the compliance statement stating "Message and Data rates may apply."
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingThree">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                                    2021
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    Now that you have a general idea of the amount of texts you will need per month, simply find a plan size that allows you to have this allotment, plus some extra for growth. Don't worry, there are no mistakes to be made here. You can always upgrade and downgrade.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="tab-pane" id="nav-border-justified-profile" role="tabpanel">
                                                                <h6>Year Wise Remark Here</h6>
                                                                    <!-- Base Example -->
                                                                    <div class="accordion" id="default-accordion-example">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingOne">
                                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                    2019
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    Although you probably won’t get into any legal trouble if you do it just once, why risk it? If you made your subscribers a promise, you should honor that. If not, you run the risk of a drastic increase in opt outs, which will only hurt you in the long run.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingTwo">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                                    2020
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    No charges are put in place by SlickText when subscribers join your text list. This does not mean however that charges 100% will not occur. Charges that may occur fall under part of the compliance statement stating "Message and Data rates may apply."
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingThree">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                                    2021
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    Now that you have a general idea of the amount of texts you will need per month, simply find a plan size that allows you to have this allotment, plus some extra for growth. Don't worry, there are no mistakes to be made here. You can always upgrade and downgrade.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="nav-border-justified-messages" role="tabpanel">
                                                                <h6>Year Wise Remark Here</h6>
                                                                    <!-- Base Example -->
                                                                    <div class="accordion" id="default-accordion-example">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingOne">
                                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                    2019
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    Although you probably won’t get into any legal trouble if you do it just once, why risk it? If you made your subscribers a promise, you should honor that. If not, you run the risk of a drastic increase in opt outs, which will only hurt you in the long run.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingTwo">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                                    2020
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    No charges are put in place by SlickText when subscribers join your text list. This does not mean however that charges 100% will not occur. Charges that may occur fall under part of the compliance statement stating "Message and Data rates may apply."
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingThree">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                                    2021
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    Now that you have a general idea of the amount of texts you will need per month, simply find a plan size that allows you to have this allotment, plus some extra for growth. Don't worry, there are no mistakes to be made here. You can always upgrade and downgrade.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane" id="nav-border-justified-home1" role="tabpanel">
                                                                    
                                                                    <h6>Year Wise Remark Here</h6>
                                                                    <!-- Base Example -->
                                                                    <div class="accordion" id="default-accordion-example">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingOne">
                                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                    2019
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    Although you probably won’t get into any legal trouble if you do it just once, why risk it? If you made your subscribers a promise, you should honor that. If not, you run the risk of a drastic increase in opt outs, which will only hurt you in the long run.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingTwo">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                                    2020
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    No charges are put in place by SlickText when subscribers join your text list. This does not mean however that charges 100% will not occur. Charges that may occur fall under part of the compliance statement stating "Message and Data rates may apply."
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingThree">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                                    2021
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    Now that you have a general idea of the amount of texts you will need per month, simply find a plan size that allows you to have this allotment, plus some extra for growth. Don't worry, there are no mistakes to be made here. You can always upgrade and downgrade.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane" id="nav-border-justified-profile2" role="tabpanel">
                                                                <h6>Year Wise Remark Here</h6>
                                                                    <!-- Base Example -->
                                                                    <div class="accordion" id="default-accordion-example">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingOne">
                                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                    2019
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    Although you probably won’t get into any legal trouble if you do it just once, why risk it? If you made your subscribers a promise, you should honor that. If not, you run the risk of a drastic increase in opt outs, which will only hurt you in the long run.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingTwo">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                                    2020
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    No charges are put in place by SlickText when subscribers join your text list. This does not mean however that charges 100% will not occur. Charges that may occur fall under part of the compliance statement stating "Message and Data rates may apply."
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="headingThree">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                                   2021
                                                                                </button>
                                                                            </h2>
                                                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#default-accordion-example">
                                                                                <div class="accordion-body">
                                                                                    Now that you have a general idea of the amount of texts you will need per month, simply find a plan size that allows you to have this allotment, plus some extra for growth. Don't worry, there are no mistakes to be made here. You can always upgrade and downgrade.
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end card-body -->
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

<?php $this->load->view('admin/footer');?>
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