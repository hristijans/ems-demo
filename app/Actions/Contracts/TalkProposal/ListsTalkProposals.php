<?php

namespace App\Actions\Contracts\TalkProposal;

use Illuminate\Pagination\LengthAwarePaginator;

interface ListsTalkProposals
{
    public function __invoke(): LengthAwarePaginator;
}
