<?php

namespace App\Providers;

use App\Contracts\ParserServiceInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ParserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ParserServiceInterface::class, function ($app, $params) {
            $resolved = $this->resolvePageType($params['url']);
            $type = array_key_first($resolved);

            if ($type === 'undefined') {
                throw new \Exception('Undefined page type');
            }

            $service = config('parser.' . $type);
            $parser = new $service($params['url']);
            $parser->setContent($resolved[$type]);

            return $parser;
        });
    }

    /**
     * @param $url
     * @return array
     */
    private function resolvePageType($url) {
        $html = file_get_contents($url);

        if (Str::contains($html, 'page page-listing')) {
            $type = 'category';
        } elseif (Str::contains($html, 'page page-product')) {
            $type = 'product';
        } else {
            $type = 'undefined';
        }

        return [$type => $html];
    }
}
