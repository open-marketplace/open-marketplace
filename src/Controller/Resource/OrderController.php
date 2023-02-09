<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Controller\Resource;

use Sylius\Bundle\CoreBundle\Controller\OrderController as BaseOrderController;
use Sylius\Bundle\ShippingBundle\Form\Type\ShipmentShipType;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class OrderController extends BaseOrderController
{
    public function showAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $this->isGrantedOr403($configuration, ResourceActions::SHOW);
        $resource = $this->findOr404($configuration);

        $event = $this->eventDispatcher->dispatch(ResourceActions::SHOW, $configuration, $resource);
        $eventResponse = $event->getResponse();
        if (null !== $eventResponse) {
            return $eventResponse;
        }

        if ($configuration->isHtmlRequest()) {
            return $this->render($configuration->getTemplate(ResourceActions::SHOW . '.html'), [
                'configuration' => $configuration,
                'metadata' => $this->metadata,
                'resource' => $resource,
                'form' => $this->createForm(ShipmentShipType::class)->createView(),
                $this->metadata->getName() => $resource,
            ]);
        }

        return $this->createRestView($configuration, $resource);
    }
}
