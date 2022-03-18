<?php
class Validate
{
    public function accountValidate($data)
    {
        $errors = [];

        //     $valMail = (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) ? FALSE : TRUE;
        //     if($valMail == false){
        //         $error[] = '<div class ="alert alert-danger">Email không đúng định dạng ! </div>' ; 
        //     }

        // validate email 
        if (empty($data['user_mail'])) {
            $errors[] = 'Email không được để trống !';
        } elseif (!filter_var($data['user_mail'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email không đúng định dạng !';
        } elseif (strlen($data['user_mail']) > 320) {
            $errors[] = 'Độ dài email phải nhỏ hơn 320 ký tự !';
        }

        // validate password 
        if (empty($data['user_pass'])) {
            $errors[] = 'Mật khẩu không được để trống !';
        } elseif (strlen($data['user_pass']) < 3) {
            $errors[] = 'Độ dài mật khẩu phải ít nhất 3 ký tự !';
        } elseif (strlen($data['user_pass']) > 255) {
            $errors[] = 'Độ dài mật khẩu phải nhỏ hơn 255 ký tự !';
        }
        return $errors;
    }

    public function userValidate($data)
    {

        $errors = [];
        $name = $this->convert_vi_to_en($data['user_name']);
        $regex = "/^([a-zA-Z']+)$/";

        if (empty($data['user_name'])) {
            $errors[] = 'Họ tên không được để trống !';
        
        }elseif(strlen($data['user_name']) > 255 ){
            $errors[] = 'Độ dài họ tên không được vượt quá 256 ký tư !';   
        }
         elseif (!preg_match($regex, $name)) {
            $errors[] = 'Họ tên phải đúng định dạng và không được chứa ký tự đặc biệt!';
        }

        // Validate Email
        if (empty($data['user_mail'])) {
            $errors[] = 'Email không được để trống !';
        } elseif (!filter_var($data['user_mail'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email không đúng định dạng !';
        } elseif (strlen($data['user_mail']) > 255) {
            $errors[] = 'Độ dài email phải nhỏ hơn 256 ký tự !';
        }

        return $errors;
    }

    public function passValidate($data)
    {
        // Validate Password
        $errors = [];
        if (empty($data['user_pass']) || empty($data['user_re_pass'])) {
            $errors[] = 'Mật khẩu không được để trống !';
        } elseif ($data['user_pass'] != $data['user_re_pass']) {
            $errors[] = 'Mật khẩu không trùng khớp !';
        } elseif (strlen($data['user_pass']) < 5 || !preg_match("#[0-9]+#", $data['user_pass']) || !preg_match("#[A-Z]+#", $data['user_pass'])) {
            $errors[] = 'Độ dài mật khẩu tối thiểu 6 ký tự, phải chứa ít nhất 1 chữ hoa và 1 số !';
        } elseif (strlen($data['user_pass']) > 255) {
            $errors[] = 'Độ dài mật khẩu không vượt quá 256 ký tự !';
        }
        return $errors;
    }

    public function convert_vi_to_en($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        $str = str_replace("  ", "1", $str);
        $str = str_replace(" ", "", $str);

        return $str;
    }

    function nameFormat($str)
    {
        return mb_convert_case(mb_strtolower($str, 'utf8'), MB_CASE_TITLE, "utf-8");
    }
}
