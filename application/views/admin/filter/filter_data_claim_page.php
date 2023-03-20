<input type="hidden" value="<?= $totalpremium;?>" id="totalpremium">
<?php

                                            $i = 1;
                                            if (!empty($claim_initiated_list)) {
                                                foreach ($claim_initiated_list as $row) { 
                                                  $policy_no1 = base64_encode($row['policy_no']);
													$policy_no = rtrim($policy_no1, '=');

                                                    $form_remark = $this->Form_model->fetch_verify_data('form_disposition_remark', 'form_id', $row['form_id']);

                                                    if (!empty($form_remark)) {
                                            ?>
                                                        <ul class="nav nav-tabs-custom border-bottom-0 ms-4">

                                                            <?php foreach ($form_remark as $val) {
																$dis_name_bages  = $this->Form_model->list_common_where3('disposition', 'id', $val['disposition']);
                                								$show_disp  = $this->Form_model->show_disp('form_disposition_remark','done_by_module',$val['done_by_module'],'form_id',$val['form_id'],);
                                								$count_disp  = $this->Form_model->count_disp('form_disposition_remark','form_id',$val['form_id'],'done_by_module',$val['done_by_module']);
                                                                $underwriter = '';

                                                                if ($val['done_by_module'] == 'underwriter_verifier') {
                                                                    $underwriter = 'UNDERWRITING';
                                                                  $count_disp  = $this->Form_model->count_disp('form_disposition_remark','form_id',$val['form_id'],'done_by_module',$val['done_by_module']);
                                                                }
                                                                if ($val['done_by_module'] == 'operations') {
                                                                    $underwriter = 'OPERATIONS';
                                                                  $count_disp  = $this->Form_model->count_disp('form_disposition_remark','form_id',$val['form_id'],'done_by_module',$val['done_by_module']);
                                                                }
                                                                if ($val['done_by_module'] == 'services') {
                                                                    $underwriter = 'SERVICES';
                                                                  $count_disp  = $this->Form_model->count_disp('form_disposition_remark','form_id',$val['form_id'],'done_by_module',$val['done_by_module']);
                                                                }
                                              					if ($val['done_by_module'] == 'renewals') {
                                                                    $underwriter = 'RENEWALS';
                                                                  $count_disp  = $this->Form_model->count_disp('form_disposition_remark','form_id',$val['form_id'],'done_by_module',$val['done_by_module']);
                                                                }
                                              					
                                                               ?>
                                                                <li class="nav-item navitem1" style="background: <?php if ($underwriter == 'UNDERWRITING') {
                                                                                                                        echo "#71d7df";
                                                                                                                    } else if ($underwriter == 'OPERATIONS') {
                                                                                                                        echo "#ffbc00";
                                                                                                                    } else if ($underwriter == 'SERVICES') {
                                                                                                                        echo "#ff8100";
                                                                                                                    } else if ($underwriter == 'RENEWALS') {
                                                                                                                        echo "blue";
                                                                                                                    }  ?>">
                                                                    <a class="nav-link active">
                                                                        <?= $underwriter; ?> (<span class="curse_poin" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php $i=0; foreach($show_disp as $val){ $show_disp_name = $this->Form_model->list_common_where3('disposition','id',$val['disp_id']); echo '&#10;'. $show_disp_name[0]['disposition'] ;}?>"><?=$count_disp?></span>)

                                                                    </a>
                                                                </li>&nbsp;&nbsp;
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>


                                                    <div class="card border ribbon-box" style="border-color: #21252973!important;">
                                                        <div class="card-body">
                                                            <div class="ribbon ribbon-primary round-shape"><?= $i ?></div>
                                                            <div class="row count_1" style="margin-bottom:-15px;">
                                                                <div class="col-md-12" style="display:flex;align-items: center;">

                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">Patient Name</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['patient_name'])) { ?>
                                                                                    <?php echo $row['patient_name']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">COMPANY NAME</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['company_name'])) { 
                                                                                   echo $row['company_name']; 
                                                                                     } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">CLAIM INTIMATION NO.</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['claim_intimation_no'])) { ?>
                                                                                    <?php echo $row['claim_intimation_no']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">POLICY NO</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['policy_no'])) { ?>
                                                                                    <?php echo $row['policy_no']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">CLAIM STATUS</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['claim_status'])) { ?>
                                                                                    <?php echo $row['claim_status']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">TOTAL AMT</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['total_bill_amt'])) { ?>
                                                                                    <?php echo $row['total_bill_amt']; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                   
                                                                    <div class="col-md-2 setmodulwid">
                                                                        <p class="setpara mb-1">CLAIM DATE</p>
                                                                        <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['created_at'])) { ?>
                                                                                    <?php $created_at = date("d-m-Y", strtotime($row['created_at']));
                                                                                        echo $created_at; ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                                                    </div>
                                                                   
                                                                    
                                                                    <div class="col-md-1" style="margin-left:-20px;margin-top:-5px;margin-bottom:5px;">
                                                                        <button type="button" class="setsmallbtnsize mb-1">CLAIM INITIATED</button>
                                                                        <button type="button" class="setsmallbtnsize2 mb-1">EXPIRING SOON</button>
                                                                        <button type="button" class="setsmallbtnsize3 mb-1">GRIEVANCE</button>
                                                                    </div>
                                                                    <div class="col-md-1" style="margin-top:-12px;margin-left: 0;">

                                                                        <div class="d-flex gap-2" style="width: 150%;">

                                                                            <a class="btn  " data-id="4" data-toggle="tooltip" title="View" href="<?= base_url(); ?>form_listing/view_sale/<?php echo $row['id']; ?>"><i class="ri-eye-line" style="font-size:20px;"></i></a>
                                                                            <a type="button" class="btn btn-primary setsmallbtnsize4 mb-1" data-id="4" data-toggle="tooltip" title="View" href="<?= base_url(); ?>claims/view_claims/<?php echo $policy_no; ?>" style="">View Claim</a>
                                                                            <!--<a class="btn  " data-toggle="tooltip" title="View Claims"
                                                     href="<?= base_url(); ?>claims/view_claims/<?php echo $row['policy_no']; ?>"><i
                                                      class="ri-file-user-line"
                                                          style=" font-size:20px;"></i></a>-->


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