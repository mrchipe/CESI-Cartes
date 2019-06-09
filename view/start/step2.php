<form action="index.php" method="post">
    <?php for ($i = 1; $i <= params('number_player'); $i++): ?>
        <div class="form-group">
            <label for="number_player">Pseudo joueur <?= $i ?></label>
            <input class="form-control" type="text" name="pseudo_player_<?= $i ?>" id="number_player">
        </div>
    <?php endfor; ?>

    <?php if (params('number_player') > 1): ?>
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="add_computer" name="add_computer">
            <label class="custom-control-label" for="add_computer">Ajouter l'ordinateur comme joueur</label>
        </div>
    <?php endif; ?>

    <input type="hidden" name="step" value="2">
    <input type="hidden" name="cart_number" value="<?= params('cart_number') ?>">
    <button type="submit" class="btn btn-secondary">Valider</button>
</form>
