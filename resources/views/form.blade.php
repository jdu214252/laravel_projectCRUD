<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>Create Students</h1>

    <div class="container">

    <form action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <label for="">Talaba id: </label>
        <input type="text" name="student_id">
        <br>
        <label for="">Talaba ismi: </label>
        <input type="text" name="ism">
        <br>
        <label>Talaba familiyasi: </label>
        <input type="text" name="familiyasi">
        <br>
        <br>
        <input type="file" name="file">
        <br>
        <br>
        <input type="submit" value="Jonatish">

    </form>
</div>
</body>
</html>