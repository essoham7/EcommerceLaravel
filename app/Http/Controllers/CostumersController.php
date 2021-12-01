<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CostumersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }



}
