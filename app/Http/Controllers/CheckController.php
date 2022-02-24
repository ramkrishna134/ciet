<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class CheckController extends Controller
{
    public function index()
    {
      return 'Silence is golden!';
    }
  
    public function create()
    {
      return view('welcome');
    }
}
