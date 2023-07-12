<?php

namespace App\Http\Controllers\Proposal;

use App\Http\Controllers\Controller;

class ShowProposalFormController extends Controller
{
    public function __invoke()
    {
        return view('proposal.show');
    }
}
