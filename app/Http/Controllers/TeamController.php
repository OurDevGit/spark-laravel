<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\User;
class TeamController extends Controller
{
    //


	public function index(){
		$teams = Team:: get();
		return view('teams')->with('teams', $teams);
    }

    public function createTeam(Request $request){
    	$team = new Team();
    	$team['name'] = $request['teamName'];
    	$team['adminId'] = $request['id'];

    	$team->save();
    	return redirect('home')->with('id', $request['id']);
    }

    public function showmyteams(){
        $id = auth()->user()->id;
        $teams = Team:: where('adminId', '=', $id)->get();
        return view('teams')->with('teams', $teams);
    }

    public function display($id){
        $members = User:: where('teamId', '=', $id)->get();
        $noteam = User:: where('teamId', '=', 0)->get();
        $team = Team:: find($id);
        $team['members'] = $members;
        $team['noteam'] = $noteam;
        return view('teamprofile')->with('team', $team);
    }

    public function addMembers(Request $request){
        print_r(explode(",", $request['userids']));
        $arr_ids =explode(",", $request['userids']);
        // for($i=0; $i<count($arr_ids); $++){

        // }
        $user = User:: whereIn('id', $arr_ids)->update(array('teamId' => $request['teamId']));

        $members = User:: where('teamId', '=', $request['teamId'])->get();
        $noteam = User:: where('teamId', '=', 0)->get();
        $team = Team:: find($request['teamId']);
        $team['members'] = $members;
        $team['noteam'] = $noteam;
        return view('teamprofile')->with('team', $team);
    }


    public function update(){

    }

    
}
