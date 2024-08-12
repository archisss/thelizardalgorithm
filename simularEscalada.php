<?php 

function simularEscalda($H,$U,$D,$F){
    // H -> altura del pozo 
    // U -> escalado x dia 
    // D -> resbala x la noche
    // F -> fatiga  

    $dia = 0;
    $altura = 0;
    $fatiga = $U * ($F /100);
    $escaladoXDia = $U;

    //si altura $altura<-0 se cayo el lagarto y fallo si $altura>H larato salio 
    while(true){
        $dia++;

        //intentamos escalar 
        if($escaladoXDia > 0){ //>0 aun puede intentar subir
            $altura += $escaladoXDia;
        }

        //verificar si el lagarto ya salio del pozo
        if($altura > $H){
            echo "sucess on day $dia \n";
            break;
        }

        //aplicar la resbalada antes de ver si ya fallo 
        $altura -=$D;

        if($altura < 0){
            echo "failure on day $dia \n";
            break;
        }

        //aplicar fatigar para ver como inicia el dia siguiente
        $escaladoXDia -=$fatiga;
    }
}

//Leer entradas desde el archivo
$archivo = fopen('input.txt','r');
$linea = fgets($archivo);
while($linea !== "0 0 0 0"){
   list($H,$U,$D,$F) = explode(" ",$linea);
   simularEscalda($H,$U,$D,$F);
   $linea = fgets($archivo);
}

//Entradas individuales
// echo simularEscalda(6,3,1,10);
// echo simularEscalda(10,2,1,50);




?>