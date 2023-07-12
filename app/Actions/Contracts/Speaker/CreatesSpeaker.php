<?php

namespace App\Actions\Contracts\Speaker;

use App\Models\Speaker;

interface CreatesSpeaker
{
    public function __invoke(array $data): Speaker;
}
