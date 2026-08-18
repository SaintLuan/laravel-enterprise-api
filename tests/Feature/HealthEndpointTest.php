<?php

it('returns the application health status', function () {
    $response = $this->getJson('/api/v1/health');

    $response
        ->assertOk()
        ->assertExactJson([
            'status' => 'ok',
            'application' => 'Laravel Enterprise API',
        ]);
});
