<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL;
use App\Models\Task;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;

class TaskQuery extends Query
{
    protected $attributes = [
        'name' => 'task',
        'description' => 'Get Task By Id'
    ];

    public function type(): Type
    {
        return GraphQL::type('TaskType');
    }

    public function args(): array
    {
        return [
            'id'=>[
                'name'=>'id',
                'type'=> Type::id()
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $task = Task::findOrFail($args['id']);
        return $task;
    }
}
