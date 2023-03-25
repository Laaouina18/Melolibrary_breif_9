<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupe extends Model
{
    use HasFactory;
    
protected  $table='groupe';
protected $primarykey='id' ;
protected $fillable = ['name', 'image', 'pays', 'date_creation', '_token'];
}
