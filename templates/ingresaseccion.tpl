{include file='templates/header.tpl'}
<div class="container d-flex justify-content-center">
    <div class="m-3 w-25">
           <h2>AGREGAR SECCION</h2>
            <form class="form-alta" action="agregar-seccion" method="POST"> 
                <div class="col-auto mb-2">
                    <input placeholder="tipo" type="text" name="tipo" id="tipo" required>
                </div>
                <div class="col-auto mb-2">
                   <input placeholder="descripcion" type="text" name="descripcion" id="descripcion" required>
                </div>
                <div class="col-auto mb-2">
                   <input placeholder="orden" type="int" name="orden" id="orden" required>
                </div>
                <select class="custom-select mb-2 col-7" name="id_noticia">
                    {foreach $noticias as $noticia}
                       <option value="{$noticia->id_noticia}">{$noticia->titulo}</option>
                    {/foreach}
                </select>
                <br>
              {if $isAdmin} 
             <input type="submit" class="btn btn-primary">
             {/if} 
            </form>
    </div>

</div>
<a href="noticias" class="volver">VOLVER</a>
{include file="templates/footer.tpl"}
  