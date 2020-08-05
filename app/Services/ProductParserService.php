<?php

namespace App\Services;

use App\Contracts\ParserServiceInterface;
use App\Models\Product;
use Symfony\Component\DomCrawler\Crawler;

class ProductParserService implements ParserServiceInterface
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

        $crawler = new Crawler($this->content);
        $product = new Product();

        $product->title = $crawler->filter('h1.page__title')->text();
        $product->sku = $crawler->filter('.product-box__main-code')->text();
        $product->url = $this->url;
        $product->price = $crawler->filter('.product-box__main-price__main > .card-price')->text();
        $product->categories = $this->getCategories($crawler);
        $product->images = $this->getImages($crawler);

        return collect([$product]);
    }

    private function getCategories(Crawler $crawler)
    {
        $categories = collect();
        $crawler->filter('a.breadcrumbs_crumb')
            ->each(function (Crawler $link) use ($categories) {
                $categories->push($link->text());
            });

        return $categories;
    }

    public function getImages(Crawler $crawler)
    {
        $images = collect();
        $crawler->filter('.product-img__carousel > img')
            ->each(function (Crawler $image) use ($images) {
                $images->push($image->attr('src'));
            });

        return $images;
    }
}