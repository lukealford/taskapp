<?php namespace App\Http\Controllers;
 
use Illuminate\Routing\Controller;
 
class DashBoardController extends Controller {
 
    public function __construct()
    {
        $this->beforeFilter('auth');
    }
 
    public function index()
    {
        return view('dashboard');
    }
 
}