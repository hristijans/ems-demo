<?php

test('will create single talk proposal', function () {
    $createsSpeakerAction = app()->make(\App\Actions\Contracts\Speaker\CreatesSpeaker::class);
    $createsTalkProposalAction = app()->make(\App\Actions\Contracts\TalkProposal\CreatesTalkProposal::class);

    $speaker = $createsSpeakerAction([
        'name' => 'Demo Speaker',
        'email' => 'demo@mail.com',
        'bio' => 'Lorem Ipsum',
    ]);

    $proposal = $createsTalkProposalAction($speaker, [[
        'title' => 'Demo Title',
        'abstract' => 'Lorem Ipsum ament ....',
        'preferred_time_slot' => \Carbon\Carbon::now()->addDays(5)->toDateTimeString(),
    ]]);

    expect($proposal->count())->toBe(1);
    expect($proposal->first()['title'])->toBe('Demo Title');
});

test('will create multiple  talk proposals', function () {
    $createsSpeakerAction = app()->make(\App\Actions\Contracts\Speaker\CreatesSpeaker::class);
    $createsTalkProposalAction = app()->make(\App\Actions\Contracts\TalkProposal\CreatesTalkProposal::class);

    $speaker = $createsSpeakerAction([
        'name' => 'Demo Speaker',
        'email' => 'demo@mail.com',
        'bio' => 'Lorem Ipsum',
    ]);

    $proposal = $createsTalkProposalAction($speaker, [[
        'title' => 'Demo Title',
        'abstract' => 'Lorem Ipsum ament ....',
        'preferred_time_slot' => \Carbon\Carbon::now()->addDays(5)->toDateTimeString(),
    ], [
        'title' => 'Another title',
        'abstract' => 'Lorem Ipsum ament ....',
        'preferred_time_slot' => \Carbon\Carbon::now()->addDays(8)->toDateTimeString(),
    ]]);

    expect($proposal->count())->toBe(2);
    expect($proposal->first()['title'])->toBe('Demo Title');
    expect($proposal->last()['title'])->toBe('Another title');
});
