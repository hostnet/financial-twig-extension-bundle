<?php
/**
 * @copyright 2017 Hostnet B.V.
 */
declare(strict_types=1);

namespace Hostnet\Bundle\FinancialTwigExtensionBundle\Bundle;

use Hostnet\Bundle\FinancialTwigExtensionBundle\Twig\FormatIbanExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

/**
 * @covers \Hostnet\Bundle\FinancialTwigExtensionBundle\Bundle\HostnetFinancialTwigExtensionBundle
 */
class HostnetFinancialTwigExtensionBundleTest extends TestCase
{
    /**
     * @var HostnetFinancialTwigExtensionBundle
     */
    private $hostnet_financial_twig_extension_bundle;

    protected function setUp(): void
    {
        $this->hostnet_financial_twig_extension_bundle = new HostnetFinancialTwigExtensionBundle();
    }

    public function testBuild(): void
    {
        $container = new ContainerBuilder();
        $this->hostnet_financial_twig_extension_bundle->build($container);

        self::assertInstanceOf(
            Definition::class,
            $container->getDefinition(FormatIbanExtension::class)
        );
    }
}
