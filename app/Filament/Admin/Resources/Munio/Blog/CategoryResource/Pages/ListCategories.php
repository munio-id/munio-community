<?php

namespace App\Filament\Admin\Resources\Munio\Blog\CategoryResource\Pages;

use App\Filament\Admin\Resources\Munio\Blog\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
