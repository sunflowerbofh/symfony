<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\ExpressionLanguage\Tests\Node;

use Symfony\Component\ExpressionLanguage\Compiler;
use Symfony\Component\ExpressionLanguage\Node\ArrayNode;
use Symfony\Component\ExpressionLanguage\Node\BinaryNode;
use Symfony\Component\ExpressionLanguage\Node\ConstantNode;
use Symfony\Component\ExpressionLanguage\Node\NameNode;
use Symfony\Component\ExpressionLanguage\SyntaxError;

class BinaryNodeTest extends AbstractNodeTest
{
    public function getEvaluateData()
    {
        $array = new ArrayNode();
        $array->addElement(new ConstantNode('a'));
        $array->addElement(new ConstantNode('b'));

        return [
            [true, new BinaryNode('or', new ConstantNode(true), new ConstantNode(false))],
            [true, new BinaryNode('||', new ConstantNode(true), new ConstantNode(false))],
            [false, new BinaryNode('and', new ConstantNode(true), new ConstantNode(false))],
            [false, new BinaryNode('&&', new ConstantNode(true), new ConstantNode(false))],

            [0, new BinaryNode('&', new ConstantNode(2), new ConstantNode(4))],
            [6, new BinaryNode('|', new ConstantNode(2), new ConstantNode(4))],
            [6, new BinaryNode('^', new ConstantNode(2), new ConstantNode(4))],

            [true, new BinaryNode('<', new ConstantNode(1), new ConstantNode(2))],
            [true, new BinaryNode('<=', new ConstantNode(1), new ConstantNode(2))],
            [true, new BinaryNode('<=', new ConstantNode(1), new ConstantNode(1))],

            [false, new BinaryNode('>', new ConstantNode(1), new ConstantNode(2))],
            [false, new BinaryNode('>=', new ConstantNode(1), new ConstantNode(2))],
            [true, new BinaryNode('>=', new ConstantNode(1), new ConstantNode(1))],

            [true, new BinaryNode('===', new ConstantNode(true), new ConstantNode(true))],
            [false, new BinaryNode('!==', new ConstantNode(true), new ConstantNode(true))],

            [false, new BinaryNode('==', new ConstantNode(2), new ConstantNode(1))],
            [true, new BinaryNode('!=', new ConstantNode(2), new ConstantNode(1))],

            [-1, new BinaryNode('-', new ConstantNode(1), new ConstantNode(2))],
            [3, new BinaryNode('+', new ConstantNode(1), new ConstantNode(2))],
            [4, new BinaryNode('*', new ConstantNode(2), new ConstantNode(2))],
            [1, new BinaryNode('/', new ConstantNode(2), new ConstantNode(2))],
            [1, new BinaryNode('%', new ConstantNode(5), new ConstantNode(2))],
            [25, new BinaryNode('**', new ConstantNode(5), new ConstantNode(2))],
            ['ab', new BinaryNode('~', new ConstantNode('a'), new ConstantNode('b'))],

            [true, new BinaryNode('in', new ConstantNode('a'), $array)],
            [false, new BinaryNode('in', new ConstantNode('c'), $array)],
            [true, new BinaryNode('not in', new ConstantNode('c'), $array)],
            [false, new BinaryNode('not in', new ConstantNode('a'), $array)],

            [[1, 2, 3], new BinaryNode('..', new ConstantNode(1), new ConstantNode(3))],

            [true, new BinaryNode('starts with', new ConstantNode('abc'), new ConstantNode('a'))],
            [false, new BinaryNode('starts with', new ConstantNode('abc'), new ConstantNode('b'))],
            [true, new BinaryNode('ends with', new ConstantNode('abc'), new ConstantNode('c'))],
            [false, new BinaryNode('ends with', new ConstantNode('abc'), new ConstantNode('b'))],
            [1, new BinaryNode('matches', new ConstantNode('abc'), new ConstantNode('/^[a-z]+$/'))],
            [0, new BinaryNode('matches', new ConstantNode(''), new ConstantNode('/^[a-z]+$/'))],
            [0, new BinaryNode('matches', new ConstantNode(null), new ConstantNode('/^[a-z]+$/'))],
        ];
    }

    public function getCompileData()
    {
        $array = new ArrayNode();
        $array->addElement(new ConstantNode('a'));
        $array->addElement(new ConstantNode('b'));

        return [
            ['(true || false)', new BinaryNode('or', new ConstantNode(true), new ConstantNode(false))],
            ['(true || false)', new BinaryNode('||', new ConstantNode(true), new ConstantNode(false))],
            ['(true && false)', new BinaryNode('and', new ConstantNode(true), new ConstantNode(false))],
            ['(true && false)', new BinaryNode('&&', new ConstantNode(true), new ConstantNode(false))],

            ['(2 & 4)', new BinaryNode('&', new ConstantNode(2), new ConstantNode(4))],
            ['(2 | 4)', new BinaryNode('|', new ConstantNode(2), new ConstantNode(4))],
            ['(2 ^ 4)', new BinaryNode('^', new ConstantNode(2), new ConstantNode(4))],

            ['(1 < 2)', new BinaryNode('<', new ConstantNode(1), new ConstantNode(2))],
            ['(1 <= 2)', new BinaryNode('<=', new ConstantNode(1), new ConstantNode(2))],
            ['(1 <= 1)', new BinaryNode('<=', new ConstantNode(1), new ConstantNode(1))],

            ['(1 > 2)', new BinaryNode('>', new ConstantNode(1), new ConstantNode(2))],
            ['(1 >= 2)', new BinaryNode('>=', new ConstantNode(1), new ConstantNode(2))],
            ['(1 >= 1)', new BinaryNode('>=', new ConstantNode(1), new ConstantNode(1))],

            ['(true === true)', new BinaryNode('===', new ConstantNode(true), new ConstantNode(true))],
            ['(true !== true)', new BinaryNode('!==', new ConstantNode(true), new ConstantNode(true))],

            ['(2 == 1)', new BinaryNode('==', new ConstantNode(2), new ConstantNode(1))],
            ['(2 != 1)', new BinaryNode('!=', new ConstantNode(2), new ConstantNode(1))],

            ['(1 - 2)', new BinaryNode('-', new ConstantNode(1), new ConstantNode(2))],
            ['(1 + 2)', new BinaryNode('+', new ConstantNode(1), new ConstantNode(2))],
            ['(2 * 2)', new BinaryNode('*', new ConstantNode(2), new ConstantNode(2))],
            ['(2 / 2)', new BinaryNode('/', new ConstantNode(2), new ConstantNode(2))],
            ['(5 % 2)', new BinaryNode('%', new ConstantNode(5), new ConstantNode(2))],
            ['pow(5, 2)', new BinaryNode('**', new ConstantNode(5), new ConstantNode(2))],
            ['("a" . "b")', new BinaryNode('~', new ConstantNode('a'), new ConstantNode('b'))],

            ['in_array("a", [0 => "a", 1 => "b"])', new BinaryNode('in', new ConstantNode('a'), $array)],
            ['in_array("c", [0 => "a", 1 => "b"])', new BinaryNode('in', new ConstantNode('c'), $array)],
            ['!in_array("c", [0 => "a", 1 => "b"])', new BinaryNode('not in', new ConstantNode('c'), $array)],
            ['!in_array("a", [0 => "a", 1 => "b"])', new BinaryNode('not in', new ConstantNode('a'), $array)],

            ['range(1, 3)', new BinaryNode('..', new ConstantNode(1), new ConstantNode(3))],

<<<<<<< HEAD
            ['(static function ($regexp, $str) { set_error_handler(function ($t, $m) use ($regexp, $str) { throw new \Symfony\Component\ExpressionLanguage\SyntaxError(sprintf(\'Regexp "%s" passed to "matches" is not valid\', $regexp).substr($m, 12)); }); try { return preg_match($regexp, (string) $str); } finally { restore_error_handler(); } })("/^[a-z]+\$/", "abc")', new BinaryNode('matches', new ConstantNode('abc'), new ConstantNode('/^[a-z]+$/'))],

            ['str_starts_with("abc", "a")', new BinaryNode('starts with', new ConstantNode('abc'), new ConstantNode('a'))],
            ['str_ends_with("abc", "a")', new BinaryNode('ends with', new ConstantNode('abc'), new ConstantNode('a'))],
=======
<<<<<<< HEAD
            ['str_starts_with("abc", "a")', new BinaryNode('starts with', new ConstantNode('abc'), new ConstantNode('a'))],
            ['str_ends_with("abc", "a")', new BinaryNode('ends with', new ConstantNode('abc'), new ConstantNode('a'))],
            ['(static function ($regexp, $str) { set_error_handler(function ($t, $m) use ($regexp, $str) { throw new \Symfony\Component\ExpressionLanguage\SyntaxError(sprintf(\'Regexp "%s" passed to "matches" is not valid\', $regexp).substr($m, 12)); }); try { return preg_match($regexp, $str); } finally { restore_error_handler(); } })("/^[a-z]+\$/", "abc")', new BinaryNode('matches', new ConstantNode('abc'), new ConstantNode('/^[a-z]+$/'))],
=======
            ['(static function ($regexp, $str) { set_error_handler(function ($t, $m) use ($regexp, $str) { throw new \Symfony\Component\ExpressionLanguage\SyntaxError(sprintf(\'Regexp "%s" passed to "matches" is not valid\', $regexp).substr($m, 12)); }); try { return preg_match($regexp, (string) $str); } finally { restore_error_handler(); } })("/^[a-z]+\$/", "abc")', new BinaryNode('matches', new ConstantNode('abc'), new ConstantNode('/^[a-z]+$/'))],
>>>>>>> 3326da0e6f ([ExpressionLanguage] Fix matching null against a regular expression)
>>>>>>> acb5c773fa ([ExpressionLanguage] Fix matching null against a regular expression)
        ];
    }

    public function getDumpData()
    {
        $array = new ArrayNode();
        $array->addElement(new ConstantNode('a'));
        $array->addElement(new ConstantNode('b'));

        return [
            ['(true or false)', new BinaryNode('or', new ConstantNode(true), new ConstantNode(false))],
            ['(true || false)', new BinaryNode('||', new ConstantNode(true), new ConstantNode(false))],
            ['(true and false)', new BinaryNode('and', new ConstantNode(true), new ConstantNode(false))],
            ['(true && false)', new BinaryNode('&&', new ConstantNode(true), new ConstantNode(false))],

            ['(2 & 4)', new BinaryNode('&', new ConstantNode(2), new ConstantNode(4))],
            ['(2 | 4)', new BinaryNode('|', new ConstantNode(2), new ConstantNode(4))],
            ['(2 ^ 4)', new BinaryNode('^', new ConstantNode(2), new ConstantNode(4))],

            ['(1 < 2)', new BinaryNode('<', new ConstantNode(1), new ConstantNode(2))],
            ['(1 <= 2)', new BinaryNode('<=', new ConstantNode(1), new ConstantNode(2))],
            ['(1 <= 1)', new BinaryNode('<=', new ConstantNode(1), new ConstantNode(1))],

            ['(1 > 2)', new BinaryNode('>', new ConstantNode(1), new ConstantNode(2))],
            ['(1 >= 2)', new BinaryNode('>=', new ConstantNode(1), new ConstantNode(2))],
            ['(1 >= 1)', new BinaryNode('>=', new ConstantNode(1), new ConstantNode(1))],

            ['(true === true)', new BinaryNode('===', new ConstantNode(true), new ConstantNode(true))],
            ['(true !== true)', new BinaryNode('!==', new ConstantNode(true), new ConstantNode(true))],

            ['(2 == 1)', new BinaryNode('==', new ConstantNode(2), new ConstantNode(1))],
            ['(2 != 1)', new BinaryNode('!=', new ConstantNode(2), new ConstantNode(1))],

            ['(1 - 2)', new BinaryNode('-', new ConstantNode(1), new ConstantNode(2))],
            ['(1 + 2)', new BinaryNode('+', new ConstantNode(1), new ConstantNode(2))],
            ['(2 * 2)', new BinaryNode('*', new ConstantNode(2), new ConstantNode(2))],
            ['(2 / 2)', new BinaryNode('/', new ConstantNode(2), new ConstantNode(2))],
            ['(5 % 2)', new BinaryNode('%', new ConstantNode(5), new ConstantNode(2))],
            ['(5 ** 2)', new BinaryNode('**', new ConstantNode(5), new ConstantNode(2))],
            ['("a" ~ "b")', new BinaryNode('~', new ConstantNode('a'), new ConstantNode('b'))],

            ['("a" in ["a", "b"])', new BinaryNode('in', new ConstantNode('a'), $array)],
            ['("c" in ["a", "b"])', new BinaryNode('in', new ConstantNode('c'), $array)],
            ['("c" not in ["a", "b"])', new BinaryNode('not in', new ConstantNode('c'), $array)],
            ['("a" not in ["a", "b"])', new BinaryNode('not in', new ConstantNode('a'), $array)],

            ['(1 .. 3)', new BinaryNode('..', new ConstantNode(1), new ConstantNode(3))],

            ['("abc" matches "/^[a-z]+$/")', new BinaryNode('matches', new ConstantNode('abc'), new ConstantNode('/^[a-z]+$/'))],
        ];
    }

    public function testEvaluateMatchesWithInvalidRegexp()
    {
        $node = new BinaryNode('matches', new ConstantNode('abc'), new ConstantNode('this is not a regexp'));

        $this->expectExceptionObject(new SyntaxError('Regexp "this is not a regexp" passed to "matches" is not valid: Delimiter must not be alphanumeric or backslash'));
        $node->evaluate([], []);
    }

    public function testEvaluateMatchesWithInvalidRegexpAsExpression()
    {
        $node = new BinaryNode('matches', new ConstantNode('abc'), new NameNode('regexp'));

        $this->expectExceptionObject(new SyntaxError('Regexp "this is not a regexp" passed to "matches" is not valid: Delimiter must not be alphanumeric or backslash'));
        $node->evaluate([], ['regexp' => 'this is not a regexp']);
    }

    public function testCompileMatchesWithInvalidRegexp()
    {
        $node = new BinaryNode('matches', new ConstantNode('abc'), new ConstantNode('this is not a regexp'));

        $this->expectExceptionObject(new SyntaxError('Regexp "this is not a regexp" passed to "matches" is not valid: Delimiter must not be alphanumeric or backslash'));
        $compiler = new Compiler([]);
        $node->compile($compiler);
    }

    public function testCompileMatchesWithInvalidRegexpAsExpression()
    {
        $node = new BinaryNode('matches', new ConstantNode('abc'), new NameNode('regexp'));

        $this->expectExceptionObject(new SyntaxError('Regexp "this is not a regexp" passed to "matches" is not valid: Delimiter must not be alphanumeric or backslash'));
        $compiler = new Compiler([]);
        $node->compile($compiler);
        eval('$regexp = "this is not a regexp"; '.$compiler->getSource().';');
    }
}
