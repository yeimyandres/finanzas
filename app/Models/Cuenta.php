<?php 
namespace App\Models;

use CodeIgniter\Model;

class Cuenta extends Model{

    protected $table      = 'cuentas';
    // Uncomment below if you want add primary key
    
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','tipomovimiento'];

}
