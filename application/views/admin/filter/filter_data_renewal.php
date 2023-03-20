<?php $company = $this->Form_model->list_common('company');
$team_leader = $this->Form_model->list_common('team_leader');
$i = 1;
if (!empty($renewal)) {
    foreach ($renewal as $row) {
        $json = json_decode($row['sub_remark'], true); ?>
        <tr>
            <td class="count_2"><?php echo $i; ?></td>
            <td><?php if (!empty($row['customer_name'])) { ?><?php echo $row['customer_name'] ?> <?php } else {
                                                     echo $row['proposer_name'];
                                        } ?></td>
            <td><?php if (!empty($row['policy_no'])) { ?><?php echo $row['policy_no'] ?> <?php } ?></td>

            <td><?php if (!empty($json['New Policy'])) { ?><?php echo $json['New Policy'] ?> <?php } ?></td>
            <td><?php if (!empty($row['contact'])) { ?><?php echo $row['contact']; ?> <?php } ?></td>

            <td><?php if (!empty($json['Alternate Number'])) { ?><?php echo $json['Alternate Number'] ?> <?php } ?></td>
            <td><?php if (!empty($row['alternate_no'])) { ?><?php echo $row['alternate_no'] ?> <?php } ?></td>
            <td><?php if (!empty($row['email'])) { ?><?php echo $row['email'] ?> <?php } ?></td>
            <td><?php if (!empty($row['customer_city'])) { ?><?php echo $row['customer_city'] ?> <?php } ?></td>


            <td><?php if (!empty($json['Proposer Date Of Birth'])) { ?><?php echo $json['Proposer Date Of Birth'] ?> <?php } ?></td>
            <td><?php if (!empty($row['company_name'])) { ?><?php if ($row['company_name'] == $company[0]['id']) {
                                                                echo $company[0]['name'];
                                                            } ?> <?php } ?></td>
            <td><?php if (!empty($row['product_name'])) { ?><?php echo $row['product_name'] ?> <?php } ?></td>
            <td><?php if (!empty($row['policy_end_date'])) { ?><?php echo $row['policy_end_date'] ?> <?php } ?></td>
            <td>Payment Due On</td>

            <td><?php if (!empty($row['coverage_type'])) { ?><?php echo $row['coverage_type'] ?> <?php } ?></td>
            <td><?php if (!empty($json['New Sum Assured'])) { ?><?php echo $json['New Sum Assured'] ?> <?php } ?></td>
            <td>Payment Date</td>
            <td>Due Renewal</td>
            <td>Paid Renewal</td>

            <td>Upsell</td>
            <td><?php if (!empty($json['New Payment Tenure'])) { ?><?php echo $json['New Payment Tenure'] ?> <?php } ?></td>
          	<td><?php if (!empty($row['desposition_id'])) { ?><?php $id = $row['desposition_id']; 
                                                                    $this->db->select('*');
                                                                    $this->db->from('disposition');
                                                                    $this->db->where('id',$id);
                                                                    $rows1 = $this->db->get()->row();
                                                                    echo $rows1->disposition; ?> <?php } ?></td>
            <td><?php if (!empty($row['agent'])) { ?><?php echo $row['agent'] ?> <?php } ?></td>
            <td><?php if (!empty($json['New Payment Mode'])) { ?><?php echo $json['New Payment Mode'] ?> <?php } ?></td>
            <td><?php if (!empty($json['New Discount'])) { ?><?php echo $json['New Discount'] ?> <?php } ?></td>
            <td><?php if (!empty($json['Upselling'])) { ?><?php echo $json['Upselling'] ?> <?php } ?></td>
        </tr>
<?php $i++;
    }
} else{ echo "No Data";} ?>
<input type="hidden" value="<?= $total_premium;?>" class="a" id="totalpremium1">
<script>
  var to_pre = $('.a').val();
  sessionStorage.setItem("total_pre", to_pre);

</script> 