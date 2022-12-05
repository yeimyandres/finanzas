<?php 
namespace App\Models;

use CodeIgniter\Model;

class Ejecutado extends Model{
    protected $table      = 'ejecutados';

    protected $primaryKey = 'id';
    protected $allowedFields = ['idprogramado','idfuente','fecha','detalle','valor'];
}