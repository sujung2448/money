<?php

namespace App\Library;

use App\Models\User;
use Str;
class CommonLibrary
{
    public function createPersonalCode()
    {
        $code = Str::upper(Str::random(6));
        $check = User::wherePersonalCode($code)->first();
        if(!$check){
            return $code;
        }
        return $this->createPersonalCode();
    }
}