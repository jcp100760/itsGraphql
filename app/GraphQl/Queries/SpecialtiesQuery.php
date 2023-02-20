<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use App\Models\Specialty;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Graphql\Traits\SearchManyTrait;


class SpecialtiesQuery extends Query
{
    use SearchManyTrait;
    protected $attributes = [
        'name' => 'getSpecialties',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Specialty'))));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $data = Specialty::all();
        // if (isset($args['id'])) {
        //     return Specialty::where('id' , $args['id'])->get();
        // }
        // return Specialty::all();
        $data = $this->searchMany($data, $args);

        return $data;
    }
}
