<?php 
namespace App\Models;

use CodeIgniter\Model;

class Fuente extends Model{
    protected $table      = 'fuentes';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','tipofuente'];
}