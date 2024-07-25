@csrf
<tr>
    <td colspan="2">
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Seleccione archivo</label>
        </div>
    </td>
</tr>
<tr>
    <th>Titulo</th>
    <td><input type="text" name="titulo" value="{{old('titulo', $servicio->titulo)}}"></td>
</tr>

<tr>
    <th>Descripcion</th>
    <td><input type="text" name="descripcion" value="{{old('descripcion', $servicio->descripcion)}}"></td>
</tr>

<tr>
    <td colspan="2" align="center"><button  class="btn btn-primary">{{$btnText}}</button></td>
</tr>