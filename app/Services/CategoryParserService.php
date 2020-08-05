<?php

namespace App\Services;

use App\Contracts\ParserServiceInterface;
use Symfony\Component\DomCrawler\Crawler;

class CategoryParserService implements ParserServiceInterface
{
    protected $content;
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function parse()
    {
        if (empty($this->content)) {
            $this->content = file_get_contents($this->url);
        }

        $products = collect();

        $crawler = new Crawler($this->content);
        $crawler->filter('.listing__body-wrap')
            ->children()
            ->each(function (Crawler $child) use ($products) {
                if ($child->attr('class') !== 'card js-card') {
                    return;
                }

                $path = $child->filter('.card__title')
                    ->attr('href');

                if (!empty($path) && $path !== 'javascript:void(0)') {
                    $productParserService = new ProductParserService('https://www.foxtrot.com.ua' . $path);
                    $products->push($productParserService->parse()->first());
                }
            });

        return $products;
    }
}