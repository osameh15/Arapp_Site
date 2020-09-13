<?php namespace App\Controllers;
//header('Content-Type: application/json');
use App\Models\User;
use Core\Controller;
use Core\View;

class AuthController extends Controller
{

    //region helper functions
    private function checkUserLogin($salt, $encrypted_password, $password)
    {
        $hash = $this->checkHashSSHA($salt, $password);
        if ($encrypted_password != $hash) {
            return false;
        }
        return true;
    }

    private function hashSSHA($password)
    {
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        return array("salt" => $salt, "encrypted" => $encrypted);
    }

    public function checkHashSSHA($salt, $password)
    {
        return base64_encode(sha1($password . $salt, true) . $salt);
    }

    private function generate_random_code()
    {
        try {
            return random_int(100000, 999999);
        } catch (\Exception $e) {
            return null;
        }
    }

    private function validatePassword($password)
    {
        $regex = "^(?=.*\d.*\d)[0-9A-Za-z!@#$%*]{6,}$^";
        preg_match($regex, $password, $matches);
        return !empty($matches);
    }

    private function ValidateRegisterFrom($name, $email, $password, $reptitionPassword, $service)
    {
        $errors = null;
        if ($name || $email || $password || $reptitionPassword || $service) {
            if (strlen($name) < 3) {
                $errors[] = "نام حداقل باید 3 کاراکتر باشد";
            }
            if (strlen($email) == 0) {
                $errors[] = "لطفا آدرس ایمیل را وارد کنید";
            } else {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "آدرس ایمیل را به درستی وارد کنید";
                }
            }
            if (strlen($password) == 0) {
                $errors[] = "لطفا رمزعبور خود را وارد کنید";
            } else {
                if (!$this->validatePassword($password)) {
                    $errors[] = "رمزعبور حداقل باید دارای 6 کاراکتر(ترکیبی از عدد و حروف بزرگ و کوچک و کاراکترهای خاص) باشد";
                }
            }
            if ($password != $reptitionPassword) {
                $errors[] = "رمزعبور و تکرار رمزعبور باید یکسان باشد";
            }
            if (is_null($service)) {
                $errors[] = "لطفا یکی از سرویس ها را انتخاب کنید";
            }
        } else {
            $errors[] = "لطفا تمامی فیلد ها را پر کنید";
        }
        return $errors;
    }

    private function validate_mobile_number($phone)
    {
        $mobileRegex = '~^(0098|\+?98|0)9\d{9}$~';
        preg_match($mobileRegex, $phone, $matches);
        if (!empty($matches)) {
            $phone = '0' . substr($phone, -10, 10);
            return $phone;
        }
        return null;
    }
    //endregion

    //region website

    //register user
    public function registerUser()
    {
        $response = [];
        if (isset($_POST['phoneEmail']))
        {
            $phone = $this->validate_mobile_number($_POST['phoneEmail']);
            if (is_null($phone))
            {
                $response['errors'] = "لطفا شماره موبایل را به درستی وارد کنید";
            }
            else
            {
                $user = User::where("mobile", $phone)->first();
                if (!isset($user->mobile))
                {
                    $user = new User();
                    $user->verified_code = $this->generate_random_code();
                    $user->mobile = $phone;
                    $user->save();
                    $_SESSION['tmp_user'] = $phone;
                    //Todo  ersal sms be karbar
                    header("Location: /verifyUser");
                }
                else if (isset($user->mobile) && is_null($user->verified_at))
                {
                    $user->verified_code = $this->generate_random_code();
                    $user->save();
                    //TODO send sms code verification ...
                    $_SESSION['tmp_user'] = $phone;
                    //Todo  ersal sms be karbar
                    header("Location: /verifyUser");
                }
                else
                {
                    $response['errors'] = 'کاربر با این شماره وجود دارد.';
                }
            }
        }

        return View::renderTemplate("register", ['response' => $response]);
    }

    public function verifyUser()
    {
        if (!isset($_SESSION['tmp_user']))
        {
            header("Location: /register");
            exit();
        }

        $response = null;

        if (isset($_POST['submitCode']))
        {
            $user = User::where('mobile', $_SESSION['tmp_user'])->first();
            if (isset($user->verified_code))
            {
                if ($_POST['verify_code'] == $user->verified_code)
                {
                    $user->verified_code = null;
                    $user->verified_at = date('Y-m-d H:i:s');
                    $user->save();
                    $_SESSION['register_user'] = $user->mobile;
                    unset($_SESSION['tmp_user']);
                    header('Location: /registerUser');
                }
                $response['errors'] = 'کد وارد شده درست نمی باشد.';
            }
        }
        if (isset($_POST['changeCode']))
        {
//            Todo: ersal sms be karbar

            $user = User::where('mobile', $_SESSION['tmp_user'])->first();
            $response['success'] = "کد فعالسازی مجددا ارسال شد.";
            $user->verified_code = $this->generate_random_code();
            $user->save();
        }

        return View::renderTemplate('verify', ['response' => $response]);
    }

    public function register()
    {
        if (!isset($_SESSION['register_user']))
        {
            header("Location: /register");
            exit();
        }
        $response = null;
        $user = User::where('mobile', $_SESSION['register_user'])->first();
        if (isset($user) && $user->verified_at)
        {
            if (isset($_POST['send-register']))
            {
                $response = $this->ValidateRegisterFrom($_POST['name'], $_POST['email'],
                    $_POST['password'], $_POST['repititionPassword'], $_POST['service'] ?? null);
                if ($response)
                {
                    return View::renderTemplate('registerUser', ['response' => $response, 'post' => $_POST]);
                }
                else
                {
                    $hash = $this->hashSSHA($_POST['password']);
                    $user->name = $_POST['name'];
                    $user->password = $hash['encrypted'];
                    $user->salt = $hash['salt'];
                    $user->email = $_POST['email'];
                    $user->service = $_POST['service'];
                    $user->save();
                    unset($_SESSION['register_user']);
                    $_SESSION['userLogin'] = $user->mobile;
                    header("Location: /");
                }
            }
        }
        else
        {
            header('Location: /register');
        }
        return View::renderTemplate('registerUser', ['response' => $response, 'post' => null]);
    }

    //reset password user
    public function resetPasswordPhone()
    {
        //TODO :ersale code br shomare karbar
        $resposne = null;
        if (isset($_POST['phone']))
        {
            $phone = $this->validate_mobile_number($_POST['phone']);
            if (strlen($_POST['phone']) == 0)
            {
                $resposne['errors'] = "ابتدا شماره موبایل خود را وارد نمایید";
            }
            else
            {
                if (is_null($phone))
                {
                    $resposne['errors'] = "لطفا شماره موبایل را به درستی وارد کنید";
                }
                else
                {
                    $user = User::where('mobile', $phone)->first();
                    if ($user)
                    {
                        $_SESSION['reset_password'] = $phone;
                        $user->verified_code = $this->generate_random_code();
                        $user->save();
                        header("Location: /resetPasswordCode");
                    }
                    else
                    {
                        $resposne['errors'] = "شما هنوز ثبت نام نکرده اید";
                    }
                }
            }
        }

        return View::renderTemplate("resetPasswordPhone", ['response' => $resposne]);
    }

    public function resetPasswordCode()
    {
        if (!isset($_SESSION['reset_password']))
        {
            header("Location: /resetPasswordPhone");
            exit();
        }
        $response = null;
        $user = User::where('mobile', $_SESSION['reset_password'])->first();
        if (isset($_POST['changeCode']))
        {
            $user->verified_code=$this->generate_random_code();
            $user->save();
        }
        if (isset($_POST['resetPassword']))
        {
            if ($user) {
                if ($_POST['resetPassword'] != $user->verified_code)
                {
                    $response['errors'] = 'کد وارد شده درست نمی باشد';
                }
                else
                {
                    $user->verified_code = null;
                    $user->save();
                    $_SESSION['resetPasswordUser'] = $user->mobile;
                    unset($_SESSION['reset_password']);
                    header("Location: /resetPassword");
                }
            }
            else
            {
                $response['errors'] = 'کاربری با این شماره وجود ندارد';
            }
        }
        return View::renderTemplate('resetPasswordCode', ['response' => $response]);
    }

    public function resetPassword()
    {
        if (!isset($_SESSION['resetPasswordUser']))
        {
            header("Location: /resetPasswordPhone");
            exit();
        }
        $response = null;
        if (isset($_POST['reset-password']))
        {
            $user = User::where("mobile", $_SESSION['resetPasswordUser'])->first();
            if ($user)
            {
                if (strlen($_POST['password']) == 0)
                {
                    $response['errors'] = "لطفا رمزعبور خود را وارد کنید";
                }
                else if ($this->validatePassword($_POST['password']))
                {
                    if ($_POST['password'] == $_POST['r-password'])
                    {
                        $hash = $this->hashSSHA($_POST['password']);
                        $user->password = $hash['encrypted'];
                        $user->salt = $hash['salt'];
                        $user->save();
                        unset($_SESSION['reset_password']);
                        $response['success'] = "رمز با موفقیت تغییر یافت";
                        header('Location: /login');
                    }
                    else
                    {
                        $response['errors'] = 'رمزعبور و تکرار رمزعبور باید یکسان باشد';
                    }
                }
                else
                {
                    $response['errors'] = 'رمزعبور حداقل باید دارای 6 کاراکتر(ترکیبی از عدد و حروف بزرگ و کوچک و کاراکترهای خاص) باشد';
                }
            }
            else
            {
                $response['errors'] = "خطایی در سرور رخ داده است";
            }
        }

        return View::renderTemplate('reset_password', ['response' => $response]);
    }

    //login user
    public function login()
    {
        if (isset($_SESSION['userLogin']))
        {
            header("Location: /");
            exit();
        }
        $response = null;
        if (isset($_POST['loginSubmit']))
        {
            $phone = $this->validate_mobile_number($_POST['phone']);
            $user = User::where('mobile', $phone)->first();
            if ($user && !is_null($user->verified_at))
            {
                $hash = $this->checkUserLogin($user->salt, $user->password, $_POST['password']);
                if (!$hash)
                {
                    $response['errors'] = "رمز عبور اشتباه است";
                }
                else
                {
                    $_SESSION['userLogin'] = $user->mobile;
                    header("Location: /");
                    exit();
                }
            }
            else
            {
                $response['errors'] = "کاربری با این شماره وجود ندارد";
            }
        }

        return View::renderTemplate('login', ['response' => $response]);
    }

    //logout user
    public function logout()
    {
        if (!isset($_SESSION['userLogin']))
        {
            header("Location: /login");
            exit();
        }
        unset($_SESSION['userLogin']);
        session_destroy();
        header("Location : /");
    }

    //endregion

    //region Application

    //Register Function for application(back-end server)
    public function registerPhoneApp()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);
        if (isset($_POST["phone"]))
        {
            $phone = $_POST["phone"];
            $user = User::where("mobile", $phone)->first();
            if (!isset($user->mobile))
            {
                $user = new User();
                $user->verified_code = $this->generate_random_code();
                $user->mobile = $phone;
                $user->save();
                //TODO send sms code verification ...
                //user stored successfully
                $response["error"] = FALSE;
                $response["error_msg"] = "کد تایید به شماره موبایل " . $phone . " ارسال شد";
                echo json_encode($response);
            }
            else if (isset($user->mobile) && is_null($user->verified_at))
            {
                $user->verified_code = $this->generate_random_code();
                $user->save();
                //TODO send sms code verification ...
                //user stored successfully
                $response["error"] = FALSE;
                $response["error_msg"] = "کد تایید به شماره موبایل " . $phone . " ارسال شد";
                echo json_encode($response);
            }
            else
            {
                $response["error"] = TRUE;
                $response["error_msg"] = "کاربر با شماره " . $phone . " وجود دارد.";
                echo json_encode($response);
            }
        }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "شماره تلفن را وارد کنید";
            echo json_encode($response);
        }
    }

    public function verifyPhoneApp()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);

        if (isset($_POST["phone"]))
        {
            $user = User::where("mobile", $_POST["phone"])->first();
            if (isset($_POST["verify_code"]))
            {
                if (isset($user->verified_code))
                {
                    if ($_POST["verify_code"] == $user->verified_code)
                    {
                        $user->verified_code = null;
                        $user->verified_at = date('Y-m-d H:i:s');
                        $user->save();
                        $response["error"] = FALSE;
                        $response["error_msg"] = "کد تایید به درستی وارد شد ";
                        echo json_encode($response);
                    }
                    else
                    {
                        $response["error"] = TRUE;
                        $response["error_msg"] = "کد واردشده صحیح نیست";
                        echo json_encode($response);
                    }
                }
                else
                {
                    $response["error"] = TRUE;
                    $response["error_msg"] = "مشکل در ارسال کد تایید";
                    echo json_encode($response);
                }
            }
            else
            {
                $response["error"] = TRUE;
                $response["error_msg"] = "کد تایید ارسال نشده است";
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

    public function registerUserApp()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);

        if (isset($_POST["phone"]))
        {
            $user = User::where("mobile", $_POST["phone"])->first();
            if (isset($user) && $user->verified_at)
            {
                if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["service"]))
                {
                    $hash = $this->hashSSHA($_POST['password']);
                    $user->name = $_POST['name'];
                    $user->password = $hash['encrypted'];
                    $user->salt = $hash['salt'];
                    $user->email = $_POST['email'];
                    $user->service = $_POST["service"];
                    $user->save();
                    $response["error"] = FALSE;
                    $response["error_msg"] = "ثبت نام شما با موفقیت انجام شد";
                    echo json_encode($response);
                }
                else
                {
                    $response["error"] = TRUE;
                    $response["error_msg"] = "پارامترهای موردنیاز را ارسال کنید";
                    echo json_encode($response);
                }
            }
            else
            {
                $response["error"] = TRUE;
                $response["error_msg"] = "احراز هویت با مشکل مواجه شد";
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

    //Login function for application(back-end server)
    public function loginApp()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);

        if (isset($_POST["phone"]) && isset($_POST["password"]))
        {
            $user = User::where("mobile", $_POST["phone"])->first();
            if ($user && !is_null($user->verified_at))
            {
                $hash = $this->checkUserLogin($user->salt, $user->password, $_POST['password']);
                if (!$hash)
                {
                    $response["error"] = TRUE;
                    $response["error_msg"] = "رمز عبور واردشده اشتباه است";
                    echo json_encode($response);
                }
                else
                {
                    $response["error"] = FALSE;
                    $response["error_msg"] = "با موفقیت وارد شدید";
                    echo json_encode($response);
                }
            }
            else
            {
                $response["error"] = TRUE;
                $response["error_msg"] = "کاربر با شماره " . $_POST["phone"] . " وجود ندارد";
                echo json_encode($response);
            }
        }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "پارامترهای موردنیاز ارسال نشده است";
            echo json_encode($response);
        }
    }

    //Reset password Functions for Application(back-end server)
    public function resetPasswordPhoneApp()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);

        if (isset($_POST["phone"]))
        {
            $user = User::where("mobile", $_POST["phone"])->first();
            if (isset($user))
            {
                $user->verified_code = $this->generate_random_code();
                $user->save();
                //TODO :Send verification code by sms
                $response["error"] = FALSE;
                $response["error_msg"] = "کد تایید به شماره موبایل " . $_POST["phone"] . " ارسال شد";
                echo json_encode($response);
            }
            else
            {
                $response["error"] = TRUE;
                $response["error_msg"] = "کاربر با شماره " . $_POST["phone"] . " وجود ندارد";
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

    public function resetPasswordCodeApp()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);

        if (isset($_POST["phone"]) && isset($_POST["verify_code"]))
        {
            $user = User::where("mobile", $_POST["phone"])->first();
            if (isset($user) && !is_null($user->verified_code))
            {
                if ($_POST["verify_code"] == $user->verified_code)
                {
                    $user->verified_code = null;
                    $user->save();
                    $response["error"] = FALSE;
                    $response["error_msg"] = "کد تایید به درستی وارد شد";
                    echo json_encode($response);
                }
                else
                {
                    $response["error"] = TRUE;
                    $response["error_msg"] = "کد واردشده استباه است";
                    echo json_encode($response);
                }
            }
            else
            {
                $response["error"] = TRUE;
                $response["error_msg"] = "کاربر با شماره " . $_POST["phone"] . " وجود ندارد";
                echo json_encode($response);
            }
        }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "پارامترهای موردنیاز ارسال نشده است";
            echo json_encode($response);
        }
    }

    public function resetPasswordApp()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);

        if (isset($_POST["phone"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"]))
        {
            $user = User::where("mobile", $_POST["phone"])->first();
            if (isset($user))
            {
                $hash = $this->hashSSHA($_POST['password']);
                $user->password = $hash['encrypted'];
                $user->salt = $hash['salt'];
                $user->save();
                $response["error"] = FALSE;
                $response["error_msg"] = "رمزعبور شما با موفقیت تغییر یافت";
                echo json_encode($response);
            }
            else
           {
                $response["error"] = TRUE;
                $response["error_msg"] = "کاربر با شماره " . $_POST["phone"] . " وجود ندارد";
                echo json_encode($response);
            }
        }
        else
        {
            $response["error"] = TRUE;
            $response["error_msg"] = "پارامترهای موردنیاز ارسال نشده است";
            echo json_encode($response);
        }
    }

    //Change password(in edit profile)
    public function changePasswordApp()
    {
        header('Content-Type: application/json');
        $response = array("error" => FALSE);

        if (isset($_POST["phone"]))
        {
            $phone = $_POST["phone"];
            $user = User::where("mobile", $phone)->first();
            if (isset($user) && $user->verified_at)
            {
                if (isset($_POST["password"]))
                {
                    $hash = $this->hashSSHA($_POST['password']);
                    $user->password = $hash['encrypted'];
                    $user->salt = $hash['salt'];
                    $response["error"] = FALSE;
                    $response["error_msg"] = "رمزعبور با موفقیت تغییر یافت";
                    $user->update();
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

    //endregion

}