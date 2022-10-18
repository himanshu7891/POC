<?php

use App\Models\User;
use App\Models\Team;
use App\Models\Branch;
use App\Models\Application;

class Admin {

    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

	public static function teamCode() {
		$count = Team::withTrashed()->count();
        return "T".sprintf("%'03d", ++$count);
    }

    public static function getTeamCode($id) {
        return "T".sprintf("%'03d", $id);
    }

    public static function branchCode() {
		$count = Branch::withTrashed()->count();
        return "B".sprintf("%'03d", ++$count);
    }

    public static function getBranchCode($id) {
        return "B".sprintf("%'03d", $id);
    }

    public static function userCode() {
		$count = User::withTrashed()->count();
        return "U".sprintf("%'03d", ++$count);
    }

    public static function getUserCode($id) {
        return "U".sprintf("%'03d", $id);
    }

    public static function applicationCode($userId,$teamId,$branchId) {
    	$user = User::whereId($userId)->first();
    	$team = Team::whereId($teamId)->first();
    	$branch = Branch::whereId($branchId)->first();
    	$userApplicationCount = Application::whereId($userId)->withTrashed()->count();
		$applicationCount = Application::withTrashed()->count();

		if($applicationCount == "99999" && $applicationCount > "99999") {
			$count = ++$applicationCount;
		} else {
			$count = sprintf("%'05d", ++$applicationCount);
		}

		return "App-".$user->user_code."-".$team->team_code."-".$branch->branch_code."-".++$userApplicationCount."-".$count;
    }

    public static function getApplicationCode($id) {
    	$application = Application::whereId($id)->first();

		return $application->application_code;
    }
	
}