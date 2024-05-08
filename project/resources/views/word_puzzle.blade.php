<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Puzzle Game</title>
    <style>
        /* Add your CSS styles here */
    </style>
    <meta name="csrf-token" content="your-csrf-token-value">
    

</head>
<body>
    <h1>Word Puzzle Game</h1>

    <!-- Puzzle Display -->
    <div id="puzzleContainer">
        <p id="puzzle"></p>
        <input type="text" id="answer" placeholder="Enter your answer">
        <button onclick="validateAnswer()">Submit Answer</button>
    </div>

    <!-- Result Display -->
    <div id="result"></div>

    <!-- Player Information Form -->
    <div id="playerInfo" style="display: none;">
        <h2>Enter Your Information</h2>
        <form id="infoForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required><br>
            <input type="hidden" id="score" name="score">
            <input type="hidden" id="currentPuzzleIndex" value="0">
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        
    // Define the correct answers for each puzzle
    const correctAnswers = ["dog", "cat", "bird", "sun", "rain"];
    let currentPuzzleIndex = 0; // Initialize the index of the current puzzle

    // Function to validate answers and handle player information submission
    function validateAnswer() {
        const userAnswer = document.getElementById('answer').value.trim().toLowerCase();

        // Check if the answer field is empty
        if (!userAnswer) {
            alert("Please fill in the answer field.");
            return;
        }

        const isCorrect = (userAnswer === correctAnswers[currentPuzzleIndex]); // Check if the answer is correct

        const resultDiv = document.getElementById('result');
        resultDiv.innerHTML = `<p>Question ${currentPuzzleIndex + 1}: ${isCorrect ? "Correct! Well done!" : "Sorry, that's incorrect. Please try again."}</p>`;

        if (isCorrect) {
            currentPuzzleIndex++; // Move to the next puzzle

            // Check if all puzzles have been completed
            if (currentPuzzleIndex === correctAnswers.length) {
                // Show player information form after completing all puzzles
                document.getElementById('puzzleContainer').style.display = 'none';
                document.getElementById('playerInfo').style.display = 'block';
                document.getElementById('score').value = calculateScore();
                return;
            }

            // Update the puzzle display
            displayPuzzle();
        }

        document.getElementById('answer').value = ''; // Clear the answer field
    }

    // Function to calculate the score
    function calculateScore() {
        return ((currentPuzzleIndex + 1) / correctAnswers.length) * 100;
    }

    // Function to handle form submission
    document.getElementById('infoForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const name = document.getElementById('name').value;
        const age = document.getElementById('age').value;
        const score = document.getElementById('score').value;

        // Submit player information along with the score
        fetch('/save_puzzle_user_info', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ name: name, age: age, score: score })
        })
        .then(response => response.json())
        .then(data => {
            alert(`Hello, ${data.name}! You are ${data.age} years old. Your score has been saved.`);
            // Optionally, redirect to another page or reset the game
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    // Function to initialize the game and display the current puzzle
    function displayPuzzle() {
        const puzzles = [
            { scrambled_word: "doog", correct_word: "dog" },
            { scrambled_word: "tac", correct_word: "cat" },
            { scrambled_word: "brid", correct_word: "bird" },
            { scrambled_word: "sns", correct_word: "sun" },
            { scrambled_word: "rnai", correct_word: "rain" }
        ];

        document.getElementById('puzzle').textContent = puzzles[currentPuzzleIndex].scrambled_word;
    }

    // Initialize the game
    displayPuzzle();
</script>

</body>
</html>
