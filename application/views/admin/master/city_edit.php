
<form method="POST" class="bannerData" id="editteamleader">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div>
                                    <label for="firstName" class="form-label">Name</label>
                                    <input type="text" value="<?php echo $content[0]['name'];?>" class="form-control" name="city_name" id="firstName" placeholder="Enter Name">
                                    <div class="error" id="subnameError"></div>
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
                    