@extends('layout/posts')

@section('content')

@if ($post)
<h1>Single Post</h1>
 
 	<table>
         <tr>
             <td>{{ $post->_id }}</td>
             <td>{{ $post->author }}</td>
             <td>{{ $post->content }}</td>
         </tr>
     </table>
@endif
@endsection