<?php
try{
    include 'includes/DatabaseConnection.php';

    $sql = 'SELECT question.id, text, date, `name`, email from question
    INNER JOIN author ON question.authorid = author.id 
    ORDER BY id DESC';
    $questions = $pdo->query($sql);
    $title = 'questions list';

    ob_start();
    include 'templates/questions.html.php';
    $output = ob_get_clean();
} catch (PDOException $e){
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';
?>