<?php

test('will return api response', function () {

    $payload = [
        'speaker' => [
            'name' => 'Demo Speaker',
            'email' => 'Demo Email',
            'bio' => 'Demo Bio for the speaker',
        ],
        'proposal' => [
            [
                'title' => 'First title',
                'abstract' => 'First abstract',
                'preferred_time_slot' => \Carbon\Carbon::now()->addDays(2)->toDateTimeString(),
            ],
            [
                'title' => 'Second title',
                'abstract' => 'Second abstract',
                'preferred_time_slot' => \Carbon\Carbon::now()->addDays(3)->toDateTimeString(),
            ],
        ],
    ];

    $this->post(route('proposal.store'), $payload);

    $response = $this->get('api/talk-proposals');

    $response->assertStatus(200);

    expect($response->json()[0])->toHaveKeys(['id', 'title', 'abstract', 'preferred_time_slot', 'speaker.id', 'speaker.name', 'speaker.email', 'speaker.bio']);

});
