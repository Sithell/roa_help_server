<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function jsonResponse($data, $code=200, $mess=null)
    {
        if (is_null($mess)) {
            return response()->json(
                $data, $code,
                ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
        return response()->json(
            ['msg' => $mess] + $data, $code,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    function httpPost($url, $data) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    function sendMessage($message) {
        $url = "https://api.telegram.org/bot970690429:AAG0Ydbc8CUIo5p1YJ8CQZu2AhZJXQc4N2o/sendMessage";
        $data = array(
            'chat_id' => -422612741,
            'text' => $message
        );
        $this->httpPost($url, $data);
    }
}
