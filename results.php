<?php include 'header.php'; ?>
<?php
session_start();
echo"<p>You scored " . $score . " out of 10</p>";
echo '<p class="quiz">';
if ($score < 5) {
	echo "Better luck next time....";
} else if ($score > 5 && $score < 10) {
	echo "Okay, pretty good score!";
} else if ($score === 10) {
	echo "Well done! You are a genius!";
}
echo '</p>';
session_destroy();
echo "<form action='index.php' method='post'>";
echo "<input type='submit' class='btn' name='Retest' value='Play Again'>";
echo "</form>";
?>
<?php include 'footer.php'; ?>