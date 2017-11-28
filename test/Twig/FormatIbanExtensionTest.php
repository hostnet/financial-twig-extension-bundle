<?php
/**
 * @copyright 2017 Hostnet B.V.
 */
declare(strict_types=1);
namespace Hostnet\Bundle\FinancialTwigExtensionBundle\Twig;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Hostnet\Bundle\FinancialTwigExtensionBundle\Twig\FormatIbanExtension
 */
class FormatIbanExtensionTest extends TestCase
{
    /**
     * @var FormatIbanExtension
     */
    private $format_iban_extension;

    protected function setUp()
    {
        $this->format_iban_extension = new FormatIbanExtension();
    }

    public function testGetFilters()
    {
        self::assertEquals(
            [new \Twig_SimpleFilter('formatIban', [$this->format_iban_extension, 'formatIban'])],
            $this->format_iban_extension->getFilters()
        );
    }

    public function testFormatIban()
    {
        self::assertSame('NL85 INGB 0008 5231 41', $this->format_iban_extension->formatIban('NL85INGB0008523141'));
        self::assertSame('NL85 INGB 0008 5231 41', $this->format_iban_extension->formatIban('N L85IN GB00085 23141'));
    }
}
