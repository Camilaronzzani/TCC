<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-gray-200 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
        <h1 class="text-2xl font-semibold mb-6">Login</h1>
        <form action="{{ route('login') }}" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="form-input mt-1 block w-full" required
                    autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="form-input mt-1 block w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Login</button>
            <a href="cadastro" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Fazer o Cadastro</a>
        </form>
    </div>
</body>

</html>
