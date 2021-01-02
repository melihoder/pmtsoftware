@extends('layouts.master3')

@section('content')

    <h1 class="page-header" style="color: white">Düzenle</h1>
    @if(\Session::has('error'))
        <div class="alert alert-danger">
            <p>{{\Session::get('error')}}</p>
        </div>
    @endif
    @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
    @endif
    <form method="post" action={{url('tasks/'.$gorev->id)}}>
        {{csrf_field()}}
        {{method_field('put')}}
        <div class="form-group">
            <input type="text" name="gorev_adi" class="form-control" value="{{$gorev->gorev_adi}}"/>
        </div>
        <div class="form-group">
            <input type="text" name="baslangic" class="form-control" value="{{$gorev->baslangic}}" onfocus="typeChange(this,'text','date')" onblur="typeChange(this,'text','date')"/>
        </div>
        <div class="form-group">
            <input type="text" name="bitis" class="form-control" value="{{$gorev->bitis}}" onfocus="typeChange(this,'text','date')" onblur="typeChange(this,'text','date')"/>
        </div>
        <div class="form-group">
            <input type="text" name="aciklama" class="form-control" value="{{$gorev->aciklama}}"/>
        </div>

        <div class="form-group">
            <input type="submit" value="Değişikliği Kaydet" class="btn btn-primary"/>

        </div>
    </form>
<a type="button" class="btn btn-primary" href="/tasks">Görevler</a>
@endsection()
