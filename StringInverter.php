<?php

// inverse word, with saved Case
function invertWordWithCase($word) 
{
    $invertedWord = '';

    for ($i = mb_strlen($word) - 1; $i >= 0; $i--) 
    {
        $invertedWord .= mb_substr($word, $i, 1);
    }
    
    return $invertedWord;
}


// split and reverse
function invertWordsWithPunctuationAndCase($str) 
{
    preg_match_all('/\w+|[^\w\s]| /u', $str, $matches);
    $tokens = $matches[0];
    
    $resultTokens = [];
    
    foreach ($tokens as $token) 
    {
        if (ctype_alpha($token)) 
        {
            $invertedWord = invertWordWithCase($token);
            $resultWord = '';

            for ($i = 0; $i < mb_strlen($token); $i++) 
            {
                $resultWord .= ctype_upper(mb_substr($token, $i, 1)) ? mb_strtoupper(mb_substr($invertedWord, $i, 1)) : mb_strtolower(mb_substr($invertedWord, $i, 1));
            }
            array_push($resultTokens, $resultWord);
        } 
        
        else 
        {
            array_push($resultTokens, $token);
        }
    }
    
    return implode('', $resultTokens);
}

echo invertWordsWithPunctuationAndCase("Cat") . "\n";
echo invertWordsWithPunctuationAndCase("houSe") . "\n";
echo invertWordsWithPunctuationAndCase("elEpHant") . "\n";
echo invertWordsWithPunctuationAndCase("cat,") . "\n";
echo invertWordsWithPunctuationAndCase("is 'cold' now") . "\n";
echo invertWordsWithPunctuationAndCase("third-part") . "\n";
echo invertWordsWithPunctuationAndCase("can`t") . "\n";
?>


