<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaCiclos extends Model
{
    use HasFactory;
    protected $fillable=['empresa','ciclo'];

}
