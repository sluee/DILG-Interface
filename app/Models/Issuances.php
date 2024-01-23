<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuances extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'reference_no', 'type', 'category', 'outcome', 'url_link', 'date']
}
