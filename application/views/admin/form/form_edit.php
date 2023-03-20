<?php $this->load->view('admin/link.php');
$model_short_name = $module_short;
$sess = $this->session->userdata('pmsadmin');
$id = $sess['id'];
$role = $sess['role'];
$name = $sess['name'];
?>
<!-- Begin page -->
<div id="layout-wrapper">
  <?php $this->load->view('admin/topar.php'); ?>
  <?php $this->load->view('admin/imgheader.php'); ?>
  <?php $this->load->view('admin/sidebar.php'); ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#Datatable1').DataTable();
  });
</script>
<style>
  select[readonly] {
    background: #eee;
    cursor: no-drop;
  }

  #open_docs_part {
    display: none;
  }

  select[readonly] option {
    display: none;
  }

  .reason_block {
    display: none;
  }

  .setpara {
    font-size: 9px;
  }

  .seth5 {
    font-size: 12px;
  }

  .setredcolor {
    color: red;
  }

  .form-control {
    display: block;
    width: 100%;
    padding: 0.2rem 0.6rem !important;
  }

  .setcalc {
    width: 16.66% !important;
  }

  .setcalc4 {
    width: 16.66% !important;
  }

  .setcalc8 {
    width: 55% !important;
    float: right;
  }

  label {
    text-transform: uppercase;
  }

  input[type=file]::-webkit-file-upload-button {
    display: none;
  }

  #i1 {
    display: none;
  }

  #i2 {
    display: none;
  }

  #i3 {
    display: none;
  }

  #i4 {
    display: none;
  }

  #i5 {
    display: none;
  }

  #sub_desposition {
    display: none;
  }

  #member_add {
    display: none;
  }

  #member_details {
    display: none;
  }

  #sel_insured {
    display: none;
  }

  #add_insured_pd {
    display: none;
  }

  #company_name_drop {
    display: none;
  }

  #alter_nate_no_2 {
    display: none;
  }

  .policy_details_date {
    display: none;
  }

  .policy_renewed_done {
    display: none;
  }

  .ribbon-three {
    position: absolute;
    top: -6.1px;
    left: -48px !important;
    transform: rotate(90deg) !important;
  }

  .ribbon-three::after {
    left: 0px !important;
  }

  .customizer-setting {
    position: fixed;
    bottom: 350px !important;
    right: 20px;
    z-index: 1000;
  }

  .set2btn {
    position: fixed;
    bottom: 250px !important;
    right: 20px;
    z-index: 1000;
  }

  .remark_block {
    display: none;
  }

  #select_yes_no {
    display: none;
  }

  .accordion-button::after {
    filter: invert(1);
    margin-left: 9px;
  }

  .accordion-item {
    border: none !important;
  }

  #send_sms {
    display: none;
  }

  #sendbtn {
    display: none;
  }

  #not_renewed_sub_disposition {
    display: none;
  }

  .port_in_field {
    display: none;
  }

  .policy_renewed_done {
    display: none;
  }
</style>
<div class="vertical-overlay"></div>
<div class="main-content">
  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?php if (!empty($model_short_name)) {
                                  echo $model_short_name ??  '';
                                } ?> Data</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?php base_url() ?>Dashboard">Dashboards</a></li>
                <li class="breadcrumb-item active"><?php if (!empty($model_short_name)) {
                                                      echo $model_short_name ??  '';
                                                    } ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header align-items-center d-flex">
              <h4 class="card-title mb-0 flex-grow-1 " style="text-transform:uppercase;"><?php if (!empty($model_short_name)) {
                                                                                            echo $model_short_name ??  '';
                                                                                          } ?> Data</h4>
            </div><!-- end card header -->
            <div class="card-body">
              <!--1 part-->
              <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas" aria-modal="true" role="dialog" style="visibility: visible;">
                <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
                  <h5 class="m-0 me-2 text-white">SCHEDULED CALL</h5>
                  <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0">
                  <div data-simplebar="init" class="h-100">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                      <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                      </div>
                      <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                          <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px;">
                              <?php foreach ($scheduled_list as $data) {
                              ?>
                                <div class="p-4" style="margin-bottom: -45px;">
                                  <h6 class="mb-0 fw-semibold text-uppercase">CALL DATE TIME</h6>
                                  <p class="text-muted"><?php echo $data['call_time']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'claims') {
                                                                                              echo "readonly";
                                                                                            } ?></p>
                                </div>
                                <div class="p-4" style="margin-bottom: -45px;">
                                  <h6 class="mb-0 fw-semibold text-uppercase">CALL RENEWAL</h6>
                                  <p class="text-muted"><?php echo $data['call_remark']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'claims') {
                                                                                                echo "readonly";
                                                                                              } ?></p>
                                </div>
                                <div class="p-4">
                                  <h6 class="mb-0 fw-semibold text-uppercase">CALL SCHEDULED BY</h6>
                                  <p class="text-muted"><?php echo $data['user_id']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'claims') {
                                                                                            echo "readonly";
                                                                                          } ?></p>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="simplebar-placeholder" style="width: auto; height: 1528px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                      <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                      <div class="simplebar-scrollbar" style="height: 263px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                  </div>
                </div>
                <div class="offcanvas-footer border-top p-3 text-center">
                  <!--<div class="row">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy Now</a>
                                    </div>
                                </div>-->
                </div>
              </div>
              <div class="customizer-setting d-none d-md-block" onclick="showDiv()">
                <div class="btn-info btn-rounded shadow-lg btn p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
                  <span class="ribbon-three ribbon-three-info"><span>SCHEDULE CALL</span></span>
                </div>
              </div>
              <!--2 part-->
              <div class="offcanvas offcanvas-end border-0" tabindex="-2" id="theme-settings-offcanvas1" aria-modal="true" role="dialog" style="visibility: visible;">
                <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
                  <h5 class="m-0 me-2 text-white">ASSIGNED CALL</h5>
                  <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body p-0">
                  <div data-simplebar="init" class="h-100">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                      <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                      </div>
                      <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                          <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px;">
                              <?php foreach ($scheduled_list as $data) {
                              ?>
                                <div class="p-4" style="margin-bottom: -45px;">
                                  <h6 class="mb-0 fw-semibold text-uppercase">ASSIGNED BY</h6>
                                  <p class="text-muted"><?php echo $data['user_id']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'claims') {
                                                                                            echo "readonly";
                                                                                          } ?></p>
                                </div>
                                <div class="p-4" style="margin-bottom: -45px;">
                                  <h6 class="mb-0 fw-semibold text-uppercase">ASSIGNED DATE-TIME</h6>
                                  <p class="text-muted"><?php echo $data['call_time']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'claims') {
                                                                                              echo "readonly";
                                                                                            } ?></p>
                                </div>
                                <div class="p-4" style="margin-bottom: -45px;">
                                  <h6 class="mb-0 fw-semibold text-uppercase">SCHEDULED DATE-TIME</h6>
                                  <p class="text-muted"><?php echo $data['call_time']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'claims') {
                                                                                              echo "readonly";
                                                                                            } ?></p>
                                </div>
                                <div class="p-4">
                                  <h6 class="mb-0 fw-semibold text-uppercase">ASSIGNED REMARKS</h6>
                                  <p class="text-muted"><?php echo $data['call_remark']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'claims') {
                                                                                                echo "readonly";
                                                                                              } ?></p>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="simplebar-placeholder" style="width: auto; height: 1528px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                      <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                      <div class="simplebar-scrollbar" style="height: 263px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                    </div>
                  </div>
                </div>
                <div class="offcanvas-footer border-top p-3 text-center">
                  <!--<div class="row">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy Now</a>
                                    </div>
                                </div>-->
                </div>
              </div>
              <div class="customizer-setting d-none d-md-block set2btn">
                <div class="btn-info btn-rounded shadow-lg btn p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas1" aria-controls="theme-settings-offcanvas1">
                  <span class="ribbon-three ribbon-three-info"><span>ASSIGNED CALL</span></span>
                </div>
              </div>
              <div class="live-preview">
                <form method="POST" id="edit_sale_closure" style="width: 100%;">
                  <div class="row">
                    <!-- first-->
                    <div class="col-md-12">
                      <h5 class="mb-3"><b>PERSONAL INFORMATION</b></h5>
                      <div class="row">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Log ID</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $content[0]['log_id']; ?>" name="proposer_name" id="proposer_name" aria-describedby="emailHelp" <?php if ($role != 'Master') {
                                                                                                                                                                                                                echo "readonly";
                                                                                                                                                                                                              } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Customer ID</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $content[0]['id']; ?>" name="proposer_name" id="proposer_name" aria-describedby="emailHelp" readonly>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Proposer Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $content[0]['proposer_name']; ?>" name="proposer_name" id="proposer_name" aria-describedby="emailHelp" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">DOB(Eldest Member)</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="dob" value="<?php echo $content[0]['dob']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                echo "readonly";
                                                                                                                                                                              } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">City</label>
                            <input class="search__input search form-control" type="text" name="customer_city" id="customer_city" placeholder="Enter Your City" value="<?php echo $id = $content[0]['customer_city'];
                                                                                                                                                                      $this->db->select('*');
                                                                                                                                                                      $this->db->from('city');
                                                                                                                                                                      $this->db->where('id', $id);
                                                                                                                                                                      $rows1 = $this->db->get()->row();
                                                                                                                                                                      if (!empty($rows1)) {
                                                                                                                                                                        echo $rows1->name;
                                                                                                                                                                      } ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                              echo "readonly";
                                                                                                                                                                            } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Email ID</label>
                            <input type="email" class="form-control" id="exampleInputno" aria-describedby="emailHelp"  placeholder="Enter Your Email"name="email" id="email" value="<?php echo $content[0]['email']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                            echo "readonly";
                                                                                                                                                                                          } ?>>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Contact No.</label>
                             <input type="text" class="form-control" aria-describedby="emailHelp" name="contact" id="contact" placeholder="Enter Contact No." value="<?php if (!empty($this->auth_jsps->get_contact_access('contact_access',$sess_id))) {
                                                                                                                                                                          echo $content[0]['contact'];
                                                                                                                                                                    } else {
                                                                                                                                                                      echo $this->auth_jsps->get_hidden_contact($content[0]['contact']);
                                                                                                                                                                    } ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals' || $model_short_name == 'underwriter_verifier') {
                                                                                                                                                                            echo "readonly";
                                                                                                                                                                          } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Alternate No</label>
                           <input type="text" class="form-control" aria-describedby="emailHelp" name="alternate_no" id="alternate_no" placeholder="Enter Alternate No." value="<?php if (!empty($this->auth_jsps->get_contact_access('alt_no_access',$sess_id))) {
                                                                                                                                                                                  echo $content[0]['alternate_no'];
                                                                                                                                                                                 } else {
                                                                                                                                                                                  echo $this->auth_jsps->get_hidden_contact($content[0]['alternate_no']);
                                                                                                                                                                                } ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals' || $model_short_name == 'underwriter_verifier') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>  
                        </div>
                        </div>
                        <?php if (!empty($content[0]['alt_no_2'])) { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Alternate No. 2</label>
                              <input type="number" class="form-control" name="alt_no_2" value="<?php if ((!empty($this->auth_jsps->get_contact_access('alt_no_2_access',$sess_id)))) {
                                                                                                  
                                                                                                  echo $content[0]['alt_no_2'];
                                                                                                  
                                                                                                } else {
                                                                                                  echo $this->auth_jsps->get_hidden_contact($content[0]['alt_no_2']);
                                                                                                } ?>" placeholder="Alternate No. 2" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals' || $model_short_name == 'underwriter_verifier') {
                                                                                                                                      echo "readonly";
                                                                                                                                    } ?>>
                            </div>

                          </div>
                        <?php } ?>
                        <?php if ($model_short_name == 'operations') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Login</label>
                              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="login" id="login">
                                <option value="<?php echo $content[0]['login']; ?>" selected><?php echo $content[0]['login']; ?></option>
                                <option value="Online">Online</option>
                                <option value="Pending">Pending</option>
                                <option value="Login">Login</option>
                              </select>
                            </div>
                          </div>
                        <?php } ?>


                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="address"  placeholder="Enter Your Address"<?php if ($model_short_name != 'underwriter_verifier') {
                                                                                          echo "readonly";
                                                                                        } ?>><?php echo $content[0]['address']; ?></textarea>
                          </div>
                        </div>

                      </div>
                    </div>
                    <hr>
                    <!-- second-->
                    <div class="col-md-12">
                      <h5 class="mb-3"><b>POLICY DETAILS</b></h5>
                      <div class="row">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Policy Type</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="policy_type_action();" name="policy_type" id="policy_type" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                    echo "readonly";
                                                                                                                                                                                  } ?>>
                              <option value="<?php echo $content[0]['policy_type']; ?>" selected><?php echo $content[0]['policy_type']; ?></option>
                              <option value="fresh">Fresh</option>
                              <option value="Port">Port</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc" id="policy_type_action_2" style="display: <?php if ($content[0]['policy_type'] == 'fresh') {
                                                                                                  echo 'none';
                                                                                                } ?>">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Portability Duration</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="portability_duration" id="portability_duration" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                    echo "readonly";
                                                                                                                                                                  } ?>>
                              <option value="<?php echo $content[0]['portability_duration']; ?>"><?php echo $content[0]['portability_duration']; ?></option>
                              <option value="NA">NA</option>
                              <option value="1 Year">1 Year</option>
                              <option value="2 Year">2 Year</option>
                              <option value="3 Year">3 Year</option>
                              <option value="4 Year">4 Year</option>
                              <option value="5 Year">5 Year</option>
                              <option value="6 Year">6 Year</option>
                              <option value="7 Year">7 Year</option>
                              <option value="8 Year">8 Year</option>
                              <option value="9 Year">9 Year</option>
                              <option value="10 Year">10 Year</option>
                              <option value="11 Year">11 Year</option>
                              <option value="12 Year">12 Year</option>
                              <option value="13 Year">13 Year</option>
                              <option value="14 Year">14 Year</option>
                              <option value="15 Year">15 Year</option>
                              <option value="16 Year">16 Year</option>
                              <option value="17 Year">17 Year</option>
                              <option value="18 Year">18 Year</option>
                              <option value="19 Year">19 Year</option>
                              <option value="20 Year">20 Year</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc" id="policy_type_action_1" style="display: <?php if ($content[0]['policy_type'] == 'fresh') {
                                                                                                  echo 'none';
                                                                                                } ?>">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">PORT COMPANY</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="portability" id="portability" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>

                              <?php foreach ($company as $data) {
                              ?>

                                <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['portability'])) {
                                                                      if ($content[0]['portability'] == $data['id']) {
                                                                        echo "selected";
                                                                      }
                                                                    } ?>><?= $data['name'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                         <?php if ($model_short_name != 'renewals') { ?>
                        <div class="col-md-2 setcalc" id="policy_type_action_3" style="display: <?php if ($content[0]['policy_type'] == 'fresh') {
                                                                                                  echo 'none';
                                                                                                } ?>">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Portability End Date
                            </label>
                            <input type="date" name="port_end_date" id="port_end_date" class="form-control" value="<?= $content[0]['port_end_date']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                            echo "readonly";
                                                                                                                                                          } ?>>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                      <div class="row">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Policy No </label>
                            <input type="text" class="form-control" id="exampleInputno" name="policy_no" id="policy_no" aria-describedby="emailHelp" value="<?php echo $content[0]['policy_no']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                                      } ?>>
                            <div class="error" id="policy_exist"></div>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Company Name</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="company_name" id="company_name" onchange="fetchproduct(this.value)" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
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
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Product Name</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="product_name" id="product_name" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                    echo "readonly";
                                                                                                                                                  } ?>>
                              <option value="<?= isset($content[0]['product_name']) ? $content[0]['product_name'] : '' ?>" selected><?= isset($content[0]['product_name']) ? $content[0]['product_name'] : '' ?></option>
                              <!-- <option value="NCB Super Premium">NCB Super Premium</option>
                              <option value="Care plus">Care plus</option>
                              <option value="Max Saver">Max Saver</option>
                              <option value="Health Companion">Health Companion</option>
                              <option value="Health gain">Health gain</option>
                              <option value="Prime – Protect">Prime – Protect</option>
                              <option value="ProHealth - Plus">ProHealth - Plus</option> -->
                              <?php
                                                foreach ($products as $values) {
                                                ?>
                                                    <option value="<?php echo $values['product_name']; ?>"><?php echo $values['product_name']; ?></option>

                                                <?php
                                                }
                                                ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">BOOKED DATE</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_of_closure" id="date_of_closure" value="<?php echo $content[0]['date_of_closure']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                                              echo "readonly";
                                                                                                                                                                                                                            } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Sum Assured</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sum_assured_1" id="sum_assured_1" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                      echo "readonly";
                                                                                                                                                    } ?>>
                              <option value="<?php echo $content[0]['sum_assured_1']; ?>"><?php echo $content[0]['sum_assured_1']; ?></option>
                              <option value="2 lakhs">2 Lakhs</option>
                              <option value="3 lakhs">3 Lakhs</option>
                              <option value="3.5 Lakhs">3.5 Lakhs </option>
                              <option value="4 Lakhs">4 Lakhs</option>
                              <option value="4.5 Lakhs">4.5 Lakhs</option>
                              <option value="5 Lakhs">5 Lakhs</option>
                              <option value="5.5 Lakhs">5.5 Lakhs</option>
                              <option value="6 Lakhs">6 Lakhs</option>
                              <option value="6.5 Lakhs">6.5 Lakhs</option>
                              <option value="7 Lakhs">7 Lakhs</option>
                              <option value="7.5 Lakhs">7.5 Lakhsds</option>
                              <option value="10 Lakhs">10 Lakhs</option>
                              <option value="10.5 Lakhs">10.5 Lakhs</option>
                              <option value="20 Lakhs">20 Lakhs</option>
                              <option value="20.5 Lakhs">20.5 Lakhs</option>
                              <option value="30 Lakhs">30 Lakhs</option>
                              <option value="40 Lakhs">40 Lakhs</option>
                              <option value="50 Lakhs">50 Lakhs</option>
                              <option value="75 Lakhs">75 Lakhs</option>
                              <option value="80 Lakhs">80 Lakhs</option>
                              <option value="90 Lakhs">90 Lakhs</option>
                              <option value="1 Crore">1 Crore</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Cover Type</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="cover_type" id="cover_type" onchange="covertype();" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                        echo "readonly";
                                                                                                                                                                      } ?>>
                              <option value="<?php echo $content[0]['cover_type']; ?>"><?php echo $content[0]['cover_type']; ?></option>
                              <option value="Individual">Individual</option>
                              <option value="Floater">Floater</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Family Type
                            </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="coverage_type" id="coverage_type" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                      echo "readonly";
                                                                                                                                                    } ?>>
                            </select>
                          </div>
                        </div>
                        <!--</div>
                      <div class="row">-->
                         <?php if ($model_short_name != 'renewals') { ?>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Medical Required </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medical" id="medical" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                          echo "readonly";
                                                                                                                                        } ?>>
                              <option value="<?php echo $content[0]['medical']; ?>"><?php echo $content[0]['medical']; ?></option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                        </div>
                        
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Data Source </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="data_source" id="data_source" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php echo $content[0]['data_source']; ?>" selected><?php echo $content[0]['data_source']; ?></option>
                              <option value="Data 1">Data 1</option>
                              <option value="Data 3">Data 3</option>
                              <option value="NIVA">NIVA</option>
                              <option value="02">02</option>
                              <option value="Reference">Reference</option>
                              <option value="Port In">Port In</option>
                            </select>
                          </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Zone </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="zone" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                          echo "readonly";
                                                                                                                        } ?>>
                              <option value="<?php echo $content[0]['zone']; ?>" selected><?php echo $content[0]['zone']; ?></option>
                              <option value="Zone 1">Zone 1</option>
                              <option value="Zone 2">Zone 2</option>
                              <option value="Zone 3">Zone 3</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">AGENT</label>
                            <input type="agent" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="agent" id="agent" value="<?= $content[0]['agent'] ?>" placeholder="Enter Agent Name" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <?php if ($model_short_name == 'operations' || $role == 'Master') { ?>
                          <?php if (!empty($content[0]['policy_start_date'])) { ?>
                            <div class="col-md-2 setcalc">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Policy Start Date</label>
                                <input type="date" class="form-control" placeholder="Enter Policy Start Date" name="policy_start_date" id="policy_start_date" value="<?= $content[0]['policy_start_date'] ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                                echo "readonly";
                                                                                                                                                                                                              } ?>>
                              </div>
                            </div>
                          <?php } }?>
                        <?php if ($model_short_name == 'renewals' || $role == 'Master' || $model_short_name == 'services') { ?>
                          <?php if (!empty($content[0]['policy_end_date'])) { ?>
                            <div class="col-md-2 setcalc">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Policy End Date</label>
                                <input type="date" class="form-control" placeholder="Enter Policy End Date" name="policy_end_date" id="policy_end_date" value="<?= $content[0]['policy_end_date'] ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                                      } ?>>
                              </div>
                            </div>
                          <?php } }?>
                        <?php if ($model_short_name == 'operations' || $role == 'Master') { ?>
                          <?php if (!empty($content[0]['policy_issue_date'])) { ?>
                            <div class="col-md-2 setcalc">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Policy Issue Date</label>
                                <input type="date" class="form-control" placeholder="Enter Policy Issue Date" name="policy_issue_date" id="policy_issue_date" value="<?= $content[0]['policy_issue_date'] ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                                echo "readonly";
                                                                                                                                                                                                              } ?>>
                              </div>
                            </div>
                          <?php } ?>
                        <?php } ?>
                        <?php if ($model_short_name == 'operations' || $role == 'Master') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Policy Source</label>
                              <input type="text" class="form-control" placeholder="Enter Policy Source" name="policy_source" id="policy_source" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if ($model_short_name != 'operations' || $role == 'Master') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Renewal Premium </label>
                              <input type="text" name="renewal_primium" id="renewal_primium" class="form-control" value="<?php echo $content[0]['renewal_premium'] ;?>" <?php if ($role != 'Master') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>
                            </div>
                          </div>
                        <?php } ?>
                        
                        <?php if ($model_short_name != 'operations' || $role == 'Master') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Renewal Year </label>
                              <input type="number" name="renewal_year" id="renewal_year" class="form-control" value="<?php echo $content[0]['renewal_year'] ;?>" <?php if ($role != 'Master') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>
                            </div>
                          </div>
                        <?php } ?>

                        <?php if ($model_short_name == 'operations' || $role == 'Master') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Rider</label>
                              <input type="text" class="form-control" placeholder="Enter Rider" name="rider" id="rider" value="<?php if (!empty($content[0]['rider']) ?? '') ?>">
                            </div>
                          </div>
                        <?php } ?>

                      </div>
                    </div>
                    <hr>
                    <!-- THree-->
                    <div class="col-md-12 " id="scroll_up">
                      <h5 class="mb-3"><b>INSURED DETAILS</b></h5>
                      <div class="row" id="i1">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control name" name="insured_1_name" id="proposer_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[0]['member_name'])) {
                                                                                                                                                                                  echo $member_details[0]['member_name'];
                                                                                                                                                                                } ?>" <?php if (!empty($member_details[0]['member_name']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm gender" aria-label=".form-select-sm example" name="insured_1_gender" <?php if (!empty($member_details[0]['member_gender']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>>
                              <option value="<?php if (!empty($member_details[0]['member_gender'])) {
                                                echo $member_details[0]['member_gender'];
                                              } ?>" selected><?php if (!empty($member_details[0]['member_gender'])) {
                                                                echo $member_details[0]['member_gender'];
                                                              } ?></option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control dob" name="insured_1_dob" id="insured_1_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[0]['member_dob'])) {
                                                                                                                                                      echo $member_details[0]['member_dob'];
                                                                                                                                                    } ?>" <?php if (!empty($member_details[0]['member_dob']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                            echo "readonly";
                                                                                                                                                          } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm relation" aria-label=".form-select-sm example" name="insured_1_relation" <?php if (!empty($member_details[0]['member_relation']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[0]['member_relation'])) {
                                                echo $member_details[0]['member_relation'];
                                              } ?>" selected><?php if (!empty($member_details[0]['member_relation'])) {
                                                                echo $member_details[0]['member_relation'];
                                                              } ?></option>
                              <option value="Spouse">Spouse</option>
                              <option value="Son">Son</option>
                              <option value="Daughter">Daughter</option>
                              <option value="Mother">Mother</option>
                              <option value="Father">Father</option>
                              <option value="Mother In Law">Mother In Law</option>
                              <option value="Father In Law">Father In Law</option>
                              <option value="Brother">Brother</option>
                              <option value="Sister">Sister</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height)</label>
                            <select class="form-select form-select-sm insured_1_feet" aria-label=".form-select-sm example" name="insured_1_feet" <?php if (!empty($member_details[0]['member_height_feet']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[0]['member_height_feet'])) {
                                                echo $member_details[0]['member_height_feet'];
                                              } ?>" selected><?php if (!empty($member_details[0]['member_height_feet'])) {
                                                                echo $member_details[0]['member_height_feet'];
                                                              } ?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height)</label>
                            <select class="form-select form-select-sm insured_1_inch" aria-label=".form-select-sm example" name="insured_1_inch" <?php if (!empty($member_details[0]['member_height_inch']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[0]['member_height_inch'])) {
                                                echo $member_details[0]['member_height_inch'];
                                              } ?>" selected><?php if (!empty($member_details[0]['member_height_inch'])) {
                                                                echo $member_details[0]['member_height_inch'];
                                                              } ?></option>
                                 <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Weight</label>
                            <select class="form-select form-select-sm insured_1_weight" aria-label=".form-select-sm example" name="insured_1_weight" <?php if (!empty($member_details[0]['member_weight']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[0]['member_weight'])) {
                                                echo $member_details[0]['member_weight'];
                                              } ?>" selected><?php if (!empty($member_details[0]['member_weight'])) {
                                                                echo $member_details[0]['member_weight'];
                                                              } ?></option>
                           
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 1
                              <textarea class="form-control insured i1" placeholder="Insured PED 1" name="insured_1_ped" id="insured_1_ped" <?php if (!empty($member_details[0]['insured_pd_details']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>><?php if (!empty($member_details[0]['insured_pd_details'])) {
                                                                                                                                                    echo $member_details[0]['insured_pd_details'];
                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>

                       


                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">ANY CLAIM
                              <textarea class="form-control insured_1_claim" placeholder="Any Claim" name="insured_1_claim" id="insured_1_claim" <?php if (!empty($member_details[0]['any_claim']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>><?php if (!empty($member_details[0]['any_claim'])) {
                                                                                                                                                    echo $member_details[0]['any_claim'];
                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control under" placeholder="Underwriter PED" name="underwriter_1_ped" id="underwriter_1_ped" <?php if (!empty($member_details[0]['underwriter_ped']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                    echo "readonly";
                                                                                                                                                  } ?>><?php if (!empty($member_details[0]['underwriter_ped'])) {
                                                                                                                                                          echo $member_details[0]['underwriter_ped'];
                                                                                                                                                        } ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_1" name="member_table_id_1" value="<?php if (!empty($member_details[0]['id'])) {
                                                                                                      echo $member_details[0]['id'];
                                                                                                    } ?>">
                                                                                                    <hr>
                      </div>
                      <div class="row" id="i2">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control name" name="insured_2_name" id="insured_2_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[1]['member_name'])) {
                                                                                                                                                                                  echo $member_details[1]['member_name'];
                                                                                                                                                                                } ?>" <?php if (!empty($member_details[0]['member_name']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm gender" aria-label=".form-select-sm example" name="insured_2_gender" <?php if (!empty($member_details[1]['member_gender']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>>
                              <option value="<?php if (!empty($member_details[1]['member_gender'])) {
                                                echo $member_details[0]['member_gender'];
                                              } ?>" selected><?php if (!empty($member_details[1]['member_gender'])) {
                                                                echo $member_details[1]['member_gender'];
                                                              } ?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control dob" name="insured_2_dob" id="insured_2_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[1]['member_dob'])) {
                                                                                                                                                      echo $member_details[1]['member_dob'];
                                                                                                                                                    } ?>" <?php if (!empty($member_details[1]['member_dob']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                            echo "readonly";
                                                                                                                                                          } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm relation" aria-label=".form-select-sm example" name="insured_2_relation" <?php if (!empty($member_details[1]['member_relation']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[1]['member_relation'])) {
                                                echo $member_details[0]['member_relation'];
                                              } ?>" selected><?php if (!empty($member_details[1]['member_relation'])) {
                                                                echo $member_details[1]['member_relation'];
                                                              } ?></option>
                              <option value="Spouse">Spouse</option>
                              <option value="Son">Son</option>
                              <option value="Daughter">Daughter</option>
                              <option value="Mother">Mother</option>
                              <option value="Father">Father</option>
                              <option value="Mother In Law">Mother In Law</option>
                              <option value="Father In Law">Father In Law</option>
                              <option value="Brother">Brother</option>
                              <option value="Sister">Sister</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height)</label>
                            <select class="form-select form-select-sm insured_2_feet" aria-label=".form-select-sm example" name="insured_2_feet" <?php if (!empty($member_details[1]['member_height_feet']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[1]['member_height_feet'])) {
                                                echo $member_details[1]['member_height_feet'];
                                              } ?>" selected><?php if (!empty($member_details[1]['member_height_feet'])) {
                                                                echo $member_details[1]['member_height_feet'];
                                                              } ?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height)</label>
                            <select class="form-select form-select-sm insured_2_inch" aria-label=".form-select-sm example" name="insured_2_inch" <?php if (!empty($member_details[1]['member_relation']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[1]['member_height_inch'])) {
                                                echo $member_details[1]['member_height_inch'];
                                              } ?>" selected><?php if (!empty($member_details[1]['member_height_inch'])) {
                                                                echo $member_details[1]['member_height_inch'];
                                                              } ?></option>
                                 <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Weight</label>
                            <select class="form-select form-select-sm insured_2_weight" aria-label=".form-select-sm example" name="insured_2_weight" <?php if (!empty($member_details[1]['member_weight']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[1]['member_weight'])) {
                                                echo $member_details[1]['member_weight'];
                                              } ?>" selected><?php if (!empty($member_details[1]['member_weight'])) {
                                                                echo $member_details[1]['member_weight'];
                                                              } ?></option>
                            
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                            </select>
                          </div>
                        </div>


                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 2
                              <textarea class="form-control insured" placeholder="Insured PED 2" name="insured_2_ped" id="insured_2_ped" <?php if (!empty($member_details[1]['insured_pd_details']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                            echo "readonly";
                                                                                                                                          } ?>><?php if (!empty($member_details[1]['insured_pd_details'])) {
                                                                                                                                                  echo $member_details[1]['insured_pd_details'];
                                                                                                                                                } ?></textarea>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">ANY CLAIM
                              <textarea class="form-control insured_2_claim" placeholder="Any Claim" name="insured_2_claim" id="insured_2_claim" <?php if (!empty($member_details[1]['any_claim']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>><?php if (!empty($member_details[1]['any_claim'])) {
                                                                                                                                                    echo $member_details[1]['any_claim'];
                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control under" placeholder="Underwriter PED" name="underwriter_2_ped" id="underwriter_2_ped" <?php if (!empty($member_details[1]['underwriter_ped']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                    echo "readonly";
                                                                                                                                                  } ?>><?php if (!empty($member_details[1]['underwriter_ped'])) {
                                                                                                                                                          echo $member_details[1]['underwriter_ped'];
                                                                                                                                                        } ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_2" name="member_table_id_2" value="<?php if (!empty($member_details[1]['id'])) {
                                                                                                      echo $member_details[1]['id'];
                                                                                                    } ?>">
                    <hr>  
                    </div>
                      <div class="row" id="i3">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control name" name="insured_3_name" id="insured_3_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[2]['member_name'])) {
                                                                                                                                                                                  echo $member_details[2]['member_name'];
                                                                                                                                                                                } ?>" <?php if (!empty($member_details[2]['member_name']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm gender" aria-label=".form-select-sm example" name="insured_3_gender" <?php if (!empty($member_details[2]['member_gender']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>>
                              <option value="<?php if (!empty($member_details[2]['member_gender'])) {
                                                echo $member_details[2]['member_gender'];
                                              } ?>" selected><?php if (!empty($member_details[2]['member_gender'])) {
                                                                echo $member_details[2]['member_gender'];
                                                              } ?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control dob" name="insured_3_dob" id="insured_3_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[2]['member_dob'])) {
                                                                                                                                                      echo $member_details[2]['member_dob'];
                                                                                                                                                    } ?>" <?php if (!empty($member_details[2]['member_dob']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                            echo "readonly";
                                                                                                                                                          } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm relation" aria-label=".form-select-sm example" name="insured_3_relation" <?php if (!empty($member_details[2]['member_relation']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[2]['member_relation'])) {
                                                echo $member_details[2]['member_relation'];
                                              } ?>" selected><?php if (!empty($member_details[2]['member_relation'])) {
                                                                echo $member_details[2]['member_relation'];
                                                              } ?></option>
                              <option value="Spouse">Spouse</option>
                              <option value="Son">Son</option>
                              <option value="Daughter">Daughter</option>
                              <option value="Mother">Mother</option>
                              <option value="Father">Father</option>
                              <option value="Mother In Law">Mother In Law</option>
                              <option value="Father In Law">Father In Law</option>
                              <option value="Brother">Brother</option>
                              <option value="Sister">Sister</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height)</label>
                            <select class="form-select form-select-sm insured_3_feet" aria-label=".form-select-sm example" name="insured_3_feet" <?php if (!empty($member_details[2]['member_height_feet']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[2]['member_height_feet'])) {
                                                echo $member_details[2]['member_height_feet'];
                                              } ?>" selected><?php if (!empty($member_details[2]['member_height_feet'])) {
                                                                echo $member_details[2]['member_height_feet'];
                                                              } ?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height)</label>
                            <select class="form-select form-select-sm insured_3_inch" aria-label=".form-select-sm example" name="insured_3_inch" <?php if (!empty($member_details[2]['member_height_inch']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[2]['member_height_inch'])) {
                                                echo $member_details[2]['member_height_inch'];
                                              } ?>" selected><?php if (!empty($member_details[2]['member_height_inch'])) {
                                                                echo $member_details[2]['member_height_inch'];
                                                              } ?></option>
                                 <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Weight</label>
                            <select class="form-select form-select-sm insured_3_weight" aria-label=".form-select-sm example" name="insured_3_weight" <?php if (!empty($member_details[2]['member_weight']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[2]['member_weight'])) {
                                                echo $member_details[2]['member_weight'];
                                              } ?>" selected><?php if (!empty($member_details[2]['member_weight'])) {
                                                                echo $member_details[2]['member_weight'];
                                                              } ?></option>
                           
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 3
                              <textarea class="form-control insured" placeholder="Insured PED 3" name="insured_3_ped" id="insured_3_ped" <?php if (!empty($member_details[2]['insured_pd_details']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                            echo "readonly";
                                                                                                                                          } ?>><?php if (!empty($member_details[2]['insured_pd_details'])) {
                                                                                                                                                  echo $member_details[2]['insured_pd_details'];
                                                                                                                                                } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">ANY CLAIM
                              <textarea class="form-control insured_3_claim" placeholder="Any Claim" name="insured_3_claim" id="insured_3_claim" <?php if (!empty($member_details[2]['any_claim']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>><?php if (!empty($member_details[2]['any_claim'])) {
                                                                                                                                                    echo $member_details[2]['any_claim'];
                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control under" placeholder="Underwriter PED" name="underwriter_3_ped" id="underwriter_3_ped" <?php if (!empty($member_details[2]['underwriter_ped']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                    echo "readonly";
                                                                                                                                                  } ?>><?php if (!empty($member_details[2]['underwriter_ped'])) {
                                                                                                                                                          echo $member_details[2]['underwriter_ped'];
                                                                                                                                                        } ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_3" name="member_table_id_3" value="<?php if (!empty($member_details[2]['id'])) {
                                                                                                      echo $member_details[2]['id'];
                                                                                                    } ?>">
                    <hr> 
                    </div>
                      <div class="row" id="i4">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control name" name="insured_4_name" id="insured_4_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[3]['member_name'])) {
                                                                                                                                                                                  echo $member_details[3]['member_name'];
                                                                                                                                                                                } ?>" <?php if (!empty($member_details[3]['member_name']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm gender" aria-label=".form-select-sm example" name="insured_4_gender" <?php if (!empty($member_details[3]['member_gender']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>>
                              <option value="<?php if (!empty($member_details[3]['member_gender'])) {
                                                echo $member_details[3]['member_gender'];
                                              } ?>" selected><?php if (!empty($member_details[3]['member_gender'])) {
                                                                echo $member_details[3]['member_gender'];
                                                              } ?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control dob" name="insured_4_dob" id="insured_4_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[3]['member_dob'])) {
                                                                                                                                                      echo $member_details[3]['member_dob'];
                                                                                                                                                    } ?>" <?php if (!empty($member_details[3]['member_dob']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                            echo "readonly";
                                                                                                                                                          } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm relation" aria-label=".form-select-sm example" name="insured_4_relation" <?php if (!empty($member_details[3]['member_relation']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[3]['member_relation'])) {
                                                echo $member_details[3]['member_relation'];
                                              } ?>" selected><?php if (!empty($member_details[3]['member_relation'])) {
                                                                echo $member_details[3]['member_relation'];
                                                              } ?></option>
                              <option value="Spouse">Spouse</option>
                              <option value="Son">Son</option>
                              <option value="Daughter">Daughter</option>
                              <option value="Mother">Mother</option>
                              <option value="Father">Father</option>
                              <option value="Mother In Law">Mother In Law</option>
                              <option value="Father In Law">Father In Law</option>
                              <option value="Brother">Brother</option>
                              <option value="Sister">Sister</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height)</label>
                            <select class="form-select form-select-sm insured_4_feet" aria-label=".form-select-sm example" name="insured_4_feet" <?php if (!empty($member_details[3]['member_height_feet']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[3]['member_height_feet'])) {
                                                echo $member_details[3]['member_height_feet'];
                                              } ?>" selected><?php if (!empty($member_details[3]['member_height_feet'])) {
                                                                echo $member_details[3]['member_height_feet'];
                                                              } ?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height)</label>
                            <select class="form-select form-select-sm insured_4_inch" aria-label=".form-select-sm example" name="insured_4_inch" <?php if (!empty($member_details[3]['member_height_inch']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[3]['member_height_inch'])) {
                                                echo $member_details[3]['member_height_inch'];
                                              } ?>" selected><?php if (!empty($member_details[3]['member_height_inch'])) {
                                                                echo $member_details[3]['member_height_inch'];
                                                              } ?></option>
                                 <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Weight</label>
                            <select class="form-select form-select-sm insured_4_weight" aria-label=".form-select-sm example" name="insured_4_weight" <?php if (!empty($member_details[3]['member_weight']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[3]['member_weight'])) {
                                                echo $member_details[3]['member_weight'];
                                              } ?>" selected><?php if (!empty($member_details[3]['member_weight'])) {
                                                                echo $member_details[3]['member_weight'];
                                                              } ?></option>
                           
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 4
                              <textarea class="form-control insured" placeholder="Insured PED 4" name="insured_4_ped" id="insured_4_ped" <?php if (!empty($member_details[3]['insured_pd_details']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                            echo "readonly";
                                                                                                                                          } ?>><?php if (!empty($member_details[3]['insured_pd_details'])) {
                                                                                                                                                  echo $member_details[3]['insured_pd_details'];
                                                                                                                                                } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">ANY CLAIM
                              <textarea class="form-control insured_4_claim" placeholder="Any Claim" name="insured_4_claim" id="insured_4_claim" <?php if (!empty($member_details[3]['any_claim']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>><?php if (!empty($member_details[3]['any_claim'])) {
                                                                                                                                                    echo $member_details[3]['any_claim'];
                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control under" placeholder="Underwriter PED" name="underwriter_4_ped" id="underwriter_4_ped" <?php if (!empty($member_details[3]['underwriter_ped']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                    echo "readonly";
                                                                                                                                                  } ?>><?php if (!empty($member_details[3]['underwriter_ped'])) {
                                                                                                                                                          echo $member_details[3]['underwriter_ped'];
                                                                                                                                                        } ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_4" name="member_table_id_4" value="<?php if (!empty($member_details[3]['id'])) {
                                                                                                      echo $member_details[3]['id'];
                                                                                                    } ?>">
                    <hr> 
                    </div>
                      <div class="row" id="i5">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control name" name="insured_5_name" id="insured_5_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[4]['member_name'])) {
                                                                                                                                                                                  echo $member_details[4]['member_name'];
                                                                                                                                                                                } ?>" <?php if (!empty($member_details[4]['member_name']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm gender" aria-label=".form-select-sm example" name="insured_5_gender" <?php if (!empty($member_details[4]['member_gender']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>>
                              <option value="<?php if (!empty($member_details[4]['member_gender'])) {
                                                echo $member_details[4]['member_gender'];
                                              } ?>" selected><?php if (!empty($member_details[4]['member_gender'])) {
                                                                echo $member_details[4]['member_gender'];
                                                              } ?></option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control dob" name="insured_5_dob" id="insured_5_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[4]['member_dob'])) {
                                                                                                                                                      echo $member_details[4]['member_dob'];
                                                                                                                                                    } ?>" <?php if (!empty($member_details[4]['member_dob']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                            echo "readonly";
                                                                                                                                                          } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm relation" aria-label=".form-select-sm example" name="insured_5_relation" <?php if (!empty($member_details[4]['member_relation']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[4]['member_relation'])) {
                                                echo $member_details[4]['member_relation'];
                                              } ?>" selected><?php if (!empty($member_details[4]['member_relation'])) {
                                                                echo $member_details[4]['member_relation'];
                                                              } ?></option>
                              <option value="Spouse">Spouse</option>
                              <option value="Son">Son</option>
                              <option value="Daughter">Daughter</option>
                              <option value="Mother">Mother</option>
                              <option value="Father">Father</option>
                              <option value="Mother In Law">Mother In Law</option>
                              <option value="Father In Law">Father In Law</option>
                              <option value="Brother">Brother</option>
                              <option value="Sister">Sister</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height)</label>
                            <select class="form-select form-select-sm insured_5_feet" aria-label=".form-select-sm example" name="insured_5_feet" <?php if (!empty($member_details[4]['member_height_feet']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[4]['member_height_feet'])) {
                                                echo $member_details[4]['member_height_feet'];
                                              } ?>" selected><?php if (!empty($member_details[4]['member_height_feet'])) {
                                                                echo $member_details[4]['member_height_feet'];
                                                              } ?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height)</label>
                            <select class="form-select form-select-sm insured_5_inch" aria-label=".form-select-sm example" name="insured_5_inch" <?php if (!empty($member_details[4]['member_height_inch']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[4]['member_height_inch'])) {
                                                echo $member_details[4]['member_height_inch'];
                                              } ?>" selected><?php if (!empty($member_details[4]['member_height_inch'])) {
                                                                echo $member_details[4]['member_height_inch'];
                                                              } ?></option>
                                 <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Weight</label>
                            <select class="form-select form-select-sm insured_5_weight" aria-label=".form-select-sm example" name="insured_5_weight" <?php if (!empty($member_details[4]['member_weight']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[4]['member_weight'])) {
                                                echo $member_details[4]['member_weight'];
                                              } ?>" selected><?php if (!empty($member_details[4]['member_weight'])) {
                                                                echo $member_details[4]['member_weight'];
                                                              } ?></option>
                           
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 5
                              <textarea class="form-control insured" placeholder="Insured PED 5" name="insured_5_ped" id="insured_5_ped" <?php if (!empty($member_details[4]['insured_pd_details']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                            echo "readonly";
                                                                                                                                          } ?>><?php if (!empty($member_details[4]['insured_pd_details'])) {
                                                                                                                                                  echo $member_details[4]['insured_pd_details'];
                                                                                                                                                } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">ANY CLAIM
                              <textarea class="form-control insured_5_claim" placeholder="Any Claim" name="insured_5_claim" id="insured_5_claim" <?php if (!empty($member_details[4]['any_claim']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>><?php if (!empty($member_details[4]['any_claim'])) {
                                                                                                                                                    echo $member_details[4]['any_claim'];
                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control under" placeholder="Underwriter PED" name="underwriter_5_ped" id="underwriter_5_ped" <?php if (!empty($member_details[4]['underwriter_ped']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                    echo "readonly";
                                                                                                                                                  } ?>><?php if (!empty($member_details[4]['underwriter_ped'])) {
                                                                                                                                                          echo $member_details[4]['underwriter_ped'];
                                                                                                                                                        } ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_5" name="member_table_id_5" value="<?php if (!empty($member_details[4]['id'])) {
                                                                                                      echo $member_details[4]['id'];
                                                                                                    } ?>">
                      </div>
                      <div class="row" id="i6">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control name" name="insured_6_name" id="insured_6_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[5]['member_name'])) {
                                                                                                                                                                                  echo $member_details[5]['member_name'];
                                                                                                                                                                                } ?>" <?php if (!empty($member_details[5]['member_name']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm gender" aria-label=".form-select-sm example" name="insured_6_gender" <?php if (!empty($member_details[5]['member_gender']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>>
                              <option value="<?php if (!empty($member_details[5]['member_gender'])) {
                                                echo $member_details[5]['member_gender'];
                                              } ?>" selected><?php if (!empty($member_details[5]['member_gender'])) {
                                                                echo $member_details[5]['member_gender'];
                                                              } ?></option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control dob" name="insured_6_dob" id="insured_6_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[5]['member_dob'])) {
                                                                                                                                                      echo $member_details[5]['member_dob'];
                                                                                                                                                    } ?>" <?php if (!empty($member_details[5]['member_dob']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                            echo "readonly";
                                                                                                                                                          } ?>>
                        <hr>  
                        </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm relation" aria-label=".form-select-sm example" name="insured_6_relation" <?php if (!empty($member_details[5]['member_relation']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[5]['member_relation'])) {
                                                echo $member_details[5]['member_relation'];
                                              } ?>" selected><?php if (!empty($member_details[5]['member_relation'])) {
                                                                echo $member_details[5]['member_relation'];
                                                              } ?></option>
                              <option value="spouse">Spouse</option>
                              <option value="son">Son</option>
                              <option value="daughter">Daughter</option>
                              <option value="mother">Mother</option>
                              <option value="father">Father</option>
                              <option value="m_in_law">Mother In Law</option>
                              <option value="f_in_law">Father In Law</option>
                              <option value="brother">Brother</option>
                              <option value="sister">Sister</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height)</label>
                            <select class="form-select form-select-sm insured_6_feet" aria-label=".form-select-sm example" name="insured_6_feet" <?php if (!empty($member_details[5]['member_height_feet']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[5]['member_height_feet'])) {
                                                echo $member_details[5]['member_height_feet'];
                                              } ?>" selected><?php if (!empty($member_details[5]['member_height_feet'])) {
                                                                echo $member_details[5]['member_height_feet'];
                                                              } ?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height)</label>
                            <select class="form-select form-select-sm insured_6_inch" aria-label=".form-select-sm example" name="insured_6_inch" <?php if (!empty($member_details[5]['member_height_inch']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[5]['member_height_inch'])) {
                                                echo $member_details[5]['member_height_inch'];
                                              } ?>" selected><?php if (!empty($member_details[5]['member_height_inch'])) {
                                                                echo $member_details[5]['member_height_inch'];
                                                              } ?></option>
                                 <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Weight</label>
                            <select class="form-select form-select-sm insured_6_weight" aria-label=".form-select-sm example" name="insured_6_weight" <?php if (!empty($member_details[5]['member_weight']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[5]['member_weight'])) {
                                                echo $member_details[5]['member_weight'];
                                              } ?>" selected><?php if (!empty($member_details[5]['member_weight'])) {
                                                                echo $member_details[5]['member_weight'];
                                                              } ?></option>
                           
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 6
                              <textarea class="form-control insured" placeholder="Insured PED 6" name="insured_6_ped" id="insured_6_ped" <?php if (!empty($member_details[5]['insured_pd_details']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                            echo "readonly";
                                                                                                                                          } ?>><?php if (!empty($member_details[5]['insured_pd_details'])) {
                                                                                                                                                  echo $member_details[5]['insured_pd_details'];
                                                                                                                                                } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">ANY CLAIM
                              <textarea class="form-control insured_6_claim" placeholder="Any Claim" name="insured_6_claim" id="insured_6_claim" <?php if (!empty($member_details[5]['any_claim']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>><?php if (!empty($member_details[5]['any_claim'])) {
                                                                                                                                                    echo $member_details[5]['any_claim'];
                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control under" placeholder="Underwriter PED" name="underwriter_6_ped" id="underwriter_6_ped" <?php if (!empty($member_details[5]['underwriter_ped']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                    echo "readonly";
                                                                                                                                                  } ?>><?php if (!empty($member_details[5]['underwriter_ped'])) {
                                                                                                                                                          echo $member_details[5]['underwriter_ped'];
                                                                                                                                                        } ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_6" name="member_table_id_6" value="<?php if (!empty($member_details[5]['id'])) {
                                                                                                      echo $member_details[5]['id'];
                                                                                                    } ?>">
                    <hr>  
                    </div>
                      <div class="row" id="i7">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control name" name="insured_7_name" id="insured_7_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[6]['member_name'])) {
                                                                                                                                                                                  echo $member_details[6]['member_name'];
                                                                                                                                                                                } ?>" <?php if (!empty($member_details[6]['member_name']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm gender" aria-label=".form-select-sm example" name="insured_7_gender" <?php if (!empty($member_details[6]['member_gender']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>>
                              <option value="<?php if (!empty($member_details[6]['member_gender'])) {
                                                echo $member_details[6]['member_gender'];
                                              } ?>" selected><?php if (!empty($member_details[6]['member_gender'])) {
                                                                echo $member_details[6]['member_gender'];
                                                              } ?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control dob" name="insured_7_dob" id="insured_7_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[6]['member_dob'])) {
                                                                                                                                                      echo $member_details[6]['member_dob'];
                                                                                                                                                    } ?>" <?php if (!empty($member_details[6]['member_dob']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                            echo "readonly";
                                                                                                                                                          } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm relation" aria-label=".form-select-sm example" name="insured_7_relation" <?php if (!empty($member_details[6]['member_relation']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[6]['member_relation'])) {
                                                echo $member_details[6]['member_relation'];
                                              } ?>" selected><?php if (!empty($member_details[6]['member_relation'])) {
                                                                echo $member_details[6]['member_relation'];
                                                              } ?></option>
                              <option value="Spouse">Spouse</option>
                              <option value="Son">Son</option>
                              <option value="Daughter">Daughter</option>
                              <option value="Mother">Mother</option>
                              <option value="Father">Father</option>
                              <option value="Mother In Law">Mother In Law</option>
                              <option value="Father In Law">Father In Law</option>
                              <option value="Brother">Brother</option>
                              <option value="Sister">Sister</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height)</label>
                            <select class="form-select form-select-sm insured_7_feet" aria-label=".form-select-sm example" name="insured_7_feet" <?php if (!empty($member_details[6]['member_height_feet']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[6]['member_height_feet'])) {
                                                echo $member_details[6]['member_height_feet'];
                                              } ?>" selected><?php if (!empty($member_details[6]['member_height_feet'])) {
                                                                echo $member_details[6]['member_height_feet'];
                                                              } ?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height)</label>
                            <select class="form-select form-select-sm insured_7_inch" aria-label=".form-select-sm example" name="insured_7_inch" <?php if (!empty($member_details[6]['member_height_inch']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[6]['member_height_inch'])) {
                                                echo $member_details[6]['member_height_inch'];
                                              } ?>" selected><?php if (!empty($member_details[6]['member_height_inch'])) {
                                                                echo $member_details[6]['member_height_inch'];
                                                              } ?></option>
                                 <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Weight</label>
                            <select class="form-select form-select-sm insured_7_weight" aria-label=".form-select-sm example" name="insured_7_weight" <?php if (!empty($member_details[6]['member_weight']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[6]['member_weight'])) {
                                                echo $member_details[6]['member_weight'];
                                              } ?>" selected><?php if (!empty($member_details[6]['member_weight'])) {
                                                                echo $member_details[6]['member_weight'];
                                                              } ?></option>
                           
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 7
                              <textarea class="form-control insured" placeholder="Insured PED 7" name="insured_7_ped" id="insured_7_ped" <?php if (!empty($member_details[6]['insured_pd_details']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                            echo "readonly";
                                                                                                                                          } ?>><?php if (!empty($member_details[6]['insured_pd_details'])) {
                                                                                                                                                  echo $member_details[6]['insured_pd_details'];
                                                                                                                                                } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">ANY CLAIM
                              <textarea class="form-control insured_7_claim" placeholder="Any Claim" name="insured_7_claim" id="insured_7_claim" <?php if (!empty($member_details[6]['any_claim']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>><?php if (!empty($member_details[6]['any_claim'])) {
                                                                                                                                                    echo $member_details[6]['any_claim'];
                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control under" placeholder="Underwriter PED" name="underwriter_7_ped" id="underwriter_7_ped" <?php if (!empty($member_details[6]['underwriter_ped']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                    echo "readonly";
                                                                                                                                                  } ?>><?php if (!empty($member_details[6]['underwriter_ped'])) {
                                                                                                                                                          echo $member_details[6]['underwriter_ped'];
                                                                                                                                                        } ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_7" name="member_table_id_7" value="<?php if (!empty($member_details[6]['id'])) {
                                                                                                      echo $member_details[6]['id'];
                                                                                                    } ?>">
                    <hr> 
                    </div>
                      <div class="row" id="i8">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control name" name="insured_8_name" id="insured_8_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[7]['member_name'])) {
                                                                                                                                                                                  echo $member_details[7]['member_name'];
                                                                                                                                                                                } ?>" <?php if (!empty($member_details[7]['member_name']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm gender" aria-label=".form-select-sm example" name="insured_8_gender" <?php if (!empty($member_details[7]['member_gender']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>>
                              <option value="<?php if (!empty($member_details[7]['member_gender'])) {
                                                echo $member_details[7]['member_gender'];
                                              } ?>" selected><?php if (!empty($member_details[0]['member_gender'])) {
                                                                echo $member_details[0]['member_gender'];
                                                              } ?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control dob" name="insured_8_dob" id="insured_8_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[7]['member_dob'])) {
                                                                                                                                                      echo $member_details[7]['member_dob'];
                                                                                                                                                    } ?>" <?php if (!empty($member_details[7]['member_dob']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                            echo "readonly";
                                                                                                                                                          } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm relation" aria-label=".form-select-sm example" name="insured_8_relation" <?php if (!empty($member_details[7]['member_relation']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[7]['member_relation'])) {
                                                echo $member_details[7]['member_relation'];
                                              } ?>" selected><?php if (!empty($member_details[7]['member_relation'])) {
                                                                echo $member_details[7]['member_relation'];
                                                              } ?></option>
                              <option value="Spouse">Spouse</option>
                              <option value="Son">Son</option>
                              <option value="Daughter">Daughter</option>
                              <option value="Mother">Mother</option>
                              <option value="Father">Father</option>
                              <option value="Mother In Law">Mother In Law</option>
                              <option value="Father In Law">Father In Law</option>
                              <option value="Brother">Brother</option>
                              <option value="Sister">Sister</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Ft.(Height)</label>
                            <select class="form-select form-select-sm insured_8_feet" aria-label=".form-select-sm example" name="insured_8_feet" <?php if (!empty($member_details[7]['member_height_feet']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[7]['member_height_feet'])) {
                                                echo $member_details[7]['member_height_feet'];
                                              } ?>" selected><?php if (!empty($member_details[7]['member_height_feet'])) {
                                                                echo $member_details[7]['member_height_feet'];
                                                              } ?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Inch(Height)</label>
                            <select class="form-select form-select-sm insured_8_inch" aria-label=".form-select-sm example" name="insured_8_inch" <?php if (!empty($member_details[7]['member_height_inch']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[7]['member_height_inch'])) {
                                                echo $member_details[7]['member_height_inch'];
                                              } ?>" selected><?php if (!empty($member_details[7]['member_height_inch'])) {
                                                                echo $member_details[7]['member_height_inch'];
                                                              } ?></option>
                                 <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">Weight</label>
                            <select class="form-select form-select-sm insured_8_weight" aria-label=".form-select-sm example" name="insured_8_weight" <?php if (!empty($member_details[7]['member_weight']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                              <option value="<?php if (!empty($member_details[7]['member_weight'])) {
                                                echo $member_details[7]['member_weight'];
                                              } ?>" selected><?php if (!empty($member_details[7]['member_weight'])) {
                                                                echo $member_details[7]['member_weight'];
                                                              } ?></option>
                           
                                                          <?php for($i=1;$i<=125;$i++){ ?>
                                                        <option value="<?=$i?> KG"><?=$i?> KG</option>
                                                          <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 8
                              <textarea class="form-control insured" placeholder="Insured PED 8" name="insured_8_ped" id="insured_2_ped" <?php if (!empty($member_details[7]['insured_pd_details']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                            echo "readonly";
                                                                                                                                          } ?>><?php if (!empty($member_details[7]['insured_pd_details'])) {
                                                                                                                                                  echo $member_details[7]['insured_pd_details'];
                                                                                                                                                } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">ANY CLAIM
                              <textarea class="form-control insured_8_claim" placeholder="Any Claim" name="insured_8_claim" id="insured_8_claim" <?php if (!empty($member_details[7]['any_claim']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>><?php if (!empty($member_details[7]['any_claim'])) {
                                                                                                                                                    echo $member_details[7]['any_claim'];
                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control under" placeholder="Underwriter PED" name="underwriter_8_ped" id="underwriter_2_ped" <?php if (!empty($member_details[7]['underwriter_ped']) && $model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                    echo "readonly";
                                                                                                                                                  } ?>><?php if (!empty($member_details[7]['underwriter_ped'])) {
                                                                                                                                                          echo $member_details[7]['underwriter_ped'];
                                                                                                                                                        } ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_8" name="member_table_id_8" value="<?php if (!empty($member_details[7]['id'])) {
                                                                                                      echo $member_details[7]['id'];
                                                                                                    } ?>">
                      </div>
                    </div>
                    <hr>
                    <!-- Four-->
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-12">
                          <h5 class="mb-3"><b>PREMIUM DETAILS</b></h5>
                          <div class="row">
                            <div class="col-md-4 setcalc4">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Gross Premium</label>
                                <input type="number" class="form-control" id="exampleInputno"  placeholder="Enter Gross Premium"aria-describedby="emailHelp" name="gross_premium" value="<?php echo $content[0]['gross_premium']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                      echo "readonly";
                                                                                                                                                                                                    } ?>>
                              </div>
                            </div>
                            <div class="col-md-4 setcalc4">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Net Premium</label>
                                <input type="number" class="form-control" aria-describedby="emailHelp" name="net_premium" id="net_premium" placeholder="Enter Net Premium" value="<?php echo $content[0]['net_premium']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                echo "readonly";
                                                                                                                                                                                              } ?>>
                              </div>
                            </div>
                            <?php if ($model_short_name == 'operations' || $role == 'Master') { ?>
                              <div class="col-md-4 setcalc4">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Counted Premium</label>
                                  <input type="number" class="form-control" placeholder="Enter Counted Premium" name="counted_premium" id="counted_premium" value="<?php if (!empty($content[0]['counted_premium'])) {
                                                                                                                                                                      echo $content[0]['counted_premium'];
                                                                                                                                                                    } else {
                                                                                                                                                                      echo "";
                                                                                                                                                                    } ?>">
                                </div>
                              </div>
                            <?php } ?>
                            <!--</div>
                          <div class="row">-->
                            <div class="col-md-4 setcalc4">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Payment Tenure</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="payment_tenure" id="payment_tenure" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                            echo "readonly";
                                                                                                                                                          } ?>>
                                  <option value="<?php echo $content[0]['payment_tenure']; ?>" selected><?php echo $content[0]['payment_tenure']; ?></option>
                                  <option value="1 year"> 1 year</option>
                                  <option value="3 year ">3 year </option>
                                  <option value=" 5 year"> 5 year</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4 setcalc4">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Payment Mode </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="payment_mode" id="payment_mode" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                        echo "readonly";
                                                                                                                                                      } ?>>
                                  <option value="<?php echo $content[0]['payment_mode']; ?>" selected><?php echo $content[0]['payment_mode']; ?></option>
                                  <option value="upi">upi</option>
                                  <option value="bank">bank</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4 setcalc4">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Discount If Any </label>
                                <input type="text" class="form-control" id="exampleInputno" aria-describedby="emailHelp" placeholder="Enter Discount " name="discount" id="discount" value="<?php echo $content[0]['discount']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                                      } ?>>
                              </div>
                            </div>
                            <!--</div>
                            <div class="row">-->
                            <div class="col-md-4 setcalc4">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Manager</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="manager" id="manager" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                              echo "readonly";
                                                                                                                                            } ?>>
                                  <?php foreach ($manager as $data) {  ?>

                                    <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['manager'])) {
                                                                          if ($content[0]['manager'] == $data['id']) {
                                                                            echo "selected";
                                                                          }
                                                                        } ?>><?= $data['name'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4 setcalc4">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Team Leader</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tl" id="tl" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                    echo "readonly";
                                                                                                                                  } ?>>
                                  <?php foreach ($team_leader as $data) {
                                  ?>

                                    <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['tl'])) {
                                                                          if ($content[0]['tl'] == $data['id']) {
                                                                            echo "selected";
                                                                          }
                                                                        } ?>><?= $data['name'] ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="col-md-4"> -->
                        <!-- <div class="col-md-4"> -->
                        <?php if ($model_short_name == 'claims') { ?>
                          <div class="col-md-8 setcalc8">
                            <label for="exampleInputEmail1" class="form-label">REMIND YOUR CALL</label>
                            <select class="form-select form-select-sm mb-1">
                              <option>Select</option>
                              <?php if (!empty($scheduled_call)) {
                                foreach ($scheduled_call as $value) {
                                  $val = explode("-", $value['reminder_by_user_module']);  ?>
                                  <option value="<?= $value['id']; ?>"><?php echo $value['call_remark'] . " on (" . $user_id = $value['call_time']; ?></option>
                              <?php }
                              } ?>
                            </select>
                            <input type="datetime-local" class="form-control mb-1" name="reminder_date" id="reminder_date" aria-describedby="emailHelp">
                            <input type="text" class="form-control" name="reminder_title" id="reminder_title" placeholder="Add Your Call Reminder" aria-describedby="emailHelp">
                          </div>
                        <?php } ?>
                        <!-- </div> -->
                        <!-- </div> -->
                      </div>
                      <hr>
                      <!-- Five-->
                      <?php if ($role != 'Master') { ?>
                        <div class="col-md-12" id="scroll_down" <?php if ($model_short_name == 'sale_closure') {
                                                                  echo "style='display:none;'";
                                                                } ?>>
                          <h5 class="mb-3"><b><?php if ($model_short_name == 'underwriter_verifier') {
                                                echo "Underwriter";
                                              } else if ($model_short_name == 'operations') {
                                                echo "Operations";
                                              } else if ($model_short_name == 'services') {
                                                echo "Services";
                                              } else if ($model_short_name == 'renewals') {
                                                echo "Renewal";
                                              } else if ($model_short_name == 'sale_closure') {
                                                echo "Sale Closure";
                                              } ?> Section</b></h5>
                          <!-- <div class="row">
                          <div class="col-md-6"> -->
                          <div class="row">
                            <div class="col-md-6 setcalc">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Disposition <span class="setredcolor">*</span> </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="disposition_name" id="disposition_name" onchange="showsubdisposition(this.value); show_policy(this.value,'<?= $model_short_name ?>'); show_remark();">
                                  <option value="" selected>Select</option>
                                  <?php foreach ($disposition_name as $val) { ?>
                                    <option value="<?= $val['id'] ?>"><?= $val['disposition'] ?></option>
                                  <?php } ?>
                                </select>
                                <div id="showwarning" style="color:red;"></div>
                              </div>

                            </div>
                            <style>
                              #select_member_dlt {
                                display: none;
                              }

                              #dltbtn {
                                display: none;
                              }
                            </style>

                            <div class="col-md-6 setcalc" id="select_member_dlt">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Member <span class="setredcolor">*</span> </label>
                                <select class="form-select form-select-sm sel_m_dlt" aria-label=".form-select-sm example" name="sel_m_dlt" id="sel_m_dlt" onchange="showdlt(this.value)">
                                </select>
                                <div class="select_member_error" style="color:red;"> </div>
                                <div id="dltsms"></div>
                              </div>
                              


                            </div>

                            <div class="col-md-1 setcalc" id="dltbtn" style="width: 9%!important">
                              <div class="mb-3" style="margin-top: 28px;">
                                <a type="btn" onclick="dlt_member();" class="btn btn-sm btn-primary">Delete</a>
                              </div>
                            </div>



                            <div class="col-md-6 setcalc" id="alter_nate_no_2">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Alternate No. 2<span class="setredcolor">*</span></label>
                                <input type="number" class="form-control" name="alt_no_2" id="alt_no_2" placeholder="Alternate No. 2">
                               <div id="alt_no_error" style="color:red;"></div>
                              </div>

                            </div>


                            <?php if ($model_short_name == 'services') { ?>
                              <div class="col-md-6 setcalc" id="sub_desposition">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Select Sub Desposition <span class="setredcolor">*</span></label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sub_disposition_name" id="sub_disposition_name" onchange="show_member_added(this.value);">
                                    <option value="" selected>Select</option>
                                    <option value="member_added">Member Added</option>
                                    <option value="endorsement">Endorsement</option>
                                    <option value="health_checkup">Health Checkup</option>
                                    <option value="ped">PED</option>
                                    <option value="discount">Discount</option>
                                    <option value="none">None</option>
                                  </select>
                                 <div class="sub_disposition_name_error" style="color:red;"></div>
                                </div>
                              </div>
                              <style>
                                #sub_desposition_pending {
                                  display: none;
                                }

                                #sub_desposition_not_contacted {
                                  display: none;
                                }
                              </style>
                              <div class="col-md-6 setcalc" id="sub_desposition_pending">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Select Sub Desposition <span class="setredcolor">*</span> </label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sub_disposition_name" id="sub_disposition_pending" onchange="show_member_add(this.value);">
                                    <option value="" selected>Select</option>
                                    <option value="member_addition">Member Addition</option>
                                    <option value="endorsement">Endorsement</option>
                                    <option value="health_checkup">Health Checkup</option>
                                    <option value="ped_pending">PED</option>
                                    <option value="discount">Discount</option>
                                  </select>
                                  <div class="sub_disposition_pending_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc" id="sub_desposition_not_contacted">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Select Sub Desposition <span class="setredcolor">*</span></label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sub_disposition_not_conn" id="sub_disposition_not_conn">
                                    <option value="" selected>Select</option>
                                    <option value="ringing">Ringing</option>
                                    <option value="does_not_exist">Does Not Exist</option>
                                    <option value="wrong_no">Wrong Number</option>
                                  </select>
                                   <div class="sub_disp_not_conn_error" style="color:red;"></div>
                                </div>
                              </div>

                              <style>
                                #select_health_yes_no {
                                  display: none;
                                }

                                #select_discount_yes_no {
                                  display: none;
                                }

                                #select_endorsment_yes_no {
                                  display: none;
                                }
                              </style>

                              <div class="col-md-6 setcalc" id="select_discount_yes_no">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Status of Discount</label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sel_dis" id="sel_dis">
                                    <option value="" selected>Select</option>
                                    <option value="yes">Paid</option>
                                    <option value="no">Not Paid</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6 setcalc" id="member_add">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Select Field</label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sel_member" id="sel_member" onchange="show_field_add_member(this.value);">
                                    <option value="" selected>Select</option>
                                    <option value="name">Name</option>
                                    <option value="dob">DOB</option>
                                    <option value="gender">Gender</option>
                                    <option value="address">Address</option>
                                    <option value="others">Others</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-12" id="member_details">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Add Member Details </label>
                                  <textarea class="form-control" placeholder="Enter Member Details" name="member_add_details" id="member_add_details"></textarea>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc" id="sel_insured">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Select Insured PED</label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_pd" id="insured_pd" onchange="show_add_pd(this.value);">


                                  </select>
                                </div>
                              </div>
                              <div class="col-md-12" id="add_insured_pd">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Add Insured PED Details </label>
                                  <textarea class="form-control" placeholder="Enter Insured Details" name="add_insured_pd_details" id="add_insured_pd_details"></textarea>
                                </div>
                              </div>
                            <?php } ?>
                            <style>
                              #pending_ope_sub_disp {
                                display: none;
                              }

                              #cancell_ope_sub_disp {
                                display: none;
                              }
                            </style>

                            <?php if ($model_short_name == 'operations') { ?>
                              <div class="col-md-6 setcalc" id="pending_ope_sub_disp">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Pending Sub Desposition <span class="setredcolor">*</span></label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="pending_op_sub_disp" id="pending_op_sub_disp">
                                    <option value="" selected>Select</option>
                                    <option value="Policy Documents">Policy Documents</option>
                                    <option value="Medical Report">Medical Report</option>
                                    <option value="MER">MER</option>
                                    <option value="Yet To Login">Yet To Login</option>

                                  </select>
                                   <div class="pending_sub_error" style="color:red;"></div>
                                </div>
                              </div>

                              <div class="col-md-6 setcalc" id="cancell_ope_sub_disp">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Cancel Sub Desposition<span class="setredcolor">*</span> </label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="cancell_op_sub_disp" id="cancell_op_sub_disp">
                                    <option value="" selected>Select</option>
                                    <option value="Freelook">Freelook</option>
                                    <option value="Pre Disclosure">Pre Disclosure</option>
                                    <option value="Customer Request">Customer Request</option>
                                  </select>
                                   <div class="cancell_op_sub_disp_error" style="color:red;"></div>
                                </div>
                              </div>
                            <?php } ?>
                            <?php if ($model_short_name == 'renewals') { ?>
                              <div class="col-md-6 setcalc" id="send_sms">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Select SMS Type <span class="setredcolor">*</span></label>
                                  <input type="hidden" name="sms_type_label" id="sms_type_label" value="SMS Type">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="send_sms_type" id="send_sms_type">
                                    <option value="" selected>Select</option>
                                    <option value="Policy Renewal SMS">Policy Renewal SMS</option>
                                    <option value="Policy Expired SMS">Policy Expired SMS</option>
                                  </select>
                                </div>
                                <div class="send_sms_type_error" style="color:red;"></div>
                              </div>
                              <div class="col-md-1 setcalc" id="sendbtn" style="width: 9%!important">
                                <div class="mb-3" style="margin-top: 28px;">
                                  <a type="btn" class="btn btn-sm btn-primary">Send SMS </a>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc" id="not_renewed_sub_disposition">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Select Sub Disposition<span class="setredcolor">*</span></label>
                                  <input type="hidden" name="sub_disposition_label_not_renewd" id="sub_disposition_label_not_renewd" value="Sub Disposition">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="show_company_name(this.value)" name="not_renewed_sub" id="not_renewed_sub">
                                    <option value="" selected>Select</option>
                                    <option value="Fund Issue">Fund Issue</option>
                                    <option value="Service Issue">Service Issue</option>
                                    <option value="Corporate Plan">Corporate Plan</option>
                                    <option value="Customer Died">Customer Died</option>
                                    <option value="Claim Rejected">Claim Rejected</option>
                                    <option value="Code Change">Code Change</option>
                                    <option value="Port Out">Port Out</option>
                                    <option value="High Premium">High Premium</option>
                                  </select>
                                   <div class="sub_disposition_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc port_in_field">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Company<span class="setredcolor">*</span></label>
                                  <input type="hidden" name="company_label" id="company_label" value="Company">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="company_name_2" id="company_name_2">
                                    <option value="" selected>Select</option>
                                    <?php foreach ($company as $data) { ?>
                                      <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['company_name'])) {
                                                                            if ($content[0]['id'] == $data['id']) {
                                                                              echo "selected";
                                                                            }
                                                                          } ?>><?= $data['name'] ?></option>
                                    <?php } ?>
                                  </select>
                                  <div class="company_name_2_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">New Policy <span class="setredcolor">*</span></label>
                                  <input type="hidden" name="new_policy_label" id="new_policy_label" value="New Policy">
                                  <input type="text" class="form-control" placeholder="Enter New Policy" name="new_policy_number" id="new_policy_number">
                                  <div class="new_policy_number_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Proposer Date Of Birth<span class="setredcolor">*</span></label>
                                  <input type="hidden" name="proposer_dob_label" id="proposer_dob_label" value="Proposer DOB">
                                  <input type="date" class="form-control" placeholder="Enter Proposer Date Of Birth" name="proposer_dob" id="proposer_dob">
                                  <div class="proposer_dob_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Sum Assured<span class="setredcolor">*</span>
                                  </label>
                                  <input type="hidden" name="sum_assured_label" id="sum_assured_label" value="Sum Assured">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="new_sum_assured_1" id="new_sum_assured_1">
                                    <option value="0" selected>Select</option>
                                    <option value="200000">200000</option>
                                    <option value="300000">300000</option>
                                    <option value="350000">350000</option>
                                    <option value="400000">400000</option>
                                    <option value="450000">450000</option>
                                    <option value="500000">500000</option>
                                    <option value="550000">550000</option>
                                    <option value="600000">600000</option>
                                    <option value="650000">650000</option>
                                    <option value="700000">700000</option>
                                    <option value="750000">750000</option>
                                    <option value="1000000">1000000</option>
                                    <option value="1050000">1050000</option>
                                    <option value="2000000">2000000</option>
                                    <option value="2050000">2050000</option>
                                    <option value="3000000">3000000</option>
                                    <option value="4000000">4000000</option>
                                    <option value="5000000">5000000</option>
                                    <option value="7500000">7500000</option>
                                    <option value="8000000">8000000</option>
                                    <option value="9000000">9000000</option>
                                    <option value="10000000">10000000</option>
                                  </select>
                                  <div class="new_sum_assured_1error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Gross Premium<span class="setredcolor">*</span></label>
                                  <input type="text" class="form-control" onkeyup="calnet_new();" onkeydown="calnet_new();" name="new_gross_premium" id="new_gross_premium" aria-describedby="emailHelp">
                                <div class="new_gross_premium_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Net Premium<span class="setredcolor">*</span></label>
                                  <input type="hidden" name="net_premium_label" id="net_premium_label" value="Net Premium">
                                  <input type="text" class="form-control" name="new_net_premium" id="new_net_premium" onkeyup="new_calgross();" onkeydown="new_calgross();" aria-describedby="emailHelp">
                                 <div class="new_net_premium_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Upselling<span class="setredcolor">*</span></label>
                                  <input type="hidden" name="upselling_label" id="upselling_label" value="Upselling">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="upselling" id="upselling">
                                    <option value="" selected>Select</option>
                                    <option value="Sum Insured Enhancement">Sum Insured Enhancement</option>
                                    <option value="Sum Insured and Member Add">Sum Insured and Member Add</option>
                                    <option value="Member Addition">Member Addition</option>
                                    <option value="Term Increased">Term Increased</option>
                                    <option value="Sum Insured Decreased">Sum Insured Decreased</option>
                                    <option value="Member Deletion">Member Deletion</option>
                                    <option value="Zone Change">Zone Change</option>
                                    <option value="Member Delete Sum Assurd Increase">Member Delete Sum Assurd Increase</option>
                                    <option value="Plan Change">Plan Change</option>
                                    <option value="Sum Assured Decreased Member Addition">Sum Assured Decreased Member Addition</option>
                                    <option value="With Accidental Rider">With Accidental Rider</option>
                                    <option value="Advance Rider">Advance Rider</option>
                                    <option value="none">none</option>
                                  </select>
                                  <div class="upselling_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Alternate Number<span class="setredcolor">*</span></label>
                                  <input type="hidden" name="alt_number_label" id="alt_number_label" value="Alternate Number">
                                  <input type="text" class="form-control" name="alternate_number" id="alternate_number" aria-describedby="emailHelp" placeholder="Enter Alternate Number">
                                 <div class="alternate_number_error" style="color:red;"></div>
                                </div>

                              </div>
                            <?php } ?>
                            <?php if ($model_short_name == 'operations') { ?>
                              <div class="col-md-6 setcalc policy_details_date">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Policy Start Date<span class="setredcolor">*</span></label>
                                  <input type="date" class="form-control" placeholder="Enter Policy Start Date" name="policy_start_date" id="policy_start_date">
                               <div class="policy_start_date_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6  setcalc policy_details_date">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Policy End Date<span class="setredcolor">*</span></label>
                                  <input type="date" class="form-control" placeholder="Enter Policy End Date" name="policy_end_date" id="policy_end_date">
                                 <div class="policy_end_date_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_details_date">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Policy Issue Date<span class="setredcolor">*</span></label>
                                  <input type="date" class="form-control" placeholder="Enter Policy Issue Date" name="policy_issue_date" id="policy_issue_date">
                                <div class="policy_issue_date_error" style="color:red;"></div>
                                </div>
                              </div>
                            <?php } ?>



                            <div class="col-md-6 setcalc reason_block">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Reason <span class="setredcolor">*</span></label>
                                <textarea class="form-control" placeholder="Reason for Pending" name="reason" id="reason"></textarea>
                              </div>
                            </div>
                            <div class="row" id="schedule_call" <?php if ($model_short_name == 'services') {
                                                                  echo "";
                                                                } ?> style="display:none;">
                              <div class="col-md-12">
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">SCHEDULE CALL<span class="setredcolor">*</span></label>
                                  <div class="row">
                                    <div class="col-md-6 setcalc">
                                      	<input type="datetime-local" class="form-control" name="reminder_date" id="reminder_date">
                                    	<div class="reminder_date_error" style="color:red;"></div>
                                    </div>
                                    <div class="col-md-6 setcalc">
                                      <input type="text" class="form-control" name="reminder_remark" id="reminder_remark" placeholder="remarks" aria-describedby="emailHelp">
                                    <div class="reminder_remark_error" style="color:red;"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- </div> -->
                            <?php if ($model_short_name == 'renewals') {  ?>
                              <!-- <div class="col-md-12"  -->
                              <?php if ($model_short_name == 'renewals') {
                                echo '';
                              } else {
                                echo " id='open_docs_part'";
                              } ?>

                              <!-- <div class="md-3">
                                <div class="row"> -->
                              <div class="col-md-6 setcalc" id="company_name_drop">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Select Comapny</label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="new_company_name" id="new_company_name">
                                    <option value="" selected>Select</option>
                                    <?php foreach ($company as $data) { ?>
                                      <option value="<?= $data['id']; ?>" <?php if (!empty($content[0]['company_name'])) {
                                                                            if ($content[0]['id'] == $data['id']) {
                                                                              echo "selected";
                                                                            }
                                                                          } ?>><?= $data['name'] ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc port_in_field">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Gross Premium<span class="setredcolor">*</span></label>
                                  <input type="hidden" name="gross_premium_label" id="gross_premium_label" value="Gross Premium">
                                  <input type="text" class="form-control" name="new_gross_premium_2" id="new_gross_premium_2" aria-describedby="emailHelp" placeholder="Enter Gross Premium Amount">
                                <div class="new_gross_premium_1_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc port_in_field">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Date Of Port<span class="setredcolor">*</span></label>
                                  <input type="hidden" name="date_of_port_label" id="date_of_port_label" value="Date Of Port">
                                  <input type="date" class="form-control" name="date_of_port_2" id="date_of_port_2" aria-describedby="emailHelp" placeholder="Enter Date Of Port Date">
                                <div class="date_of_port_2_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Select Payment Mode<span class="setredcolor">*</span></label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="new_payment_mode" id="new_payment_mode">
                                    <option value="" selected>Select</option>
                                    <option value="Cheque Pickup">Cheque Pickup</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Website"> Website</option>
                                    <option value="Quick Payment"> Quick Payment</option>
                                    <option value="Account Transfer">Account Transfer</option>
                                    <option value="Manual Entry">Manual Entry</option>
                                    <option value="Cheque NEFT">Cheque NEFT</option>
                                    <option value="Offline Link">Offline Link</option>
                                  </select>
                                   <div class="new_payment_mode_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Select Payment Tenure<span class="setredcolor">*</span></label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="new_payment_tenure" id="new_payment_tenure">
                                    <option value="" selected>Payment Tenure</option>
                                    <option value="1 Year"> 1</option>
                                    <option value="2 Year">2</option>
                                    <option value="3 Year">3</option>
                                  </select>
                                  <div class="new_payment_tenure_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Family Type<span class="setredcolor">*</span>
                                  </label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="new_coverage_type" id="new_coverage_type">
                                    <option value="" selected> Family Type</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                  </select>
                                  <div class="new_coverage_type_error" style="color:red;"></div>
                                </div>
                              </div>

                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">EMI<span class="setredcolor">*</span></label>
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="emi" id="emi">
                                    <option value="" selected> EMI</option>
                                    <option value="3">3</option>
                                    <option value="6">6</option>
                                    <option value="9">9</option>
                                    <option value="12">12</option>
                                  </select>
                                  <div class="emi_error" style="color:red;"></div>
                                </div>
                              </div>
                              <div class="col-md-6 setcalc policy_renewed_done">
                                <div class="mb-3">
                                  <label for="exampleInputno" class="form-label">Discount<span class="setredcolor">*</span></label>
                                  <input type="text" class="form-control" name="discount_new" id="discount_new" aria-describedby="emailHelp" placeholder="Enter Discount If Any">
                                <div class="discount_new_error" style="color:red;"></div>
                                </div>
                              </div>

                              <!-- </div>
                              </div> -->
                              <!-- </div> -->
                            <?php } ?>
                            <div class="col-md-6 setcalc remark_block">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Remarks <span class="setredcolor">*</span></label>
                                <textarea class="form-control" placeholder="Enter Your Remarks" name="remarks" id="remarks"></textarea>
                                <div id="showremark" style="color:red;"></div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12" id="open_docs_part" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                      echo "style='display:none;'";
                                                                    } ?>>
                            <input type="hidden" name="module_short_name" id="module_short_name" value="<?= $model_short_name ?>">
                            <div class="md-3">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="exampleInputno" class="form-label">Upload Documents </label><br>
                                </div>
                                <!-- <div class="col-md-6" style="text-align: left;">
                                  <a onclick="add()" style="cursor: pointer;color:blue;"><b>Add more +</b></a>
                                  <a onclick="remove()" style="cursor: pointer;color:red;"><b>Remove -</b></a>
                                </div>-->
                              </div>
                              <div class="row">
                                <!--<div class="col-md-12 mb-3" style='display:flex'>
                                  <input type="text" class="form-control" name="doc_label[]" id="doc_label" placeholder="Enter Title of document">&nbsp;&nbsp;&nbsp;&nbsp;
                                  <label for="doc_image" class="uploaddata" style="background-color: #54b2e5; padding: 4px 14px; border-radius: 8px;margin-bottom:0px;">Upload</label>
                                  <input type="file" class="form-control" aria-describedby="emailHelp" name="doc_image[]" id="doc_image" style="border:none;">
                                </div>-->
                                <div class="col-md-6">
                                 <!-- <div class="row mb-3">
                                    <div class="col-md-12">-->
                                      <table class="table table-bordered table-prescription">
                                        <thead>
                                          <tr>
                                            <th>Document Title</th>
                                            <th>File</th>
                                            <th>Delete</th>
                                          </tr>
                                        </thead>

                                        <tbody>
                                          <tr class="prescription-row" id="presc_0">
<td>
                                          <select class="form-control" id="choices-single-groups" id="doc_label" name="doc_label[]" data-choices data-choices-groups data-placeholder="Select City" name="choices-single-groups">
                                            <option value="" selected disabled>Select</option>
                                            <optgroup label="Operation">
                                              <option value="Policy Copy">Policy Copy</option>
                                              <option value="Adhaar Card">Adhaar Card</option>
                                              <option value="Pan Card">Pan Card</option>
                                              <option value="Birth Certificate">Birth Certificate</option>
                                              <option value="Previous Policy">Previous Policy</option>
                                              <option value="Proposal Form">Proposal Form</option>
                                              <option value="Other">Other</option>
                                            </optgroup>
                                            <optgroup label="Service">
                                              <option value="Endorsement Letter">Endorsement Letter</option>
                                              <option value="PED Addition Letter">PED Addition Letter</option>
                                              <option value="Member Addition Letter">Member Addition Letter</option>
                                              <option value="Member Deletion Letter">Member Deletion Letter</option>
                                              <option value="Policy Cancelled">Policy Cancelled</option>
                                              <option value="Other">Other</option>
                                            </optgroup>
                                            
                                          </select>

                                        </td>
                                           <!-- <td>
                                              <select class="form-control form-select" id="doc_label" name="doc_label[]">
                                               <option value="" selected>Select</option>
                                                <option value="Aadhaar Card">Aadhaar Card</option>
                                                <option value="Pan Card">Pan Card</option>
                                                <option value="Birth Certificate">Birth Certificate</option>
                                                <option value="Proposal Form">Proposal Form</option>
                                                <option value="Previous Policies">Previous Policies</option>
                                                <option value="Other">Other</option>
                                              </select>
                                            </td>-->
                                            <td>
                                              <input type="file" class='form-control search' placeholder="Choose file" name="doc_image[]" id="doc_image">
                                            </td>
                                            <td><a class="delete-row btn-sm btn-danger" style="cursor: pointer;">Delete</a></td>
                                          </tr>
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <td><a class="add-new btn-sm btn-success" style="cursor: pointer;">Add More</a></td>
                                          </tr>
                                        </tfoot>
                                      </table>
                                    <!--</div>
                                  </div>-->
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-10 mb-3">
                                  <div id="new_chq"></div>
                                </div>
                              </div>
                              <input type="hidden" value="1" id="total_chq">
                            </div>
                          </div>


                        </div>
                    </div>
                    <div class="row">
                      <?php $sess = $this->session->userdata('pmsadmin');
                        $name = $sess['name'];
                        $role = $sess['role'];
                        $sess_id = $sess['id'];
                        if ($role != 'Master' && $model_short_name != 'claims') {
                      ?>
                        <div class="col-md-7">
                        </div>
                      <?php } ?>
                    </div>
                  <?php } ?>
                  </div>
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne"<?php if ($model_short_name == 'sale_closure' ) {
                                                                      echo "style='display:none;'";
                                                                    } ?>>
                        <button class="btn btn-primary accordion-button collapsed btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background:#405189;width: 8%;border-radius: 5px;padding: 9px 9px;">
                          <p style="color:white;margin-bottom: 0px;">Logs</p>
                        </button>



                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                          <!--<div class="card-body">-->
                          <div class="list-group col nested-list nested-sortable">
                            <div class="list-group-item nested-1"><button type="button" class="btn btn-primary accordion-button collapsed btn-sm" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Underwriter Remark</button>
                              <div class="list-group nested-list nested-sortable">
                                <!--<div class="list-group-item nested-2">-->
                                <div class="card-body" style="background-color: #0000000f;" id="collapseOne" class="accordion-collapse collapse hide" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                  <div class="row" style="margin-bottom: -15px;">
                                    <?php $i = 1;
                                    if (!empty($getlogdata)) {
                                      foreach ($getlogdata as $val) { ?>
                                        <div class="col-md-12 mb-1" style="display:flex;">

                                          <div class="col-md-1">
                                            <p class="setpara mb-1">S.No</p>
                                            <h5 class="seth5"><b>
                                                <?= $i; ?> </b></h5>
                                          </div>
                                          <div class="col-md-2">
                                            <p class="setpara mb-1">Policy No.</p>
                                            <h5 class="seth5"><b>
                                                <?php if (!empty($val['policy_no'])) {
                                                  echo $val['policy_no'];
                                                } else {
                                                  echo "NA";
                                                } ?></b></h5>
                                          </div>
                                          <div class="col-md-2">
                                            <p class="setpara mb-1">Documents Name</p>
                                            <?php if (!empty($val['sale_docs'])) { ?>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['docs_name'])) {
                                                    echo $val['docs_name'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            <?php } else { ?>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['docs_name'])) {
                                                    echo $val['docs_name'];
                                                  } else {
                                                    echo "Docs Not Uploaded";
                                                  } ?></b></h5>
                                            <?php } ?>
                                          </div>
                                          <div class="col-md-2">
                                            <p class="setpara mb-1">Documents</p>
                                            <?php if (!empty($val['sale_docs'])) { ?>
                                              <h5 class="seth5"><a href="<?= base_url(); ?>assets/upload/documents/<?php echo $val['sale_docs']; ?>" target="_blank"><b>
                                                    <?php if (!empty($val['sale_docs'])) {
                                                      echo $val['sale_docs'];
                                                    } else {
                                                      echo "NA";
                                                    } ?></b></a></h5>
                                            <?php } else { ?>
                                              <h5 class="seth5"><a><b>
                                                    <?php if (!empty($val['sale_docs'])) {
                                                      echo $val['sale_docs'];
                                                    } else {
                                                      echo "Docs Not Uploaded";
                                                    } ?></b></a></h5>
                                            <?php } ?>
                                          </div>
                                          <div class="col-md-2">
                                            <p class="setpara mb-1">Disposition</p>
                                            <h5 class="seth5"><b>
                                                <?php if (!empty($val['disposition'])) {

                                                  $disp_id = $val['disposition'];
                                                  $this->db->select('*');
                                                  $this->db->from('disposition');
                                                  $this->db->where('id', $disp_id);
                                                  $rows1 = $this->db->get()->row();
                                                  echo $rows1->disposition;
                                                } else {
                                                  echo "NA";
                                                } ?></b></h5>
                                          </div>

                                          <div class="col-md-2">
                                            <p class="setpara mb-1">Remark</p>
                                            <h5 class="seth5"><b>
                                                <?php if (!empty($val['remark'])) {
                                                  echo $val['remark'];
                                                } else {
                                                  echo "NA";
                                                } ?></b></h5>
                                          </div>

                                          <div class="col-md-1">
                                            <p class="setpara mb-1">Added Date</p>
                                            <h5 class="seth5"><b>
                                                <?php if (!empty($val['created_at'])) {
                                                  echo $val['created_at'];
                                                } else {
                                                  echo "NA";
                                                } ?></b></h5>
                                          </div>

                                        </div>
                                    <?php $i++;
                                      }
                                    } ?>
                                  </div>
                                </div>
                                <!--</div>-->

                              </div>
                            </div>
                            <?php if ($model_short_name == 'operations') { ?>
                              <div class="list-group-item nested-1"><button class="btn btn-primary accordion-button collapsed btn-sm" class=" accordion-button btn-sm" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Operation Remark</button>
                                <div class="list-group nested-list nested-sortable">
                                  <!--<div class="list-group-item nested-2">-->
                                  <div class="card-body" style="background-color: #0000000f;" id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="row" style="margin-bottom: -15px;">
                                      <?php $i = 1;
                                      if (!empty($getlogdata_operation)) {
                                        foreach ($getlogdata_operation as $val) { ?>
                                          <div class="col-md-12 mb-1" style="display:flex;">

                                            <div class="col-md-1">
                                              <p class="setpara mb-1">S.No</p>
                                              <h5 class="seth5"><b>
                                                  <?= $i; ?> </b></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Policy No.</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['policy_no'])) {
                                                    echo $val['policy_no'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Documents Name</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['docs_name'])) {
                                                    echo $val['docs_name'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Documents</p>
                                              <h5 class="seth5"><a href="<?= base_url(); ?>assets/upload/documents/<?php echo $val['sale_docs']; ?>" target="_blank"><b>
                                                    <?php if (!empty($val['sale_docs'])) {
                                                      echo $val['sale_docs'];
                                                    } else {
                                                      echo "NA";
                                                    } ?></b></a></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Disposition</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['disposition'])) {

                                                    $disp_id = $val['disposition'];
                                                    $this->db->select('*');
                                                    $this->db->from('disposition');
                                                    $this->db->where('id', $disp_id);
                                                    $rows1 = $this->db->get()->row();
                                                    echo $rows1->disposition;
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>

                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Remark</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['remark'])) {
                                                    echo $val['remark'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>

                                            <div class="col-md-1">
                                              <p class="setpara mb-1">Added Date</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['created_at'])) {
                                                    echo $val['created_at'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>

                                          </div>
                                      <?php $i++;
                                        }
                                      } ?>
                                    </div>
                                  </div>
                                  <!--</div>-->

                                </div>
                              </div>
                            <?php } ?>

                            <?php if ($model_short_name == 'services'|| $model_short_name == 'renewals') { ?>
                              <div class="list-group-item nested-1"><button class="btn btn-primary accordion-button collapsed btn-sm" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Services Remark</button>
                                <div class="list-group nested-list nested-sortable">
                                  <!--<div class="list-group-item nested-2">-->
                                  <div class="card-body" style="background-color: #0000000f;" id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="row" style="margin-bottom: -15px;">
                                      <?php $i = 1;
                                      if (!empty($getlogdata_services)) {
                                        foreach ($getlogdata_services as $val) { ?>
                                          <div class="col-md-12 mb-1" style="display:flex;">

                                            <div class="col-md-1">
                                              <p class="setpara mb-1">S.No</p>
                                              <h5 class="seth5"><b>
                                                  <?= $i; ?> </b></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Policy No.</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['policy_no'])) {
                                                    echo $val['policy_no'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Documents Name</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['docs_name'])) {
                                                    echo $val['docs_name'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Documents</p>
                                              <h5 class="seth5"><a href="<?= base_url(); ?>assets/upload/documents/<?php echo $val['sale_docs']; ?>" target="_blank"><b>
                                                    <?php if (!empty($val['sale_docs'])) {
                                                      echo $val['sale_docs'];
                                                    } else {
                                                      echo "NA";
                                                    } ?></b></a></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Disposition</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['disposition'])) {

                                                    $disp_id = $val['disposition'];
                                                    $this->db->select('*');
                                                    $this->db->from('disposition');
                                                    $this->db->where('id', $disp_id);
                                                    $rows1 = $this->db->get()->row();
                                                    echo $rows1->disposition;
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>

                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Remark</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['remark'])) {
                                                    echo $val['remark'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>

                                            <div class="col-md-1">
                                              <p class="setpara mb-1">Added Date</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['created_at'])) {
                                                    echo $val['created_at'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>

                                          </div>
                                      <?php $i++;
                                        }
                                      } ?>
                                    </div>
                                  </div>
                                  <!--</div>-->

                                </div>
                              </div>
                            <?php } ?>
                            
                             <?php if ($model_short_name == 'renewals') { ?>
                              <div class="list-group-item nested-1"><button class="btn btn-primary accordion-button collapsed btn-sm" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Renewal Remark</button>
                                <div class="list-group nested-list nested-sortable">
                                  <!--<div class="list-group-item nested-2">-->
                                  <div class="card-body" style="background-color: #0000000f;" id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="row" style="margin-bottom: -15px;">
                                      <?php $i = 1;
                                      if (!empty($getlogdata_renewals)) {
                                        foreach ($getlogdata_renewals as $val) { ?>
                                          <div class="col-md-12 mb-1" style="display:flex;">

                                            <div class="col-md-1">
                                              <p class="setpara mb-1">S.No</p>
                                              <h5 class="seth5"><b>
                                                  <?= $i; ?> </b></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Policy No.</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['policy_no'])) {
                                                    echo $val['policy_no'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Documents Name</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['docs_name'])) {
                                                    echo $val['docs_name'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Documents</p>
                                              <h5 class="seth5"><a href="<?= base_url(); ?>assets/upload/documents/<?php echo $val['sale_docs']; ?>" target="_blank"><b>
                                                    <?php if (!empty($val['sale_docs'])) {
                                                      echo $val['sale_docs'];
                                                    } else {
                                                      echo "NA";
                                                    } ?></b></a></h5>
                                            </div>
                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Disposition</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['disposition'])) {

                                                    $disp_id = $val['disposition'];
                                                    $this->db->select('*');
                                                    $this->db->from('disposition');
                                                    $this->db->where('id', $disp_id);
                                                    $rows1 = $this->db->get()->row();
                                                    echo $rows1->disposition;
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>

                                            <div class="col-md-2">
                                              <p class="setpara mb-1">Remark</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['remark'])) {
                                                    echo $val['remark'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>

                                            <div class="col-md-1">
                                              <p class="setpara mb-1">Added Date</p>
                                              <h5 class="seth5"><b>
                                                  <?php if (!empty($val['created_at'])) {
                                                    echo $val['created_at'];
                                                  } else {
                                                    echo "NA";
                                                  } ?></b></h5>
                                            </div>

                                          </div>
                                      <?php $i++;
                                        }
                                      } ?>
                                    </div>
                                  </div>
                                  <!--</div>-->

                                </div>
                              </div>
                            <?php } ?>
                            
                          </div>
                        </div>
                        <!--</div>-->
                        <!--<table class="table table-bordered table-nowrap">
                              <thead>
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Remarks</th>
                                  <th scope="col">Documents Name</th>
                                  <th scope="col">Documents</th>
                                  <th scope="col">Policy No</th>
                                  <th scope="col">Member Type</th>
                                  <th scope="col">Member Details</th>
                                  <th scope="col">Added Date</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if (!empty($member_details)) {
                                  $i = 1;
                                  foreach ($member_details as $val) { ?>
                                    <tr>
                                      <th scope="row"><?= $i; ?></th>
                                      <th>NA</th>
                                      <th>NA</th>
                                      <th><a href="<?= base_url(); ?>assets/images/jsps.pdf" target="_blank">JSPS.pdf</a></th>
                                      <td><?= $val['policy_no'] ?></td>
                                      <td><?= $val['member_type'] ?></td>
                                      <td><?= $val['member_details'] ?></td>
                                      <td><?= $val['created_at'] ?></td>
                                    </tr>
                                <?php }
                                  $i++;
                                } ?>
                              </tbody>
                            </table>-->
                      </div>
                    </div>
                  </div><br>
              </div>
              <input type="hidden" class="form-control" id="exampleInputno" name="policy_no" id="policy_no" aria-describedby="emailHelp" value="<?php echo $content[0]['policy_no']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                            echo "readonly";
                                                                                                                                                                                          } ?>>
              <input type="hidden" name="id" id="form_id" value="<?php echo $this->uri->segment(4); ?>">
              <?php if ($model_short_name != 'claims') { ?>
                          <div class="submit_form">
                <button type="submit" class="btn btn-primary update " style="width: 100px;">Update</button>
                <div id="pre_loader" class="pre_loader_text"></div>
              <?php } else { ?>
                <button onclick="initiate_claim(<?php echo $this->uri->segment(4); ?>)" class="btn btn-primary">Intiate Claim</button>
              <?php } ?>
               </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div><!-- end card-body -->
  </div><!-- end card -->
</div><!-- end col -->
</div><!-- end row -->
</div>
<!-- container-fluid -->
</div>
<?php $this->load->view('admin/footer.php'); ?>
</div>
<!-- JAVASCRIPT -->
<script src="<?= base_url() ?>assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="<?= base_url() ?>assets/js/app.js"></script>
<script type="text/javascript">
  // update modal
  $(document).on('submit', '#edit_sale_closure', function(ev) {
    $('.error').html('');
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;

    var disposition = $('#disposition_name').val();
    var remark = $('#remarks').val();
   var alt_no_2 = $('#alt_no_2').val();
    var policy_start_date = $('#policy_start_date').val();
    var policy_end_date = $('#policy_end_date').val();
    var policy_issue_date = $('#policy_issue_date').val();
    var pending_op_sub_disp = $('#pending_op_sub_disp').val();
    var cancell_op_sub_disp = $('#cancell_op_sub_disp').val();

    var sub_disposition_name = $('#sub_disposition_name').val();
    var sub_disposition_pending = $('#sub_disposition_pending').val();
    var sub_disposition_not_conn = $('#sub_disposition_not_conn').val();
    var sel_m_dlt = $('#sel_m_dlt').val();

    var send_sms_type = $('#send_sms_type').val();
    var reminder_date = $('#reminder_date').val();

    var not_renewed_sub = $('#not_renewed_sub').val();
    var company_name_2 = $('#company_name_2').val();

    var new_gross_premium_2 = $('#new_gross_premium_2').val();
    var date_of_port_2 = $('#date_of_port_2').val();
    var new_policy_number = $('#new_policy_number').val();
    var proposer_dob = $('#proposer_dob').val();
    var new_sum_assured_1 = $('#new_sum_assured_1').val();
    var new_gross_premium = $('#new_gross_premium').val();
    var new_net_premium = $('#new_net_premium').val();
    var upselling = $('#upselling').val();
    var alternate_num = $('#alternate_number').val();

    var new_payment_mode = $('#new_payment_mode').val();
    var new_payment_tenure = $('#new_payment_tenure').val();
    var new_coverage_type = $('#new_coverage_type').val();
    var emi = $('#emi').val();
    var discount_new = $('#discount_new').val();
    var reminder_remark = $('#reminder_remark').val();

    var module_short_name = $("#module_short_name").val();
     if(module_short_name == 'operations')
     {
      url = 'operation/opearations';
     }else if (module_short_name == 'underwriter_verifier'){
      url = 'underwriter/underwriter_verifier';
     }else if (module_short_name == 'services'){
      url = 'services/services';
     }else if (module_short_name == 'renewals'){
      url = 'renewals/renewals';
     }
	if(module_short_name != 'sale_closure')
    {
      if(disposition ==''){
        $("#showwarning").html('Select Disposition');
        error = true;
      }
      if(remark ==''){
        $("#showremark").html('Enter Remark');
        error = true;
      }
      
       if (module_short_name == 'operations') {
      //enforced//
      if (disposition == 28) {
        if (policy_start_date == '') {
          $(".policy_start_date_error").html('Enter Required Field');
          error = true;
        }
        if (policy_end_date == '') {
          $(".policy_end_date_error").html('Enter Required Field');
          error = true;
        }
        if (policy_issue_date == '') {
          $(".policy_issue_date_error").html('Enter Required Field');
          error = true;
        }
      }

      //pending//
      if (disposition == 30) {
        if (pending_op_sub_disp == '') {
          $(".pending_sub_error").html('Select Required Field');
          error = true;
        }
      }
      //cancelled//
      if (disposition == 31) {
        if (cancell_op_sub_disp == '') {
          $(".cancell_op_sub_disp_error").html('Select Required Field');
          error = true;
        }
      }
    }

    if (module_short_name == 'services') {
      if (disposition == 32) {
        //done//
        if (sub_disposition_name == '') {
          $(".sub_disposition_name_error").html('Select Required Field');
          error = true;
        }
      }
      //pending
      if (disposition == 33) {
        if (sub_disposition_pending == '') {
          $(".sub_disposition_pending_error").html('Select Required Field');
          error = true;
        }
      }
      //follow up
      if (disposition == 34) {
        if (reminder_date.length == '0') {
          $(".reminder_date_error").html('Enter Required Field');
          error = true;
        }
      }

      //not contacted
      if (disposition == 35) {
        if (sub_disposition_not_conn == '') {
          $(".sub_disp_not_conn_error").html('Select Required Field');
          error = true;
        }
      }
      //member deletion
      if (disposition == 51) {
        if (sel_m_dlt == '0') {
          $(".select_member_error").html('Select Required Field');
          error = true;
        }
      }


    }

    if (module_short_name == 'renewals') {
      //send sms
      if (disposition == 40) {
        if (send_sms_type == '') {
          $(".send_sms_type_error").html('Select Required Field');
          error = true;
        }
      }

      //not renewed
      if (disposition == 41) {
        if (not_renewed_sub == '') {
          $(".sub_disposition_error").html('Select Required Field');
          error = true;
        }
      }

      //follow up
      if (disposition == 38) {
        if (reminder_remark == '') {
          $(".reminder_remark_error").html('Select Required Field');
          error = true;
        }
      }

      //port in 
      if (disposition == 42) {
        if (company_name_2 == '') {
          $(".company_name_2_error").html('Select Required Field');
          error = true;
        }

        if (new_gross_premium_2 == '') {
          $(".new_gross_premium_1_error").html('Enter Required Field');
          error = true;
        }

        if (date_of_port_2 == '') {
          $(".date_of_port_2_error").html('Select Required Field');
          error = true;
        }
      }

      //policy renewed
      if (disposition == 43) {
        if (new_policy_number == '') {
          $(".new_policy_number_error").html('Enter Required Field');
          error = true;
        }
        if (proposer_dob == '') {
          $(".proposer_dob_error").html('Enter Required Field');
          error = true;
        }
        if (new_sum_assured_1 == '0') {
          $(".new_sum_assured_1error").html('Select Required Field');
          error = true;
        }
        if (new_gross_premium == '') {
          $(".new_gross_premium_error").html('Enter Required Field');
          error = true;
        }
        if (new_net_premium == '') {
          $(".new_net_premium_error").html('Enter Required Field');
          error = true;
        }
        if (upselling == '') {
          $(".upselling_error").html('Select Required Field');
          error = true;
        }
        if (alternate_num == '') {
          $(".alternate_number_error").html('Enter Required Field');
          error = true;
        }
        if (new_payment_mode == '') {
          $(".new_payment_mode_error").html('Select Required Field');
          error = true;
        }
        if (new_payment_tenure == '') {
          $(".new_payment_tenure_error").html('Select Required Field');
          error = true;
        }
        if (new_coverage_type == '') {
          $(".new_coverage_type_error").html('Select Required Field');
          error = true;
        }
        if (emi == '') {
          $(".emi_error").html('Select Required Field');
          error = true;
        }
        if (discount_new == '') {
          $(".discount_new_error").html('Select Required Field');
          error = true;
        }


      }
    }
    }

      if (error == false) {

      

      $.ajax({
        url: "<?= base_url() ?>form/updatesubadmi",
        type: 'post',
        data: formData,
        beforeSend: function() {
                        $(".submit_form").html('<lord-icon src="https://cdn.lordicon.com/xjovhxra.json" trigger="loop" colors="primary:#109121" style="width:40px;height:40px;"></lord-icon>');

                   },
        success: function(result) {
          //json data
          // alert(module_short_name);
          var dataResult = JSON.parse(result);
          if (dataResult.inserted == '1') {
            swal('Record Updated 🙂', ' ', 'success');
            //window.history.back();
            window.location.href = '<?= base_url() ?>'+ url;
          }
          if (dataResult.policy_no == '0') {
            $('#policy_exist').html('Policy Already Exist');
            $('.error').css('color', 'red');
          }
          // if (dataResult.inserted == '1') {
          //     $('#success').html("Category Added Succefully!");
          //     $('#success').css('color', 'green');
          // }
        },
        cache: false,
        contentType: false,
        processData: false,
      })
  }
  })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  function add() {
    var new_chq_no = parseInt($('#total_chq').val()) + 1;
    var new_input = "<div class='row'  id='new_" + new_chq_no + "'><div class='col-md-6 mb-3' style='padding-right:5px;'><input type='text' class='form-control' name='doc_label[]' placeholder='Enter Title of document'></div> <div class='col-md-3'><label for='doc_image' style='background-color: #54b2e5;padding: 4px 14px;border-radius: 8px;margin-bottom:0px;'>Upload</label></div><div class='col-md-3'><input type='file' class='form-control mb-3' aria-describedby='emailHelp' name='doc_image[]' style='border:none;'></div></div>";
    $('#new_chq').append(new_input);
    $('#total_chq').val(new_chq_no)
  }

  function remove() {
    var last_chq_no = $('#total_chq').val();
    if (last_chq_no > 1) {
      $('#new_' + last_chq_no).remove();
      $('#total_chq').val(last_chq_no - 1);
    }
  }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script>
  $('.search').typeahead({
    source: function(query, result) {
      $.ajax({
        url: "<?= base_url() ?>getcity",
        method: "POST",
        data: {
          query: query
        },
        dataType: "json",
        success: function(data) {
          result($.map(data, function(item) {
            return item;
          }));
        },
      })
    },
  });

  function initiate_claim(id) {}

  function policy_type_action() {
    if ($('#policy_type').val() == 'fresh') {
      $('#policy_type_action_1').css("display", "none");
      $('#policy_type_action_2').css("display", "none");
      $('#policy_type_action_3').css("display", "none");
    } else {
      $('#policy_type_action_1').css("display", "block");
      $('#policy_type_action_2').css("display", "block");
      $('#policy_type_action_3').css("display", "block");
    }
  }
  covertype();

  function covertype() {
    var val = $("#cover_type").val();
    if (val == "Individual") {
      $("#coverage_type").html("<option value='1'>1</option>");
      changecoveragetype();
    } else {
      $("#coverage_type").html("<option selected>Select Family Type</option><option value='2' <?php if ($content[0]['coverage_type'] == '2') {
                                                                                                echo 'Selected';
                                                                                              } ?>>2</option><option value='3' <?php if ($content[0]['coverage_type'] == '3') {
                                                                                                                                  echo 'Selected';
                                                                                                                                } ?>>3</option><option value='4' <?php if ($content[0]['coverage_type'] == '4') {
                                                                                                                                                                                                                                        echo 'Selected';
                                                                                                                                                                                                                                      } ?>>4</option><option value='5' <?php if ($content[0]['coverage_type'] == '5') {
                                                                                                                                                                                                                                                                                                                                            echo 'Selected';
                                                                                                                                                                                                                                                                                                                                          } ?>>5</option><option value='6' <?php if ($content[0]['coverage_type'] == '6') {
                                                                                                                                                                                                                                                                                                                                                                                                                                                echo 'Selected';
                                                                                                                                                                                                                                                                                                                                                                                                                                              } ?>>6</option><option value='7' <?php if ($content[0]['coverage_type'] == '7') {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo 'Selected';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  } ?>>7</option><option value='8' <?php if ($content[0]['coverage_type'] == '8') {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          echo 'Selected';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?>>8</option>");
      changecoveragetype();
    }
  }

  function changecoveragetype() {
    // $('#insured_1_ped').attr('readonly', true);
    // $('#insured_2_ped').attr('readonly', true);
    // $('#insured_3_ped').attr('readonly', true);
    // $('#insured_4_ped').attr('readonly', true);
    // $('#insured_5_ped').attr('readonly', true);
    // $('#insured_6_ped').attr('readonly', true);
    // $('#insured_7_ped').attr('readonly', true);
    // $('#insured_8_ped').attr('readonly', true);
    // $('.name').attr('readonly', true);
    // $('.dob').attr('readonly', true);
    // $('.gender').attr('readonly', true);
    // $('#coverage_type').attr('readonly', true);
    //   $('#cover_type').attr('readonly', true);
    var val = $("#coverage_type").val();
    $("#i1").css('display', 'none');
    $("#i2").css('display', 'none');
    $("#i3").css('display', 'none');
    $("#i4").css('display', 'none');
    $("#i5").css('display', 'none');
    $("#i6").css('display', 'none');
    $("#i7").css('display', 'none');
    $("#i8").css('display', 'none');
    if (val == "1") {
      $('#idmain').css("display", "block");
      $('#i1').css("display", "flex");
      $('#i2').css("display", "none");
      $('#i3').css("display", "none");
      $('#i4').css("display", "none");
      $('#i5').css("display", "none");
      $('#i6').css("display", "none");
      $('#i7').css("display", "none");
      $('#i8').css("display", "none");
      $('.hr').css("display", "block");
    } else if (val == "2") {
      $('#idmain').css("display", "block");
      $('#i1').css("display", "flex");
      $('#i2').css("display", "flex");
      $('#i3').css("display", "none");
      $('#i4').css("display", "none");
      $('#i5').css("display", "none");
      $('#i6').css("display", "none");
      $('#i7').css("display", "none");
      $('#i8').css("display", "none");
      $('.hr').css("display", "block");
    } else if (val == "3") {
      $('#idmain').css("display", "block");
      $('#i1').css("display", "flex");
      $('#i2').css("display", "flex");
      $('#i3').css("display", "flex");
      $('#i4').css("display", "none");
      $('#i5').css("display", "none");
      $('#i6').css("display", "none");
      $('#i7').css("display", "none");
      $('#i8').css("display", "none");
      $('.hr').css("display", "block");
    } else if (val == "4") {
      $('#idmain').css("display", "block");
      $('#i1').css("display", "flex");
      $('#i2').css("display", "flex");
      $('#i3').css("display", "flex");
      $('#i4').css("display", "flex");
      $('#i5').css("display", "none");
      $('#i6').css("display", "none");
      $('#i7').css("display", "none");
      $('#i8').css("display", "none");
      $('.hr').css("display", "block");
    } else if (val == "4" || val == "4") {
      $('#idmain').css("display", "block");
      $('#i1').css("display", "flex");
      $('#i2').css("display", "flex");
      $('#i3').css("display", "flex");
      $('#i4').css("display", "flex");
      $('#i5').css("display", "none");
      $('#i6').css("display", "none");
      $('#i7').css("display", "none");
      $('#i8').css("display", "none");
      $('.hr').css("display", "block");
    } else if (val == "5") {
      $('#idmain').css("display", "block");
      $('#i1').css("display", "flex");
      $('#i2').css("display", "flex");
      $('#i3').css("display", "flex");
      $('#i4').css("display", "flex");
      $('#i5').css("display", "flex");
      $('#i6').css("display", "none");
      $('#i7').css("display", "none");
      $('#i8').css("display", "none");
      $('.hr').css("display", "block");
    } else if (val == "6") {
      $('#idmain').css("display", "block");
      $('#i1').css("display", "flex");
      $('#i2').css("display", "flex");
      $('#i3').css("display", "flex");
      $('#i4').css("display", "flex");
      $('#i5').css("display", "flex");
      $('#i6').css("display", "flex");
      $('#i7').css("display", "none");
      $('#i8').css("display", "none");
      $('.hr').css("display", "block");
    } else if (val == "7") {
      $('#idmain').css("display", "block");
      $('#i1').css("display", "flex");
      $('#i2').css("display", "flex");
      $('#i3').css("display", "flex");
      $('#i4').css("display", "flex");
      $('#i5').css("display", "flex");
      $('#i6').css("display", "flex");
      $('#i7').css("display", "flex");
      $('#i8').css("display", "none");
      $('.hr').css("display", "block");
    } else if (val == "8") {
      $('#idmain').css("display", "block");
      $('#i1').css("display", "flex");
      $('#i2').css("display", "flex");
      $('#i3').css("display", "flex");
      $('#i4').css("display", "flex");
      $('#i5').css("display", "flex");
      $('#i6').css("display", "flex");
      $('#i7').css("display", "flex");
      $('#i8').css("display", "flex");
      $('.hr').css("display", "block");
    }
  }
  $(document).ready(function() {
    $("#coverage_type").change(function() {
      //   $('#insured_1_ped').attr('readonly', true);
      // $('#insured_2_ped').attr('readonly', true);
      // $('#insured_3_ped').attr('readonly', true);
      // $('#insured_4_ped').attr('readonly', true);
      // $('#insured_5_ped').attr('readonly', true);
      // $('#insured_6_ped').attr('readonly', true);
      // $('#insured_7_ped').attr('readonly', true);
      // $('#insured_8_ped').attr('readonly', true);
      // $('.name').attr('readonly', true);
      // $('.dob').attr('readonly', true);
      // $('.gender').attr('readonly', true);
      // $('#coverage_type').attr('readonly', true);
      //   $('#cover_type').attr('readonly', true);
      var val = $(this).val();
      $("#i1").css('display', 'none');
      $("#i2").css('display', 'none');
      $("#i3").css('display', 'none');
      $("#i4").css('display', 'none');
      $("#i5").css('display', 'none');
      $("#i6").css('display', 'none');
      $("#i7").css('display', 'none');
      $("#i8").css('display', 'none');
      if (val == "1") {
        $('#idmain').css("display", "block");
        $('#i1').css("display", "flex");
        $('#i2').css("display", "none");
        $('#i3').css("display", "none");
        $('#i4').css("display", "none");
        $('#i5').css("display", "none");
        $('#i6').css("display", "none");
        $('#i7').css("display", "none");
        $('#i8').css("display", "none");
        $('.hr').css("display", "block");
      } else if (val == "2") {
        $('#idmain').css("display", "block");
        $('#i1').css("display", "flex");
        $('#i2').css("display", "flex");
        $('#i3').css("display", "none");
        $('#i4').css("display", "none");
        $('#i5').css("display", "none");
        $('#i6').css("display", "none");
        $('#i7').css("display", "none");
        $('#i8').css("display", "none");
        $('.hr').css("display", "block");
      } else if (val == "3") {
        $('#idmain').css("display", "block");
        $('#i1').css("display", "flex");
        $('#i2').css("display", "flex");
        $('#i3').css("display", "flex");
        $('#i4').css("display", "none");
        $('#i5').css("display", "none");
        $('#i6').css("display", "none");
        $('#i7').css("display", "none");
        $('#i8').css("display", "none");
        $('.hr').css("display", "block");
      } else if (val == "4") {
        $('#idmain').css("display", "block");
        $('#i1').css("display", "flex");
        $('#i2').css("display", "flex");
        $('#i3').css("display", "flex");
        $('#i4').css("display", "flex");
        $('#i5').css("display", "none");
        $('#i6').css("display", "none");
        $('#i7').css("display", "none");
        $('#i8').css("display", "none");
        $('.hr').css("display", "block");
      } else if (val == "4" || val == "4") {
        $('#idmain').css("display", "block");
        $('#i1').css("display", "flex");
        $('#i2').css("display", "flex");
        $('#i3').css("display", "flex");
        $('#i4').css("display", "flex");
        $('#i5').css("display", "none");
        $('#i6').css("display", "none");
        $('#i7').css("display", "none");
        $('#i8').css("display", "none");
        $('.hr').css("display", "block");
      } else if (val == "5") {
        $('#idmain').css("display", "block");
        $('#i1').css("display", "flex");
        $('#i2').css("display", "flex");
        $('#i3').css("display", "flex");
        $('#i4').css("display", "flex");
        $('#i5').css("display", "flex");
        $('#i6').css("display", "none");
        $('#i7').css("display", "none");
        $('#i8').css("display", "none");
        $('.hr').css("display", "block");
      } else if (val == "6") {
        $('#idmain').css("display", "block");
        $('#i1').css("display", "flex");
        $('#i2').css("display", "flex");
        $('#i3').css("display", "flex");
        $('#i4').css("display", "flex");
        $('#i5').css("display", "flex");
        $('#i6').css("display", "flex");
        $('#i7').css("display", "none");
        $('#i8').css("display", "none");
        $('.hr').css("display", "block");
      } else if (val == "7") {
        $('#idmain').css("display", "block");
        $('#i1').css("display", "flex");
        $('#i2').css("display", "flex");
        $('#i3').css("display", "flex");
        $('#i4').css("display", "flex");
        $('#i5').css("display", "flex");
        $('#i6').css("display", "flex");
        $('#i7').css("display", "flex");
        $('#i8').css("display", "none");
        $('.hr').css("display", "block");
      } else if (val == "8") {
        $('#idmain').css("display", "block");
        $('#i1').css("display", "flex");
        $('#i2').css("display", "flex");
        $('#i3').css("display", "flex");
        $('#i4').css("display", "flex");
        $('#i5').css("display", "flex");
        $('#i6').css("display", "flex");
        $('#i7').css("display", "flex");
        $('#i8').css("display", "flex");
        $('.hr').css("display", "block");
      }
    });
  });
</script>
<script>
  $('html, body').animate({
    scrollTop: $("#scroll_down").offset().top - 60
  }, 700);
</script>
<script>
  function showDiv() {
    document.getElementById('welcomeDiv').style.display = "block";
  }
</script>
<script>
  function showsubdisposition(val) {

    // $('#insured_1_ped').attr('readonly', true);
    // $('#insured_2_ped').attr('readonly', true);
    // $('#insured_3_ped').attr('readonly', true);
    // $('#insured_4_ped').attr('readonly', true);
    // $('#insured_5_ped').attr('readonly', true);
    // $('#insured_6_ped').attr('readonly', true);
    // $('#insured_7_ped').attr('readonly', true);
    // $('#insured_8_ped').attr('readonly', true);
    // $('.name').attr('readonly', true);
    // $('.dob').attr('readonly', true);
    // $('.gender').attr('readonly', true);
    $('#coverage_type').attr('readonly', true);
    $('#cover_type').attr('readonly', true);
    $('#select_health_yes_no').css("display", "none");

    $('#sub_desposition').css("display", "none");
    $('#member_add').css("display", "none");
    $('#member_details').css("display", "none");
    $('#add_insured_pd').css("display", "none");
    $('#sel_insured').css("display", "none");
    $('#sub_desposition_pending').css("display", "none");
    $('#sub_desposition_not_contacted').css("display", "none");
    $('#sub_desposition_not_contacted').css("display", "none");
    $('#schedule_call').css("display", "none");
    $('#member_add').css("display", "none");
    $('#select_yes_no').css("display", "none");
    $('#send_sms').css("display", "none");
    $('#sendbtn').css("display", "none");
    $('#not_renewed_sub_disposition').css("display", "none");
    $('.port_in_field').css("display", "none");
    $('.policy_renewed_done').css("display", "none");
    $('#pending_ope_sub_disp').css("display", "none");
    $('#cancell_ope_sub_disp').css("display", "none");
    if (val == 32) {
      $('#sub_desposition').css("display", "block");
      $('#select_health_yes_no').css("display", "none");
    }

    if (val == 30) {
      $('#pending_ope_sub_disp').css("display", "block");
      $('.remark_block').css("display", "block");


    }

    if (val == 31) {
      $('#cancell_ope_sub_disp').css("display", "block");
      $('.remark_block').css("display", "block");


    }


    if (val == 33) {
      $('#sub_desposition_pending').css("display", "block");
      $('#open_docs_part').css("display", "none");
      $('#select_health_yes_no').css("display", "none");
      $('#member_add').css("display", "none");
    }
    if (val == 34) {
      $('#schedule_call').css("display", "block");
      $('#open_docs_part').css("display", "none");
      $('#select_health_yes_no').css("display", "none");
      $('#member_add').css("display", "none");
    }
    if (val == 35) {
      $('#sub_desposition_not_contacted').css("display", "block");
      $('#open_docs_part').css("display", "none");
      $('#schedule_call').css("display", "none");
      $('#select_health_yes_no').css("display", "none");
    }
    if (val == 38) {
      $('#schedule_call').css("display", "block");
      $('.remark_block').css("display", "none");
      $('#reminder_remark').css("display", "none");
    }
    if (val == 40) {
      $('#send_sms').css("display", "block");
      $('#sendbtn').css("display", "block");
    }
    if (val == 41) {
      $('#not_renewed_sub_disposition').css("display", "block");
      $('#schedule_call').css("display", "none");
      $('#send_sms').css("display", "none");
      $('#sendbtn').css("display", "none");
    }
    if (val == 42) {
      $('.port_in_field').css("display", "block");
      $('#not_renewed_sub_disposition').css("display", "none");
      $('#schedule_call').css("display", "none");
      $('#send_sms').css("display", "none");
    }
    if (val == 43) {

      $('.policy_renewed_done').css("display", "block");
      $('.port_in_field').css("display", "none");
      $('#not_renewed_sub_disposition').css("display", "none");
      $('#schedule_call').css("display", "none");
      $('#send_sms').css("display", "none");
    }

    if (val == 45) {


      $('.remark_block').css("display", "block");
      $('#open_docs_part').css("display", "block");
      $('#alter_nate_no_2').css("display", "block");

    }


    if (val == 46) {


      $('.remark_block').css("display", "block");
      $('#open_docs_part').css("display", "block");

    }


    if (val == 47) {


      $('.remark_block').css("display", "block");
      $('#open_docs_part').css("display", "block");

    }

    if (val == 51) {

      $('#select_member_dlt').css("display", "block");
      $('.remark_block').css("display", "block");
      var form_id = $('#form_id').val();

      $.ajax({
        method: 'post',
        url: "<?= base_url('form/show_member_details'); ?>",
        data: {
          form_id: form_id
        },
        success: function(response) {
          $(".sel_m_dlt").html(response.output);
          // $('#dltbtn').css("display", "block");




        }
      })


    }
    if (val == 28) {

      $('#open_docs_part').css("display", "block");

    } else {
      $('#open_docs_part').css("display", "none");
    }
  }

  function show_member_add(val) {
    $('#insured_1_ped').attr('readonly', true);
    $('#insured_2_ped').attr('readonly', true);
    $('#insured_3_ped').attr('readonly', true);
    $('#insured_4_ped').attr('readonly', true);
    $('#insured_5_ped').attr('readonly', true);
    $('#insured_6_ped').attr('readonly', true);
    $('#insured_7_ped').attr('readonly', true);
    $('#insured_8_ped').attr('readonly', true);
    $('.name').attr('readonly', true);
    $('.dob').attr('readonly', true);
    $('.gender').attr('readonly', true);
    $('#coverage_type').attr('readonly', true);
    $('#cover_type').attr('readonly', true);
    if (val == 'member_addition') {
      $('.remark_block').css("display", "block");
      $('#select_health_yes_no').css("display", "none");
    } else {
      $('#member_add').css("display", "none");
      $('#member_details').css("display", "none");
      $('#select_health_yes_no').css("display", "none");
    }
    if (val == 'ped') {
      $('#sel_insured').css("display", "block");
      $('#open_docs_part').css("display", "none");
      $('#select_health_yes_no').css("display", "none");
    } else {
      $('#sel_insured').css("display", "none");
      $('#member_details').css("display", "none");
    }
  }

  function show_field_add_member(val) {
    $('#insured_1_ped').attr('readonly', true);
    $('#insured_2_ped').attr('readonly', true);
    $('#insured_3_ped').attr('readonly', true);
    $('#insured_4_ped').attr('readonly', true);
    $('#insured_5_ped').attr('readonly', true);
    $('#insured_6_ped').attr('readonly', true);
    $('#insured_7_ped').attr('readonly', true);
    $('#insured_8_ped').attr('readonly', true);
    $('.name').attr('readonly', true);
    $('.dob').attr('readonly', true);
    $('.gender').attr('readonly', true);
    $('#coverage_type').attr('readonly', true);
    $('#cover_type').attr('readonly', true);
    if (val == 'name') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('.name').attr('readonly', false);
      $('#coverage_type').attr('readonly', true);
      $('#cover_type').attr('readonly', true);
    } else {
      $('.name').attr('readonly', true);
      $('#coverage_type').attr('readonly', true);
      $('#cover_type').attr('readonly', true);
    }

    if (val == 'dob') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('.dob').attr('readonly', false);
      $('#coverage_type').attr('readonly', true);
      $('#cover_type').attr('readonly', true);
    } else {
      $('.dob').attr('readonly', true);
      $('#coverage_type').attr('readonly', true);
      $('#cover_type').attr('readonly', true);
    }
    if (val == 'gender') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('.gender').attr('readonly', false);
      $('#coverage_type').attr('readonly', true);
      $('#cover_type').attr('readonly', true);
    } else {
      $('.gender').attr('readonly', true);
      $('#coverage_type').attr('readonly', true);
      $('#cover_type').attr('readonly', true);
    }


  }

  function show_add_pd(val) {
    $('#insured_1_ped').attr('readonly', true);
    $('#insured_2_ped').attr('readonly', true);
    $('#insured_3_ped').attr('readonly', true);
    $('#insured_4_ped').attr('readonly', true);
    $('#insured_5_ped').attr('readonly', true);
    $('#insured_6_ped').attr('readonly', true);
    $('#insured_7_ped').attr('readonly', true);
    $('#insured_8_ped').attr('readonly', true);
    $('.name').attr('readonly', true);
    $('.dob').attr('readonly', true);
    $('.gender').attr('readonly', true);
    $('#coverage_type').attr('readonly', true);
    $('#cover_type').attr('readonly', true);
    if (val == 'insured1') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('#insured_1_ped').attr('readonly', false);
    } else {
      $('#insured_1_ped').attr('readonly', true);
    }

    if (val == 'insured2') {

      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('#insured_2_ped').attr('readonly', false);
    } else {
      $('#insured_2_ped').attr('readonly', true);
    }

    if (val == 'insured3') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('#insured_3_ped').attr('readonly', false);
    } else {
      $('#insured_3_ped').attr('readonly', true);
    }

    if (val == 'insured4') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('#insured_4_ped').attr('readonly', false);
    } else {
      $('#insured_4_ped').attr('readonly', true);
    }

    if (val == 'insured5') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('#insured_5_ped').attr('readonly', false);
    } else {
      $('#insured_5_ped').attr('readonly', true);
    }

    if (val == 'insured6') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('#insured_6_ped').attr('readonly', false);
    } else {
      $('#insured_6_ped').attr('readonly', true);
    }

    if (val == 'insured7') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('#insured_7_ped').attr('readonly', false);
    } else {
      $('#insured_7_ped').attr('readonly', true);
    }

    if (val == 'insured8') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 160
      }, 700);
      $('#insured_8_ped').attr('readonly', false);
    } else {

      $('#insured_8_ped').attr('readonly', true);
    }
  }
</script>
<script>
  function show_policy(val, short_name) {
    if (short_name == 'operations' && val == 28) {

      $('.policy_details_date').css("display", "block");
      $('#open_docs_part').css("display", "block");

    } else {

      $('.policy_details_date').css("display", "none");
      $('#open_docs_part').css("display", "block");
    }
  }
</script>
<script>
  function show_remark() {
    $('.remark_block').css("display", "block");
  }
</script>
<script>
  function show_member_added(val) {
    // $('#insured_1_ped').attr('readonly', true);
    // $('#insured_2_ped').attr('readonly', true);
    // $('#insured_3_ped').attr('readonly', true);
    // $('#insured_4_ped').attr('readonly', true);
    // $('#insured_5_ped').attr('readonly', true);
    // $('#insured_6_ped').attr('readonly', true);
    // $('#insured_7_ped').attr('readonly', true);
    // $('#insured_8_ped').attr('readonly', true);
    // $('.name').attr('readonly', true);
    // $('.dob').attr('readonly', true);
    // $('.gender').attr('readonly', true);
    // $('#coverage_type').attr('readonly', true);
    // $('#cover_type').attr('readonly', true);
    if (val == 'member_added') {
      $('html, body').animate({
        scrollTop: $("#scroll_up").offset().top - 170
      }, 700);
      $('#scroll_up').css('border_color', 'red');
      $('#coverage_type').attr('readonly', false);
      $('#cover_type').attr('readonly', false);

      var cover = $("#coverage_type").val();
      for (i = cover; i >= 2; --i) {
        $("select[name=coverage_type] option[value='" + i + "']").attr('disabled', true);
      }

    } else {
      $('#coverage_type').attr('readonly', true);
      $('#cover_type').attr('readonly', true);
      $('#select_yes_no').css("display", "none");

    }
    if (val == 'endorsement') {
      $('#coverage_type').attr('readonly', true);
      $('#cover_type').attr('readonly', true);
      $('#member_add').css("display", "block");
    } else {
      $('#member_add').css("display", "none");

    }
    if (val == 'health_checkup') {
      $('#select_health_yes_no').css("display", "block");
    } else {
      $('#select_health_yes_no').css("display", "none");
    }
    if (val == 'discount') {
      $('#select_discount_yes_no').css("display", "block");
    } else {
      $('#select_discount_yes_no').css("display", "none");
    }
    if (val == 'ped') {
      $('#sel_insured').css("display", "block");
      $('#open_docs_part').css("display", "block");

      var cover = $("#coverage_type").val();
      var opt = '';
      opt += "<option value='' selected>Select Insured PED..</option>";
      for (i = 1; i <= cover; i++) {

        opt += '<option value="insured' + i + '">Insured ' + i + ' PED</option>';
      }
      $("select[name=insured_pd]").html(opt)

    } else {
      $('#sel_insured').css("display", "none");
      $('#open_docs_part').css("display", "none");
    }
  }

  function open_docs(val) {
    if (val == 'yes') {
      $('#open_docs_part').css("display", "block");
    } else {
      $('#open_docs_part').css("display", "none");
    }
  }
</script>
<script>
  function calnet_new() {
    var gross_amt = $('#new_gross_premium').val();
    var net_amt = Number(gross_amt) / 1.18;
    $("#new_net_premium").val(net_amt.toFixed(2));
    $('#new_net_premium').attr('readonly', true);
    if (gross_amt == '') {
      $('#new_net_premium').attr('readonly', false);
    }
  }

  function new_calgross() {
    var net_amt = $('#new_net_premium').val();
    var gross_amt = Number(net_amt) + (Number(net_amt) * 0.18);
    $("#new_gross_premium").val(gross_amt.toFixed(2));
    $('#new_gross_premium').attr('readonly', true);
    if (net_amt == '') {
      $('#new_gross_premium').attr('readonly', false);
    }
  }

  function show_company_name(val) {
    if (val == 'company' || val == 'port_out') {
      $('#company_name_drop').css("display", "block");
    } else {
      $('#company_name_drop').css("display", "none");
    }
  }

  function showdlt(val) {
    if (val != '') {
      $('#dltbtn').css("display", "block");
    }
  }

  function dlt_member() {
    var id_for_dlt = $('#sel_m_dlt').val();
    var form_id = $('#form_id').val();

    $.ajax({
      method: 'post',

      url: "<?= base_url('form/delete_member'); ?>",
      data: {
        id_for_dlt: id_for_dlt,
        form_id: form_id
      },
      success: function(response) {
        var res = JSON.parse(response);

        if (res.status == true) {
          $('#dltsms').html('Selected Memeber is deleted..');
          $('#dltsms').css('color', 'green');
        } else {
          $('#dltsms').html('Something Went Wrong..');
          $('#dltsms').css('color', 'red');
        }
      },

    })
  }
</script>
<script>
  var i = 0;

  $('.add-new').click(function() {
    i++;
    var formTemplate = $('.prescription-row').first().html();
    var newForm = "<tr class='prescription-row' id='presc_" + i + "'>" + formTemplate + "</tr>";
    $('table.table-prescription > tbody').append(newForm);
  });

  $('body').on('click', '.delete-row', function() {
    if ($('table').find('.prescription-row').length > 1) {
      $(this).parents('.prescription-row').remove();
    } else {
      var formTemplate = $('.prescription-row').first().html();
      var newForm = "<tr class='prescription-row'>" + formTemplate + "</tr>";
      $(this).parents('.prescription-row').remove();
      $('table.table-prescription > tbody').append(newForm);
    }
  });
</script>

</body>

</html><script type="text/javascript">
    
    function fetchproduct(com_id) {
       var com_id = com_id;
       $.ajax({
           url: "<?php echo  base_url('products/getproduct'); ?>",
           type: "POST",
           data: {
               com_id: com_id
           },
           success: function(response) {
               //var dataResult = JSON.parse(response);
               $('#product_name').html(response);
              
           }
       })
    }
</script>