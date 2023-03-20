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
  select[readonly] option {
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
                            <input class="search__input search form-control" type="text" placeholder="Enter Your City" value="<?php $id = $content[0]['customer_city'];
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
                            <input type="email" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="email" id="email" value="<?php echo $content[0]['email']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                            echo "readonly";
                                                                                                                                                                                          } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Contact No.</label>
                            <input type="number" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="contact" id="contact" value="<?php echo $content[0]['contact']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                    echo "readonly";
                                                                                                                                                                                                  } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Alternate No</label>
                            <input type="number" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="alternate_no" id="alternate_no" value="<?php echo $content[0]['alternate_no']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                                  echo "readonly";
                                                                                                                                                                                                                } ?>>
                          </div>
                        </div>
                        <?php if ($model_short_name == 'operations') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Login</label>
                              <select class="form-control form-select-sm" name="login" id="login">
                                <option value="<?php echo $content[0]['login']; ?>" selected><?php echo $content[0]['login']; ?></option>
                                <option value="Online">Online</option>
                                <option value="Pending">Pending</option>
                                <option value="Login">Login</option>
                              </select>
                            </div>
                          </div>
                        <?php } ?>
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
                              <option value="Fresh">Fresh</option>
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
                              <option value="na">NA</option>
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
                              <option value="<?php echo $content[0]['portability']; ?>" selected><?php echo $content[0]['portability']; ?></option>
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
                        <div class="col-md-2 setcalc" id="policy_type_action_1">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Portability End Date
                            </label>
                            <input type="date" name="port_end_date" id="port_end_date" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Policy No </label>
                            <input type="text" class="form-control" id="exampleInputno" name="policy_no" id="policy_no" aria-describedby="emailHelp" value="<?php echo $content[0]['policy_no']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                                      } ?>>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Company Name</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="company_name" id="company_name" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
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
                              <option value="NCB Super Premium">NCB Super Premium</option>
                              <option value="Care plus">Care plus</option>
                              <option value="Max Saver">Max Saver</option>
                              <option value="Health Companion">Health Companion</option>
                              <option value="Health gain">Health gain</option>
                              <option value="Prime – Protect">Prime – Protect</option>
                              <option value="ProHealth - Plus">ProHealth - Plus</option>
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
                              <option value="2 Lakhs">2 Lakhs</option>
                              <option value="3 Lakhs">3 Lakhs</option>
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
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputno" class="form-label">Medical Required </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="medical" id="medical" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                          echo "readonly";
                                                                                                                                        } ?>>
                              <option selected>Is Medical Required?</option>
                              <option value="Yes">yes</option>
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
                            <input type="agent" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="agent" id="agent" value="<?= $content[0]['agent'] ?>" placeholder="Enter Agent Name">
                          </div>
                        </div>
                        <?php if ($model_short_name == 'operations' || $role =='Master') { ?>
                          <?php if (!empty($content[0]['policy_start_date'])) { ?>
                            <div class="col-md-2 setcalc">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Policy Start Date</label>
                                <input type="date" class="form-control" placeholder="Enter Policy Start Date" name="policy_start_date" id="policy_start_date" value="<?= $content[0]['policy_start_date'] ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                                echo "readonly";
                                                                                                                                                                                                              } ?>>
                              </div>
                            </div>
                          <?php } ?>
                          <?php if (!empty($content[0]['policy_end_date'])) { ?>
                            <div class="col-md-2 setcalc">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Policy End Date</label>
                                <input type="date" class="form-control" placeholder="Enter Policy End Date" name="policy_end_date" id="policy_end_date" value="<?= $content[0]['policy_end_date'] ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                                      } ?>>
                              </div>
                            </div>
                          <?php } ?>
                          <?php if (!empty($content[0]['policy_end_date'])) { ?>
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
                        <?php if ($model_short_name == 'operations' || $role =='Master') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Policy Source</label>
                              <input type="text" class="form-control" placeholder="Enter Policy Source" name="policy_source" id="policy_source" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                  echo "readonly";
                                                                                                                                                } ?>>
                            </div>
                          </div>
                        <?php } ?>
                        <?php if ($model_short_name == 'operations' || $role =='Master') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Renewal Premium </label>
                              <input type="text" name="renewal_primium" id="renewal_primium" class="form-control" value="<?php if (!empty($content[0]['renewal_premium']) ?? '') ?>">
                            </div>
                          </div>
                        <?php } ?>
                        <?php if ($model_short_name == 'operations' || $role =='Master') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Counted Premium</label>
                              <input type="number" class="form-control" placeholder="Enter Counted Premium" name="counted_premium" id="counted_premium" value="<?php if (!empty($content[0]['counted_premium']) ?? '') ?>">
                            </div>
                          </div>
                        <?php } ?>
                        <?php if ($model_short_name == 'operations' || $role =='Master') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Rider</label>
                              <input type="text" class="form-control" placeholder="Enter Rider" name="rider" id="rider" value="<?php if (!empty($content[0]['rider']) ?? '') ?>">
                            </div>
                          </div>
                        <?php } ?>
                        <?php if ($model_short_name == 'operations' || $role =='Master') { ?>
                          <div class="col-md-2 setcalc">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Agent</label>
                              <input type="text" class="form-control" placeholder="Enter Agent Name" name="agent" id="agent" value="<?php if (!empty($content[0]['agent']) ?? '') ?>">
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                    <hr>
                    <!-- THree-->
                    <div class="col-md-12">
                      <h5 class="mb-3"><b>INSURED DETAILS</b></h5>
                      <div class="row" id="i1">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="insured_1_name" id="proposer_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[0]['member_name'])) {
                                                                                                                                                                                                    echo $member_details[0]['member_name'];
                                                                                                                                                                                                  } ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_1_gender">
                              <option value="<?php if (!empty($member_details[0]['member_gender'])) {
                                                echo $member_details[0]['member_gender'];
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
                            <input type="date" class="form-control" id="exampleInputEmail1" name="insured_1_dob" id="insured_1_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[0]['member_dob'])) {
                                                                                                                                                                          echo $member_details[0]['member_dob'];
                                                                                                                                                                        } ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_1_relation">
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
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 1
                              <textarea class="form-control" placeholder="Insured PED 1" id="floatingTextarea" name="insured_1_ped" id="insured_1_ped"><?php if (!empty($member_details[0]['insured_pd_details'])) {
                                                                                                                                                          echo $member_details[0]['insured_pd_details'];
                                                                                                                                                        } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_1_ped" id="underwriter_1_ped"><?php if (!empty($member_details[0]['underwriter_ped'])) {
                                                                                                                                                                    echo $member_details[0]['underwriter_ped'];
                                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_1" name="member_table_id_1" value="<?php if (!empty($member_details[0]['id'])){echo $member_details[0]['id'];} ?>">                                                                                                                                         
                      </div>
                      <div class="row" id="i2">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="insured_2_name" id="insured_2_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[1]['member_name'])) {
                                                                                                                                                                                                      echo $member_details[1]['member_name'];
                                                                                                                                                                                                    } ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_2_gender">
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
                            <input type="date" class="form-control" id="exampleInputEmail1" name="insured_2_dob" id="insured_2_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[0]['member_dob'])) {
                                                                                                                                                                          echo $member_details[0]['member_dob'];
                                                                                                                                                                        } ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_2_relation">
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
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 2
                              <textarea class="form-control" placeholder="Insured PED 2" id="floatingTextarea" name="insured_2_ped" id="insured_2_ped"><?php if (!empty($member_details[1]['insured_pd_details'])) {
                                                                                                                                                          echo $member_details[1]['insured_pd_details'];
                                                                                                                                                        } ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_2_ped" id="underwriter_2_ped"><?php if (!empty($member_details[1]['underwriter_ped'])) {
                                                                                                                                                                    echo $member_details[1]['underwriter_ped'];
                                                                                                                                                                  } ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_2" name="member_table_id_2" value="<?php if (!empty($member_details[1]['id'])){echo $member_details[1]['id'];} ?>">                                                                                                                                          
                      </div>
                      <div class="row" id="i3">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="insured_3_name" id="insured_3_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[2]['member_name'])){echo $member_details[2]['member_name'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_3_gender">
                            <option value="<?php if (!empty($member_details[2]['member_gender'])){echo $member_details[2]['member_gender'];} ?>" selected><?php if (!empty($member_details[2]['member_gender'])){echo $member_details[2]['member_gender'];} ?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="insured_3_dob" id="insured_3_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[2]['member_dob'])){echo $member_details[2]['member_dob'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_3_relation">
                            <option value="<?php if (!empty($member_details[2]['member_relation'])){echo $member_details[2]['member_relation'];} ?>" selected><?php if (!empty($member_details[2]['member_relation'])){echo $member_details[2]['member_relation'];} ?></option>
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
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 3
                              <textarea class="form-control" placeholder="Insured PED 3" id="floatingTextarea" name="insured_3_ped" id="insured_3_ped"><?php if (!empty($member_details[2]['insured_pd_details'])){echo $member_details[2]['insured_pd_details'];} ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_3_ped" id="underwriter_3_ped"><?php if (!empty($member_details[2]['underwriter_ped'])){echo $member_details[2]['underwriter_ped'];} ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_3" name="member_table_id_3" value="<?php if (!empty($member_details[2]['id'])){echo $member_details[2]['id'];} ?>">                                                                                                                                         
                      </div>
                      <div class="row" id="i4">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="insured_4_name" id="insured_4_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[3]['member_name'])){echo $member_details[3]['member_name'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_4_gender">
                            <option value="<?php if (!empty($member_details[3]['member_gender'])){echo $member_details[3]['member_gender'];} ?>" selected><?php if (!empty($member_details[3]['member_gender'])){echo $member_details[3]['member_gender'];} ?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="insured_4_dob" id="insured_4_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[3]['member_dob'])){echo $member_details[3]['member_dob'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_4_relation">
                            <option value="<?php if (!empty($member_details[3]['member_relation'])){echo $member_details[3]['member_relation'];} ?>" selected><?php if (!empty($member_details[3]['member_relation'])){echo $member_details[3]['member_relation'];} ?></option>
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
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 4
                              <textarea class="form-control" placeholder="Insured PED 4" id="floatingTextarea" name="insured_4_ped" id="insured_4_ped"><?php if (!empty($member_details[3]['insured_pd_details'])){echo $member_details[3]['insured_pd_details'];} ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_4_ped" id="underwriter_4_ped"><?php if (!empty($member_details[3]['underwriter_ped'])){echo $member_details[3]['underwriter_ped'];} ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_4" name="member_table_id_4" value="<?php if (!empty($member_details[3]['id'])){echo $member_details[3]['id'];} ?>">                                                                                                                                        
                      </div>
                      <div class="row" id="i5">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="insured_5_name" id="insured_5_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[4]['member_name'])){echo $member_details[4]['member_name'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_5_gender">
                            <option value="<?php if (!empty($member_details[4]['member_gender'])){echo $member_details[4]['member_gender'];} ?>" selected><?php if (!empty($member_details[4]['member_gender'])){echo $member_details[4]['member_gender'];} ?></option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="insured_5_dob" id="insured_5_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[4]['member_dob'])){echo $member_details[4]['member_dob'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_5_relation">
                            <option value="<?php if (!empty($member_details[4]['member_relation'])){echo $member_details[4]['member_relation'];} ?>" selected><?php if (!empty($member_details[4]['member_relation'])){echo $member_details[4]['member_relation'];} ?></option>
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
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 5
                              <textarea class="form-control" placeholder="Insured PED 5" id="floatingTextarea" name="insured_5_ped" id="insured_5_ped"><?php if (!empty($member_details[4]['insured_pd_details'])){echo $member_details[4]['insured_pd_details'];} ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_5_ped" id="underwriter_5_ped"><?php if (!empty($member_details[4]['underwriter_ped'])){echo $member_details[4]['underwriter_ped'];} ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_5" name="member_table_id_5" value="<?php if (!empty($member_details[4]['id'])){echo $member_details[4]['id'];} ?>">                                                                                                                                                                                                                                                                                  
                      </div>
                      <div class="row" id="i6">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="insured_6_name" id="insured_6_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[5]['member_name'])){echo $member_details[5]['member_name'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_6_gender">
                            <option value="<?php if (!empty($member_details[5]['member_gender'])){echo $member_details[5]['member_gender'];} ?>" selected><?php if (!empty($member_details[5]['member_gender'])){echo $member_details[5]['member_gender'];} ?></option>
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="insured_6_dob" id="insured_6_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[5]['member_dob'])){echo $member_details[5]['member_dob'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_6_relation">
                            <option value="<?php if (!empty($member_details[5]['member_relation'])){echo $member_details[5]['member_relation'];} ?>" selected><?php if (!empty($member_details[5]['member_relation'])){echo $member_details[5]['member_relation'];} ?></option>
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
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 6
                              <textarea class="form-control" placeholder="Insured PED 6" id="floatingTextarea" name="insured_6_ped" id="insured_6_ped"><?php if (!empty($member_details[5]['insured_pd_details'])){echo $member_details[5]['insured_pd_details'];} ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_6_ped" id="underwriter_6_ped"><?php if (!empty($member_details[5]['underwriter_ped'])){echo $member_details[5]['underwriter_ped'];} ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_6" name="member_table_id_6" value="<?php if (!empty($member_details[5]['id'])){echo $member_details[5]['id'];} ?>">                                                                                                                                         
                      </div>
                      <div class="row" id="i7">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="insured_7_name" id="insured_7_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[6]['member_name'])){echo $member_details[6]['member_name'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_7_gender">
                            <option value="<?php if (!empty($member_details[6]['member_gender'])){echo $member_details[6]['member_gender'];} ?>" selected><?php if (!empty($member_details[6]['member_gender'])){echo $member_details[6]['member_gender'];} ?></option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="insured_7_dob" id="insured_7_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[6]['member_dob'])){echo $member_details[6]['member_dob'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_7_relation">
                            <option value="<?php if (!empty($member_details[6]['member_relation'])){echo $member_details[6]['member_relation'];} ?>" selected><?php if (!empty($member_details[6]['member_relation'])){echo $member_details[6]['member_relation'];} ?></option>
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
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 7
                              <textarea class="form-control" placeholder="Insured PED 7" id="floatingTextarea" name="insured_7_ped" id="insured_7_ped"><?php if (!empty($member_details[6]['insured_pd_details'])){echo $member_details[6]['insured_pd_details'];} ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_7_ped" id="underwriter_7_ped"><?php if (!empty($member_details[6]['underwriter_ped'])){echo $member_details[6]['underwriter_ped'];} ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_7" name="member_table_id_7" value="<?php if (!empty($member_details[6]['id'])){echo $member_details[6]['id'];} ?>">
                      </div>
                      <div class="row" id="i8">
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">NAME
                              <span class="setredcolor"></span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="insured_8_name" id="insured_8_name" aria-describedby="emailHelp" placeholder="Enter Name" value="<?php if (!empty($member_details[7]['member_name'])){echo $member_details[7]['member_name'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">GENDER </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_8_gender">
                            <option value="<?php if (!empty($member_details[7]['member_gender'])){echo $member_details[7]['member_gender'];} ?>" selected><?php if (!empty($member_details[0]['member_gender'])){echo $member_details[0]['member_gender'];} ?></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">D.O.B
                              <span class="setredcolor"></span></label>
                            <input type="date" class="form-control" id="exampleInputEmail1" name="insured_8_dob" id="insured_8_dob" aria-describedby="emailHelp" value="<?php if (!empty($member_details[7]['member_dob'])){echo $member_details[7]['member_dob'];} ?>">
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">RELATION </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_8_relation">
                            <option value="<?php if (!empty($member_details[7]['member_relation'])){echo $member_details[7]['member_relation'];} ?>" selected><?php if (!empty($member_details[7]['member_relation'])){echo $member_details[7]['member_relation'];} ?></option>
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
                            <label for="exampleInputEmail1" class="form-label mt-3">INSURED PED 8
                              <textarea class="form-control" placeholder="Insured PED 8" id="floatingTextarea" name="insured_8_ped" id="insured_2_ped"><?php if (!empty($member_details[7]['insured_pd_details'])){echo $member_details[7]['insured_pd_details'];} ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-2 setcalc">
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label mt-3">UNDERWRITER PED
                              <textarea class="form-control" placeholder="Underwriter PED" id="floatingTextarea" name="underwriter_8_ped" id="underwriter_2_ped"><?php if (!empty($member_details[7]['underwriter_ped'])){echo $member_details[7]['underwriter_ped'];} ?></textarea>
                          </div>
                        </div>
                        <input type="hidden" id="member_table_id_8" name="member_table_id_8" value="<?php if (!empty($member_details[7]['id'])){echo $member_details[7]['id'];} ?>">
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
                                <input type="number" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="gross_premium" value="<?php echo $content[0]['gross_premium']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                      echo "readonly";
                                                                                                                                                                                                    } ?>>
                              </div>
                            </div>
                            <div class="col-md-4 setcalc4">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Net Premium</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="net_premium" id="net_premium" value="<?php echo $content[0]['net_premium']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                                        echo "readonly";
                                                                                                                                                                                                                      } ?>>
                              </div>
                            </div>
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
                                <input type="text" class="form-control" id="exampleInputno" aria-describedby="emailHelp" name="discount" id="discount" value="<?php echo $content[0]['discount']; ?>" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                                                                                      } ?>>
                              </div>
                            </div>
                            <!--</div>
                            <div class="row">-->
                            <div class="col-md-4 setcalc4">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Manager</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="manager" id="manager">
                                  <option selected>Select Manager..</option>
                                  <option value="<?php echo $content[0]['manager']; ?>" selected><?php echo $content[0]['manager']; ?></option>
                                  <?php if (!empty($manager)) {
                                    foreach ($manager as $value) { ?>
                                      <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                  <?php }
                                  } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4 setcalc4">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Team Leader</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tl" id="tl" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                                                                                    echo "readonly";
                                                                                                                                  } ?>>
                                  <option value="<?php echo $content[0]['tl']; ?>" selected><?php echo $content[0]['tl']; ?></option>
                                  <?php if (!empty($team_leader)) {
                                    foreach ($team_leader as $value) { ?>
                                      <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                  <?php }
                                  } ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- <div class="col-md-4"> -->
                        <!-- <div class="col-md-4"> -->
                        <?php if ($model_short_name == 'claims' ) { ?>
                          <div class="col-md-8 setcalc8">
                            <label for="exampleInputEmail1" class="form-label">REMIND YOUR CALL</label>
                            <select class="form-select form-select-sm mb-1">
                              <option>Select Scheduled Call</option>
                              <?php if (!empty($scheduled_call)) {
                                foreach ($scheduled_call as $value) {
                                  $val = explode("-", $value['reminder_by_user_module']);  ?>
                                  <option value="<?= $value['id']; ?>"><?php echo $value['call_remark'] . " on (" . $user_id = $value['call_time']; ?></option>
                              <?php }
                              } ?>
                            </select>
                            <input type="datetime-local" class="form-control mb-1" id="exampleInputEmail1" name="reminder_date" id="reminder_date" aria-describedby="emailHelp">
                            <input type="text" class="form-control" id="exampleInputEmail1" name="reminder_title" id="reminder_title" placeholder="Add Your Call Reminder" aria-describedby="emailHelp">
                          </div>
                        <?php } ?>
                        <!-- </div> -->
                        <!-- </div> -->
                      </div>
                      <hr>
                      <!-- Five-->
                      <?php if($role != 'Master'){ ?>
                      <div class="col-md-12" id="scroll_down">
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
                              <label for="exampleInputno" class="form-label">Disposition</label>
                              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="disposition_name" id="disposition_name" onchange="showsubdisposition(this.value); show_policy(this.value,'<?= $model_short_name ?>'); show_remark();">
                                <option value="" selected>Select</option>
                                <?php foreach ($disposition_name as $val) { ?>
                                  <option value="<?= $val['id'] ?>"><?= $val['disposition'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <?php if ($model_short_name == 'services') { ?>
                            <div class="col-md-6 setcalc" id="sub_desposition">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Sub Desposition</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sub_disposition_name" id="sub_disposition_name" onchange="show_member_added(this.value);">
                                  <option value="" selected>Select</option>
                                  <option value="Member Added">Member Added</option>
                                  <option value="Endorsement">Endorsement</option>
                                  <option value="Health Chekup">Health Chekup</option>
                                  <option value="PED">PED</option>
                                  <option value="Discount">Discount</option>
                                  <option value="None">None</option>
                                </select>
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
                                <label for="exampleInputno" class="form-label">Select Sub Desposition</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sub_disposition_pending" id="sub_disposition_pending" onchange="show_member_add(this.value);">
                                  <option value="" selected>Select</option>
                                  <option value="Member Addition">Member Addition</option>
                                  <option value="Endorsement">Endorsement</option>
                                  <option value="Health Checkup">Health Chekup</option>
                                  <option value="PED_pending">PED</option>
                                  <option value="Discount">Discount</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 setcalc" id="sub_desposition_not_contacted">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Sub Desposition</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sub_disposition_not_conn" id="sub_disposition_not_conn">
                                  <option value="" selected>Select Sub Disposition..</option>
                                  <option value="Ringing">Ringing</option>
                                  <option value="Does Not Exist">Does Not Exist</option>
                                  <option value="wrong_no">Wrong Number</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6" id="select_yes_no">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Status of Member Addition</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sel_yes_no" id="sel_yes_no" onchange="open_docs(this.value);">
                                  <option value="" selected>Select </option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
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
                            <div class="col-md-6" id="select_health_yes_no">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Status of Health Checkup</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sel_health_checkup" id="sel_health_checkup">
                                  <option value="" selected>Select </option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6" id="select_discount_yes_no">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Status of Discount</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sel_dis" id="sel_dis">
                                  <option value="" selected>Select </option>
                                  <option value="Yes">Paid</option>
                                  <option value="No">Not Paid</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6" id="select_endorsment_yes_no">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Status of Endorsment</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sel_endorsment" id="sel_endorsment" onchange="open_docs(this.value);">
                                  <option value="" selected>Select </option>
                                  <option value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6" id="member_add">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Member</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="sel_member" id="sel_member" onchange="show_field_add_member(this.value);">
                                  <option value="" selected>Select Member..</option>
                                  <option value="Spouse">Spouse</option>
                                  <option value="Child">Child</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-12" id="member_details">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Add Member Details </label>
                                <textarea class="form-control" placeholder="Enter Member Details" name="member_add_details" id="member_add_details"></textarea>
                              </div>
                            </div>
                            <div class="col-md-6" id="sel_insured">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Insured PED</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="insured_pd" id="insured_pd" onchange="show_add_pd(this.value);">
                                  <option value="" selected>Select Insured PED..</option>
                                  <option value="insured1">Insured 1 Ped</option>
                                  <option value="insured2">Insured 2 Ped</option>
                                  <option value="insured3">Insured 3 Ped</option>
                                  <option value="insured4">Insured 4 Ped</option>
                                  <option value="insured5">Insured 5 Ped</option>
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
                          <?php if ($model_short_name == 'renewals') { ?>
                            <div class="col-md-6 setcalc" id="send_sms">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select SMS Type</label>
                                <input type="hidden" name="sms_type_label" id="sms_type_label" value="SMS Type">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="send_sms_type" id="send_sms_type">
                                  <option value="" selected>Select SMS Type..</option>
                                  <option value="Policy_renewal_sms">Policy Renewal SMS</option>
                                  <option value="Policy_expired_sms">Policy Expired SMS</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-1 setcalc" id="sendbtn" style="width: 9%!important">
                              <div class="mb-3" style="margin-top: 28px;">
                                <a type="btn" class="btn btn-sm btn-primary">Send SMS </a>
                              </div>
                            </div>
                            <div class="col-md-6 setcalc" id="not_renewed_sub_disposition">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Sub Disposition</label>
                                <input type="hidden" name="sub_disposition_label_not_renewd" id="sub_disposition_label_not_renewd" value="Sub Disposition">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" onchange="show_company_name(this.value)" name="not_renewed_sub" id="not_renewed_sub">
                                  <option value="" selected>Select Sub Disposition..</option>
                                  <option value="fund_issue">Fund Issue</option>
                                  <option value="service_issue">Service Issue</option>
                                  <option value="corporate_plan">Corporate Plan</option>
                                  <option value="customer_died">Customer Died</option>
                                  <option value="claim_rejected">Claim Rejected</option>
                                  <option value="code_change">Code Change</option>
                                  <option value="port_out">Port Out</option>
                                  <option value="high_premium">High Premium</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 setcalc port_in_field">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Company</label>
                                <input type="hidden" name="company_label" id="company_label" value="Company">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="company_name_2" id="company_name_2">
                                  <option value="" selected>Select Company</option>
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
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">New Policy </label>
                                <input type="hidden" name="new_policy_label" id="new_policy_label" value="New Policy">
                                <input type="text" class="form-control" placeholder="Enter New Policy" name="new_policy_number" id="new_policy_number">
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Proposer Date Of Birth</label>
                                <input type="hidden" name="proposer_dob_label" id="proposer_dob_label" value="Proposer DOB">
                                <input type="date" class="form-control" placeholder="Enter Proposer Date Of Birth" name="proposer_dob" id="proposer_dob">
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Sum Assured
                                </label>
                                <input type="hidden" name="sum_assured_label" id="sum_assured_label" value="Sum Assured">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="new_sum_assured_1" id="new_sum_assured_1">
                                  <option selected>Select Sum Assured</option>
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
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Net Premium</label>
                                <input type="hidden" name="net_premium_label" id="net_premium_label" value="Net Premium">
                                <input type="text" class="form-control" name="new_net_premium" id="new_net_premium" onkeyup="new_calgross();" onkeydown="new_calgross();" aria-describedby="emailHelp">
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Upselling</label>
                                <input type="hidden" name="upselling_label" id="upselling_label" value="Upselling">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="upselling" id="upselling">
                                  <option value="" selected>Select Upselling</option>
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
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Alternate Number</label>
                                <input type="hidden" name="alt_number_label" id="alt_number_label" value="Alternate Number">
                                <input type="text" class="form-control" id="exampleInputEmail1" name="alternate_number" id="alternate_number" aria-describedby="emailHelp" placeholder="Enter Alternate Number">
                              </div>
                            </div>
                          <?php } ?>
                          <?php if ($model_short_name == 'operations') { ?>
                            <div class="col-md-6 setcalc policy_details_date">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Policy Start Date</label>
                                <input type="date" class="form-control" placeholder="Enter Policy Start Date" name="policy_start_date" id="policy_start_date">
                              </div>
                            </div>
                            <div class="col-md-6  setcalc policy_details_date">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Policy End Date</label>
                                <input type="date" class="form-control" placeholder="Enter Policy End Date" name="policy_end_date" id="policy_end_date">
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_details_date">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Policy Issue Date</label>
                                <input type="date" class="form-control" placeholder="Enter Policy Issue Date" name="policy_issue_date" id="policy_issue_date">
                              </div>
                            </div>
                          <?php } ?>
                          <div class="col-md-6 setcalc remark_block">
                            <div class="mb-3">
                              <label for="exampleInputno" class="form-label">Remarks <span class="setredcolor">*</span></label>
                              <textarea class="form-control" placeholder="Enter Your Remarks" name="remarks" id="remarks"></textarea>
                            </div>
                          </div>
                          <div class="row" id="schedule_call" <?php if ($model_short_name == 'services') {
                                                                echo "";
                                                              } ?> style="display:none;">
                            <div class="col-md-12">
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">SCHEDULE CALL</label>
                                <div class="row">
                                  <div class="col-md-6 setcalc">
                                    <input type="date" class="form-control" id="exampleInputEmail1" name="reminder_date" id="reminder_date" aria-describedby="emailHelp">
                                  </div>
                                  <div class="col-md-6 setcalc">
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="reminder_remark" id="reminder_remark" placeholder="remarks" aria-describedby="emailHelp">
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
                                  <option value="" selected>Select Compnay</option>
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
                                <label for="exampleInputno" class="form-label">Gross Premium</label>
                                <input type="hidden" name="gross_premium_label" id="gross_premium_label" value="Gross Premium">
                                <input type="text" class="form-control" name="new_gross_premium_2" id="new_gross_premium_2" aria-describedby="emailHelp" placeholder="Enter Gross Premium Amount">
                              </div>
                            </div>
                            <div class="col-md-6 setcalc port_in_field">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Date Of Port</label>
                                <input type="hidden" name="date_of_port_label" id="date_of_port_label" value="Date Of Port">
                                <input type="date" class="form-control" id="exampleInputEmail1" name="date_of_port_2" id="date_of_port_2" aria-describedby="emailHelp" placeholder="Enter Date Of Port Date">
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Payment Mode</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="new_payment_mode" id="new_payment_mode">
                                  <option value="" selected>Select payment Mode</option>
                                  <option value="Cheque Pickup">Cheque Pickup</option>
                                  <option value="Cash">Cash</option>
                                  <option value="Website"> Website</option>
                                  <option value="Quick Payment"> Quick Payment</option>
                                  <option value="Account Transfer">Account Transfer</option>
                                  <option value="Manual Entry">Manual Entry</option>
                                  <option value="Cheque NEFT">Cheque NEFT</option>
                                  <option value="Offline Link">Offline Link</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Select Payment Tenure </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="new_payment_tenure" id="new_payment_tenure">
                                  <option value="" selected>Select Payment Tenure</option>
                                  <option value="1 year"> 1 year</option>
                                  <option value="3 year ">3 year </option>
                                  <option value=" 5 year"> 5 year</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Family Type
                                </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="new_coverage_type" id="new_coverage_type">
                                  <option value="" selected>Select Family Type</option>
                                  <option value="1 Adult">1 Adult</option>
                                  <option value="1 Adult+1 Child">1 Adult+1 Child</option>
                                  <option value="1 Adult+2 Child">1 Adult+2 Child</option>
                                  <option value="1 Adult+3 Child">1 Adult+3 Child</option>
                                  <option value="2 Adult">2 Adult</option>
                                  <option value="2 Adult+1 Child">2 Adult+1 Child</option>
                                  <option value="2 Adult+2 Child">2 Adult+2 Child</option>
                                  <option value="2 Adult+3 Child">2 Adult+3 Child</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Gross Premium</label>
                                <input type="text" class="form-control" onkeyup="calnet_new();" onkeydown="calnet_new();" name="new_gross_premium" id="new_gross_premium" aria-describedby="emailHelp">
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">EMI</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="emi" id="emi">
                                  <option value="" selected>Select EMI</option>
                                  <option value="3 Months">3 Months</option>
                                  <option value="6 months">6 months</option>
                                  <option value="12 months">12 months</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6 setcalc policy_renewed_done">
                              <div class="mb-3">
                                <label for="exampleInputno" class="form-label">Discount</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="discount_new" id="discount_new" aria-describedby="emailHelp" placeholder="Enter Discount If Any">
                              </div>
                            </div>
                            <!-- </div>
                              </div> -->
                            <!-- </div> -->
                          <?php } ?>
                        </div>
                        <div class="col-md-5" id="open_docs_part" <?php if ($model_short_name == 'services' || $model_short_name == 'renewals') {
                                                                    echo "style='display:none;'";
                                                                  } ?>>
                          <input type="hidden" name="module_short_name" id="module_short_name" value="<?= $model_short_name ?>">
                          <div class="md-3">
                            <div class="row">
                              <div class="col-md-6">
                                <label for="exampleInputno" class="form-label">Upload Documents </label><br>
                              </div>
                              <div class="col-md-6" style="text-align: left;">
                                <a onclick="add()" style="cursor: pointer;color:blue;"><b>Add more +</b></a>
                                <a onclick="remove()" style="cursor: pointer;color:red;"><b>Remove -</b></a>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12 mb-3" style='display:flex'>
                                <input type="text" class="form-control" name="doc_label[]" id="doc_label" placeholder="Enter Title of document">&nbsp;&nbsp;&nbsp;&nbsp;
                                <label for="doc_image" class="uploaddata" style="background-color: #54b2e5;
                                                                                                            padding: 4px 14px;
                                                                                                            border-radius: 8px;margin-bottom:0px;">Upload</label>
                                <input type="file" class="form-control" aria-describedby="emailHelp" name="doc_image[]" id="doc_image" style="border:none;">
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
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="btn btn-primary accordion-button collapsed btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background:#405189;width: 8%;border-radius: 5px;padding: 9px 9px;">
                          <p style="color:white;margin-bottom: 0px;">Thread</p>
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                          <!--<div class="card-body">-->
                          <div class="list-group col nested-list nested-sortable">
                            <div class="list-group-item nested-1">Disposition - Name
                              <div class="list-group nested-list nested-sortable">
                                <!--<div class="list-group-item nested-2">-->
                                <div class="card-body" style="background-color: #0000000f;">
                                  <div class="row" style="margin-bottom: -15px;">
                                    <div class="col-md-12 mb-1" style="display:flex;">
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Remarks</p>
                                        <h5 class="seth5"><b>
                                            Anshul Gupta </b></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Documents Name</p>
                                        <h5 class="seth5"><b>
                                            Nivo health insaurance </b></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Documents</p>
                                        <h5 class="seth5"><b>
                                            Max Saver </b></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Policy No</p>
                                        <h5 class="seth5"><b>
                                            12711.86 </b></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Member Type</p>
                                        <h5 class="seth5"><b>
                                            2022-11-02 </b></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Member Details</p>
                                        <h5 class="seth5"><b>
                                            2022-11-02 </b></h5>
                                      </div>
                                    </div>
                                    <div class="col-md-12 mb-1" style="display:flex;">
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Added Date</p>
                                        <h5 class="seth5"><b>
                                            2022-11-02 </b></h5>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!--</div>-->
                                <p class="mt-2 mb-0" style="margin-left: 20px;">Sub Disposition - Name</p>
                                <div class="list-group-item nested-2" style="width: 98%;margin-left: auto;">
                                  <div class="row" style="margin-bottom: -15px;">
                                    <div class="col-md-12 mb-1" style="display:flex;">
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Remarks</p>
                                        <h5 class="seth5"><b>
                                            Anshul Gupta </b></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Documents Name</p>
                                        <h5 class="seth5"><b>
                                            Nivo health insaurance </b></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Documents</p>
                                        <h5 class="seth5"><b>
                                            Max Saver </b></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Policy No</p>
                                        <h5 class="seth5"><b>
                                            12711.86 </b></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Member Type</p>
                                        <h5 class="seth5"><b>
                                            2022-11-02 </b></h5>
                                      </div>
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Member Details</p>
                                        <h5 class="seth5"><b>
                                            2022-11-02 </b></h5>
                                      </div>
                                    </div>
                                    <div class="col-md-12 mb-1" style="display:flex;">
                                      <div class="col-md-2">
                                        <p class="setpara mb-1">Added Date</p>
                                        <h5 class="seth5"><b>
                                            2022-11-02 </b></h5>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
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
              <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">
              <?php if ($model_short_name != 'claims') { ?>
                <button type="submit" class="btn btn-primary">Update</button>
              <?php } else { ?>
                <button onclick="initiate_claim(<?php echo $this->uri->segment(4); ?>)" class="btn btn-primary">Intiate Claim</button>
              <?php } ?>
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
<script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= base_url() ?>assets/js/plugins.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- apexcharts -->
<script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>
<!-- Vector map-->
<script src="<?= base_url() ?>assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="<?= base_url() ?>assets/libs/jsvectormap/maps/world-merc.js"></script>
<!--Swiper slider js-->
<script src="<?= base_url() ?>assets/libs/swiper/swiper-bundle.min.js"></script>
<!-- Dashboard init -->
<script src="<?= base_url() ?>assets/js/pages/dashboard-ecommerce.init.js"></script>
<!-- App js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="<?= base_url() ?>assets/js/app.js"></script>
<script type="text/javascript">
  // update modal
  $(document).on('submit', '#edit_sale_closure', function(ev) {
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    $.ajax({
      url: "<?= base_url() ?>form/updatesubadmi",
      type: 'post',
      data: formData,
      success: function(result) {
        //json data
        var dataResult = JSON.parse(result);
        if (dataResult.inserted == '1') {
          swal('Record Updated 🙂', ' ', 'success');
          //window.history.back();
          location.reload();
        } else {
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
  function initiate_claim(id) {
  }
  function policy_type_action() {
    if ($('#policy_type').val() == 'fresh') {
      $('#policy_type_action_1').css("display", "none");
      $('#policy_type_action_2').css("display", "none");
    } else {
      $('#policy_type_action_1').css("display", "block");
      $('#policy_type_action_2').css("display", "block");
    }
  }
  covertype();
  function covertype() {
    var val = $("#cover_type").val();
    if (val == "Individual") {
      $("#coverage_type").html("<option value='1'>1</option>");
      changecoveragetype();
    } else {
      $("#coverage_type").html("<option selected>Select Family Type</option><option value='2' <?php if ($content[0]['coverage_type'] == '2') {  echo 'Selected';  } ?>>2</option><option value='3' <?php if ($content[0]['coverage_type'] == '3') {  echo 'Selected';  } ?>>3</option><option value='4' <?php if ($content[0]['coverage_type'] == '4') {  echo 'Selected';  } ?>>4</option><option value='5' <?php if ($content[0]['coverage_type'] == '5') {  echo 'Selected'; } ?>>5</option><option value='6' <?php if ($content[0]['coverage_type'] == '6') {  echo 'Selected';  } ?>>6</option><option value='7' <?php if ($content[0]['coverage_type'] == '7') { echo 'Selected';  } ?>>7</option><option value='8' <?php if ($content[0]['coverage_type'] == '8') {  echo 'Selected'; } ?>>8</option>");
      changecoveragetype();
    }
  }
  function changecoveragetype() {
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
    $('#select_health_yes_no').css("display", "none");
    $('#open_docs_part').css("display", "none");
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
    if (val == 32) {
      $('#sub_desposition').css("display", "block");
      $('#select_health_yes_no').css("display", "none");
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
      covertype();
      $('.policy_renewed_done').css("display", "block");
      $('.port_in_field').css("display", "none");
      $('#not_renewed_sub_disposition').css("display", "none");
      $('#schedule_call').css("display", "none");
      $('#send_sms').css("display", "none");
    }

    if (val == 45) {
      covertype();
      
      $('.remark_block').css("display", "block");
      $('#open_docs_part').css("display", "block");
      
    }
    

    if (val == 46) {
      covertype();
      
      $('.remark_block').css("display", "block");
      $('#open_docs_part').css("display", "block");
      
    }
    

    if (val == 47) {
      covertype();
      
      $('.remark_block').css("display", "block");
      $('#open_docs_part').css("display", "block");
      
    }
   
  }
  function show_member_add(val) {
    if (val == 'member_addition') {
      $('#member_add').css("display", "block");
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
    if (val == 'child' || val == 'spouse') {
      $('#member_details').css("display", "block");
      $('#add_insured_pd').css("display", "none");
    } else {
      $('#member_details').css("display", "none");
      $('#add_insured_pd').css("display", "none");
    }
  }
  function show_add_pd(val) {
    if (val == 'insured1' || val == 'insured2' || val == 'insured3' || val == 'insured4' || val == 'insured5') {
      $('#add_insured_pd').css("display", "block");
    } else {
      $('#add_insured_pd').css("display", "none");
    }
  }
</script>
<script>
  function show_policy(val, short_name) {
    if (short_name == 'operations' && val == 28) {
      $('.policy_details_date').css("display", "block");
    } else {
      $('.policy_details_date').css("display", "none");
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
    if (val == 'member_added') {
      $('#select_yes_no').css("display", "block");
    } else {
      $('#select_yes_no').css("display", "none");
    }
    if (val == 'endorsement') {
      $('#select_endorsment_yes_no').css("display", "block");
    } else {
      $('#select_endorsment_yes_no').css("display", "none");
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
</script>
</body>
</html>