<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="display: flex; justify-content: center; align-items: center; min-height: 100vh;">
        <div
            style="background: #6c757d; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); max-width: 500px; width: 100%; margin: 50px; padding: 30px;">
            <div style="text-align: center;">
                <h1 style="color: #007bff; font-size: 2rem; font-weight: bold; margin-bottom: 30px;">TRIEHANS VILLAGE
                    TANJUNG</h1>
                <img src="https://asset.kompas.com/crops/pAGeDi1BabYIehHZcV7EowgHclg=/0x0:600x400/750x500/data/photo/2022/08/10/62f354bf8b8c3.jpeg"
                    style="border-radius: 10px 10px 0 0; max-height: 200px; object-fit: cover; width: 100%;">

                <h1 style="color: #007bff; font-size: 2rem; font-weight: bold; margin-bottom: 30px;">Reset Password</h1>
                <p style="font-size: 1.2rem; color: #ffffff; margin-bottom: 20px;">Klik link dibawah ini untuk melakukan
                    reset password:</p>
                <div class="btn-xs">
                    <a href="{{ route('password.ubahsandi', ['token' => $token]) }}"
                        style="background: linear-gradient(45deg, #007bff, #00d4ff); border: none; border-radius: 20px; color: white; padding: 10px; font-size: 1rem; text-decoration: none; display: inline-block; text-align: center; transition: background 0.3s ease; min-width: 150px;">Reset
                        Password</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
