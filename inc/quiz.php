<?php
/*
 * PHP Techdegree Project 2: Build a Quiz App in PHP
 *
 * For the questions, I have used PHP array of questions from 'questions.php'
 *
 */
// Include questions
include 'questions.php';



//Start session
session_start();
if(isset($_POST['quizstart'])){
	$_SESSION['quizstart'] = 1;
}

//Shuffle questions once in session
if (!isset($_SESSION['shuffled'])) {
    $_SESSION['shuffled'] = range(0, 9);
    shuffle($_SESSION['shuffled']);
}

//$rand_questions = array_rand($questions, 10);

//Count questions
$totalQuestions = count($questions);

// Keep track of which questions have been asked
$question = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_NUMBER_INT);


//reset quiz
if (empty ($question)){
  session_destroy();
  $question = 1;
}



if(isset($_POST['answer'])){
	$_SESSION['answer'] = filter_input(INPUT_POST, 'answer', FILTER_SANITIZE_NUMBER_INT);
}
if(!isset($_POST['answer'])){
	
}

if (isset($_POST['correct'])) {
	$_SESSION['correct'] = filter_input(INPUT_POST, 'correct', FILTER_SANITIZE_NUMBER_INT);
}

// Show random question
$choices = array('correctAnswer', 'firstIncorrectAnswer', 'secondIncorrectAnswer');

// Shuffle answer buttons
shuffle($choices);


$arrayNo = $_SESSION['shuffled'][$question-1];

// funtion to toast correct and incorrect answers
function feedback() {

	$correctFeedback = array('Good job!', 'Such a champion!', 'What a genius!', );
  	shuffle($correctFeedback);

  	$incorrectFeedback = array('Nice try', 'Better luck next time', 'Practice my friend', );
  	shuffle($incorrectFeedback);

    if ($_SESSION['answer'] == $_SESSION['correct'] AND isset($_POST['answer'])){
	
		echo "<p class='' style='color: green;'>" . $correctFeedback[0] . " Keep going.</p>";

  	} elseif ($_SESSION['answer'] != $_SESSION['correct'] AND isset($_POST['answer'])){

		echo "<p class='' style='color: red;'>" . $incorrectFeedback[0] . "</p>";

	}

}

// Keep track of answers
if ($_SESSION['answer'] == $_SESSION['correct'] AND isset($_POST['answer'])){
	$_SESSION['score']++;
}


// If all questions have been asked, give option to show score
if($question == 11){
	header('location: results.php');
	exit;

}
