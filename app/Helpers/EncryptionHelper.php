<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Log;

class EncryptionHelper
{
    public static function decryptString($cipherText, $integrationKey, $merchantCode)
    {
        try {
            $cipherBytes = base64_decode($cipherText);

            $key = self::convertToBase64Bytes($integrationKey, 32);
            $iv = self::convertToBase64Bytes($merchantCode, 16);

            $decryptedData = openssl_decrypt(
                $cipherBytes,
                'AES-256-CBC',
                $key,
                OPENSSL_RAW_DATA,
                $iv
            );

            if ($decryptedData === false) {
                throw new Exception('Decryption failed.');
            }

            return $decryptedData;
        } catch (Exception $ex) {
            Log::error("Error in decryptString: {$ex->getMessage()}");
            throw $ex;
        }
    }

    private static function convertToBase64Bytes($input, $requiredLength)
    {
        $bytes = base64_decode($input, true);

        if ($bytes === false) {
            $bytes = utf8_encode($input);
        }

        return self::adjustLength($bytes, $requiredLength);
    }

    private static function adjustLength($inputBytes, $requiredLength)
    {
        $length = strlen($inputBytes);

        if ($length === $requiredLength) {
            return $inputBytes;
        }

        if ($length > $requiredLength) {
            return substr($inputBytes, 0, $requiredLength);
        }

        return str_pad($inputBytes, $requiredLength, "\0");
    }
}
