<?php

namespace App\Traits;

use App\Entity\Books;

trait DiscountTrait
{
    public function getCategoryDiscount()
    {
        return "category discount";
    }

    public function validateCoupon($couponId)
    {
        if ($couponId) {
            //validate the coupon id with DB
            return true;
        }
    }

    public function getProduct($productId)
    {
        $repository = $this->getDoctrine()->getRepository(Books::class);
        return $repository->findOneBy(['id' => $productId]);
    }
}
