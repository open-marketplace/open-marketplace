<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Api\DataTransformer;

use BitBag\OpenMarketplace\Api\Messenger\Command\ResourceIdAwareInterface;
use Sylius\Bundle\ApiBundle\DataTransformer\CommandDataTransformerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Webmozart\Assert\Assert;

final class ResourceIdAwareCommandDataTransformer implements CommandDataTransformerInterface
{
    private RequestStack $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    /**
     * @param ResourceIdAwareInterface $object
     *
     * @return ResourceIdAwareInterface
     */
    public function transform(
        $object,
        string $to,
        array $context = []
    ) {
        /** @var Request $request */
        $request = $this->requestStack->getCurrentRequest();
        $attributes = $request->attributes;

        $attributeKey = $object->getResourceIdAttributeKey();
        Assert::true($attributes->has($attributeKey), 'Path does not have resource id');

        /** @var string $resourceId */
        $resourceId = $attributes->get($object->getResourceIdAttributeKey());

        $object->setResourceId($resourceId);

        return $object;
    }

    /** @param ResourceIdAwareInterface $object */
    public function supportsTransformation($object): bool
    {
        return $object instanceof ResourceIdAwareInterface;
    }
}
