<?php

namespace App\Models;
use CodeIgniter\Model;

class CourtTypeModel extends Model
{
    protected $table = 'CourtType';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'desc', 'createAt'];
    protected $useAutoIncrement = false;
    public $timestamps = false;
}
