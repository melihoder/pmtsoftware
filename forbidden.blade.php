@extends('layouts.master3')

@section('style')
    <style>
        body{
            color: #DCDCDC;
        }
    </style>
    @endsection
@section('content')


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                500 Error Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i>Anasayfa</a></li>
                <li class="active">500 error</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="error-page">
                <h2 class="headline text-red">500</h2>

                <div class="error-content">
                    <h3><i class="fa fa-warning text-red"></i> Bir problem oluştu!</h3>

                    <p>
                        Bu sayfaya erişim izniniz bulunmamaktadır.
                        Bu durumda, <a href="/admin/dashboard"> Ev dizinine geri dönebilirsiniz. <i class="fa fa-home"></i></a>
                        <br><a href="">Geri Dön <i class="fa fa-reply"></i></a>
                    </p>


                </div>
            </div>
            <!-- /.error-page -->

        </section>
        <!-- /.content -->


    @stop
