<?php
/**
 * @copyright 2017 Hostnet B.V.
 */
declare(strict_types=1);
namespace Hostnet\Bundle\FinancialTwigExtensionBundle\Twig;

class FormatIbanExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('formatIban', [$this, 'formatIban'])
        ];
    }

    public function formatIban(string $iban): string
    {
        return implode(' ', str_split(preg_replace('/\s+/', '', $iban), 4));
    }
}
