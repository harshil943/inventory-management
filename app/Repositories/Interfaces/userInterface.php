<?php

namespace App\Repositories\Interfaces;

use App\User;

interface userInterface
{
    public function changepass($request);

    public function user($id);

    public function resetpassword($request);
}
