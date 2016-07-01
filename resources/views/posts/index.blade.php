@extends('layout/posts')


@section('content')

@if ($posts) 
<h1>All Posts</h1>
 
 @foreach ($posts as $post)
 	<table>
         <tr>
             <td>{{ $post->_id }}</td>
             <td>{{ $post->author }}</td>
             <td>{{ $post->content }}</td>
         </tr>
     </table>
     @endforeach
@endif

@endsection