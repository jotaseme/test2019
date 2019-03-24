<?php

namespace App\Controller;

use App\Services\MunicipiosServiceInterface;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MunicipiosController extends FOSRestController
{
    /**
     * @Rest\Get("/municipios/{nombreDeProvincia}")
     * @Rest\View(serializerGroups={"detail"})
     * @param $nombreDeProvincia
     * @param MunicipiosServiceInterface $municipiosService
     * @return array
     */
    public function getByNombreDeProvinciaAction($nombreDeProvincia, MunicipiosServiceInterface $municipiosService)
    {
        return $municipiosService->getAllByNombreDeProvincia($nombreDeProvincia);
    }

    /**     *
     * @Route("/show/municipios/{nombreDeProvincia}")
     * @param $nombreDeProvincia
     * @return Response
     */
    public function showByNombreDeProvinciaAction($nombreDeProvincia)
    {
        return $this->render(
            'Municipios/list.html.twig',
            ['provincia' => $nombreDeProvincia]
        );
    }
}