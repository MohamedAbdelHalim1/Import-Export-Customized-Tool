<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Import CSV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-top: 20px;
        }
        input[type="number"] {
            width: calc(20% - 12px);
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Review User</h1>

        <form action="{{ route('users.importPost') }}" method="POST">
            @csrf
            <input type="number" min="1" max="{{ count($file[0]) }}" step="1" required name="name" placeholder="Name Column Number*">
            <input type="number" min="1" max="{{ count($file[0]) }}" step="1" required name="phone" placeholder="Phone Column Number*">
            <input type="number" min="1" max="{{ count($file[0]) }}" step="1" required name="email" placeholder="Email Column Number*">
            <button type="submit">Submit</button>
        </form><br>

        <table>
            <thead>
                <tr>
                    @foreach($file[0] as $key => $value)
                        <th>{{ $value }}</th>
                    @endforeach
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($file as $key=>$value)
                    @if($key==0)
                        @continue
                    @endif
                <tr>
               
                @if (is_array($value))
                    @foreach ($value as $v)
                        <td>{{ $v }}</td>
                    @endforeach
                @else
                    <td>{{ $value }}</td>
                @endif
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</body>
</html>