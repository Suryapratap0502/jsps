
<form method="POST" class="bannerData" id="bannerModelSubmits">
    <div class="row g-3">
       <div class="col-xxl-6">
         <div>
           <label for="firstName" class="form-label">Select Module</label>
           <select name="dis_module" id="dis_module" class="form-control form-select">
             <option value="">Select Module</option>
             <?php foreach($module as $value) {?>
             <option value="<?=$value['sidebar_id'];?>"><?=$value['sidebar_name'];?></option>
             <?php } ?>
           </select>

         </div>
      </div>
      
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Add Disposition</label>
                <input type="text" value="<?php echo $content[0]['disposition'];?>" class="form-control" name="add_disp" id="add_disp" placeholder="Enter Disposition title">
                <div class="error" id="subnameError"></div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-6">
          <div>
            <label for="emailInput" class="form-label">Condition</label>
            <select name="dis_condition" id="dis_condition" class="form-control form-select">
               <option value="">Select Condition</option>
                                                          	 <option value="partially_done">Partially Done</option>
                                                           <option value="no_condition">No condition</option>
                                                          <option value="note_to">Note to</option>
                                                          <option value="mark_complete">Mark as complete</option>
                                                            <option value="mark_pending">Mark as Pending</option>
                                                          <option value="mark_rejected">Mark as Rejected</option>
                                                          <option value="mark_cancelled">Mark as Cancelled</option>
                                                          <option value="mark_expired">Mark as Expired</option>
            </select>
          </div>
        </div>
      
      
      
        <div class="col-lg-12">
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="add-btn">Submit</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <input type="hidden" value="<?php echo $content[0]['id'];?>" name="id">
    <!--end row-->
</form>
                    