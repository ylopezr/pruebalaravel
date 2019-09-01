@extends('layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card">
  <div class="card-header"> Listado de  Usuarios </div>
  <div class="card-body">
<button class="btn btn-info" data-toggle="modal" data-target="#myModal">Crear Usuario</button>    
<div class="table-responsive">
  	<table class="table" id="user_table">
  <thead>
   <tr> 
   <th>Nombres</th>
   <th>Apellidos</th>
   <th>Cedula</th>
   <th>Correo</th>
   <th>Telefono</th>
   <th>Editar</th>
   <th>Eliminar</th>
   </tr>   
  </thead>  
  <tbody>
     <tr ng-repeat="U in usuarios">
    <td><{U.nombres}></td>
    <td><{U.apellidos}></td>
    <td><{U.cedula}></td>
    <td><{U.correo}></td>
    <td><{U.telefono}></td>
    <td><button class="btn btn-warning" ng-click="edit(U.idusuarios)">EditarUsuario</button></td>
    <td><button class="btn btn-danger" ng-click="delete(U.idusuarios)">EliminarUsuario</button></td>     
     </tr> 
  </tbody>   

 </table>
  </div>
  </div> 
  <div class="card-footer"></div>
</div>
 
 @endsection



 <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <{-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
         Creacion de  usuarios
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
   
      <form  id="registrarUsuarios">
  <div class="form-group">
    <label for="">Nombres</label>
    <input type="text" class="form-control" id="nombres" name='nombres' placeholder="Enter nombres">
    </div>
  <div class="form-group">
    <label for="">Apellidos</label> 
    <input type="text" class="form-control" id="apellidos" name='apellidos' placeholder="Enter apellidos">
  </div>
  
   <div class="form-group">
    <label for="">Cedula</label>
    <input type="text" class="form-control" id="cedula" name='cedula' placeholder="Enter cedula">
  </div>

  <div class="form-group">
    <label for="">Correo</label>
    <input type="text" class="form-control" id="correo" name='correo' placeholder="Enter correo">
  </div>

  <div class="form-group">
    <label for="">Telefono</label>
    <input type="text" class="form-control" id="telefono" name='telefono' placeholder="Enter Telefono">
  </div>

</form>

 </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" ng-click="CrearUsuario()">Agregar Usuario  </button>
        
      </div>
    </div>

  </div>
</div>







<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	  Edicion de usuarios
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body" id="contenido">
       


      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" ng-click="update()">Actualizar usuario </button>
        
      </div>
    </div>

  </div>
</div>