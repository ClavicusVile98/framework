<?php


namespace Service\Product;


class Strategy
{
    public function sortType(string $sortType, array $productList): array
    {
        $sortProduct = [];
        if($sortType === 'price'){
            $sortProduct = (new sortPrice())->sort($productList);
        }else if($sortType === 'name'){
            $sortProduct = (new sortName())->sort($productList);
        }

        return $sortProduct;
    }
}