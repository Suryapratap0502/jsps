<div class="d-flex">
    <div class="col-xxl-10 flex-fill">
        <label for="contact_access" class="form-label">Contact Access</label>
    </div>
    <div class="col-xxl-2 ">
        <input class="form-check-input" type="checkbox" value="1" id="contact_access" name="contact_access" <?php if (!empty($content[0]['contact_access'])) {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
    </div>
</div>
<!--end col-->

<!--end col-->
<div class="d-flex mt-3 ">
    <div class="col-xxl-10 flex-fill">
        <label for="emailInput" class="form-label">Alternate No. Access</label>
    </div>
    <div class="col-xxl-2 ">
        <input class="form-check-input" type="checkbox" value="1" id="alt_no_access" name="alt_no_access" <?php if (!empty($content[0]['alt_no_access'])) {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
    </div>
</div>

<!--end col-->
<div class="d-flex mt-3 ">
    <div class="col-xxl-10 flex-fill">
        <label for="emailInput" class="form-label">Alternate No. 2 Access</label>
    </div>
    <div class="col-xxl-2 ">
        <input class="form-check-input" type="checkbox" value="1" id="alt_no_2_access" name="alt_no_2_access" <?php if (!empty($content[0]['alt_no_2_access'])) {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
    </div>
</div>
<!--end col-->