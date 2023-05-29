<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\End2End\Api;

use Symfony\Component\HttpFoundation\Response;
use Tests\BitBag\OpenMarketplace\End2End\End2EndTestCase;

final class CheckoutProcessEnd2EndTest extends End2EndTestCase
{
    public function test_it_for_shipment_methods_for_multiple_vendors_during_order(): void
    {
        $this->loadFixturesFromFile('CheckoutProcessEnd2EndTest/test_it_for_shipment_methods_for_multiple_vendors.yml');
        $token = $this->createCartAndCheckResponse();
        $this->addProductsToCartAndCheckResponse($token);
        $extractedOrderResponse = $this->fillAddressInformationAndCheckResponse($token);
        $this->checkAvailableShippingMethods($token, $extractedOrderResponse['shipments']);
        $this->changeDefaultShippingMethodAndCheckResponse($token, (string) $extractedOrderResponse['shipments'][1]['id']);
        $this->selectPaymentMethodAndCheckResponse($token, (string) $extractedOrderResponse['payments'][0]['id']);
        $this->completeCheckoutAndCheckResponse($token);
    }

    private function createCartAndCheckResponse(): string
    {
        $response = $this->executeCreateCartRequest();
        $this->assertResponse(
            $response,
            'CheckoutProcessEnd2EndTest/create_order_response',
            Response::HTTP_CREATED
        );

        return $this->extractTokenValue($response);
    }

    private function addProductsToCartAndCheckResponse(string $token): void
    {
        $response = $this->executeAddCartItemRequest($token, [
            'productVariant' => '/api/v2/shop/product-variants/olivier_1_1',
            'quantity' => 3,
        ]);
        $this->assertResponse(
            $response,
            'CheckoutProcessEnd2EndTest/add_item_first_product_variant_response',
            Response::HTTP_CREATED
        );

        $response = $this->executeAddCartItemRequest($token, [
            'productVariant' => '/api/v2/shop/product-variants/bruce_1_1',
            'quantity' => 1,
        ]);
        $this->assertResponse(
            $response,
            'CheckoutProcessEnd2EndTest/add_item_second_product_variant_response',
            Response::HTTP_CREATED
        );
    }

    private function fillAddressInformationAndCheckResponse(string $token): array
    {
        $response = $this->executeAddAddressInformationToOrderRequest($token);
        $this->assertResponse(
            $response,
            'CheckoutProcessEnd2EndTest/add_addresses_information_response',
            Response::HTTP_OK
        );

        return $this->extractResponse($response);
    }

    private function checkAvailableShippingMethods(string $token, array $shipments): void
    {
        $response = $this->executeGetShipmentMethodsRequest($token, (string) $shipments[0]['id']);
        $this->assertResponse($response, 'CheckoutProcessEnd2EndTest/get_first_shipment_available_shipping_methods_response', Response::HTTP_OK);

        $response = $this->executeGetShipmentMethodsRequest($token, (string) $shipments[1]['id']);
        $this->assertResponse($response, 'CheckoutProcessEnd2EndTest/get_second_shipment_available_shipping_methods_response', Response::HTTP_OK);
    }

    private function changeDefaultShippingMethodAndCheckResponse(string $token, $shipmentId): void
    {
        $response = $this->executeChangeDefaultShippingMethodRequest($token, $shipmentId);
        $this->assertResponse(
            $response,
            'CheckoutProcessEnd2EndTest/change_default_shipping_method_for_second_shipment_response',
            Response::HTTP_OK
        );
    }

    private function selectPaymentMethodAndCheckResponse(string $token, string $paymentId): void
    {
        $response = $this->executeSelectPaymentMethodRequest($token, $paymentId);
        $this->assertResponse(
            $response,
            'CheckoutProcessEnd2EndTest/select_payment_method_response',
            Response::HTTP_OK
        );
    }

    private function completeCheckoutAndCheckResponse(string $token): void
    {
        $response = $this->executeCompleteCheckoutRequest($token);
        $this->assertResponse(
            $response,
            'CheckoutProcessEnd2EndTest/complete_checkout_response',
            Response::HTTP_OK
        );
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

    private function executeAddCartItemRequest(string $token, array $data): Response
    {
        $this->client->request(
            'POST',
            '/api/v2/shop/orders/' . $token . '/items',
            [],
            [],
            self::CONTENT_TYPE_HEADER,
            json_encode($data)
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

    private function extractResponse(Response $response): array
    {
        return json_decode($response->getContent(), true);
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
