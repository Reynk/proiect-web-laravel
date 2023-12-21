<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function buyTicket() {
        return view('tickets');
    }
}
