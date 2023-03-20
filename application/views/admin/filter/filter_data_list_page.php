 <input type="hidden" value="<?= $totalpremium;?>" id="totalpremium">
<?php if(!empty($module_short_name)){
  $model_short_name = $module_short_name;
}
else
{
  $model_short_name ='';
}
$i = 1;
if (!empty($subadminData)) {
  foreach ($subadminData as $row) {
    $form_remark = $this->Form_model->fetch_verify_data('form_disposition_remark', 'form_id', $row['form_id']);
    if (!empty($form_remark)) {
?>
      <ul class="nav nav-tabs-custom border-bottom-0 ms-4">

        <?php foreach ($form_remark as $val) { 

          $underwriter = '';

          if ($val['done_by_module'] == 'underwriter_verifier') {
            $underwriter = 'UNDERWRITING';
          }
          if ($val['done_by_module'] == 'operations') {
            $underwriter = 'OPERATIONS';
          }
          if ($val['done_by_module'] == 'services') {
            $underwriter = 'SERVICES';
          }
          if ($val['disposition'] == '28') {
            $underwriter = 'ENFORCED';
          }
          
          if ($val['disposition'] == '29') {
            $underwriter = 'REJECTED';
          }?>
          <li class="nav-item navitem1" style="background: <?php if ($underwriter == 'UNDERWRITING') {
                                                              echo "#71d7df";
                                                            } else if ($underwriter == 'OPERATIONS') {
                                                              echo "#ffbc00";
                                                            } else if ($underwriter == 'SERVICES') {
                                                              echo "#ff8100";
                                                            } else if ($underwriter == 'ENFORCED') {
                                                              echo "blue";
                                                            }else if($underwriter == 'REJECTED')
                                                            {echo "#ff0000";} ?>">
            <a class="nav-link active">
              <?= $underwriter; ?>
            </a>
          </li>&nbsp;&nbsp;
        <?php } ?>
      </ul>
    <?php } ?>

    <div class="card border ribbon-box shadow-none" style="border-color: #21252973!important; padding: 0px 4px;">
      <div class="card-body">
        <div class="ribbon ribbon-primary round-shape"><?= $i ?></div>
        <div class="row count_1" style="margin-bottom: -15px;">
          <div class="col-md-12 mb-1" style="display:flex;align-items: center;">

            <div class="col-md-2 setmodulwid">
              <p class="setpara mb-1">PROPOSER NAME</p>
              <h5 class="seth5"><b>
                  <?php if (!empty($row['proposer_name'])) { ?>
                    <?php echo $row['proposer_name'] ?>
                  <?php }  else {
                    echo "NA";
                  }?>
                </b></h5>
            </div>
            <div class="col-md-2 setmodulwid">
              <p class="setpara mb-1">COMPANY NAME</p>
              <h5 class="seth5"><b>
                  <?php if (!empty($row['company_name'])) { ?>
                    <?php $id = $row['company_name'];
                    $this->db->select('name');
                    $this->db->from('company');
                    $this->db->where('id', $id);
                    $row1 = $this->db->get()->row();
                    echo $row1->name;
                  
                   } else {
                    echo "NA";
                  } ?>
                </b></h5>
            </div>
            <div class="col-md-2 setmodulwid">
              <p class="setpara mb-1">PLAN NAME</p>
              <h5 class="seth5"><b>
                  <?php if (!empty($row['product_name'])) { ?>
                    <?php echo $row['product_name'] ?>
                  <?php }  else {
                    echo "NA";
                  }?>
                </b></h5>
            </div>
            <div class="col-md-2 setmodulwid">
              <p class="setpara mb-1">NET PREMIUM</p>
              <h5 class="seth5"><b>
                  <?php if (!empty($row['net_premium'])) { ?>
                    <?php echo $row['net_premium']; ?>
                  <?php }  else {
                    echo "NA";
                  }?>
                </b></h5>
            </div>
            <div class="col-md-2 setmodulwid">
              <p class="setpara mb-1">BOOK DATE</p>
              <h5 class="seth5"><b>
                  <?php if (!empty($row['date_of_closure'])) { ?>
                    <?php  $bookdate = date("d-m-Y", strtotime($row['date_of_closure']));
                       echo $bookdate; ?>
                  <?php }  else {
                    echo "NA";
                  }?>
                </b></h5>
            </div>
            <div class="col-md-2 setmodulwid">
              <p class="setpara mb-1">POLICY NO</p>
              <h5 class="seth5"><b>
                  <?php if (!empty($row['policy_no'])) { ?>
                    <?php echo $row['policy_no'] ?>
                  <?php } else {
                    echo "NA";
                  } ?>
                </b></h5>
            </div>
            <div class="col-md-2 setmodulwid">
              <p class="setpara mb-1">EXPIRY DATE</p>
              <h5 class="seth5"><b>
                  <?php if (!empty($row['policy_end_date'])) { ?>
                    <?php $expirydate = date("d-m-Y", strtotime($row['policy_end_date']));
                       echo $expirydate; ?>
                  <?php } else {
                   echo "NA";
                     }?>
                </b></h5>
            </div>
            <div class="col-md-1" style="margin-left:-20px;margin-top:-5px;margin-bottom:5px;">
              <button type="button" class=" setsmallbtnsize mb-1">CLAIM INITIATED</button>
              <button type="button" class="setsmallbtnsize2 mb-1">EXPIRING SOON</button>
              <button type="button" class="setsmallbtnsize3 mb-1">GRIEVANCE</button>
            </div>
            <div class="col-md-1" style="
    											margin-top: -10px;margin-left: 0;">

              <div class="d-flex gap-2">
                <a class="btn  " data-toggle="tooltip" title="Edit" href="<?= base_url(); ?>form_listing/subadminedit/<?= $model_short_name ?>/<?php echo $row['form_id']; ?>"><i class="ri-edit-2-line" style=" font-size:20px;"></i></a>
                <a class="btn  " data-id="4" data-toggle="tooltip" title="View" href="<?= base_url(); ?>form_listing/view_sale/<?php echo $row['form_id']; ?>"><i class="ri-eye-line" style=" font-size:20px;"></i></a>
                <a class="btn " data-toggle="tooltip" title="Delete">
                  <?php if ($this->rbac->hasPrivilege($model_short_name, 'can_delete')) { ?>
                    <i class="ri-delete-bin-6-line" name="archive" class="remove" type="submit" onclick="archiveFunction(<?php echo $row['form_id']; ?>)" data-toggle="tooltip" data-placement="bottom" style=" font-size:20px;"></i>
                  <?php } ?>
                </a>
              </div>

            </div>
          </div>
        </div>


      </div>
    </div>
<?php $i++;
  }
} ?>
<script>
  var to_pre = $('#totalpremium').val();
  sessionStorage.setItem("total_pre", to_pre);

</script>