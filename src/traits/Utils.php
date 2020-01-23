<?php


namespace Kingsleyudenewu\Estoresms\traits;


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
}
