<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Stock
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
          <input type="hidden" value="{{ $model->stocks->count() }}" id="items">
          <table class="table table-hover table-condensed" id="tableStocks">
            <thead>
              <tr>
                <th>Almacén</th>
                <th>Stock</th>
                <th>Stock Mínimo</th>
                <th>Stock Máximo</th>
                <th>Valor</th>
              </tr>
            </thead>
            <tbody id="tbodyStocks">
              @foreach($model->stocks as $key => $stock)
              <tr data-id="{{ $stock->id }}">
                <input type="hidden" name="stocks[{{ $key }}][id]" value="{{ $stock->id }}">
                <input type="hidden" name="stocks[{{ $key }}][warehouse_id]" value="{{ $stock->warehouse_id }}">
                <td>{{ $stock->warehouse_id }}</td>
                <td>{{ $stock->stock }}</td>
                <td><input type="text" name="stocks[{{ $key }}][stock_min]" value="{{ $stock->stock_min }}" class="form-control input-sm"></td>
                <td><input type="text" name="stocks[{{ $key }}][stock_max]" value="{{ $stock->stock_max }}" class="form-control input-sm"></td>
                <td>{{ $stock->avarage_value }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Accesorios
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
          <input type="hidden" value="{{ $model->accessories->count() }}" id="accessories">
          <table class="table table-hover table-condensed" id="tableAccessories">
            <thead>
              <tr>
                <th>Código <button type="button" class="btn btn-default btn-sm" id="btnNewAccessory">Nuevo</button></th>
                <th>Accesorio</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tbodyAccessories">
              @php $i=0; @endphp
              @foreach($model->accessories as $key => $accessory)
              <tr data-id="{{ $accessory->id }}">
                {!! Form::hidden("details[$i][id]", $accessory->id, ['class'=>'','data-accessoryid'=>'']) !!}
                <td>{{ $accessory->accessory->intern_code }} </td>
                <td>{{ $accessory->accessory->name }} </td>
                <td>
                  <div class="checkbox"><label>{!! Form::checkbox('accessories['.$i.'][is_deleted]', null, false, ['class'=>'isDeleted', 'data-isdeleted'=>'']); !!} Eliminar</label></div>
                  <input type="hidden" name="accessories[{{ $key }}][accessory_id]" value="{{ $accessory->accessory_id }}">
                  <input type="hidden" name="accessories[{{ $key }}][id]" value="{{ $accessory->id }}">
                </td>
              </tr>
              @php $i++; @endphp
              @endforeach
              {!! Form::hidden('items-accessory', $i, ['id'=>'items-accessory']) !!}
            </tbody>
          </table>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Atributos
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
          <table class="table table-hover table-condensed" id="tableAttributes">
            <thead>
              <tr>
                <th>Nombre <button type="button" class="btn btn-default btn-sm" id="btnNewAttribute">Nuevo</button></th>
                <th>Valor</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tbodyAttributes">
              @php $i=0; @endphp
              @foreach($model->attributes as $key => $attribute)
              <tr data-id="{{ $attribute->id }}">
                {!! Form::hidden("details[$i][id]", $attribute->id, ['class'=>'','data-accessoryid'=>'']) !!}
                <td>{!! Form::text('attributes['.$i.'][name]', $attribute->name, ['class'=>"form-control input-sm"]) !!}</td>
                <td>{!! Form::text('attributes['.$i.'][value]', $attribute->value, ['class'=>"form-control input-sm"]) !!}</td>
                <td>
                  <div class="checkbox"><label>{!! Form::checkbox('attributes['.$i.'][is_deleted]', null, false, ['class'=>'isDeleted', 'data-isdeleted'=>'']); !!} Eliminar</label></div>
                  <input type="hidden" name="attributes[{{ $key }}][id]" value="{{ $accessory->id }}">
                </td>
              </tr>
              @php $i++; @endphp
              @endforeach
              {!! Form::hidden('items-attribute', $i, ['id'=>'items-attribute']) !!}
            </tbody>
          </table>

      </div>
    </div>
  </div>
</div>

            <template id="template-row-accessory">
              <tr data-id="">
                <td><span class='form-control input-sm text-right internCode' data-labelCode></span></td>
                <td>{!! Form::text('data1', null, ['class'=>'form-control input-sm txtAccessory', 'data-accessory'=>'', 'required'=>'required']); !!}</td>
                <td>
                  <div class="checkbox"><label>{!! Form::checkbox('is_deleted', null, false, ['class'=>'isDeleted', 'data-isdeleted'=>'']); !!} Eliminar</label></div>
                  {!! Form::hidden('data2', null, ['class'=>'accessoryId', 'data-accessoryid'=>'']); !!}
                </td>
              </tr>
            </template>

            <template id="template-row-attribute">
              <tr data-id="">
                <td>{!! Form::text('data1', null, ['class'=>'form-control input-sm txtName', 'data-name'=>'', 'required'=>'required']); !!}</td>
                <td>{!! Form::text('data2', null, ['class'=>'form-control input-sm txtValue', 'data-value'=>'', 'required'=>'required']); !!}</td>
                <td>
                  <div class="checkbox"><label>{!! Form::checkbox('is_deleted', null, false, ['class'=>'isDeleted', 'data-isdeleted'=>'']); !!} Eliminar</label></div>
                  {!! Form::hidden('data3', null, ['class'=>'attributeId', 'data-attributeid'=>'']); !!}
                </td>
              </tr>
            </template>