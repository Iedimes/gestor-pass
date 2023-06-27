<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Restablecer contraseña</title>
</head>
<body style="font-family: 'Montserrat', sans-serif; font-size: 16px; line-height: 1.6; color: #333; background-color: #ffffff;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #ffffff;">
        <tr>
            <td align="center">
                <table width="600" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 0px 10px #ccc; background-color: #ffffff;">
                    <tr>
                        <td align="center" style="padding: 40px;">
                            <h1 style="font-size: 36px; font-weight: bold; color: #333; margin-bottom: 30px; text-align: center; text-shadow: 1px 1px 0 #ddd;">Nueva Credencial</h1>
                            {{-- <p style="font-size: 20px; color: #333; margin-bottom: 20px; text-align: center;">Recuperación de contraseña</p> --}}
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#f7dc6f" style="padding: 20px; border-radius: 5px; box-shadow: 1px 1px 0 #ccc;">
                                        <p style="margin-bottom: 20px; text-align: justify; text-justify: inter-word; color: #555;">Está recibiendo este correo electrónico porque hemos recibido una solicitud para restablecer la contraseña del segundo factor del Sistema de Gestión de Credenciales.</p>
                                        <p style="margin: 0; font-weight: bold;">Su nueva Contraseña es: <span style="color: #333;">{{ $nuevaContraseña }}</span></p>
                                    </td>
                                </tr>
                            </table>
                            <p style="font-size: 14px; color: #666; margin-top: 20px; text-align: center;">Este mensaje ha sido enviado desde el sistema de gestion de credenciales. Si tiene alguna pregunta o problema, por favor contáctenos en <a href="mailto:recuperacion@muvh.gov.py" style="color: #007bff; text-decoration: none;">recuperacion@muvh.gov.py</a> <br>MUVH - DGTIC</p>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
