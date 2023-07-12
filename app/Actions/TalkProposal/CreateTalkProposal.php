<?php

namespace App\Actions\TalkProposal;

use App\Actions\Contracts\TalkProposal\CreatesTalkProposal;
use App\Models\Speaker;
use Illuminate\Support\Facades\Log;

class CreateTalkProposal implements CreatesTalkProposal
{
    public function __invoke(Speaker $speaker, array $data): mixed
    {
        Log::debug('Creating Proposals', [
            'data' => $data,
            'speaker' => $speaker->toArray(),
        ]);

        return $speaker->proposals()->createMany($data);
    }
}
