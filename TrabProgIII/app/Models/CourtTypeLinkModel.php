<?php

namespace App\Models;
use CodeIgniter\Model;

class CourtTypeLinkModel extends Model
{
    protected $table = 'CourtTypeLink';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'idCourt', 'idCourtType', 'createAt'];
    protected $useAutoIncrement = false;
    public $timestamps = false;
}
