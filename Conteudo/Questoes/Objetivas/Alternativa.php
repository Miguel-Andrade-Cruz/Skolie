<?php
namespace Minuz\Skoolie\Conteudo\Questoes\Objetivas;
use Minuz\Skoolie\Conteudo\Questoes\Objetivas\Objetiva;





class Alternativa extends Objetiva
{

    static protected array $respostas_validas = ["A", "B", "C", "D", "E"];
    
    public function __construct(string $pergunta, string $resposta_certa)
    {
        parent::__construct($pergunta, $resposta_certa);
    }
    
    public static function confereRespostasValidas(): array
    {
        return self::$respostas_validas;

    }
}