<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f9f9f9;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        a,
        button {
            padding: 6px 12px;
            margin: 2px;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn {
            background: #007bff;
            color: #fff;
            border: none;
        }

        .btn-danger {
            background: #dc3545;
            color: #fff;
            border: none;
        }

        .btn-secondary {
            background: #6c757d;
            color: #fff;
            border: none;
        }

        form {
            display: inline;
        }

        input,
        select {
            padding: 6px;
            margin: 4px 0;
            width: 100%;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>

</html><?php /**PATH /opt/lampp/htdocs/week08_wor/app/views/layouts/master.blade.php ENDPATH**/ ?>