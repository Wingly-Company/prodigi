<?php

namespace Wingly\Prodigi\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Middleware\ValidateSignature;
use Wingly\Prodigi\Events\WebhookProcessed;
use Wingly\Prodigi\Order;

class WebhookController extends Controller
{
    public function __construct()
    {
        $this->middleware(ValidateSignature::class);
    }

    public function handleWebhook(Request $request): Response
    {
        $payload = json_decode((string) $request->getContent());

        try {
            $order = Order::find($payload->data->order->id);

            WebhookProcessed::dispatch($order);

            return response('Webhook Processed', 200);
        } catch (Exception $e) {
            return response()->noContent(200);
        }
    }
}
