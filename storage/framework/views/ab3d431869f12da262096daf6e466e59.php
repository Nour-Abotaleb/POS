
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
        }
        .icon {
            font-size: 50px;
            color: #aaa;
        }
        h2 {
            margin-top: 10px;
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 20px;
        }
        .retry-button {
            background-color: lavender;
            color: #000;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .retry-button:hover {
            background-color: #e6e6fa;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="icon">☁️</div>
        <h2><?php echo app('translator')->get('app.offlineMessage'); ?></h2>
        <p><?php echo app('translator')->get('app.loadPage'); ?></p>
        <button class="retry-button" onclick="location.reload()"><?php echo app('translator')->get('app.RetryConnection'); ?></button>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\script\resources\views\offline.blade.php ENDPATH**/ ?>