<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function AboutPage():object {
        return view('about');
    }
    public function ContactPage():object {
        return view('contact');
    }
}
