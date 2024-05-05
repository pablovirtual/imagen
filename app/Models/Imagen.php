<?php 
namespace App\Models;

use CodeIgniter\Model;

class Imagen extends Model{
    protected $table      = 'imagenes';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'imagen'];
}