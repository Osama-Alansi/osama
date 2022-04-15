<?php

namespace App\Http\Controllers\Admin;   

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; 


class SecondController extends  Controller
{
    //

    // public function __Construct(){
    //     $this -> middleware(middleware:'auth')->except(methods:'c');
    // }
    public function a(){

        return "Alansi";
    }

    public function b(){

        return "Alansi";
    }

    public function c(){

        return "Alansi";
    }
    public function indxe(){
 

        // $obj =new \stdClass();

        // $obj -> name ='Mohammed';
        // $obj -> age = 5;
         $data =['a'=> 'Ali','b'=> 'Osama'];
        // return view('aput')-> with ('name','s');
        
        return view('aput',compact('data'))->with ('name','Osama');
        //return view(view:'welcome');
    }
}


 