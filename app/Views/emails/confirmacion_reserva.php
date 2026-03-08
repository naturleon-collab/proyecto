<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #333; line-height: 1.6; margin: 0; padding: 0; }
        .container { width: 100%; max-width: 600px; margin: 20px auto; border: 1px solid #eee; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .header { background-color: #003580; color: #ffffff; padding: 40px 20px; text-align: center; }
        .content { padding: 30px; background-color: #ffffff; }
        .folio-box { background-color: #f8f9fa; border-left: 5px solid #003580; padding: 15px; margin: 20px 0; }
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table td { padding: 12px 10px; border-bottom: 1px solid #f0f0f0; vertical-align: top; }
        .table td.label { font-weight: bold; color: #666; width: 35%; font-size: 14px; text-transform: uppercase; }
        .guest-badge { background-color: #e9ecef; padding: 2px 8px; border-radius: 4px; font-size: 13px; margin-right: 5px; display: inline-block; }
        .footer { background-color: #f1f1f1; padding: 20px; text-align: center; font-size: 12px; color: #888; }
        .btn { background-color: #003580; color: #ffffff !important; padding: 12px 25px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 20px; font-weight: bold; }
        .total-row { background-color: #fcfcfc; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin:0; font-size: 28px;">¡Reserva Confirmada!</h1>
            <p style="margin: 10px 0 0; opacity: 0.9;">Todo está listo para tu viaje</p>
        </div>
        <div class="content">
            <h2 style="color: #003580;">Hola, <?= $res['nombre_cliente_reservacion'] ?></h2>
            <p>Es un placer confirmarte que tu reservación en <strong><?= $res['nombre_hotel'] ?></strong> ha sido procesada con éxito a través de <strong>Naturleón</strong>.</p>
            
            <div class="folio-box">
                <span style="font-size: 12px; color: #666; text-transform: uppercase; letter-spacing: 1px;">Folio de Reservación</span><br>
                <strong style="font-size: 26px; color: #003580;"><?= $res['folio_reservacion'] ?></strong>
            </div>

            <table class="table">
                <tr>
                    <td class="label">Hotel:</td>
                    <td><strong><?= $res['nombre_hotel'] ?></strong></td>
                </tr>
                <tr>
                    <td class="label">Habitación:</td>
                    <td><?= $res['nombre_habitacion'] ?> (<?= $res['numero_habitaciones_reservacion'] ?> unidad/es)</td>
                </tr>
                <tr>
                    <td class="label">Plan:</td>
                    <td><?= $res['nombre_tipo_plan'] ?></td>
                </tr>
                <tr>
                    <td class="label">Estancia:</td>
                    <td>
                        <?= date('d/m/Y', strtotime($res['llegada_reservacion'])) ?> al <?= date('d/m/Y', strtotime($res['salida_reservacion'])) ?>
                        <br><span style="color: #003580; font-size: 13px; font-weight: bold;"><?= $res['noches'] ?> Noches de hospedaje</span>
                    </td>
                </tr>
                <tr>
                    <td class="label">Huéspedes:</td>
                    <td>
                        <span class="guest-badge"><?= $res['adultos_reservacion'] ?> Adultos</span>
                        <?php if($res['menores_reservacion'] > 0): ?>
                            <span class="guest-badge"><?= $res['menores_reservacion'] ?> Menores</span>
                            <?php if(!empty($res['edades_reservacion'])): ?>
                                <div style="font-size: 12px; color: #888; margin-top: 5px;">Edades: <?= $res['edades_reservacion'] ?></div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php if(!empty($res['comentarios_reservacion'])): ?>
                <tr>
                    <td class="label">Observaciones:</td>
                    <td style="font-style: italic; font-size: 13px; color: #555;"><?= $res['comentarios_reservacion'] ?></td>
                </tr>
                <?php endif; ?>
                <tr class="total-row">
                    <td class="label" style="padding-top: 20px; color: #333;">Total Pagado:</td>
                    <td style="padding-top: 20px; color: #28a745; font-size: 20px; font-weight: bold;">
                        $<?= number_format($res['total_reservacion'], 2) ?> <span style="font-size: 12px;">MXN</span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p><strong>Naturleón Notificaciones</strong></p>
            <p>&copy; <?= date('Y') ?> Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>