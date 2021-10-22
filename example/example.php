<?php

declare(strict_types=1);

use DavidBadura\FakerMarkdownGenerator\FakerProvider;
use Faker\Factory;

require_once __DIR__ . '/../vendor/autoload.php';

$faker = Factory::create();
$faker->addProvider(new FakerProvider($faker));

output($faker->markdown());

output($faker->markdownP());
output($faker->markdownH1());
output($faker->markdownH2());
output($faker->markdownH3());
output($faker->markdownBulletedList());
output($faker->markdownBlockquote());
output($faker->markdownNumberedList());
output($faker->markdownInlineCode());
output($faker->markdownInlineBold());
output($faker->markdownInlineItalic());
output($faker->markdownInlineLink());
output($faker->markdownInlineImg());

function output(string $string): void
{
    echo "\n";
    echo "#########################################";
    echo "\n";
    echo "\n";
    echo $string;
    echo "\n";
}



