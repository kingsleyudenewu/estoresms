<?php


namespace Kingsleyudenewu\Estoresms\traits;


use Illuminate\Support\Arr;
use Ixudra\Curl\Facades\Curl;

trait Utils
{
    private function getRequest($url, $header = [])
    {
        $response = Curl::to($url)
            ->withHeaders($header)
            ->asJson()
            ->get();

        if (!is_null($response))return $response;
        return false;
    }

    private function postRequest($url, $data, $header=[])
    {
        $response = Curl::to($url)
            ->withHeaders($header)
            ->withData($data)
            ->asJson()
            ->post();

        if (!is_null($response))return $response;
        return false;
    }

    private function setResponse($status, $data, $message)
    {
        $response = [];
        $response['status'] = $status;
        if (!is_null($data))
        {
            $response['data'] = $data;
        }

        $response['message'] = $message;
        return response()->json($response);
    }

    private function getErrorResponses()
    {
        $filtered = Arr::except(config('estoresms.response'), config('estoresms.response.OK') );
        [$keys, $values] = Arr::divide($filtered);
        return $keys;
    }

    private function getConfigResponseMessage($key)
    {
        return config('estoresms.response')[$key];
    }
}
