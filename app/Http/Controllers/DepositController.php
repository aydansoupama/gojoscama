<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DepositController extends Controller
{
    public function deposit_view(): View
    {
        return view('dashboard.deposit');
    }
}
