<?php
define ("RAIZ", __DIR__);
require_once './vendor/autoload.php';


use Minuz\Skoolie\Conteudo\Questoes\Objetivas\{Afirmativa, Alternativa};

use Minuz\Skoolie\Pessoas\Turma\{Turma, Aluno};
use Minuz\Skoolie\Pessoas\Funcionarios\{Professor};




$terceiroB = new Turma("3B");

$rodrigo = new Aluno("Rodrigo", $terceiroB, 2322);
$rebeca = new Aluno("Rebeca", $terceiroB, 3311);
$carlos = new Aluno("Carlos", $terceiroB, 6089);

$Rosana = new Professor("Rosana");
$Roy = new Professor("Roy");


$ladrilhamento = [
    new Afirmativa("Todo ladrilhamento uniforme usa polígonos regulares.", "V"),
    new Afirmativa("Qualquer polígono pode ladrilhar um plano.", "F"),
    new Afirmativa(" Qualquer polígono pode ladrilhar um plano.", "V")
];


$Roy->montarExercicio(2704, "Ladrilhamento platônico", $terceiroB->Turma, $ladrilhamento);
$Rosana->montarProva(3232, "Ladrilhamento", $terceiroB->Turma, $ladrilhamento);

$minhasAvaliacoes = $Rosana->pegaCache();
$minhasAvaliacoes->verMinhasProvas();

$exerciciosRoy = $Roy->pegaCache();

$exerciciosRoy->verMinhasProvas();

