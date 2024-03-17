<?php
namespace Minuz\Skoolie\Content\Queries;

abstract class Query
{
    protected ?string $answer;

    public function __construct(protected string $question)
    {
    }

    abstract public function writeDown(string $answer): void;


    // GETTERS AND SETTERS
    
    public function getQuestion(): string
    {
        return $this->question;
    }
    
    public function getAnswer(): string 
    {
        return $this->answer;
    }
}