<?php
include 'includes/DatabaseConnection.php';

try {
    // Check if the form has been submitted
    if (isset($_POST['questiontext'])) {
        
        // Use a prepared statement to prevent SQL injection
        $sql = 'INSERT INTO question (text, date, authorid, moduleid) VALUES (:questiontext, CURDATE(), :authorid, :moduleid)';
        $stmt = $pdo->prepare($sql);
        
        // Bind the form value to the :questiontext parameter
        $stmt->bindValue(':questiontext', $_POST['questiontext']);
        $stmt->bindValue(':authorid', 1);
        $stmt->bindValue(':moduleid', 1);
        
        // Execute the query
        $stmt->execute();
        
        // Redirect the user back to the questions list
        header('Location: questions.php');
        exit();

    } else {
        // The form was not submitted, so display the form template
        $title = 'Add a New Question';
        
        ob_start();
        include 'templates/addquestions.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';
?>