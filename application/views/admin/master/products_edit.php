<form method="POST" class="bannerData" id="editproducts">
    <div class="row g-3">
        <div class="col-xxl-12">
            <div>
                <label for="firstName" class="form-label">Company Name</label>
                <select class="form-select form-control" aria-label=".form-select-sm example" name="company_name" id="company_name" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                            echo "readonly";
                                                                                                                                        } ?>>
                    <?php foreach ($company as $data) {
                    ?>
                        <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['company_name'])) {
                                                                if ($content[0]['id'] == $data['id']) {
                                                                    echo "selected";
                                                                }
                                                            } ?>><?= $data['name'] ?></option>
                    <?php } ?>
                </select>
                <div class="error" id="companyError"></div>
            </div>
        </div>
    </div>
        <div class="row g-3">
        <!--end col-->
        <div class="col-xxl-12">
            <div>
                <label for="emailInput" class="form-label">Product Name</label>
                <input type="text" name="product_name" value="<?php echo $content[0]['product_name']; ?>" class="form-control" id="product_name" placeholder="Enter Product Name">
                <div class="error" id="productError"></div>
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
    <input type="hidden" value="<?php echo $content[0]['id']; ?>" name="id">
    <!--end row-->
</form>