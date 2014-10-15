{{-- describe.blade.php --}}
{{-- Simply render this as a partial or as it's own View! --}}
<?php
  $database_name = "meadowcampus";
  $table_headers = array( 'Field', 'Type', 'Null', 'Key', 'Default', 'Extra' );
  $selects = array( 'column_name as Field', 'column_type as Type', 'is_nullable as Null', 'column_key as Key', 'column_default as Default', 'extra as Extra' );
?>
@foreach( DB::query('select table_name from information_schema.tables where table_schema="' . $database_name . '"' ) as $key => $value )
  <?php
    /* SELECT `column_name` AS `Field`, `column_type` AS `Type`, `is_nullable` AS `Null`, 
     * `column_key` AS `Key`, `column_default` AS `Default`, `extra` AS`Extra`
     * FROM `information_schema`.`columns`
     * WHERE `table_schema` = my_database AND `table_name` = my_table
     */
    $table_describes = DB::table( 'information_schema.columns' )
      ->where( 'table_schema', '=', $database_name )
      ->where( 'table_name', '=', $value->table_name )
      ->get( $selects );
    ?>
    <h4> {{ Str::title( $value->table_name ) }} <small>table</small> </h4>
    <table class="table table-bordered table-condensed">
      <thead>
        <tr>
          @foreach( $table_headers as $table_headers_key => $table_headers_value )
            <th> {{ Str::title( $table_headers_value ) }} </th>
          @endforeach
        </tr>
      </thead>
    <tbody>
      @foreach( $table_describes as $key => $value )
        <tr>
          @foreach( $value as $k => $v )
            <td>
             @if( $v == "" )
                <h6> {{ "none" }} </h6>
             @else
                {{ $v }}
             @endif
            </td>
          @endforeach
        </tr>
      @endforeach
    </tbody>
  </table>
@endforeach