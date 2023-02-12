<?php

declare(strict_types=1);

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use App\Models\Gmp;
use Rebing\GraphQL\Support\Facades\GraphQL;


class GmpField extends Field
{
    protected $attributes = [
        'name' => 'gmp',
    ];

    public function type(): Type
    {
        return GraphQL::type('Gmp');
    }

    public function resolve($root, array $args)
    {
        return Gmp::where('id' , $root['gmpId'])->get()[0];
    }
}