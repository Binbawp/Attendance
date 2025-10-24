<?php 
include 'includes/DatabaseConnection.php';
try{
    if (isset($_POST['text'])) {

        $sql = 'UPDATE question SET text = :text WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt-> bindValue (':text', $_POST['text']);
        $stmt-> bindValue (':id', $_POST['id']);
        $stmt-> execute();
        header ('location: questions.php');
    } else {
        $sql = 'SELECT * FROM question WHERE id = :id';
        $stmt = $pdo-> prepare ($sql);
        $stmt-> bindValue(':id', $_GET['id']);
        $stmt-> execute();
        $questions = $stmt-> fetch();
        $title = 'Edit questions';

        ob_start();
        include 'templates/editquestions.html.php';
        $output = ob_get_clean(); 
    }
} catch (PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing questions: ' . $e->getMessage();
}
include 'templates/layout.html.php';