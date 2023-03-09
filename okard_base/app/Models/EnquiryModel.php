<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class EnquiryModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tbl_requests';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'contact',
        'message',
        'refImage',
        'isRead',
        'voiceNote',
        'doc',
        'type'
    ];
}
