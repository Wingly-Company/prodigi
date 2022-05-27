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
