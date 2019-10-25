<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportNews;
class QueryController extends Controller
{
    private $x;
    private $y;
    public function importExport()
    {
        return view('test');
    }

    public function import(Request $request){
//        dd($request->file('input_file'));
//        Excel::import(new ImportNews, request()->file('file'));
//        dd('successful');
//        return redirect()->back();
//        dd('successful');
    }


    public function loadPicture($pic){
        return response()->file(storage_path("/app/public/" . $pic .'.jpg'));
    }

    public function getResult(Request $request){
        global $x;
        $x=100;
        $this->test();

//        dd($request);
//        $query=$request['query'];
//        $str_arr = explode(" ", $query);
//        return View::make('newpage')->with('info',$str_arr);
//        dd($str_arr);
//        $command = escapeshellcmd('cd  C:\Users\1\PycharmProjects\ir_project_phase1/main.py');
//        shell_exec($command);
//        $command=escapeshellcmd('python main.py');
//        $output=shell_exec($command);
//        echo $output;
//        $data_list = `python C:\Users\1\PycharmProjects\ir_project_phase1/main.py`;
//        dd($output);
    }
}
