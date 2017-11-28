<?php
/**
 * @copyright 2017 Hostnet B.V.
 */
declare(strict_types=1);

namespace Hostnet\Bundle\FinancialTwigExtensionBundle\Functional\Fixtures;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        return [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \Hostnet\Bundle\FinancialTwigExtensionBundle\Bundle\HostnetFinancialTwigExtensionBundle()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');
    }

    public function getLogDir()
    {
        return __DIR__ . '/../../../var/log';
    }

    public function getCacheDir()
    {
        return __DIR__ . '/../../../var/cache';
    }
}
