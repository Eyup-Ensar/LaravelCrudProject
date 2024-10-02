<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class PanelUsers extends Authenticatable 
{
    use HasFactory;

    protected $fillable = [
        'kulad',    // Kullanıcı adı
        'password', // Şifre
        // Diğer alanlar eklenebilir
    ];
}
