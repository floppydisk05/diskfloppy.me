@extends('layouts.default')
@section('title', 'Music')
@section('description', '')
@section('content')
    @php

        $cfg = app('config')->get('services')['lastfm'];
        $api_root = app('config')->get('app')['api_root'];

        $api_alive = true;

        try {
            $data = file_get_contents($api_root.'/lastfm/current');
        } catch (Exception $e) {
            $api_alive = false;
        }
        @endphp
    @if (!$api_alive)
        @include('components.errors.api-error')
    @else

    @php
        $current_track = json_decode(file_get_contents($api_root . '/lastfm/current'));
        $top_tracks = json_decode(file_get_contents($api_root . '/lastfm/top'));
        $count = 0;
    @endphp
    <table class="info-table" role="presentation" width="100%">
        <tr>
            <td colspan="4">
                <h2>Last/Current Track:</h2>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <a href="{{ $current_track->url }}">{{ $current_track->title }} • {{ $current_track->artist }}</a><br>
            </td>
        </tr>
    </table>
    <hr>
    <table class="music-top10">
        <tr>
            <td colspan="4">
                <h2 style="margin-bottom: 5px">Top {{ $cfg['toptracks'] }} Tracks (Last 7 days)</h2>
            </td>
        </tr>
        <tr>
        <td style="text-align: right"><b>#</b></td>
        <td><b>Track</b></td>
        <td><b>Artist</b></td>
        <td><b>Plays</b></td>
        </tr>
        @foreach ($top_tracks as $track)
            @php $count++ @endphp
            @if ($count >= $cfg['toptracks']+1)
                @break
            @endif
            <tr>
                <td style="text-align: right">{{ $count }}</td>
                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;" width="50%"><a href="{{ $track->url }}">{{ $track->title }}</a></td>
                <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;" width="50%">{{ $track->artist }}</td>
                <td>{{ $track->playcount }}</td>
            </tr>
        @endforeach
    </table>
    @endif
@stop
