@extends('layout/post')

@section('content')

@if ($post)
<span class="crumb">Viewing Post {{ $post->_id }}</span>
 
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
@endif

@endsection

