<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

use App\Services\HttpClientService;
use App\Helpers\CsvHelper;

class ConsumerController extends AbstractController
{
    #[Route('/consume-csv', name: 'consume_csv')]
    public function consumeCsv(HttpClientService $csvClientService, Request $request): Response
    {
        $csvContent = $csvClientService->fetchCsvData();
        $csvData = CsvHelper::parseCsv($csvContent);

        $page = $request->query->getInt('page', 1);
        $limit = 10;
        $pagination = CsvHelper::paginate($csvData, $page, $limit);

        return $this->render('csv_view.html.twig', [
            'data' => $pagination['data'],
            'currentPage' => $pagination['currentPage'],
            'totalPages' => $pagination['totalPages'],
        ]);
    }
}