<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Faq extends Controller
{
    public function index(){
        return view('website/faq', [
            'title' => 'FAQ'
        ]);
    }
}
