<?php

it('renders the swagger documentation page', function () {
    $this->get(route('docs.swagger'))
        ->assertOk()
        ->assertSee('swagger-ui', false)
        ->assertSee('/docs/openapi.yaml', false);
});

it('serves the openapi specification', function () {
    $this->get(route('docs.openapi'))
        ->assertOk()
        ->assertHeader('content-type', 'application/yaml; charset=UTF-8')
        ->assertSee('Laravel Enterprise API')
        ->assertSee('/health');
});
