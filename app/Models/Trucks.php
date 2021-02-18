<?php

namespace App\Models;

use CodeIgniter\Model;

class Trucks extends Model
{
    protected $table      = 'truck';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
	protected $returnType     = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['name','city','state','zip'];
}