![](https://box.kancloud.cn/5a0aaa69a5ff42657b5c4715f3d49221) 

# ThinkPHP Paypal Api

[![Packagist Version](https://img.shields.io/packagist/v/denisneuf/thinkphp-paypal-api)](https://packagist.org/packages/denisneuf/thinkphp-paypal-api)

A library to support Paypal Rest API from [ThinkPHP](https://github.com/top-think/framework/) framework.

## USE OF THINKPHP INTEGRATION

```php
use think\facade\Cache;
```

To store the token in the ThinkPHP Cache
```php
use think\facade\Env;
```

To obtain the credentials from ThinkPHP Env

## SET UP

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


### DISCLAIMER

This package is based on [paypal/paypal-checkout-sdk](http://github.com/paypal/Checkout-PHP-SDK) has been archived by the owner on Jul 21, 2022. It is now read-only.

We are not affiliated with PayPal.

### LICENSE

![License](https://img.shields.io/badge/license-MIT-green)