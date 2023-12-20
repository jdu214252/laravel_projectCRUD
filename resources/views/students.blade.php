<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
           table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #333;
            font-family: Arial, sans-serif;
        }

        th, td {
            text-align: left;
            padding: 10px;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td {
            border: 1px solid #ddd;
        }

        a{
            color: black;
            text-decoration: none;

        }
        /* a:hover{
            color: red;
            text-decoration: none;

        } */

        .con{
            max-width: 1400px;
            margin: 0 auto;
        }
        h1{
            text-align: center;
        }

        .goToCreate{
            margin-bottom: 9.4px;
        }

        .goTo{
            background-color: #32CD32;  
            padding: 10px 20px;   
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            transition: background-color 0.3s;
            font-size: 1.2rem;
        }
        .goTo:hover{
            background-color: #008000;  
            color: white;
        }

        /* div a{

            border: 1px solid silver;
            border-radius: 10px;
            padding: 5px;
        } */

        .flex{
            display: flex;
        }
        
        .delete{
            background-color: #FF5733;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-left: 10px;
            border: none;
            font-size: 0.9rem;
        }

        .delete:hover{
            background-color: #B22222;
            cursor: pointer;
        }

        .edit{
            background-color: #FFC300;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            border: none;
        }
        
        .edit:hover{
            background-color: #DAA520;  
        }

        .alert-success {
            background-color: #9ff0b2;
            border: 1px solid #c3e6cb;
            color: #000000;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            font-size: 1.2rem;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
    </style>
<body>

 @if (session('success'))
    <div class="alert alert-success" id="success-message">
        {{ session('success') }}
    </div>
@endif 

<br>
<br>

    <h1>Talabalar ro'yxati</h1>
    <br><br>    
    <div class="con">
    <div class="goToCreate"><a class="goTo" href="{{route('students.create')}}">Go to Create +</a> </div> 
    <table>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>sourname</th>
            <th>img</th>
            <th>operation</th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td><?php echo $student->student_id?></td>
            <td><?php echo $student->ism?></td>
            <td><?php echo $student->familiyasi?></td>
            <td><img src="{{ asset('storage/uploads/' . $student->file_name) }}" alt="Student Image" style="max-width: 100px;"></td>



            <td class="flex">
                <a class="edit" href="{{ route('students.edit', ['id' => $student->id]) }}">Edit</a>
                
                    <form action="{{route('students.delete', ['id' => $student->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit">Delete</button>
                        
                    </form>
                    {{-- <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->name }}"> --}}

            </td>

            
        </tr>
        @endforeach
    </table>
</div>

<script>
    var successAlert = document.getElementById('success-message');
    setTimeout(function() {
        successAlert.style.display = 'none';
    }, 2000);
</script>

</body>
</html>