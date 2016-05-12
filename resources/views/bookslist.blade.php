<?php $i=1; ?>

    <div class="row">
@foreach ($books as $book)
            <?php $url = route('viewbook', ['id' => $book->bookurl]); ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <img class="img-circle <?php echo ( ($i==1 && $highlight_lastviewed) ? 'lastviewed' : '' ); ?>" src="/img/{{$book->bookurl}}.jpg" alt="{{$book->bookname}}" width="140" height="140">
                <h2><a href="{{$url}}">{{$book->bookname}}</a></h2>
            </div>

    <?php $i++; ?>
@endforeach
    </div>