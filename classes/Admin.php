<?php

namespace classes;

use config\DataBaseManager;
<?php

namespace classes;

use config\DataBaseManager;

class Admin extends User
{
    private DataBaseManager $dbManager;

    public function __construct(int $id, string $name, string $email, DataBaseManager $dbManager)
    {
        parent::__construct($id, $name, $email);
        $this->dbManager = $dbManager;
    }

    // Validation des comptes enseignants
    public function validateTeacher(int $teacherId): bool
    {
        return $this->dbManager->update(
            'users',
            ['approuve' => '1'],
            'id_user',
            $teacherId
        );
    }

    // Activation, suspension ou suppression d'un utilisateur
    public function updateUserStatus(int $userId, string $status): bool
    {
        return $this->dbManager->update(
            'users',
            ['status' => $status],
            'id_user',
            $userId
        );
    }

    public function deleteUser(int $userId): bool
    {
        return $this->dbManager->delete('users', 'id_user', $userId);
    }

    // Gestion des contenus : cours, catégories, et tags
    public function addCategorie(int $idCategorie, string $name): bool
    {
        $categorie = new Categorie($this->dbManager, $idCategorie, $name, 0);
        return $categorie->addCategorie();
    }

    public function deleteCategorie(int $idCategorie): bool
    {
        $categorie = new Categorie($this->dbManager, $idCategorie, '', 0);
        return $categorie->deleteCategorie();
    }

    public function addTag(string $name): bool
    {
        return $this->dbManager->insert('tags', ['name' => $name]);
    }

    public function deleteTag(int $tagId): bool
    {
        return $this->dbManager->delete('tags', 'id_tag', $tagId);
    }

    // Insertion en masse de tags
    public function insertTags(array $tags): bool
    {
        foreach ($tags as $tag) {
            $this->addTag($tag);
        }
        return true;
    }

    // Accès aux statistiques globales
    public function getStatistics(): array
    {
        $totalCourses = $this->dbManager->selectBy('courses', []);
        $categoriesDistribution = $this->dbManager->selectAll('categories');
        $mostPopularCourse = $this->dbManager->selectBy('courses', [], 'ORDER BY student_count DESC LIMIT 1');
        $topTeachers = $this->dbManager->selectBy('users', ['role' => 'teacher'], 'ORDER BY rating DESC LIMIT 3');

        return [
            'totalCourses' => count($totalCourses),
            'categoriesDistribution' => $categoriesDistribution,
            'mostPopularCourse' => $mostPopularCourse,
            'topTeachers' => $topTeachers,
        ];
    }
}
