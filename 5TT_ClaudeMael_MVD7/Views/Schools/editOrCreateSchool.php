
<main>
        <div class="flex space-evenly wrap">
        <form method="post" action="">
            <fieldset>
                <legend>
                    
                        Ajouter une école
                    
                    </legend>
                <div class="mb-3">
                    <label for="Nom" class="form-label">Nom</label>
                    <input type="text" placeholder="Nom" class="form-control" id="nom" name="nom" required value="<?php if(isset($school)) :?><?=$school->$schoolNom ?><?php endif?>">
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" placeholder="Adresse" class="form-control" id="adresse" name="adresse" required value="<?php if(isset($school)) :?><?=$school->$schoolAdresse ?><?php endif?>" >
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" placeholder="Ville" class="form-control" id="ville" name="ville" required value="<?php if(isset($school)) :?><?=$school->$schoolVille ?><?php endif?>">
                </div>
                <div class="mb-3">
                    <label for="code_postal" class="form-label">Code postal</label>
                    <input type="text" placeholder="Code postal" class="form-control" id="code_postal" name="code_postal" required value="<?php if(isset($school)) :?><?=$school->$schoolCodePostal ?><?php endif?>">
                </div>
                <div class="mb-3">
                    <label for="numero_de_telephone" class="form-label">Numéro de téléphone</label>
                    <input type="tel" placeholder="Numéro de téléphone" class="form-control" id="numero_de_telephone" name="numero_de_telephone" required value="<?php if(isset($school)) :?><?=$school->$schoolNumero ?><?php endif?>">
                </div>


                <div>
                    <select name="options[]" id="options-select" multiple>
                        <?php foreach ($options as $option) : ?>
                            <option value="<?= $option->optionScolaireId ?>"
                                <?php if(isset($optionsActiveSchool)) : ?><?php foreach ($optionsActiveSchool as $optionSchool) :?>
                                <?php if($option->optionScolaireId === $optionSchool->optionScolaireId) : ?>selected<?php endif ?>
                            <?php endforeach ?><?php endif?>><?=$option->nom?></option>
                        <?php endforeach ?>
                </div>
                
                
                <div>
                    
                    <label for="image" class="form-label">Image</label>
                    <input type="text" placeholder="Image" class="form-control" id="image" name="image" required value="<?php if(isset($school)) :?><?=$school->$schoolImage ?><?php endif?>">
                </div>
                <div>
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
