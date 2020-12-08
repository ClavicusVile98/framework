<?php


namespace Service\Product;


class sortName implements IStrategy
{

    /**
     * @param array $productList
     * @return array
     */
    public function sort(array $productList): array
    {
        usort($productList, function (\Model\Entity\Product $a, \Model\Entity\Product $b) {
            return $a->getName() <=> $b->getName();
        });

        return $productList;
    }
}