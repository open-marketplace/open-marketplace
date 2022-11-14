<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Integration\Api\Shop;

use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\Integration\Api\JsonApiTestCase;

final class CheckoutProcessTest extends JsonApiTestCase
{
    public function test_it_for_shipment_methods_for_multiple_vendors(): void
    {
        $this->loadFixturesFromFile('checkout/test_it_for_shipment_methods_for_multiple_vendors.yml');

        $this->client->request('POST', '/api/v2/shop/orders', [], [], self::CONTENT_TYPE_HEADER, json_encode([]));
        $response = $this->client->getResponse();

        $this->assertResponse($response, 'shop//checkout/create_order_response', Response::HTTP_CREATED);

        $lastData = json_decode($response->getContent(), true);
        $token = $lastData['tokenValue'];

        $this->client->request('POST', '/api/v2/shop/orders/' . $token . '/items', [], [], self::CONTENT_TYPE_HEADER, json_encode([
            'productVariant' => '/api/v2/shop/product-variants/olivier_1_1',
            'quantity' => 3,
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'shop/checkout/add_item_first_product_variant_response', Response::HTTP_CREATED);

        $this->client->request('POST', '/api/v2/shop/orders/' . $token . '/items', [], [], self::CONTENT_TYPE_HEADER, json_encode([
            'productVariant' => '/api/v2/shop/product-variants/bruce_1_1',
            'quantity' => 1,
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'shop/checkout/add_item_second_product_variant_response', Response::HTTP_CREATED);

        // add address information
        $this->client->request('PUT', '/api/v2/shop/orders/' . $token, [], [], self::CONTENT_TYPE_HEADER, json_encode([
            'email' => 'test@bigbag.com',
            'shippingAddress' => [
                'firstName' => 'John',
                'lastName' => 'Novak',
                'countryCode' => 'PL',
                'city' => 'Warszawa',
                'street' => 'Testowa 3',
                'postcode' => '11-123',
            ],
            'billingAddress' => [
                'firstName' => 'John',
                'lastName' => 'Novak',
                'countryCode' => 'PL',
                'city' => 'Warszawa',
                'street' => 'Testowa 3',
                'postcode' => '11-123',
            ],
            'quantity' => 1,
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'shop/checkout/add_addresses_information_response', Response::HTTP_OK);

        $lastData = json_decode($response->getContent(), true);
        $shipmentsIds = [];
        foreach ($lastData['shipments'] as $shipment) {
            $shipmentsIds[] = $shipment['id'];
        }

        $this->client->request('GET', '/api/v2/shop/orders/' . $token . '/shipments/' . $shipmentsIds[0] . '/methods', [], [], self::CONTENT_TYPE_HEADER);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'shop/checkout/get_first_shipment_available_shipping_methods', Response::HTTP_OK);

        $this->client->request('GET', '/api/v2/shop/orders/' . $token . '/shipments/' . $shipmentsIds[1] . '/methods', [], [], self::CONTENT_TYPE_HEADER);
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'shop/checkout/get_second_shipment_available_shipping_methods', Response::HTTP_OK);

        // change default method for second shipment
        $this->client->request('PATCH', '/api/v2/shop/orders/' . $token . '/shipments/' . $shipmentsIds[1], [], [], ['CONTENT_TYPE' => 'application/merge-patch+json', 'HTTP_ACCEPT' => 'application/ld+json'], json_encode([
            'shippingMethod' => '/api/v2/shop/shipping-methods/fedex',
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'shop/checkout/change_default_shipping_method_for_second_shipment_response', Response::HTTP_OK);

        $this->client->request('PATCH', '/api/v2/shop/orders/' . $token . '/payments/' . $lastData['payments'][0]['id'], [], [], ['CONTENT_TYPE' => 'application/merge-patch+json', 'HTTP_ACCEPT' => 'application/ld+json'], json_encode([
            'paymentMethod' => '/api/v2/shop/payment-methods/CASH_ON_DELIVERY',
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'shop/checkout/select_payment_method_response', Response::HTTP_OK);

        $this->client->request('PATCH', '/api/v2/shop/orders/' . $token . '/complete', [], [], ['CONTENT_TYPE' => 'application/merge-patch+json', 'HTTP_ACCEPT' => 'application/ld+json'], json_encode([
            'notes' => 'notes',
        ]));
        $response = $this->client->getResponse();
        $this->assertResponse($response, 'shop/checkout/complete_checkout_response', Response::HTTP_OK);
    }
}
