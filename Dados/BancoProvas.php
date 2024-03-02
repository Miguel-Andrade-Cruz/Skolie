<?php
namespace Minuz\Skoolie\Dados;


class BancoProvas
{
    public function __construct(protected string $turma)
    {
    }

    private static array $ProvasModelo = [];

    private static array $ProvasAlunos = [];


    public function adicionarProvaModelo(&$provaModelo): void
    {
        self::$ProvasModelo[$provaModelo->titulo] = $provaModelo;
    }

    public function adicionarProvaAluno(&$provaAluno): void 
    {
        self::$ProvasAlunos[$provaAluno->nome] = $provaAluno;
    }


    public function olharProvasModelo(): void 
    {
        print_r(self::$ProvasModelo);
    }

    
}