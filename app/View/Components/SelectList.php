<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectList extends Component
{
    private string $name;
    private array $list;
    private array $default;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name,array $list,array $default = [])
    {
        //
        $this->name = $name;
        $this->list = $list;
        $this->default = $default;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-list',[
            'name' => $this->name,
            'list' => $this->list,
            'default' => $this->default
        ]);
    }
}
