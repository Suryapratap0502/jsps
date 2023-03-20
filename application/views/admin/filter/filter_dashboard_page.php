<div class="live-preview">
    <div class="table-responsive ">
        <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table align-middle table-nowrap mb-0">
                <thead>
                    <tr>
                        <th scope="col">Proposer Name</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Policy No.</th>
                        <th scope="col">Expiry Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subadminData as $row) { ?>
                        <tr>
                            <td><?php if (!empty($row['proposer_name'])) { ?><?php echo $row['proposer_name']; ?> <?php } ?></td>
                            <td><?php if ($row['company_name'] == $company[0]['id']) { ?><?php echo $company[0]['name']; ?> <?php } ?></td>
                            <td><?php if (!empty($row['policy_no'])) { ?><?php echo $row['policy_no']; ?> <?php } ?></td>
                            <td><?php if (!empty($row['expiry_date'])) { ?><?php echo $row['expiry_date']; ?> <?php } ?></td>
                            <!-- <td><a href="javascript:void(0);" class="link-success">View More <i class="ri-arrow-right-line align-middle"></i></a></td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>