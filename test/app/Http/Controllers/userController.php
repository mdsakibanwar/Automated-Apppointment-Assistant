<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;
use URL;
use Illuminate\Pagination\LengthAwarePaginator;

class userController extends Controller
{
    public function showAll() {
        $page = LengthAwarePaginator::resolveCurrentPage();
    	$total=DB::table('users')->count('id'); //Count the total record
        $perPage=4;
        $results = DB::table('users')->forPage($page, $perPage)->get();
        $users=new LengthAwarePaginator($results, $total, $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
    	return view('users.showAll',compact('users'));
    }

    public function show(User $user) {
        if(Auth::check()) {
            $loggedIn = Auth::user();
            if($loggedIn->id === $user->id) return view('home');
        }
    	return view('users.show',compact('user'));
    }
    public function update_photo(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $avatar->move(public_path().'/image/',$avatar->getClientOriginalName());
            $url =URL::to("/").'/image/'.$avatar->getClientOriginalName();
            $user = Auth::user();
            $user->avatar = $url;
            $user->save();
            
        }
        //return view('home', array('user' => Auth::user()) );
        return redirect('/home');
    }
    public function showSearched(Request $request){
    	$users = User::all();
    	$searched = $request->input('searched');
    	if($searched != ""){
    		$matcheduser = User::where('name','LIKE','%'.$searched.'%')
    							   ->orWhere('profession','LIKE','%'.$searched.'%')
                                   ->get();
    		if(count($matcheduser) > 0)
    			return view('users.showAll')->withDetails($matcheduser)->withQuery($searched);
        }
        return redirect('/user');
    }
    public function index()
    {
        return view('homenew');
    }
    public function viewprofile()
    {
        $user=Auth::user();
        return view('users.details',compact('user'));
    }
}
