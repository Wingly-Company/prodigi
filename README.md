# Prodigi

## Introduction 

This package provides a wrapper around [Prodigi Printing API](https://www.prodigi.com/print-api) orders.
It offers an eloquent way to create, retrieve and cancel orders in Prodigi for Laravel applications.  

## Installation 

First make sure to configure the repository in your composer.json by running:

```bash
composer config repositories.prodigi vcs https://github.com/Wingly-Company/prodigi
```

Then install the package by running:

```bash
composer require wingly/prodigi
```

## Configuration 

You need to configure your Prodigi API key in your .env file.

```
PRODIGI_API_KEY=your_prodigi_key
```

You should also set the API environment to be either "sandbox" or "production"

```
PRODIGI_API=sandbox
```

## Usage 

### Creating orders

To create a new order you should use the `create` method of the `Order` class. Check the [Prodigi documentation](https://www.prodigi.com/print-api/docs/reference/#create-order) for all the available parameters. 

```php
$order = Order::create([
    'shippingMethod' => 'Overnight',
    'recipient' => [
        ... 
    ],
    'items' => [
        ...
    ]
])
```

### Retrieving orders

To retrieve an order from [Prodigi](https://www.prodigi.com/print-api/docs/reference/#get-order-by-id) you should use the `find` method of the `Order` class. 

```php
$order = Order::find('ord_840797');
```

### Canceling orders

To [cancel an order](https://www.prodigi.com/print-api/docs/reference/#cancel-an-order) first retrieve an instance of your order and then use the `cancel` method. 

```php
$order = Order::find('ord_840797');

$order->cancel();
```

You might want to check if the order is cancelable before you call the cancel action. In that case you can use the `canCancel` method. 

```php
$order = Order::find('ord_840797');

if ($order->canCancel()) {
    $order->cancel();
}
```

## Processing Prodigi Webhooks

Prodigi can make callbacks to a custom URL whenever the status of one of your orders changes. By default, a route that points to a webhook controller is configured through the Prodigi service provider. All incoming Prodigi webhook requests will be handled there. Make sure that you have set up your callback URL under the integrations section of the Prodigi dashboard. The webhook controller listens to the prodigi/webhook URL path.

### Signed Webhook URL

To secure your webhooks you must add a signed URL to Prodigi dashboard. For convenience the package contains a console command that will generate a secure URL for you. Copy the signed URL and add it to Prodigi dashboard. A middleware is in place to validate the signed route requests.

```bash
php artisan prodigi:sign
```

### CSRF Protection

You gonna need to list the URI as an exception to the `VerifyCsrfToken` middleware included in your application.

```php 
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'prodigi/*'
    ];
}
```




 
