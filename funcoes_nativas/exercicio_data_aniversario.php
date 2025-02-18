<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício Data de Aniversário</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            color: #343a40;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 10px;
        }

        h2 {
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        li {
            margin: 5px 0;
        }

        .resultado {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
        }

        .resultado p {
            font-size: 1.1em;
            margin: 10px 0;
        }

        strong {
            color: #007bff;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #6c757d;
        }
    </style>

</head>

<body>

    <h1>Exercício Data de Aniversário</h1>
    <h2>Desenvolver um algoritmo que :</h2>
    <ul>
        <li>Defina uma variável com o valor da sua data de nascimento;</li>
        <li>Exiba na tela sua idade;</li>
        <li>O mês do seu aniversário;</li>
        <li>Dia do seu aniversário;</li>
        <li>Qual será o dia da semana quando você estiver de aniversário;</li>
    </ul>

    <div class="resultado">

        <?php

        // Define a data de nascimento
        $dataNascimento = "2007-12-14";

        // Cria um objeto para a data atual
        $dataAtual = new DateTime();
        // Cria um objeto para a data de nascimento
        $dataNascimentoObj = new DateTime($dataNascimento);

        // Calcula a idade
        $idade = $dataAtual->diff($dataNascimentoObj)->y;
        echo "<p>Sua idade: <strong>" . $idade . " anos</strong></p>";

        // Obtém o mês e o dia do aniversário
        $mesAniversario = $dataNascimentoObj->format('m');
        $diaAniversario = $dataNascimentoObj->format('d');

        echo "<p>Mês do aniversário: <strong>" . $mesAniversario . "</strong></p>";
        echo "<p>Dia do aniversário: <strong>" . $diaAniversario . "</strong></p>";

        // Determina o ano atual
        $anoAtual = $dataAtual->format('Y');
        // Cria um objeto para o aniversário deste ano
        $aniversarioEsteAno = new DateTime($anoAtual . '-' . $mesAniversario . '-' . $diaAniversario);

        // Verifica se o aniversário já passou este ano
        if ($aniversarioEsteAno < $dataAtual) {
            // Se sim, calcula para o próximo ano
            $anoProximo = $anoAtual + 1;
            $aniversarioProximo = new DateTime($anoProximo . '-' . $mesAniversario . '-' . $diaAniversario);
        } else {
            // Se não, usa o aniversário deste ano
            $aniversarioProximo = $aniversarioEsteAno;
        }

        // Obtém o dia da semana do próximo aniversário
        $diaSemana = $aniversarioProximo->format('l');
        echo "<p>O dia da semana do próximo aniversário será: <strong>" . $diaSemana . "</strong></p>";

        ?>

    </div>

</body>

</html>