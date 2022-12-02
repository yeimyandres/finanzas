<?php 
namespace App\Models;

use CodeIgniter\Model;

class Programado extends Model{
    protected $table      = 'programados';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['idrubro','fechalimite','detalle','valor','estado'];
}