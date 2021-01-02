@extends('layouts.master3')
@section('content')
    <div style="border-radius: 5px;" class="no-padding">
        <table class="table table-responsive" style="padding-bottom: 60px;  font-family:'Lucida Grande', sans-serif ; background-color:#DCDCDC ; color: #0c0c0c;">
            <tr>
                <th colspan="4" style="text-align: center; background-color: #00a7d0; font-size: larger" >PROJE ADI: {{$project->proje_adi}}</th>
            </tr>

            <tr>
                <th style="font-size: larger">Başlangıç Tarihi: </th> <th style="font-size: larger">{{$project->baslangic}}</th>
                <th style="font-size: larger">Bitiş Tarihi: </th> <th style="font-size: larger">{{$project->bitis}}</th>
            </tr>
            <tr>
                <th colspan="1" style="font-size: larger">Açıklama: </th> <th COLSPAN="3" style="font-size: larger">{{$project->aciklama}}</th>

            </tr>

            </table>

        <div style="border-radius: 5px;" class="no-padding">
            <table class="table table-bordered table-striped " style="padding-bottom: 60px;  font-family:'Lucida Grande', sans-serif ; background-color:#DCDCDC ; color: #0c0c0c;">
                <tr>
                    <th colspan="6" style="text-align: center; background-color: #a6a6a6; font-size: larger" >Görevler</th>
                </tr>
                <tr>
                    <th>Gorev ID</th>
                    <th>Görev Adı</th>
                    <th>Başlangıç Tarihi</th>
                    <th>Bitiş Tarihi</th>
                    <th>Açıklama</th>

                </tr>
                @foreach($tasks as $task)
                    <tr>
                        <td> {{ $task->id }}</td>
                        <td> {{ $task->gorev_adi}} </td>
                        <td> {{ $task->baslangic}} </td>
                        <td> {{ $task->bitis}} </td>
                        <td> {{ $task->aciklama}} </td>
                    </tr>
                @endforeach

            </table>
                </div>
        <div style="border-radius: 5px;" class="no-padding">
            <table class="table table-bordered table-striped " style="padding-bottom: 60px;  font-family:'Lucida Grande', sans-serif ; background-color:#DCDCDC ; color: #0c0c0c;">
                <tr>
                    <th colspan="7" style="text-align: center; background-color: #a6a6a6; font-size: larger" >Kaynaklar</th>
                </tr>
                <tr>
                    <th>Kaynak ID</th>
                    <th>Kaynak Adı</th>
                    <th>Miktar</th>
                    <th>Birim</th>
                    <th>Açıklama</th>

                </tr>
                @foreach($resources as $kaynak)
                    <tr>

                        <td> {{ $kaynak->id}} </td>
                        <td> {{ $kaynak->kaynak_adi}} </td>
                        <td> {{ $kaynak->miktar}} </td>
                        <td> {{ $kaynak->birim}} </td>
                        <td> {{ $kaynak->aciklama}} </td>


                    </tr>
                @endforeach

            </table>
        </div>


    </div>

@endsection

