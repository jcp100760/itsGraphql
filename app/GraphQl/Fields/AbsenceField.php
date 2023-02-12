<?php

declare(strict_types=1);

namespace App\GraphQL\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use App\Models\Absence;
use Rebing\GraphQL\Support\Facades\GraphQL;


class AbsenceField extends Field
{
    protected $attributes = [
        'name' => 'absence',
    ];

    public function type(): Type
    {
        return GraphQL::type('Absence');
    }

    public function resolve($root, array $args)
    {
        return Absence::where('id' , $root['absenceId'])->get()[0];
    }
}
