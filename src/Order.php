<?php

namespace Wingly\Prodigi;

use Spatie\DataTransferObject\DataTransferObject;

class Order extends DataTransferObject
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

        return new self($response);
    }

    public static function find(string $id)
    {
        $response = app(Prodigi::class)->getOrder($id);

        return new self($response);
    }

    public function canCancel(): bool
    {
        $response = app(Prodigi::class)->getAvailableActions($this->id);

        return $response['cancel']['isAvailable'] === 'Yes';
    }

    public function cancel(): self
    {
        $response = app(Prodigi::class)->cancelOrder($this->id);

        return new self($response);
    }
}
