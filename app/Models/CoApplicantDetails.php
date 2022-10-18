<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoApplicantDetails extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'application_id',
        'name',
        'address',
        'mobile',
        'relationship',
        'company_name',
        'company_address',
        'area',
        'city',
        'state',
        'landmark',
        'pincode',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
