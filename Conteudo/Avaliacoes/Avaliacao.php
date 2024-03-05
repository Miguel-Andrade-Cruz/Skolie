<?php
namespace Minuz\Skoolie\Conteudo\Avaliacoes;


abstract class Avaliacao
{
    
    protected int $nota;
    protected string $nomeAluno;
    
    protected array $listaQuestoes = [];
    protected array $listaRespostas = [];

    protected int $numeroQuestoes = 0;
    protected static int $maximoQuestoes = 0;

    
    public function __construct(
        protected string $Professor,
        protected string $Turma,
        public string $titulo,
        public string $NIP
    ){
    }


    
    public function visualizarQuestoes(): void
    {
        $lista =
        <<<LISTA
        Essas são as perguntas da avaliação {$this->titulo}: 
        
        LISTA;
        
        foreach($this->listaQuestoes as $numero => $questao) {
            $numero++;
            $lista .= "Questão {$numero}: {$questao->pegarPergunta()}" . PHP_EOL;
        }
        
        echo $lista;
    }
    



    public function adicionarQuestoes(array $questoes): void 
    {
        foreach($questoes as $questao) {
            $tipo = get_class($this);
            if($this->numeroQuestoes >= $tipo::$maximoQuestoes) {
                echo "Liimite de questões atingido." . PHP_EOL;
                break;
            }

            $this->numeroQuestoes++;
            $this->listaQuestoes[] = $questao;
        }

    }
    
    public function removerQuestoes(array $numeros): void
    {
        foreach($numeros as $numero) {
            unset($this->listaQuestoes[$numero -1]);
        }
    }

    public function responderQuestao(int $numeroQuestao, string $resposta): void
    {
        $questao = $this->listaQuestoes[$numeroQuestao -1]; 

        $questao->responder($resposta);
    }


    public function darNota(int $nota): void 
    {
        $this->nota = $nota;
    }


    
    public function escreverNome(string $nome): void 
    {
        $this->nomeAluno = $nome;
    }


    public function pegarNIP(): string
    {
        return $this->NIP;
    }

    public function pegarNumeroQuestoes(): int 
    {
        return $this->numeroQuestoes;
    }

    public function completarNIP(string $complemento): void 
    {
        str_replace("XXXX", $complemento, $this->NIP);
    }
}