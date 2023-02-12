<?php

declare(strict_types=1);

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class HelloField extends Field
{
    protected $attributes = [
        'name' => 'HelloField',
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function resolve($root, array $args): string
    {
        return 'id:'.$root['id'];
    }
}
