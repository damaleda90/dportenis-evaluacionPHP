<h2>Editar Menú</h2>

<form action="/menu/update" method="POST">
    <input type="hidden" name="id" value="<?= $item['id'] ?>">

    <label>Nombre del menú:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($item['name']) ?>" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="description" required><?= htmlspecialchars($item['description']) ?></textarea><br><br>

    <label>Depende de otro menú (opcional):</label><br>
    <select name="parent_id">
        <option value="">-- Ninguno --</option>
        <?php foreach ($menus as $m): ?>
            <?php if ($m['id'] != $item['id']): ?>
                <option value="<?= $m['id'] ?>" <?= ($item['parent_id'] == $m['id']) ? 'selected' : '' ?>>
                    <?= $m['name'] ?>
                </option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Actualizar</button>
</form>

<p><a href="/">Volver</a></p>
