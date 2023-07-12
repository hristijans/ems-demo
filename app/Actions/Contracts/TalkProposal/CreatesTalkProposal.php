<?php

namespace App\Actions\Contracts\TalkProposal;

use App\Models\Speaker;

interface CreatesTalkProposal
{
    public function __invoke(Speaker $speaker, array $data): mixed;
}
