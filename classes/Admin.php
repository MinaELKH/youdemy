<?php
namespace classes;
use config\DataBaseManager;
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
