<?php $categories = app('config')->get('projects'); ?>
@extends('layouts.default')
@section('title', 'Projects')
@section('description', 'My projects')
@section('content')
    @foreach ($categories as $category)
    <h2>{{ $category['name']}}</h2>
    @foreach ($category['projects'] as $project)
    <div>
            <a href="{{ $project['url'] }}">{{ $project['name'] }}</a> - {{ $project['description'] }}<br>
            <b>Languages:</b> {{ implode(", ", $project['languages']) }}
        </div>
        <br>
    @endforeach
@endforeach
@stop
