<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\OpenMarketplace\Functional;

use Sylius\Tests\Api\JsonApiTestCase as BaseJsonApiTestCase;
use Sylius\Tests\Api\Utils\AdminUserLoginTrait;

abstract class FunctionalTestCase extends BaseJsonApiTestCase
{
    use AdminUserLoginTrait;

    protected string $filesPath;

    public function __construct(
        ?string $name = null,
        array $data = [],
        string $dataName = ''
    ) {
        parent::__construct($name, $data, $dataName);

        $this->dataFixturesPath = __DIR__ . \DIRECTORY_SEPARATOR . 'DataFixtures' . \DIRECTORY_SEPARATOR . 'ORM';
        $this->expectedResponsesPath = __DIR__ . \DIRECTORY_SEPARATOR . 'Responses' . \DIRECTORY_SEPARATOR . 'Expected';
        $this->filesPath = __DIR__ . \DIRECTORY_SEPARATOR . 'Resources' . \DIRECTORY_SEPARATOR . 'files';
    }

    public function getFilePath(string $fileName): string
    {
        return $this->filesPath . \DIRECTORY_SEPARATOR . $fileName;
    }

    protected function getHeaderForLoginShopUser(string $email): array
    {
        $loginData = $this->logInShopUser($email);
        $authorizationHeader = self::getContainer()->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;

        return array_merge($header, self::CONTENT_TYPE_HEADER);
    }

    protected function getHeaderForAdmin(string $email): array
    {
        $loginData = $this->logInAdminUser($email);
        $authorizationHeader = self::getContainer()->getParameter('sylius.api.authorization_header');
        $header['HTTP_' . $authorizationHeader] = 'Bearer ' . $loginData;

        return array_merge($header, self::CONTENT_TYPE_HEADER);
    }
}
