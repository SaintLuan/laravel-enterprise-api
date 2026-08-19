<?php

it('displays the project overview and a swagger link', function () {
    $response = $this->get('/');

    $response
        ->assertOk()
        ->assertSee('Laravel Enterprise API')
        ->assertSee('Open Swagger', false)
        ->assertSee(route('docs.swagger', absolute: false), false);
});
