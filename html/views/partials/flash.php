<?php
/**
 * Missatges temporals mostrats una sola vegada despres d'una accio.
 *
 * @var array $flashMessages Llista de missatges amb type i message.
 */
if (empty($flashMessages ?? [])) {
    return;
}
?>
<section class="flash-area" aria-live="polite">
    <?php foreach ($flashMessages as $flash): ?>
        <div class="alert alert-<?= h($flash['type'] ?? 'info') ?>"><?= h($flash['message'] ?? '') ?></div>
    <?php endforeach; ?>
</section>
