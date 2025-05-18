<?php

namespace App\Filament\Admin\Clusters\Settings\Resources\UserResource\Pages;

use Filament\Actions;
use App\Filament\Admin\Clusters\Settings;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Clusters\Settings\Resources\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
