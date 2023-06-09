<?php

namespace JasFayz\BracketChecker;

use InvalidArgumentException;

class Bracket
{
    public function __construct(private string $string)
    {
        $this->assertNotEmpty($this->string);
        $this->assertOnlyBracket($this->string);
    }

    public function assertNotEmpty(string $string)
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

    public function checker()
    {

        $arrayString = str_split($this->string);
        $counter = 0;

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