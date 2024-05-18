<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class DatabaseTestCommand extends Command
{
    protected $signature = 'db-test';

    public function handle()
    {
        $this->getEntity();
    }

    private function getEntity()
    {
        /** @var Collection $result */
        $result = Post::where('id', 1)->get();
        /** @var Post $post */
        $post = $result->first();
        dump($post->id);
        dd($post->name);
    }

    private function useOrWhere()
    {
        /** @var Collection $res */
        $res = \DB::table('test')
            ->where('id', 3)
            ->orWhere(function (Builder $builder) {
                $builder
                    ->where('id', 2)
                    ->where('is_active', 1);
            })
            ->get();
        // debug for builder
//        $res->dd();


        dd($res);
    }

    private function useQB()
    {
        /** @var Collection $res */
        $res = \DB::table('test')->get();
        dd($res);
    }

    private function useWhereAndFirst()
    {
        /** @var Collection $res */
        $res = \DB::table('test')->where('id', 2)->value('name');
        dd($res);
    }

    private function directSql(): array
    {
        /** @var array<\StdClass> $result */
        $result = \DB::select('select * from test where id = 1');
        dd($result);
    }
}
