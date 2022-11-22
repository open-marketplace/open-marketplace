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

final class CheckoutProcessEnd2EndTest extends JsonApiTestCase
{
    public function test_it_for_shipment_methods_for_multiple_vendors_during_order(): void
    {
        $this->loadFixturesFromFile('Shop/CheckoutProcessEnd2EndTest/test_it_for_shipment_methods_for_multiple_vendors.yml');

        $response = $this->executeCreateCartRequest();
        $this->assertResponse($response, 'Shop/CheckoutProcessEnd2EndTest/create_order_response', Response::HTTP_CREATED);

        $token = $this->extractTokenValue($response);

        $response = $this->executeAddFirstCartItemRequest($token);
        $this->assertResponse($response, 'Shop/CheckoutProcessEnd2EndTest/add_item_first_product_variant_response', Response::HTTP_CREATED);

        $response = $this->executeAddSecondCartItemRequest($token);
        $this->assertResponse($response, 'Shop/CheckoutProcessEnd2EndTest/add_item_second_product_variant_response', Response::HTTP_CREATED);

        $response = $this->executeAddAddressInformationToOrderRequest($token);
        $this->assertResponse($response, 'Shop/CheckoutProcessEnd2EndTest/add_addresses_information_response', Response::HTTP_OK);

        $shipmentsIds = $this->extractShipmentsIds($response);
        $paymentId = $this->extractPaymentId($response);

        $response = $this->executeGetShipmentMethodsRequest($token, $shipmentsIds[0]);
        $this->assertResponse($response, 'Shop/CheckoutProcessEnd2EndTest/get_first_shipment_available_shipping_methods_response', Response::HTTP_OK);

        $response = $this->executeGetShipmentMethodsRequest($token, $shipmentsIds[1]);
        $this->assertResponse($response, 'Shop/CheckoutProcessEnd2EndTest/get_second_shipment_available_shipping_methods_response', Response::HTTP_OK);

        $response = $this->executeChangeDefaultShippingMethodRequest($token, $shipmentsIds[1]);
        $this->assertResponse($response, 'Shop/CheckoutProcessEnd2EndTest/change_default_shipping_method_for_second_shipment_response', Response::HTTP_OK);

        $response = $this->executeSelectPaymentMethodRequest($token, $paymentId);
        $this->assertResponse($response, 'Shop/CheckoutProcessEnd2EndTest/select_payment_method_response', Response::HTTP_OK);

        $response = $this->executeCompleteCheckoutRequest($token);
        $this->assertResponse($response, 'Shop/CheckoutProcessEnd2EndTest/complete_checkout_response', Response::HTTP_OK);
    }

    private function executeCreateCartRequest(): Response
    {
        $this->client->request(
            'POST',
            '/api/v2/shop/orders',
            [],
            [],
            self::CONTENT_TYPE_HEADER,
            json_encode([])
        );

        return $this->client->getResponse();
    }

    private function extractTokenValue(Response $response): string
    {
        $data = json_decode($response->getContent(), true);

        return $data['tokenValue'];
    }

    private function executeAddFirstCartItemRequest(string $token): Response
    {
        $this->client->request(
            'POST',
            '/api/v2/shop/orders/' . $token . '/items',
            [],
            [],
            self::CONTENT_TYPE_HEADER,
            json_encode([
                'productVariant' => '/api/v2/shop/product-variants/olivier_1_1',
                'quantity' => 3,
            ])
        );

        return $this->client->getResponse();
    }

    private function executeAddSecondCartItemRequest(string $token): Response
    {
        $this->client->request(
            'POST',
            '/api/v2/shop/orders/' . $token . '/items',
            [],
            [],
            self::CONTENT_TYPE_HEADER,
            json_encode([
                'productVariant' => '/api/v2/shop/product-variants/bruce_1_1',
                'quantity' => 1,
            ])
        );

        return $this->client->getResponse();
    }

    private function executeAddAddressInformationToOrderRequest(string $token): Response
    {
        $this->client->request(
            'PUT',
            '/api/v2/shop/orders/' . $token,
            [],
            [],
            self::CONTENT_TYPE_HEADER,
            json_encode([
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
            ])
        );

        return $this->client->getResponse();
    }

    private function extractShipmentsIds(Response $response): array
    {
        $data = json_decode($response->getContent(), true);
        $shipmentsIds = [];
        foreach ($data['shipments'] as $shipment) {
            $shipmentsIds[] = (string) $shipment['id'];
        }

        return $shipmentsIds;
    }

    private function extractPaymentId(Response $response): string
    {
        $data = json_decode($response->getContent(), true);

        return (string) $data['payments'][0]['id'];
    }

    private function executeGetShipmentMethodsRequest(string $token, string $shipmentsIds): Response
    {
        $this->client->request(
            'GET',
            '/api/v2/shop/orders/' . $token . '/shipments/' . $shipmentsIds . '/methods',
            [],
            [],
            self::CONTENT_TYPE_HEADER
        );

        return $this->client->getResponse();
    }

    private function executeChangeDefaultShippingMethodRequest(string $token, string $shipmentsIds): Response
    {
        $this->client->request(
            'PATCH',
            '/api/v2/shop/orders/' . $token . '/shipments/' . $shipmentsIds,
            [],
            [],
            ['CONTENT_TYPE' => 'application/merge-patch+json', 'HTTP_ACCEPT' => 'application/ld+json'],
            json_encode([
                'shippingMethod' => '/api/v2/shop/shipping-methods/fedex',
            ])
        );

        return $this->client->getResponse();
    }

    private function executeSelectPaymentMethodRequest(string $token, string $paymentId): Response
    {
        $this->client->request(
            'PATCH',
            '/api/v2/shop/orders/' . $token . '/payments/' . $paymentId,
            [],
            [],
            ['CONTENT_TYPE' => 'application/merge-patch+json', 'HTTP_ACCEPT' => 'application/ld+json'],
            json_encode([
                'paymentMethod' => '/api/v2/shop/payment-methods/CASH_ON_DELIVERY',
            ])
        );

        return $this->client->getResponse();
    }

    private function executeCompleteCheckoutRequest(string $token): Response
    {
        $this->client->request(
            'PATCH',
            '/api/v2/shop/orders/' . $token . '/complete',
            [],
            [],
            ['CONTENT_TYPE' => 'application/merge-patch+json', 'HTTP_ACCEPT' => 'application/ld+json'],
            json_encode([
                'notes' => 'notes',
            ])
        );

        return $this->client->getResponse();
    }
}
