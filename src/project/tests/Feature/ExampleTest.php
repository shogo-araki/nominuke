<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function DB接続確認()
    {
        // テスト用ユーザーの生成
        User::create([
            'name' => 'testTaro',
            'email' => 'example777@mail.com',
            'password' => "testPass"
        ]);

        // 作成したユーザーがdbにあるかチェック
        $this->assertDatabaseHas('users', [
            'name' => 'testTaro',
            'email' => 'example777@mail.com',
            'password' => "testPass"
        ]);
    }
}
