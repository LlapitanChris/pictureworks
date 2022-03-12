@extends('layouts.app')

@section('content')

<div id="root" data-user="{{$user}}" data-csrf="{{csrf_token()}}" data-datenow="{{\Carbon\Carbon::now()->toDateString()}}" data-exists="{{$existToday}}">

</div>
@endsection
