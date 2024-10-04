<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Pages\Page;

class Ayuda extends Page
{
    protected static ?string $navigationLabel = 'Ayuda';

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $activeNavigationIcon = 'heroicon-s-information-circle';

    protected static string $view = 'filament.pages.ayuda';

    protected static ?string $title = 'Ayuda';

    protected ?string $subheading = 'Acá podrá encontrar el manual que explica cómo utilizar de forma correcta PCC';

    
}
