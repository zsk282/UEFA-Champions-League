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
		$tempWinner = array();
		foreach ($winnerTeams as $key => $value) {
			$tempWinner[] = ['name'=>$value->name,'country'=>$value->country];
		}
		// shuffle winner team to be on top each time
		shuffle($tempWinner);
		shuffle($losingTeams);
/*		echo "winners list is";
		print_r($tempWinner);
		echo "Loosers list is";
		print_r($losingTeams);die;*/
		$finalGroups = array();
		foreach($tempWinner as $win_k => $win_d){
			// print_r($win_d);die;
			$tempGroups = array();
			$tempGroups[$win_k][] = $win_d;
			foreach ($losingTeams as $key => $value) {
				// print_r($tempGroups);
				if(count($tempGroups[$win_k]) < 4){
					$result = $this->array_search_id($value['country'], $tempGroups, array('$'));
					if($win_k==7){
						$tempGroups[$win_k][] = $value;
						unset($losingTeams[$key]);
						// die;
					}
					if($result==null && $win_k!=7){
						$tempGroups[$win_k][] = $value;
						unset($losingTeams[$key]);
					}
				}else{
					$finalGroups[] = $tempGroups;
					break;
				}
			}
			// die;
		}
		print_r($finalGroups);die;
		foreach ($losingTeams as $key => $data) {
		
			// $index = (int)($key/4);
			foreach ($tempWinner as $win_k => $win_d) {
				// check country inside A group
				$tempCountry = array();
				foreach($win_d as $cnt){
					$tempCountry[$win_k][] = $cnt['country'];
				}
				if((count($win_d) < 4)){
					$duplicate = 
					$tempWinner[$win_k][] = $data;
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

    public function array_search_id($search_value, $array, $id_path) { 
      
	    if(is_array($array) && count($array) > 0) { 
	          
	        foreach($array as $key => $value) { 
	  
	            $temp_path = $id_path; 
	              
	            // Adding current key to search path 
	            array_push($temp_path, $key); 
	  
	            // Check if this value is an array 
	            // with atleast one element 
	            if(is_array($value) && count($value) > 0) { 
	                $res_path = $this->array_search_id( 
	                        $search_value, $value, $temp_path); 
	  
	                if ($res_path != null) { 
	                    return $res_path; 
	                } 
	            } 
	            else if($value == $search_value) { 
	                return join(" --> ", $temp_path); 
	            } 
	        } 
	    } 
	      
	    return null; 
	} 
}
