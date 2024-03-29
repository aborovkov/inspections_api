<?php
/**
 * Created by PhpStorm.
 * User: aborovkov
 * Date: 28/06/2019
 * Time: 20:04
 */

namespace App\Contracts;

interface Scoreable
{
    /**
     * Return total score of the object.
     *
     * @return float
     */
    public function total(): float;

    /**
     * Return actual score of the object.
     *
     * @return float
     */
    public function actual(): float;

    /**
     * Returns data witch was given in constructor
     *
     * @return array
     */
    public function toArray(): array;
}

