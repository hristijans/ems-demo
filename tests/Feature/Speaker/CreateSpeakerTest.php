<?php

namespace Speaker;

use Carbon\Carbon;

test('will create speaker and proposal', function () {
    $payload = [
        'speaker' => [
            'name' => 'Demo Speaker',
            'email' => 'demo@mail.com',
            'bio' => 'Lorem Ipsum amet...',
        ],
        'proposal' => [
            [
                'title' => 'demo title',
                'abstract' => 'demo abstract',
                'preferred_time_slot' => Carbon::now()->addDays(2)->toDateTimeString(),
            ],
        ],
    ];

    $response = $this->post(route('proposal.store'), $payload);

    $response->assertStatus(200);

    $this->assertDatabaseHas('talk_proposals', [
        'title' => 'demo title',
        'abstract' => 'demo abstract',
    ]);
});

test('will create speaker and multiple proposals', function () {
    $payload = [
        'speaker' => [
            'name' => 'Demo Speaker',
            'email' => 'demo@mail.com',
            'bio' => 'Lorem Ipsum amet...',
        ],
        'proposal' => [
            [
                'title' => 'demo title',
                'abstract' => 'demo abstract',
                'preferred_time_slot' => Carbon::now()->addDays(2)->toDateTimeString(),
            ],
            [
                'title' => 'second demo title',
                'abstract' => 'second demo abstract',
                'preferred_time_slot' => Carbon::now()->addDays(3)->toDateTimeString(),
            ],
        ],
    ];

    $response = $this->post(route('proposal.store'), $payload);

    $response->assertStatus(200);

    $this->assertDatabaseHas('talk_proposals', [
        'title' => 'demo title',
        'abstract' => 'demo abstract',
    ]);

    $this->assertDatabaseHas('talk_proposals', [
        'title' => 'second demo title',
        'abstract' => 'second demo abstract',
    ]);
});

test('will throw validation error payload is empty', function () {

    $response = $this
        ->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])

        ->post(route('proposal.store'), []);

    $response->assertStatus(422);
});
