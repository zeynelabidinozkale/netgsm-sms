# Laravel Netgsm Sms Paketi

[![Latest Stable Version](https://poser.pugx.org/zeynelabidinozkale/netgsm-sms/v/stable)](https://packagist.org/packages/zeynelabidinozkale/netgsm-sms)
[![Total Downloads](https://poser.pugx.org/zeynelabidinozkale/netgsm-sms/downloads)](https://packagist.org/packages/zeynelabidinozkale/netgsm-sms)
[![License](https://poser.pugx.org/zeynelabidinozkale/netgsm-sms/license)](https://github.com/zeynelabidinozkale/netgsm-sms/blob/main/LICENSE)
 

To use this package, you need to register with Netgsm at https://www.netgsm.com.tr/ and enable PHP API support.

Run this code from the command line: 

```
composer require zeynelabidinozkale/netgsm-sms dev-main
```

```config/app.php``` Add the following lines to the config/app.php file:

```php
return array(
    // ...

    'providers' => array(
        // ...

        Zeynelabidinozkale\NetgsmSms\SmsServiceProvider::class,
    ),

    // ...

    'aliases' => array(
        // ...

        'Sms' => Zeynelabidinozkale\NetgsmSms\Facades\SmsFacade::class,
    ),
);
```
# Ayarlar

```code
php artisan vendor:publish
```
Use the command to publish the config/sms/sms.php file:

### sms.php

```code
return [
    "usercode"  => "Your Netgsm Username",
    "password"  => "Your Netgsm Password",
    "startdate" => "",
    "stopdate"  => "",
    "type"      => "1:n",
    "msgheader" => "Your Approved SMS Header in Netgsm PHP API",
    "tr"        => false, // true sends with Turkish characters, false sends without Turkish characters
];

```  

#Usage
```php
public function index()
{
    return \Sms::sendsms('Hello World','905051078955');
}
```
