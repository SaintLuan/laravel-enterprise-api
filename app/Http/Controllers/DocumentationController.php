<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class DocumentationController extends Controller
{
    public function swagger(): View
    {
        return view('docs.swagger');
    }

    public function openApiSpecification(): Response
    {
        $specificationPath = resource_path('openapi/openapi.yaml');

        abort_unless(is_file($specificationPath), 404);

        $specification = file_get_contents($specificationPath);

        abort_if($specification === false, 404);

        return response($specification, 200, [
            'Content-Type' => 'application/yaml; charset=UTF-8',
        ]);
    }
}
