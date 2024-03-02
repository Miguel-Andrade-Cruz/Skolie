<?php
namespace Minuz\Skoolie\Conteudo\Avaliacoes;


abstract class Avaliacao
{
    protected int $nota;
    protected string $nomeAluno;
    
    protected array $listaQuestoes = [];
    protected int $numeroQuestoes = 0;
    
    public function __construct(
        protected string $Professor,
        protected string $Turma,
        public string $titulo,
        public int $NIP
    ){
    }


    

    public function pegaNIP(): int
    {
        return $this->NIP;
    }

    public function visualizarQuestoes(): void
    {
        $lista =
        <<<LISTA
        Essas são as perguntas da avaliação {$this->titulo}:
        LISTA;
        
        foreach($this->listaQuestoes as $numero => $questao) {
            $numero++;
            $lista .= "Questão {$numero}: {$questao->pegaPergunta()}" . PHP_EOL;
        }

        echo $lista;
    }



    public function darNota($nota): void 
    {
        $this->nota = $nota;
    }

    public function escreveNome($nome): void 
    {
        $this->nomeAluno = $nome;
    }
}