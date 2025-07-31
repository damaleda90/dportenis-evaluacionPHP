<?php
namespace app\models;
use App\Core\Model;
use PDO;

class Menu extends Model {
    public function all() {
        $stmt = $this->db->query("SELECT * FROM menus");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM menus WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        if (!empty($data['parent_id'])) {
            $parent = $this->find($data['parent_id']);
            if (!$parent) {
                return false;
            }
        }
        $stmt = $this->db->prepare("INSERT INTO menus (name, description, parent_id) VALUES (?, ?, ?)");
        return $stmt->execute([$data['name'], $data['description'], $data['parent_id'] ?? null]);
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE menus SET name = ?, description = ?, parent_id = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['description'], $data['parent_id'] ?? null, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM menus WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getNestedMenus() {
        $menus = $this->all();
        $tree = [];

        foreach ($menus as $menu) {
            if (!$menu['parent_id']) {
                $tree[$menu['id']] = $menu;
                $tree[$menu['id']]['children'] = [];
            }
        }

        foreach ($menus as $menu) {
            if ($menu['parent_id']) {
                $tree[$menu['parent_id']]['children'][] = $menu;
            }
        }

        return $tree;
    }
}