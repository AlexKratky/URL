# URL
PHP Class to easy work with URI, getting its part etc.

[![Downloads this Month](https://img.shields.io/packagist/dm/alexkratky/url.svg)](https://packagist.org/packages/alexkratky/url)
[![Repository size](https://img.shields.io/github/repo-size/alexkratky/URL)](https://github.com/AlexKratky/URL)
[![License](https://img.shields.io/github/license/AlexKratky/URL)](https://github.com/AlexKratky/URL/blob/master/LICENSE)
[![Version](https://img.shields.io/packagist/v/alexkratky/url)](https://packagist.org/packages/alexkratky/url)

```php
<?php
// e.g. visiting https://panx.eu/docs/v0.2.4/getting-started/
$url = new URL();
$url->getString(); //  /docs/v0.2.4/getting-started
$url->getLink(); //  [1] => docs, [2] => v0.2.4, [3] => getting-started
$url->getCount(); //  3
foreach($url->getLink() as $v) {
    echo $v . "\n";
}
/*
Prints:

docs
v0.2.4
getting-started
*/
```