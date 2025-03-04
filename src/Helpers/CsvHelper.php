<?php

namespace App\Helpers;

class CsvHelper
{
    public static function parseCsv(string $csvContent): array
    {
        $rows = explode("\n", trim($csvContent));
        $header = str_getcsv(array_shift($rows), ';'); // Extrae encabezado

        $data = [];
        foreach ($rows as $index => $row) {
            $fields = str_getcsv($row, ';');
            if (count($fields) === count($header)) {
                $data[$index] = $fields;
            }
        }

        return $data;
    }

    public static function paginate(array $data, int $page, int $limit): array
    {
        $total = count($data);
        $pages = max(1, ceil($total / $limit));
        $page = max(1, min($page, $pages)); // Asegurar que la página esté dentro del rango válido

        return [
            'data' => array_slice($data, ($page - 1) * $limit, $limit),
            'currentPage' => $page,
            'totalPages' => $pages,
        ];
    }
}