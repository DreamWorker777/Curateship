@extends('templates.layouts.index')

<?php 
  $is_authorized = auth()->user() ? true : false;
  $username = $user ? $user->name : ($is_authorized ? auth()->user()->name : '');
  $page_title = ($is_authorized && $settings_data['profile_page_title']) ? $settings_data['profile_page_title'] : $username;
  $meta_title = ($is_authorized && $settings_data['profile_meta_title']) ? $settings_data['profile_meta_title'] : $username;
?>

@isset($page_title)
  @section('title-tag'){!! $page_title !!}@endsection
@endisset

@isset($meta_title)
  @section('meta-title-tag'){!! $meta_title !!}@endsection
@endisset

@section('content')
<x-users.profile id='{{ $user->id }}' />

<div class="text-divider padding-bottom-xs text-lg max-width-adaptive-lg">
    <span>
        {{ $user->name }}&apos;{{
            (substr($user->name, -1) == 's' ? '' : 's')
        }}
        Content
    </span>
</div>

<x-posts.lists.masonry-v1 userid='{{ $user->id }}'/>

@endsection
