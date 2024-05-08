<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Object Identification Game</title>
  <link rel="stylesheet" href="{{ asset('styles.css') }}">
  <!-- CSRF Token Meta Tag -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <div class="viewport">
    <div class="container">
      <h1>Object Identification Game</h1>
      <form id="game" class="scroll-view">
        <div class="questions-container">
          <div class="question" id="question1">
            <img src="{{ asset('images/question_1.png') }}" alt="Animals">
            <input type="text" name="answers[]" class="answer" placeholder="Enter your answer">
          </div>
          <div class="question" id="question2">
            <img src="{{ asset('images/question_2.png') }}" alt="Fruits">
            <input type="text" name="answers[]" class="answer" placeholder="Enter your answer">
          </div>
          <div class="question" id="question3">
            <img src="{{ asset('images/question_3.jpg') }}" alt="Vehicles">
            <input type="text" name="answers[]" class="answer" placeholder="Enter your answer">
          </div>
          <div class="question" id="question4">
            <img src="{{ asset('images/question_4.png') }}" alt="Colors">
            <input type="text" name="answers[]" class="answer" placeholder="Enter your answer">
          </div>
          <div class="question" id="question5">
            <img src="{{ asset('images/question_5.jpg') }}" alt="Shapes">
            <input type="text" name="answers[]" class="answer" placeholder="Enter your answer">
          </div>
        </div>
        <button type="button" onclick="validateAnswer()">Submit</button>
      </form>
      <div id="result"></div>
    </div>
  </div>
  <!-- JavaScript Code -->
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
