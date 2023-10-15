{include file='templates/header.tpl'}



<a href="secciones" class="m-3"><button type="button" class="btn btn-success">Ver secciones</button></a>

 {* {if $isAdmin }  *}
    <a href="tablanoticias" class="m-3"><button type="button" class="btn btn-success">Editar noticias</button></a>
    <a href="tablasecciones" class="m-3"><button type="button" class="btn btn-success">Editar secciones</button></a>
{* {/if}  *}
{* {if $rol == "true"} *}
    <a href="panel" class="m-3"><button type="button" class="btn btn-danger">Administrador</button></a>
{* {/if} *}
<a href="logout" class="m-3"><button type="button" class="btn btn-danger">Log Out</button></a>

{* {if $rol == "true"} *}
    <a href="agregarnoticia" class="m-3"><button type="button" class="btn btn-success">Agregar noticia</button></a>
    <a href="agregarseccion" class="m-3"><button type="button" class="btn btn-success">Agregar seccion</button></a>
{* {/if} *}

{* {if $logged == "false"} *}
    <a href="registro" class="m-3"><button type="button" class="btn btn-success">Registrarse</button></a>
    <a href="login" class="m-3"><button type="button" class="btn btn-warning">Log In</button></a>
{* {/if} *}

{foreach from=$noticias item=$noticia}
<div class="container w-75 d-flex flex-wrap my-2 mb-3">
    
        <div class="noticia mx-auto">
            <a href="noticia/{str_replace(' ', '-', $noticia->titulo)}/{$noticia->id_noticia}">
                <p>{$noticia->titulo}</p>
                <p> {$noticia->autor}</p>
            </a>
        </div>

    
</div>
{/foreach}
{include file='templates/footer.tpl'}