<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TinController extends Controller
{
    function index(){
        return view("home");
    }
    function chitiet($id = 0){
        $tin = DB::table('tin')->where('id', $id)->first();
        $data = ['id'=>$id, 'tin'=>$tin];
        return view ("chitiet",$data);
    }
    function tintrongloai($idLT = 0)
    {
        $loaitin = DB::table('loaitin')->where('id', $idLT)->first();
        $listtin = DB::table('tin')->where('idLT', $idLT)->get();
        $data = [
            'idLT' => $idLT,
            'loaitin' => $loaitin,
            'listtin' => $listtin
        ];
        return view("tintrongloai", $data);
    }

}
