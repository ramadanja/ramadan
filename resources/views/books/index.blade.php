<!DOCTYPE html>
<html dir="ltr">

<head>
    <title>Books</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #333;
            min-height: 100vh;
        }

        .navbar {
            background: white;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            margin-bottom: 40px;
        }

        .navbar h2 {
            color: #2c3e50;
            font-size: 20px;
        }

        .btn-logout {
            background: #e74c3c;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-logout:hover {
            background: #c0392b;
        }

        .content {
            padding: 0 40px 40px 40px;
        }

        .btn-add {
            background: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-add:hover {
            background: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        th {
            background: #2c3e50;
            color: white;
            padding: 14px 16px;
            text-align: left;
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #f8f9fa;
        }

        .btn-edit {
            background: #2ecc71;
            color: white;
            padding: 6px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-edit:hover {
            background: #27ae60;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
            padding: 6px 14px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-delete:hover {
            background: #c0392b;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        form {
            margin: 0;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Books</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>

    <div class="content">

        <a href="{{ route('books.create') }}" class="btn-add">Add Book</a>

        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>

            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year_published }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn-edit">Edit</a>

                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>

</body>

</html>
