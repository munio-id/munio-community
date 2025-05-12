<?php

namespace App\Filament\Admin\Resources\Munio\Blog\PostResource\Pages;

use App\Filament\Admin\Resources\Munio\Blog\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
