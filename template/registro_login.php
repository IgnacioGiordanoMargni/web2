
<div class="form-box">
    <h1>Iniciar Sesion/ Registrarse</h1>
    <div>
        <form required action="agregar_usuario" method="POST">
        <label>Mail</label>
        <input required name="Mail" type="text">
        <label>Nombre_usuario</label>
        <input required name="Nombre" type="text" rows=3></input>
        <label>Contraseña</label>
        <input required name="Contraseña" type="text" rows=3></input>
        <button class="boton-form" type="submit">Registrarse</button>
    </form>

    <form required action="logueo" method="POST">
        <label>"Mail"</label>
        <input name="Mail" type="text">
        <label>"Contraseña"</label>
        <input name="Contraseña" type="text"></input>
        <button class="boton-form" type="submit">Ingresar</button>
    </form>
</div>
</div>