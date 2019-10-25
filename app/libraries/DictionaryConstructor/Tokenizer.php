<?php
/**
 * Created by PhpStorm.
 * User: najme
 * Date: 10/23/2019
 * Time: 11:12 AM
 */

namespace App\libraries\DictionaryConstructor;


class Tokenizer
{
    public function tokenizer($doc_string){
        $token_list=explode(' ',$doc_string);
        for($i=0;$i<sizeof($token_list);$i++){
            if(sizeof(trim($token_list[$i],"\u200c")) != 0){
                $new_token=trim($token_list[$i],"\u200c");
                $token_list[$i]=$new_token;
            }
        }
        return $token_list;
    }
}