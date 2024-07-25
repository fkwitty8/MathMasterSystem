<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Charts\studentperformancechart;
use App\models\schools;
use Illuminate\Support\Facades\DB;
class webinterfaceController extends Controller{

    public function form(){
       
         
        return view('home');

    }


    public function setParameter(){
       
        
       return view('parameter');

   }
   public function load(){
       
        
    return view('upload');

}
}