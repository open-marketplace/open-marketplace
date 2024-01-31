<?php

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Behat\Page\Admin\Product;

use Sylius\Behat\Page\Admin\Product\UpdateSimpleProductPage as BaseUpdateSimpleProductPage;

final class UpdateSimpleProductPage extends BaseUpdateSimpleProductPage implements UpdateSimpleProductPageInterface
{
    public function getValidationMessageForPriceField(): string
    {
        $priceElement = $this->getElement('prices');
        $validationMessage = $priceElement->find('css', '.sylius-validation-error');

        return $validationMessage->getText();
    }
}
