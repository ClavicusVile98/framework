<?php
declare(strict_types=1);

namespace Service\Product;


interface IStrategy
{
    /**
     * @param array $productList
     * @return array
     */
    public function sort(array $productList): array;
}