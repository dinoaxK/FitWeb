<?php

namespace App\Http\Controllers\Portal\Staff;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamsController extends Controller
{    
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('revalidate');
  }
  
  public function index()
  {
      return view('portal/staff/exams');
  }
}
