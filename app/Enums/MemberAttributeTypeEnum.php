<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MemberAttributeTypeEnum: string implements HasLabel
{
    case Text = 'text';
    case Dropdown = 'dropdown';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Text => 'Text',
            self::Dropdown => 'Dropdown'
        };
    }
}
