<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'fid_user',
        'name',
    ];

    protected $dates = [
        'created_at',
        'updates-at',
    ];
}
