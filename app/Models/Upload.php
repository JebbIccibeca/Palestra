<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $table = "inventario";
    protected $fillable = ['titolo','data_uscita','image','protagonista','regista','etamin','stock','prezzo'];
}
