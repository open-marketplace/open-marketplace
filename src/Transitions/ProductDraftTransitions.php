<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Transitions;

final class ProductDraftTransitions
{
    public const GRAPH = 'product_draft';

    public const TRANSITION_SEND_TO_VERIFICATION = 'send_to_verification';

    public const TRANSITION_ACCEPT = 'accept_product_draft';

    public const TRANSITION_REJECT = 'reject_product_draft';
}
