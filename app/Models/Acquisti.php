<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acquisti extends Model
{
    use HasFactory;
    protected $table = "acquisti";
    protected $fillable = ['id_acqu','id_corsi','id_utente','created_at','updated_at'];
}
