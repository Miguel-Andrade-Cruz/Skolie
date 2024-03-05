<?php
use Minuz\Skoolie\Conteudo\Questoes\Objetivas\Afirmativa;
define ("RAIZ", __DIR__);
require_once './vendor/autoload.php';


use Minuz\Skoolie\Pessoas\Grupos\Turma\{Turma, Aluno};
use Minuz\Skoolie\Pessoas\Grupos\Funcionarios\{Professor};

$terceiroB = new Turma("3B");

$rodrigo = new Aluno("Rodrigo", $terceiroB, 2322);
$rebeca = new Aluno("Rebeca", $terceiroB, 3311);
$carlos = new Aluno("Carlos", $terceiroB, 6089);

$Rosana = new Professor("Rosana", "2329", $terceiroB);
$Roy = new Professor("Roy", "1209", $terceiroB);


$questoes = [

    new Afirmativa("Foi a praia", "V"),
    new Afirmativa("Visita a USP", "F"),
    new Afirmativa("Carambolas!", "V"),
    new Afirmativa("Pepê e nenem", "F"),
];


$maisDelas = [

    new Afirmativa("caiu na balela", "V"),
    new Afirmativa("Foi oque foi", "F"),
    new Afirmativa("belezura", "V"),
    new Afirmativa("Tem nada aqui não", "F"),
    new Afirmativa("Mim roubaram", "F"),
];

$Rosana->montarProva("134-XXXX", "Integradores", $terceiroB->Turma, $questoes);
$cleber = $Rosana->montarExercicio("164-XXXX", "Realização", $terceiroB->Turma, $maisDelas);




$Rosana->entregarProvasProntas();

$Rosana->verMinhasAvaliacoes();

