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

    private function getErrorResponses($response_type, $response_filter_value)
    {
        $filtered = Arr::except($response_type, $response_filter_value);
        [$keys, $values] = Arr::divide($filtered);
        return $keys;
    }

    private function getConfigResponseMessage($response_type, $key)
    {
        return $response_type[$key];
    }

    private function displayErrorMessage($response_type, $error_code)
    {
        if (in_array($error_code, $this->getErrorResponses($response_type, $response_type['OK'])))
        {
            return $this->setResponse(false,
                null,
                $this->getConfigResponseMessage($response_type, $error_code)
//                $this->getConfigResponseMessage(config('estoresms.sms_response'), $balance)
            );
        }
    }
}
