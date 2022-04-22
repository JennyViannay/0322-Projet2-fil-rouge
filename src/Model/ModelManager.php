<?php

namespace App\Model;

class ModelManager extends AbstractManager
{
    public const TABLE = 'model';

    public function selectOneBySlug(string $slug): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE slug = :slug");
        $statement->bindValue('slug', $slug, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }

}
