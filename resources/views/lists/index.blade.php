@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lists
                        {!! link_to_route('lists.create', 'Create List', [], ['class' => 'pull-right']) !!}
                    </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        @forelse ($lists as $list)
                            <div>{{$list->name}}</div>
                        @empty
                            <div>You don't have any lists, {!! link_to_route('lists.create', 'Create A List') !!}.</div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
