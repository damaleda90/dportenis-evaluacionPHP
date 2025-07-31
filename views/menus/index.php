<h1>Catálogo de Menús</h1>
<a href="/menu/create">Crear nuevo menú</a>
<ul>
    <?php foreach ($menus as $menu): ?>
        <li>
            <a href="/menu/show?id=<?= $menu['id'] ?>"><?= $menu['name'] ?></a>
            <a href="/menu/edit?id=<?= $menu['id'] ?>">Editar</a>
            <a href="/menu/delete?id=<?= $menu['id'] ?>">Eliminar</a>
            <?php if (!empty($menu['children'])): ?>
                <ul>
                    <?php foreach ($menu['children'] as $child): ?>
                        <li>
                            <a href="/menu/show?id=<?= $child['id'] ?>"><?= $child['name'] ?></a>
                            <a href="/menu/edit?id=<?= $child['id'] ?>">Editar</a>
                            <a href="/menu/delete?id=<?= $child['id'] ?>">Eliminar</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif ?>
        </li>
    <?php endforeach; ?>
</ul>
