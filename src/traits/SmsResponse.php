<?php


namespace Kingsleyudenewu\Estoresms\traits;


use Illuminate\Support\Arr;

trait SmsResponse
{
    private function getSmsErrorResponses()
    {
        $filtered = Arr::except(config('estoresms.sms_response'), config('estoresms.sms_response.OK'));
        [$keys, $values] = Arr::divide($filtered);
        return $keys;
    }

    private function getSmsConfigResponseMessage($key)
    {
        return config('estoresms.sms_response')[$key];
    }
}
