<form method="POST" class="editcus" id="EditCustomer">
                                            <div class="row g-3">
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="firstName" class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="cus_name" id="cus_name"  value="<?php echo $content[0]['admin_name'];?>" placeholder="Enter Name">
                                                    </div>
                                                   
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="lastName" class="form-label">Email</label>
                                                        <input type="email"  value="<?php echo $content[0]['admin_email'];?>" class="form-control" name="cus_email" id="cus_email" placeholder="Enter Email">
                                                    </div>
                                                    
                                                </div>
                                                <!--end col-->
                                               
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="emailInput" class="form-label">Contact</label>
                                                        <input type="number" class="form-control" name="cus_contact"  value="<?php echo $content[0]['admin_contact'];?>" id="cus_contact" placeholder="Enter your Contact">
                                                    </div>
                                                    
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                          <label for="emailInput" class="form-label">Admin Type</label>
                                                        <select class="form-control" name="cus_select">
                                                            <option value="Customer">Customer</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-xxl-6">
                                                    <div>
                                                        <label for="passwordInput" class="form-label">Address</label>
                                                        <textarea class="form-control"  value="<?php echo $content[0]['admin_address'];?>" name="cus_address" id="cus_address" placeholder="Enter Your Address"></textarea>
                                                    </div>
                                                    
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                             <input type="hidden" value="<?php echo $content[0]['admin_user_id'];?>" name="admin_user_id">
                                        </form>