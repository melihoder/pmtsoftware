<?php

namespace App\Http\Controllers;

use App\Models\Gorev;
use App\Models\Proje;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kaynak;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ViewErrorBag;

class resourcesController extends Controller
{
    public function index(){
        $kaynaks = Kaynak::all();
        return view('resources.index',compact('kaynaks'));
    }

    public function show($id){
        $project =  Proje::where('proje_id',$id)->first();
        $totalTasks = count(Gorev::all()->toArray());

        return view('projects.show',compact('project'));

    }

    public function create($id){
        $gorev = Gorev::where('id',$id)->first();
        return view('resources.create',compact('gorev'));
    }

    public function store(Request $request){

        $this->validate($request, [
            'kaynak_adi' => 'required',
            'miktar' => 'required',
            'proje_id' => 'required',
            'gorev_id' => 'required',
            'birim' => 'required',
            'aciklama' => 'required',


        ]);

        $kaynak = new Kaynak([
            'kaynak_adi' => $request->get('kaynak_adi'),
            'miktar' => $request->get('miktar'),
            'proje_id' => $request->get('proje_id'),
            'gorev_id' => $request->get('gorev_id'),
            'birim' => $request->get('birim'),
            'aciklama' => $request->get('aciklama')
        ]);
        $kaynak->save();
        if ($kaynak)
        {
            return back()->with('success','İşlem Başarılı');}

        else{
            return back()->with('error','İşlem Başarısız');
        }


    }
    public function edit($id){
        $kaynak = Kaynak::where('id',$id)->first();
        return view('resources.edit',compact('kaynak'));

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
        $kaynak =  Kaynak::where('id', $id)->first();
        $kaynak->kaynak_adi = $request->get('kaynak_adi');
        $kaynak->miktar = $request->get('miktar');
        $kaynak->birim = $request->get('birim');
        $kaynak->aciklama = $request->get('aciklama');
        $kaynak->save();
        if ($kaynak)
        {
            return back()->with('success','İşlem Başarılı');
        }

        else{
            return back()->with('error','İşlem Başarısız');
        }



    }
    public function remove($id){
        Kaynak::deleteKaynak($id);
        return redirect('/resources');
    }


    //
    public function searchByUserId($user_id , $text){


    }
}
