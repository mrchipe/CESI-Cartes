<div class="row justify-content-md-center">
    <?php foreach (params('players') as $index => $player): ?>

        <?php $card = params('cards')[$index]; ?>

        <div class="col-md-auto mb-5">
            <h4 class="text-center">
                <span class="badge badge-success"
                      <?php if (params('winner') != $index): ?>style="opacity: 0"<?php endif; ?>>Gagné</span>
                <div><?= $player['pseudo'] ?></div>
            </h4>
            <div class="card mb-2">
                <?php if (isset($player['lose']) && $player['lose'] == true): ?>
                    <div class="card-body text-center text-danger">
                        <h4 class="card-title">Perdu</h4>
                    </div>
                <?php else: ?>
                    <div class="card-body text-center <?= $card['color'] === 'red' ? 'text-danger' : 'text-dark' ?>">
                        <h4 class="card-title"><?= $card['value'] ?></h4>
                        <p class="card-text"><?= $card['figure'] ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php endforeach; ?>
</div>

<div class="text-center">
    <form action="index.php" method="get">
        <button type="submit" class="btn btn-outline-secondary">Jouer</button>
    </form>
</div>

<div>
    <pre><?php var_dump(params('players')) ?></pre>
</div>
