<!DOCTYPE html>
<html dir="ltr">

<head>
    <title>Add Book</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
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

        .page {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 60px 40px;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 40px;
            width: 100%;
            max-width: 480px;
        }

        h3 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 22px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border 0.2s;
        }

        input:focus {
            border-color: #3498db;
        }

        .btn-save {
            width: 100%;
            background: #3498db;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-save:hover {
            background: #2980b9;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #888;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-back:hover {
            color: #333;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Add Book</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </div>

    <div class="page">
        <div class="card">
            <h3>Add new book</h3>

            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Book Title</label>
                    <input type="text" name="title">
                </div>

                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author">
                </div>

                <div class="form-group">
                    <label>Year of publication</label>
                    <input type="number" name="year_published">
                </div>

                <button type="submit" class="btn-save">Save</button>
            </form>

            <a href="{{ route('books.index') }}" class="btn-back">Back</a>
        </div>
    </div>

</body>

</html>
