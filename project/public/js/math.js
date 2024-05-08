function validateAnswer() {
    var correctAnswers = [4, 15, 3, 6, 81]; // Define correct answers for each question

    var userAnswers = [];
    var questions = document.querySelectorAll('.question input');

    // Check if any input field is empty
    var isAnyEmpty = false;
    questions.forEach(function(input) {
        if (input.value.trim() === '') {
            isAnyEmpty = true;
        }
    });

    // If any input field is empty, display an alert and return early
    if (isAnyEmpty) {
        alert("Please fill in all answer fields.");
        return;
    }

    var correctCount = 0;
    questions.forEach(function(input, index) {
        var userAnswer = parseInt(input.value); // Convert input value to integer
        userAnswers.push(userAnswer);
        if (userAnswer === correctAnswers[index]) {
            input.style.backgroundColor = '#7FFF7F'; // Green color for correct answer
            correctCount++;
        } else {
            input.style.backgroundColor = '#FF7F7F'; // Red color for wrong answer
        }
    });

    // Display result and ask for name and age
    displayResult(correctCount, userAnswers.length);
}

function displayResult(correctCount, totalQuestions) {
    var score = (correctCount / totalQuestions) * 100;
    var resultDiv = document.getElementById('result');
    resultDiv.innerHTML = "<p>Your score: " + score.toFixed(2) + "%</p>";

    // Ask for name and age
    askNameAndAgeForMath(score);
}

function askNameAndAgeForMath(score) {
    var name = prompt("Please enter your name:");
    var age = prompt("Please enter your age:");

    fetch('/save_math_user_info', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ name: name, age: age, score: score })
    })
    .then(response => response.json())
    .then(data => {
        alert("Hello, " + data.name + "! You are " + data.age + " years old. Your score has been saved.");
    })
    .catch(error => console.error('Error:', error));
}
