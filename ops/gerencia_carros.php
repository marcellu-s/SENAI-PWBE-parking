<?php

require_once "../ops/db.php";

$operacao = $_GET['op'];

date_default_timezone_set('America/Sao_paulo');

// <--------------------------------------------------------------------------->
// FUNÇÃO PARA CALCULAR O VALOR PELA DIFERENÇA DOS HORÁRIOS

function calcularValor($entrada, $saida) {
    @$entrada_dt = new DateTime($entrada);
    @$saida_dt = new DateTime($saida);

    @$diff_segundos = $saida_dt->getTimestamp() - $entrada_dt->getTimestamp();

    if ($diff_segundos <= 900) { // Este condicional decide o preço
        return 0;
    } else {
        $diff_horas = ceil($diff_segundos / 3600);
        if ($diff_horas == 1) {
            return 27;
        } elseif ($diff_horas == 2) {
            return 32;
        } else {
            return 32 + ($diff_horas - 2) * 9;
        }
    }
}


// <--------------------------------------------------------------------------->
// SE A OPERACAO TIVER O VALOR ABAIXO VAI SER POSTO A ENTRADA COM A DATA ATUAL E A HORA ESCOLHIDA

if ($operacao == "entrada-personalizada") {


    if ($_POST['vagas_restantes'] > 0) {

        $client_name = $_POST['client-name'];
        $placa = strtoupper($_POST['placa']);;
        $data = date('Y-m-d');
        $horario = $_POST['tempo'];

        $data_horario = $data.$horario;
        
        $sql = mysqli_query($conn, "SELECT PLACA FROM carros WHERE PLACA = '$placa' AND SAIDA IS NULL;");

        if (mysqli_num_rows($sql) >= 1) {
            $_SESSION['msg'] = "<script>window.alert('Carro não registrado: o mesmo já se encontra no estacionamento')</script>";
        } else {
            $sql = mysqli_query($conn,"INSERT INTO carros(CLI_NOME, PLACA, ENTRADA) VALUES('$client_name', '$placa','$data $horario')");

            $_SESSION['msg'] = "<script>window.alert('Carro REGISTRADO com sucesso')</script>";
        }

        header("Location: ../admin_pages/control_panel.php?info_select=now");
    } else {
        $_SESSION['msg'] = "<script>window.alert('Carro não registrado - não há vagas disponíveis no momento')</script>";
        header("Location: ../admin_pages/insert_car.php");
    }

}

// <--------------------------------------------------------------------------->
// 1- QUANDO ACIONADO:
// A OPERAÇÃO ABAIXO É EXECUTADA QUANDO O CAMPO INPUT DA NA TABELA É ACIONADO

// 2- MUDANÇA NA TABELA:
// BASICAMENTE ADICIONA/ATUALIZA O VALOR DA SAÍDA E ASSIM SENDO JÁ ADICIONA AS HORAS EM QUE O CARRO FICOU
// ESTACIONADO E O VALOR A SER PAGO

// 3 - NÃO APARECE MAIS NA BUSCA "ESTACIONADO": 
// A ROW VAI SER DEIXAR DE CONSTAR NOS "ESTACIONADO", CONSIDERANDO QUE O VALOR VAI SER PAGO LOGO APÓS
// A EXECUÇÃO ABAIXO

elseif ($operacao == "saida") {

    $carroId = $_POST['id_carro'];
    $horarioSaida = $_POST['horario_saida'];

    if ($horarioSaida == '') {
        $horarioSaida = date('H:i');
    }

    $dataEntrada = strtotime(substr("" . $_POST['data_entrada'] . "",0,-9));
    
    if (!(date('Y-m-d H:i', $dataEntrada) < date('Y-m-d'))) {

        $datetimeSaida = date('Y-m-d') . " $horarioSaida";
        
        $enviar = mysqli_query($conn, "UPDATE carros SET SAIDA = '$datetimeSaida' WHERE ID = '$carroId'");
        $total = mysqli_query($conn, "UPDATE carros SET TOTAL = TIMEDIFF(SAIDA, ENTRADA) WHERE ID = '$carroId'");
        $query_valor1 = mysqli_query($conn, "SELECT ENTRADA, SAIDA FROM carros WHERE ID = '$carroId'");

    
        while ($row = mysqli_fetch_array($query_valor1)) {
            $valor = calcularValor("" . $row['ENTRADA'] . "", "" . $row['SAIDA'] . "");
            mysqli_query($conn, "UPDATE carros SET VALOR = $valor WHERE ID = '$carroId'");
        }

    } else {
        $datetimeSaida = date('Y-m-d', $dataEntrada) . " 23:00";

        $enviar = mysqli_query($conn, "UPDATE carros SET SAIDA = '$datetimeSaida' WHERE ID = '$carroId'");
        $total = mysqli_query($conn, "UPDATE carros SET TOTAL = TIMEDIFF(SAIDA, ENTRADA) WHERE ID = '$carroId'");
        $query_valor1 = mysqli_query($conn, "SELECT ENTRADA, SAIDA FROM carros WHERE ID = '$carroId'");

        while ($row = mysqli_fetch_array($query_valor1)) {
            $valor = calcularValor("" . $row['ENTRADA'] . "", "" . $row['SAIDA'] . "");
            mysqli_query($conn, "UPDATE carros SET VALOR = $valor WHERE ID = '$carroId'");
        }

        $total = mysqli_query($conn, "UPDATE carros SET TOTAL = 'GUINCHADO' WHERE ID = '$carroId'");
    }

    header('Location: ..\admin_pages\control_panel.php?info_select=now');
}


// <--------------------------------------------------------------------------->
// A OPERAÇÃO ABAIXO QUANDO EXECUTADA FAZ A ATUALIZAÇÃO DE TODAS AS LINHAS QUE:

//      1 - A SAÍDA É NULA E A DATA DE ENTRADA É MENOR QUE A ATUAL:
//
//              --> ADICIONA O VALOR CONSIDERANDO A DIFERENÇA DO HORARIO DE ENTRADA DO VEICULO
//              E 23:00 HORAS DO DIA DA ENTRADA
//              
//                  EX: ENTROU AS 13:00 E O ESTACIONAMENTO FECHOU; 
//                      O VALOR VAI SER O VALOR DE 10:00 HORAS ESTACIONADOS
//
//              --> ATUALIZA A DIFERENÇA DE HORAS PARA A STRING "GUINCHADO"
//
//      2 - SE A SAIDA FOR NULA E DATA DE ENTRADA É A MESMA QUE A ATUAL MAS JÁ FECHOU O ESTACIONAMENTO(DPS DAS 23:00):
// 
//              --> ADICIONA O VALOR CONSIDERANDO A DIFERENÇA DO HORARIO DE ENTRADA DO VEICULO
//              E 23:00 HORAS DO DIA DA ENTRADA
//
//              --> ATUALIZA A DIFERENÇA DE HORAS PARA A STRING "GUINCHADO"


elseif ($operacao == 'atualizacao') {

    $data = date('Y-m-d');

    $horario_fechamento = new DateTime('23:00');

    $query = mysqli_query($conn, "SELECT * FROM carros WHERE SAIDA IS NULL AND DATE(ENTRADA) < '" . $data ."'");

    while($row = mysqli_fetch_array($query)) {

        $saida_obrigatoria = date('Y-m-d H:i', strtotime(substr($row['ENTRADA'], 0, 10) . "23:00"));

        $query_data_saida = mysqli_query($conn, "UPDATE carros SET SAIDA = '". $saida_obrigatoria  ."' WHERE ID = " . $row['ID']);
        $valor = calcularValor("" . $row['ENTRADA'] . "", "" . $saida_obrigatoria . "");

        $query_guincho = mysqli_query($conn, "UPDATE carros SET TOTAL = 'GUINCHADO' WHERE ID = " . $row['ID']);
        $query_guincho = mysqli_query($conn, "UPDATE carros SET VALOR = '$valor' WHERE ID = " . $row['ID']);
    }

    if (date('H:i') > $horario_fechamento) {

        $query = mysqli_query($conn, "SELECT * FROM carros 
        WHERE SAIDA IS NULL 
        AND DATE(ENTRADA) = '" . $data."'");

        while($row = mysqli_fetch_array($query)) {

            $valor = calcularValor("" . $row['ENTRADA'] . "", "" . $saida_obrigatoria . "");

            $query_guincho = mysqli_query($conn, "UPDATE carros SET VALOR = '$valor' WHERE ID = " . $row['ID']);
            $query_guincho = mysqli_query($conn, "UPDATE carros SET SAIDA = '". $data ."', TOTAL = 'GUINCHADO' WHERE ID = " . $row['ID']);
        }

    }


    header('Location: ..\admin_pages\control_panel.php?info_select=now');
}
