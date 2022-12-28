<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lot() {
        return $this->belongsTo(Lot::class, 'lot_id', 'id');
    }
}
