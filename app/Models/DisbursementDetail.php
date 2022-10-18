<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisbursementDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'application_id',
        'bank_name',
        'vehicle_no',
        'customer_mobile',
        'customer_confirmation',
        'vehicle_type',
        'make',
        'model',
        'variant',
        'year_of_manufacturing',
        'loan_amount',
        'loan_variation_amount',
        'emi_month',
        'emi_amount',
        'emi_starting_date',
        'sms_send_option',
        'processing_fee',
        'stamp_duty',
        'document_charge',
        'pdd_charge',
        'other_charge',
        'valuation',
        'insurance',
        'insurance_amount',
        'insurance_funding',
        'payment_receivable',
        'rto_tax',
        'rto_charges',
        'rto_paper_status',
        'net_payment',
        'payment_favour',
        'commision_to',
        'gst',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
