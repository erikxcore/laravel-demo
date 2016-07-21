@extends('layout/post')


@section('content')

@if ($posts) 
<span class="crumb">Viewing All posts</span>
 
 @foreach ($posts as $post)
 <a href="/posts/{{ $post->_id }}"><span class="crumb">Post {{ $post->_id }}</span></a>
 	  <table class="mcc-table-borderless">
 	  	<tbody>
	         <tr>
	         	 <th scope="row">ID : </th>
	             <td>{{ $post->_id }}</td>
	         </tr>
	         <tr>
	         	 <th scope="row">Author : </th>
	             <td>{{ $post->author }}</td>
	         </tr>
	         <tr>
	         	 <th scope="row">Content : </th>
	             <td>{{ $post->content }}</td>
	         </tr>
     	</tbody>
     </table>
     @endforeach
@endif

@endsection