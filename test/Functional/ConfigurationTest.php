<?php
/**
 * @copyright 2017 Hostnet B.V.
 */
declare(strict_types=1);

namespace Hostnet\Bundle\FinancialTwigExtensionBundle\Functional;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ConfigurationTest extends KernelTestCase
{
    protected function setUp(): void
    {
        static::bootKernel();
    }

    /**
     * @dataProvider formatIbanProvider
     */
    public function testFormatIban(string $unformatted_iban, string $expected): void
    {
        $container = static::$kernel->getContainer();
        $twig      = $container->get('twig');

        self::assertSame(
            $expected,
            $twig->render('@FinancialTwigBundleFunctional/ibantest.html.twig', ['iban' => $unformatted_iban])
        );
    }

    public function formatIbanProvider(): array
    {
        return [
            ['NL85INGB0008523141'     , 'NL85 INGB 0008 5231 41'],
            ['NL8 5I NGB00 085 2314 1', 'NL85 INGB 0008 5231 41'],
            ['No IBAN'                , 'No IBAN'],
        ];
    }
}
