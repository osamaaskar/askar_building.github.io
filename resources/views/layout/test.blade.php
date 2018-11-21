<h1>Welcome To Test Page </h1>
<form action="{{url('test1')}}" method="post">
  {{ csrf_field() }}
  <input type ="text" name="name" >
  <input type  ="submit" value="Send">
</form>

{{$action}}
