<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface ParserServiceInterface
{
    /**
     * @param string $url
     */
    public function __construct($url);

    /**
     * @param string $content
     * @return void
     */
    public function setContent($content);

    /**
     * @return Collection
     */
    public function parse();
}
