<?php

function closedTag($tag, $content, $attributes): string
{
    $open = "<$tag";
    
    if(!$attributes){
        foreach ($attributes as $attribute => $value){
            $open .= " $attribute='$value'";
        }
    }

    $open .= ">";

    $closed = "</$tag>";

    return PHP_EOL . $open . $content . $closed . PHP_EOL;

}



function openedTag($tag, $attributes): string
{
    $openTag = "< $tag";
    
    foreach ($attributes as $attribute => $value){
        $openTag .= " $attribute='$value'";
    }

    $openTag .= ">" . PHP_EOL;
    return $openTag;
}




function displayFrame($content): string
{
    $testTIN = $content["TIN"];
    
    $title = closedTag("a", $content["title"], ["href" => "/test?tin=$testTIN"]);
    $classroom = closedTag("p", $content["classroom"], false);
    $status = closedTag("p", $content["is_done"], false);
    $color_div = closedTag("div", "", false);

    $foramtted_content = $title . $classroom . $status . $color_div;
    $frame = closedTag("section", $foramtted_content, false);

    return $frame;
}

function displayInvalidLogin($isInvalid): string
{
    if($isInvalid == "false") {
        return "<p id='fail'>Login Inválido</p>";
    }
    return "";
}