[![thinkphp](https://box.kancloud.cn/5a0aaa69a5ff42657b5c4715f3d49221)](https://www.kancloud.cn/manual/thinkphp6_0/1037479)

# ThinkPHP Paypal Api

[![Packagist Version](https://img.shields.io/packagist/v/denisneuf/thinkphp-paypal-api)](https://packagist.org/packages/denisneuf/thinkphp-paypal-api)

A library to support Paypal Rest API from [ThinkPHP](https://github.com/top-think/framework/) framework.


## INSTALL

First Install your ThinkPHP project:

> The operating environment of ThinkPHP6.1 requires PHP7.2.5+, with a maximum compatibility of PHP8.2

### INSTALL THINKPHP WITH COMPOSER

~~~
composer create-project topthink/think tp
~~~

Init service

~~~
cd tp
php think run
~~~

You can then access it in a browser

~~~
http://localhost:8000
~~~

If the framework needs to be updated
~~~
composer update topthink/framework
~~~

### REQUIRE THINKPHP-PAYPAL-API
```
composer require denisneuf/thinkphp-paypal-api

```

Run an update to install the package

~~~
composer update
~~~


### USE IT IN YOUR CONTROLLER
```php
<?php
declare (strict_types = 1);

namespace app\controller;

use app\BaseController;
use think\facade\Env;
use think\facade\View;
use think\Request;
use think\Log;

use PayPalSdk\Core\PayPalClient;
use PayPalSdk\disputes\DisputesGetRequest;
use PayPalHttp\HttpException;

class YourController extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */

    public function index(Log $log)
    {

        $request = new DisputesGetRequest();

        try{
            $client = PayPalClient::client();
            $response = $client->execute($request);
        }
        catch(HttpException $exception){
            $message = json_decode($exception->getMessage(), true);
            dump($message);
            exit;
        }
        finally
        {

        	$log->info(gettype($response->result->items));
        }


        View::assign('title','View Disputes');
        View::assign('lang', Env::get('lang.default_lang'));
        View::assign('description','View Disputes');
        View::assign('list', $response->result->items);
        return View::fetch('admin/list/dispute');

    }

}
```


### SET UP

Create or edit your .env file and put in the root of your thinkphp project ( SANDBOX or PRODUCTION )
```
# environment variables defined inside a .env file


[PAYPAL]

#SandBox LeadTech
client_id = "your-client-id-sandbox"
client_secret = "your-client-secret-sandbox"
#Production LeadTech
#client_id = "your-client-id-production"
#client_secret = "your-client-secret-production"
#client_environment = "PRODUCTION"
```


### THINKPHP INTEGRATION

This library uses Cache and Env from ThinkPHP framework.

```php
use think\facade\Cache;
```

To store the token in the ThinkPHP Cache
```php
use think\facade\Env;
```

To obtain the credentials from ThinkPHP Env


### DISCLAIMER

This package is based on [paypal/paypal-checkout-sdk](http://github.com/paypal/Checkout-PHP-SDK) has been archived by the owner on Jul 21, 2022. It is now read-only.

We are not affiliated with PayPal.

### LICENSE

![License](https://img.shields.io/badge/license-MIT-green)