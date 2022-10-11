<?php

namespace Untitledpng\Laravel1Password\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Untitledpng\Laravel1Password\Enums\VaultType;
use Untitledpng\Laravel1Password\Models\Vault;

class VaultFactory
{
    /**
     * @param  Collection $data
     * @return Vault
     */
    public function make(Collection $data): Vault
    {
        $model = new Vault();

        return $model->setId(
            $data->get('id')
        )->setName(
            $data->get('name')
        )->setDescription(
            $data->get('description')
        )->setAttributeVersion(
            $data->get('attributeVersion')
        )->setContentVersion(
            $data->get('contentVersion')
        )->setItemCount(
            $data->get('items')
        )->setType(
            VaultType::from(
                $data->get('type')
            )
        )->setCreatedAt(
            Carbon::createFromTimeString(
                $data->get('createdAt')
            )
        )->setUpdatedAt(
            Carbon::createFromTimeString(
                $data->get('updatedAt')
            )
        );
    }
}
