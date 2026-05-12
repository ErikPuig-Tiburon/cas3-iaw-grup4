<?php
/**
 * Vista generica per mostrar errors HTTP dins el layout normal.
 *
 * @var int $status Codi d'estat HTTP.
 * @var string $title Titol curt de l'error.
 * @var string $message Explicacio visible per a l'usuari.
 */
?>
<section class="fault">
    <div class="fault__card">
        <p class="fault__code"><?= (int) $status ?></p>
        <h1 class="fault__title"><?= h($title) ?></h1>
        <p class="fault__msg"><?= h($message) ?></p>
        <a class="btn btn-magic" href="<?= h(url('index.php')) ?>">Tornar a l’inici</a>
    </div>
</section>
