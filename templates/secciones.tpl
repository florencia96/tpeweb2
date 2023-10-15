{include file='templates/header.tpl'}

<div class="container-fluid container d-flex justify-content-center">
<div class="w-25 mt-4 container-lg">
{if $mostrarTodo}
   
    <h1 class="display-5">{$titulo_noticia}</h1>
    
{else}
    <h1 class="display-5">Secciones</h1>
{/if}    
    <ul class="list-group">
        {foreach from=$secciones item=$seccion}
            <li class="list-group-item mb-4"><a href="detalle/{str_replace(' ', '-', $seccion->tipo)|lower}/{$seccion->id_seccion}">{$seccion->tipo}</a></li>
        {/foreach}
    </ul>
    </div>
</div>
<a href="noticias" class="volver">VOLVER</a>
{include file='templates/footer.tpl'}