<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Core\Common\Controller\Resource;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class SettlementController extends ResourceController
{
    public function showOrderAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $this->isGrantedOr403($configuration, ResourceActions::SHOW);
        $resource = $this->findOr404($configuration);
        $resources = $this->resourcesCollectionProvider->get($configuration, $this->repository);

        return $this->render($configuration->getTemplate(ResourceActions::SHOW . '.html'), [
            'configuration' => $configuration,
            'metadata' => $this->metadata,
            'settlement' => $resource,
            'resources' => $resources,
            $this->metadata->getName() => $resource,
        ]);
    }
}
