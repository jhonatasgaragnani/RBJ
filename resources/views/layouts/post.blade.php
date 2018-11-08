<?php
$post = \Admin\Models\Post::find(request()->route()->parameters()['child']);
?>
<meta property="og:title" content="{{ preg_replace("/\r|\n/", " ", trim($post->title)) }}">
<meta property="og:image" content="{{ preg_replace("/\r|\n/", " ", trim(request()->getSchemeAndHttpHost().$post->image)) }}">
<meta property="og:description" content="{{ preg_replace("/\r|\n/", " ", str_limit(trim(strip_tags($post->body)), 150)) }}">
<meta property="og:url" content="{{ preg_replace("/\r|\n/", " ", trim(url()->current())) }}">
<meta property="og:type" content="article">
<meta name="twitter:card" content="summary">
<meta name="twitter:url" content="{{ preg_replace("/\r|\n/", " ", trim(url()->current())) }}">
<meta name="twitter:title" content="{{ preg_replace("/\r|\n/", " ", trim($post->title)) }}">
<meta name="twitter:image" content="{{ preg_replace("/\r|\n/", " ", trim(request()->getSchemeAndHttpHost().$post->image)) }}">
<meta name="twitter:description" content="{{ preg_replace("/\r|\n/", " ", str_limit(trim(strip_tags($post->body)), 150)) }}">