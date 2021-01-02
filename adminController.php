<?php

namespace App\Http\Controllers;
use App\Models\Proje;
use App\Models\Gorev;
use App\Models\Kaynak;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;
use phpDocumentor\Reflection\DocBlock\Tag;

class adminController extends Controller
{
    /*
        You should implemets a admin middleware so that normal users can't have access to
                admin panel
    */

    /*public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        $projects =  Project::all()->toArray();
        return view('admin.index',compact('projects','user'));
    }
    public function users(){
        $user = Auth::user();
        $users =  User::all()->toArray();
        return view('admin.users',compact('users','user'));
    }
*/
    public  function dashboard(){
        $project = Proje::all();
        $gorev = Gorev::all();
        $kaynak = Kaynak::all();
       return view('admin.dashboard',compact('project','gorev','kaynak'));
    }
    public function addTodo(Request $request , $id){

            Todo::create([
                'description'=>$request['description'],
                'due'=>$request['due'],
                'user_id'=>intval($id)
            ]);
        return redirect('/admin/dashboard');

    }

    public function deleteTodo($todo_id){
//        dd($todo_id);
        Todo::find($todo_id)->delete();
        return redirect('/admin/dashboard');
    }
    public function sent_message(Request $request){
        $request['to'] = User::where('email',$request->input('toWhom'))->first()->id;
        $request['from'] = Auth::user()->id ;
         Message::create($request->all());
        return redirect('/admin/dashboard');

    }





}

