
<form method="POST" class="bannerData" id="edituploaddata">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="firstName" class="form-label">Policy No.</label>
                                    <input type="text" value="<?php echo $content[0]['policy_no'];?>" class="form-control" name="policy_no" id="policy_no" placeholder="Enter Policy No.">
                                    <div class="error" id="subnameError"></div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="lastName" class="form-label">Renewal Year</label>
                                    <input type="number" value="<?php echo $content[0]['renewal_year'];?>" class="form-control" name="renewal_year" id="renewal_year" placeholder="Enter Renewal Year">
                                </div>
                            </div>
                            <!--end col-->
                            
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="emailInput" class="form-label">Renewal Premium</label>
                                    <input type="number" name="renewal_premium" value="<?php echo $content[0]['renewal_premium'];?>" class="form-control" id="renewal_premium" placeholder="Enter Renewal Premium">
                                </div>
                            </div>
                            <!--end col-->
                            
                          <div class="col-xxl-6">
                                <div>
                                    <label for="emailInput" class="form-label">Policy End Date</label>
                                    <input type="date" name="policy_end_date" value="<?php echo $content[0]['policy_end_date'];?>" class="form-control" id="policy_end_date" placeholder="Select Policy End Date">
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
                    