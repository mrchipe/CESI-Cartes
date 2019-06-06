<form action="" method="post">
    <div class="form-group">
        <label for="number_player">Nombre de joueurs</label>
        <input class="form-control <?= isset($_SESSION['flash']['number_player']) ? 'is-invalid' : '' ?>" type="text"
               name="number_player" id="number_player" required>
        <div class="valid-feedback">
            La valeur n'est pas valide.
        </div>
    </div>

    <div class="mb-3">
        <div>Nombre de cartes</div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="cartNumber1" name="cartNumber" class="custom-control-input" value="32">
            <label class="custom-control-label" for="cartNumber1">32</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="cartNumber2" name="cartNumber" class="custom-control-input" value="52">
            <label class="custom-control-label" for="cartNumber2">52</label>
        </div>
    </div>

    <div>
        <input type="hidden" name="choose_number_player">
        <button type="submit" class="btn btn-secondary">Validé</button>
    </div>
</form>
