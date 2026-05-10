<?php
/** @var array $flashMessages */
if (empty($flashMessages ?? [])) {
    return;
}
?>
<section class="flash-area" aria-live="polite">
    <?php foreach ($flashMessages as $flash): ?>
        <div class="alert alert-<?= h($flash['type'] ?? 'info') ?>"><?= h($flash['message'] ?? '') ?></div>
    <?php endforeach; ?>
</section>
