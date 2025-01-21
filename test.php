<?php 

public static function showInCatalogue(PDO $db, int $page = 1, int $perPage = 10): array
{
    try {
        // Calculate the offset
        $offset = ($page - 1) * $perPage;

        // Prepare the SQL query with LIMIT and OFFSET
        $stmt = $db->prepare("
            SELECT 
                c.id_course, 
                c.title, 
                c.price, 
                c.created_at, 
                c.status, 
                c.archive, 
                c.picture, 
                cat.name AS category, 
                u.first_name, 
                u.last_name, 
                COUNT(e.id_user) AS enrollment_count
            FROM 
                course AS c
            INNER JOIN 
                user AS u ON c.id_user = u.id_user
            LEFT JOIN 
                category AS cat ON c.id_category = cat.id_category
            LEFT JOIN 
                enrollement AS e ON c.id_course = e.id_course
            WHERE 
                c.status = 'activated' AND c.archive = '0'
            GROUP BY 
                c.id_course
            LIMIT :limit OFFSET :offset
        ");

        // Bind the pagination parameters
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return the fetched data
    } catch (PDOException $e) {
        error_log("Database error in showInCatalogue: " . $e->getMessage());
        return []; // Return an empty array if there's an error
    }
}

    public static function countCourses(PDO $db): int
    {
        try {
            $stmt = $db->prepare("
                SELECT COUNT(*) AS total
                FROM course
                WHERE status = 'activated' AND archive = '0'
            ");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return (int) $result['total']; // Return the total number of courses
        } catch (PDOException $e) {
            error_log("Database error in countCourses: " . $e->getMessage());
            return 0; // Return 0 if there's an error
        }
    }