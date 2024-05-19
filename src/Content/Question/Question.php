<?php
namespace Minuz\Skolie\Content\Question;

abstract class Question
{
    protected string $answer;
    

    public function __construct(
        public readonly string $question,
        protected string $template,
    ) {

    }


    public function sendTemplate(): string
    {
        return $this->template;
    }

    public function setAnswer($answer): void
    {
        $this->answer = $answer;
    }


    public function getAnswer(): string
    {
        return $this->answer;
    }
}
