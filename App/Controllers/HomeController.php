<?php namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\News;
use App\Models\Notification;
use App\Models\User;
use Core\Controller;
use Core\View;
use IntlDateFormatter;

class HomeController extends Controller
{
    //region Helper Functions
    public function createdAtDateApp($id, $type)
    {
        $news = News::where("id", $id)->first();
        try
        {
            if ($type == "created_at")
            {
                $date = new  \DateTime($news->created_at);
            }
            else if($type == "updated_at")
            {
                $date = new  \DateTime($news->updated_at);
            }
        }
        catch (\Exception $e)
        {}
        $dateFormatter = new \IntlDateFormatter
        (
            'fa_IR@calendar=persian',
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL,
            'Asia/Tehran',
            IntlDateFormatter::TRADITIONAL,
            'yyyy/MM/dd'
        );

        $date->format('Y-m-d');
        return $dateFormatter->format($date);
    }
    //endregion

    //region website
    public function index()
    {
        return View::renderTemplate("index");
    }

    public function contactUs()
    {
        return View::renderTemplate("contact");

    }

    public function about()
    {
        return View::renderTemplate("about");
    }
    //endregion

    //region Application

    //Get news and notification pictures from database
    public function getNews()
    {
        header('Content-Type: application/json');
        $response = array();
        $news = News::all();
        if (isset($news))
        {
            foreach ($news as $data)
            {
                $temp = array();
                $temp["id"] = $data->id;
                $temp["image"] = $data->banner;
                $temp["text"] = $data->description;
                $temp["show"] = $data->show;
                $temp["created_at"] = $this->createdAtDateApp($data->id, "created_at");
                $temp["updated_at"] = $this->createdAtDateApp($data->id, "updated_at");
                array_push($response, $temp);
            }
            echo json_encode($response);
        }
    }

    //Get category pictures and titles ...
    public function getCategory()
    {
        header('Content-Type: application/json');
        $response = array();
        $categories = Category::all();
        if (isset($categories))
        {
            foreach ($categories as $category)
            {
                $temp = array();
                $temp["id"] = $category->id;
                $temp["image"] = $category->image;
                $temp["title"] = $category->title;
                array_push($response, $temp);
            }
            echo json_encode($response);
        }
    }

    //Get Notification from server ...
    public function getNotification()
    {
        header('Content-Type: application/json');
        $response = array();
        $notify = Notification::all();
        if (isset($notify))
        {
            foreach ($notify as $notification)
            {
                $temp = array();
                $temp["id"] = $notification->id;
                $temp["title"] = $notification->title;
                $temp["subtitle"] = $notification->subtitle;
                $temp["text"] = $notification->text;
                $temp["image"] = $notification->image;
                $temp["visible"] = $notification->visible;
                $temp["created_at"] = $this->createdAtDateApp($notification->id, "created_at");
                $temp["updated_at"] = $this->createdAtDateApp($notification->id, "updated_at");
                $temp["deleted_at"] = $notification->deleted_at;
                array_push($response, $temp);
            }
            echo json_encode($response);
        }
    }
    //endregion
}