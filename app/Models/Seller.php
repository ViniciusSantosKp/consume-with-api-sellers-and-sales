<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sellers';

    protected $fillable = [
        'id',
        'name',
        'email',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
