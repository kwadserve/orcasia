@extends('web')
@section('title', $article->title)
@section('meta_keywords', $article->keywords)
@section('meta_description', $article->introduction)
@section('meta')
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{$article->title}}" />
<meta property="og:description" content="{{$article->introduction}}" />
<meta property="og:image" content="{{URL::asset('images/article/'.$article->title_image)}}" />
<meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')

<style>

img {
    max-width: 100%;
    /* background-size: contain; */
    object-fit: cover;
    max-height:700px;
}
    p { 
   color: #000!important; 
  }
  
  p.introduction {
    text-align: justify;
  }
    
.aticlesubtitle {
    color:#fff!important;
    text-align:center;
}    

.white {
    color:#fff!important;
}

ul {
    color:black;
}

li {
    color:black;
}

</style>
 
 <!-- Banner -->
    <section class="shock-section has-overlay">
        <div class="banner">
          <div class="content-wrapper">
            <!-- Intro -->
            <div class="extended-intro max-w-65 mb-25">
              <h1 class="title white">
                <span class="text-1 text-center text-style-5">{{ $article->title }}</span>
              </h1>
              <p class="aticlesubtitle text-style-9">{{ $article->subtitle }}</p>
            </div>
          </div>
          <!-- Metadata -->
          <div class="banner-metadata absolute">
            @foreach($authors as $author)
            <?php $author_meta = App\Models\UserMeta::where('user_id', $author->id)->first();?>
            <div class="item">
              <a href="{{url('author/'.$author_meta->slug)}}">
                <h5 class="text text-style-11 white">
                  <i class="icon fas fa-user-circle"></i>{{ $author->name }}
                </h5>
              </a>
            </div>
            @endforeach
            <div class="item">
              <h5 class="text text-style-11 white"><i class="icon fas fa-calendar-alt"></i><?=date_format(date_create($article->created_at), "M j, Y")?></h5>
            </div>
              <a href="{{url('category/'.$category->slug)}}"><div class="item">
                <h5 class="text text-style-11 white"><i class="icon fas fa-layer-group"></i>{{ $category->category }}</h5>
              </a>
            </div>
          </div>
          <!-- Image -->
          <div class="image-wrapper">
            <img src="{{ URL::asset('images/article/'.$article->title_image) }}" class="image vh-100 fit-cover" alt="This is an example description for this item." />
          </div>
          <!-- Overlay -->
          <div class="overlay black-50"></div>
        </div>
    </section>

      <!-- Post -->
      <section class="shock-section pt-5 pb-5">
        <div class="container max-w-75">
          <div class="content scheme-1">
            
            <p class="introduction">
            <strong>
                <em>
                @if($article->introduction!=null){{ $article->introduction }}@endif
                </em>
            </strong>
            </p>
            <div class="article-content">
                {!! $article->content !!}
            </div>
            
         
             
           
  

          </div>
        </div>
      </section>

      <!-- Side Widget -->
    <div class="side-widget to-left invert-color mix-blend-difference d-only-desktop">
      <div class="item">
        <span class="widget label-icons">
          <a href="https://www.facebook.com/sharer.php?u={{url()->current()}}" class="link black black-hover"><i class="icon fab fa-facebook-f"></i></a>
          <a href="https://twitter.com/share?&text={{$article->title}}&url={{url()->current()}}" class="link black black-hover"><i class="icon fab fa-twitter"></i></a>
          <a href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}" class="link black black-hover"><i class="icon fab fa-linkedin-in"></i></a>
          <span class="label-line black"></span>
        </span>
      </div>
    </div>
@endsection
<?php
$art = App\Models\Article::where('id', $article->id);
$art->update([
    'views' => $article->views+1,
]);
?>