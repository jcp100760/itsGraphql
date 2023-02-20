<?php
namespace App\GraphQL\Queries;

use Closure;
use App\Models\Proffessor;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
//use App\GraphQL\Middleware\Authenticate;
use Rebing\GraphQL\Support\Query;
use App\Graphql\Traits\SearchManyTrait;


class ProffessorsQuery extends Query
{
    use SearchManyTrait;

     protected $attributes = [
         'name' => 'proffessors',
     ];

    public function type(): Type
    {
        return Type::nonNull(Type::listOf(Type::nonNull(GraphQL::type('Proffessor'))));
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
            'lastname' => [
                'name' => 'lastname', 
                'type' => Type::string(),
            ],
            'ci' => [
                'name' => 'ci', 
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $data = Proffessor::all();
        // if (isset($args['id'])) {
        //     return Proffessor::where('id' , $args['id'])->get();
        // }

        // if (isset($args['lastname'])) {
        //     return Proffessor::where('lastname', 'like', '%'. $args['lastname'] .'%')->get();
        // }

        // if (isset($args['ci'])) {
        //     return Proffessor::where('ci', $args['ci'])->get();
        // }
        //$this->Hello($root, $data);
        $data = $this->searchMany($data, $args);

        return $data; //Proffessor::all();
    }
}