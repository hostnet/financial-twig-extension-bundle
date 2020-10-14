<?php
/**
 * @copyright 2017 Hostnet B.V.
 */
declare(strict_types=1);
namespace Hostnet\Bundle\FinancialTwigExtensionBundle\Twig;

use PHPUnit\Framework\TestCase;
use Twig\TwigFilter;

/**
 * @covers \Hostnet\Bundle\FinancialTwigExtensionBundle\Twig\FormatIbanExtension
 */
class FormatIbanExtensionTest extends TestCase
{
    /**
     * @var FormatIbanExtension
     */
    private $format_iban_extension;

    protected function setUp(): void
    {
        $this->format_iban_extension = new FormatIbanExtension();
    }

    public function testGetFilters(): void
    {
        self::assertEquals(
            [new TwigFilter('formatIban', [$this->format_iban_extension, 'formatIban'])],
            $this->format_iban_extension->getFilters()
        );
    }

    public function testFormatIban(): void
    {
        self::assertSame('NL85 INGB 0008 5231 41', $this->format_iban_extension->formatIban('NL85INGB0008523141'));
        self::assertSame('NL85 INGB 0008 5231 41', $this->format_iban_extension->formatIban('N L85IN GB00085 23141'));
    }
}
