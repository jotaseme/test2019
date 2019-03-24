<?php

namespace App\Controller;

use App\Services\PrediccionClimatologicaServiceInterface;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ProvinciasController extends FOSRestController
{
    /**
     * @Route("/weather/{nombreDeMunicipio}")
     * @ParamConverter("municipio", class="App:Municipio", options={
     *    "repository_method" = "findByNombre",
     *    "mapping": {"nombreDeMunicipio": "nombre"}
     * })
     * @param $municipio
     * @param PrediccionClimatologicaServiceInterface $prediccionClimatologicaService
     * @return Response
     */
    public function weatherByNombreDeMunicipioAction(
        $municipio,
        PrediccionClimatologicaServiceInterface $prediccionClimatologicaService)
    {
        if (empty($municipio)) {
            throw new NotFoundHttpException();
        }
        $previsionesEspecificas = $prediccionClimatologicaService->getPrevisionPorMunicipio($municipio[0]);
        return $this->render(
            'Weather/previsiones.html.twig',
            ['previsionesEspecificas' => $previsionesEspecificas]
        );
    }
}