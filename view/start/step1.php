<form action="index.php" method="get">
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
            <input type="radio" id="cartNumber1" name="cart_number" class="custom-control-input" value="32">
            <label class="custom-control-label" for="cartNumber1">32</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="cartNumber2" name="cart_number" class="custom-control-input" value="52" checked>
            <label class="custom-control-label" for="cartNumber2">52</label>
        </div>
    </div>

    <input type="hidden" name="step" value="1">

    <div>
        <button type="submit" class="btn btn-secondary">Valider</button>
    </div>
</form>
