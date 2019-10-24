<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class DatabasePresenter extends Presenter
{
    public function status()
    {
        switch ($this->entity->status) {
            case 0:
                return __('Trial');

            case 1:
                return __('Normal');

            case 2:
                return __('Opening');

            default:
                return __('Trial');
        }
    }
}
