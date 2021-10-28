@extends('templates.layouts.index')

<?php $page_title = ($settings_data['post_page_title']) ? $settings_data['post_page_title'] : $post->title; ?>
<?php $meta_title = ($settings_data['post_meta_title']) ? $settings_data['post_meta_title'] : $post->title; ?>

@isset($page_title)
  @section('title-tag'){!! $page_title !!}@endsection
@endisset

@isset($meta_title)
  @section('meta-title-tag'){!! $meta_title !!}@endsection
@endisset

@section('content')

<section class="padding-y-lg">
  <div class="container max-width-lg">

    <div class="grid gap-md@md items-start@md">
      <aside class="sidebar sidebar--static@md col-3@md js-sidebar" data-static-class="sidebar--sticky-on-desktop z-index-1 bg-contrast-lower" id="sidebar" aria-labelledby="sidebar-title">
        <div class="sidebar__panel">
          <div class="position-relative z-index-1">
            <!-- start sidebar content -->
            <div class="text-component padding-md">
              <p>Sidebar Example</p>
  
              <ul>
                <li>List Item</li>
                <li>List Item</li>
                <li>List Item</li>
                <li>List Item</li>
                <li>List Item</li>
                <li>List Item</li>
              </ul>
            </div>
            <!-- end sidebar content -->
          </div>
        </div>
      </aside>
      
      <main class="position-relative z-index-1 col-9@md">
        <!-- start main content -->
        <div class="text-component">
          <h2>Main Content</h2>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam dolore fugiat optio perferendis in. Quasi dolores magnam exercitationem illum excepturi nemo, laudantium sit rem fuga quod necessitatibus iste tempora nesciunt nostrum nulla! Vel, itaque facilis, officia sint inventore illo, sunt architecto voluptate quibusdam laudantium exercitationem? Vitae eaque atque aliquid quidem temporibus fugit ipsa magnam molestias omnis qui cum excepturi iure labore, accusamus minima odit. Iusto labore consectetur, illum, corrupti cumque assumenda quos aspernatur veritatis perspiciatis voluptate quas exercitationem ducimus dolore id! Porro omnis officiis veniam corporis reiciendis. Commodi debitis quasi mollitia qui quia ullam ipsum porro a assumenda optio itaque accusamus earum, nisi error eius sequi tempora doloremque adipisci placeat iste minus iusto laudantium id. Repellendus, delectus! Veritatis porro repellat, deleniti quod alias ex architecto dolor nam neque officiis, fugiat illum quibusdam harum! Ea doloremque porro eveniet veritatis numquam? Modi officia aspernatur ut ipsa recusandae quisquam perspiciatis vitae inventore illum quos enim ipsum commodi, suscipit odit illo autem veniam reiciendis quam quaerat vel eum ducimus sint cum! Laboriosam maxime vitae perspiciatis aspernatur beatae ratione quisquam impedit placeat consequuntur doloremque amet hic, aperiam similique voluptatum suscipit id nesciunt explicabo dolore iste magnam in esse cumque! Facilis cumque dolores quos recusandae vel!</p>

          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum natus odio tenetur delectus maiores ipsam adipisci accusamus velit eligendi? Consectetur consequatur itaque magni architecto magnam enim amet ea, cum doloribus quaerat ut accusantium. Minima sit beatae repellendus facilis perspiciatis inventore, consequatur deserunt distinctio dolorem labore amet nam, voluptatibus necessitatibus eaque quo debitis nihil tenetur accusantium consectetur est earum! Voluptas quae repudiandae ipsum architecto obcaecati consequuntur sapiente nulla? Iste aliquam tenetur non consectetur at, iusto vitae nemo repellat asperiores adipisci modi alias, praesentium aperiam consequuntur molestiae veniam impedit tempora beatae laudantium! Voluptates provident dolore, nobis dolorum natus laboriosam commodi! Officiis distinctio velit dolorem corporis nostrum alias reiciendis molestias eius libero consequuntur nesciunt, obcaecati, quaerat minima recusandae hic adipisci sunt at. Quis excepturi asperiores omnis libero laudantium neque officia voluptas mollitia odio rerum? Voluptas quaerat praesentium recusandae enim esse consectetur sapiente fugit, earum cum minus nisi porro quia repudiandae molestiae sed, placeat aspernatur ipsa dolorem voluptates mollitia reiciendis! Omnis natus eligendi nostrum minus nisi doloremque, optio soluta consequuntur aperiam fuga iusto dolor maiores minima voluptatem! Vero, aliquam voluptatibus, nulla totam cupiditate accusamus quidem quibusdam a magni, officiis incidunt placeat facere temporibus praesentium harum voluptates quasi? Fuga iusto vero, repellat deleniti quod aspernatur.</p>
        </div>
        <!-- end main content -->
      </main>
    </div>
  </div>
</section>

@endsection