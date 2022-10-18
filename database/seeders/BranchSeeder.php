<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;
use Admin;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'team_id' => '1',
            'branch_code' => Admin::branchCode(),
            'name' => 'branch1',
        ]);
        Branch::create([
            'team_id' => '2',
            'branch_code' => Admin::branchCode(),
            'name' => 'branch2',
        ]);
        Branch::create([
            'team_id' => '3',
            'branch_code' => Admin::branchCode(),
            'name' => 'branch3',
        ]);
        Branch::create([
            'team_id' => '1',
            'branch_code' => Admin::branchCode(),
            'name' => 'branch4',
        ]);
        Branch::create([
            'team_id' => '2',
            'branch_code' => Admin::branchCode(),
            'name' => 'branch5',
        ]);
    }
}
