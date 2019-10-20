<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class QueryController extends Controller
{
    public function readExcelFile(){
        $rows = \Excel::load('storage\\exports\\IR-F19-Project01-Input.xlsx')->get();
        Log::warning($rows);
    }


    public function loadPicture($pic){
        return response()->file(storage_path("/app/public/" . $pic .'.jpg'));
    }

    public function getResult(Request $request){
//        $query=$request['query'];
//        $str_arr = explode(" ", $query);
//        dd($str_arr);
    }
}
