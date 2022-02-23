@php
  $all_categories = get_categories();
@endphp
<section class="intro_section">
    <div class="intro">
      <h1>{!! the_sub_field('title') !!}</h1>
      <div class="intro_info">
        {!! the_sub_field('description') !!}
      </div>
      <ul class="intro_tabs">
        @foreach($all_categories as $single_cat)
            <li @if($loop->first) class="active" @endif><a href="#">{!! $single_cat->name !!}</a></li>
        @endforeach
      </ul>
    </div>
</section>
<section class="posts">
  <div class="container-x">
    @foreach($all_categories as $single_cat)
        <div class="tabs__content @if($loop->first) active @endif">
        @if(have_posts()) 
        @php 
          $cat_id = $single_cat->cat_ID;
          query_posts('cat=' . $cat_id);
        @endphp
          @while(have_posts())
          {!! the_post() !!}
            <div class="post_item">
              <div class="post_item_img">
                {!! the_post_thumbnail( 'full' ) !!}
              </div>
              <div class="post_content">
                <div class="post_info">
                  by  {!! get_the_author() !!} / {!! the_modified_date( 'j M' ) !!}
                </div>
                <div class="post_title">{!! the_title() !!}</div>
                <div class="post_teaser">{!! the_excerpt() !!}</div>
                <div class="tags">{!! the_category() !!}</div>
                <a class="post_link" href="{!! get_permalink() !!}">Podcast anhören</a>
              </div>
            </div>
          @endwhile
        @endif
        @php
          wp_reset_query();
        @endphp
      </div>
    @endforeach
  </div>
</section>