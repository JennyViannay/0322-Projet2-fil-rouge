<?php

namespace App\Model;

class ProductManager extends AbstractManager
{
    public const TABLE = 'product';

    public function selectAllByModel(int $modelId): array
    {
        $statement = $this->pdo->prepare("SELECT DISTINCT(color_id), color.name as color_name FROM " . self::TABLE . " JOIN color ON color.id = product.color_id WHERE model_id = :modelId AND quantity > 0");
        $statement->bindValue('modelId', $modelId, \PDO::PARAM_INT);
        $statement->execute();

        return $this->getSizeByColors($statement->fetchAll());
    }

    public function selectOneBySizeAndColor(int $size, int $color, int $model)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE size_id = :size AND color_id = :color AND model_id = :model");
        $statement->bindValue('size', $size, \PDO::PARAM_INT);
        $statement->bindValue('color', $color, \PDO::PARAM_INT);
        $statement->bindValue('model', $model, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    private function getSizeByColors(array $colors)
    {
        $results = [];
        foreach ($colors as $color) {
            $statement = $this->pdo->prepare("SELECT DISTINCT(size_id), size.size as size_name FROM " . self::TABLE . " JOIN size ON size.id = product.size_id WHERE color_id = :colorId");
            $statement->bindValue('colorId', $color['color_id'], \PDO::PARAM_INT);
            $statement->execute();

            $color['sizes'] = $statement->fetchAll();
            $results[] = $color;
        }

        return $results;
    }

}
