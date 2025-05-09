<?php

namespace App\Filament\Onboarding\Pages;

use Closure;
use App\Models\User;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Pages\Concerns;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Wizard;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use App\Models\Munio\Organization\Organization;

class Onboarding extends Page
{
    use Concerns\InteractsWithFormActions;

    protected static ?string $title = '';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.onboarding.pages.onboarding';

    protected static string $layout = 'filament.onboarding.layouts.layout';

    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [
        'name' => 'Default Community',
        'code' => '_',
        'domain' => 'community.example.com',
        'user_name' => 'Admin',
        'user_email' => 'admin@example.com'
    ];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Placeholder::make('Welcome')
                    ->content('Mollitia aut veritatis similique hic ullam.'),
                Wizard::make([
                    Wizard\Step::make('Organization')
                        ->schema([
                            TextInput::make('name')
                                ->required(),
                            TextInput::make('code')
                                ->required()
                                ->unique(table: 'organizations', column: 'code'),
                            TextInput::make('domain')
                                ->required()
                                ->unique(table: 'organizations', column: 'domain'),
                        ])
                        ->inlineLabel(),
                    Wizard\Step::make('User')
                        ->schema([
                            TextInput::make('user_name')
                                ->label('Name')
                                ->required(),
                            TextInput::make('user_email')
                                ->label('Email')
                                ->required()
                                ->unique(table: 'users', column: 'email'),
                            TextInput::make('user_password')
                                ->password()
                                ->required()
                                ->reactive()
                                ->revealable(),
                            TextInput::make('user_password_confirmation')
                                ->password()
                                ->required()
                                ->disabled(fn(Get $get) => !$get('user_password'))
                                ->revealable()
                                ->rule(fn(Get $get): Closure => function (string $attribute, $value, Closure $fail) use ($get) {
                                    if ($get('user_password') != $value) {
                                        $fail("Passwords do not match. Please make sure both fields are identical.");
                                    }
                                }),
                        ])
                        ->inlineLabel(),
                    Wizard\Step::make('Finish')
                        ->schema([
                            Placeholder::make('finish')
                                ->label('The platform is ready to use. Please feel free to explore the available features and make the most of our services.')
                        ])

                ])
                    ->submitAction(
                        new HtmlString(
                            Blade::render(
                                <<<BLADE
                                    <x-filament::button
                                        type="submit"
                                        size="sm"
                                    >
                                        Submit
                                    </x-filament::button>
                                BLADE
                            )
                        )
                    )
            ]);
    }

    /**
     * @return array<int | string, string | Form>
     */
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->operation('create')
                    ->statePath('data'),
            ),
        ];
    }

    public function save()
    {
        $data = $this->data;

        # Create Organization
        $org = Organization::create([
            'name' => data_get($data, 'name'),
            'code' => data_get($data, 'code'),
            'domain' => data_get($data, 'domain')
        ]);

        # Create Superadmin
        User::create([
            'organization_id' => $org->id,
            'name' => data_get($data, 'user_name'),
            'email' => data_get($data, 'user_email'),
            'password' => bcrypt(data_get($data, 'user_password')),
            'is_superuser' => true
        ]);


        return redirect()->to('/admin');
    }
}
