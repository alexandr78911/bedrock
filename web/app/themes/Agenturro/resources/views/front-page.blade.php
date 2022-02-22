@extends('layouts.app')

@section('content')
  <?php if( have_rows('content') ):
    while( have_rows('content')): the_row();
      if( get_row_layout() == 'posts' ): ?>
        @include('partials.posts')
      <?php endif;
    endwhile;
  endif;?>
@endsection
