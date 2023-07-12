<?php

namespace App\Http\Controllers\Proposal;

use App\Actions\Contracts\Onboard\SignsUp;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProposalRequest;

class StoreProposalController extends Controller
{
    public function __invoke(
        CreateProposalRequest $request,
        SignsUp $signsUp
    ) {

        $signsUp($request->validated());

        return view('proposal.show')->with(['message' => 'Proposal created!']);
    }
}
