<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace BitBag\OpenMarketplace\Component\Vendor\Generator;

use BitBag\OpenMarketplace\Component\Vendor\Repository\VendorRepositoryInterface;

final class SlugGenerator implements SlugGeneratorInterface
{
    private VendorRepositoryInterface $vendorRepository;

    public function __construct(VendorRepositoryInterface $vendorRepository)
    {
        $this->vendorRepository = $vendorRepository;
    }

    public function generateSlug(string $companyName): string
    {
        if (null == $baseSlug = preg_replace('/\s+/', '-', $companyName)) {
            throw new \Exception('Cannot generate slug from given company name.');
        }

        $slug = $baseSlug;
        $number = 1;
        while ($this->slugExists($slug)) {
            $slug = $baseSlug . '-' . $number;
            ++$number;
        }

        return $slug;
    }

    private function slugExists(string $slug): bool
    {
        $slug = $this->vendorRepository->findOneBy(['slug' => $slug]);

        return !(null === $slug);
    }
}
