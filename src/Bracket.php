<?php

namespace JasFayz\BracketChecker;

use InvalidArgumentException;

class Bracket
{
    private string $string;

    public function __construct($string)
    {
        $this->string = $string;
        $this->assertNotEmpty($this->string);
        $this->assertOnlyBracket($this->string);
    }

    private function assertNotEmpty(string $string)
    {
        if ($string === '') {
            throw new InvalidArgumentException('Пустая строка');
        }
    }

    private function assertOnlyBracket(string $string)
    {
        if (!preg_match('/^[()]*$/', $string)) {
            throw new InvalidArgumentException("Аргумент должен содержать только скобки");
        };
    }

    public function getValue()
    {
        return $this->string;
    }

    public function checker(): bool
    {

        $arrayString = str_split($this->string);
        $counter = 0;

        if ($arrayString[0] === ')') {
            return false;
        }

        foreach ($arrayString as $key => $char) {
            if ($char == '(') {
                $counter++;
            } else {
                $counter--;
            }
        }

        return $counter === 0;
    }
}

