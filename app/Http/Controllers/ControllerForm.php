<?php  
namespace App\Http\Controllers;  
use Illuminate\Http\Request; 
class ControllerForm extends Controller 
{ 
  public function PrintFormContent(Request $request) { 
  // Űrlap tartalmának kiíratása, de először az űrlap adatainak ellenőrzése: 
    $request->validate([ 
      'email'=>'required|email|min:8',  
      'name'=>'required|min:8|max:15',
      'age'=>'required',
      'message' => 'required|min:5|max:500', 
    ]); 
    // validációs szabályok 
    // Ha a validációs szabályok sikeresek, a kód a köv. utasítással folytatódik: 
    return view('kapcsolat', compact('request')); 
  }

}