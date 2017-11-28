<?php
/**
 * @copyright 2017 Hostnet B.V.
 */
declare(strict_types=1);

namespace Hostnet\Bundle\FinancialTwigExtensionBundle\Functional;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ConfigurationTest extends KernelTestCase
{
    protected function setUp()
    {
        static::bootKernel();
    }

    public function testFormatIban()
    {
        $container = static::$kernel->getContainer();
        $twig      = $container->get('twig');

        self::assertSame(
            'NL85 INGB 0008 5231 41',
            $twig->render('/ibantest.html.twig', ['iban' => 'NL85INGB0008523141'])
        );

        self::assertSame(
            'NL85 INGB 0008 5231 41',
            $twig->render('/ibantest.html.twig', ['iban' => 'NL8 5I NGB00 085 2314 1'])
        );
    }
}
