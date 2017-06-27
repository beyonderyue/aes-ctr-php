<?PHP 
/*
 用法：
 Security::encrypt($str,$iv,$key);
 Security::decrypt($str,$iv,$key);
 */
class Security {
    public static function encrypt($input, $iv, $key) {
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', "ctr", '');
        mcrypt_generic_init($td, $key, $iv);
        $data = mcrypt_generic($td, $input);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $data;
    }
 
    public static function decrypt($sStr, $iv, $sKey) {
        $decrypted= mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            $sKey,
            $sStr,
            "ctr", 
            $iv
        );
        return $decrypted;
    }
}

