<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'logo',
        'created_at',
        'updated_at',
        'website',
    ];
    static public function get_Companie_by_id($id)
    {
        return Companies::find($id);
    }
}
