<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    use HasFactory;
    
protected  $table='genre';
protected $primarykey='id' ;
protected $fillable = ['name', 'image', 'description', '_token'];

public function songs()
{
    return $this->hasMany(Song::class);
}
}
