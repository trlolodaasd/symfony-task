<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\ProductForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpKernel\Log\Logger;
use Symfony\Component\OptionsResolver\OptionsResolver;



class ProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {






        $products = [];
        foreach ($options['data']->productList as $key => $product) {
            $products[$product['name']] = new Product($product['id'], $product['name'], $product['price'], $product['currency']);
        }

        $builder
            ->add(
                'productCode',
                TextType::class,
                [
                    'label' => 'Enter the tax number of the product ',
                    'required' => true,
                ]
            )
            ->add('productList', ChoiceType::class, [
                'label' => 'Select product',
                'choices' => $products,
                'multiple' => false,
                'required' => true
            ])
            ->add('submit', SubmitType::class, ['label' => 'Calculate']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductForm::class,
        ]);
    }
}
