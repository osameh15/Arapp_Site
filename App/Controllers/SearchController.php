<?php namespace App\Controllers;

use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Core\Controller;
use Core\View;

class searchController extends Controller
{
    public function search()
    {
        $user = null;
        if (isset($_SESSION['userLogin']))
        {
            $user =User::where("mobile",$_SESSION["userLogin"])->first();
        }
        $categories=Category::all();
        if (isset($_GET['category']))
        {
            $category= Category::find($_GET["category"]);
            if (isset($category))
            {
                $category_name= $category->title;
            }
            $services = Advertise::query()->where("cat_id",$_GET['category'])->get();

            return View::renderTemplate("search", ['services'=>$services,'title'=>$category_name,'categories'=>$categories,"user"=>$user]);
        }

        if (isset($_GET['special']) && $_GET['special'] ==="true")
        {
            $service = Advertise::where("special",1)->get();

            return View::renderTemplate("search", ['services'=>$service,'title'=>'ویژه','categories'=>$categories,"user"=>$user]);
        }


        if (isset($_GET['special']) && $_GET['special']==="false")
        {
            $service = Advertise::query()->where('special',null)->get();

            return View::renderTemplate("search", ['services'=>$service,'title'=>'سرویس عادی','categories'=>$categories,"user"=>$user]);

        }

        if (isset($_GET['name']) && !empty($_GET['name']))
        {
            $service = Advertise::query()
                ->where("title",$_GET['name'])
                ->orWhere("title","like","%".$_GET['name']."%")
                ->withCount("comments")
                ->get();
            return View::renderTemplate("search", ['services'=>$service,'title'=> 'جستوجو برای'." ". $_GET['name'],'categories'=>$categories,"user"=>$user]);
        }
    }
}