<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Override\Sylius\Bundle\AdminBundle\Controller;

use App\Kernel;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use Http\Message\MessageFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Webmozart\Assert\Assert;

final class NotificationController
{
    private Uri $hubUri;

    public function __construct(
        private ClientInterface $client,
        private MessageFactory $messageFactory,
        string $hubUri,
        private string $environment,
        ) {
        $this->hubUri = new Uri($hubUri);
    }

    public function getVersionAction(Request $request): JsonResponse
    {
        $content = [
            'version' => Kernel::OPEN_MARKETPLACE_VERSION,
            'hostname' => \sprintf('%s,%s', 'open-marketplace;', $request->getHost()),
            'locale' => $request->getLocale(),
            'user_agent' => $request->headers->get('User-Agent'),
            'environment' => $this->environment,
        ];
        $headers = ['Content-Type' => 'application/json'];

        $encodedContent = json_encode($content);
        Assert::string($encodedContent);

        $hubRequest = $this->messageFactory->createRequest(
            Request::METHOD_GET,
            $this->hubUri,
            $headers,
            $encodedContent,
        );

        try {
            $hubResponse = $this->client->send($hubRequest, ['verify' => false]);
        } catch (GuzzleException) {
            return new JsonResponse('', JsonResponse::HTTP_NO_CONTENT);
        }

        $hubResponse = json_decode($hubResponse->getBody()->getContents(), true);

        return new JsonResponse($hubResponse);
    }
}
