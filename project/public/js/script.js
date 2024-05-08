function validateAnswer() {
    var userAnswers = [];
    var questions = document.querySelectorAll('.question');

    // Check if any input field is empty
    var isAnyEmpty = false;
    questions.forEach(function(question) {
        var answer = question.querySelector('.answer').value.trim();
        if (answer === '') {
            isAnyEmpty = true;
        } else {
            userAnswers.push(answer.toLowerCase());
        }
    });

    // If any input field is empty, display an alert and return early
    if (isAnyEmpty) {
        alert("Please fill in all answer fields.");
        return;
    }

    // Proceed with answer validation if all fields are filled
    fetch('/validate_answer', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ answers: userAnswers })
    })
    .then(response => response.json())
    .then(data => {
        var resultDiv = document.getElementById('result');
        resultDiv.innerHTML = '';
        data.results.forEach(function(result) {
            resultDiv.innerHTML += "<p>" + result + "</p>";
        });
        alert("Your score: " + data.score + "%");
        askNameAndAge(data.score);
    })
    .catch(error => console.error('Error:', error));
}

function askNameAndAge(score) {
    var name = prompt("Please enter your name:");
    var game = prompt("Game Type:");
    var age = prompt("Please enter your age:");

    fetch('/save_user_info', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ name: name, game: game, age: age, score: score })
    })
    .then(response => response.json())
    .then(data => {
        alert("Hello, " + data.name + "! You are " + data.age + " years old. Your score has been saved.");
    })
    .catch(error => console.error('Error:', error));
}
