<?php namespace App\Controllers;

use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Core\Controller;
use Core\View;

class searchController extends Controller
{
    public function search()
    {
        if (isset($_GET['category']))
        {
            $category= Category::find($_GET["category"]);
            if (isset($category))
            {
                $category_name= $category->title;
            }
            $services = Advertise::query()->where("cat_id",$_GET['category'])->get();

            return View::renderTemplate("search/search", ['services'=>$services,'title'=>$category_name]);
        }

        if (isset($_GET['special']) && $_GET['special'] ==="true")
        {
            $service = Advertise::where("special",1)->get();

            return View::renderTemplate("search/search", ['services'=>$service,'title'=>'ویژه']);
        }


        if (isset($_GET['special']) && $_GET['special']==="false")
        {
            $service = Advertise::query()->where('special',null)->get();

            return View::renderTemplate("search/search", ['services'=>$service,'title'=>'سرویس عادی']);

        }

        if (isset($_GET['name']) && !empty($_GET['name']))
        {
            $service = Advertise::query()
                ->where("title",$_GET['name'])
                ->orWhere("title","like","%".$_GET['name']."%")
                ->withCount("comments")
                ->get();
            return View::renderTemplate("search/search", ['services'=>$service,'title'=> 'جستوجو برای'." ". $_GET['name']]);
        }
    }
}