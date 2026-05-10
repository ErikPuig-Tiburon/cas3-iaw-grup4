<section class="page-heading">
    <div>
        <h1>Els meus dispositius</h1>
        <p><?= h(student_full_name($alumne)) ?> · <?= h($alumne['grupClasse']) ?></p>
    </div>
</section>

<section class="panel">
    <div class="card">
        <h2 class="section-title">Material assignat</h2>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Material</th>
                    <th>Aula</th>
                    <th>Data inici</th>
                    <th>Data final</th>
                    <th>Estat</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($assignments as $assignment): ?>
                <tr>
                    <td>
                        <?= h($assignment['tipus'] . ' - ' . $assignment['model']) ?>
                        <div class="muted"><?= h(material_label($assignment)) ?></div>
                    </td>
                    <td><?= h($assignment['ubicacio']) ?></td>
                    <td><?= h($assignment['dataInici']) ?></td>
                    <td><?= display_date($assignment['dataFinal']) ?></td>
                    <td>
                        <?php if (!empty($assignment['estatIncidencia'])): ?>
                            <span class="status-badge <?= h(status_class($assignment['estatIncidencia'])) ?>"><?= h($assignment['estatIncidencia']) ?></span>
                        <?php elseif (assignment_is_active($assignment)): ?>
                            <span class="status-badge status-ok">Actiu</span>
                        <?php else: ?>
                            <span class="status-badge status-warning">Retornat</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($assignments)): ?>
                <tr><td colspan="5">No tens dispositius assignats.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<section class="panel" style="margin-top: 1rem;">
    <div class="card">
        <h2 class="section-title">Incidencies</h2>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Material</th>
                    <th>Data oberta</th>
                    <th>Data tancada</th>
                    <th>Estat</th>
                    <th>Informacio</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($incidents as $incident): ?>
                <tr>
                    <td>
                        <?= h($incident['tipus'] . ' - ' . $incident['model']) ?>
                        <div class="muted"><?= h($incident['material']) ?></div>
                    </td>
                    <td><?= h($incident['dataOberta']) ?></td>
                    <td><?= display_date($incident['dataTancada']) ?></td>
                    <td><span class="status-badge <?= h(status_class($incident['estat'])) ?>"><?= h($incident['estat'] ?? 'Sense estat') ?></span></td>
                    <td><?= h(excerpt($incident['informacio'], 160)) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($incidents)): ?>
                <tr><td colspan="5">No tens incidencies registrades.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
