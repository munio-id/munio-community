<?php

namespace App\Filament\Admin\Resources\Munio\Blog\CategoryResource\Pages;

use App\Filament\Admin\Resources\Munio\Blog\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;
}
