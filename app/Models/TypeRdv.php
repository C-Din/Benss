<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRdv extends Model
{
    use HasFactory;
    protected $fillable = ['nomType', 'description'];
}
