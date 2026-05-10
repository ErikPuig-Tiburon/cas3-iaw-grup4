<section class="page-heading">
    <div>
        <h1>Alumnes</h1>
        <p>Crea alumnes, modifica dades i obre el detall de dispositius assignats.</p>
    </div>
</section>

<section class="grid two">
    <article class="card">
        <h2 class="section-title"><?= $editStudent ? 'Editar alumne' : 'Nou alumne' ?></h2>
        <form method="post" class="form-grid wide">
            <?= csrf_field() ?>
            <input type="hidden" name="action" value="<?= $editStudent ? 'update' : 'create' ?>">
            <?php if ($editStudent): ?>
                <input type="hidden" name="id" value="<?= (int) $editStudent['id'] ?>">
            <?php endif; ?>
            <div class="field">
                <label for="nom">Nom</label>
                <input id="nom" name="nom" value="<?= h($editStudent['nom'] ?? '') ?>" required>
            </div>
            <div class="field">
                <label for="cognom1">Primer cognom</label>
                <input id="cognom1" name="cognom1" value="<?= h($editStudent['cognom1'] ?? '') ?>" required>
            </div>
            <div class="field">
                <label for="cognom2">Segon cognom</label>
                <input id="cognom2" name="cognom2" value="<?= h($editStudent['cognom2'] ?? '') ?>">
            </div>
            <div class="field">
                <label for="correu">Correu</label>
                <input id="correu" name="correu" type="email" value="<?= h($editStudent['correu'] ?? '') ?>" required>
            </div>
            <div class="field">
                <label for="grupClasse">Grup</label>
                <input id="grupClasse" name="grupClasse" value="<?= h($editStudent['grupClasse'] ?? '') ?>" required>
            </div>
            <div class="actions">
                <button class="btn btn-primary" type="submit"><?= $editStudent ? 'Guardar canvis' : 'Crear alumne' ?></button>
                <?php if ($editStudent): ?>
                    <a class="btn btn-secondary" href="<?= h(url('professorat/alumnes.php')) ?>">Cancel.lar</a>
                <?php endif; ?>
            </div>
        </form>
    </article>

    <article class="card">
        <h2 class="section-title">Cerca</h2>
        <form method="get" class="form-row">
            <div class="field" style="flex: 1;">
                <label for="q">Nom, correu o grup</label>
                <input id="q" name="q" value="<?= h($search) ?>" placeholder="ASIX1, Garcia...">
            </div>
            <button class="btn btn-primary" type="submit">Cercar</button>
            <a class="btn btn-secondary" href="<?= h(url('professorat/alumnes.php')) ?>">Netejar</a>
        </form>
    </article>
</section>

<section class="panel" style="margin-top: 1rem;">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Grup</th>
                    <th>Correu</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($alumnes as $alumne): ?>
                <tr>
                    <td><?= h(student_full_name($alumne)) ?></td>
                    <td><?= h($alumne['grupClasse']) ?></td>
                    <td><?= h($alumne['correu']) ?></td>
                    <td class="actions">
                        <a class="btn btn-small btn-secondary" href="<?= h(url('professorat/alumne_detall.php?id=' . (int) $alumne['id'])) ?>">Detall</a>
                        <a class="btn btn-small btn-primary" href="<?= h(url('professorat/alumnes.php?edit=' . (int) $alumne['id'])) ?>">Editar</a>
                        <form method="post" data-confirm="Vols eliminar aquest alumne?">
                            <?= csrf_field() ?>
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= (int) $alumne['id'] ?>">
                            <button class="btn btn-small btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($alumnes)): ?>
                <tr><td colspan="4">No s'han trobat alumnes.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
