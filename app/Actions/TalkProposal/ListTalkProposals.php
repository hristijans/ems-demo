<?php

namespace App\Actions\TalkProposal;

use App\Actions\Contracts\TalkProposal\ListsTalkProposals;
use App\Models\TalkProposal;
use Illuminate\Pagination\LengthAwarePaginator;

class ListTalkProposals implements ListsTalkProposals
{
    public function __invoke(): LengthAwarePaginator
    {
        return TalkProposal::orderBy('preferred_time_slot', 'desc')->paginate(10);
    }
}
