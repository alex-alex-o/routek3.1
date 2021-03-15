<div id = "variant-list-<?php echo $questionID; ?>" class="my-4 variant-list">
    <p class="mb-0">Варианты ответов</p>
    <?php $j = 1; ?>
    <?php foreach($variants as $variant): ?>
        <div class="row mb-3">
            <div class="col-lg-4">
                <h6 class="font-weight-bold">
                    <?php echo $j; ?>
                    <!-- <input type = "radio" name = "variant" id = "variant-<?php echo $variant["id"]; ?>" /> -->
                    <span id = "variant-text-<?php echo $variant["id"];?>"><?php echo $variant["value"]; ?></span>
                    <a href = "" id = "edit-variant-button-<?php echo $variant["id"]; ?>" class ="edit-variant-button">
                        <i class="fas fa-edit" data-id = "<?php echo $variant["id"]; ?>"></i>
                    </a>                                        
                </h6>
            </div>
            <div class="col-lg-8">
                <?php foreach($materials as $material): ?>
                    <input type = "checkbox" name = "material" id = "material-<?php echo $material["id"]; ?>" />
                    <label for = "material-<?php echo $variant["id"];?>"><?php echo $material["name"]; ?> </label>
                <?php endforeach; ?>
            </div>       
        </div>
        <?php $j ++; ?>
    <?php endforeach; ?>
</div>
