<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Admin\UserRole;
use App\Repositories\UserRepository;

class UserRoleComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('allUserRoles', UserRole::all());
    }
}
