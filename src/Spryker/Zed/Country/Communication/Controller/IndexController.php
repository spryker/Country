<?php

namespace Spryker\Zed\Country\Communication\Controller;

use Spryker\Zed\Application\Communication\Controller\AbstractController;
use Spryker\Zed\Country\Communication\Table\CountryTable;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction()
    {
        /** @var CountryTable $table */
        $table = $this->getCommunicationFactory()->createCountryTable();

        return $this->viewResponse([
            'countryTable' => $table->render(),
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function tableAction()
    {
        $table = $this->getCommunicationFactory()->createCountryTable();

        return $this->jsonResponse(
            $table->fetchData()
        );
    }

}
