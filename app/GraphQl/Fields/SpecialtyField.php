<?php

declare(strict_types=1);

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use App\Models\Specialty;
use Rebing\GraphQL\Support\Facades\GraphQL;


class SpecialtyField extends Field
{
    protected $attributes = [
        'name' => 'specialty',
    ];

    public function type(): Type
    {
        return GraphQL::type('Specialty');
    }

    public function resolve($root, array $args)
    {
        return Specialty::where('id' , $root['specialtyId'])->get()[0];
    }
}