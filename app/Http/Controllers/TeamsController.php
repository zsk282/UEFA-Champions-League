<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Http\Resources\Groups as GroupResource;

class TeamsController extends Controller
{
	private $masterArray;
	private $groupSize = 4;
	private $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

    public function fetchTeams(Request $request){
    	return GroupResource::collection(Teams::all()->groupBy('group_name'));
    }

    public function shuffleTeams(Request $request){

		$teams = new Teams();
		$winnerTeams = $teams->where('is_domestic_winner' , 1)->get(['name','country']);
		$losingTeams = $teams->where('is_domestic_winner', 0)->get(['name','country'])->toArray();
		
		foreach ($winnerTeams as $key => $value) {
			$tempWinner[][0] = ['name'=>$value->name,'country'=>$value->country];
		}
		
		// shuffle winner team to be on top each time
		shuffle($tempWinner);
		shuffle($losingTeams);

		foreach ($losingTeams as $key => $data) {
		
			// $index = (int)($key/4);
			foreach ($tempWinner as $win_k => $win_d) {

				// check country inside A group
				foreach($win_d as $cnt){
					$tempCountry[] = $cnt['country'];
				}
				
				if((count($win_d) < 4) && (!in_array($data['country'], $tempCountry))){
					$tempWinner[$win_k][] = $data;
					break;
				}
			}
		}
		return $tempWinner;
		// foreach ($tempWinner as $key => $value) {
		// 	foreach ($value as $data) {
		// 		$teamObj = new Teams();
		// 		$teamObj = $teamObj->where('name',$data['name'])->first();
		// 		$teamObj->group_name = $this->alphabet[$key];
		// 		$teamObj->save();
		// 	}
		// }

		// return $tempWinner;
    }
}
