<?php
namespace Minuz\Skoolie\Dados\Cache;
use Minuz\Skoolie\Dados\Cache\Cache;
use Minuz\Skoolie\Conteudo\Avaliacoes\{Prova, Exercicio};


class CacheProf extends Cache
{
    protected array $minhasAvaliacoes = [];
    public function __construct(string $nome)
    {
        parent::__construct($nome);
    }




    public function pegarProvas(): array
    {
        return $this->minhasAvaliacoes;
    }





    public function verListaAvaliacoes(): void 
    {
        $avaliacoes = "Aqui estão suas provas ainda não enviadas:" . PHP_EOL;
        foreach($this->minhasAvaliacoes as $avaliacao) {
            $tipo = get_class($avaliacao);


            $avaliacoes .= "Avaliacao: {$avaliacao->titulo}" . PHP_EOL . 
            "Código NIP: {$avaliacao->pegarNIP()}". PHP_EOL .
            "Questões: {$avaliacao->pegarNumeroQuestoes()} de {$tipo::pegarMaximoQuestoes()}" . PHP_EOL . PHP_EOL;
        }

        echo $avaliacoes;
    }
}