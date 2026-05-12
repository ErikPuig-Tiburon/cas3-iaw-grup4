<?php
/**
 * Vista del formulari public d'inici de sessio.
 *
 * Rep les dades preparades per login.php i mostra qualsevol error de validacio
 * sense executar logica d'autenticacio dins la plantilla.
 *
 * @var string $error Missatge d'error visible, buit si no n'hi ha cap.
 * @var string $correu Correu escrit previament per mantenir el formulari.
 */
?>
<section class="gate">
    <div class="gate__stage">
        <div class="gate__orbit">
            <span class="gate__ring gate__ring--outer"></span>
            <span class="gate__ring gate__ring--inner"></span>
            <div class="gate__core">
                <img src="<?= h(asset_url('img/montsia-removebg-preview.png')) ?>" width="88" height="88" alt="Institut Montsia">
            </div>
        </div>
        <h2 class="gate__headline">Un sol espai per al material</h2>
        <p class="gate__sub">Assignacions, aules i incidències amb lectura ràpida de l’estat.</p>
        <ul class="gate__tags">
            <li>Professorat</li>
            <li>Alumnat</li>
            <li>Actualitzat en temps real</li>
        </ul>
    </div>

    <div class="gate__access">
        <div class="glass-card">
            <div class="glass-card__header">
                <p class="glass-card__eyebrow">Inici de sessió</p>
                <h1 class="glass-card__title">Entra</h1>
                <p class="glass-card__hint">Usa el correu i la contrasenya de centre.</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-error"><?= h($error) ?></div>
            <?php endif; ?>

            <form method="post" action="<?= h(url('login.php')) ?>" class="glass-form">
                <?= csrf_field() ?>
                <label class="glass-field">
                    <span>Correu</span>
                    <input id="correu" name="correu" type="email" value="<?= h($correu ?? '') ?>" autocomplete="email" required placeholder="nom.cognoms@institutmontsia.org">
                </label>
                <label class="glass-field">
                    <span>Contrasenya</span>
                    <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="········">
                </label>
                <button class="btn btn-magic" type="submit">Continuar</button>
            </form>
        </div>
    </div>
</section>
