@extends('layouts.master3')

@section('content')

    <div id="content">
        <!-- /.box-header -->
            <div style="border-radius: 5px;" class="no-padding">
                <table class="table table-bordered table-striped " style="padding-bottom: 60px;  font-family:'Lucida Grande', sans-serif ; background-color:#DCDCDC ; color: #0c0c0c;">
                    <tr>
                        <th colspan="7" style="text-align: center; background-color: #00a7d0; font-size: larger" >GÖREVLER</th>
                    </tr>
                    <tr>
                        <th>Görev ID</th>
                        <th>Proje ID</th>
                        <th>Görev Adı</th>
                        <th>Başlangıç Tarihi</th>
                        <th>Bitiş Tarihi</th>
                        <th>Açıklama</th>
                        <th> </th>

                    </tr>


                    @foreach($gorevs as $gorev)
                        <tr>

                            <td> {{ $gorev->id}} </td>
                            <td> {{ $gorev->proje_id }}</td>
                            <td> {{ $gorev->gorev_adi}} </td>
                            <td> {{ $gorev->baslangic}} </td>
                            <td> {{ $gorev->bitis}} </td>
                            <td> {{ $gorev->aciklama}} </td>
                            <td>
                                <div style="padding-left: 15px" class="box-tools">

                                    <!-- button with a dropdown -->

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-bars"></i></button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="/tasks/{{$gorev->id}}/edit">Düzenle</a></li>
                                            <li><a href="/tasks/{{$gorev->id}}/delete">Sil</a></li>
                                            <li><a href="/tasks/{{$gorev->id}}/kaynak">Kaynak Ekle</a></li>

                                        </ul>
                                    </div>

                                </div>
                            </td>

                        </tr>
                    @endforeach

                </table>

                <a id="yeni gorev" class="btn btn-primary" href="/tasks/{{$project->id}}/create" aria-setsize="13"]>Yeni Görev Ekle</a>

            </div>
        <br>
        <a id="yeni gorev" class="btn btn-primary" href="/projects" aria-setsize="13"]>Projeler</a>

    </div>
        </div>
    </div>

@stop


