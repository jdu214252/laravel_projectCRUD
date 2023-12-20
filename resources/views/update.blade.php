<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style> 
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 96%;
            padding: 10px;
            border: 2px solid #3498db;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        input:focus {
            outline: none;
            border-color: #e74c3c;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #e74c3c;
        }

        h1{
            text-align: center;
            margin: 50px 0 50px 0; 
        }
    </style>
</head>
<body>
    <h1>Edit Student</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-container">
    
        <form method="POST" action="{{ route('students.update', ['id' => $student->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" name="student_id" value="{{ $student->student_id }}" required>
            </div>

            <div class="form-group">
                <label for="ism">Name:</label>
                <input type="text" name="ism" value="{{ $student->ism }}" required>
            </div>
            
            <div class="form-group">
                <label for="familiyasi">Last Name:</label>
                <input type="text" name="familiyasi" value="{{ $student->familiyasi }}" required>
            </div>

            <div class="form-group">
                <label for="photo">Avatar:</label>
                <img src="{{ asset('storage/uploads/' . $student->file_name) }}" alt="updateImage" style="max-width: 100px;" class="avatar">
                <input type="file" name="file">
            </div>
            
            <button type="submit">Update Student</button>
            
        </form>
    </div>
</body>
</html>
