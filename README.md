# URL
PHP Class to easy work with URL, getting its part etc.

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