{include file="templates/header.tpl"}

<div class="container-fluid w-100 d-flex justify-content-center">
    <div>

        <h1> EDITAR Y BORRAR SECCIONES</h1>
        <table class="my-4 table">
            <thead>

                <tr>


                    <th class="col">TIPO</th>
                    <th class="col">DESCRIPCION</th>
                    <th class="col">ORDEN</th>
                    <th class="col">NOTICIA</th>

                    {if $isAdmin}
                        <th class="col">borrar</th>
                        <th class="col">editar</th>
                    {/if}


                </tr>

            </thead>


            {foreach from=$tablaSecciones item=item}
                <form class="form-alta" action="editarseccion/{$item->id_seccion}" method="POST">
                    <tr style=text-align:center>

                        <td><input class="form-control" type="text" name="tipo" value="{$item->tipo}"></td>
                        <td><input class="form-control" type="text" name="descripcion" value="{$item->descripcion}"></td>
                        <td><input class="form-control" type="int" name="orden" value="{$item->orden}"></td>
                        <td><input class="form-control" type="number" name="id_noticia" value="{$item->id_noticia}"></td>
                        {if $isAdmin}
                            <td><a class="btn btn-primary" href="borrarseccion/{$item->id_seccion}">borrar</a></td>
                            <td><button type="submit" class="btn btn-primary">editar</button></td>
                        {/if}
                    </tr>
                </form>

            {/foreach}

        </table>

    </div>
</div>
<a href="noticias" class="volver">VOLVER</a>
{include file="templates/footer.tpl"}