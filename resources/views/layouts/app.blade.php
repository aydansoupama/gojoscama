<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flambeur Scama - @yield("title", "Default Title")</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite('resources/css/app.scss')
</head>
<body>
  @yield("content")
  <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>