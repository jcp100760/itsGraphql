<?php
namespace App\GraphQL\Queries;

use Closure;
use App\Models\Matter;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Graphql\Traits\SearchManyTrait;

class MattersQuery extends Query
{
    use SearchManyTrait;

    protected $attributes = [
        'name' => 'matters',
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Matter'))));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name', 
                'type' => Type::string(),
            ],
            'description' => [
                'name' => 'description', 
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $data = Matter::all();

        // if (isset($args['id'])) {
        //     return Matter::where('id' , $args['id'])->get();
        // }

        // if (isset($args['name'])) {
        //     return Matter::where('name', 'like', '%'. $args['name'] .'%')->get();
        // }

        // if (isset($args['description'])) {
        //     return Matter::where('description', 'like', '%'. $args['description'] .'%')->get();
        // }
        $data = $this->searchMany($data, $args);

        return $data; //
        // return Matter::where('description', 'like', '%BIO%')->get();
    }
}