<div id="scrollbar">
	<div class="container-fluid">

		<div id="two-column-menu">
		</div>
		<ul class="navbar-nav" id="navbar-nav">
			<li class="menu-title"><span data-key="t-menu">Menu</span></li>
			<li class="nav-item">
				<a href="<?= base_url() ?>Dashboard" class="nav-link menu-link">
					<i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
				</a>

			</li> <!-- end Dashboard Menu -->
			<?php if ($this->rbac->hasPrivilege('access_management', 'can_view')) { ?>
				<li class="nav-item">
					<a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
						<i class="ri-apps-2-line"></i> <span data-key="t-apps">Access Management</span>
					</a>
					<div class="collapse menu-dropdown" id="sidebarApps">
						<ul class="nav nav-sm flex-column">

							<?php if ($this->rbac->hasPrivilege('user', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>User" class="nav-link" data-key="t-calendar">User</a>
								</li>
							<?php } ?>
							
							

						</ul>
					</div>
				</li>
          <?php } ?>
          
          <?php if ($this->rbac->hasPrivilege('master', 'can_view')) { ?>
				<li class="nav-item">
					<a class="nav-link menu-link" href="#master" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
						<i class="ri-apps-2-line"></i> <span data-key="t-apps">Master</span>
					</a>
					<div class="collapse menu-dropdown" id="master">
						<ul class="nav nav-sm flex-column">
							
                          	<?php if ($this->rbac->hasPrivilege('manager', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>manager" class="nav-link" data-key="t-team_leader">Manager</a>
								</li>
							<?php } ?>
							<?php if ($this->rbac->hasPrivilege('team_leader', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>team_leader" class="nav-link" data-key="t-team_leader">Team Leader(TL)</a>
								</li>
							<?php } ?>
                          
                          	<?php if ($this->rbac->hasPrivilege('city', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>city" class="nav-link" data-key="t-city">City</a>
								</li>
							<?php } ?>
                          
                          	<?php if ($this->rbac->hasPrivilege('company', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>Company" class="nav-link" data-key="t-city">Company</a>
								</li>
							<?php } ?>
                          <?php if ($this->rbac->hasPrivilege('products', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>Products" class="nav-link" data-key="t-city">Products</a>
								</li>
							<?php } ?>
                          	<?php if ($this->rbac->hasPrivilege('upload_excel', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>UploadExcel" class="nav-link" data-key="t-city">Upload Excel</a>
								</li>
							<?php } ?>
							
							

						</ul>
					</div>
				</li>
          <?php } ?>
          
          
          	<?php if($this->rbac->hasPrivilege('sale_closure','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>form_listing/sale_closure">
                  <i class="ri-file-list-3-line"></i> <span data-key="t-layouts">Sale Closure</span>
                </a>
              </li> 
              <?php } ?>
          	<?php $sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role']; 
          if(empty($role)){ ?>
          <!-- module List -->
          <?php if($this->rbac->hasPrivilege('underwriter_verifier','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>underwriter/underwriter_verifier">
                  <i class="ri-mark-pen-line"></i> <span data-key="t-layouts">Underwriter/Verifier</span>
                </a>
              </li> 
              <?php } ?>
          	<?php if($this->rbac->hasPrivilege('operations','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>operation/operations">
                  <i class="ri-ball-pen-line"></i> <span data-key="t-layouts">Operation</span>
                </a>
              </li> 
              <?php } ?>
          
          	<?php if($this->rbac->hasPrivilege('services','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>services/services">
                  <i class="ri-service-line"></i> <span data-key="t-layouts">Services</span>
                </a>
              </li> 
              <?php } ?>
          	<?php if($this->rbac->hasPrivilege('claims','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>claims/claims">
                  <i class="ri-wallet-3-line"></i> <span data-key="t-layouts">Claims</span>
                </a>
              </li> 
              <?php } ?>
          
          	<?php if($this->rbac->hasPrivilege('renewals','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>renewals/renewals">
                  <i class="ri-refresh-line"></i> <span data-key="t-layouts">Renewals</span>
                </a>
              </li> 
              <?php } ?>
          	<?php if($this->rbac->hasPrivilege('griveance_customer_services','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>griveance_customer_services/griveance_customer_services">
                  <i class="ri-customer-service-2-line"></i> <span data-key="t-layouts">Grievance/Customer Services</span>
                </a>
              </li> 
              <?php } ?>
          
          	<?php if($this->rbac->hasPrivilege('after_renewal_sales_services','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>after_renewal_sales_services/after_renewal_sales_services">
                  <i class="ri-store-2-line"></i> <span data-key="t-layouts">After Renewal Sales Services</span>
                </a>
              </li> 
              <?php } ?>
           <?php if($this->rbac->hasPrivilege('notifications','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>notifications/list">
				<i class="ri-notification-3-line"></i> <span data-key="t-layouts">Notifications</span>
                </a>
              </li> 
              <?php } ?>
          		<?php } ?>
          	
          	<!--end module list -->
          
          	
          	
          
          
          	<?php if($this->rbac->hasPrivilege('disposition_master','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>disposition">
                  <i class="ri-mastercard-line"></i> <span data-key="t-layouts">Disposition Master</span>
                </a>
              </li> 
              <?php } ?>
          
              <?php if ($this->rbac->hasPrivilege('reprt', 'can_view')) { ?>
				<li class="nav-item">
					<a class="nav-link menu-link" href="#report" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
					<i class="ri-line-chart-line"></i> <span data-key="t-layouts">Reports</span>
					</a>
					<div class="collapse menu-dropdown" id="report">
						<ul class="nav nav-sm flex-column">
							
                          	<?php if ($this->rbac->hasPrivilege('fresh_operation', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>report/fresh_operation" class="nav-link" data-key="t-team_leader">Fresh Operation</a>
								</li>
							<?php } ?>
							<?php if ($this->rbac->hasPrivilege('service_report', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>report/service_report" class="nav-link" data-key="t-team_leader">Service</a>
								</li>
							<?php } ?>
                          
                <?php if ($this->rbac->hasPrivilege('claim_dump_report', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>report/claim_dump_report" class="nav-link" data-key="t-city">Claim Dump Report</a>
								</li>
							<?php } ?>
                          
                          	<?php if ($this->rbac->hasPrivilege('renewal_booked_report', 'can_view')) { ?>
								<li class="nav-item">
									<a href="<?= base_url() ?>report/renewal_booked_report" class="nav-link" data-key="t-city">Renewal Booked Report</a>
								</li>
							<?php } ?>
							
							

						</ul>
					</div>
				</li>
          <?php } ?>
          
          	<?php if ($this->rbac->hasPrivilege('contact_access', 'can_view')) { ?>
				<li class="nav-item">
					<a class="nav-link menu-link" href="<?= base_url() ?>ContactAccess">
						<i class="ri-key-2-line"></i> <span data-key="t-layouts">Contact Access</span>
					</a>
				</li>
			<?php } ?>
          
              <?php if($this->rbac->hasPrivilege('admin_permission','can_view')) { ?>               
              <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url()?>AdminPermission">
                  <i class="ri-key-2-line"></i> <span data-key="t-layouts">Admin Permission</span>
                </a>
              </li> 
              <?php } ?>
          
			
			

		</ul>
	</div>
	<!-- Sidebar -->
</div>
