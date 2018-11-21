
@extends('index')

@section('content')
{!!Form::open(['url'=>'insert/news','id'=>'news'])!!}
  {!!Form::text('title',old('title'),['placeholder'=>'title of new'])!!}<br>
  {!!Form::text('desc',old('desc'),['placeholder'=>'desc of new'])!!}<br>
  {!!Form::text('user_id',old('user_id'),['placeholder'=>'who Added'])!!}<br>
  {!!Form::textarea('content',old('content'),['placeholder'=>'news content'])!!}<br>
  {!!Form::select('status',['active'=>'active','pending'=>'pending','deactive'=>'deactive'],old('status'),['placeholder'=>'select status'])!!}<br>
  {!!Form::submit('Send',['id'=>'add_news'])!!}
{!!Form::close()!!}

<hr>
<div class="content">
  <table>
    <tr>
      <th>Title</th>
      <th>Add_By</th>
      <th>Desc</th>
      <th>Content</th>
      <th>Status</th>
    </tr>

    <form method="POST" action="{{url('del/news')}}">
      @foreach($all_news as $new)

      <tr>
        <td>{{$new->title}}</td>
        <td>{{$new->add_by}}</td>
        <td>{{$new->desc}}</td>
        <td>{{$new->content}}</td>
        <td>{{$new->status}}</td>
        <td>

            {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE">
            <input type ="checkbox" name="id[]" value="{{$new->id}}">

        </td>
      </tr>

      @endforeach
      <input type="submit" value="Delete Multable">
      <input type="submit" value="Soft Delete">
    </form>
  </table>
  <hr>
  <h1>Trashed Data</h1>
  <table>
    <tr>
      <th>Title</th>
      <th>Add_By</th>
      <th>Desc</th>
      <th>Content</th>
      <th>Status</th>
    </tr>

    <form method="POST" action="{{url('del/news')}}">
      @foreach($soft_deletes as $trashed)

      <tr>
        <td>{{$trashed->title}}</td>
        <td>{{$trashed->user_id}}</td>
        <td>{{$trashed->desc}}</td>
        <td>{{$trashed->content}}</td>
        <td>{{$trashed->status}}</td>
        <td>

            {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE">
            <input type ="checkbox" name="id[]" value="{{$trashed->id}}">

        </td>
      </tr>

      @endforeach
      <input type="submit"  name="restore" value="Restore Data">
      <input type="submit"  name="force" value="force delete">
    </form>
  </table>
</div>
@endsection
