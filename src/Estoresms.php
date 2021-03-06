<?php

namespace Kingsleyudenewu\Estoresms;

use Kingsleyudenewu\Estoresms\traits\SmsResponse;
use Kingsleyudenewu\Estoresms\traits\Utils;

class Estoresms
{
    use Utils;

    public function accountBalance()
    {
        $balance = $this->getRequest(config('estoresms.url') . 'smsapi.php?' .
            'username=' . config('estoresms.username') .
            '&password=' . config('estoresms.password') .
            '&balance=true&');

        if (!is_null($balance) || !empty($balance)) {
            // Check if its response is not an array od error codes
            if (in_array($balance, $this->getErrorResponses(config('estoresms.sms_response'),
                config('estoresms.sms_response.OK')))) {
                return $this->setResponse(false,
                    null,
                    $this->getConfigResponseMessage(config('estoresms.sms_response'), $balance)
                );
            }
            return $this->setResponse(true, $balance, 'success');
        }
        return $this->setResponse(false, null, 'error');
    }

    public function sendSms($data = [])
    {
        if (empty($data) || !is_array($data))
        {
            return $this->setResponse(false, null, 'Invalid payload');
        }
        if (is_null($data['sender']) || empty($data['sender']))
        {
            return $this->setResponse(false, null, $this->getConfigResponseMessage(config('estoresms.sms_response'), '-2914'));
        }

        if (is_null($data['recipient']) || empty($data['recipient']) || !is_string($data['recipient']))
        {
            return $this->setResponse(false, null, $this->getConfigResponseMessage(config('estoresms.sms_response'), '-2912'));
        }

        if (is_null($data['message']) || empty($data['message']) || !is_string($data['message']))
        {
            return $this->setResponse(false, null, $this->getConfigResponseMessage(config('estoresms.sms_response'), '-2913'));
        }

        if ($data['sms_type'] == 'flash')
        {
            if ($data['dnd'])
            {
                $send_sms = $this->getRequest(config('estoresms.url').
                    'flashsms_api.php?username='. config('estoresms.username').
                    '&password='.config('estoresms.username').
                    '&recipient='.$data['recipient'].
                    '&message='.$data['message'].
                    '&dnd='.$data['dnd']
                );
            }
            else
            {
                $send_sms = $this->getRequest(config('estoresms.url').
                    'flashsms_api.php?username='. config('estoresms.username').
                    '&password='.config('estoresms.username').
                    '&recipient='.$data['recipient'].
                    '&message='.$data['message'].'&'
                );
            }
        }
        elseif ($data['sms_type'] == 'sms')
        {
            if ($data['dnd'])
            {
                $send_sms = $this->getRequest(config('estoresms.url').
                    'smsapi.php?username='. config('estoresms.username').
                    '&password='.config('estoresms.username').
                    '&recipient='.$data['recipient'].
                    '&message='.$data['message'].
                    '&dnd='.$data['dnd']
                );
            }
            else
            {
                $send_sms = $this->getRequest(config('estoresms.url').
                    'smsapi.php?username='. config('estoresms.username').
                    '&password='.config('estoresms.username').
                    '&recipient='.$data['recipient'].
                    '&message='.$data['message'].'&'
                );
            }
        }

        // Check if we got an error response from the SMS API
        $error_response = $this->displayErrorMessage(config('estoresms.sms_response'), $send_sms);
        if (!is_null($error_response)){
            return $error_response;
        }

        // Return success message and the number of SMS unit used
        return $this->setResponse(true, $send_sms, 'success');
    }

    public function getBillPaymentList($category)
    {
        $hash = hash('sha512', config('estoresms.token').config('estoresms.email').config('estoresms.username') );

        // Fetch product list
        $payload = [
          'username' => config('estoresms.username'),
          'hash' => $hash,
          'category' => $category,
        ];
        $product_list = $this->postRequest(config('url').'bill_payment_processing/v/1/', $payload, []);
        if (optional($product_list)->response == 'OK')
        {
            return $product_list;
        }
    }

    public function getProductPlans()
    {

    }
}
