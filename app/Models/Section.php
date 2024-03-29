<?php
/**
 * Created by PhpStorm.
 * User: aborovkov
 * Date: 28/06/2019
 * Time: 20:14
 */


namespace App\Models;

use App\Contracts\Scoreable;
use App\Contracts\Containable;
use Illuminate\Support\Collection;

class Section extends Element implements Containable
{
    /** @var Collection  */
    private $items;
    /** @var double $weight */
    private $weight;

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->items = collect();
        $this->weight = isset($params['weight']) ? intval($params['weight']) : 1;
    }

    public function add(Scoreable $obj): void
    {
        $this->items->add($obj);
    }

    public function all(): Collection
    {
        return $this->items;
    }

    public function total(): float
    {
        $total = 0;
        foreach ($this->items as $scoreable) {
            $total += $scoreable->total();
        }

        return $this->weight * $total;
    }

    public function actual(): float
    {
        $actual = 0;
        foreach ($this->items as $scoreable) {
            $actual += $scoreable->actual();
        }

        return $this->weight * $actual;
    }
}