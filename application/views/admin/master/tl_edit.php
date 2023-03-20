
<form method="POST" class="bannerData" id="editteamleader">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="firstName" class="form-label">Name</label>
                                    <input type="text" value="<?php echo $content[0]['name'];?>" class="form-control" name="tl_name" id="firstName" placeholder="Enter Name">
                                    <div class="error" id="subnameError"></div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="lastName" class="form-label">Email</label>
                                    <input type="email" value="<?php echo $content[0]['email'];?>" class="form-control" name="tl_email" id="lastName" placeholder="Enter Email">
                                </div>
                            </div>
                            <!--end col-->
                            
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="emailInput" class="form-label">Contact</label>
                                    <input type="number" name="tl_contact" value="<?php echo $content[0]['contact'];?>" class="form-control" id="tl_contact" placeholder="Enter your Contact">
                                </div>
                            </div>
                            <!--end col-->
                            
                            <div class="col-xxl-6">
                                <div>
                                    <label for="passwordInput" class="form-label">Employee Id</label>
                                     <input type="number" name="employee_id" value="<?php echo $content[0]['emp_id'];?>" class="form-control" id="employee_id" placeholder="Enter your Contact">
                                </div>
                            </div>
                          
                          	 <div class="col-xxl-6">
                                <div>
                                    <label for="passwordInput" class="form-label">Department</label>
                                     <input type="text" name="tl_department" value="<?php echo $content[0]['department'];?>" class="form-control" id="tl_department" placeholder="Enter your Contact">
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
                    