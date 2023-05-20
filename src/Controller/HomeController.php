<?php

namespace App\Controller;

use App\Utility\FileSystem\FileSystem as FileSystemCustom;

use App\Entity\ProductForm;
use App\Form\ProductFormType;
use App\Utility\Tax\CountryTax;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class HomeController extends AbstractController
{
    // #[Route('/api/posts/{id}', methods: ['GET', 'HEAD'], requirements: ['id' => '\d+'])]

    public function home(Request $request): Response
    {




        $product = new ProductForm();
        $products = json_decode(FileSystemCustom::readFile($this->getParameter('app.products')), true);
        $product->setProductList($products);
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $product = $data->productList;

            $countryTax = $this->getCountryTaxByTax($data->productCode);

            $price = $product->getCost() * (1 + $countryTax['tax']);
            return $this->render('body/product/result.html.twig', [

                'price' => $price,
                'productName' => $product->getProductName(),
                'country' => $countryTax['country']
            ]);
        }



        return $this->render('body/main.html.twig', ['form' => $form]);
    }

    public function getCountryTaxByTax(string $taxCode): mixed
    {
        $countryTaxList = json_decode(FileSystemCustom::readFile($this->getParameter('app.countriesTax')), true);
        $countryCode = substr($taxCode, 0, 2);
        $countryTaxResult = null;


        foreach ($countryTaxList as $key => $countryTax) {
            if ($countryTax['iso'] === $countryCode) {
                $countryTaxResult = $countryTax;
            }
        }
        return $countryTaxResult;
    }
}
