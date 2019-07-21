@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td> Name</td>
          <td>Role</td>
          <td>Created At</td>
          <td>Images</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>@if($user->dealer==1)Dealer @else Admin @endif </td>
            <td>{{ $user->created_at }}</td>
            <td><img src="{{ URL::to('/') }}/images/{{ $user->images }}" class="img-thumbnail" width="100" /></td>
            <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection