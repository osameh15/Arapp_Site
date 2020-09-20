<?php namespace App\Controllers;

use App\Models\Category;
use App\Models\Province;
use App\Models\User;
use App\Models\Advertise;
use Core\Controller;
use Core\View;
use IntlDateFormatter;

class DashboardController extends Controller
{

    //region HelperFunction

    public function changeDate()
    {
        $user = User::where('mobile', '09116948828')->first();
        try
        {
            $date = new  \DateTime($user->verified_at);
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
            'yyyy/MM/dd, HH:mm'
        );

        echo $date->format('Y-m-d H:i:s');
        echo '<br />';
        echo $dateFormatter->format($date);

    }

    public function createdAtDateApp($phone, $type)
    {
        $user = User::where('mobile', $phone)->first();
        try
        {
            if ($type == "created_at")
            {
                $date = new  \DateTime($user->created_at);
            }
            else if($type == "updated_at")
            {
                $date = new  \DateTime($user->updated_at);
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

    //Function to set dashboard session ...
    public function dashboard()
    {
        if (!isset($_SESSION['userLogin']))
        {
            header("Location: /login");
            exit();
        }
        return View::renderTemplate('dashboard/dashboard');

    }

    //Function to edit profile user ...
    public function dashboardEditUser()
    {
        if (!isset($_SESSION['userLogin']))
        {
            header("Location: /login");
            exit();
        }

        $user = User::where('mobile', $_SESSION['userLogin'])->first();
        $response = null;
        $filtered = array_filter($_POST);
        if (isset($_POST['name']))
        {
            if (strlen($_POST['name']) < 3)
            {
                $errors[] = "نام حداقل باید 3 کاراکتر باشد";
            }
            else
            {
                $user->name = $_POST['name'];
            }
        }
        if (isset($_POST['email']))
        {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $errors[] = "آدرس ایمیل را به درستی وارد کنید";
            }
            else
            {
                $user->name = $_POST['name'];
            }
        }

        if (isset($_POST['mobile']))
        {
            $mobileRegex = '~^(0098|\+?98|0)9\d{9}$~';
            preg_match($mobileRegex, $_POST['mobile'], $matches);
            if (empty($matches))
            {
                $errors[] = "موبایل را به درستی وارد کنید.";
            }
            else
            {
                $user->mobile = $_POST['mobile'];
            }
        }
        if (isset($_POST['service']))
        {
            if (!is_bool($_POST['service']))
            {
                $errors[] = "سرویس گیرنده اشتباه است.";
            }
            else
            {
                $user->service = $_POST['service'];
            }
        }
        if (isset($_POST['education']))
        {
            $exp = ['دیپلم و فوق دیپلم', 'لیسانس', 'فوق لیسانس', 'دکترا'];
            if (in_array($_POST['education'], $exp))
            {
                $errors[] = "تحصیلات اشتباه است.";
            }
            else
            {
                $user->education = $_POST['education'];
            }
        }
        if (isset($_POST['bio']))
        {
            if (is_string($_POST['bio']) && strlen($_POST['bio']) < 10)
            {
                $errors[] = "توضیحات باید حداقل 10 حرف و شامل حروف باشد.";
            }
            else
            {
                $user->bio = $_POST['bio'];
            }
        }
        if (isset($_POST['notification_receiver']))
        {
//            todo: validate notification reciver
            $user->notification_receiver = $_POST['notification_receiver'];
        }

        if (!empty($_FILES) && isset($_FILES['avatar']))
        {
            $t = md5(time());
            $fnm = $_FILES['avatar']['name'];
            $pathFileName = 'images/' . 'avatar user/' . $t . $fnm;
            $extentions = ['image/jpeg', 'image/png'];
            if (!in_array($_FILES['avatar']['type'], $extentions))
            {
                $response['errors'] = 'فایل باید از نوع jpeg یا png باشد.';
            }
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $pathFileName))
            {
                if (file_exists($user->avatar))
                {
                    unlink($user->avatar);
                }
                $user->avatar = $pathFileName;
                $user->save();
            }
            else
            {
                $response['errors'] = 'خطایی در اپلود عکس به وجود آمده است.';
            }
        }


        return View::renderTemplate('dashboard/EditUser',
            [
                'user' => $user,
                'response' => $response
            ]);
    }

    //Function to add advertise and save in to database ...
    public function addAdvertise()
    {
        if (!isset($_SESSION['userLogin']))
        {
            header("Location: /login");
            exit();
        }

        $user = User::where("mobile", $_SESSION['userLogin'])->first();
        $categories = Category::all();
        $reponse = [];
        if (isset($_POST['add_advertise']))
        {
            if (!empty($_POST['title']) && !empty($_POST['dis']) && isset($_POST['category']) && !empty($_FILES['advertise_img']))
            {
                if (strlen($_POST['title']) < 3)
                {
                    $reponse['errors'][] = "عنوان باید حداقل سه حرف باشد.";
                }
                if (strlen($_POST['dis']) > 30)
                {
                    $reponse['errors'][] = "توضیحات حداکثر باید حداقل 30 حرف باشد.";
                }
                $category = Category::where("id", $_POST['category'])->first();
                if (empty($category))
                {
                    $reponse['errors'][] = "چنین دسته بندی وجود ندارد.";
                }
                else
                {
                    $user->cat_id = $category->id;
                }
                $extentions = ['image/jpeg', 'image/png'];
                if (!in_array($_FILES['advertise_img']['type'], $extentions))
                {
                    $reponse['errors'][] = 'فایل باید از نوع jpeg , png باشد.';
                } else
                {
                    $t = md5(time());
                    $fnm = $_FILES['advertise_img']['name'];
                    $pathFileName = 'Images/' . 'Advertise/' . $t . $fnm;
                    if (!move_uploaded_file($_FILES['advertise_img']['tmp_name'], $pathFileName))
                    {
                        $reponse['errors'][] = 'خطایی در اپلود عکس به وجود آمده است.';
                    }
                }
            }
            else
            {
                $reponse['errors'][] = "لطفا تمامی فیلد ها را پر کنید.";
            }
            if (empty($reponse['errors']))
            {
                $reponse['success'] = "با موفقیت اضافه شد.";
                $advertise = new Advertise();
                $advertise->user_id = $user->id;
                $advertise->cat_id = $_POST['category'];
                $advertise->title = $_POST['title'];
                $advertise->description = $_POST['dis'];
                $advertise->banner = $pathFileName;
                $advertise->save();
            }
        }


        return View::renderTemplate("dashboard/addService",
        [
            'user' => $user,
            'categories' => $categories,
            "errors" => $reponse,
        ]);
    }

    //Function to handle My comments ...
    public function myComments()
    {
        return View::renderTemplate('dashboard/comments');
    }

    //Function to access followers ...
    public function followers()
    {
        return View::renderTemplate('dashboard/followers');

    }

    //Function to handle my service
    public function myServices()
    {
        $response = null;
        if (!isset($_SESSION['userLogin'])) {
            header("Location: /login");
            exit();
        }
        $user = User::where("mobile", $_SESSION['userLogin'])->first();
        if (isset($_POST['deletedService'])) {
            $deletedService = Advertise::where("id", $_POST['deletedService'])->first();
            if (!is_null($deletedService)) {
                if ($deletedService->delete()) {
                    if (file_exists($deletedService->banner)) {
                        unlink($deletedService->banner);
                    }
                    $response['success'] = "با موفقیت حذف شد.";
                }
            }
        }
        $service = $user->advertises()->get();

        return View::renderTemplate('dashboard/mySerivce', [
            'services' => $service,
            'response' => $response,
        ]);
    }

    //Function to Edit service
    public function editService()
    {
        $reponse = null;
        $service = Advertise::where("slug", $_GET['service'])->first();
        $user = User::where("mobile", $_SESSION['userLogin'])->first();
        $categories = Category::all();

        if (!is_null($service)) {
            if ($service->user_id === $user->id) {

                if (isset($_POST['editService'])) {
                    if (!empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['address']) && !empty($_POST['dis']) && isset($_POST['category'])) {
                        if (strlen($_POST['title']) < 3) {
                            $reponse['errors'][] = "عنوان باید حداقل سه حرف باشد.";
                        }
                        if (strlen($_POST['subtitle']) < 3) {
                            $reponse['errors'][] = "زیر عنوان باید حداقل پنج حرف باشد.";
                        }

                        if (strlen($_POST['dis']) > 30) {
                            $reponse['errors'][] = "توضیحات حداکثر باید حداقل 30 حرف باشد.";
                        }
                        $category = Category::where("id", $_POST['category'])->first();
                        if (empty($category)) {
                            $reponse['errors'][] = "چنین دسته بندی وجود ندارد.";
                        } else {
                            $user->cat_id = $category->id;
                        }

                        if (strlen($_POST['address']) < 8) {
                            $reponse['errors'][] = " ادرس حداقل باید 8 حرف باشد.";
                        }

                    } else {
                        $reponse['errors'][] = "لطفا تمامی فیلد ها را پر کنید.";
                    }
                    if (!empty($_FILES['advertise_img'])) {
                        $extentions = ['image/jpeg', 'image/png'];
                        if (!in_array($_FILES['advertise_img']['type'], $extentions)) {
                            $reponse['errors'][] = 'فایل باید از نوع jpeg , png باشد.';
                        } else {
                            $t = md5(time());
                            $fnm = $_FILES['advertise_img']['name'];
                            $pathFileName = 'Images/' . 'Advertise/' . $t . $fnm;
                            if (!move_uploaded_file($_FILES['advertise_img']['tmp_name'], $pathFileName)) {
                                $reponse['errors'][] = 'خطایی در اپلود عکس به وجود آمده است.';
                            } else {
                                $service->banner = $pathFileName;
                            }
                        }
                    }

                    if (empty($reponse['errors'])) {
                        $reponse['success'] = "ویرایش با موفقیت انجام شد.";
                        $service->user_id = $user->id;
                        $service->etitle = $_POST['subtitle'];
                        $service->cat_id = $_POST['category'];
                        $service->title = $_POST['title'];
                        $service->description = $_POST['dis'];
                        $service->address = $_POST['address'];
                        $service->save();
                    }


                }


                return View::renderTemplate('dashboard/editService', [
                    'service' => $service,
                    'categories' => $categories,
                    'response' => $reponse,
                ]);
            } else {
                //Todo:: redirect to forrbidden page
            }

        }

        //Todo:: redirect to not found page
    }

    //endregion

    //region Application

    //Get User Information Data from database ..
    public function getUserData()
    {
        $siteName = "http://cafestudy.ir/public/";
        header('Content-Type: application/json');
        $response = array("error" => FALSE);
        if (isset($_POST["phone"]))
        {
            $phone = $_POST["phone"];
            $user = User::where("mobile", $phone)->first();
            $province = Province::where("id", $user->province)->first();
            if (isset($user) && $user->verified_at)
            {
                $response["error"] = FALSE;
                $response["id"] = $user->id;
                $response["email"] = $user->email;
                $response["name"] = $user->name;
                $response["service"] = $user->service;
                if ($user->avatar == null)
                {
                    $response["avatar"] = $user->avatar;
                }
                else
                {
                    $response["avatar"] = $siteName.$user->avatar;
                }
                $response["education"] = $user->education;
                $response["bio"] = $user->bio;
                if (isset($province))
                {
                    $response["province"] = $province->name;
                }
                else
                {
                    $response["province"] = $user->province;
                }
                $response["city"] = $user->city;
                $response["notification_receiver"] = $user->notification_receiver;
                $response["created_at"] = $this->createdAtDateApp($phone, "created_at");
                $response["updated_at"] = $this->createdAtDateApp($phone, "updated_at");
                echo json_encode($response);
            }
            else
            {
                $response["error"] = TRUE;
                $response["error_msg"] = "کاربر با شماره " . $phone . " وجود ندارد";
                echo json_encode($response);
            }
        }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "شماره تلفن ارسال نشده است";
            echo json_encode($response);
        }
    }

    //Set Notification Receiver (true or false)...
    public function setNotificationReceiver()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);
        if (isset($_POST["phone"]))
        {
            $phone = $_POST["phone"];
            $user = User::where("mobile", $phone)->first();
            if (isset($user) && $user->verified_at)
            {
                if (isset($_POST["notify"]))
                {
                    $notify = $_POST["notify"];
                    $response["error"] = FALSE;
                    if ($notify == "1")
                    {
                        $user->notification_receiver = $notify;
                        $user->update();
                        $response["error_msg"] = "درخواست دریافت اعلان با موفقیت ثبت شد";
                    }
                    else
                    {
                        $user->notification_receiver = $notify;
                        $user->update();
                        $response["error_msg"] = "درخواست لغو اعلان با موفقیت ثبت شد";
                    }
                    echo json_encode($response);
                }
                else
                {
                    $response["error"] = TRUE;
                    $response["error_msg"] = "پارامتر نوتیفای ارسال نشده است";
                    echo json_encode($response);
                }
            }
            else
            {
                $response["error"] = TRUE;
                $response["error_msg"] = "کاربر با شماره " . $phone . " وجود ندارد";
                echo json_encode($response);
            }
        }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "شماره تلفن ارسال نشده است";
            echo json_encode($response);
        }
    }

    //Edit user information (User profile) ... and upload profile Picture
    public function editUserProfile()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);
        if (isset($_POST["phone"]))
        {
            $phone = $_POST["phone"];
            $user = User::where("mobile", $phone)->first();
            if (isset($user) && $user->verified_at)
            {
                if (isset($_POST["name"]) &&
                    isset($_POST["email"]) &&
                    isset($_POST["bio"]) &&
                    isset($_POST["education"]) &&
                    isset($_POST["province"]) &&
                    isset($_POST["city"]))
                {
                    $response["error"] = FALSE;
                    $user->name = $_POST["name"];
                    $user->email = $_POST["email"];
                    if ($_POST["bio"] != "none")
                    {
                        $user->bio = $_POST["bio"];
                    }
                    else
                    {
                        $user->bio = null;
                    }
                    if ($_POST["education"] != "none")
                    {
                        $user->education = $_POST["education"];
                    }
                    else
                    {
                        $user->education = null;
                    }
                    if ($_POST["province"] != 0)
                    {
                        $user->province = $_POST["province"];
                    }
                    else
                    {
                        $user->province = null;
                    }
                    if ($_POST["city"] != "none")
                    {
                        $user->city = $_POST["city"];
                    }
                    else
                    {
                        $user->city = null;
                    }
                    $user->update();
                    $response["error_msg"] = "اطلاعات کاربری با موفقیت بروز شد";
                    echo json_encode($response);
                }
                else
                {
                    $response["error"] = TRUE;
                    $response["error_msg"] = "پارامترهای موردنیاز ارسال نشده است";
                    echo json_encode($response);
                }
            }
            else
            {
                $response["error"] = TRUE;
                $response["error_msg"] = "کاربر با شماره " . $phone . " وجود ندارد";
                echo json_encode($response);
            }
        }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "شماره تلفن ارسال نشده است";
            echo json_encode($response);
        }
    }
    public function uploadProfilePicture()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);
        if (isset($_POST["phone"]))
        {
            $phone = $_POST["phone"];
            $user = User::where("mobile", $phone)->first();
            if (isset($user) && $user->verified_at)
            {
                if (isset($_POST["picture"]))
                {
                    $picture = $_POST["picture"];
                    $name = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 6)), 0, 6);
                    $id = $user->id;
                    $underline = "_";
                    $uploadPath = "Images/Profile/".$name.$underline.$id.".jpg";
                    if ($user->avatar == null)
                    {
                        $response["error"] = FALSE;
                        $response["error_msg"] = "تصویر کاربری با موفقیت ثبت شد";
                        file_put_contents($uploadPath, base64_decode($picture));
                        $user->avatar = $uploadPath;
                        $user->save();
                        echo json_encode($response);
                    }
                    else
                    {
                        $response["error"] = FALSE;
                        $response["error_msg"] = "تصویر کاربری با موفقیت بروز شد";
                        unlink($user->avatar);
                        file_put_contents($uploadPath, base64_decode($picture));
                        $user->avatar = $uploadPath;
                        $user->update();
                        echo json_encode($response);
                    }
                }
                else
                {
                    $response["error"] = TRUE;
                    $response["error_msg"] = "پارامتر تصویر ارسال نشده است!";
                    echo json_encode($response);
                }
            }
            else
            {
                $response["error"] = TRUE;
                $response["error_msg"] = "کاربر با شماره " . $phone . " وجود ندارد";
                echo json_encode($response);
            }
        }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "شماره تلفن ارسال نشده است";
            echo json_encode($response);
        }
    }

    //add service in advertise table of database
    public function addAdvertiseApp()
    {

    }

    //endregion
}