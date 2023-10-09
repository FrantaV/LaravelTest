<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'logo_url',
        'website',
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

}
