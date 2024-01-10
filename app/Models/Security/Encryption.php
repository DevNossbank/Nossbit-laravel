<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encryption extends Model
{
    use HasFactory;

    private $KeyValue;

    public function construct() {
        $this->KeyValue = "KujBavHTDgDBggqR";
    }

     function decrypt($value)
    {
        $raw = base64_decode($value);
        $text = openssl_decrypt($raw, "AES-128-CBC", $this->KeyValue, OPENSSL_RAW_DATA, str_repeat("\0", 16));

        if ($text === false) {
            echo "Something went wrong with decrypt: " . openssl_error_string();
            exit;
        }
        return $text;
    }

     function encrypt($content)
    {
        $ivlen = openssl_cipher_iv_length('AES-128-CBC');
        $iv = pack("16" . $ivlen);
        $ciphertext = base64_encode(openssl_encrypt($content, 'AES-128-CBC', $this->KeyValue, OPENSSL_RAW_DATA, str_repeat("\0", 16)));
        $msg = json_encode(array('Data' => ['Json' => "$ciphertext"]));
        return $msg;
    }
}
 