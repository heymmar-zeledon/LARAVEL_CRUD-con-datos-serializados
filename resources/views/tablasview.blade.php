<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            div.boton
            {
                text-align: center;
            }
        </style>

        <title> Tablas Basicas </title>
    </head>
    <body>
        <div class="p-3 mb-2 bg-secondary text-white">
            <h2><p class= "text-center"> Táblas Básicas de Multiplicar</p></h2>
        </div>
        <div class="container p-4 col-auto text-center">
            <div class = "row">
                    @for($i=1;$i<=10;$i++)
                        <div class= 'col-md-3'>
                        <table  class='table table-bordered p-3 mb-2 bg-light text-black'>
                        <tr></tr>
                        <tr><td class='success border border-secondary' colspan='2' align='center'>Tabla de el {{$i}}</tr>
                        @for($j=1;$j<=12;$j++)
                            <?php
                            $R =$i*$j;
                            $d = $j;
                            $S = $i * ++$d;
                            ?>
                            <tr><td class="border border-info" align="center">{{$i}} x {{$j}} = {{$R}}</td>
                            @if($d<=12)
                                <td class="border border-info" align="center">{{$i}} x {{$d}} = {{$S}}</td> </tr>
                            @endif
                            <?php
                            $j=$d;
                            ?>
                        @endfor
                        </table>
                        <br> <br>
                        </div>
                    @endfor
            </div>
            <a class="btn btn-success" href="{{ asset('/ini') }}">Regresar</a>
        </div>
        
        <!--Tablas de Multiplicar -->
    </body>
</html>