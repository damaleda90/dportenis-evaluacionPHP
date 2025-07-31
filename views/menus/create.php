<h2>Crear Nuevo Menú</h2>

<form action="/menu/store" method="POST">
    <label>Nombre del menú:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Depende de otro menú (opcional):</label><br>
    <select name="parent_id">
        <option value="">-- Ninguno --</option>
        <?php foreach ($menus as $m): ?>
            <option value="<?= $m['id'] ?>"><?= $m['name'] ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Guardar</button>
</form>

<p><a href="/">Volver</a></p>
