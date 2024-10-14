<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


it('store profile', function () {

    Storage::fake('local');

    $params = [
        'national_id' => fake()->numerify('##########'),
        'avatar' => UploadedFile::fake()->image('avatar.jpg'),
        'birth_date' => fake()->date('Y-m-d'),
        'user_id' => 1
    ];

    $response = $this->post(route('profile.store'), $params);

    $response->assertStatus(201);

    $this->assertDatabaseHas('profiles', [
        'national_id' => $params['national_id'],
        'birth_date' => $params['birth_date'],
        'avatar' => $response->getOriginalContent()['data']['avatar'],
        'user_id' => 1,
    ]);
});

it('national id search', function () {

    $params = [
        'national_id' => fake()->numerify('##########'),
        'avatar' => UploadedFile::fake()->image('avatar.jpg'),
        'birth_date' => fake()->date('Y-m-d'),
        'user_id' => 1
    ];

    $storeResponse = $this->post(route('profile.store'), $params);

    $response = $this->get(route('profile.show', ['national_id' => $params['national_id']]));


    $response->assertJson([
        'status' => 'success',
        'message' => 'Profile found successfully',
        'data' => [
            'national_id' => $params['national_id'],
            'birth_date' => $params['birth_date'],
            'avatar' => route('kyc.download-avatar', ['avatar' => $storeResponse->getOriginalContent()['data']['avatar']]),
        ]
    ]);
});

