<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Document Management') ?></title>
</head>

<body class="h-full bg-gray-100 dark:bg-gray-900">
    <?= $content ?? '' ?>

    <script src="/public/assets/js/app.js"></script>
</body>

</html>