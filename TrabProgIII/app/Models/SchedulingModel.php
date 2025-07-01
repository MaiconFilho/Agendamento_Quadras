<?php

namespace App\Models;
use CodeIgniter\Model;

class SchedulingModel extends Model
{
    protected $table = 'Scheduling';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'idUser', 'idCourt', 'scheduleDate', 'initialTime', 'endTime', 'obs', 'createAt'];
    protected $useAutoIncrement = false;
    public $timestamps = false;
}
