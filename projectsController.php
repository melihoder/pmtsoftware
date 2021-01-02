<?php

namespace App\Http\Controllers;

use App\Models\Gorev;
use App\Models\Kaynak;
use Illuminate\Support\ViewErrorBag;
use JavaScript;
use App\Models\Proje;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\tasksController;


class projectsController extends Controller
{

    public function index(){
        $projects = Proje::all();
        $users = User::all();
        return view('projects.index',compact('projects','users'));
     }
    public function show($id){
        $project =  Proje::where('proje_id',$id)->first();
        $totalTasks = count(Gorev::all()->toArray());

        return view('projects.show',compact('project'));

    }

    public function create(){

        return view('projects.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'proje_adi' => 'required',
            'baslangic' => 'required',
            'bitis' => 'required',


        ]);

        $proje = new Proje([
            'proje_adi' => $request->get('proje_adi'),
            'baslangic' => $request->get('baslangic'),
            'bitis' => $request->get('bitis'),
            'aciklama' => $request->get('aciklama')
        ]);
        $proje->save();
        if ($proje)
        {
            return back()->with('success','İşlem Başarılı');}

        else{
            return back()->with('error','İşlem Başarısız');
        }


    }
    public function edit($id){
        $project = Proje::where('id',$id)->first();
        return view('projects.edit',compact('project'));

    }

    public function gorevEkle($id){
        //$gorevs = Gorev::firstwhere('proje_id',$id);
        $gorevs = Gorev::all()->where('proje_id',$id);
        $project = Proje::where('id',$id)->first();
        return view('tasks.transmitted', compact('project','gorevs'));
    }

    public function addBudget($project_id , Request $request){
        $cout = Cout::create($request->input());
        $project = Project::find($project_id);
        if ($project_id){
            $project->cout_id = $cout->id ;
            $project->save();
        }
        Historic::create(['user_id'=>Auth::user()->id,'project_id'=>$project->id,'comment'=>'A ajouter un budget pour le projet :']);


        return redirect('/projects/'.$project_id);

    }
    public function editBudget($project_id, $cout_id , Request $request){
        $cout = Cout::find($cout_id)->update($request->input());
        $project = Project::find($project_id);
        if ($project_id){
            $project->cout_id = $cout_id ;
            $project->save();
        }
        Historic::create(['user_id'=>Auth::user()->id,'project_id'=>$project->id,'comment'=>'A Modifier le budget pour le projet :']);


        return redirect('/projects/'.$project_id);
    }
    public function update(Request $request , $id){
        $project =  Proje::where('id', $id)->first();
        $project->proje_adi = $request->get('proje_adi');
        $project->baslangic = $request->get('baslangic');
        $project->bitis = $request->get('bitis');
        $project->aciklama = $request->get('aciklama');
        $project->save();
        if ($project)
        {
            return back()->with('success','İşlem Başarılı');
        }

        else{
            return back()->with('error','İşlem Başarısız');
        }



    }
    public function remove($project_id){
        Proje::deleteProject($project_id);
        $gorev = Gorev::where('proje_id', $project_id)->first();
        $kaynak = Kaynak::where('proje_id',$project_id)->first();
        Gorev::deleteGorev($gorev->id);
        Kaynak::deleteKaynak($kaynak->id);

        return redirect('/projects');
    }


    //
    public function searchByUserId($user_id , $text){


    }

}
