<?php if(!empty($all_msg)){ foreach ($all_msg as $val){ ?>
<div class="col-xl-12 mt-4">
    <div class="card" style="box-shadow: 0 1px 3px rgb(56 65 74 / 47%);">
        <div class="card-header" style="border-top: 1px solid var(--vz-border-color);">
        <span class="float-end "><a href="<?=base_url()?>webupload/<?=$val['docs']?>" style="color:blue;" target="_blank">View Attachment</a></span>
            <h4 class="card-title mb-3"><i class="ri-user-3-fill align-middle me-1 text-muted"></i> <?php if($val['reply_from']=='User'){echo $val['emp_user_name'];} else {echo $val['emp_name'];}?></h4>
            <span class="float-end text-secondary"><?=$val['reply_date_time'];?></span>
            <p class="card-subtitle text-muted mb-0"><?php  echo  $val['reply_from'];?></p>

        </div>
        <div class="card-body" style="min-height: 250px;border-top: 1px solid #bcbcbc;">
            <p class="text-muted">
                <?=$val['msg'];?>
            </p>
            
        </div>
    </div>
</div>
<?php }} ?>