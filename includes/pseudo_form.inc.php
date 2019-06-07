<form action="" method="post">
    <?php for ($i = 1; $i <= $_POST['number_player']; $i++): ?>
        <div class="form-group">
            <label for="number_player">Pseudo joueur <?= $i ?></label>
            <input class="form-control" type="text" name="pseudo_player_<?= $i ?>" id="number_player">
        </div>
    <?php endfor; ?>

    <?php if ($_POST['number_player'] > 1): ?>
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" id="player_pc" name="player_pc">
            <label class="custom-control-label" for="player_pc">Ajouter l'ordinateur comme joueur</label>
        </div>
    <?php endif; ?>

    <input type="hidden" name="choose_pseudo_player">
    <input type="hidden" name="cartNumber" value="<?= isset($_POST['cartNumber']) ? $_POST['cartNumber'] : 52 ?>">
    <button type="submit" class="btn btn-secondary">Valider</button>
</form>
