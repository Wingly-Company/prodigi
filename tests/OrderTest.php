<?php

namespace Wingly\Prodigi\Tests;

use Wingly\Prodigi\Order;

class OrderTest extends TestCase
{
    public function test_can_create_orders(): void
    {
        $order = Order::create($this->orderPayload());

        $this->assertNotNull($order->id);
    }

    public function test_can_get_an_order_by_id(): void
    {
        $orderCreated = Order::create($this->orderPayload());

        $order = Order::find($orderCreated->id);

        $this->assertEquals($orderCreated->id, $order->id);
    }

    public function test_can_check_if_order_is_cancelable()
    {
        $order = Order::create($this->orderPayload());

        $this->assertTrue($order->canCancel());
    }

    public function test_can_cancel_an_order(): void
    {
        $order = Order::create($this->orderPayload());

        $order = $order->cancel();

        $this->assertEquals('Cancelled', $order->status->stage);
    }

    protected function orderPayload(array $params = []): array
    {
        return array_merge([
            'shippingMethod' => 'Overnight',
            'recipient' => [
                'name' => 'Mr Testy McTestface',
                'address' => [
                    'line1' => '14 test place',
                    'postalOrZipCode' => '12345',
                    'countryCode' => 'US',
                    'townOrCity' => 'somewhere',
                ],
            ],
            'items' => [
                [
                    'sku' => 'GLOBAL-CFPM-16X20',
                    'copies' => 1,
                    'sizing' => 'fillPrintArea',
                    'attributes' => [
                        'color' => 'black',
                    ],
                    'assets' => [
                        [
                            'printArea' => 'default',
                            'url' => 'https://pwintyimages.blob.core.windows.net/samples/stars/test-sample-grey.png',
                        ],
                    ],
                ],
            ],
        ], $params);
    }
}
