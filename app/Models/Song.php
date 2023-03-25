<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    
    protected $table = 'songs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title', 'year', 'track', 'audio_path', 'filename', 'duration', 'genre_id', 'artist_id', 'lyrics',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function comments()
    {
        return $this->hasMany(Commentaire::class);
    }
}

