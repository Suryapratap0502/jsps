
<form method="POST" class="bannerData" id="bannerModelSubmits" enctype="multipart/form-data">
    <div class="row g-3">
        <div class="col-xxl-6">
            <div>
                <label for="firstName" class="form-label">Name</label>
                <input type="text" value="<?php echo $content[0]['name'];?>" class="form-control" name="sub_name" id="sub_name" placeholder="Enter Name">
                <div class="error" id="subnameError"></div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="lastName" class="form-label">Email</label>
                <input type="email" value="<?php echo $content[0]['email'];?>" class="form-control" name="sub_email" id="sub_email" placeholder="Enter Email">
            </div>
        </div>
        <!--end col-->
        <!--end col-->
        <div class="col-xxl-6">
            <div>
                <label for="emailInput" class="form-label">Contact</label>
                <input type="number" value="<?php echo $content[0]['contact'];?>" class="form-control" name="sub_contact" id="sub_contact" placeholder="Enter your Contact" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="10">
            </div>
        </div>
        <!--end col-->

        <div class="col-xxl-6">
            <div>
                <label for="emailInput" class="form-label">Address</label>
                <input type="text" value="<?php echo $content[0]['address'];?>" class="form-control" name="sub_address" id="sub_address" placeholder="Enter your Address">
            </div>
        </div>

        <div class="col-xxl-6">
		<div class="form-group">
			<label class="form-label">Logo <span style="color:red;">*</span></label> 
			<?php  if(!empty($content[0]['logo'])){ ?>
			<img id="image" name="image" src="<?php echo base_url();?>assets/images/company_logo/<?php echo $content[0]['logo'];?>" width="150px" height="100px">
			<?php } ?>
			<input type="file" name="image" id="image" placeholder="choose image" class="form-control"/>
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
                    