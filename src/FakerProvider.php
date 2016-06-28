<?php

namespace DavidBadura\FakerMarkdownGenerator;

use DavidBadura\MarkdownBuilder\MarkdownBuilder;
use Faker\Provider\Lorem;

/**
 * @author David Badura <d.a.badura@gmail.com>
 */
class FakerProvider extends Lorem
{
    /**
     * @return string
     */
    public static function markdown()
    {
        $parts = [];

        do {
            $parts[] = self::markdownH1();

            if (self::randomDigit() > 3) {
                $parts[] = self::markdownP();
            }

            if (self::randomDigit() > 3) {
                $parts[] = self::markdownBlockqoute();
            }

            if (self::randomDigit() > 3) {
                $parts[] = self::markdownBulletedList();
            }

            if (self::randomDigit() > 3) {
                $parts[] = self::markdownNumberedList();
            }

        } while (self::randomDigit() > 5 || count($parts) < 3);

        return implode("\n\n", $parts);
    }

    /**
     * @param int $maxNbChars
     * @return string
     */
    public static function markdownP($maxNbChars = 200)
    {
        return (new MarkdownBuilder())->p(self::text($maxNbChars))->getMarkdown();
    }

    /**
     * @param int $nbWords
     * @param bool $variableNbWords
     * @return string
     */
    public static function markdownH1($nbWords = 6, $variableNbWords = true)
    {
        return (new MarkdownBuilder())->h1(self::sentence($nbWords, $variableNbWords))->getMarkdown();
    }

    /**
     * @param int $nbWords
     * @param bool $variableNbWords
     * @return string
     */
    public static function markdownH2($nbWords = 6, $variableNbWords = true)
    {
        return (new MarkdownBuilder())->h2(self::sentence($nbWords, $variableNbWords))->getMarkdown();
    }

    /**
     * @param int $nbWords
     * @param bool $variableNbWords
     * @return string
     */
    public static function markdownH3($nbWords = 6, $variableNbWords = true)
    {
        return (new MarkdownBuilder())->h3(self::sentence($nbWords, $variableNbWords))->getMarkdown();
    }

    /**
     * @param int $maxNbChars
     * @return string
     */
    public static function markdownBlockqoute($maxNbChars = 200)
    {
        return (new MarkdownBuilder())->blockqoute(self::text($maxNbChars))->getMarkdown();
    }

    /**
     * @param int $nb
     * @return string
     */
    public static function markdownBulletedList($nb = 3)
    {
        return (new MarkdownBuilder())->bulletedList(self::sentences($nb))->getMarkdown();
    }

    /**
     * @param int $nb
     * @return string
     */
    public static function markdownNumberedList($nb = 3)
    {
        return (new MarkdownBuilder())->numberedList(self::sentences($nb))->getMarkdown();
    }

    /**
     * @param int $maxNbChars
     * @return string
     */
    public static function markdownCode($maxNbChars = 200)
    {
        return (new MarkdownBuilder())->code(self::text($maxNbChars))->getMarkdown();
    }

    /**
     * @return string
     */
    public static function markdownInlineCode()
    {
        return (new MarkdownBuilder())->inlineCode(self::word());
    }

    /**
     * @return string
     */
    public static function markdownInlineItalic()
    {
        return (new MarkdownBuilder())->inlineItalic(self::word());
    }

    /**
     * @return string
     */
    public static function markdownInlineBold()
    {
        return (new MarkdownBuilder())->inlineBold(self::word());
    }

    /**
     * @return string
     */
    public static function markdownInlineLink()
    {
        return (new MarkdownBuilder())->inlineLink('http://google.com', self::word());
    }

    /**
     * @return string
     */
    public static function markdownInlineImg()
    {
        return (new MarkdownBuilder())->inlineImg(
            'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Einstein_1921_portrait2.jpg/800px-Einstein_1921_portrait2.jpg',
            self::word()
        );
    }
}
