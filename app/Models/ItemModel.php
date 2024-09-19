<?php
// app/Models/ItemModel.php
namespace App\Models;

use CodeIgniter\Model;
use app\Config\Database;

class ItemModel extends Model
{
protected $table = 'items';
protected $primaryKey = 'id'; 
protected $allowedFields = ['code', 'name', 'description', 'stock', 'created_at', 'updated_at'];
}