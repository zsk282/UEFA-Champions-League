<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Http\Resources\Groups as GroupResource;

class TeamsController extends Controller
{
	private $masterArray;

	private $alphabet = ["A","B","C", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "Z", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "AB"];

    public function fetchTeams(Request $request){
    	return GroupResource::collection(Teams::all()->sortBy('group_name')->groupBy('group_name'));
    }

    public function shuffleTeams(Request $request){

		$teams = new Teams();
		$winnerTeams = $teams->where('is_domestic_winner' , 1)->get(['name','country']);

		$losingTeams = $teams->where('is_domestic_winner', 0)->get(['name','country']);

		foreach ($winnerTeams as $key => $value) {
			$tempWinner[$key][] = ['name'=>$value->name,'country'=>$value->country];
		}

		foreach ($losingTeams as $key => $value) {
			$temploser[] = ['name'=>$value->name,'country'=>$value->country];
		}

		$lastCount = 0;

		// driver code (assuming that there will be at max 32 teams)
		while($lastCount < 32){
			$finalData = $this->fill($tempWinner,$temploser);
			$lastCount = $this->validator($finalData);
		}
		
		// saving group names in database
		foreach ($finalData as $key => $value) {
			foreach ($value as $data) {
				$teamObj = new Teams();
				$teamObj = $teamObj->where('name',$data['name'])->first();
				$teamObj->group_name = $this->alphabet[$key];
				$teamObj->save();
			}
		}

		return $finalData;
    }

	private function fill($winner,$loser){

		// randomize data
		shuffle($winner);
		shuffle($loser);

		// creating groups 
		foreach ($loser as $loser_key => $loser_value) {
			
			foreach ($winner as $winner_key => $winner_value) {
				$tempCnt = [];
				
				foreach ($winner_value as $group_key => $group_value) {
					$tempCnt[] = $group_value['country'];
				}
				
				if(!in_array($loser_value['country'], $tempCnt) && (count($winner_value)<4)){
					$winner[$winner_key][] = $loser_value;
					break;
				}
			}
		}
			
		return $winner;
	}

	private function validator($winner){
		$flag = 0;
		foreach ($winner as $value) {
			foreach ($value as $data) {
				$flag++;
			}
		}
		return $flag;
	}

}
