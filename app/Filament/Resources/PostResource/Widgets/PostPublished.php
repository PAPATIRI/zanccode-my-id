<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PostPublished extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected int | string | array $columnSpan='full';
    protected static ?string $maxHeight = '250px';

    protected function getData(): array
    {
        $data = Trend::model(Post::class)
            ->between(
                start: now()->startOfYear(),end: now()->endOfYear()
            )
            ->perMonth()
            ->dateColumn('published_at')
            ->count();

        return [
            'datasets'=>[
                [
                    'label'=>'Article Published per Month',
                    'data'=>$data->map(fn (TrendValue $value) => $value->aggregate)
                ]
            ],
            'labels'=>$data->map(fn (TrendValue $value) => $value->date)
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
