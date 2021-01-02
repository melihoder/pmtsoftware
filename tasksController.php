<?php

namespace App\Http\Controllers;


use App\Models\Gorev;
use App\Models\Proje;
use App\Models\Kaynak;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class tasksController extends Controller
{
    public function index(){
        $gorevs = Gorev::all();
        return view('tasks.index',compact('gorevs'));

    }

    public function create($id){
        $project = Proje::where('id',$id)->first();
        return view('tasks.create',compact('project'));
    }


    public function store(Request $request){

        $this->validate($request, [
            'gorev_adi' => 'required',
            'proje_id' => 'required',
            'baslangic' => 'required',
            'bitis' => 'required',
            'aciklama' => 'required',


        ]);

        $gorev = new Gorev([
            'gorev_adi' => $request->get('gorev_adi'),
            'proje_id'  => $request->get('proje_id'),
            'baslangic' => $request->get('baslangic'),
            'bitis' => $request->get('bitis'),
            'aciklama' => $request->get('aciklama'),


        ]);
        $gorev->save();
        if ($gorev)
        {
            return back()->with('success','İşlem Başarılı');}

        else {
            return back()->with('error', 'İşlem Başarısız');
        }

    }
    public function edit($id){
        $gorev = Gorev::where('id',$id)->first();
        return view('tasks.edit',compact('gorev'));

    }

    public function update(Request $request , $id){
        $gorev =  Gorev::where('id', $id)->first();
        $gorev->gorev_adi = $request->get('gorev_adi');
        $gorev->baslangic = $request->get('baslangic');
        $gorev->bitis = $request->get('bitis');
        $gorev->progress = $request->has("progress") ?  $request->progress : 0;
        $gorev->sortorder = Gorev::max("sortorder") + 1;
        $gorev->aciklama = $request->get('aciklama');
        $gorev->save();
        if ($gorev)
        {
            return back()->with('success','İşlem Başarılı');
        }

        else{
            return back()->with('error','İşlem Başarısız');
        }
    }

    public function kaynakEkle($id){
        $kaynaks = Kaynak::all()->where('gorev_id',$id);
        $gorevs = Gorev::where('id',$id)->first();
        $project = Proje::where('id',$gorevs->proje_id)->first();
        return view('resources.transmitted', compact('project','gorevs', 'kaynaks'));
    }

    private function updateOrder($taskId, $target)
    {
        $nextTask = false;
        $targetId = $target;

        if (strpos($target, "next:") === 0) {
            $targetId = substr($target, strlen("next:"));
            $nextTask = true;
        }

        if ($targetId == "null")
            return;

        $targetOrder = Gorev::find($targetId)->sortorder;
        if ($nextTask)
            $targetOrder++;

        Gorev::where("sortorder", ">=", $targetOrder)->increment("sortorder");

        $updatedTask = Gorev::find($taskId);
        $updatedTask->sortorder = $targetOrder;
        $updatedTask->save();}

    public function remove($id){
        Gorev::deleteGorev($id);
        $kaynak = Kaynak::where('gorev_id',$id)->first();
        Kaynak::deleteKaynak($kaynak->id);
        return redirect('/tasks');
    }

}
