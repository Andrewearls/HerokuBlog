<!-- Blog Post -->
<div class="card mb-4">
  <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
  <div class="card-body">
    <h2 class="card-title">{{ $article->title }}</h2>
    <p class="card-text">{{ $article}}</p>
    <a href="#" class="btn btn-primary">Read More &rarr;</a>
  </div>
  <div class="card-footer text-muted">
    Posted on {{ date('F j, Y', strtotime($article->created_at)) }} by
    <a href="#">{{ $article->author->name }}</a>
  </div>
</div>