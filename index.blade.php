<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="/css/libs/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/cover.css">

    <style>
        /*Fonts*/

        @font-face {
            font-family: f1;
            src: url("/css/fonts/FantasqueSansMono-Bold.woff");
        }
        @font-face {
            font-family: f2;
            src: url("/css/fonts/FantasqueSansMono-Regular.woff2");
        }

        /*Fonts */
        .masthead-brand{
            color: white;
            font-family: f2;
        }
        .cover-heading{
            font-family: f2;
            color: white;
        }
    </style>
</head>

<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">PMTSOFTWARE</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li class="active"><a href="/">Hakkımızda</a></li>
                            <li><a href="/contact">İletişim</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <h1 class="cover-heading">Proje Geliştirme Aracı</h1>
                <p class="lead">Bu proje, Ahmet Yesevi Üniversitesi Bilgisayar Bölümü Proje I dersi kapsamında, Doç. Dr. Hidayet Takçı Danışmanlığında geliştirilmiştir.</p>
                <p style="font-family: f1; font-size: large">MELİH ÖDER</p>
                @if(Auth::guest())

                @endif
                    @if(Auth::guest())
                <p class="lead"> <p>  </p>
                    <a href="/dashboard" class="btn btn-lg btn-default">Giriş</a>
                </p>
                     @endif
                    @if(Auth::user())
                    <p class="lead"> <p> Go to   </p>
                    <a href="/admin/dashboard" class="btn btn-lg btn-default">Dashboard</a>
                    </p>
                    @endif
            </div>



        </div>

    </div>

</div>
<script src="/js/libs/jquery.js"></script>
<script src="/js/libs/bootstrap.min.js"></script>
</body>


</html>
