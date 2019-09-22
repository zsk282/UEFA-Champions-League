<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Http\Resources\Groups as GroupResource;

class TeamsController extends Controller
{
    public function fetchTeams(Request $request){
    	return GroupResource::collection(Teams::all()->groupBy('group_name'));
    }
}
