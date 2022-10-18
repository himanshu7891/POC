<?php

namespace Database\Seeders;

use App\Models\UserTeamBranch;
use Illuminate\Database\Seeder;

class UserTeamBranchSeeder extends Seeder
{
    public function run()
    {
        $utb = [
            [
                'user_id' => 2,
                'team_id' => 1,
                'branch_id' => 4,
            ],
        ];

        UserTeamBranch::insert($utb);
    }
}
