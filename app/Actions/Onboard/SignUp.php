<?php

namespace App\Actions\Onboard;

use App\Actions\Contracts\Onboard\SignsUp;
use App\Actions\Contracts\Speaker\CreatesSpeaker;
use App\Actions\Contracts\TalkProposal\CreatesTalkProposal;

class SignUp implements SignsUp
{
    public function __construct(public CreatesSpeaker $createsSpeaker, public CreatesTalkProposal $createsTalkProposal)
    {
    }

    public function __invoke(mixed $data): void
    {
        $speaker = ($this->createsSpeaker)($data['speaker']);
        ($this->createsTalkProposal)($speaker, $data['proposal']);
    }
}
