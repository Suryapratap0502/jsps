<?php 
$this->load->view('admin/link'); 
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
                        <h4 class="mb-sm-0">Team Leader</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url()?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">Team Leader</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Team Leader</h4>
                          
                            <div class="flex-shrink-0">
                                <?php if($this->rbac->hasPrivilege('team_leader','can_add')) { ?>
                               <button type="button" data-toggle="tooltip" data-placement="bottom" title="Add New Team Leader" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#teamleader"><i class="ri-user-add-line"></i></button>
								<?php } ?>

                            </div>

                        </div><!-- end card header -->


                        <div class="modal fade" id="teamleader" tabindex="-1" aria-labelledby="teamleader" aria-modal="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalgridLabel">Add New Team Leader </h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>

                                    <div class="modal-body">
                                        <div id="success">
                                            <div id="error">
                                            </div>

                                        </div>
                                        <form method="POST" id="addteamleader">
                                            <div class="row g-3">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="tl_name" id="tl_name" placeholder="Enter Name">
                                                    </div>
                                                    <div class="error" id="subnameError"></div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="tl_email" id="tl_email" placeholder="Enter Email">
                                                    </div>
                                                    <div class="error" id="subemailError"></div>
                                                </div>
                                                <!--end col-->
                                               
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Contact</label>
                                                        <input type="number" class="form-control" name="tl_contact" id="tl_contact" placeholder="Enter your Contact">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>

												<div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Employee id</label>
                                                        <input type="text" class="form-control" name="tl_employee" id="tl_employee" placeholder="Enter your Employee id">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>
												<div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Department</label>
                                                        <input type="text" class="form-control" name="tl_department" id="tl_department" placeholder="Enter your Department">
                                                    </div>
                                                    <div class="error" id="subcontactError"></div>
                                                </div>
                                                <!--end col-->
                                               
                                              
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
                      
                      
                      
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="card-body">
                                    <div id="fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <table id="fixed-header" class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline" style="width: 100%;" aria-describedby="fixed-header_info">
                                        <thead>
                                            <tr>
                                             
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 606.4px;" aria-label="SR No.: activate to sort column ascending">ID</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="ID: activate to sort column ascending">Name</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 906.4px;" aria-label="Purchase ID: activate to sort column ascending">Email</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Title: activate to sort column ascending">Contact </th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="User: activate to sort column ascending">Emp ID</th>
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Assigned To: activate to sort column ascending">Department</th>
                                           
                                              <th class="sorting" tabindex="0" aria-controls="fixed-header" rowspan="1" colspan="1" style="width: 538.4px;" aria-label="Action: activate to sort column ascending">Action</th></tr>
                                          
                                        </thead>
                                        <tbody>
                                           
                                            <?php 
                                            $i = 1;
                                          if(!empty($team_leader)){
                                            foreach($team_leader as $row)
                                            { 
                                            ?>
                                        <tr class="odd">
                                                
                                                <td><?php echo $i;?></td>
                                                <td><?php if (!empty($row['name'])) {?><?php echo $row['name']?> <?php }?></td>
                                                <td><?php if (!empty($row['email'])) {?><?php echo $row['email']?> <?php }?></td>
                                                <td ><?php if (!empty($row['contact'])) {?><?php echo $row['contact']?> <?php }?></td>
                                                <td><?php if (!empty($row['emp_id'])) {?><?php echo $row['emp_id']?> <?php }?></td>
                                                <td><?php if (!empty($row['department'])) {?><?php echo $row['department'];?> <?php }?></td>
                                               
                                          		 <?php if($this->rbac->hasPrivilege('team_leader','can_edit')) { ?>
                                                <td>

                                                    <i class="ri-edit-box-line editmodel" style="color: blue;" class="" data-bs-toggle="modal" data-bs-target="#editsubadmin" data-id="<?php echo $row['id']; ?>"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                  <i class="ri-delete-bin-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row['id']; ?>)" data-toggle="tooltip" data-placement="bottom"  style="color: red;"></i>
                                                   
                                                </td>
                                            <?php } ?>

                                            
                                               
                                            </tr>
                                           <?php $i++; } }?>
                                         </tbody>
                                    </table>
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
       <div class="modal fade" id="editsubadmin" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Tean Leader</h5>
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
       
    </div>
</div>

    <?php $this->load->view('admin/footer');  ?>
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
<!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
      <script src="<?=base_url()?>assets/js/pages/datatables.init.js"></script>

<!-- App js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="<?=base_url()?>assets/js/app.js"></script>
<script type="text/javascript">
    function archiveFunction(id) {
        event.preventDefault(); // prevent form submit
        
        var form = event.target.form; // storing the form
        swal({
                title: "Are you sure?",
                text: "Delete Team Leader ",
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
          url: "<?=base_url()?>team_leader/delete/id",
          type: "post",
          data: {id:id},
          success:function(){
            swal('Record Deleted 🙂', ' ', 'success');
             setTimeout(function() {
                            location.reload(true);
                        }, 1000);

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
    $(document).on('submit', '#addteamleader', function(ev) {
        $('.error').html('');

        ev.preventDefault(); // Prevent browers default submit.
        var formData = new FormData(this);
        var error = false;
        var name = $('#tl_name').val();
        var email = $('#tl_email').val();
       
        var contact = $('#tl_contact').val();
        var emp_id = $('#tl_employee').val();
		var department = $('#tl_department').val();
		
      	
        

         if (name == '') {
             $('#subnameError').html('Enter Your Name');
             $('.error').css('color', 'red');
             error = true;
        

         }
        
        if (error == false) {
            $.ajax({
                url: "<?= base_url('team_leader/addteamleader'); ?>",
                type: 'post',
                data: formData,
                success: function(result) {
                   
                    var dataResult = JSON.parse(result);
                    if (dataResult.done == '1') {
                       swal('Team Leader Added 🙂', ' ', 'success');
                       setTimeout(function() {
                            location.reload(true);
                        }, 1000);
                    }

                    if (dataResult.done == '0') {
                       swal('Team Leader Not Added ☹️', ' ', 'success');
                      
                       }

                     if (dataResult.email == '0') {
                       swal('Team Leader already Exist ☹️', ' ', 'error');
                      
                        

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
              
                var id = $(this).data('id');
                
                $.ajax({
                    url: "<?= base_url('team_leader/openeditmodel'); ?>",
                    type: "post",
                    data: {
                        id: id
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
        $(document).on('submit', '#editteamleader', function(ev) {
            ev.preventDefault(); // Prevent browers default submit.
            var formData = new FormData(this);
            $.ajax({
                url: "<?=base_url()?>team_leader/updateteamleader/",
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



</body>

</html>
