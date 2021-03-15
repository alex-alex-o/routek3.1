<input type="hidden" class = "form-control" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />

<div class="container-fluid">
    <?php if (isset($questions) && count($questions) > 0): ?>
        <?php $i = 1; ?>
        <?php foreach($questions as $question): ?>
            <div class="row px-3 py-1 bg-white mb-3 rounded-lg hoverable justify-content-between">

                <div class="my-2">
                    <p class="mb-0 ">Вопрос <?php echo $i; ?></p>
                    <h6 class="font-weight-bold"><span id = "question-text-<?php echo $question["id"]; ?>"><?php echo $question["text"]; ?></span>
                        <a href = "" id = "edit-question-button-<?php echo $question["id"]; ?>" class ="edit-question-button">
                            <i class="fas fa-edit" data-id = "<?php echo $question["id"]; ?>"></i>
                        </a>
                    </h6>
                    
                    <div id = "variant-list-<?php echo $question["id"]; ?>" class="my-4 variant-list">
                        <p class="mb-0">Варианты ответов</p>
                        <?php $j = 1; ?>
                        <?php foreach($question["variants"] as $variant): ?>
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
                    
                </div>
                
                <div class="my-4">
                    <a href = "" id = "add-variant-button-<?php echo $question["id"]; ?>" data-id = "<?php echo $question["id"]; ?>" class = "btn btn-primary add-variant-button">Добавить вариант</a>
                </div>
               
            </div>
            <?php $i ++; ?>
        <?php endforeach; ?>
    <?php endif; ?>

</div>

<script>
   
    function addVariant(questionID, text) {
        if (questionID == 0) {
            return;
        }

        document.getElementById("variant-list-" + questionID).innerHTML = "";
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("variant-list-" + questionID).innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("POST", "/admin/helper/add_variant");
        xmlhttp.setRequestHeader("Content-Type", "application/json");
        xmlhttp.send(
            JSON.stringify(
                {
                    "questionID" : questionID,
                    "variant"    : text
                }
            )
        );
    }

    window.addEventListener("load", () => {
        
        document.querySelectorAll(".edit-question-button")
            .forEach(item => item.addEventListener('click', e => {
                e.preventDefault();
                let id = e.target.getAttribute('data-id');

                let question = document.getElementById("question-text-" + id).innerHTML;
                result = prompt("Текст вопроса", [question]);
                document.getElementById("question-text-" + id).innerHTML = result;

                console.log(this);
            }));
            
            
        document.querySelectorAll(".add-variant-button")
            .forEach(item => item.addEventListener('click', e => {
                e.preventDefault();
                let id = e.target.getAttribute('data-id');
                variantText = prompt("Текст вопроса", "");
                
                addVariant(id, variantText);
                
                //question = document.getElementById("question-text-" + id).innerHTML;
                
                
                //document.getElementById("question-text-" + id).innerHTML = result;
            }));
            
        document.querySelectorAll(".edit-variant-button")
            .forEach(item => item.addEventListener('click', e => {
                e.preventDefault();
                let id = e.target.getAttribute('data-id');

                let variant = document.getElementById("variant-text-" + id).innerHTML;
                result = prompt("Вариант ответа", [variant]);
                document.getElementById("variant-text-" + id).innerHTML = result;
            }));          
    });
</script>