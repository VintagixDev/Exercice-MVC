
<main>
        <div class="flex space-evenly wrap">
        <form method="post" action="">
            <fieldset>
                <legend>
                    
                        Ajouter une école
                    
                    </legend>
                <div class="mb-3">
                    <label for="Nom" class="form-label">Nom</label>
                    <input type="text" placeholder="Nom" class="form-control" id="nom" name="nom" required >
                </div>
                <div class="mb-3">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" placeholder="Adresse" class="form-control" id="adresse" name="adresse" required  >
                </div>
                <div class="mb-3">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" placeholder="Ville" class="form-control" id="ville" name="ville" required >
                </div>
                <div class="mb-3">
                    <label for="code_postal" class="form-label">Code postal</label>
                    <input type="text" placeholder="Code postal" class="form-control" id="code_postal" name="code_postal" required >
                </div>
                <div class="mb-3">
                    <label for="numero_de_telephone" class="form-label">Numéro de téléphone</label>
                    <input type="tel" placeholder="Numéro de téléphone" class="form-control" id="numero_de_telephone" name="numero_de_telephone" required>
                </div>
                <div>
                    <select name="options[]" id="options-select" multiple>
                        <?php foreach ($options as $option) : ?>
                            <option value="<?= $option->optionScolaireId ?>"><?=$option->nom?></option>
                        <?php endforeach ?>
                </div>
                
                
                <div>
                    
                    <label for="image" class="form-label">Image</label>
                    <input type="text" placeholder="Image" class="form-control" id="image" name="image" required>
                </div>
                <div>
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
