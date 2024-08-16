<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Zeynelabidinozkale\NetgsmSms;

use Illuminate\Support\Facades\Config;

/**
 * Description of SmsManagement
 *
 * @author webdeveloper
 */
class SmsManagement {

    //put your code here


    public function getXMLPOST($PostAddress, $xmlData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $PostAddress);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml; charset=utf-8"));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
        $result = curl_exec($ch);
        return $result;
    }

    public function replace_tr($text)
    {
        $text = trim($text);
        $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü');
        $replace = array('C', 'c', 'G', 'g', 'i', 'I', 'O', 'o', 'S', 's', 'U', 'u');
        $new_text = str_replace($search, $replace, $text);
        return $new_text;
    }

    public function sendsms($message, $number)
    {
        switch (Config::get('sms.sms.tr'))
        {
            case false:
                $message = $this->replace_tr($message);
                break;
            case true:
                $message = $message;
                break;
            default :
                $message = $this->replace_tr($message);
                break;
        }
        
        $xml = "<?xml version='1.0' encoding='utf-8'?>
                            <mainbody>
                                <header>
                                    <company dil='TR'>NETGSM</company>
                                    <usercode>" . Config::get('sms.sms.usercode') . "</usercode>
                                    <password>" . Config::get('sms.sms.password') . "</password>
                                    <startdate>" . Config::get('sms.sms.startdate') . "</startdate>
                                    <stopdate>" . Config::get('sms.sms.stopdate') . "</stopdate>
                                    <type>" . Config::get('sms.sms.type') . "</type>
                                    <msgheader>" . Config::get('sms.sms.msgheader') . "</msgheader>
                                </header>
                                <body>
                                    <msg><![CDATA[" . $message . "]]></msg>
                                    <no>" . $number . "</no>
                                </body>
                            </mainbody>";
        $this->getXMLPOST('http://api.netgsm.com.tr/xmlbulkhttppost.asp', $xml);
    }

}
