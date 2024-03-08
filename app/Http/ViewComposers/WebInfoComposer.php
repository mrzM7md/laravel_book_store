<?php
namespace App\Http\ViewComposers;

use App\Models\Webinfo;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class WebInfoComposer
{

    public function compose(View $view)
    { 
        $view->with('webinfo', Webinfo::all()->first());
    }
}