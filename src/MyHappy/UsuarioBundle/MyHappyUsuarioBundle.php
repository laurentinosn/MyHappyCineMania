<?php

namespace MyHappy\UsuarioBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MyHappyUsuarioBundle extends Bundle
{

    public function getParent()
    {
        return "FOSUserBundle";
    }

}
