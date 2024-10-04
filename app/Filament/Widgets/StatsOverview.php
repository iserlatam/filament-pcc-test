<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Stat::make('Certificados Generados', DB::raw('COUNT(SELECT * FROM certificados);')),
            Stat::make('Certificados Generados', DB::table('certificados')->count())
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Estudiantes Totales', DB::table('estudiantes')->count()),
            Stat::make('Cursos Totales', DB::table('cursos')->count()),
        ];
    }
}
