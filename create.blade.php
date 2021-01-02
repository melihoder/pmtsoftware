@extends('layouts.master3')

@section('style')
    <style>
        #form {
                color: #DCDCDC;
            }

    </style>
@endsection




@section('content')

    <h2 class="page-header" style="color: lightgrey;" >Yeni Görev Formu</h2>
    <br />
    {{--  @if(count($errors)>0)
          <div class="alert alert-danger">
              <ul>
                  @foreach($errors -> all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
              </ul>

          </div>
      @endif--}}

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
    <form method="post" action="{{url('tasks')}}">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" name="gorev_adi" class="form-control" placeholder="Görev Adını Giriniz"/>
        </div>
        <div class="form-group">
            <input type="text" name="proje_id" class="form-control" value="{{$project->id}}" readonly/>
        </div>
        <div class="form-group">
            <input type="date" name="baslangic" class="form-control" placeholder=" "/>
        </div>
        <div class="form-group">
            <input type="date" name="bitis" class="form-control" placeholder=" "/>
        </div>
        <div class="form-group">
            <input type="text" name="aciklama" class="form-control" placeholder="Açıklama Giriniz"/>
        </div>

        <div class="form-group">
            <input type="submit" value="Görev Kaydet" class="btn btn-primary"/>

        </div>
        <a id="yeni gorev" class="btn btn-primary" href="/projects/{{$project->id}}/gorev" aria-setsize="13">Görevler</a>
    </form>

    </div>
    </div>




    </section>

@endsection()

