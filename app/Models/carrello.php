<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrello extends Model
{
    use HasFactory;
    protected $table = "carrello";
    protected $fillable = ['id_prodotto','id_utente'];
}
