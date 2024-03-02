<?php
namespace Minuz\Skoolie\Conteudo\Questoes\Objetivas;
use Minuz\Skoolie\Conteudo\Questoes\Objetivas\Objetiva;
use Minuz\Skoolie\Conteudo\Questoes\validacao\validaResposta;





class Alternativa extends Objetiva
{
    use validaResposta;

    static protected array $respostas_validas = ["A", "B", "C", "D", "E"];
    
    public function __construct(string $pergunta, string $resposta_certa)
    {
        parent::__construct($pergunta, $resposta_certa);
    }
    
    public static function pegaRespostasValidas(): array
    {
        return self::$respostas_validas;

    }
}