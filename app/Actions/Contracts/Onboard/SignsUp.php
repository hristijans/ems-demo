<?php

namespace App\Actions\Contracts\Onboard;

interface SignsUp
{
    public function __invoke(array $data): void;
}
