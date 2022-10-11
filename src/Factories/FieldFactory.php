<?php

namespace Untitledpng\Laravel1Password\Factories;

use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Enums\FieldPurpose;
use Untitledpng\Laravel1Password\Enums\FieldType;
use Untitledpng\Laravel1Password\Models\Field;

class FieldFactory
{
    /**
     * @param  Collection $data
     * @return Field
     */
    public function make(Collection $data): Field
    {
        $model = new Field();

        $model->setId(
            $data->get('id')
        )->setPurpose(
            FieldPurpose::tryFrom(
                $data->get('purpose')
            )
        )->setType(
            FieldType::tryFrom(
                $data->get('type')
            )
        )->setGenerate(
            $data->get('generate', false)
        );

        if ($data->get('label')) {
            $model->setLabel(
                $data->get('label')
            );
        }

        if ($data->get('value')) {
            $model->setValue(
                $data->get('value')
            );
        }

        return $model;

        // TODO: Recipe and Section
    }
}
