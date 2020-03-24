<?php
/**
 * @name URL.php
 * @link https://alexkratky.cz                          Author website
 * @link https://panx.eu/docs/                          Documentation
 * @link https://github.com/AlexKratky/panx-framework/  Github Repository
 * @author Alex Kratky <info@alexkratky.cz>
 * @copyright Copyright (c) 2020 Alex Kratky
 * @license http://opensource.org/licenses/mit-license.php MIT License
 * @description Class to work with URLs. Part of panx-framework.
 */

declare (strict_types = 1);

namespace AlexKratky;

class URL implements \Iterator
{
    /**
     * @var string The string representing URL.
     */
    private $URL_STRING;

    /**
     * @var array The array containing URL elements (URL splited by '/').
     */
    private $URL_ELEMENTS = array();

    /**
     * Calls urlString() method with passed parameters.
     * @param string|null $URL The URI to work with, if its sets to null, it will use the current URI.
     * @param boolean $DECODE If its sets to true, the URI will be decoded using urldecode().
     */
    public function __construct(?string $URL = null, ?bool $DECODE = true)
    {
        $this->urlString($URL, $DECODE);
    }

    /**
     * Splits the URI to elements (by '/' character). It will delete any get parameter (Everything behind '?' character). It will delete '//'. It will also remove '/' from end
     * @param string $URL_TO_CHECK The URI to work with, if its sets to null, it will use the current URI.
     * @param boolean $DECODE If its sets to true, the URI will be decoded using urldecode().
     */
    public function urlString(?string $URL_TO_CHECK = null, ?bool $DECODE = true): void
    {
        if ($URL_TO_CHECK == null) $URL_TO_CHECK = $_SERVER['REQUEST_URI'];

        $this->URL_STRING = $URL_TO_CHECK;

        if ($DECODE) $this->URL_STRING = urldecode($this->URL_STRING);

        $this->URL_STRING = explode("?", $this->URL_STRING)[0];

        while (strpos($this->URL_STRING, "//") !== false) {
            $this->URL_STRING = str_replace("//", "/", $this->URL_STRING);
        }
        $this->URL_STRING = rtrim($this->URL_STRING, "/");
        $this->URL_ELEMENTS = explode("/", $this->URL_STRING);

        if ($this->URL_STRING == "") {
            $this->URL_STRING = "/";
        }
    }

    /**
     * @return string Returns the string representing URL.
     */
    public function getString(): string
    {
        return $this->URL_STRING;
    }

    /**
     * @return array Returns the array containing URL elements (URL splited by '/'). First element [0] is empty.
     */
    public function getElements(): array
    {
        return $this->URL_ELEMENTS;
    }

    /**
     * alias for getElements()
     */
    public function getLink(): array {return $this->getElements();}

    /**
     * @return int Returns the count of URL elements.
     */
    public function getCount(): int
    {
        return (count($this->URL_ELEMENTS) - 1);
    }

    //ITERATION
    public function rewind()
    {
        reset($this->URL_ELEMENTS);
    }

    public function current()
    {
        return current($this->URL_ELEMENTS);
    }

    public function key()
    {
        return key($this->URL_ELEMENTS);
    }

    public function next()
    {
        return next($this->URL_ELEMENTS);
    }

    public function valid()
    {
        $key = key($this->URL_ELEMENTS);
        $var = ($key !== null && $key !== false);
        return $var;
    }

}
