<?php 
namespace App\Models;

use CodeIgniter\Model;

class Rubro extends Model{
    protected $table      = 'rubros';
    // Uncomment below if you want add primary key

    protected $primaryKey = 'id';
    protected $allowedFields = ['idcuenta','nombre','descripcion'];
}