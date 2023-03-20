<?php 
                              $i = 1;
                             	if(!empty($claim_initiated_list)) {
                              foreach($claim_initiated_list as $row)
                              { 
                                 $base_policy1 = base64_encode($row['policy_no']);
                                $base_policy1 = base64_encode($row['policy_no']);
								$base_policy = rtrim($base_policy1, '=');
// and later:
								//$base_policy = $url_param . str_repeat('=', strlen($url_param) % 4);
								//$base_policy = base64_decode($base_64);
                               
                               
                                $form_remark = $this->Form_model->fetch_verify_data('form_disposition_remark','form_id',$row['id']);
                                 
                                if(!empty($form_remark)) { 
                              ?>
                               <ul class="nav nav-tabs-custom border-bottom-0 ms-4"> 
                                <?php
                                $underwriter = '';
                                foreach($form_remark as $val) {  
                                    if(!empty($val['done_by_module'])){
                                  if($val['done_by_module']=='underwriter_verifier'){ $underwriter = 'UNDERWRITING';}	
                                  if($val['done_by_module']=='operations'){ $underwriter = 'OPERATIONS';}
                                  if($val['done_by_module']=='services'){ $underwriter = 'SERVICES';}	?>
                                <li class="nav-item navitem1" style="background: <?php if($underwriter == 'UNDERWRITING') {  echo "#71d7df"; }else if( $underwriter =='OPERATIONS'){echo "#ffbc00";} else if($underwriter =='SERVICES'){echo "#ff8100";} ?>">
                                  <a class="nav-link fw-semibold active">
                                    <?=$underwriter; ?>
                                  </a>
                                </li>&nbsp;&nbsp;
                                <?php } }?>
                                </ul>
                              <?php } ?>
                                  
                                  
                                <div class="card border ribbon-box" style="border-color: #21252973!important;">
                                <div class="card-body">
                                <div class="ribbon ribbon-primary round-shape"><?= $i ?></div>
                                    <div class="row" style="margin-bottom:-15px;">
                                        <div class="col-md-12" style="display:flex;align-items: center;">

                                            <div class="col-md-2 setmodulwid">
                                                <p class="setpara mb-1">PROPOSER NAME</p>
                                                <h5 class="seth5"><b>
                                                        <?php if (!empty($row['proposer_name'])) {?>
                                                        <?php echo $row['proposer_name'];?>
                                                        <?php }else { echo "NA";}?>
                                                    </b></h5>
                                            </div>
                                            <div class="col-md-2 setmodulwid">
                                                <p class="setpara mb-1">COMPANY NAME</p>
                                               <h5 class="seth5"><b>
                                                                                <?php if (!empty($row['company_name'])) { 
                                                                                    $id = $row['company_name'];
                                                                                        $this->db->select('name');
                                                                                        $this->db->from('company');
                                                                                        $this->db->where('id', $id);
                                                                                        $row1 = $this->db->get()->row();
                                                                                        echo $row1->name;
                                                                                    ?>
                                                                                <?php } else {
                                                                                    echo "NA";
                                                                                } ?>
                                                                            </b></h5>
                                            </div>
                                            <div class="col-md-2 setmodulwid">
                                                <p class="setpara mb-1">PLAN</p>
                                                <h5 class="seth5"><b>
                                                        <?php if (!empty($row['product_name'])) {?>
                                                        <?php echo $row['product_name'];?>
                                                        <?php } else { echo "NA";}?>
                                                    </b></h5>
                                            </div>
                                            <div class="col-md-2 setmodulwid">
                                                <p class="setpara mb-1">NET PREMIUM</p>
                                                <h5 class="seth5"><b>
                                                        <?php if (!empty($row['net_premium'])) {?>
                                                        <?php echo $row['net_premium'];?>
                                                        <?php }else { echo "NA";}?>
                                                    </b></h5>
                                            </div>
                                            <div class="col-md-2 setmodulwid">
                                            <p class="setpara mb-1">BOOK DATE</p>
                                            <h5 class="seth5"><b>
                                                    <?php if (!empty($row['date_of_closure'])) {?>
                                                    <?php echo $row['date_of_closure'];?>
                                                    <?php }else { echo "NA";}?>
                                                </b></h5>
                                            </div>
                                          <div class="col-md-2 setmodulwid">
                                            <p class="setpara mb-1">POLICY NO</p>
                                            <h5 class="seth5"><b>
                                                    <?php if (!empty($row['policy_no'])) {?>
                                                    <?php echo $row['policy_no'];?>
                                                    <?php }else { echo "NA";}?>
                                                </b></h5>
                                            </div>
                                          <div class="col-md-2 setmodulwid">
                                            <p class="setpara mb-1">EXPIRY DATE</p>
                                            <h5 class="seth5"><b>
                                                    <?php if (!empty($row['expiry_date'])) {?>
                                                    <?php echo $row['expiry_date'];?>
                                                    <?php }else { echo "NA";}?>
                                                </b></h5>
                                            </div>
                                          <div class="col-md-1" style="margin-left:-20px;margin-top:-5px;margin-bottom:5px;">
                                            <button type="button" class="setsmallbtnsize mb-1">CLAIM INITIATED</button>
                                            <button type="button" class="setsmallbtnsize2 mb-1">EXPIRING SOON</button>
                                            <button type="button" class="setsmallbtnsize3 mb-1">GRIEVANCE</button>
                                          </div>
                                            <div class="col-md-1" style="margin-top:-12px;margin-left: 0;">

                                                <div class="d-flex gap-2" style="width: 150%;">
                                                   
                                                    <a class="btn  " data-id="4" data-toggle="tooltip" title="View"
                                                        href="<?= base_url();?>form_listing/view_sale/<?php echo $row['id'];?>"><i
                                                            class="ri-eye-line" style="font-size:20px;"></i></a>
                                                   <a type="button" class="btn btn-primary setsmallbtnsize4 mb-1" data-id="4" data-toggle="tooltip" title="View"
                                                        href="<?= base_url();?>claims/view_claims/<?php echo $base_policy;?>" style="">View Claim</a>
                                                  <!--<a class="btn  " data-toggle="tooltip" title="View Claims"
                                                     href="<?= base_url();?>claims/view_claims/<?php echo $row['policy_no'];?>"><i
                                                      class="ri-file-user-line"
                                                          style=" font-size:20px;"></i></a>-->
                                                 
                                                   
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                </div>
                                </div>
                                <?php $i++; } }?>