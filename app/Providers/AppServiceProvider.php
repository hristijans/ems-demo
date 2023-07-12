<?php

namespace App\Providers;

use App\Actions\Contracts\Onboard\SignsUp;
use App\Actions\Contracts\Speaker\CreatesSpeaker;
use App\Actions\Contracts\TalkProposal\CreatesTalkProposal;
use App\Actions\Contracts\TalkProposal\ListsTalkProposals;
use App\Actions\Onboard\SignUp;
use App\Actions\Speaker\CreateSpeaker;
use App\Actions\TalkProposal\CreateTalkProposal;
use App\Actions\TalkProposal\ListTalkProposals;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        CreatesSpeaker::class => CreateSpeaker::class,
        CreatesTalkProposal::class => CreateTalkProposal::class,
        ListsTalkProposals::class => ListTalkProposals::class,
        SignsUp::class => SignUp::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
