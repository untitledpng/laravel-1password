<?php

namespace Untitledpng\Laravel1Password\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Enums\ItemCategory;
use Untitledpng\Laravel1Password\Enums\ItemState;
use Untitledpng\Laravel1Password\Models\Item;

class ItemFactory
{
    /**
     * @param  Collection $data
     * @return Item
     */
    public function make(Collection $data): Item
    {
        $model = new Item();

        return $model->setId(
            $data->get('id')
        )->setTitle(
            $data->get('title')
        )->setCategory(
            ItemCategory::from(
                $data->get('category')
            )
        )->setUrls(
            collect(
                $data->get('urls', [])
            )->map(
                static fn (array $data) => app(UrlFactory::class)->make(collect($data))
            )
        )->setFavorite(
            $data->get('favorite', false)
        )->setTags(
            $data->get('tags', [])
        )->setVersion(
            $data->get('version')
        )->setState(
            ItemState::tryFrom(
                $data->get('state')
            )
        )->setLastEditedBy(
            $data->get('lastEditBy')
        )->setVault(
            $data->get('vault')['id']
        )->setSections(
            collect(
                $data->get('sections', [])
            )->map(
                static fn (array $data) => app(SectionFactory::class)->make(collect($data))
            )
        )->setFields(
            collect(
                $data->get('fields', [])
            )->map(
                static fn (array $data) => app(FieldFactory::class)->make(collect($data))
            )
        )->setCreatedAt(
            Carbon::createFromTimeString(
                $data->get('createdAt') ?? $data->get('created_at')
            )
        )->setUpdatedAt(
            Carbon::createFromTimeString(
                $data->get('updatedAt') ?? $data->get('updated_at')
            )
        )->syncOriginal();
    }
}
