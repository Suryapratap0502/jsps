<?php $this->load->view('admin/link');

 $model_short_name = $this->uri->segment(1);
 $policy_no = $this->uri->segment(3);
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
  #sel_module{
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
                        <h4 class="mb-sm-0">All Grievance Regarding - <?=$policy_no?></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                                <li class="breadcrumb-item active">All Grievance Regarding - <?=$policy_no?></li>
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
                            <h4 class="card-title mb-0 flex-grow-1">All Grievance list of <u> <?=$policy_no?> </u> Policy Number</h4>

                            <div class="flex-shrink-0">
                               
                                    <a  type="button" title="Add New Intiate Claim" data-bs-toggle="modal" data-bs-target="#add_new_initiate" class="btn btn-primary waves-effect waves-light">Generate New Query</a>
                             

                            </div>

                        </div><!-- end card header -->
						<div class="row">
                            <div class="col-lg-12">
                                <div class="card-body">
                                    <div id="fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php
                                                    $i = 1;
                                                    if(!empty($gr_list)){
                                                    foreach ($gr_list as $row) {
                                                    ?>
                                                    <div class="card border " style="border-color: #21252973!important;">
                                                        <div class="card-body" style="background-color: #0000000f;">
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <div class="col-md-12" style="display:flex;">

                                                                        <div class="col-md-3">
                                                                            <p class="setpara mb-1">CLAIM ID</p>
                                                                            <h5 class="seth5"><b>
                                                                                <a href="<?=base_url()?>claims/claim_details/<?=$row['claim_id'];?>"> <?php if (!empty($row['claim_id'])) { ?>
                                                                                        <?php echo $row['claim_id']; ?>
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
                                                                        <div class="col-md-2">
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
                                                                    <div class="col-md-12" >
                                                                                <p class="setpara mb-1">Description</p>
                                                                                <p class="setpara"><b>
                                                                                        <?php if (!empty($row['description'])) { ?>
                                                                                            <?php echo $row['description']; ?>
                                                                                        <?php } ?>
                                                                                    </b></p>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="margin:auto;">
                                                                        <div class="col-md-2" >

                                                                            <div class="d-flex gap-2 mt-1">
                                                                                <a class="btn btn-sm "><i class="ri-close-circle-line" data-toggle="tooltip" data-placement="bottom" title="Reject Claim" onclick="changestatus(<?=$row['id'];?>,'Reject')" style="font-size: 15px; color:red;"></i></a>
                                                                                <a class="btn btn-sm "><i class="ri-file-list-3-line" data-toggle="tooltip" data-placement="bottom" title="Document Required" onclick="changestatus(<?=$row['id'];?>,'Document Required')" style="font-size: 15px; color:blue;"></i></a>
                                                                                <a class="btn btn-sm "><i class="ri-star-half-line" data-toggle="tooltip" data-placement="bottom" title="Partially Passed" onclick="changestatus(<?=$row['id'];?>,'Partially Passed')" style="font-size: 15px; color:green;"></i></a>
                                                                                <a class="btn btn-sm "><i class="ri-checkbox-circle-line" data-toggle="tooltip" data-placement="bottom" title="Claim Passed" onclick="changestatus(<?=$row['id'];?>,'Claim Passed')" style="font-size: 15px; color:green;"></i></a>
                                                                              <a class="btn btn-sm "><i class="ri-phone-line" data-toggle="tooltip" data-placement="bottom" title="Add Call Reminder" data-bs-toggle="modal" data-bs-target="#add_reminder" data-placement="bottom" title="Claim Passed" style="font-size: 15px; color:blue;"></i></a>
                                                                                
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
                                                <?php $i++;
                                                } }?>
                                                   
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
                                                   <?php if(!empty($scheduled_call)){ foreach($scheduled_call as $value){ ?>
                                                    <option value="<?=$value['id']?>"><?=$value['call_remark']?></option>
                                                    <?php }} ?>
                                                  </select>
                                                 

                                         		 </div>
                                              <div class="col-xxl-4">
                                                  <label for="exampleInputEmail1" class="form-label">Date & Time </label>
                                                 <input type="datetime-local" class="form-control mb-1" name="reminder_date" id="reminder_date" aria-describedby="emailHelp">
                                                 

                                         		 </div>
                                               <div class="col-xxl-4">
                                                  <label for="exampleInputEmail1" class="form-label">Reminder Remark </label>
                                                 <textarea type="text" class="form-control mb-1"  name="reminder_remark" id="reminder_remark" aria-describedby="emailHelp"></textarea>
                                                 

                                         		 </div>
                                             
                                              <input type="hidden" name="module_name" id="module_name" value="<?=$model_short_name?>">
                                               
                                                
                                             
                                             
                                               
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
<script src="<?=base_url()?>assets/js/pages/datatables.init.js"></script>

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
  function add(){
   
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<div class='row'  id='new_"+new_chq_no+"'> <div class='col-xxl-5'> <div><input type='text' class='form-control mb-1' name='title[]' id='title' aria-describedby='emailHelp' placeholder='Document Title'></div></div> <div class='col-xxl-5'><input type='file' class='form-control mb-1' name='image[]' id='image' aria-describedby='emailHelp'></div>";
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

<script>
 function changestatus(id, status) {
    swal({
            title: "Are you sure?",
            text: "Update Claim as " + status,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, "+ status + " Please",
            cancelButtonText: "No, cancel Please!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?=base_url()?>form/changestatus",
                    type: 'post',
                    data: { id: id, status: status },
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