{include file="templates/header.tpl"}


<div class="container mt-2">


    <ul class="list-group">
      

        <li class="list-group-item mb-3">Tipo {$seccion->tipo}</li>
        <li class="list-group-item">Descripcion {$seccion->descripcion}</li>
        <li class="list-group-item">Orden {$seccion->orden}</li>
        <li class="list-group-item"> Noticia {$seccion->id_noticia}</li>

      
    </ul>
   
</div>
 
  <a href="noticia" class="volver">VOLVER</a>  
{include file="templates/footer.tpl"}