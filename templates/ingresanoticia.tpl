{include file='templates/header.tpl'}
  {* AGREGAR NOTICIA *}
<div class="container d-flex justify-content-center">
    <div class="m-3 w-25">
        <h2>AGREGAR NOTICIA</h2>
        <form class="form-alta" action="agregar-noticia" method="post"> 
            <div class="col-auto mb-2">
                <input class="form-control" placeholder="Titulo.." type="text" name="titulo" id="titulo" >
            </div>
            <div class="col-auto mb-2">
                <input class="form-control" placeholder="autor.." type="text" name="autor" id="autor" >
            </div>
        {if $isAdmin} 
        <input type="submit" class="btn btn-primary">
    {/if}
        </form>
        {* <p>{$aviso}</p> *}
    </div>
</div>
<p>{$aviso}</p>
<a href="noticias" class="volver">VOLVER</a>
{include file='templates/footer.tpl'}