<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class UserStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            BaseWidget\Stat::make('Total Users', User::count()),
            BaseWidget\Stat::make('Total Admins', User:: where('role', User::ROLE_ADMIN)->count()),
            BaseWidget\Stat::make('Total Editor', User:: where('role', User::ROLE_EDITOR)->count())
        ];
    }
}
