<?php

declare(strict_types = 1);

namespace Controller\product;


use Framework\Render;
use Service\Product\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductControllerDescription
{
    use Render;

    /**
     * Описание продуктов
     *
     * @param Request $request
     *
     * @return Response
     */
    public function productDescription(Request $request): Response
    {
        $description = (new Product())->getAll($request->query->get('sort', ''));

        return $this->render('product/description.html.php', ['description' => $description]);
    }
}