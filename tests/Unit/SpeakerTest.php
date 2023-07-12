<?php

test('will create new speaker', function () {

    $name = 'Demo Speaker';
    $email = 'demo@email.com';
    $bio = 'Lorem ipsum';

    $data = [
        'name' => $name,
        'email' => $email,
        'bio' => $bio,
    ];

    $createsSpeakerAction = app()->make(\App\Actions\Contracts\Speaker\CreatesSpeaker::class);

    $speaker = $createsSpeakerAction($data);

    expect($speaker->name)->toBe($name);
    expect($speaker->email)->toBe($email);
    expect($speaker->bio)->toBe($bio);
});
