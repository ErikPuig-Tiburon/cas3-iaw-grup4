<section class="page-heading">
    <div>
        <h1>Panell professorat</h1>
        <p>Resum de material, assignacions i incidencies obertes.</p>
    </div>
    <a class="btn btn-primary" href="<?= h(url('professorat/material_create.php')) ?>">Nou material</a>
</section>

<section class="grid stats">
    <article class="card stat-card">
        <strong><?= (int) $stats['alumnes'] ?></strong>
        <span>Alumnes registrats</span>
    </article>
    <article class="card stat-card">
        <strong><?= (int) $stats['material'] ?></strong>
        <span>Elements de material</span>
    </article>
    <article class="card stat-card">
        <strong><?= (int) $stats['assignacions'] ?></strong>
        <span>Assignacions actives</span>
    </article>
    <article class="card stat-card">
        <strong><?= (int) $stats['incidencies'] ?></strong>
        <span>Incidencies obertes</span>
    </article>
</section>

<section class="grid two" style="margin-top: 1rem;">
    <article class="panel">
        <div class="card">
            <h2 class="section-title">Material per tipus</h2>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Tipus</th>
                        <th>Model</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($materialByType as $row): ?>
                    <tr>
                        <td><?= h($row['tipus']) ?></td>
                        <td><?= h($row['model']) ?></td>
                        <td><?= (int) $row['total'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($materialByType)): ?>
                    <tr><td colspan="3">No hi ha material registrat.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </article>

    <article class="panel">
        <div class="card">
            <h2 class="section-title">Incidencies recents</h2>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Material</th>
                        <th>Alumne</th>
                        <th>Estat</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($recentIncidents as $incident): ?>
                    <tr>
                        <td>
                            <a href="<?= h(url('professorat/incidencies.php')) ?>"><?= h($incident['material']) ?></a>
                            <div class="muted"><?= h($incident['dataOberta']) ?></div>
                        </td>
                        <td><?= display_value($incident['alumne']) ?></td>
                        <td><span class="status-badge <?= h(status_class($incident['estat'])) ?>"><?= h($incident['estat'] ?? 'Oberta') ?></span></td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($recentIncidents)): ?>
                    <tr><td colspan="3">No hi ha incidencies obertes.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </article>
</section>

<section class="card" style="margin-top: 1rem;">
    <h2 class="section-title">Accessos rapids</h2>
    <div class="actions">
        <a class="btn btn-secondary" href="<?= h(url('professorat/dispositius_aula.php')) ?>">Dispositius per aula</a>
        <a class="btn btn-secondary" href="<?= h(url('professorat/assignacions.php')) ?>">Assignacions</a>
        <a class="btn btn-secondary" href="<?= h(url('professorat/alumnes.php')) ?>">Gestio alumnes</a>
        <a class="btn btn-secondary" href="<?= h(url('professorat/incidencies.php')) ?>">Incidencies</a>
        <a class="btn btn-secondary" href="<?= h(url('professorat/usuaris.php')) ?>">Usuaris</a>
    </div>
</section>
