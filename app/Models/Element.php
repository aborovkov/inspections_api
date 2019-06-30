<?php
/**
 * Created by PhpStorm.
 * User: aborovkov
 * Date: 30/06/2019
 * Time: 11:32
 */

namespace App\Models;

use App\Contracts\Scoreable;

abstract class Element implements Scoreable
{
    private const PAGE = 'page';
    private const SECTION = 'page';
    private const QUESTION = 'page';

    /** @var array $params */
    protected $params;


    public static function create(string $type, array $params): Scoreable
    {
        return new Question($params[0], $params[1]);
    }

    /**
     * Object given properties.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->params;
    }
}