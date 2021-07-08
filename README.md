# financial-twig-extension-bundle
A simple Symfony Bundle that contains twig extensions for
displaying financial information

Installation
------------
Install the latest version via [composer](https://getcomposer.org/):
```bash
php composer.phar require hostnet/financial-twig-extension-bundle
```

Then add the bundle to your AppKernel bundles:
```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new \Hostnet\Bundle\FinancialTwigExtensionBundle\Bundle\HostnetFinancialTwigExtensionBundle(),
        // ...
    );
}
```

Usage
-----
Currently, we support formatting International Bank Account
Numbers (IBAN) for displaying on a page (a space for every four characters):
```twig
{{ "NL85INGB0008523141"|formatIban }}
```

This will result in the following output:
```text
NL85 INGB 0008 5231 41
```

Requirements
------------

PHP 7.3.x or above.

License
-------

This library is licensed under the MIT License, meaning you can reuse the code
within proprietary software provided that all copies of the licensed software
include a copy of the MIT License terms and the copyright notice.

For more information, see the [LICENSE](LICENSE) file.
