<?php

namespace Kingsleyudenewu\Estoresms;

use Kingsleyudenewu\Estoresms\traits\Utils;

class Estoresms
{
    use Utils;

    public function accountBalance()
    {
        $balance = $this->getRequest(config('url').'smsapi.php?'.
            'username='. config('username').
            '&password='.config('password').
            '&balance=true&');

        if (!is_null($balance) || !empty($balance))
        {
            return $this->setResponse(true, $balance, 'success');
        }
    }

    public function airtimeProductList()
    {
        $data[''];
        $network_list = $this->postRequest(config('network_list'));
    }

    public function flashSms($sender, $recipient, $dnd = false)
    {
        $flash_sms = $this->postRequest('')
    }
}
