<form required action="agregar_usuario" method="POST" class="my-4">
    <label>Mail</label>
    <input required name="Mail" type="text">
    <label>"Nombre_usuario"</label>
    <input required name="Nombre" type="text" rows=3></input>
    <label>"Contraseña"</label>
    <input required name="Contraseña" type="text" rows=3></input>
    <button type="submit">Registrarse</button>
</form>

<form required action="entrar" method="POST" class="my-4">
    <label>"Mail"</label>
    <input name="Mail" type="text">
    <label>"Contraseña"</label>
    <input name="Contraseña" type="text"></input>
    <button type="submit">Ingresar</button>
</form>