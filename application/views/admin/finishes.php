<input type="hidden" class = "form-control" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Финишная обработка
                </h2>
            </div>
            
            <div class="body">
                <?php foreach($finishes as $finish): ?>
                    <!-- <div class = "col"> -->
                        <h3><?php echo $finish["name"]; ?></h3>
                        <?php foreach($finish["items"] as $item): ?>
                            <?php $checked = (!$item["value"] ? "" : "checked='checked'"); ?>
                            <div class="demo-checkbox">
                                <input type="checkbox" class = "finishes chk-col-indigo" id ="finish.<?php echo $item["id"]; ?>" name="finishes[]"  value = "<?php echo $item["id"]; ?>" <?php echo $checked; ?>   />
                                <label for = "finish.<?php echo $item["id"]; ?>"><?php echo $item["name"]; ?></label>
                            </div>
                        <?php endforeach; ?>
                    <!-- </div> -->
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

<?php $company = $this->company_model->get_user_company($this->session->userdata('admin_id')); ?>

<script>
    function updateToken(name, hash) {
        $("input[name='" + name + "']").each(function() {
            $( "input[name='" + name + "']" ).val( hash );
        });
        
    }

    $("#finishes").addClass('active');
    
    $(document).ready(function () {
        $( ".finishes" ).on('change', function () {
            event.preventDefault();
            
            $.ajax({
                method: "POST",
                url: "<?php echo site_url() . 'admin/finishes/save_company_finish' ?>",
                data: {"company_id" : <?= $this->session->userdata("company_id"); ?>, "finish_id" : $(this).val(), "value" : $(this).is(":checked"), '<?php echo $this->security->get_csrf_token_name();?>' : $("input[name='<?php echo $this->security->get_csrf_token_name();?>'").val()}
            })
            .done(function( return_data ) {
                updateToken(return_data.csrfName, return_data.csrfHash);
            });        

        });
    });     
    
    $("#finishes").addClass('active');
    
</script>