<?php

namespace App\Presenters;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function isAdmin()
    {
        return $this->is_admin ? '是' : '否';
    }
}
