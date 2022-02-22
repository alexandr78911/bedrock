<section class="intro_section">
    <div class="intro">
      <h1>{!! the_sub_field('title') !!}</h1>
      <div class="intro_info">
        {!! the_sub_field('description') !!}
      </div>
      <ul class="intro_tabs">
        @php
          $all_categories = get_categories();
        @endphp
        @foreach($all_categories as $single_cat)
          @if($loop->first)
            <li class="active"><a href="#">{!! $single_cat->name !!}</a></li>
          @else
            <li ><a href="#">{!! $single_cat->name !!}</a></li>
          @endif
        @endforeach
      </ul>
    </div>
</section>
<section class="posts">
  <div class="container-x">
    @foreach($all_categories as $single_cat)
      @if($loop->first)
        <div class="tabs__content active">
      @else
        <div class="tabs__content">
      @endif
        @php
          $cat_id = $single_cat->cat_ID;
        @endphp
        @if ( have_posts() ) 
        @php 
          query_posts('cat=' . $cat_id);
        @endphp
          @while (have_posts())
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