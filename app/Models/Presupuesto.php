<?php 
namespace App\Models;

use CodeIgniter\Model;

class Presupuesto extends Model{
    protected $table      = 'presupuestos';
    // Uncomment below if you want add primary key

    protected $primaryKey = 'id';
    protected $allowedFields = ['creado','vigencia','mes','descripcion'];
}