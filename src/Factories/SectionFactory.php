<?php

namespace Untitledpng\Laravel1Password\Factories;

use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Models\Section;

class SectionFactory
{
    /**
     * @param  Collection $data
     * @return Section
     */
    public function make(Collection $data): Section
    {
        $model = new Section();

        return $model->setId(
            $data->get('id')
        )->setLabel(
            $data->get('label')
        );
    }
}
