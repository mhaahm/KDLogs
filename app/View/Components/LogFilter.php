<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LogFilter extends Component
{

    public $category;

    public $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $category,array $dataFilter)
    {
        $this->category = $category;
        $this->data = $dataFilter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.log-filter',[
            'category' => $this->category,
            'data' => $this->data
        ]);
    }
}
