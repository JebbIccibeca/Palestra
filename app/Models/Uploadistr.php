<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uploadistr extends Model
{
    use HasFactory;
    protected $table = "istruttori";
    protected $primaryKey = "id_istr";
    protected $fillable = ['nome_istr','cognome','nascita','cf','contratto','infocontatto'];
}
