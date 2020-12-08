<?php


namespace Service\Product;


class sortPrice implements IStrategy
{
    /**
     * @param array $productList
     * @return array
     */
    public function sort(array $productList): array
    {
        usort($productList, function (\Model\Entity\Product $a, \Model\Entity\Product $b) {
            return $a->getPrice() > $b->getPrice();
        });

        return $productList;
    }
}