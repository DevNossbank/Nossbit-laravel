<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encryption extends Model
{
    use HasFactory;

    private $KeyValue;

    public function __construct() {
        $this->KeyValue = "USURaTiONGuldENT";
    }

     function decrypt($value)
    {
        echo"</br></br>";
        echo"Value passado na função ".$value;
        echo"</br></br>";
        $raw = base64_decode($value);
        $text = openssl_decrypt($raw, "AES-128-CBC", $this->KeyValue, OPENSSL_RAW_DATA, "0000000000000000");
        echo"</br></br>";
            echo"Foi passado esse key Value ".$this->KeyValue;
            echo"</br></br>";
            echo"</br></br>";
            echo"Foi passado esse Raw ".var_dump($raw);
            echo"</br></br>";


        if ($text === false) {
            echo "Something went wrong with decrypt: " . openssl_error_string();
            echo"</br></br>";
            echo$this->KeyValue;
            exit;
        }
        return $text;
    }

     function encrypt($content)
    {
        /*
        $ivlen = openssl_cipher_iv_length('AES-128-CBC');
        $iv = pack("16" . $ivlen);
        $ciphertext = base64_encode(openssl_encrypt($content, 'AES-128-CBC', $this->KeyValue, OPENSSL_RAW_DATA, str_repeat("\0", 16)));
        $msg = json_encode(array('Data' => ['Json' => "$ciphertext"]));
        return $msg;
*/
        
       
        $ivlen = openssl_cipher_iv_length('AES-128-CBC');
        //$iv = "0000000000000000";
        $ciphertext = base64_encode(openssl_encrypt($content, 'AES-128-CBC', $this->KeyValue, OPENSSL_RAW_DATA, "0000000000000000"));
        $msg = json_encode(array('Data' => ['Json' => "$ciphertext"]));
        return $msg;

        
        
    }
}
 