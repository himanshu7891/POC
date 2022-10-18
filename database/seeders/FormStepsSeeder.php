<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormSteps;
use Admin;

class FormStepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormSteps::create([
            'sequence' => '1',
            'form_type' => 'login-form',
            'title' => 'Application',
            'slug' => Admin::slugify('Application')
        ]);
        FormSteps::create([
            'sequence' => '2',
            'form_type' => 'login-form',
            'title' => 'Personal Details',
            'slug' => Admin::slugify('Personal Details')
        ]);
        FormSteps::create([
            'sequence' => '3',
            'form_type' => 'login-form',
            'title' => 'Loan Details',
            'slug' => Admin::slugify('Loan Details')
        ]);
        FormSteps::create([
            'sequence' => '4',
            'form_type' => 'login-form',
            'title' => 'Vehicle Details',
            'slug' => Admin::slugify('Vehicle Details')
        ]);
        FormSteps::create([
            'sequence' => '5',
            'form_type' => 'disbursement-form',
            'title' => 'Disbursement Details',
            'slug' => Admin::slugify('Disbursement Details')
        ]);
    }
}
