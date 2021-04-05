<?php

namespace App\Repositories\Interfaces;

use App\User;

interface userInterface
{
    public function changepass($request);

    public function user($id);

    public function resetpassword($request);

    public function newpass($email);

    public function passwordchanged($request,$email);
}
