<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Post;
use App\Message;
use App\Comment;
use Illuminate\Support\Str;
use Faker\Generator as Faker;



$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'profile_img' => 'https://via.placeholder.com/150',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'api_token' =>bin2hex(openssl_random_pseudo_bytes(30)) 
    ];
});

$factory->define(Message::class, function (Faker $faker) {
    do{
        $from=rand(1,15);
        $to=rand(1,15);
    }
        while($from===$to);
    return [
        'body' =>  $faker->sentence($nbWords = 6, $variableNbWords = true),
        'from'=>$from,
        'to'=>$to
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => function(){return factory(App\User::class)->create()->id;},
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 45, $variableNbWords = true),
        'published' => false
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => function(){return factory(App\User::class)->create()->id;},
        'post_id' => function(){return factory(App\Post::class)->create()->id;},
        'body' => $faker->sentence($nbWords = 10, $variableNbWords = true)

    ];
});
