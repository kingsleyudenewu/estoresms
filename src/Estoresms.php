<?php

namespace Kingsleyudenewu\Estoresms;

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
            if (in_array($balance, $this->getErrorResponses())) {
                return $this->setResponse(false, null, $this->getConfigResponseMessage($balance));
            }
            return $this->setResponse(true, $balance, 'success');
        }
        return $this->setResponse(false, null, 'error');
    }

//    public function airtimeProductList()
//    {
//        $data[''];
//        $network_list = $this->postRequest(config('estoresms.url'));
//    }
//
//    public function sendFlashSms($sender, $recipient, $dnd = false)
//    {
//        $flash_sms = $this->postRequest('')
//    }
//
//    public function sendSms($sender, $recipient, $dnd = false)
//    {
//
//    }
}
