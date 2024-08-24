<?php
require "helpers.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}

$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
$agree = $_POST['agree'];

$questions = retrieve_questions();
$answers = $_POST['answers'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set the countdown time in 60 seconds 
            var countdownTime = 60; 

            // Get the timer element
            var timerElement = document.getElementById('timer');

            // Function to update the timer
            function updateTimer() {
                if (countdownTime <= 0) {
                    document.getElementById('quiz-form').submit(); 
                    return;
                }

                var minutes = Math.floor(countdownTime / 60);
                var seconds = countdownTime % 60;
                timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                
                countdownTime--;
            }

            // Update the timer every second
            setInterval(updateTimer, 1000);

            // Auto-submit the form after the countdown ends
            setTimeout(function() {
                document.getElementById('quiz-form').submit();
            }, 60000); // Submit after 60 seconds
        });
    </script>
</head>
<body>
<section class="section">
    <div class="timer" id="timer">1:00</div>
    <h1 class="title">Quiz</h1>
    <form id="quiz-form" method="POST" action="result.php">
        <input type="hidden" name="complete_name" value="<?php echo htmlspecialchars($complete_name); ?>" />
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>" />
        <input type="hidden" name="birthdate" value="<?php echo htmlspecialchars($birthdate); ?>" />
        <input type="hidden" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" />
        <input type="hidden" name="agree" value="<?php echo htmlspecialchars($agree); ?>" />
        <input type="hidden" name="answers" value="<?php echo htmlspecialchars($answers); ?>" />

        <?php foreach ($questions['questions'] as $index => $question): ?>
            <div class="box">
                <h2 class="subtitle">Question <?php echo $index + 1; ?></h2>
                <p><?php echo htmlspecialchars($question['question']); ?></p>
                <?php foreach ($question['options'] as $option): ?>
                <div class="field">
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="answers[<?php echo $index; ?>]" value="<?php echo htmlspecialchars($option['key']); ?>"
                            <?php if (isset($answers[$index]) && $answers[$index] == $option['key']) echo 'checked'; ?> />
                            <?php echo htmlspecialchars($option['value']); ?>
                        </label>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="button is-link">Submit</button>
    </form>
</section>
</body>
</html>
