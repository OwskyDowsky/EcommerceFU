<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recibo de Productos</title>
    <style>
        /* Estilos para el recibo */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .recibo-container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
        }

        .info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .info .campo {
            font-size: 14px;
            color: #555;
        }

        .tabla-productos {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .tabla-productos th, .tabla-productos td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .tabla-productos th {
            background-color: #f7f7f7;
        }

        .tabla-productos td.precio {
            text-align: right;
        }

        .total {
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            margin-top: 20px;
            font-weight: bold;
        }

        .total .campo {
            font-size: 18px;
        }

        .pie {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

        /* Estilo para el mensaje de "Anulado" */
        .anulado {
            color: red;
            padding: 10px;
            text-align: center;
            font-size: 58px;
            font-weight: bold;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translateX(-50%);
            te
        }

        /* Contenedor del mensaje "Anulado" */
        .cont-anu {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            z-index: 999;  /* Asegura que el mensaje quede encima del contenido */
        }
    </style>
</head>
<body>

    <!-- Si el estado es "anulado", mostramos el mensaje -->
    <div class="cont-anu">
        @if ($venta->estado == 'anulado')
            <div class="anulado">ANULADO {{$venta->fecha_anulacion}}</div>
        @endif
    </div>

    <div class="recibo-container">
        <h1>Recibo de Triqui o Trueque</h1>

        <!-- Información del comprador y tienda -->
        <div class="info">
            <div class="campo">
                <strong>Fundacion Unifranz:</strong>
                <br> Calle campos N. 334 Edificio Iturri entre 20 de octubre y 6 de agosto<br>
                La Paz, Bolivia
            </div>
            <div class="campo">
                <strong>Cliente:</strong><br>
                {{$venta->clientes->nombre}} {{$venta->clientes->apellido}}<br>
                {{$venta->clientes->cod_estudiante}}
            </div>
        </div>

        <!-- Tabla de productos -->
        <table class="tabla-productos">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th class="precio">Precio</th>
                    <th class="precio">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($venta->items as $item)
                    <tr>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->qty}}</td>
                        <td class="precio">{{$item->precio}}</td>
                        <td class="precio">{{$item->precio * $item->qty}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">SIN REGISTROS</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Total -->
        <div class="total">
            <div class="campo">Cupon:</div>
            <div class="campo">{{$venta->cupones->nombre ?? 'sin cupon'}}</div>
            <div class="campo">{{$venta->cupones->descuento ?? 'sin cupon'}} %</div>
        </div>
        <div class="total">
            <div class="campo">Total:</div>
            <div class="campo">{{$venta->total}}</div>
        </div>

        <!-- Pie de página -->
        <div class="pie">
            Gracias por tu donacion. ¡Vuelve pronto!
            <br>
            {{$venta->fecha}}
        </div>
    </div>

</body>
</html>
