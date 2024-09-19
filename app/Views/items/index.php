<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7f6;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        position: relative;
    }

    .button-add {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: #fff;
        background-color: #007bff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        margin-bottom: 20px;
    }

    .button-add:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 0 auto;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .no-data {
        text-align: center;
        padding: 20px;
        color: #666;
    }

    .action-buttons button,
    .action-buttons a {
        margin: 0 5px;
        padding: 5px 10px;
        font-size: 14px;
        border: none;
        border-radius: 3px;
        text-decoration: none;
        cursor: pointer;
        color: #fff;
        transition: background-color 0.3s;
    }

    .edit-button {
        background-color: #ffc107;
    }

    .edit-button:hover {
        background-color: #e0a800;
    }

    .delete-button {
        background-color: #dc3545;
    }

    .delete-button:hover {
        background-color: #c82333;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        max-width: 800px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .modal-header,
    .modal-body,
    .modal-footer {
        margin-bottom: 15px;
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .modal-title {
        font-size: 20px;
        color: #333;
    }

    .close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #333;
        text-decoration: none;
    }

    .modal-body label {
        display: block;
        margin: 5px 0;
    }

    .modal-body input,
    .modal-body textarea {
        width: 100%;
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }

    .modal-body textarea {
        resize: vertical;
    }

    .modal-footer {
        text-align: right;
    }

    .modal-footer button {
        padding: 10px 15px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        color: #fff;
        transition: background-color 0.3s;
    }

    .modal-footer .btn-primary {
        background-color: #007bff;
    }

    .modal-footer .btn-primary:hover {
        background-color: #0056b3;
    }

    .modal-footer .btn-secondary {
        background-color: #6c757d;
    }

    .modal-footer .btn-secondary:hover {
        background-color: #5a6268;
    }

    /* JSON Display Styles */
    .json-viewer {
        font-family: monospace;
        white-space: pre-wrap;
        background-color: #f4f4f4;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ccc;
        max-height: 300px;
        overflow-y: auto;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Daftar Barang</h1>
        <button class="button-add" onclick="openModal('add')">Tambah Barang</button>
        <table>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Stok</th>
                <th>Dibuat</th>
                <TH>Update</TH>
                <th>Aksi</th>
            </tr>
            <?php if (!empty($items) && is_array($items)): ?>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($item['code'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($item['description'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($item['stock'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($item['created_at'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($item['updated_at'], ENT_QUOTES, 'UTF-8') ?></td>
                <td class="action-buttons">
                    <button class="edit-button"
                        onclick="openModal('edit', <?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                    <a href="/items/delete/<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"
                        class="delete-button" onclick="return confirm('Anda yakin ingin menghapus item ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6" class="no-data">Tidak ada data</td>
            </tr>
            <?php endif; ?>
        </table>
    </div>

    <!-- Modal Tambah -->
    <div id="modal-add" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Tambah Barang</span>
                <span class="close" onclick="closeModal('add')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="add-form" action="/items/store" method="post">
                    <label for="code">Kode:</label>
                    <input type="text" id="add-code" name="code" required>

                    <label for="name">Nama:</label>
                    <input type="text" id="add-name" name="name" required>

                    <label for="description">Deskripsi:</label>
                    <textarea id="add-description" name="description" required></textarea>

                    <label for="stock">Stok:</label>
                    <input type="number" id="add-stock" name="stock" required>

                    <div class="modal-footer">
                        <button type="submit" class="btn-primary">Tambah</button>
                        <button type="button" class="btn-secondary" onclick="closeModal('add')">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="modal-edit" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Edit Barang</span>
                <span class="close" onclick="closeModal('edit')">&times;</span>
            </div>
            <div class="modal-body" id="modal-edit-body">
                <!-- Form Edit akan dimuat di sini -->
                <div class="json-viewer" id="json-viewer"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-primary" onclick="submitEditForm()">Simpan Perubahan</button>
                <button type="button" class="btn-secondary" onclick="closeModal('edit')">Batal</button>
            </div>
        </div>
    </div>

    <script>
    function openModal(type, id = null) {
        const modalAdd = document.getElementById('modal-add');
        const modalEdit = document.getElementById('modal-edit');
        const jsonViewer = document.getElementById('json-viewer');

        if (type === 'add') {
            modalAdd.style.display = 'block';
        } else if (type === 'edit') {
            fetch(`/items/edit/${id}`)
                .then(response => response.json())
                .then(data => {
                    const modalEditBody = document.getElementById('modal-edit-body');
                    modalEditBody.innerHTML = `
                            <form id="edit-form" action="/items/update/${id}" method="post">
                                <input type="hidden" name="id" value="${data.id}">
                                <label for="edit-code">Kode:</label>
                                <input type="text" id="edit-code" name="code" value="${data.code}" required>

                                <label for="edit-name">Nama:</label>
                                <input type="text" id="edit-name" name="name" value="${data.name}" required>

                                <label for="edit-description">Deskripsi:</label>
                                <textarea id="edit-description" name="description" required>${data.description}</textarea>

                                <label for="edit-stock">Stok:</label>
                                <input type="number" id="edit-stock" name="stock" value="${data.stock}" required>
                            </form>
                        `;
                    jsonViewer.textContent = JSON.stringify(data, null, 2); // Menampilkan data JSON
                    modalEdit.style.display = 'block';
                })
                .catch(error => console.error('Error fetching edit data:', error));
        }
    }

    function closeModal(type) {
        if (type === 'add') {
            document.getElementById('modal-add').style.display = 'none';
        } else if (type === 'edit') {
            document.getElementById('modal-edit').style.display = 'none';
        }
    }

    function submitEditForm() {
        document.getElementById('edit-form').submit();
    }

    window.onclick = function(event) {
        const modalAdd = document.getElementById('modal-add');
        const modalEdit = document.getElementById('modal-edit');

        if (event.target === modalAdd) {
            closeModal('add');
        } else if (event.target === modalEdit) {
            closeModal('edit');
        }
    }
    </script>

</body>

</html>