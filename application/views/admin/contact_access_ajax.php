<form method="POST" id="updateaccess">

    <div class="row g-3">
        <div class="col-xxl-12">
            <div>
                <label for="firstName" class="form-label"> Select User</label>


             
                <select class="form-control" class="form-select form-control form-select-sm" aria-expanded="false" id="user_id" name="user_id" onchange="show_input(this.value);">
                <option selected disabled value="">Select User</option>    
                <?php foreach ($admin->result() as $row) { ?>

                        <option value="<?php echo $row->id; ?>" <?php if (!empty($content[0]['user_id'])) {
                                                                    if ($content[0]['user_id'] == $row->id) {
                                                                        echo "selected";
                                                                    }
                                                                } ?>><?php echo $row->name; ?></option>

                    <?php } ?>

                    

                </select>
            </div>

        </div>
        <!--end col-->
        <div class="col-xxl-10">
            <div>
                <label for="contact_access" class="form-label">Contact Access</label>

            </div>

        </div>
        <div class="col-xxl-2 ">
            <input class="form-check-input" type="checkbox" value="1" id="contact_access" name="contact_access" <?php if (!empty($content[0]['contact_access'])) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
        </div>
        <!--end col-->

        <!--end col-->
        <div class="col-xxl-10">
            <div>
                <label for="emailInput" class="form-label">Alternate No. Access</label>
            </div>
        </div>
        <div class="col-xxl-2 ">
            <input class="form-check-input" type="checkbox" value="1" id="alt_no_access" name="alt_no_access" <?php if (!empty($content[0]['alt_no_access'])) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
        </div>

        <!--end col-->
        <div class="col-xxl-10">
            <div>
                <label for="emailInput" class="form-label">Alternate No. 2 Access</label>
            </div>
        </div>
        <div class="col-xxl-2 ">
            <input class="form-check-input" type="checkbox" value="1" id="alt_no_2_access" name="alt_no_2_access" <?php if (!empty($content[0]['alt_no_2_access'])) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
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
    <input type="hidden" value="<?php echo $content[0]['id']; ?>" name="id">
</form>