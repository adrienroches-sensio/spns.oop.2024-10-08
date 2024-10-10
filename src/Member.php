<?php

namespace App;

interface Member extends CanAuthenticate
{
    public function __toString(): string;
}
