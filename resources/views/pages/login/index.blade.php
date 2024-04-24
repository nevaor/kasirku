<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .login-container {
            max-width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form class="row g-3 needs-validation" action="{{ route('login.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label for="" class="form-label">E-mail</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" name="email" class="form-control" required>
                    <!-- <div class="invalid-feedback">Please enter your e-mail.</div> -->
                </div>
            </div>

            <div class="col-12">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
                <!-- <div class="invalid-feedback">Please enter your password!</div> -->
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>
        </form>


    </div>
</body>
</html>
