<?php

namespace Wingly\Prodigi;

use Spatie\LaravelData\Data;

class Order extends Data
{
    public string $id;

    public string $created;

    public string $lastUpdated;

    public ?string $merchantReference;

    public string $shippingMethod;

    public ?string $idempotencyKey;

    public Status $status;

    /** @var Charge[] */
    public $charges;

    /** @var Shipment[] */
    public $shipments;

    public Recipient $recipient;

    /** @var Item[] */
    public $items;

    public ?PackingSlip $packingSlip;

    public ?array $metadata;

    public static function create(array $data)
    {
        $response = app(Prodigi::class)->createOrder($data);

        return self::from($response);
    }

    public static function find(string $id)
    {
        $response = app(Prodigi::class)->getOrder($id);

        return self::from($response);
    }

    public function canCancel(): bool
    {
        $response = app(Prodigi::class)->getAvailableActions($this->id);

        return $response['cancel']['isAvailable'] === 'Yes';
    }

    public function cancel(): self
    {
        $response = app(Prodigi::class)->cancelOrder($this->id);

        return self::from($response);
    }
}
