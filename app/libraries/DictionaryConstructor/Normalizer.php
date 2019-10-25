<?php
/**
 * Created by PhpStorm.
 * User: najme
 * Date: 10/23/2019
 * Time: 11:12 AM
 */

namespace App\libraries\DictionaryConstructor;


class Normalizer
{
    private $pathDic1 = "";
    private $pathDic2 = "";
    private $pathDic3 = "";

    public function __construct($pathDic1, $pathDic2, $pathDic3)
    {
        $this->$pathDic1 = $pathDic1;
        $this->$pathDic2 = $pathDic2;
        $this->$pathDic3 = $pathDic1;

    }
    public function normalizer($doc){
        $this->concatprefixOpostfix(
            $this->concat1PartWord(
            $this->concat2PartWord($this->concat3PartWord(
            $this->replaceDifLetters($doc)))));
    }


    public function replaceDifLetters($newsString)
    {
        $uniqeLetters = arraay("/<br>|</br>|<p>|</p>/", "/ء/", "/ٲ|ٱ|إ|ﺍ|أ/", "/ﺐ|ﺏ|ﺑ/", "/ﭖ|ﭗ|ﭙ|ﺒ|ﭘ/", "/ﭡ|ٺ|ٹ|ﭞ|ٿ|ټ|ﺕ|ﺗ|ﺖ|ﺘ/", "/ﺙ|ﺛ/", "/ﺝ|ڃ|ﺠ|ﺟ/", "/ڃ|ﭽ|ﭼ/", "/ﺢ|ﺤ|څ|ځ|ﺣ/", "/ﺥ|ﺦ|ﺨ|ﺧ/", "/ڏ|ډ|ﺪ|/", "/ﺫ|ﺬ|ﻧ/", "/ڙ|ڗ|ڒ|ڑ|ڕ|ﺭ|ﺮ/", "/ﺰ|ﺯ/", "/ﮊ/", "/ݭ|ݜ|ﺱ|ﺲ|ښ|ﺴ|ﺳ/", "/ﺵ|ﺶ|ﺸ|ﺷ/", "/ﺺ|ﺼ|ﺻ/", "/ﺽ|ﺾ|ﺿ|ﻀ/", "/ﻁ|ﻂ|ﻃ|ﻄ/", "/ﻆ|ﻇ|ﻈ/", "/ڠ|ﻉ|ﻊ|ﻋ/", "/ﻎ|ۼ|ﻍ|ﻐ|ﻏ/", "/ﻒ|ﻑ|ﻔ|ﻓ/", "/ڭ|ﻚ|ﮎ|ﻜ|ﮏ|ګ|ﻛ|ﮑ|ﮐ|ڪ|ك/", "/ﮚ|ﮒ|ﮓ|ﮕ|ﮔ/", "/ﻝ|ﻞ|ﻠ|ڵ/", "/ﻡ|ﻤ|ﻢ|ﻣ/", "/ڼ|ﻦ|ﻥ|ﻨ/", "/ވ|ﯙ|ۈ|ۋ|ﺆ|ۊ|ۇ|ۏ|ۅ|ۉ|ﻭ|ﻮ|ؤ/", "/ﺔ|ﻬ|ھ|ﻩ|ﻫ|ﻪ|ۀ|ە|ة|ہ/", "/ﭛ|ﻯ|ۍ|ﻰ|ﻱ|ﻲ|ں|ﻳ|ﻴ|ﯼ|ې|ﯽ|ﯾ|ﯿ|ێ|ے|ى|ي/", "/~/", "/•|·|●|·|・|∙|｡|ⴰ/", "/,|٬|٫|‚|，/", "/ʕ/", "/۰|٠/", "/۱|١/", "/۲|٢/", "/۳|٣/", "/۴|٤/", "/۵/", "/۶|٦/", "/۷|٧/", "/۸|٨/", "/۹|٩/", "/( )+/", "/(\n)+/");
        $differFormOfLetters = arraay("", "/ئ/", "/ا/", "/ب/", "/پ/", "/ت/", "/ث/", "/ج/", "/چ/", "/ح/", "/خ/", "/د/", "/ذ/", "/ر/", "/ز/", "/ژ/", "/س/", "/ش/", "/ص/", "/ض/", "/ط/", "/ظ/", "/ع/", "/غ/", "/ف/", "/ق/", "/ک/", "/گ/", "/ل/", "/م/", "/ن/", "/و/", "/ه/", "/ی/", "//", "/./", "/,|٬|٫|‚|，/", "/؟/", "/0/", "/1/", "/2/", "/3/", "/4/", "/5/", "/6/", "/7/", "/8/", "/9/", "/ /", "/\n/");
        $stringByUnique = preg_replace($differFormOfLetters, $uniqeLetters, $newsString);
        return $stringByUnique;
    }

    public function readDictionary($filePath)
    {
        $Dictionary = fopen($filePath, 'r');
        $len = filesize($filePath);
        $wordsArray = fgets($Dictionary);
        for ($i = 0; $i < $len; $i++) {
            $word = explode(' ', $wordsArray[$i]);
            $dic[trim($word[0])] = str_replace('/n', '', trim($word[1]));
        }
        return $dic;

    }


    public function concat2PartWord($newsString)
    {
        $dic = $this->readDictionary($this->pathDic2);
        $stringSplit = explode(' ', $newsString);

        for ($i = 0; $i < sizeof($stringSplit) - 1; $i++) {
            $twoWords = $stringSplit[$i]  . $stringSplit[$i + 1];
            $outputString = "";
            if ($dic[$twoWords]) {
                $outputString = $outputString . ' ' . $dic[$twoWords];
                $i++;
            } else {
                $outputString = $outputString . ' ' . $stringSplit[$i];

            }

        }
        return $outputString;
    }

    public function concat1PartWord($newsString)
    {
        $dic = $this->readDictionary($this->pathDic1);
        $stringSplit = explode(' ', $newsString);

        for ($i = 0; $i < sizeof($stringSplit); $i++) {
            $word = $stringSplit[$i];
            $outputString = "";
            if ($dic[$word]) {
                $outputString = $outputString . ' ' . $dic[$word];
                $i++;
            } else {
                $outputString = $outputString . ' ' . $stringSplit[$i];

            }

        }
        return $outputString;
    }

    public function concat3PartWord($newsString)
    {
        $dic = $this->readDictionary($this->pathDic3);
        $stringSplit = explode(' ', $newsString);

        for ($i = 0; $i < sizeof($stringSplit) - 2; $i++) {
            $threeWords = $stringSplit[$i]  . $stringSplit[$i + 1]  . $stringSplit[$i + 2];
            $outputString = "";
            if ($dic[$threeWords]) {
                $outputString = $outputString . ' ' . $dic[$threeWords];
                $i += 2;
            } else {
                $outputString = $outputString . ' ' . $stringSplit[$i];

            }

        }
        return $outputString;
    }

    public function concatprefixOpostfix($newsString)
    {
        $docWithSpace = array("/^(بی|می|نمی)( )/",
            "/( )(می|نمی|بی)( )/", "/( )(هایی|ها|های|ایی|هایم|هایت|هایش|هایمان|هایتان|هایشان|ات|ان|انی|بان|ام|ای|یم|ید|اید|اند|بودم|بودی|بود|بودیم|بودید|بودند|ست)()/
( )/", "/( )(شده|نشده)( )/", "/()(طلبان|طلب|گرایی|گرایان|شناس|شناسی|گذاری|گذار|گذاران|شناسان|گیری|پذیری|بندی|آوری|سازی|بندی|کننده|کنندگان|گیری|پرداز|پردازی|پردازان|آمیز|سنجی|ریزی|داری|دهنده|آمیز|پذیریپذیر|پذیران|گر|ریز|ریزی|رسانی|یاب|یابی|گانه|گانه‌ای|
        انگاری|گا|بند|رسانی|دهندگان|دار)()/");
        $docDeleteSpace = array("/\1/", "/\1\2/", "/\2\3/", "/\2/", "/\2\3/");
        $resultstring = preg_replace($docWithSpace, $docDeleteSpace, $newsString);
    }

}