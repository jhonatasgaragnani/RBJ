<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\Admin\Models\Type::class, function (\Faker\Generator $faker) {
    $choosen = $faker->randomElement(['post', 'interview', 'news']);

    return [
        'slug' => $choosen,
        'name' => title_case($choosen)
    ];
});

$factory->define(\Admin\Models\Post::class, function (\Faker\Generator $faker) {
    $image[0] = '/photos/' . $faker->randomElement(Storage::disk('photos')->files());
    $image[1] = str_replace('/photos/', '/photos/thumbs/', $image[0]);
    return [
        'user_id' => 1,
        'type_id' => $faker->randomElement([1, 2, 3]),
        'active' => 1,
        'title' => $faker->userName,
        'body' => $faker->text(),
        'image' => $image[0],
        'thumb' => $image[1],
        'meta_description' => $faker->text(150),
        'meta_title' => $faker->userName,
        'meta_keywords' => str_replace(' ', ',', $faker->text(100))
    ];
});

$factory->define(\Admin\Models\Photo::class, function (\Faker\Generator $faker) {
    $image[0] = '/photos/' . $faker->randomElement(Storage::disk('photos')->files());
    $image[1] = str_replace('/photos/', '/photos/thumbs/', $image[0]);

    return [
        'user_id' => 1,
        'title' => $faker->name,
        'description' => $faker->text(),
        'alt' => $faker->text(20),
        'image' => $image[0],
        'thumb' => $image[1]
    ];
});

$factory->define(\Admin\Models\Video::class, function (\Faker\Generator $faker) {

    $video = '/files/' . $faker->randomElement(Storage::disk('files')->files('videos'));

    return [
        'user_id' => 1,
        'title' => $faker->name,
        'description' => $faker->text(),
        'thumb' => '/photos/' . $faker->randomElement(Storage::disk('photos')->files('thumbs')),
        'video' => '<p><video controls width="560" height="314">
<source src="' . $video . '" type="video/mp4" /></video></p>'
    ];
});

$factory->define(\Admin\Models\Top::class, function (\Faker\Generator $faker) {
    return [
        'artist' => $faker->name,
        'title' => $faker->city,
        'position' => $faker->unique()->numberBetween(1, 10),
        'music' => $faker->randomElement([
            'https://www.youtube.com/watch?v=09R8_2nJtjg',
            'https://www.youtube.com/watch?v=eQWG8BVeryU',
            'https://www.youtube.com/watch?v=R-1wBk3H2LI',
            'https://www.youtube.com/watch?v=T5UsrAxid74',
            'https://www.youtube.com/watch?v=aZ18nPl9S-0',
            'https://www.youtube.com/watch?v=szRDiLUduRA',
            'https://www.youtube.com/watch?v=Xkq6T4M8bfE',
            'https://www.youtube.com/watch?v=JGKM-s0f3u8',
            'https://www.youtube.com/watch?v=myYZ2I5DMe4',
            'https://www.youtube.com/watch?v=k3_tw44QsZQ',
            'https://www.youtube.com/watch?v=pd4j9osCNT4',
            'https://www.youtube.com/watch?v=SqaNHv2gavM'
        ])
    ];
});

$factory->define(\Admin\Models\Schedule::class, function (\Faker\Generator $faker) {
    return [
        'speaker' => $faker->name,
        'name' => $faker->text(200),
        'description' => $faker->paragraph(200),
        'image' => $faker->imageUrl(600, 600),
        'thumb' => $faker->imageUrl(300, 300)
    ];
});

$factory->define(\Admin\Models\Partner::class, function (\Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'thumb' => $faker->imageUrl(200, 200),
        'site' => $faker->randomElement(['//sites.xfind.com.br', '//xfind.com.br', '//facebook.com', '//youtube.com'])
    ];
});