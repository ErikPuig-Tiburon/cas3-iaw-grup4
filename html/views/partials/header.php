<?php
/** @var string $pageTitle */
/** @var array|null $currentUser */
/** @var array $flashMessages */
$documentTitle = $pageTitle ? $pageTitle . ' | ' . APP_NAME : APP_NAME;
$authBodyClass = $currentUser ? 'app-root--session' : 'app-root--public';
$cssVersion = @filemtime(__DIR__ . '/../../assets/css/app.css') ?: '1';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($documentTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Syne:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= h(asset_url('css/app.css') . '?v=' . $cssVersion) ?>">
</head>
<body class="app-root <?= h($authBodyClass) ?>">
<div class="sky-layer" aria-hidden="true">
    <div class="orb orb--a"></div>
    <div class="orb orb--b"></div>
    <div class="orb orb--c"></div>
    <div class="grid-fade"></div>
</div>

<?php if ($currentUser): ?>
<header class="hud-bar">
    <div class="hud-bar__inner">
        <div class="hud-brand">
            <span class="hud-brand__eyebrow">Sessió activa</span>
            <p class="hud-context"><?= h(APP_NAME) ?></p>
        </div>
        <div class="hud-account">
            <span class="hud-avatar" aria-hidden="true"><?= h(strtoupper(substr((string) ($currentUser['nom'] ?? $currentUser['correu'] ?? '?'), 0, 1))) ?></span>
            <div class="hud-meta">
                <span class="hud-name"><?= h($currentUser['nom'] ?? $currentUser['correu']) ?></span>
                <span class="hud-role"><?= h(role_label($currentUser['rol'] ?? null)) ?></span>
            </div>
            <form method="post" action="<?= h(url('logout.php')) ?>" class="hud-logout">
                <?= csrf_field() ?>
                <button type="submit" class="hud-logout-btn">Tancar sessió</button>
            </form>
        </div>
    </div>
</header>
<?php else: ?>
<header class="public-bar">
    <a class="public-bar__brand" href="<?= h(url('index.php')) ?>">
        <span class="public-bar__logo"><img src="<?= h(asset_url('img/montsia-removebg-preview.png')) ?>" alt="" width="40" height="40"></span>
        <span class="public-bar__text">
            <span class="public-bar__title">Institut Montsia</span>
            <span class="public-bar__tag">CAS3 — accés</span>
        </span>
    </a>
</header>
<?php endif; ?>
