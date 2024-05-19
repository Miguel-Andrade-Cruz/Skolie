<?php
namespace Minuz\Skolie\Data\repository;
use Minuz\Skolie\Data\Repository;
use PDO;

class teacherRepository extends Repository
{

    public readonly string $EN;
    public function __construct($name, $EN)
    {
        parent::__construct($name);
        $this->EN = $EN;
    }



    public function pullModelTestFrames(): array|false
    {
        $order = "
        SELECT
            t.title, t.classroom, t.is_done, t.TIN
        FROM
            school_database.tests t
        
        WHERE
            t.teacher_EN = '$this->EN'
        ;
        ";

        $statement = $this->pdo->query($order);
        
        $modelTests = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(empty($modelTests)) {
            return false;
        }
        return $modelTests;
    }


    public function testAvaliable($TIN): bool
    {
        $order = "
        UPDATE
            school_database.tests t
        SET
            is_done = 'Disponível'
        WHERE
            TIN = '$TIN'
        AND
            t.teacher_EN = '$this->EN';
        ";

        return $this->pdo->exec($order);
    }


    public function pullSingleTest($TIN): array
    {
        $headerOrder = "
        SELECT
            test.title,
            test.classroom,
            test.is_done
        FROM 
            school_database.model_tests test
        WHERE
            test.TIN = '$TIN';
        ";


        $bodyOrder = "
        SELECT
            questions.ask_description,
            questions.template
        FROM
            school_database.questions questions
        WHERE
            questions.TIN = '$TIN';
        ";

        $headerStatement = $this->pdo->query($headerOrder);
        $bodyStatement = $this->pdo->query($bodyOrder);

        $header_test_data = $headerStatement->fetchAll(PDO::FETCH_ASSOC);
        $body_test_data = $bodyStatement->fetchAll(PDO::FETCH_ASSOC);

        $test_data = $header_test_data + $body_test_data;
        return $test_data;
    }


    public function newTest($form): bool
    {
        $title = $form["title"];
        $classroom = $form["classroom"];
        
        $order = "
        INSERT INTO school_database.model_tests (title, teacher, EN, classroom)
        VALUES
            ('$title', '$this->name', '$this->id', '$classroom')
            ;
        ";
        
        $was_added = $this->pdo->exec($order);
        return $was_added;
    }
    
    
    public function newQuestion($questionData): bool 
    {
        $question_number = $questionData["question_number"];
        $ask_description = $questionData["ask_description"];
        $template = $questionData["template"];
        
        $order = "
        INSERT INTO school_database.questions (TIN, id_question, ask_description, template)
        VALUES
        (last_insert_id(), '$question_number', '$ask_description', '$template');
        ";
        
        $was_added = $this->pdo->exec($order);
        return $was_added;

    }


    public function testsFollowUp(): array
    {
        $order = "
        ";
    }


    public function deleteTest($TIN): void
    {

    }


    public function editTest($TIN): void
    {
        
    }
}