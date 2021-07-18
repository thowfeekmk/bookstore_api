<?php

namespace App\Controller;

use App\Entity\Discounts;
use App\Traits\DiscountTrait;
use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DiscountController extends AbstractController
{
    use DiscountTrait;
    /**
     * @Route("/discount", name="discount")
     */
    public function index(): Response
    {
        return $this->render('discount/index.html.twig', [
            'controller_name' => 'DiscountController',
        ]);
    }

    /**
     * @Route("/discount/amount", name="discount_amount")
     */
    public function amount(Request $request): JsonResponse
    {
        $discountAmount = 0;

        // $param1 = ['id' => 2, 'qty' => 10];
        // $param2 = ['id' => 3, 'qty' => 2];
        // $params['params'] = [$param1, $param2];
        $params = json_decode($request->getContent(), true);

        $data = [];
        $categoryAmount = [];
        $categoryQty = [];
        $totalAmount = 0;


        foreach ($params['items'] as $param) {
            $product = $this->getProduct($param['id']);
            $productCategoryId = $product->getCategoryId();
            $productQty = $param['qty'];
            $productPrice = $product->getPrice() * $param['qty'];

            if (isset($categoryAmount[$productCategoryId])) {
                $categoryAmount[$productCategoryId] +=  $productPrice;
            } else {
                $categoryAmount[$productCategoryId] =  $productPrice;
            }

            if (isset($categoryQty[$productCategoryId])) {
                $categoryQty[$productCategoryId] +=  $productQty;
            } else {
                $categoryQty[$productCategoryId] = $productQty;
            }
            $totalAmount += $productPrice;
        }
        // var_dump($categoryQty);
        // exit;
        $repository = $this->getDoctrine()->getRepository(Discounts::class);
        $discounts = $repository->findBy(['status' => 1]);

        foreach ($discounts as $row) {
            if ($row->getDiscountType() == "category") {
                $categoryId = $row->getCategoryId();
                $minQty = $row->getMinQuantity();
                $discountFor = $row->getDiscountFor();
                $discountPercent = $row->getPercentage();
                if ($categoryId) {
                    if (isset($categoryQty[$categoryId]) && $categoryQty[$categoryId] >= $minQty) {
                        if ($discountFor == "sub") {
                            $discountAmount += ($categoryAmount[$categoryId] * $discountPercent) / 100;
                        } else if ($discountFor == "total") {
                            $discountAmount += ($totalAmount * $discountPercent) / 100;
                        }
                    }
                } else {
                    foreach ($categoryQty as $categoryId => $qty) {
                        if ($qty >= $minQty) {
                            if ($discountFor == "sub") {
                                $discountAmount += ($categoryAmount[$categoryId] * $discountPercent) / 100;
                            } else if ($discountFor == "total") {
                                $discountAmount += ($totalAmount * $discountPercent) / 100;
                            }
                        }
                    }
                }
            } else if ($row->getDiscountType() == "coupon") {
                if (isset($params['coupon']) && $params['coupon']) {
                    if ($this->validateCoupon($params['coupon'])) {
                        $discountPercent = $row->getPercentage();
                        $discountAmount = ($totalAmount * $discountPercent) / 100;
                    }
                }
            }
        }
        $data = [
            'amount' => $discountAmount
        ];
        return new JsonResponse(
            ['data' => $data]
        );
    }
}
