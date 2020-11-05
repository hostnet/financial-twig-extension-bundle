<?php
/**
 * @copyright 2017 Hostnet B.V.
 */
declare(strict_types=1);

namespace Hostnet\Bundle\FinancialTwigExtensionBundle\Twig;

use IsoCodes\Iban;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class FormatIbanExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new TwigFilter('formatIban', [$this, 'formatIban']),
        ];
    }

    public function formatIban(string $iban): string
    {
        $raw_iban = preg_replace('/\s+/', '', $iban);

        return Iban::validate($raw_iban) ? implode(' ', str_split($raw_iban, 4)) : $iban;
    }
}
