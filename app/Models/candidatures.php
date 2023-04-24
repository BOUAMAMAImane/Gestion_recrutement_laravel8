<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidatures extends Model
{
        use HasFactory;
    
        protected $fillable = [
            'offres_id',
            'user_id',
            'pdfs_id',
            'paragraphs_id'
        ];
    
        public function offre()
        {
            return $this->belongsTo(Offre::class, 'offres_id');
        }
    
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
    
        public function pdf()
        {
            return $this->belongsTo(Pdf::class, 'pdfs_id');
        }
    
        public function paragraph()
        {
            return $this->belongsTo(Paragraph::class, 'paragraphs_id');
        }
    }
    



