<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function pdfs()
        {
            return $this->hasMany(Pdf::class);
        }
    public function offres()
        {
            return $this->hasMany(Offre::class);
        }
    public function paragraphes()
    {
        return $this->hasMany(Paragraph::class);
    }
    public function paragraphs()
{
    return $this->hasMany(Paragraph::class);
}

    public function candidatures()
{
    return $this->hasMany(Candidatures::class, 'user_id');
}
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * public function paragraphes()

     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
