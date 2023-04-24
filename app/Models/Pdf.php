<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'filename', 'user_id'];
    // Modèle Pdf
        public function user()
        {
            return $this->belongsTo(User::class);
        }

}
