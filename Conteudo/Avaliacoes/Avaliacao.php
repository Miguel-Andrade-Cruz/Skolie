<?php
namespace Minuz\Skoolie\Conteudo\Avaliacoes;

use Minuz\Skoolie\Conteudo\Questoes\Questao;

abstract class Avaliacao
{
    
    protected int $nota;
    protected string $nomeAluno = "[. . .]";
    
    protected array $listaDeQuestoes = [];

    protected int $numeroQuestoes = 0;
    protected static int $maximoQuestoes = 0;
    protected int $totalRespondidas = 0;
    
    public function __construct(
        protected string $professor,
        protected string $turma,
        public string $titulo,
        public string $NIP
    ){
    }


    
    public function visualizaAvaliacao(): void
    {
        
        $cabecalho = "{$this->turma}, Prof. {$this->professor}, Código NIP: {$this->NIP}." . PHP_EOL;
        
        $nome = "Nome: {$this->nomeAluno}" . PHP_EOL;
        
        
        $questoesDaAvaliacao =
        <<<LISTA
        Avaliação: {$this->titulo}: 
        
        LISTA;
        
        foreach($this->listaDeQuestoes as $numero => $questao) {
            
            $questoesDaAvaliacao .= 
            "Questão {$numero}: {$questao->pegaPergunta()}". PHP_EOL . "{$questao->pegaResposta()}" . PHP_EOL;
        }
        
        echo $cabecalho . $nome . $questoesDaAvaliacao;
    }
    



    public function adicionaQuestoes(array $questoes): void 
    {
        $tipoDeAvaliacao = get_class($this);
        $limiteDeQuestoes = $tipoDeAvaliacao::pegaMaximoQuestoes();
        $quantidadeFaltante = $limiteDeQuestoes - $this->pegaNumeroQuestoes();

        $questoesFaltantes = array_slice($questoes, 0, $quantidadeFaltante);
        
        foreach($questoesFaltantes as $questao) {
            $this->adicionaOuRemoveQuestao(true);
            $this->listaDeQuestoes[$this->numeroQuestoes] = $questao;
        }

        echo 
        <<<AVISO
        Aviso: Apenas questões suficientes para completar a avaliação foram adicionadas.

        AVISO;
    }
    
    
    
    public function removeQuestoes(array $numeros): void
    {
        foreach($numeros as $numero) {
            $this->adicionaOuRemoveQuestao(false);
            unset($this->listaDeQuestoes[$numero]);
        }
    }



    public function respondeAvaliacao(array $questoesRespondidas): void
    {
        foreach($questoesRespondidas as $numeroDaQuestao => $resposta) {
            
            $questaoAtual = $this->listaDeQuestoes[$numeroDaQuestao]; 
            $questaoAtual->responde($resposta);
            $this->totalRespondidas++;
        }
    }


    public function marcaNota(int $nota): void 
    {
        $this->nota = $nota;
    }


    
    public function escreveNome(string $nome): void 
    {
        $this->nomeAluno = $nome;
    }


    public function pegaNIP(): string
    {
        return $this->NIP;
    }

    public function pegaNumeroQuestoes(): int 
    {
        return $this->numeroQuestoes;
    }

    public function pegaTitulo(): string 
    {
        return $this->titulo;
    }

    public function adicionaOuRemoveQuestao($adicionar): void
    {
        $adicionar === true ? $this->numeroQuestoes++ : $this->numeroQuestoes--;
    }

    public function pegaTotalRespondidas(): int 
    {
        return $this->totalRespondidas;
    }

    public function completaNIP(string $complemento): void 
    {
        str_replace("XXXX", $complemento, $this->NIP);
    }
}