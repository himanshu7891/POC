<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'team_code',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function branch() {
        return $this->hasOne(Branch::class, 'branch_id', 'id');
    }
}
