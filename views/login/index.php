<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="public/css/login.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Roboto', sans-serif;
            background: #28a745; /* Fondo verde */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .container {
            background-color: white;
            padding: 40px 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .logo-container {
            position: relative;
            margin-bottom: 20px;
        }

        .logo {
            width: 80px;
            margin-bottom: 20px;
        }

        .credit-button {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .login-box h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .login-box p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .textbox {
            position: relative;
            margin-bottom: 20px;
        }

        .textbox input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 30px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border 0.3s ease;
        }

        .textbox input:focus {
            border-color: #28a745; /* Verde */
            outline: none;
        }

        .btn {
            width: 100%;
            background: #28a745; /* Verde */
            color: white;
            padding: 15px;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838; /* Verde más oscuro */
        }

        .footer {
            margin-top: 20px;
        }

        .footer a {
            color: #092852; /* Verde */
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            z-index: 1000;
            max-width: 90%;
            width: 300px;
            text-align: center;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .popup h3 {
            margin-top: 0;
            font-size: 20px;
            color: #333;
        }

        .popup p {
            margin: 10px 0;
            color: #666;
        }

        .popup ul {
            list-style-type: none;
            padding: 0;
        }

        .popup ul li {
            margin: 5px 0;
            color: #333;
        }

        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #aaa;
        }

        .popup-close:hover {
            color: #000;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            .login-box h2 {
                font-size: 20px;
            }

            .btn {
                font-size: 14px;
                padding: 12px;
            }

            .textbox input {
                font-size: 14px;
                padding: 12px;
            }

            .popup {
                width: 90%;
                padding: 10px;
            }

            .popup h3 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="logo-container">
        <img src = "assets/Logo-Sena.jpg" alt="logo" class="logo">
        <button class="credit-button" onclick="showPopup()"></button>
    </div>
    <div class="login-box">
        <h2>Bienvenido al Sistema de Gestión y Control de Ambientes de Formación CDM</h2>
        <p>Por favor, ingrese su correo y clave para acceder al sistema.</p>
        <form action="/dashboard/gestion%20de%20ambientes/login/login" method="POST">
                <div class="textbox">
                    <input type="text" id="login" name="login" placeholder="Correo" required>
                </div>
                <div class="textbox">
                    <input type="password" id="password" name="password" placeholder="Clave" required>
                </div>
                <input type="submit" class="btn" value="Ingresar">
                <div class="footer">
                    <a href="#">Recuperar contraseña</a>
                </div>
            </form>
    </div>
    <div id="instrucciones" style="margin-top: 30px; text-align: center; padding: 10px; background-color: #f9f9f9; border-radius: 10px; width: 100%;">
        <h3 style="font-size: 16px; margin: 10px 0; color: #333;">Instrucciones de Ingreso</h3>
        <p style="font-size: 16px; color: #333;">Utilice la clave asignada para ingresar al sistema, asegúrese de que el aula de formación esté debidamente marcada.</p>
    </div>
    <div id="info-bd" style="margin-top: 20px; text-align: center; padding: 10px; background-color: #f9f9f9; border-radius: 10px; width: 100%;">
        <p style="font-size: 16px; color: #333;">Contiene información sobre ambientes de formación, computadores y reportes asociados a estos. Recuerde realizar cualquier novedad dentro del aplicativo.</p>
    </div>
</div>

<div class="popup" id="creditPopup">
    <button class="popup-close" onclick="hidePopup()">X</button>
    <h3>Créditos</h3>
    <p>Desarrollado por:</p>
    <ul>    
        <li>Carlos Antonio Ortiz - ficha 2562072</li>
        <li>Juan Infante Quiroga - ficha 2617546</li>
        <li>Julian Garcia Piñeros - ficha 2617546</li>
        <li>William Andrés Saavedra - ficha 2562072</li>
        <li>Fredy Leonardo Tovar - ficha 2562072</li>
        <li>Luis Enrique Arias - Instructor ADSO</li>
    </ul>
</div>

<script>

    function showPopup() {
        document.getElementById('creditPopup').style.display = 'block';
    }

    function hidePopup() {
        document.getElementById('creditPopup').style.display = 'none';
    }
</script>
</body>
</html>

