<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acquisti extends Model
{
    use HasFactory;
    protected $table = "acquisto";
    protected $fillable = ['id','id_prodotto','id_utente','created_at','updated_at'];
}
