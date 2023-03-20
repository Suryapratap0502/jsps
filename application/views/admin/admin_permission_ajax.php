                                            
    <?php 
    $i=1;
    foreach($category->result() as $rows) {
        ?>

    <tr id="delete<?php echo $rows->subtree_id;?>">
        
        <td><a href="#" class="fw-medium"><?=$i?></a></td>
        <td id="<?= $rows->subtree_attr_name;?>">
            <?php echo $rows->subtree_attr_name;?>
            <input type="hidden" name="attribute_name[]" value="<?php echo $rows->subtree_id;?>">
        </td>
      
      	 <td>
            <div class="form-check form-check form-check-outline form-check-primary">
                <input class="form-check-input" name="can_view_<?=$rows->subtree_id?>" type="checkbox" id="read_<?=$rows->subtree_id?>" value="1" <?php if($this->rbac->haspermissionuserwise2($admin_id, $rows->subtree_id,"can_view")) { echo "checked"; }?>>
                <label class="form-check-label" for="cardtableCheck01"></label>
            </div>
        </td>
       
        <td>
            <div class="form-check form-check-outline form-check-primary">

                <input class="form-check-input" name="can_add_<?=$rows->subtree_id?>" type="checkbox" onclick="permission(<?=$rows->subtree_id?>)" value="1" id="write_<?=$rows->subtree_id?>"  <?php if($this->rbac->haspermissionuserwise2($admin_id, $rows->subtree_id,"can_add")) { echo "checked"; }?> >
                <label class="form-check-label" for="cardtableCheck01"></label>
            </div>
        </td>
     <!--   <td>
            <div class="form-check form-check-outline form-check-success">
                <input class="form-check-input"  name="can_edit_<?=$rows->subtree_id?>"type="checkbox" value="1" <?php if($this->rbac->haspermissionuserwise2($admin_id, $rows->subtree_id,"can_edit")) { echo "checked"; }?> >
                <label class="form-check-label" for="cardtableCheck01"></label>
            </div>
        </td>
        <td>
            <div class="form-check form-check-outline form-check-danger">
                <input class="form-check-input form-check-danger" name="can_delete_<?=$rows->subtree_id?>" type="checkbox" value="1" <?php if($this->rbac->haspermissionuserwise2($admin_id, $rows->subtree_id,"can_delete")) { echo "checked"; }?> >
                <label class="form-check-label" for="cardtableCheck01"></label>
            </div>
        </td> -->
       
        <td>
            <div class="form-check form-check form-check-outline form-check-primary">
                <input class="form-check-input" name="can_change_pass_<?=$rows->subtree_id?>" type="checkbox" value="1" <?php if($this->rbac->haspermissionuserwise2($admin_id, $rows->subtree_id,"can_change_pass")) { echo "checked"; }?>>
                <label class="form-check-label" for="cardtableCheck01"></label>
            </div>
        </td>
                  
    </tr>
 
    <?php  $i++; } ?>

<script>
  function permission(id) {
    if ($("#write_"+id).is(':checked')) {

      $("#read_"+id).attr("checked", "checked");
    }
  }
</script>