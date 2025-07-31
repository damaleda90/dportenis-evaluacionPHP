<?php
namespace app\controllers;
use app\models\Menu;
use App\Core\Controller;

class MenuController extends Controller {
    public function index() {
        $menu = new Menu();
        $menus = $menu->getNestedMenus();
        $this->view('menus/index', compact('menus'));
    }

    public function create() {
        $menu = new Menu();
        $menus = $menu->all();
        $this->view('menus/create', compact('menus'));
    }

    public function store() {
        $menu = new Menu();
        $success = $menu->create($_POST);
        header('Location: /');
    }

    public function edit() {
        $menu = new Menu();
        $item = $menu->find($_GET['id']);
        $menus = $menu->all();
        $this->view('menus/edit', compact('item', 'menus'));
    }

    public function update() {
        $menu = new Menu();
        $menu->update($_POST['id'], $_POST);
        header('Location: /');
    }

    public function delete() {
        $menu = new Menu();
        $menu->delete($_GET['id']);
        header('Location: /');
    }

    public function show() {
        $menu = new Menu();
        $item = $menu->find($_GET['id']);
        $this->view('menus/show', compact('item'));
    }
}
