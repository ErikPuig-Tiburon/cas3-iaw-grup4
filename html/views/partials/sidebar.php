<?php
/** @var array|null $currentUser */
if (!$currentUser) {
    return;
}
$rol = $currentUser['rol'] ?? '';
?>
<?php if ($rol === ROLE_PROFESSOR): ?>
<aside class="rail rail--prof" aria-label="Navegació professorat">
    <div class="rail__intro">
        <a class="rail__home" href="<?= h(url('professorat/index.php')) ?>">
            <span class="rail__badge" aria-hidden="true">◇</span>
            <span class="rail__label">Panell</span>
        </a>
    </div>
    <nav class="rail-nav">
        <span class="rail-nav__title">Menú</span>
        <a class="rail-link <?= h(nav_active('professorat/index.php')) ?>" href="<?= h(url('professorat/index.php')) ?>"><span class="rail-link__glow"></span><span class="rail-link__t">Inici</span></a>
        <a class="rail-link <?= h(nav_active('professorat/dispositius_aula.php')) ?>" href="<?= h(url('professorat/dispositius_aula.php')) ?>"><span class="rail-link__glow"></span><span class="rail-link__t">Aula</span></a>
        <a class="rail-link <?= h(nav_active('professorat/assignacions.php')) ?>" href="<?= h(url('professorat/assignacions.php')) ?>"><span class="rail-link__glow"></span><span class="rail-link__t">Assignacions</span></a>
        <a class="rail-link <?= h(nav_active('professorat/alumnes.php')) ?>" href="<?= h(url('professorat/alumnes.php')) ?>"><span class="rail-link__glow"></span><span class="rail-link__t">Alumnes</span></a>
        <a class="rail-link <?= h(nav_active('professorat/material.php')) ?>" href="<?= h(url('professorat/material.php')) ?>"><span class="rail-link__glow"></span><span class="rail-link__t">Material</span></a>
        <a class="rail-link <?= h(nav_active('professorat/incidencies.php')) ?>" href="<?= h(url('professorat/incidencies.php')) ?>"><span class="rail-link__glow"></span><span class="rail-link__t">Incidències</span></a>
        <a class="rail-link <?= h(nav_active('professorat/usuaris.php')) ?>" href="<?= h(url('professorat/usuaris.php')) ?>"><span class="rail-link__glow"></span><span class="rail-link__t">Usuaris</span></a>
    </nav>
    <p class="rail__foot">Institut Montsia · material</p>
</aside>
<?php elseif ($rol === ROLE_STUDENT): ?>
<aside class="rail rail--alum" aria-label="Navegació alumnat">
    <div class="rail__intro">
        <a class="rail__home" href="<?= h(url('alumnat/index.php')) ?>">
            <span class="rail__badge" aria-hidden="true">◎</span>
            <span class="rail__label">El meu espai</span>
        </a>
    </div>
    <nav class="rail-nav">
        <span class="rail-nav__title">Alumnat</span>
        <a class="rail-link <?= h(nav_active('alumnat/index.php')) ?>" href="<?= h(url('alumnat/index.php')) ?>"><span class="rail-link__glow"></span><span class="rail-link__t">Dispositius</span></a>
    </nav>
    <p class="rail__foot">Institut Montsia · alumnat</p>
</aside>
<?php endif; ?>
