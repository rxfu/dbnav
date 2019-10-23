<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class DatabasePresenter extends Presenter
{
    public function status()
    {
        switch ($this->status) {
            case 0:
                return '试用';

            case 1:
                return '正式使用';

            case 2:
                return '开放资源';

            default:
                return '试用';
        }
    }
}
