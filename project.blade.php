@extends('layouts.master3')
@section('content')
    <div style="border-radius: 5px;" class="no-padding">
        <table class="table table-bordered table-striped " style="padding-bottom: 60px;  font-family:'Lucida Grande', sans-serif ; background-color:#DCDCDC ; color: #0c0c0c;">
            <tr>
                <th colspan="7" style="text-align: center; background-color: #00a7d0; font-size: larger" >PROJE RAPORLARI</th>
            </tr>

            <tr>
                <th>Proje Adı</th>
                <th>Başlangıç Tarihi</th>
                <th>Bitiş Tarihi</th>
                <th>Açıklama</th>

            </tr>
            @foreach($projects as $project)
                <tr>


                    <td> {{ $project->proje_adi}} </td>
                    <td> {{ $project->baslangic}} </td>
                    <td> {{ $project->bitis}} </td>
                    <td> {{ $project->aciklama}} </td>
                    <td>
                        <div style="padding-left: 15px" class="box-tools">

                            <!-- button with a dropdown -->

                            <div class="btn-group">
                                <button type="button" class="btn btn-info  btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bars"></i></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="/projects/{{$project->id}}/report">Raporla</a></li>

                                </ul>
                            </div>

                        </div>
                    </td>

                </tr>
            @endforeach

        </table>

    </div>


@endsection

@section('script')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>--}}

    <script>
        $('#import').click(function () {





        });

        $('.project_card').mouseenter(function(){
            $(this).css('background-color','#E1E1E1');
        } ).mouseleave(function()
        {
            $(this).css('background-color','#C3C3C3');
        });
    </script>
@stop

