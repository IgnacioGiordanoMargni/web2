<form required action="agregar_usuario" method="POST" class="my-4">
    <label>"titulo"</label>
    <input name="title" type="text">
    <label>"prioridad"</label>
    <select required name="priority">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
</select>
    <label>"descripcion"</label>
    <input name="description" type="text" rows=3></input>
    <button type="submit">guardar</button>
</form>