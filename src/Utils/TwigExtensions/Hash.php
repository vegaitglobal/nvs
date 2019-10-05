<?php

class Hash extends Twig\Extension\AbstractExtension
{

    // https://www.php.net/manual/en/function.hash.php
    const ALGORITHM = 'crc32b';

    public function getFilters()
    {
        return [
            new \Twig\TwigFilter('hash', function ($string) {
                return hash(self::ALGORITHM, $string, null);
            })
        ];
    }

    public function getName()
    {
        return "hash";
    }
}