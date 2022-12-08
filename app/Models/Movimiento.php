<?php 
namespace App\Models;

use CodeIgniter\Model;

class Movimiento extends Model{
    protected $table      = 'movimientos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['transaccion','fecha','detalle','valor'];
}