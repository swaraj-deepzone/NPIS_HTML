<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refJawatan extends Model
{
    use HasFactory;

    protected $table = 'ref_jawatan';

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'jawatan_id', 'id')->withDefault();
    }
}
