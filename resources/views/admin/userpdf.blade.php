<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row">
            <h2 style="margin-left: 12px; margin-top:5px;"> Laporan tabel user<h2>
            <div class="form-group text-left" style="margin-top:10px" >
            </div>
        </div>
        <table class="table table-hover" style="text-align:center;" border="1">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Role </th>
            <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($user as $eh)
            <tr>
            <th scope="row">{{ $eh->id }}</th>
            <td>{{ $eh->name }}</td>
            <td>{{ $eh->role }}</td>
            <td>{{ $eh->email}}</td>
    
            


            
            </tr>
        </tbody>
        @endforeach
        </table>
</body>
</html>