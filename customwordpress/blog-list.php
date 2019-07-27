
<?php get_header();?>
<main>
    <h2 class="page-heading">Blogs</h2>

    <section>
      <div class="card">
        <div class="card-image">
          <a href="single.php">
            <img src="img/1.jpg" alt="Card Image">
          </a>
        </div>

        <div class="card-description">
          <a href="blogpost.html">
            <h3>The Blog Title Here</h3>
          </a>
          <div class="card-meta">
            Posted by Admin on 23/01/2018 in
            <a href="#">Web Dev</a>
          </div>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis, ullam facilis consequuntur eligendi sit accusamus tempora
            cum distinctio pariatur ipsa quod, odit dolorum non vero recusandae? Corporis voluptatem optio nulla.
          </p>
          <a href="blogpost.html" class="btn-readmore">Read more</a>
        </div>
      </div>

    </section>

    <div class="pagination">
      <a href="#">Prev</a>
      <a href="#">4</a>
      <a href="#">5</a>
      <a href="#">6</a>
      <a href="#">Next</a>
    </div>

    <?php get_footer();?>