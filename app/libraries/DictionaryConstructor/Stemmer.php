<?php
/**
 * Created by PhpStorm.
 * User: najme
 * Date: 10/23/2019
 * Time: 11:13 AM
 */

namespace App\libraries\DictionaryConstructor;


class Stemmer
{
    private $noun_lex_path;
    private $verb_lex_path;
    private $verb_tense_map_path;
    private $prefix_list_path;
    private $postfix_list_path;
    private $verb_tense_file_path;
    private $mokasar_noun_path;
    private $irregular_nouns_path;
    private $noun_lex;
    private $verb_lex;
    private $verb_tense_map;
    private $prefix_list;
    private $postfix_list;
    private $verb_tense_file;
    private $mokasar_noun;
    private $irregular_nouns;

    public function __construct()
    {
        $this->noun_lex_path = "";
        $this->verb_lex_path = "";
        $this->verb_tense_map_path = "";
        $this->irregular_nouns_path = "";
        $this->prefix_list_path = "";
        $this->postfix_list_path = "";
        $this->verb_tense_file_path = "";
        $this->mokasar_noun_path = "";
        //get data from files

    }
    public  function  fillDatasets(){
      //
     $irregularFileContent=utf8_decode(file_get_contents($this->irregular_nouns_path)) ;
     $irreuglarData=explode('\n',$irregularFileContent) ;
     foreach ($irreuglarData as $item) {
            $words=explode(':',$item) ;
            array_push($this->irregular_nouns,[$words[1]=>$words[0]]) ;
     }

    }

    public function initialDataSet()
    {
        $f = fopen($this->prefix_list_path, "r");
        $f1 = fopen($this->postfix_list_path, "r");
        $f2 = fopen($this->noun_lex, "r");
        $f3 = fopen($this->noun_lex, "r");

        $this->prefix_list = array();
        $this->postfix_list = array();
        $this->noun_lex=array() ;
        $this->verb_lex=array();

//        self . postfix_list = set({})
//        with open(self . postfix_list_path, "r", encoding = 'utf-8') as pasvand_input_file:
//            pasvandFile_content = pasvand_input_file . readlines()
//            for el in pasvandFile_content:
//                self . postfix_list . add(el . strip())




        while (!feof($f)) {
            $line = rtrim(utf8_encode(fgets($f)));
            array_push($this->prefix_list, $line);
        }
        fclose($f);


        while (!feof($f1)) {
            $line = rtrim(utf8_encode(fgets($f1)));
            array_push($this->postfix_list, $line);
        }
        fclose($f1);

        while (!feof($f2)) {
            $line = rtrim(utf8_encode(fgets($f2)));
            array_push($this->postfix_list, $line);
        }
        fclose($f2);

        while (!feof($f3)) {
            $line = rtrim(utf8_encode(fgets($f3)));
            array_push($this->postfix_list, $line);
        }
        fclose($f3);



    }


    public function selectCandidate($candidate_list, $lexicon_set = null)
    {
        $length = 1000;
        $selected = "";
        foreach ($candidate_list as $tmp_candidate) {
            if ($lexicon_set == null and strlen($tmp_candidate) < $length) {
                $selected = $tmp_candidate;
                $length = strlen($tmp_candidate);
            } elseif (($lexicon_set != null) and in_array($tmp_candidate, $lexicon_set)){
                if ($length == 1000) {
                    $selected = $tmp_candidate;
                    $length = strlen($tmp_candidate);
                } else {
                    if (strlen($tmp_candidate) > $length) {
                        $selected = $tmp_candidate;
                        $length = strlen($tmp_candidate);
                    }
                }
            }
         }
        return $selected;
    }


    public function isPrefix($word,$prefix){
        $word=explode("\u200c",$word);
        return startsWith($word,$prefix);
    }


    public function isPostfix($word,$postfix){
        $word=explode("\u200c",$word);
        return endsWith($word,$postfix);
    }


    public function removePrefixes($word,$prefix){
        $word=explode("\u200c",$word);
        $candidateStem=array();
        foreach($prefix as $pre){
            if(startsWith($word,$pre)){
              if(strlen($pre)>0){
                  $temp=str_replace($pre,'',$word);
                  $temp=explode("\u200c",$temp);
              }
              else{
                  $temp=$word;
              }
              array_push($candidateStem,$temp);
            }
        }
        return $candidateStem;
    }



    public function removePostfixes($word,$postfix){
        $word=explode("\u200c",$word);
        $candidateStem=array();
        foreach($postfix as $post){
            if(endsWith($word,$post)){
                if(strlen($post)>0){
                    $temp=str_replace($post,'',$word);
                    $temp=explode("\u200c",$temp);
                }
                else{
                    $temp=$word;
                }
                array_push($candidateStem,$temp);
            }
        }
        return $candidateStem;
    }


    public function mapIrregularNoun($word){
        if (in_array($word,$this->irregular_nouns)){
            return $this->irregular_nouns[$word];
        }
        else{
            return $word;
        }
    }


    public function convertToStem($word,$word_pos){
//      if $
    }
}
