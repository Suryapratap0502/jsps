<?php  $short_name = $this->uri->segment(3); ?>
<link href="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Axepert Exhibits Pvt Ltd.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Axepert Exhibits Pvt Ltd.
                </div>
            </div>
        </div>
    </div>
</footer>
<style>
    #custom-sa-success {
        display: none;
    }
</style>
<div>
    <button type="button" class="btn btn-primary" id="custom-sa-success">Click me</button>
    <input type="hidden" id="module_short_name" value="<?=$short_name;?>">
</div>



<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<script src="<?= base_url() ?>assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="<?= base_url() ?>assets/js/pages/sweetalerts.init.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script>
    function showpopup(message,form_id) {
        Swal.fire({
            html: '<div class="mt-3"><h4>Reminder Alert !!..</h4><lord-icon src="https://cdn.lordicon.com/cnbtojmk.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><div class="mt-4 pt-2 fs-15">'+message+'</div></div>',
            showCancelButton: !0,
            showConfirmButton: !1,
            cancelButtonClass: "btn btn-primary w-xs mb-1",
            cancelButtonText: "Back",
            //closeOnCancel:updatepopup(form_id),
            buttonsStyling: !1,
            showCloseButton: !0,
            showCancelButton: true,
            }).then(function(from_id){
                $.ajax({
           method:'post',
           url: "<?= base_url('form/update_reminder_status'); ?>",
           data:{form_id:form_id},
           success: function(response) {
            var res = JSON.parse(response);
          
            if(res == '1') {
                
                alert('Notification is closed');
            }
            else{
                alert('checked again');
            }
            
           },
       })
            
  
        })
       
    }
</script>
<script>
    function makeTimer() {
        var module_short_name = $('#module_short_name').val();
        $.ajax({
           method:'post',
           url: "<?= base_url('form/fetch_call_reminder'); ?>",
           data:{module_short_name:module_short_name},
           success: function(response) {
            
            var res = JSON.parse(response);
            if(res.status == true) {
                
                showpopup(res.data,res.form_id);
            }
           },
       })
    }
    setInterval(function() {
        makeTimer();
    }, 5000);

  

</script>
<script>
    function updatepopup(val)
  {
    alert(val);
  }
</script>