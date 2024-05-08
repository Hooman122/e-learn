<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game Selection</title>
  <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
  <div class="container">
    <h1>Welcome to Fun Games!</h1>
    <p>Please select a game:</p>
    <div class="button-container">
      <a href="{{ route('object_game') }}" class="btn">Object Identification Game</a>
      <a href="{{ route('math_game') }}" class="btn">Mathemathics Game</a>
      <a href="{{ route('puzzle_game') }}" class="btn">Word Puzzle Game</a>
      <!-- Add more game links here if needed -->
    </div>
  </div>
</body>
</html>
