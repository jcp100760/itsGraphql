<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;
use Event;
use App\Events\AbsenceUpdateActiveEvent;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Hash;
use Rebing\GraphQL\Support\Mutation;

class Login extends Mutation
{
    protected $attributes = [
        'name' => 'login',
    ];

    public function args(): array
    {
        return [
            'email' => [
                'type' => Type::string()
            ],
            'password' => [
                'type' => Type::string()
            ],
        ];
    }

    public function type(): Type
    {
        return Type::string();
    }

    public function resolve($root, $args)
    {
        $user = User::where('email', $args['email'])->first();

        if (!$user || !Hash::check($args['password'], $user->password)) {
            return "Usuario no autorizado";
        }

        event(new AbsenceUpdateActiveEvent());

        return $user->createToken('auth_token')->plainTextToken;
    }
}