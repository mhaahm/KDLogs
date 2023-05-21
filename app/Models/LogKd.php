<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogKd extends Model
{
    use HasFactory;

    public $table = 'log_kd';
    public $fillable = [
        'file_path',
        'active',
        'extensions',
        'pattern',
        'name',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
