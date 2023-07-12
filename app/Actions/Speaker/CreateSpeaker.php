<?php

namespace App\Actions\Speaker;

use App\Actions\Contracts\Speaker\CreatesSpeaker;
use App\Models\Speaker;
use Illuminate\Support\Facades\Log;

class CreateSpeaker implements CreatesSpeaker
{
    public function __invoke(array $data): Speaker
    {
        Log::debug('Creating new Speaker', [
            'data' => $data,
        ]);

        return Speaker::create($data);
    }
}
