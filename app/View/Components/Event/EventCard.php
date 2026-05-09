<?php

namespace App\View\Components\Event;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventCard extends Component
{
    public $title;

    public $location;

    public $date;

    public $emoji;

    public $banner;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $title,
        $location,
        $date,
        $emoji,
        $banner
    ) {
        $this->title = $title;

        $this->location = $location;

        $this->date = $date;

        $this->emoji = $emoji;

        $this->banner = $banner;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event.event-card');
    }
}