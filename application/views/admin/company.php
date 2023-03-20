<?php include 'link.php'; ?>
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

<div class="vertical-overlay"></div>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Company</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url()?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Company</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Company</h4>
                          
                            <div class="flex-shrink-0">
                                <?php if($this->rbac->hasPrivilege('regional','can_add')) { ?>
                              <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Regional Head" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-user-add-line"></i></button>
								<?php } ?>

                            </div>

                        </div><!-- end card header -->


                        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalgridLabel">Add New Company </h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>

                                    <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>

                                        </div>
                                        <form method="POST" id="addSubadmin" enctype="multipart/form-data">
                                            <div class="row g-3">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Company Name</label>
                                                        <input type="text" class="form-control" name="sub_name" id="sub_name" placeholder="Enter Company Name">
                                                    </div>
                                                    <div class="error" id="subnameError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Company Email</label>
                                                        <input type="email" class="form-control" name="sub_email" id="sub_email" placeholder="Enter Company Email">
                                                    </div>
                                                    <div class="error" id="subemailError"></div>
                                                </div>
                                                <!--end col-->
                                                
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Company Contact</label>
                                                        <input type="number" class="form-control" name="sub_contact" id="sub_contact" placeholder="Enter Company Contact" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>

												<div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Company Address</label>
                                                        <input type="text" class="form-control" name="sub_address" id="sub_address" placeholder="Enter Company Address" >
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>
                                              
                                              <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Company GSTIN</label>
                                                        <input type="text" class="form-control" name="gstin" id="gstin" placeholder="Enter Company GSTIN Number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="15">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>

												<div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Company Logo</label>
														<input type="file" class="form-control" placeholder="Image Here" id="image" name="image" required>                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>
                                               <div class="col-lg-12">
                                                    <div class="mb-3">
                                                      <input type="checkbox" name="is_policy_change_renewal" id="is_policy_change_renewal" value="1">
                                                        <label class="form-label" for="steparrow-gen-info-email-input">This company issues new policy number on every renewal.</label>
                                                        
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

                                <div class="table-responsive table-card">

                                    <table class="table align-middle table-nowrap mb-0" id="Datatable1" class="display">
                                        
                                        <thead class="table-light">
                                            <tr>
                                                
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Contact Details</th>
                                                <th scope="col">Address</th>
												<th scope="col">Logo</th>
                                              <th scope="col">Policy No Change ?</th>
                                                <th scope="col">Date</th>
                                                
                                                <th scope="col" colspan="4" style=" text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                            $i = 1;
                                            foreach($subadminData->result() as $row)
                                            { 
                                                ?>
                                            	<tr id="delete<?php echo $row->id;?>">
                                                
                                                <td><a href="#" class="fw-medium"><?php echo $i;?></a></td>
                                                <td> <?php if (!empty($row->name)) {?><?php echo $row->name;?> <?php }?></td>
                                               	<td><?php if (!empty($row->email)) {?><?php echo $row->email;?> <?php }?><br>
												   <?php if (!empty($row->contact)) {?><?php echo $row->contact;?> <?php }?>
												</td>
                                               	<td><?php if (!empty($row->address)) {?><?php echo substr($row->address, 0,30);?> <?php }?></td>
                                               	<td><img src="<?= base_url();?>assets/images/company_logo/<?= $row->logo ?? '';?>" style="width:100px;"></td>
                                                  <td><?php if($row->is_policy_change == '1'){ echo "Yes Change on renewal";}else{ echo "No Change on renewal";}?></td>
                                                <td><?php echo $row->created_at;?></td>
                                                <?php if($this->rbac->hasPrivilege('regional','can_edit')) { ?>
                                                <td>

                                                    <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row->id; ?>"></i>
                                                   
                                                </td>
                                            <?php } ?>

                                            <?php if($this->rbac->hasPrivilege('regional','can_delete')) { ?>
                                                <td>
                                                    <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row->id ;?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                </td>
                                            <?php } ?>

                                            <?php if ($row->flag=="1") {
                                                
                                            ?>

                                          		<td>
                                                     <i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Disable Your Account" name="archive" class="remove" type="submit" onclick="disableaccount(<?php echo $row->id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: green;"></i>
                                                   
                  
                                                </td>
                                            <?php } 
                                            else { ?>
                                               <td>
                                                   <i class="ri-alert-line" data-toggle="tooltip" data-placement="bottom" title="Enable Your Account" name="archive" class="remove" type="submit" onclick="enableaccount(<?php echo $row->id ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                  
                                                </td>
                                            <?php } ?>
                                            
                                            </tr>
                                            <!-- <input type="hidden" name="id" value="<?php echo $row->id; ?>"> -->
                                             <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                   
                                </div>
                            </div>

                        </div><!-- end card-body -->
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
                <form method="POST" class="changepassword" id="changepasswordsubadmin">
                    <div class="row g-3">
                        <div class="col-xxl-6">
                           
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <label class="form-label" for="password-input">Current Password</label>
							<div class="position-relative auth-pass-inputgroup mb-3">
								<input type="password" class="form-control pe-5" placeholder="Enter Current password" name="cur_password" id="cur_password">
								<button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
							</div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="emailInput" class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter your Password">
                            </div>

                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                    <input type="hidden" name="id" value="<?php echo $row->id;?>">
                </form>
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
          url: "<?=base_url()?>Company/deletesubadmin/id",
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
        var subname = $('#sub_name').val();
        var subemail = $('#sub_email').val();
        var subcontact = $('#sub_contact').val();
        var subaddress = $('#sub_address').val();
		var sublogo = $('#sub_logo').val();

        // if (subname == '') {
        //     $('#subnameError').html('Enter Your Name');
        //     $('.error').css('color', 'red');
        //     error = true;
        //     // alert("hi");

        // }
        // if (subemail == '') {
        //     $('#subemailError').html('Enter Your Email');
        //     $('.error').css('color', 'red');
        //     error = true;

        //     // alert("hi");

        // }
        // if (subpassword == '') {
        //     $('#subpassError').html('Enter Your Password');
        //     $('.error').css('color', 'red');
        //     error = true;

        //     // alert("hi");

        // }
        // if (subcontact == '') {
        //     $('#subcontactError').html('Enter Your Mobile Number');
        //     $('.error').css('color', 'red');
        //     error = true;

        //     // alert("hi");

        // }
        // if (Subemployee == '') {
        //     $('#subemployeeError').html('Select Your Employee id');
        //     $('.error').css('color', 'red');
        //     error = true;

        //     // alert("hi");

        // }
      
      	// if (subdepartment == '') {
        //     $('#subdepartmentError').html('Select Your Department');
        //     $('.error').css('color', 'red');
        //     error = true;

        //     // alert("hi");

        // }
       
        if (error == false) {
            $.ajax({
                url: "<?= base_url('company/addsubadmin'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                    // json data
						setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Regional Head Added 🙂', ' ', 'success');
                       setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                       swal('Regional Head Not Added ☹️', ' ', 'success');
                      
                        setTimeout(function() {
                            location.reload(true);
                        }, 1000);

                    }

                     if (dataResult.email == '0') {
                       swal('Email Already Exist ☹️', ' ', 'error');
                      
                        

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
                    url: "<?= base_url('Company/subadminedit'); ?>",
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
                url: "<?=base_url()?>Company/updatesubadmi/",
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
                  
                     if (dataResult.email == '0') {
                       swal('Email Already Exist ☹️', ' ', 'error');

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
          url: "<?=base_url()?>Company/update/id",
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
          url: "<?=base_url()?>Company/updatedisable/id",
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
        url: '<?=base_url()?>Subadmin/showstates/' + id,
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


</body>

</html>
