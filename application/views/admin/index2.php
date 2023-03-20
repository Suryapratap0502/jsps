<?php
include 'link.php';
?>
<?php $total_revenue =  $this->Dashboard_model->total_revenue();

$max_value = max(array_column($total_revenue, 'total_revenue'));
$min_value = min(array_column($total_revenue, 'total_revenue'));

$min_val = min(array_column($total_policy, 'total_policy'));

$max_val = max(array_column($total_policy, 'total_policy'));
?>

<body>
    <?php
    //Check what time zone the server is currently in
    $Timezone = date_default_timezone_get();
    // echo "The current server timezone is: " . $Timezone."\n\n";

    date_default_timezone_set('Asia/Kolkata'); //Asia: India


    ?>
    <style>
        .my-custom-scrollbar {
            position: relative;
            height: auto;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        div.scroll {

            overflow-x: scroll;
            white-space: nowrap;
        }

        canvas#pieChart {
            display: block !important;
            height: 400px !important;
            width: 450px !important;
        }

        canvas#pieChart_claim {
            display: block !important;
            height: 400px !important;
            width: 450px !important;
        }
    </style>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include 'topar.php'; ?>
        <!-- ========== App Menu ========== -->
        <?php include 'imgheader.php'; ?>

        <?php
        include 'sidebar.php';
        ?>


    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col">

                        <div class="h-100">

                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body"  onclick="window.location.href='<?= base_url() ?>form_listing/sale_closure'">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate"> Total Fresh Business</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h5 class="fw-medium text-muted text-truncate fs-14 mb-0" style="text-align: end;">
                                                        <!-- <i class="ri-arrow-right-up-line fs-13 align-middle"></i> -->
                                                        Today
                                                    </h5>
                                                    <p class="fw-medium text-muted text-truncate mb-0"><?php echo date('F j, Y') . "\n"; ?></p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <!-- <a>Today's Fresh Business Amount-</a> -->
                                                    <h4 class="fs-22 fw-semibold ff-secondary">₹<span class="counter-value" data-target="<?= $today_fresh_bus->today_business ?>">

                                                            <?php if ($today_fresh_bus->today_business == '') {
                                                                echo "0";
                                                            } else {
                                                                echo $today_fresh_bus->today_business;
                                                            } ?>
                                                        </span> </h4>
                                                    <a href="#" class="">Total - ₹ <?php if ($total_fresh_bus->total_business == '') {
                                                                                        echo "0";
                                                                                    } else {
                                                                                        echo $total_fresh_bus->total_business;
                                                                                    } ?></a>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <!-- <span class="avatar-title bg-soft-success rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span> -->
                                                    <a href="#" class="">View Details →</a>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-4 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body" onclick="window.location.href='<?= base_url() ?>renewals/renewals'">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate"> RENEWAL BOOKING</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h5 class="fw-medium text-muted text-truncate fs-14 mb-0" style="text-align: end;">
                                                        <!-- <i class="ri-arrow-right-up-line fs-13 align-middle"></i> -->
                                                        Today
                                                    </h5>
                                                    <p class="fw-medium text-muted text-truncate mb-0"><?php echo date('F j, Y') . "\n"; ?></p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary">₹<span class="counter-value" data-target="559.25">0</span>k </h4>
                                                    <a href="#" class="">₹1,52,013</a>

                                                </div>
                                                <div class="flex-shrink-0">
                                                    <!-- <span class="avatar-title bg-soft-success rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span> -->
                                                    <a href="#" class="">View Details→</a>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-4 col-md-6">
                               
                                    <!-- card -->
                                    <div class="card card-animate">
                                        
                                        <div class="card-body" onclick="window.location.href='<?= base_url() ?>claims/claims'">
                                          
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p class="text-uppercase fw-medium text-muted text-truncate">Claims</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h5 class="fw-medium text-muted text-truncate fs-14 mb-0" style="text-align: end;">
                                                        <!-- <i class="ri-arrow-right-up-line fs-13 align-middle"></i> -->
                                                       <a>Today</a> 
                                                    </h5>
                                                    <p class="fw-medium text-muted text-truncate mb-0"><?php echo date('F j, Y') . "\n"; ?></p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>

                                                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value" data-target="<?= $today_claim->today_claims ?>">

                                                            <?php if ($today_claim->today_claims == '') {
                                                                echo "0";
                                                            } else {
                                                                echo $today_claim->today_claims;
                                                            } ?>
                                                        </span> </h4>
                                                    <a href="#" class="">Total -<?php if ($total_claim->total_no_claims == '') {
                                                                                    echo "0";
                                                                                } else {
                                                                                    echo $total_claim->total_no_claims;
                                                                                } ?></a>

                                                </div>
                                                <div class="flex-shrink-0">
                                                    <!-- <span class="avatar-title bg-soft-success rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span> -->
                                                    <a href="#" class="">View Details→</a>
                                                </div>
                                            </div>
                                            </a>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->


                            </div> <!-- end row-->




                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="card">

                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Revenue</h4>
                                         </div><!-- end card header -->

                                        <div class="card-header p-0 border-0 bg-soft-light">
                                            <div class="d-flex p-3">
                                                <?php foreach ($company as $val) { ?>
                                                    <div class="p-3 border flex-fill border-dashed border-start-0">
                                                        <p class="text-muted  mb-0"><?= $val['name'] ?></p>
                                                        <h5 class="mb-1"><span class="counter-value" data-target="7585"><?php
                                                                                                                        $id = $val['id'];
                                                                                                                        $this->db->select('count(company_name) as count');
                                                                                                                        $this->db->from('form');
                                                                                                                        $this->db->join('company', 'form.company_name = company.id', 'left');
                                                                                                                        // $this->db->where('form.updated_by_user_module', 'renewals');
                                                                                                                        $this->db->where('company.id', $id);
                                                                                                                        $query = $this->db->get();
                                                                                                                        $result = $query->row();
                                                                                                                        echo $result->count;
                                                                                                                        ?></span></h5>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <!--end col-->

                                            <!-- </div> -->

                                        </div><!-- end card header -->

                                        <div class="card-body">

                                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-4">
                                    <!-- card -->
                                    <div class="card card-height-100">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Renewal </h4>
                                            <div class="d-flex">
                                                <input type="button" class="form-control btn btn-soft-secondary btn-sm" name="all_renewal" id="all_renewal" onclick="datefilter('all');" value="ALL">
                                                <input type="button" class="form-control btn btn-soft-secondary btn-sm" name="one_month_renewal" id="one_month_renewal" onclick="datefilter('1M');" value="1M">
                                                <input type="button" class="form-control btn btn-soft-secondary btn-sm" name="six_month_renewal" id="six_month_renewal" onclick="datefilter('6M');" value="6M">
                                                <input type="button" class="form-control btn btn-soft-primary btn-sm" name="year_renewal" id="year_renewal" onclick="datefilter('1Y');" value="1Y">
                                            </div>
                                        </div><!-- end card header -->

                                        <div class="card-header scroll p-0 border-0 bg-soft-light">
                                            <!-- <div class="row scroll g-0 text-center"> -->
                                            <div class="d-flex p-3">
                                                <?php foreach ($company as $val) { ?>
                                                    <div class="p-3 border border-dashed border-start-0">
                                                        <p class="text-muted  mb-0"><?= $val['name'] ?></p>
                                                        <h5 class="mb-1 "><span class="counter-value" data-target="7585"><?php
                                                                                                                            $id = $val['id'];
                                                                                                                            $this->db->select('count(company_name) as count');
                                                                                                                            $this->db->from('form');
                                                                                                                            $this->db->join('company', 'form.company_name = company.id', 'left');
                                                                                                                            $this->db->where('form.updated_by_user_module', 'renewals');
                                                                                                                            $this->db->where('company.id', $id);
                                                                                                                            $query = $this->db->get();
                                                                                                                            $result = $query->row();
                                                                                                                            echo $result->count;
                                                                                                                            ?></span></h5>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <!-- card body -->
                                        
                                        <div class="card-body">
                                            <div class="filterdata">
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
                                                <div class=" mt-3 text-center">
                                                    <a href="<?= base_url() ?>renewals/renewals" class="btn btn-primary">View All</a>
                                                </div>

                                                <div class="d-none code-view">
                                                    <pre class="language-markup" style="height: 275px;" tabindex="0"><code class="language-markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>table</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>table table-nowrap<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                                            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>thead</span><span class="token punctuation">&gt;</span></span>
                                                <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>col<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>ID<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>col<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Customer<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>col<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Date<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>col<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Invoice<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>col<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Action<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
                                                <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
                                            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>thead</span><span class="token punctuation">&gt;</span></span>
                                            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tbody</span><span class="token punctuation">&gt;</span></span>
                                                <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>row<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>fw-semibold<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>#VZ2110<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>Bobby Davis<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>October 15, 2021<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>₹2,300<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>javascript:void(0);<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>link-success<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>View More <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ri-arrow-right-line align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
                                                <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>row<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>fw-semibold<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>#VZ2109<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>Christopher Neal<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>October 7, 2021<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>₹5,500<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>javascript:void(0);<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>link-success<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>View More <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ri-arrow-right-line align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
                                                <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>row<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>fw-semibold<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>#VZ2108<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>Monkey Karry<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>October 5, 2021<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>₹2,420<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>javascript:void(0);<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>link-success<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>View More <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ri-arrow-right-line align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
                                                <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>tr</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>th</span> <span class="token attr-name">scope</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>row<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>fw-semibold<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>#VZ2107<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>th</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>James White<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>October 2, 2021<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span>₹7,452<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                    <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>td</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>a</span> <span class="token attr-name">href</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>javascript:void(0);<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>link-success<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>View More <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ri-arrow-right-line align-middle<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>a</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>td</span><span class="token punctuation">&gt;</span></span>
                                                <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tr</span><span class="token punctuation">&gt;</span></span>
                                            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>tbody</span><span class="token punctuation">&gt;</span></span>
                                        <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>table</span><span class="token punctuation">&gt;</span></span></code></pre>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Claim Registered</h4>
                                            <div class="d-flex">
                                                <input type="button" class="form-control btn btn-soft-secondary btn-sm" name="all_renewal" id="all_renewal" onclick="claimregister('all');" value="ALL">
                                                <input type="button" class="form-control btn btn-soft-secondary btn-sm" name="one_month_renewal" id="one_month_renewal" onclick="claimregister('1M');" value="1M">
                                                <input type="button" class="form-control btn btn-soft-secondary btn-sm" name="six_month_renewal" id="six_month_renewal" onclick="claimregister('6M');" value="6M">
                                                <input type="button" class="form-control btn btn-soft-primary btn-sm" name="year_renewal" id="year_renewal" onclick="claimregister('1Y');" value="1Y">
                                            </div>
                                        </div><!-- end card header -->

                                        <div class="card-body ">
                                            <div class="claimregister">
                                                <!-- <div id="maincontainer" style="height: 268px;"></div> -->
                                                <canvas id="pieChart"></canvas>
                                            </div>
                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
                                </div>

                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Claim Paid</h4>
                                            <div class="d-flex">
                                                <input type="button" class="form-control btn btn-soft-secondary btn-sm" name="all_renewal" id="all_renewal" onclick="claimpaid('all');" value="ALL">
                                                <input type="button" class="form-control btn btn-soft-secondary btn-sm" name="one_month_renewal" id="one_month_renewal" onclick="claimpaid('1M');" value="1M">
                                                <input type="button" class="form-control btn btn-soft-secondary btn-sm" name="six_month_renewal" id="six_month_renewal" onclick="claimpaid('6M');" value="6M">
                                                <input type="button" class="form-control btn btn-soft-primary btn-sm" name="year_renewal" id="year_renewal" onclick="claimpaid('1Y');" value="1Y">
                                            </div>
                                        </div><!-- end card header -->

                                        <div class="card-body" >
                                            <div class="claimchange">
                                            <canvas id="pieChart_claim"></canvas>
                                            </div>
                                            
                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
                                </div>

                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header border-0 align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Renewal NOP</h4>

                                        </div><!-- end card header -->
                                        <div class="card-body">
                                        <canvas id="myhorizontalChart" style="width:100%;max-width:600px"></canvas>
                                        </div>
                                    </div><!-- end card -->
                                </div>
                            </div>





                        </div> <!-- end .h-100-->

                    </div> <!-- end col -->

                    <div class="col-auto layout-rightside-col">
                        <div class="overlay"></div>
                        <div class="layout-rightside">
                            <div class="card h-100 rounded-0">
                                <div class="card-body p-0">
                                    <div class="p-3">
                                        <h6 class="text-muted mb-0 text-uppercase fw-semibold">Recent Activity</h6>
                                    </div>
                                    <div data-simplebar style="max-height: 410px;" class="p-3 pt-0">
                                        <div class="acitivity-timeline acitivity-main">
                                            <div class="acitivity-item d-flex">
                                                <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                    <div class="avatar-title bg-soft-success text-success rounded-circle">
                                                        <i class="ri-shopping-cart-2-line"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1 lh-base">Purchase by James Price</h6>
                                                    <p class="text-muted mb-1">Product noise evolve smartwatch </p>
                                                    <small class="mb-0 text-muted">02:14 PM Today</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                    <div class="avatar-title bg-soft-danger text-danger rounded-circle">
                                                        <i class="ri-stack-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1 lh-base">Added new <span class="fw-semibold">style collection</span></h6>
                                                    <p class="text-muted mb-1">By Nesta Technologies</p>
                                                    <div class="d-inline-flex gap-2 border border-dashed p-2 mb-2">
                                                        <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                            <img src="assets/images/products/img-8.png" alt="" class="img-fluid d-block" />
                                                        </a>
                                                        <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                            <img src="assets/images/products/img-2.png" alt="" class="img-fluid d-block" />
                                                        </a>
                                                        <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                            <img src="assets/images/products/img-10.png" alt="" class="img-fluid d-block" />
                                                        </a>
                                                    </div>
                                                    <p class="mb-0 text-muted"><small>9:47 PM Yesterday</small></p>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1 lh-base">Natasha Carey have liked the products</h6>
                                                    <p class="text-muted mb-1">Allow users to like products in your WooCommerce store.</p>
                                                    <small class="mb-0 text-muted">25 Dec, 2021</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs acitivity-avatar">
                                                        <div class="avatar-title rounded-circle bg-secondary">
                                                            <i class="mdi mdi-sale fs-14"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1 lh-base">Today offers by <a href="apps-ecommerce-seller-details.html" class="link-secondary">Digitech Galaxy</a></h6>
                                                    <p class="text-muted mb-2">Offer is valid on orders of Rs.500 Or above for selected products only.</p>
                                                    <small class="mb-0 text-muted">12 Dec, 2021</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs acitivity-avatar">
                                                        <div class="avatar-title rounded-circle bg-soft-danger text-danger">
                                                            <i class="ri-bookmark-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1 lh-base">Favoried Product</h6>
                                                    <p class="text-muted mb-2">Esther James have favorited product.</p>
                                                    <small class="mb-0 text-muted">25 Nov, 2021</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs acitivity-avatar">
                                                        <div class="avatar-title rounded-circle bg-secondary">
                                                            <i class="mdi mdi-sale fs-14"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1 lh-base">Flash sale starting <span class="text-primary">Tomorrow.</span></h6>
                                                    <p class="text-muted mb-0">Flash sale by <a href="javascript:void(0);" class="link-secondary fw-medium">Zoetic Fashion</a></p>
                                                    <small class="mb-0 text-muted">22 Oct, 2021</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs acitivity-avatar">
                                                        <div class="avatar-title rounded-circle bg-soft-info text-info">
                                                            <i class="ri-line-chart-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1 lh-base">Monthly sales report</h6>
                                                    <p class="text-muted mb-2"><span class="text-danger">2 days left</span> notification to submit the monthly sales report. <a href="javascript:void(0);" class="link-warning text-decoration-underline">Reports Builder</a></p>
                                                    <small class="mb-0 text-muted">15 Oct</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1 lh-base">Frank Hook Commented</h6>
                                                    <p class="text-muted mb-2 fst-italic">" A product that has reviews is more likable to be sold than a product. "</p>
                                                    <small class="mb-0 text-muted">26 Aug, 2021</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-3 mt-2">
                                        <h6 class="text-muted mb-3 text-uppercase fw-semibold">Top 10 Categories
                                        </h6>

                                        <ol class="ps-3 text-muted">
                                            <li class="py-1">
                                                <a href="#" class="text-muted">Mobile & Accessories <span class="float-end">(10,294)</span></a>
                                            </li>
                                            <li class="py-1">
                                                <a href="#" class="text-muted">Desktop <span class="float-end">(6,256)</span></a>
                                            </li>
                                            <li class="py-1">
                                                <a href="#" class="text-muted">Electronics <span class="float-end">(3,479)</span></a>
                                            </li>
                                            <li class="py-1">
                                                <a href="#" class="text-muted">Home & Furniture <span class="float-end">(2,275)</span></a>
                                            </li>
                                            <li class="py-1">
                                                <a href="#" class="text-muted">Grocery <span class="float-end">(1,950)</span></a>
                                            </li>
                                            <li class="py-1">
                                                <a href="#" class="text-muted">Fashion <span class="float-end">(1,582)</span></a>
                                            </li>
                                            <li class="py-1">
                                                <a href="#" class="text-muted">Appliances <span class="float-end">(1,037)</span></a>
                                            </li>
                                            <li class="py-1">
                                                <a href="#" class="text-muted">Beauty, Toys & More <span class="float-end">(924)</span></a>
                                            </li>
                                            <li class="py-1">
                                                <a href="#" class="text-muted">Food & Drinks <span class="float-end">(701)</span></a>
                                            </li>
                                            <li class="py-1">
                                                <a href="#" class="text-muted">Toys & Games <span class="float-end">(239)</span></a>
                                            </li>
                                        </ol>
                                        <div class="mt-3 text-center">
                                            <a href="javascript:void(0);" class="text-muted text-decoration-underline">View all Categories</a>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <h6 class="text-muted mb-3 text-uppercase fw-semibold">Products Reviews</h6>
                                        <!-- Swiper -->
                                        <div class="swiper vertical-swiper" style="height: 250px;">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="card border border-dashed shadow-none">
                                                        <div class="card-body">
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 avatar-sm">
                                                                    <div class="avatar-title bg-light rounded">
                                                                        <img src="assets/images/companies/img-1.png" alt="" height="30">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <div>
                                                                        <p class="text-muted mb-1 fst-italic text-truncate-two-lines"> " Great product and looks great, lots of features. "</p>
                                                                        <div class="fs-11 align-middle text-warning">
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-end mb-0 text-muted">
                                                                        - by <cite title="Source Title">Force Medicines</cite>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="card border border-dashed shadow-none">
                                                        <div class="card-body">
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0">
                                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm rounded">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <div>
                                                                        <p class="text-muted mb-1 fst-italic text-truncate-two-lines"> " Amazing template, very easy to understand and manipulate. "</p>
                                                                        <div class="fs-11 align-middle text-warning">
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-half-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-end mb-0 text-muted">
                                                                        - by <cite title="Source Title">Henry Baird</cite>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="card border border-dashed shadow-none">
                                                        <div class="card-body">
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0 avatar-sm">
                                                                    <div class="avatar-title bg-light rounded">
                                                                        <img src="assets/images/companies/img-8.png" alt="" height="30">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <div>
                                                                        <p class="text-muted mb-1 fst-italic text-truncate-two-lines"> "Very beautiful product and Very helpful customer service."</p>
                                                                        <div class="fs-11 align-middle text-warning">
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-line"></i>
                                                                            <i class="ri-star-line"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-end mb-0 text-muted">
                                                                        - by <cite title="Source Title">Zoetic Fashion</cite>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="card border border-dashed shadow-none">
                                                        <div class="card-body">
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0">
                                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm rounded">
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <div>
                                                                        <p class="text-muted mb-1 fst-italic text-truncate-two-lines">" The product is very beautiful. I like it. "</p>
                                                                        <div class="fs-11 align-middle text-warning">
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-fill"></i>
                                                                            <i class="ri-star-half-fill"></i>
                                                                            <i class="ri-star-line"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-end mb-0 text-muted">
                                                                        - by <cite title="Source Title">Nancy Martino</cite>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-3">
                                        <h6 class="text-muted mb-3 text-uppercase fw-semibold">Customer Reviews</h6>
                                        <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <div class="fs-16 align-middle text-warning">
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-fill"></i>
                                                        <i class="ri-star-half-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0">4.5 out of 5</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <div class="text-muted">Total <span class="fw-medium">5.50k</span> reviews</div>
                                        </div>

                                        <div class="mt-3">
                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-1">
                                                        <h6 class="mb-0">5 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-1">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-1">
                                                        <h6 class="mb-0 text-muted">2758</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-1">
                                                        <h6 class="mb-0">4 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-1">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 29.32%" aria-valuenow="29.32" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-1">
                                                        <h6 class="mb-0 text-muted">1063</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-1">
                                                        <h6 class="mb-0">3 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-1">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-1">
                                                        <h6 class="mb-0 text-muted">997</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-1">
                                                        <h6 class="mb-0">2 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-1">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="p-1">
                                                        <h6 class="mb-0 text-muted">227</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <div class="row align-items-center g-2">
                                                <div class="col-auto">
                                                    <div class="p-1">
                                                        <h6 class="mb-0">1 star</h6>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="p-1">
                                                        <div class="progress animated-progress progress-sm">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="p-1">
                                                        <h6 class="mb-0 text-muted">408</h6>
                                                    </div>
                                                </div>
                                            </div><!-- end row -->
                                        </div>
                                    </div>

                                    <div class="card sidebar-alert bg-light border-0 text-center mx-4 mb-0 mt-3">
                                        <div class="card-body">
                                            <img src="assets/images/giftbox.png" alt="">
                                            <div class="mt-4">
                                                <h5>Invite New Seller</h5>
                                                <p class="text-muted lh-base">Refer a new seller to us and earn ₹100 per refer.</p>
                                                <button type="button" class="btn btn-primary btn-label rounded-pill"><i class="ri-mail-fill label-icon align-middle rounded-pill fs-16 me-2"></i> Invite Now</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end .rightbar-->

                    </div> <!-- end col -->
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include "footer.php"; ?>
        <script>
            function datefilter(id) {
                $.ajax({
                    url: "<?= base_url(); ?>dashboard/renewal_filter",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('.filterdata').html(response);
                    }
                })
            }
        </script>
        <script>
            function claimregister(id){
                $.ajax({
                    url: "<?= base_url(); ?>dashboard/claim_register_filter",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('.claimregister').html(response);
                    }
                })

            }
        </script>
         <script>
            function claimpaid(id) {
                // alert(id);
                $.ajax({
                    url: "<?= base_url(); ?>dashboard/claim_paid_filter",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('.claimchange').html(response);
                    }
                })
            }
        </script>

        <script>
            var xValues = [<?php foreach ($etc as $val) {
                                echo $val['year'] . ',';
                            } ?>];
            var yValues = [<?php foreach ($total_revenue as $val) {
                                echo $val['total_revenue'] . ',';
                            } ?>];
            var barColors = ["rgb(240, 101, 72)", " rgb(10, 179, 156)", "rgb(64, 81, 137)", "rgb(247, 184, 75)", "rgb(41, 156, 219)"];

            new Chart("myChart", {
                type: "horizontalBar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                  
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Revenue"
                    },
                    scales: {
                        xAxes: [{
                            
                            ticks: {
                                min: <?= $min_value - '50000'; ?>,
                                max: <?= $max_value + '100000'; ?>
                            }
                        }]
                    }
                }
            });
        </script>
        <script>
            var xValues = [<?php foreach ($company as $val) {
                                echo "'" . $val['name'] . "',";
                            } ?>];
            var yValues = [<?php foreach ($company as $val) {
                                $id =  $val['name'];
                                $this->db->select('sum(total_bill_amt) as total_claim_registered');
                                $this->db->where('flag', '0');
                                $this->db->where('company_name', $id);
                                $this->db->from('claim');
                                $row1 = $this->db->get()->result_array();
                                echo $row1[0]['total_claim_registered'].',';
                            } ?>];

            var barColors = ["rgb(240, 101, 72)", " rgb(10, 179, 156)", "rgb(64, 81, 137)", "rgb(247, 184, 75)", "rgb(41, 156, 219)"];
            new Chart("pieChart", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    cutoutPercentage: 60,
                    responsive: true,
                    title: {
                        display: true,
                        // text: "World Wide Wine Production 2018"
                    }
                }
            });
        </script>
        <script>
            var xValues = [<?php foreach ($company as $val) {
                                echo "'" . $val['name'] . "',";
                            } ?>];
            var yValues = [<?php foreach ($company as $val) {
                                $id =  $val['name'];
                                $this->db->select('sum(total_approve_amt) as total_claim_registered');
                                $this->db->where('flag', '0');
                                $this->db->where('company_name', $id);
                                $this->db->from('claim');
                                $row1 = $this->db->get()->result_array();
                                echo $row1[0]['total_claim_registered'].',';
                            } ?>];

            var barColors = ["rgb(240, 101, 72)", " rgb(10, 179, 156)", "rgb(64, 81, 137)", "rgb(247, 184, 75)", "rgb(41, 156, 219)"];
            new Chart("pieChart_claim", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    cutoutPercentage: 60,
                    responsive: true,
                    title: {
                        display: true,
                        // text: "World Wide Wine Production 2018"
                    }
                }
            });
        </script>
           <script>
            var xValues = [<?php foreach ($etc as $val) {
                                echo $val['year'] . ',';
                            } ?>];
            var yValues = [<?php foreach ($total_policy as $val) {
                                echo $val['total_policy'] . ',';
                            } ?>];
            var barColors = ["rgb(240, 101, 72)", " rgb(10, 179, 156)", "rgb(64, 81, 137)", "rgb(247, 184, 75)", "rgb(41, 156, 219)"];

            new Chart("myhorizontalChart", {
                type: "horizontalBar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                   
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Renewal"
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                min:0,
                                max:<?= $max_val + '10'; ?>
                            }
                        }]
                    }
                }
            });
        </script>