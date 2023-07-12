<?php

namespace App\Http\Controllers\Api\TalkProposals;

use App\Actions\Contracts\TalkProposal\ListsTalkProposals;
use App\Http\Controllers\Controller;
use App\Http\Resources\TalkProposalResponse;

class ListTalksProposalsController extends Controller
{
    public function __invoke(ListsTalkProposals $listsTalkProposals)
    {
        return response()->json(TalkProposalResponse::collection($listsTalkProposals()));
    }
}
