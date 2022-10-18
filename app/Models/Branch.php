<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'team_id',
        'branch_code',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function team() {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

}
