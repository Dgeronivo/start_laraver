<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    protected $except = [
        'hiddenParam',
    ];

    public function __construct(
        public string $greeting,
        public ?string $name,
        public string $hiddenParam,
    ) {}

    public function render(): View
    {
        $t= !empty($this->name);
        return view('components.alert');
    }

    public function hasName(): bool
    {
        return $this->name !== null;
    }

    public function isNull($value): bool
    {
        return is_null($value);
    }
}
