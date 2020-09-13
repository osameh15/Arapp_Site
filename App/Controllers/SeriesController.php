<?php namespace App\Controllers;

use App\Models\Advertise;
use Core\Controller;
use Core\View;

class SeriesController extends Controller
{
    public function index()
    {
        return "Index Page";
    }

    public function serie($slug)
    {
        return "Seies Page";
    }

    public function episode($slug , $id)
    {
        $users = ['hesam' ,'ali' , 'reza' , 'mohammad'];

        return View::renderTemplate("series.episode" , ['users' => $users]);
    }

    public function test()
    {

        $category=Advertise::all();
        return View::renderTemplate('test',['categories'=>$category]);

    }
}