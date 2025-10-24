<h2>Questions List</h2>

<p><a href="addquestions.php">Add your own question</a></p>

<?php foreach ($questions as $question): ?>
    <blockquote>
        <p>
            <?php // Use htmlspecialchars to prevent XSS attacks ?>
            <?=htmlspecialchars($question['text'], ENT_QUOTES, 'UTF-8')?>

            (by <a href = "mailto:<?=htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8');?>">
            <?=htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

            <a href="editquestions.php?id=<?=$question['id']?>">Edit</a>
            
            (Posted on: <?=(new DateTime($question['date']))->format('jS M Y')?>)
        </p>
    </blockquote>
<?php endforeach; ?>