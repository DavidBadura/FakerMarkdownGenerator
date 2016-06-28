FakerMarkdownGenerator
======================

Generate valid, random markdown.


Installation
------------

Add the FakerMarkdownGenerator library to your `composer.json` file:

```
composer require davidbadura/faker-markdown-generator
```

Usage
-----

To  use this with [Faker](https://github.com/fzaninotto/Faker), you must add the `DavidBadura\FakerMarkdownGenerator\FakerProvider` class to the Faker generator:

```php
<?php

$faker = \Faker\Factory::create();
$faker->addProvider(new \DavidBadura\FakerMarkdownGenerator\FakerProvider($faker));

echo $faker->markdown();

//Delectus sed consequatur et nostrum vero dolorum et.
//====================================================
//
//Maiores nisi reprehenderit possimus facilis cum ut. Rerum et ex qui velit consequatur voluptas. Reiciendis delectus culpa eum tempora quia voluptatem aut est.
//
//* Vero nobis est esse in cupiditate quasi.
//* Sequi velit magnam molestias expedita fuga non suscipit.
//* Quas et maiores perferendis sunt perferendis aut.
//
//1. Eos aut quibusdam in ipsam recusandae sint et.
//2. Ea tenetur quasi pariatur sunt officia vel et quae.
//3. Vel ut odio quam illum.

```