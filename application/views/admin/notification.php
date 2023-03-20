<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center">
                    <a href="<?= base_url() ?>notifications/list" class="btn btn-soft-primary waves-effect waves-light">View
                        All <i class="ri-mail-check-line align-middle"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class=" text-center">
                    <button type="button" class="btn btn-soft-primary waves-effect waves-light" onclick="read_all_btn()">Read
                        All <i class="ri-mail-check-line align-middle"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
  if (!empty($notdata)) {
foreach ($notdata as $notification) { ?>
    <div class="text-reset notification-item d-block position-relative" style="margin-bottom: -29px;">
        <div class="d-flex" role="tooltip" tabindex="0" data-bs-toggle="tooltip" data-animation="zoom-out" data-bs-placement="right" title="<?=$notification['remark']?>">
            <div class="avatar-xs me-3">
                <?php if ($notification['read_status'] == 1) { ?>
                    <span class="avatar-title bg-soft-info text-info rounded-circle fs-16">

                        <i class="bx bx-badge-check"></i>
                    </span>
                <?php } else { ?>
                    <span class="avatar-title bg-soft-danger text-danger rounded-circle fs-16">
                        <i class='bx bx-message-square-dots'></i>
                    </span>
                <?php } ?>

            </div>
            <div class="flex-1">
               <a href="<?=base_url()?>notifications/list" class="stretched-link">
                    <p style="font-size: 10px;"><?php echo $notification['msg']; ?></p>
                </a>
                <p class="fw-medium text-uppercase text-muted" style="font-size:8px;margin-top: -10px;">
                    <span><i class="mdi mdi-clock-outline"></i> <?php echo $time = $notification['created_at']; ?></span>
                </p>
            </div>

        </div>
    </div>
 <?php }
} else { ?>
    <div class="text-center mt-3">
        <p><?php echo "No Notification For Today"; ?></p>
    </div>

<?php
}
?>
