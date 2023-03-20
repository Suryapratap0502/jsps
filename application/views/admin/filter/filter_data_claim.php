<?php $company = $this->Form_model->list_common('company');
$team_leader = $this->Form_model->list_common('team_leader');
$i = 1;
if (!empty($claim)) {
    foreach ($claim as $row) { ?>
        <tr>
            <td class="count_2"><?php echo $i; ?></td>
            <td><?php if (!empty($row['policy_no'])) { ?><?php echo $row['policy_no'] ?> <?php } ?></td>
            <td><?php if (!empty($row['patient_name'])) { ?><?php echo $row['patient_name'] ?> <?php } ?></td>
           <td><?php if (!empty($row['company_name'])) { ?><?php echo $row['company_name'] ?> <?php } ?></td>
            <td><?php if (!empty($row['claim_intimation_no'])) { ?><?php echo $row['claim_intimation_no']; ?> <?php } ?></td>

            <td><?php if (!empty($row['reason_admit'])) { ?><?php echo $row['reason_admit'] ?> <?php } ?></td>
            <td><?php if (!empty($row['health_card'])) { ?><?php echo $row['health_card'] ?> <?php } ?></td>
            <td><?php if (!empty($row['admission_date'])) { ?><?php echo $row['admission_date'] ?> <?php } ?></td>
            <td><?php if (!empty($row['is_network'])) { ?><?php echo $row['is_network'] ?> <?php } ?></td>


            <td><?php if (!empty($row['claim_type'])) { ?><?php echo $row['claim_type'] ?> <?php } ?></td>
            <td><?php if (!empty($row['claim_for'])) { ?><?php echo $row['claim_for'] ?> <?php } ?></td>
            <td><?php if (!empty($row['pre_auth_status'])) { ?><?php echo $row['pre_auth_status'] ?> <?php } ?></td>
            <td><?php if (!empty($row['pre_auth_amt'])) { ?><?php echo $row['pre_auth_amt'] ?> <?php } ?></td>
            <td><?php if (!empty($row['claim_status'])) { ?><?php echo $row['claim_status']; ?> <?php } ?></td>

            <td><?php if (!empty($row['total_bill_amt'])) { ?><?php echo $row['total_bill_amt'] ?> <?php } ?></td>
            <td><?php if (!empty($row['total_approve_amt'])) { ?><?php echo $row['total_approve_amt'] ?> <?php } ?></td>
            <td><?php if (!empty($row['hospital_discount'])) { ?><?php echo $row['hospital_discount'] ?> <?php } ?></td>
            <td><?php if (!empty($row['deduction_amt'])) { ?><?php echo $row['deduction_amt'] ?> <?php } ?></td>
            <td><?php if (!empty($row['deduction_amt_details'])) { ?><?php echo $row['deduction_amt_details']; ?> <?php } ?></td>

            <td><?php if (!empty($row['paid_on'])) { ?><?php echo $row['paid_on'] ?> <?php } ?></td>
            <td><?php if (!empty($row['remarks'])) { ?><?php echo $row['remarks'] ?> <?php } ?></td>
            <td><?php if (!empty($row['final_status'])) { ?><?php echo $row['final_status'] ?> <?php } ?></td>

        </tr>
<?php $i++;
    }
} else{ echo "No Data";} ?>
<input type="hidden" value="<?= $total_premium;?>" class="a" id="totalpremium1">
<script>
  var to_pre = $('.a').val();
  sessionStorage.setItem("total_pre", to_pre);

</script> 