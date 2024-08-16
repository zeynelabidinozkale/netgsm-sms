<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Zeynelabidinozkale\NetgsmSms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Description of SmsFacade
 *
 * @author webdeveloper
 */
class SmsFacade extends Facade {

    //put your code here

    protected static function getFacadeAccessor()
    {
        return 'sms';
    }

}
