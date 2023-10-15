{include file="templates/header.tpl"}

<div class="container-fluid w-100 d-flex justify-content-center">
    <div>
        <h1> EDITAR Y BORRAR NOTICIAS</h1>
        <table class="my-4 table">
            <thead>

                <tr>
                    <th class="col">Noticia</th>
                    <th class="col">Autor</th>
                    {if $isAdmin}
                        <th class="col"> BORRAR</th>
                        <th class="col">EDITAR</th>
                    {/if}


                </tr>

            </thead>

            <p class="lead">{$aviso}</p>
            {foreach from=$tablaNoticias item=item}
                <form class="form-alta" action="editarnoticia/{$item->id_noticia}" method="POST">

                    <tr>
                        <td><input class="form-control" type="text" name="titulo" value="{$item->titulo}"></td>
                        <td><input class="form-control" type="number" name="autor" value="{$item->autor}"></td>
                        {if $isAdmin}
                            <td><a class="btn btn-primary" id="borrar" href="borrarnoticia/{$item->id_noticia}">borrar</a></td>
                            <td><button type="submit" class="btn btn-primary">editar</button></td>
                        {/if}
                </form>
                </tr>
            {/foreach}
        </table>
    </div>

</div>

<a href="noticias" class="volver">VOLVER</a>

{include file="templates/footer.tpl"}