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
            <h2><p class= "text-center"> Táblas de Multiplicar Personalizada</p></h2>
        </div>
        <div class="container p-4 text-center">
                        <table  class='table table-bordered bg-light text-black'>
                        <tr></tr>
                        <tr><td class='success border border-secondary' colspan='2' align='center'>Tabla de el {{$numero}}</tr>
                        <?php 
                            $j=20;
                            $i=5;
                            $z=1;
                        ?>
                        @foreach(range(1,$j) as $j)
                            <?php
                            echo "<tr>";
                            foreach(range(1,$i) as $i)
                            {
                                if($z != 100+1)
                                {
                                    echo "<td>"."$numero * $z = ".$numero * $z."</td>";
                                }
                                else
                                {
                                break;
                                }
                                $z++;
                            }
                            echo "</tr>";
                            ?>
                        @endforeach
                        </table>
                        <br> <br>
                        <a class="btn btn-success" href="{{ asset('/ini') }}">Regresar</a>
                        </div>
        <!--Tablas de Multiplicar -->
    </body>
</html>