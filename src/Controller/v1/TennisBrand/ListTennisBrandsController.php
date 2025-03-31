<?php

namespace App\Controller\v1\TennisBrand;

use App\Entity\TennisBrand;
use Doctrine\ORM\EntityManagerInterface;
use Nelmio\ApiDocBundle\Attribute\Operation;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/v1/tennis_brands', name: 'api_tennis_brands_list', methods: ['GET'])]
//#[Operation(
//    operationId: 'getTennisBrands',
//    description: 'Retrieves a list of Tennis Brands',
//)] todo rework
#[OA\Response(
    response: 200,
    description: 'List of Tennis Brands',
    content: new OA\JsonContent(
        type: 'array',
        items: new OA\Items(
            properties: [
                new OA\Property(property: 'id', type: 'integer'),
                new OA\Property(property: 'name', type: 'string'),
                new OA\Property(property: 'logoUrl', type: 'string'),
                new OA\Property(property: 'countryCode', type: 'string')
            ],
            type: 'object'
        )
    )
)]
#[OA\Tag(name: 'TennisBrand')]
class ListTennisBrandsController extends AbstractController
{
    public function __invoke(EntityManagerInterface $entityManager): JsonResponse
    {
        $repository = $entityManager->getRepository(TennisBrand::class);
        $tennisBrands = $repository->findAll();

        $data = array_map(
            static fn(TennisBrand $brand) => [
                'id' => $brand->getId(),
                'name' => $brand->getName(),
                'logoUrl' => $brand->getLogoUrl(),
                'countryCode' => $brand->getCountryCode(),
            ],
            $tennisBrands
        );

        return $this->json($data);
    }
}
