<?php
require 'functions.php'; 

use PHPUnit\Framework\TestCase;

class StringFunctionsTest extends TestCase 
{
    public function testInvertWordsWithPunctuationAndCase() 
    {
        $this->assertEquals('Tac', invertWordsWithPunctuationAndCase('Cat'));
        $this->assertEquals('esuOh', invertWordsWithPunctuationAndCase('houSe'));
        $this->assertEquals('tnAhPele', invertWordsWithPunctuationAndCase('elEpHant'));
        $this->assertEquals('tac,', invertWordsWithPunctuationAndCase('cat,'));
        $this->assertEquals("si 'dloc' won", invertWordsWithPunctuationAndCase("is 'cold' now"));
        $this->assertEquals('driht-trap', invertWordsWithPunctuationAndCase('third-part'));
        $this->assertEquals('nac`t', invertWordsWithPunctuationAndCase('can`t'));
    }

    public function testEmptyString() 
    {
        $this->assertEquals('', invertWordsWithPunctuationAndCase(''));
    }

    public function testOnlyPunctuation() 
    {
        $this->assertEquals('.,!?', invertWordsWithPunctuationAndCase('.,!?'));
    }
}
