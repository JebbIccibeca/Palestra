<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abbonamento extends Model
{
    use HasFactory;
    protected $table = "abbonamenti";
    protected $fillable = ['id_abbo','id_utente'];
}
