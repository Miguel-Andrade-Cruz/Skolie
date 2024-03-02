<?php
namespace Minuz\Skoolie\Conteudo\Questoes\Objetivas;
use Minuz\Skoolie\Conteudo\Questoes\Objetivas\Objetiva;
use Minuz\Skoolie\Conteudo\Questoes\validacao\validaResposta;




class Afirmativa extends Objetiva
{

    use validaResposta;

    protected static array $respostas_validas = ["V", "F"];

    public function __construct(string $pergunta, string $resposta_certa)
    {
        parent::__construct($pergunta, $resposta_certa);
    }
    
    public static function pegaRespostasValidas(): array
    {
        return self::$respostas_validas;
    }

    
}