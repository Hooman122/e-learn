<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Math Game</title>
  <link rel="stylesheet" href="{{ asset('styles.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <div class="viewport">
    <div class="container">
      <h1>Math Game</h1>
      <div id="game" class="scroll-view">
        <div class="questions-container">
          <div class="question" id="question1">
            <span>1. What is 2 + 2?</span>
            <input type="number" class="answer" placeholder="Enter your answer">
          </div>
          <div class="question" id="question2">
            <span>2. What is 5 * 3?</span>
            <input type="number" class="answer" placeholder="Enter your answer">
          </div>
          <div class="question" id="question3">
            <span>3. What is 10 - 7?</span>
            <input type="number" class="answer" placeholder="Enter your answer">
          </div>
          <div class="question" id="question4">
            <span>4. What is 24 / 4?</span>
            <input type="number" class="answer" placeholder="Enter your answer">
          </div>
          <div class="question" id="question5">
            <span>5. What is 9 squared?</span>
            <input type="number" class="answer" placeholder="Enter your answer">
          </div>
        </div>
        <button onclick="validateAnswer()">Submit</button>
      </div>
      <div id="result"></div>
    </div>
  </div>
  <script src="{{ asset('js/math.js') }}"></script>
</body>
</html>
