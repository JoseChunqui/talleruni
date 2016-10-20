@extends('layoutCatalogo')
@section ('titulo')
  Sandwiches Don Kike
@stop 
@section('contenido')
<div class="container-fluid">
        <div class="col-sm-3"><nav>
              <div class="list-group">
                <a href="#" class="list-group-item">Promociones de Delivery</a>
                <a href="#" class="list-group-item">Sandwiches</a>
                <a href="#" class="list-group-item">Combos</a>
              </div>
        </nav></div>
        <div class="col-sm-9">
            <article>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><img src="Imagenes\sandwich1.jpg" alt="Logo empresa" width="300px" height="300px"></td>
                        <td >
                            <h3>Jamon y queso</h3>
                            <p class="Justificar">Una de las recetas más famosas: jamón y queso. Simplemente tenés que combinar fetas de jamón cocido y queso. Hacé dos capas alternadas de cada ingrediente y entre el jamón y el pan agregá mayonesa a gusto. Podés tostarlo unos minutos hasta que se derrita el queso y queda mucho mejor. Una variable que queda genial es reemplazar el queso común por queso cheddar mmmm..</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <center><button type="button" class="btn btn-default">Anadir al carrito</button>
                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal2">Modificar sandwich</button>
                  <button type="button" class="btn btn-default" onClick="location.href='/';">Regresar</button></center>
                  <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modificar Producto</h4>
                        </div>
                        <div class="modal-body">
                        <h5>Producto: Jamon y queso</h5>
            <table class="table table-striped">
            <thead>
              <tr>
                <th colspan="4">Ingredientes actuales</th>
                <th colspan="4">Ingredientes disponibles</th>
              </tr>
                <tr>
                <th >Imagen</th>
                <th >Producto</th>
                <th >Precio</th>
                <th >Cantidad</th>
                <th >Imagen</th>
                <th >Producto</th>
                <th >Precio</th>
                <th >Cantidad</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><img src="Imagenes\jamon.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                <td>
                    <label class="checkbox-inline">
                    <input type="checkbox" value="">Jamon
                    </label>  
                </td>
                <td>2.0</td>
                <td>
                    <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>  
                </td>
                <td><img src="Imagenes\atun.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                <td>
                    <label class="checkbox-inline">
                    <input type="checkbox" value="">Atun
                    </label>  
                </td>
                <td>2.0</td>
                <td>
                    <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>  
                </td>
              </tr>
              <tr>
                <td><img src="Imagenes\queso.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                <td>
                    <label class="checkbox-inline">
                    <input type="checkbox" value="">Queso
                    </label>  
                </td>
                <td>2.0</td>
                <td>
                    <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>  
                </td>
                <td><img src="Imagenes\choclo.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                <td>
                    <label class="checkbox-inline">
                    <input type="checkbox" value="">Choclo
                    </label>  
                </td>
                <td>2.0</td>
                <td>
                    <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>  
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><img src="Imagenes\lechuga.jpg" alt="Pulpit Rock" style="width:50px;height:50px"></td>
                <td>
                    <label class="checkbox-inline">
                    <input type="checkbox" value="">Lechuga
                    </label>  
                </td>
                <td>2.0</td>
                <td>
                    <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>  
                </td>
              </tr>
            </tbody>
          </table>
        <p>Precito total: </p><div class="well well-sm">16</div>
        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal">Anadir al carrito</button>  
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar pedido</button>

                        </div>
                      </div>

                    </div>
  </div>
            </article>
        </div>
</div>
@stop