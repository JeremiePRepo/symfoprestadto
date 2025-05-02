<?php

namespace App\Repository;

use App\Entity\PSProductDTO;
use PDO;

class PSProductDTORepository
{
    private PDO $pdo;

    public function __construct()
    {
        // Extraire les informations de l'URL
        $url = parse_url($_ENV['DATABASE_URL']);
        $host = $url['host'];
        $dbname = ltrim($url['path'], '/');
        $charset = 'utf8mb4'; // Par défaut
        $user = $url['user'] ?? '';
        $password = $url['pass'] ?? '';

        // Construire le DSN pour PDO
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function find(int $id): ?PSProductDTO
    {
        $stmt = $this->pdo->prepare('SELECT id_product, reference FROM ps_product WHERE id_product = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new PSProductDTO($result['id_product'], $result['reference']);
        }

        return null;
    }

    /**
     * @return PSProductDTO[]
     */
    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT id_product, reference FROM ps_product');
        $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = new PSProductDTO($row['id_product'], $row['reference']);
        }

        return $products;
    }

    public function updateReference(int $id, string $reference): ?PSProductDTO
    {
        $stmt = $this->pdo->prepare('UPDATE ps_product SET reference = :reference WHERE id_product = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':reference', $reference, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return $this->find($id);
        }

        return null;
    }
}
