
<form method="POST" class="bannerData" id="bannerModelSubmits">
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
                <label for="emailInput" class="form-label">Employee id</label>
                <input type="text" value="<?php echo $content[0]['emp_id'];?>" class="form-control" name="sub_employee" id="sub_employee" placeholder="Enter your Employee id">
            </div>
        </div>

        <div class="col-xxl-6">
            <div>
                <label for="emailInput" class="form-label">Department</label>
                <input type="text" value="<?php echo $content[0]['department'];?>" class="form-control" name="sub_department" id="sub_department" placeholder="Enter your Department">
            </div>
        </div>

        <div class="col-xxl-6">
            <div>
            <label for="emailInput" class="form-label">Admin role</label>
                <select class="form-control" name="sub_adminrole"> 
                    value="<?php echo $content[0]['admin_role'];?>">
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
                <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="add-btn">Submit</button>
            </div>
        </div>
        <!--end col-->
    </div>
    <input type="hidden" value="<?php echo $content[0]['id'];?>" name="id">
    <!--end row-->
</form>
                    