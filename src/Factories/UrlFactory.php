<?php

namespace Untitledpng\Laravel1Password\Factories;

use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Models\Url;

class UrlFactory
{
    /**
     * @param  Collection $data
     * @return Url
     */
    public function make(Collection $data): Url
    {
        $model = new Url;

        return $model->setLabel(
            $data->get('url')
        )->setPrimary(
            $data->get('primary', false)
        )->setHref(
            $data->get('href')
        );
    }
}
