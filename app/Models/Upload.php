<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $table = "corsi";
    protected $primaryKey = "id_cors";
    protected $fillable = ['nome','descrizione','tipo','durata','image','nmax','niscr','prezzo','istruttore'];
}
