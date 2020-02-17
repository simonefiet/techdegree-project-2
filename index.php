<?php include 'header.php'; //Include header file ?>
    
        <?php if ($question > 1) { ?>
            <div class="feedback">
                <!-- Feedback on last question -->
                <?php echo feedback(); ?>

            </div>
        <?php } ?>

        <?php if (!$_SESSION['quizstart']) { ?>
            <p class="quiz">
                Welcome to the quiz
            </p>
             <form action="index.php?p=1" method="post">
                <input type="submit" class="btn" name="quizstart" value="Start quiz">
             </form>
        <?php } else { ?>

        <p class="breadcrumbs">
            <!-- Show which question they are on -->
            <?php echo 'Question ' . $question . ' of ' .  $totalQuestions; ?>
        </p>
        <p class="quiz">
            <!-- Show question -->
            <?php echo 'What is ' . $questions[$arrayNo]["leftAdder"] . ' + ' . $questions[$arrayNo]["rightAdder"] . '?'; ?>
        </p>
        <form action="index.php?p=<?php echo $question+1; ?>" method="post">
            <input type="submit" class="btn" name="answer" value="<?php 
                echo $questions[$arrayNo][$choices[0]]; ?>" />
            <input type="submit" class="btn" name="answer" value="<?php 
                echo $questions[$arrayNo][$choices[1]]; ?>" />
            <input type="submit" class="btn" name="answer" value="<?php 
                echo $questions[$arrayNo][$choices[2]]; ?>" />
                <!-- Correct answer hidden -->
            <input type="hidden" name="correct" value="<?php echo $questions[$arrayNo]['correctAnswer']; ?>">
        </form>

        <?php } ?>

        
<?php include 'footer.php'; //Include footer file ?>