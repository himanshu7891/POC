<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicles extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'application_id',
        'make',
        'vehicle_type',
        'model',
        'variant',
        'year_of_manufacturing',
        'valuation',
        'finance_amount',
        'margin',
        'funding',
        'scheme_applied',
        'months',
        'emi_amount',
        'customer_irr',

        'registration_no',
        'engine_no',
        'chasis_no',
        'insurance_company_name',
        'idv',
        'policy_no',
        'insurance_policy_start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function team() {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

}
