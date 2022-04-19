<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use \Yajra\Datatables\Datatables;

class DataTableAjaxCRUDController extends Controller
{
    
        public function index(Request $request)
    {
         if(request()->ajax()) {
 
    
     
            $customers = Post::all();
            return Datatables::of($customers)->make(true);
            
        }
        return view('home_ajax');
    }
    
    
}
