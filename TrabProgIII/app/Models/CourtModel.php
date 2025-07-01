<?php

namespace App\Models;
use CodeIgniter\Model;

class CourtModel extends Model
{
    protected $table = 'Court';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'location', 'status', 'createAt'];
    protected $useAutoIncrement = false;
    public $timestamps = false;
}
