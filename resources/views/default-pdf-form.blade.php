<!DOCTYPE html>
<html>

<head>
  <title>Document Title: {{$doc_data->title}}</title>
</head>

<body>
    <h2 style="color:#003399" align="center">{{$doc_data->title}}</h2>

    <table>
      @forelse($doc_data->columns as $column)
        <tr>
          <td><b>{{$column->name}}</b></td>
          <td style="color:#ff9933; padding-left:50px" >{{$column->pivot->text}}</td>
        </tr>
      @empty
          <h4>no collumns to show</h4>
      @endforelse
    </table>

</body>

</html>