<?php namespace App\Controllers;

use App\Models\Advertise;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\Notification;
use App\Models\Rate;
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

    //Index ...
    public function index()
    {
        $categories = Category::all();
        $specials = Advertise::query()->where("special", 1)->get();
        $no_specials = Advertise::query()->where("special", null)->get();
        return View::renderTemplate("index",
        [
            'categories' => $categories,
            'specials' => $specials,
            'no_specials' => $no_specials,
        ]);
    }

    //Contact with us ...
    public function contactUs()
    {
        $categories = Category::all();

        return View::renderTemplate("contact",
        [
            'categories' => $categories
        ]);

    }

    //About us ...
    public function about()
    {
        $categories = Category::all();
        return View::renderTemplate("about",
        [
            'categories' => $categories
        ]);
    }

    //Function to show service of each category ...
    public function showService()
    {
        if (isset($_GET['service']))
        {
            $categories = Category::all();
            $service = Advertise::query()->where("slug", $_GET['service'])->first();
            $comments = $service->comments()->with("user")->get();

            $rates = Rate::where("ads_id",$service->id)->get();
            $count = 0;
            $total = 0;
            foreach ($rates as $rate)
            {
                $count++;
                $total+=$rate->rate;

            }
            $avg = $total/$count;
            return View::renderTemplate("servicePage",
            [
                'categories' => $categories,
                'service' => $service,
                'comments' => $comments,
                'avg'=>$avg
            ]);
        }
        return View::renderTemplate("servicePage", []);
    }

    //Function to add comment ...
    public function addComment()
    {
        if (!isset($_SESSION['userLogin']))
        {
            header("Location: /login");
        }

        $service = Advertise::query()->where("slug", $_GET['service'])->first();
        $user = User::query()
            ->where("mobile", $_SESSION['userLogin'])
            ->orWhere("email", $_SESSION['userLogin'])->first();

        $addedComment = new Comment();
        $addedComment->user_id = $user->id;
        $addedComment->ads_id = $service->id;
        $addedComment->body = $_POST['comment-title'];
        $addedComment->enable_comment = 1;
        $addedComment->save();

        header("Location: /service?service=" . $service->slug);
    }

    //Function to add Rate ...
    public function add_rate()
    {
        if (!isset($_SESSION['userLogin']))
        {
            header("Location: /login");
        }
        else
        {
            $service = Advertise::where("slug", $_GET['service'])->first();
            $user = User::query()->where("mobile", $_SESSION['userLogin'])->first();
            $categories = Category::all();
            $comments = $service->comments()->with("user")->get();
            $rates = Rate::where("ads_id",$service->id)->get();
            $count = 0;
            $total = 0;
            foreach ($rates as $rate)
            {
                $count++;
                $total+=$rate->rate;

            }
            $avg = $total/$count;
            $ads_rate = Rate::where("user_id", $user->id)
                ->where("ads_id",$service->id)
                ->first();
            if (is_null($ads_rate))
            {
                $ads_rate = Rate::create
                ([
                    "user_id"=>$user->id,
                    "ads_id"=>$service->id,
                    "rate"=>$_POST['rating']
                ]);
            }
            else
            {
                $ads_rate->rate = $_POST['rating'];
                $ads_rate->save();
            }

            return View::renderTemplate("servicePage",
                [
                    'categories' => $categories,
                    'service' => $service,
                    'comments' => $comments,
                    'avg'=>$avg,
                ]);
        }
    }

    //Blog of Arapp ...
    public function blog()
    {
        dd("ss");
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