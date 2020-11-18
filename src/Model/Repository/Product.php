<?php

declare(strict_types = 1);

namespace Model\Repository;

use Model\Entity;

class Product
{
    /**
     * Поиск продуктов
     *
     * @param int[] $ids
     *
     * @return Entity\Product[]
     */
    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $prototype = new Entity\Product(0,'', 0, '');
        $productList = [];

        foreach ($this->getDataFromSource(['id' => $ids]) as $item) {
            $prototype->setId($item['id']);
            $prototype->setPrice($item['price']);
            $prototype->setName($item['name']);
            $prototype->setDescription($item['description']);

            $productList[] = clone $prototype;
        }

        return $productList;
    }

    /**
     * Получаем все продукты
     *
     * @return Entity\Product[]
     */
    public function fetchAll(): array
    {
        $prototype = new Entity\Product(0,'', 0, '');
        $productList = [];

        foreach ($this->getDataFromSource() as $item) {
            $prototype->setId($item['id']);
            $prototype->setPrice($item['price']);
            $prototype->setName($item['name']);
            $prototype->setDescription($item['description']);

            $productList[] = clone $prototype;
        }

        return $productList;
    }

    /**
     * Получаем продукты из источника данных
     *
     * @param array $search
     *
     * @return array
     */
    private function getDataFromSource(array $search = [])
    {
        $dataSource = [
            [
                'id' => 1,
                'name' => 'PHP',
                'price' => 15300,
            'description' => 'This course about PHP',
            ],
            [
                'id' => 2,
                'name' => 'Python',
                'price' => 20400,
            'description' => 'This course about Python',
            ],
            [
                'id' => 3,
                'name' => 'C#',
                'price' => 30100,
            'description' => 'This course about C#',
            ],
            [
                'id' => 4,
                'name' => 'Java',
                'price' => 30600,
            'description' => 'This course about Java',
            ],
            [
                'id' => 5,
                'name' => 'Ruby',
                'price' => 18600,
            'description' => 'This course about Ruby',
            ],
            [
                'id' => 6,
                'name' => 'Rust',
                'price' => 10000,
            'description' => 'This course about Rust',
            ],
            [
                'id' => 8,
                'name' => 'Delphi',
                'price' => 8400,
            'description' => 'This course about Delphi',
            ],
            [
                'id' => 9,
                'name' => 'C++',
                'price' => 19300,
            'description' => 'This course about C++',
            ],
            [
                'id' => 10,
                'name' => 'C',
                'price' => 12800,
            'description' => 'This course about C',
        ],
            [
                'id' => 11,
                'name' => 'Lua',
                'price' => 5000,
            'description' => 'This course about Lua',
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return in_array($dataSource[key($search)], current($search), true);
        };

        return array_filter($dataSource, $productFilter);
    }
}
