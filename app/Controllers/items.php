<?php

namespace App\Controllers;

use App\Models\ItemModel;
use CodeIgniter\Controller;

class Items extends Controller {
    protected $itemModel;

    public function __construct() {
        $this->itemModel = new ItemModel();
    }

    public function index() {
        $data['items'] = $this->itemModel->findAll(); // Mengambil semua data dari tabel items
        return view('items/index', $data); // Mengirim data ke view
    }

    public function create() {
        return view('items/create');
    }

    public function store() {
        $data = [
            'code' => $this->request->getPost('code'),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'stock' => $this->request->getPost('stock'),
        ];
        $this->itemModel->save($data);
        return redirect()->to('/items');
    }

    public function edit($id) {
        $data = $this->itemModel->find($id);
        return $this->response->setJSON($data);
    }
    

    public function update($id) {
        $data = [
            'code' => $this->request->getPost('code'),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'stock' => $this->request->getPost('stock'),
        ];
        $this->itemModel->update($id, $data);
        return redirect()->to('/items');
    }

    public function delete($id) {
        $this->itemModel->delete($id);
        return redirect()->to('/items');
    }
}